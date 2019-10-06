<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Project;
use App\Timesheet;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function chat(){
        return view('chat');
    }
    //
    public function login(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->input();
            $result_user = User::where(['fullname' => $data['username'],'password'=>$data['password']])->first(); 
            $result_count = User::where(['fullname' => $data['username'],'password'=>$data['password']])->count(); 
            if($result_count > 0){
                //echo "Success"; die;
                session_start();
                $_SESSION['username'] = $data['username'];
                $_SESSION['user_id'] = $result_user->id;
                Session::put('is_timesheets', $result_user->is_timesheets);
                Session::put('is_summary', $result_user->is_summary);
                Session::put('is_accounting', $result_user->is_accounting);
                Session::put('user_image', $result_user->filename);
                Session::put('userSession', $data['username']);
                Session::put('user_id', $result_user->id);
                if($result_user->is_summary){
                    return redirect('/projectmanager_dashboard');
                }else{
                    return redirect('/employee_dashboard');
                }
                
        	}else{
                //echo "failed"; die;
                return redirect('/home')->with('flash_message_error','Invalid Username or Password');
        	}
    	}
    	return view('user_login');
    }
    public function employee_dashboard(){
        session_start();

        $result_datas=Timesheet::join('projects', 'timesheets.project_id', '=', 'projects.project_id')->where(['user_id'=>$_SESSION['user_id']])->select('projects.project_id','project_number','project_name','project_totalhrs','project_rate',DB::raw('sum(total_time) as sum'))->groupby('projects.project_id','project_number','project_name','project_totalhrs','project_rate')->get();
        return view('employee_dashboard')->with(compact('result_datas'));
    }
    public function project_amchart_view(Request $request){
        session_start();
        $project_id=$request->get('project_id');
        $data=0;
        $result_datas=Timesheet::where(['user_id'=>$_SESSION['user_id'],'project_id'=>$project_id])->select('hourly_type', DB::raw('sum(total_time) as sum'))->groupby('hourly_type')->get();
        $total_hours=Project::where(['project_id'=>$project_id])->first();
        $data=$total_hours->project_totalhrs;
        foreach($result_datas as $item){
            $data-=$item->sum;
        }
        // return ['content' => (string)view('dashboard_content')->with(compact('result_datas'))];
        return ['content' => $result_datas,'total_hours'=>$data];
    }

    public function projectmanager_dashboard(){
        session_start();

        $result_datas=User::get();
        $result_projects=Timesheet::join('projects', 'timesheets.project_id', '=', 'projects.project_id')->select('projects.project_id','project_number','project_name','project_totalhrs','project_rate',DB::raw('sum(total_time) as sum'))->groupby('projects.project_id','project_number','project_name','project_totalhrs','project_rate')->get();
        
        return view('projectmanager_dashboard')->with(compact('result_datas','result_projects'));
    }

    public function employee_amchart_content(Request $request){
        session_start();
        $employee_id=$request->get('employee_id');
        $data=0;
        $result_datas=Timesheet::join('projects', 'timesheets.project_id', '=', 'projects.project_id')->where(['user_id'=>$employee_id])->select('projects.project_id','project_number','project_name','project_totalhrs','project_rate',DB::raw('sum(total_time) as sum'))->groupby('projects.project_id','project_number','project_name','project_totalhrs','project_rate')->get();
        // $data=$total_hours->project_totalhrs;
        // foreach($result_datas as $item){
        //     $data-=$item->sum;
        // }
        // return ['content' => (string)view('dashboard_content')->with(compact('result_datas'))];
        return ['content' => $result_datas];
    }
    public function project_amchart_content(Request $request){
        session_start();
        $project_id=$request->get('project_id');
        $data=0;
        $result_datas=Timesheet::join('users', 'timesheets.user_id', '=', 'users.id')->where(['project_id'=>$project_id])->select('users.fullname',DB::raw('sum(total_time) as sum'))->groupby('users.fullname')->get();

        $total_hours=Project::where(['project_id'=>$project_id])->first();
        $data=$total_hours->project_totalhrs;
        foreach($result_datas as $item){
            $data-=$item->sum;
        }
        // return ['content' => (string)view('dashboard_content')->with(compact('result_datas'))];
        return ['content' => $result_datas,'total_hours'=>$data];
    }

    public function calendar_view(){
        // $user_id=$request->get('user_id');
        $calendar_view_content=Timesheet::join('projects','projects.project_id','=','timesheets.project_id')->select('project_number as title','project_name','projects.created_at as start', DB::raw('sum(total_time) as sum'))->where(['user_id'=>'1'])->groupby('project_number','project_name','projects.created_at')->get();
        
        return view('calendar_view')->with(compact('calendar_view_content'));
    }
    public function calendar_view_load(Request $request){
        $user_id=$request->get('user_id');
        $calendar_view_content=Timesheet::join('projects','projects.project_id','=','timesheets.project_id')->select('project_number as title','project_name','projects.created_at as start', DB::raw('sum(total_time) as sum'))->where(['user_id'=>$user_id])->groupby('project_number','project_name','projects.created_at')->get();
        
        return ['calendar_view_content'=>$calendar_view_content];
    }

}
