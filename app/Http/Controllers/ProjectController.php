<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    //
    public function index(){
        $projects=Project::get();
        return view('admin.admin_manager.projects.index')->with(compact('projects'));
    }
    public function addProject(Request $request){
        
        if ($request->isMethod('post')){
            $data=$request->all();
            $project=new Project;
            $project->project_number=$data['project_number'];
            $project->project_name=$data['project_name'];
            $project->project_totalhrs=$data['project_totalhrs'];
            $project->project_rate=$data['project_rate'];
            $project->save();
            return redirect()->action('ProjectController@index')->with('flash_message_success','Project has been added successfully');
        }
        return view('admin.admin_manager.projects.project_add');
    }
    public function editProject(Request $request,$id=null){

        if($request->isMethod('post')){
            $data = $request->all();
            Project::where(['project_id'=>$id])->update(['project_number'=>$data['project_number'],'project_name'=>$data['project_name'],'project_totalhrs'=>$data['project_totalhrs'],'project_rate'=>$data['project_rate']]);
            return redirect()->action('ProjectController@index');
        }

        $projectDetails = Project::where(['project_id'=>$id])->first();
        return view('admin.admin_manager.projects.project_edit')->with(compact('projectDetails'));
    }

    public function deleteProject($id = null){
        Project::where(['project_id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Project has been deleted successfully');
    }
}
