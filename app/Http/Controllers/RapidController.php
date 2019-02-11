<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DecisionTree;
use App\Models\ToolPages;
use App\Models\Project;
use Session;

class RapidController extends Controller
{
   public function index($id)
    {
        $colors = ['1' => '#c0c0c0', '2' => '#92d050', '3' => '#ffff00', '4' => '#f79646', '5' => '#ff0000'];
        $colors_text = ['1' => 'Insufficient Understanding', '2' => 'No / Low', '4' => 'Moderate', '5' => 'High'];
        $projectData = Project::with(['rapid', 'tool'])->where('id', $id)->first();
        if (! Session::has('project')) {
            $project = (object)(['project_id'=> $id,
                'project_name' => $projectData->name,
                'tool_id' => $projectData->tool_id,
                'tool_name' => $projectData->tool->name,
                'rapid_id' => $projectData->rapid->id
            ]);
            Session::put('project', $project);
        }
      return view('rapid.dashboard', compact('projectData', 'colors', 'colors_text'));
    }

    public function decisionTreeSteps($id, $stepname, Request $request){
        $inputs = $request->all();   
    	$tool_id = Session::get('project')->tool_id;
    	$project_id = Session::get('project')->project_id;
        $decisionTree = DecisionTree::where('id', $id)->first();

        $projectCountries = Project::select('countries.name', 'countries.iso3', 'regions.region_name')
        ->join('project_countries', 'projects.id', '=', 'project_countries.project_id')
        ->join('countries', 'countries.id', '=', 'project_countries.country_id')
        ->join('regions', 'regions.id', '=', 'countries.region_id')
        ->where('projects.id', $project_id)
        ->get();
        
        $cckpLinks = getCCKPLink($projectCountries);
    	
    	if(is_array(unserialize($decisionTree['exposure_types']))){
    		$decisionTree['exposure_types']=unserialize($decisionTree['exposure_types']);
    	}else{
    		$decisionTree['exposure_types']=[];
    	}

    	if(is_array(unserialize($decisionTree['impact_sectors']))){
    	    $decisionTree['impact_sectors']=unserialize($decisionTree['impact_sectors']);
    	}else{
    		$decisionTree['impact_sectors']=[];
        }
        
    	if(is_array(unserialize($decisionTree['softcom_types']))){
    	    $decisionTree['softcom_types']=unserialize($decisionTree['softcom_types']);
    	}else{
    		$decisionTree['softcom_types']=[];
        }
        
        if(Session::has('redirect')){
            Session::forget('redirect');
        }

        if(isset($inputs['redirect'])){
            Session::put('redirect', route('rapid.steps',[$id,'step-4']));
        }

    	if($tool_id == '1'){
    		$view = 'rapid.agriculture.'.$stepname;
    	}elseif ($tool_id == '2') {
            $view = 'rapid.water.'.$stepname;
        }elseif ($tool_id == '3') {
            $view = 'rapid.energy.'.$stepname;
        }elseif ($tool_id == '4') {
            $view = 'rapid.natural.'.$stepname;
        }elseif ($tool_id == '5') {
            $view = 'rapid.transportation.'.$stepname;
        }

        return view($view, compact('id','project_id','tool_id','decisionTree', 'cckpLinks'));
    }

    public function projectType($project_id){
        $rapidData = DecisionTree::firstOrCreate(['project_id' => $project_id]);

        if (! Session::has('project')) {
            $projectData = Project::with('tool')->where('id', $project_id)->first();
            $project = (object)(['project_id'=> $project_id,
            'project_name' => $projectData->name,
            'tool_id' => $projectData->tool_id,
            'tool_name' => $projectData->tool->name,
            'rapid_id' => $rapidData->id]);
            Session::put('project', $project);
          }
    	return view('rapid.project-type',compact('project_id', 'rapidData'));
    }

    public function projectTypeStore(Request $request){
    	 $attributes = $request->all();
         $projType = DecisionTree::create($attributes);
         
    	 if($projType){
    	 	return redirect()->route('rapid.dashboard', $projType->project_id);
    	 }
       return response()->json(['data' => $attributes]);
    }

    public function projectTypeUpdate($id, Request $request){
        $projType = DecisionTree::find($id);
        $attributes = $request->all();

        if($projType['component_type']==$attributes['component_type']){
            return redirect()->route('rapid.dashboard', $attributes['project_id']);
        }else{
            $attributes['exposure_types'] = null;
            $attributes['impact_sectors'] = null;
            $attributes['softcom_types'] = null;
            $attributes['exposure_rating'] = null;
            $attributes['exposure_notes'] = null;
            $attributes['impact_rating'] = null;
            $attributes['impact_notes'] = null;
            $attributes['softcom_rating'] = null;
            $attributes['softcom_vulnerability'] = null;
            $attributes['softcom_vul_alleviate'] = null;
            $attributes['softcom_notes'] = null;
            $attributes['context_rating'] = null;
            $attributes['context_notes'] = null;
            $attributes['outcome_rating'] = null;
            $attributes['outcome_notes'] = null;
            $projType->update($attributes);
            if($projType){
                return redirect()->route('rapid.dashboard', $attributes['project_id']);
            }
        }
        return response()->json(['data' => $attributes]);
   }


    public function update($id, Request $request){
    	$project_id=Session::get('project')->project_id;
        $attributes = $request->all();
        
    	if(isset($attributes['exposure_types'])){
            $attributes['exposure_types'] = serialize($attributes['exposure_types']);
        }

        if(isset($attributes['impact_sectors'])){
            $attributes['impact_sectors'] = serialize($attributes['impact_sectors']);
        }

        if(isset($attributes['softcom_types'])){
            $attributes['softcom_types'] = serialize($attributes['softcom_types']);
        }

        if(isset($attributes['exposure_rating']) && ($attributes['exposure_rating']=='2' || $attributes['exposure_rating']=='1')){
            $attributes['impact_sectors'] = null;
            $attributes['softcom_types'] = null;
            $attributes['impact_rating'] = null;
            $attributes['impact_notes'] = null;
            $attributes['softcom_rating'] = null;
            $attributes['softcom_vulnerability'] = null;
            $attributes['softcom_vul_alleviate'] = null;
            $attributes['softcom_notes'] = null;
            $attributes['context_rating'] = null;
            $attributes['context_notes'] = null;
            $attributes['outcome_rating'] = null;
            $attributes['outcome_notes'] = null;
            $decisionTree = DecisionTree::find($id)->update($attributes);  
        }else if(isset($attributes['impact_rating']) && $attributes['impact_rating']=='1'){
            $attributes['softcom_types'] = null;
            $attributes['softcom_rating'] = null;
            $attributes['softcom_vulnerability'] = null;
            $attributes['softcom_vul_alleviate'] = null;
            $attributes['softcom_notes'] = null;
            $attributes['context_rating'] = null;
            $attributes['context_notes'] = null;
            $attributes['outcome_rating'] = null;
            $attributes['outcome_notes'] = null;
            $decisionTree = DecisionTree::find($id)->update($attributes);
        }else{
            $decisionTree = DecisionTree::find($id)->update($attributes); 
        }
        
        if(Session::has('redirect')){
            return redirect(Session::get('redirect'));
        }

        return redirect()->route('rapid.dashboard', $project_id);
    }
}