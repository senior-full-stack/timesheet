<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Timesheet;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    //
    public function index(){
        $users=User::get();
        $departments=Department::get();
        return view('admin.admin_manager.users.index')->with(compact('users','departments'));
    }
    public function adduser(Request $request){
        
        if ($request->isMethod('post')){
            $data=$request->all();
            $user=new User;
            $user->fullname=$data['user_lastname'].' '.$data['user_firstname'];
            $user->lastname=$data['user_lastname'];
            $user->firstname=$data['user_firstname'];
            $user->departmentid=$data['department'];
            $user->password=$data['user_password'];
            $user->rates=$data['user_rate'];
            $user->education=$data['user_education'];
            $user->citizenship=$data['user_citizenship'];
            $user->supervisor=$data['user_supervisor'];
            $user->is_timesheets=($data['timesheet_check']) ? 1 : 0;
            $user->is_summary=($data['summary_check']) ? 1 : 0;
            $user->is_accounting=($data['accounting_check']) ? 1 : 0;
            // $user->active_status=0;
            $user->save();
            return redirect()->action('UserController@index')->with('flash_message_success','Employee has been added successfully');
        }
        $departments=Department::get();
        return view('admin.admin_manager.users.user_add')->with(compact('departments'));
    }
    public function edituser(Request $request,$id=null){
        
        if($request->isMethod('post')){
            $data = $request->all();
            User::where(['id'=>$id])->update(['fullname'=>$data['user_lastname'].' '.$data['user_firstname'],'lastname'=>$data['user_lastname'],'firstname'=>$data['user_firstname'],'departmentid'=>$data['department'],'password'=>$data['user_password'],'rates'=>$data['user_rate'],'education'=>$data['user_education'],'citizenship'=>$data['user_citizenship'],'supervisor'=>$data['user_supervisor'],'is_timesheets'=>($data['timesheet_check']) ? 1 : 0,'is_summary'=>($data['summary_check']) ? 1 : 0,'is_accounting'=>($data['accounting_check']) ? 1 : 0]);
            return redirect()->action('UserController@index');
        }
        $userDetails = User::where(['id'=>$id])->first();
        $departments=Department::get();
        return view('admin.admin_manager.users.user_edit')->with(compact('userDetails','departments'));
    }

    public function deleteuser($id = null){
        User::where(['id'=>$id])->delete();
        Timesheet::where(['user_id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Project has been deleted successfully');
    }
}
