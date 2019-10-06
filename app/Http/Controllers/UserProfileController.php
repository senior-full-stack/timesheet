<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class UserProfileController extends Controller
{
    //
    public function index(){
        session_start();
        $result_userprofile = User::where(['id'=>$_SESSION['user_id']])->first();
        $departments=Department::get();
        return view('user_profile')->with(compact('result_userprofile','departments'));
    }
    public function change_profile_name(Request $request){
        session_start();
        $data=$request->all();
        User::where(['id'=>$_SESSION['user_id']])->update(['password'=>$data['new_password']]);
    
        return redirect()->back()->with('flash_message_success', 'Project has been updated successfully');
    }

    public function change_user_password(Request $request){
        session_start();
        $data=$request->all();
        User::where(['id'=>$_SESSION['user_id']])->update(['fullname'=>$data['user_lastname'].' '.$data['user_firstname'],                  'lastname'=>$data['user_lastname'],'firstname'=>$data['user_firstname'],'departmentid'=>$data['department']]);
    
        return redirect()->back()->with('flash_message_success', 'Project has been updated successfully');
    }

    public function save_user_image(Request $request){
        session_start();
        $data=$request->all();
        
        if ($request->hasFile('bookcover')) {
            $cover = $request->file('bookcover');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('my_files')->put($cover->getFilename().'.'.$extension,  File::get($cover));
            User::where(['id'=>$_SESSION['user_id']])->update(['mime'=>$cover->getClientMimeType(),'original_filename'=>$cover->getClientOriginalName(),'filename'=>$cover->getFilename().'.'.$extension]);
        }
        return redirect()->back()->with('flash_message_success', 'Project has been updated successfully');
        
    }
}
