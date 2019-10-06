<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Timesheet;
use App\User;
use App\Project;
use Illuminate\Support\Facades\DB;


class ProjectManagerController extends Controller
{
    //
    // public function index(){
    //     $employees=User::get();
    //     return view('admin.project_manager.employees')->with(compact('employees'));
    // }
    public function employee_index(){
        $employees=User::get();
        return view('admin.project_manager.employees')->with(compact('employees'));
    }
    
    public function employee_view(Request $request){

        $employee_id=$request->get('employee_id');
        $result_datas=Timesheet::join('projects', 'timesheets.project_id', '=', 'projects.project_id')
            ->join('users', 'timesheets.user_id', '=', 'users.id')
            ->where(['timesheets.user_id'=>$employee_id])
            ->select('projects.project_name','timesheets.month_val','projects.project_rate',DB::raw('sum(total_time) as sum'))
            ->groupby(['timesheets.month_val','projects.project_name','projects.project_rate'])
            ->get();
        
        return ['content' => (string)view('admin.project_manager.employee_content')->with(compact('result_datas'))]; 
    }
    public function front_employee_index(){
        $employees=User::get();
        return view('project_manager.employees')->with(compact('employees'));
    }

    public function front_employee_view(Request $request){

        $employee_id=$request->get('employee_id');
        $result_datas=Timesheet::join('projects', 'timesheets.project_id', '=', 'projects.project_id')
            ->join('users', 'timesheets.user_id', '=', 'users.id')
            ->where(['timesheets.user_id'=>$employee_id])
            ->select('projects.project_name','timesheets.month_val','projects.project_rate',DB::raw('sum(total_time) as sum'))
            ->groupby(['timesheets.month_val','projects.project_name','projects.project_rate'])
            ->get();
        
        return ['content' => (string)view('project_manager.employee_content')->with(compact('result_datas'))]; 
    }

    public function project_index(){
        $projects=Project::get();
        return view('admin.project_manager.projects')->with(compact('projects'));
    }
    public function project_view(Request $request){

        $project_id=$request->get('project_id');
        $result_datas=Timesheet::join('projects', 'timesheets.project_id', '=', 'projects.project_id')
            ->join('users', 'timesheets.user_id', '=', 'users.id')
            ->where(['timesheets.project_id'=>$project_id])
            ->select('users.fullname','timesheets.month_val','projects.project_rate as rates',DB::raw('sum(total_time) as sum'))
            ->groupby(['timesheets.month_val','users.fullname','projects.project_rate'])
            ->get();
        
        return ['content' => (string)view('admin.project_manager.project_content')->with(compact('result_datas'))]; 
    }
    public function front_project_index(){
        $projects=Project::get();
        return view('project_manager.projects')->with(compact('projects'));
    }
    public function front_project_view(Request $request){

        $project_id=$request->get('project_id');
        $result_datas=Timesheet::join('projects', 'timesheets.project_id', '=', 'projects.project_id')
            ->join('users', 'timesheets.user_id', '=', 'users.id')
            ->where(['timesheets.project_id'=>$project_id])
            ->select('users.fullname','timesheets.month_val','projects.project_rate as rates',DB::raw('sum(total_time) as sum'))
            ->groupby(['timesheets.month_val','users.fullname','projects.project_rate'])
            ->get();
        
        return ['content' => (string)view('project_manager.project_content')->with(compact('result_datas'))]; 
    }

    public function discipline_index(){

        $result_datas=Timesheet::join('disciplines', 'timesheets.discipline_id', '=', 'disciplines.discipline_id')
            ->select('timesheets.month_val','disciplines.discipline_type',DB::raw('sum(total_time) as sum'))
            ->groupby(['timesheets.month_val','disciplines.discipline_type'])
            ->get();
        
        return view('admin.project_manager.disciplines')->with(compact('result_datas'));
    }
    public function front_discipline_index(){

        $result_datas=Timesheet::join('disciplines', 'timesheets.discipline_id', '=', 'disciplines.discipline_id')
            ->select('timesheets.month_val','disciplines.discipline_type',DB::raw('sum(total_time) as sum'))
            ->groupby(['timesheets.month_val','disciplines.discipline_type'])
            ->get();
        
        return view('project_manager.disciplines')->with(compact('result_datas'));
    }

    public function phase_index(){

        $result_datas=Timesheet::join('phases', 'timesheets.phase_id', '=', 'phases.phase_id')
            ->select('timesheets.month_val','phases.phase_name',DB::raw('sum(total_time) as sum'))
            ->groupby(['timesheets.month_val','phases.phase_name'])
            ->get();
        
        return view('admin.project_manager.phases')->with(compact('result_datas'));
    }
    public function front_phase_index(){

        $result_datas=Timesheet::join('phases', 'timesheets.phase_id', '=', 'phases.phase_id')
            ->select('timesheets.month_val','phases.phase_name',DB::raw('sum(total_time) as sum'))
            ->groupby(['timesheets.month_val','phases.phase_name'])
            ->get();
        
        return view('project_manager.phases')->with(compact('result_datas'));
    }
}
