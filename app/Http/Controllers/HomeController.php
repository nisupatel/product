<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tool;
use App\Models\Project;
use App\Models\DecisionTree;
use PDF, Datatables, Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inputs = $request->all();
        $tool_id = 0;
        if(isset($inputs['tool_id'])){
            $tool_id = $inputs['tool_id'];
        }
        
        $tools = Tool::orderBy('name', 'asc')->get();
        Session::flush();
        return view('home', compact('tools', 'projects', 'tool_id'));
    }

    public function getProjectData($filter){
        $projects = [];
        $query = Project::with(['rapid', 'countries', 'tool']);
        if($filter != 0){
            $query->where('tool_id', $filter);
        }
        //return $query;
        $projectData = $query->get();
        foreach($projectData as $k => $project){
            $countryArr = [];
            foreach($project->countries as $k => $country){
                $countryArr[$k] = $country->name;
            }

            $projects[] = (object) array('id' => $project->id,
                'name'=> $project->name, 
                'assessment_completed_by' => $project->assessment_completed_by,
                'updated_at' => date('M d, Y', strtotime($project['updated_at'])),
                'countries' => (!empty($countryArr) ? implode(', ', $countryArr): ''),
                'tool' => $project->tool->name,
                'rapid' => $project->rapid,
            );
        }
        return $projects;
    }

    public function filteredProject($id)
    {
        $projects = $this->getProjectData($id);
        return $this->getDataTable($projects);
    }

    public function getDataTable($projects){
        
        return Datatables::of($projects)
        ->editColumn('name', function ($project) {
            return '<span title="'.$project->name.'">'.((strlen($project->name) > 25) ? substr($project->name, 0, 25).'..' : $project->name).'</span>';
        })
        ->addColumn('action', function ($projects) {
            $imgSrc = asset('assets/images/psd-icon-disable.png');
            $disabled = 'disabled';
            if($projects->rapid && $projects->rapid->component_type){
               if($projects->rapid->component_type == 'physical'){
                if(($projects->rapid->exposure_rating == 1 || $projects->rapid->exposure_rating == 2) || $projects->rapid->impact_rating == 1 || $projects->rapid->outcome_rating != "") {
                    $imgSrc = asset('assets/images/pdf.png');
                    $disabled = '';
                }
               }else{
                if(($projects->rapid->exposure_rating == 1 || $projects->rapid->exposure_rating == 2) || $projects->rapid->outcome_rating != "") {
                    $imgSrc = asset('assets/images/pdf.png');
                    $disabled = '';
                } 
               }
                $screenAction = '<div class="editIcon">
                                    <ul>
                                        <li><a href="'.route('rapid.dashboard', $projects->id).'"><img src="'.asset('assets/images/flow.png').'"></a></li>
                                        <li><a href="'.route('project.pdf', $projects->id).'" class="'.$disabled.'" target="_blank"><img src="'.$imgSrc.'"></a></li>
                                        <li><a href="'.route('project.delete', $projects->id).'" onclick="return confirm(\'Are you sure you want to delete the assessment?\');"><img src="'.asset('assets/images/close.png').'"></a></li>
                                    </ul>
                                </div>';
            }else{
                $screenAction = '<div class="editProj">
                                    <a href="'.route('rapid.projectType', $projects->id).'">Start Rapid Screening Assessment</a>
                                </div>';
            }
            $action = '<div class="operationSec">
                        <div class="editProj">
                            <a href="'.route('project.edit', $projects->id).'">Edit Project Profile <i class="fas fa-pencil-alt"></i></a>
                        </div>
                        '.$screenAction.'
                    </div>';
            return $action;
        })
        ->rawColumns(['action', 'name'])
        ->make(true);
    }
}
