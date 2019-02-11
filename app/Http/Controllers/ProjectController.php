<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tool;
use App\Models\Region;
use App\Models\Country;
use App\Models\Project;
use App\Models\ProjectCountry;
use App\Models\DecisionTree;
use Validator, Session, PDF, Storage;



class ProjectController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        $tools = Tool::orderBy('name', 'asc')->get();
        
        return view('project.add-project', compact('regions', 'tools'));
    }

    public function getCountry(Request $request){
        $input = $request->all();
        $countries = Country::where('region_id', $input['region_id'])->get();

        return view('project.country',compact('countries'));
    }

    public function projectValidate($attributes) 
	{
		$rules = [
            'name' => 'required',
            'project_number' => 'required',
            'assessment_completed_by' => 'required',
            'tool_id' => 'required'
		];

		$validator = Validator::make($attributes, $rules);

        return $validator;
    }

    public function store(Request $request){
        $attributes = $request->all();
               
        $validator = $this->projectValidate($attributes);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $project = Project::create($attributes);
        if($project){
            if($request->hasFile('concept_note')){
                $file = $request->file('concept_note');
                $file_name = $file->getClientOriginalName();
                $path = $file->storeAs('project_'.$project->id, $file_name, 'uploads');
                $project->concept_note = $path;
                $project->save();
            }

            foreach($attributes['country_id'] as $country){
              $pc = new ProjectCountry;
              $pc->project_id = $project->id;
              $pc->country_id = $country;
              $pc->save();
            }
            $rapidData = DecisionTree::create(['project_id' => $project->id]);
            return redirect()->route('project.view', $project->id);
        }
       return response()->json(['data' => $input]);
    }

    public function show($id){
        $project = Project::with(['countries', 'tool'])->where('id', $id)->first();
        $project->tool_type = $project->tool->name;
        if(!empty($project->countries)){
            
            foreach($project->countries as $country){
             $countries[] = $country->name;
            }
            $project->countries = implode(',', $countries);
        }else{
            $project->countries = '';
        }
        
        return view('project.project-details', compact('project'));
    }

    public function edit($id){
        $regions = Region::all();
        $tools = Tool::orderBy('name', 'asc')->get();
        $project = Project::with(['countries', 'tool', 'rapid'])->where('id', $id)->first();
        //dd($project);
        $countries = [];
        foreach($project->countries as $k => $country){
            $countries[$k]['country_id'] =  $country->id;
            $countries[$k]['region_id'] =  $country->region->id;
            $countries[$k]['countries'] =  Country::where('region_id', $country->region->id)->get();
        }

        $funding_source = json_decode($project->funding_source);
        if (! Session::has('project')) {
            $sessionData = (object)(['project_id'=> $id,
            'project_name' => $project->name,
            'tool_id' => $project->tool_id,
            'tool_name' => $project->tool->name,
            'rapid_id' => $project->rapid->id]);
            Session::put('project', $sessionData);
        }
        return view('project.edit-project',compact('project', 'funding_source', 'regions', 'tools', 'countries'));
    }

    public function update($id, Request $request){
        $attributes = $request->all();
        
        $validator = $this->projectValidate($attributes);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $project = Project::find($id);
        
        if($project){
            
            if($request->hasFile('concept_note')){
                $file = $request->file('concept_note');
                $file_name = $file->getClientOriginalName();
                $path = $file->storeAs('project_'.$project->id, $file_name, 'uploads');
                $attributes['concept_note'] = $path;
            }
            $project->update($attributes);
            $countries = $attributes['country_id'];
            $countries = Country::select('name')->whereIn('id',$countries)->get();
          
            $delete = ProjectCountry::where('project_id',$id)->delete();
            foreach($attributes['country_id'] as $country){
              $pc = new ProjectCountry;
              $pc->project_id = $project->id;
              $pc->country_id = $country;
              $pc->save();
            }
            return redirect()->route('project.view', $id);
        }
    }

    public function generatePdf($id){
        $projectData = Project::with(['rapid', 'tool', 'countries'])->where('id', $id)->first();
        $decisionTree = $projectData->rapid;

        if($decisionTree['exposure_types']){
            $decisionTree['exposure_types']=unserialize($decisionTree['exposure_types']);
        }
        if($decisionTree['impact_sectors']){
            $decisionTree['impact_sectors']=unserialize($decisionTree['impact_sectors']);
        }
        if($decisionTree['softcom_types']){
            $decisionTree['softcom_types']=unserialize($decisionTree['softcom_types']);
        }
        foreach ($projectData['countries'] as $record) {
            $country_name[] = $record->name;
        }
        $projectData['country_name'] = implode(", ", $country_name);
        $icon_path = public_path('assets\images').'\\';
       
        if($projectData->tool_id == "1"){
            $reportname = 'rapid.agriculture.report';
        }
        else if($projectData->tool_id == "2"){
            $reportname = 'rapid.water.report';
        }
        else if($projectData->tool_id == "3"){
            $reportname = 'rapid.energy.report';
        }
        else if($projectData->tool_id == "4"){
            $reportname = 'rapid.natural.report';
        }
        else if($projectData->tool_id == "5"){
            $reportname = 'rapid.transportation.report';
        }

        $pdf = PDF::loadView($reportname,  compact('projectData', 'colors', 'colors_text','decisionTree','icon_path'));
        $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif', 'DOMPDF_ENABLE_CSS_FLOAT' => true]);
        //return $pdf->download('report.pdf');
        return $pdf->stream('report.pdf');
        //return view('rapid.agriculture.report',  compact('projectData', 'colors', 'colors_text','decisionTree','icon_path'));
    }

    public function download($id)
    {
        $file = Project::select('concept_note')->where('id', $id)->first();
        return Storage::disk('uploads')->download($file->concept_note);
    }

    public function destroy($id)
    {
        //$delete = DecisionTree::where('project_id', $id)->delete();
        $delete = DecisionTree::where('project_id', $id)
        ->update([
            'component_type' => null,
            'exposure_types' => null,
            'impact_sectors' => null,
            'softcom_types' => null,
            'exposure_rating' => null,
            'exposure_notes' => null,
            'impact_rating' => null,
            'impact_notes' => null,
            'softcom_rating' => null,
            'softcom_vulnerability' => null,
            'softcom_vul_alleviate' => null,
            'softcom_notes' => null,
            'context_rating' => null,
            'context_notes' => null,
            'outcome_rating' => null,
            'outcome_notes' => null
        ]);
        return redirect()->route('home');
    }
}
