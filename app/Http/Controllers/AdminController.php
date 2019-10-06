<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Admin;
use App\Project;
use App\Timesheet;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function login(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->input();
            $adminCount = Admin::where(['username' => $data['username'],'password'=>md5($data['password']),'status'=>1])->count(); 
            if($adminCount > 0){
                //echo "Success"; die;
                Session::put('adminSession', $data['username']);
                return redirect('/admin/dashboard');
        	}else{
                //echo "failed"; die;
                return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
        	}
    	}
    	return view('admin.admin_login');
    }
    public function admin_dashboard(){
        $project_lists=Timesheet::join('projects','projects.project_id','=','timesheets.project_id')->select('project_number','project_name','project_totalhrs','project_rate', DB::raw('sum(total_time) as sum'))->groupby('project_number','project_name','project_totalhrs','project_rate')->get();
        $employee_lists=Timesheet::join('users','users.id','=','timesheets.user_id')->select('users.id','users.fullname','users.rates')->groupby('users.id','users.fullname','users.rates')->get();
        $total_projects=Project::count();
        $total_employees=User::count();
        return view('admin.admin_dashboard')->with(compact('project_lists','employee_lists','total_projects','total_employees'));
    }
    public function project_spenttime_load(Request $request){
        $temp=$request->get('temp');
        $project_content=Timesheet::join('projects','projects.project_id','=','timesheets.project_id')->select('project_number', DB::raw('sum(total_time) as sum'))->groupby('project_number')->get();
        
        return ['project_content'=>$project_content];
    }
}
