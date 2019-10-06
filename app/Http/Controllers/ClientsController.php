<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
{
    //
    public function index(){
        $clients=Client::get();
        return view('admin.admin_manager.clients.index')->with(compact('clients'));
    }
    public function addClient(Request $request){
        
        if ($request->isMethod('post')){
            $data=$request->all();
            $client=new Client;
            $client->client_name=$data['client_name'];
            $client->client_addr=$data['client_addr'];
            $client->client_email=$data['client_email'];
            $client->client_phone=$data['client_phone'];
            $client->client_contact=$data['client_contact'];
            $client->client_dicip=$data['client_dicip'];
            $client->importance_level=$data['importance_level'];
            $client->client_comments=$data['client_comments'];
            $client->save();
            return redirect()->action('ClientsController@index')->with('flash_message_success','client has been added successfully');
        }
        return view('admin.admin_manager.clients.client_add');
    }
    public function editClient(Request $request,$id=null){
        
        if($request->isMethod('post')){            
            $data = $request->all();
            // if($data['client_name'] == NULL || $data['client_email'] == NULL || $data['client_addr'] == NULL || $data['client_phone'] == NULL){
            //     $clientDetails->id=$id;
            //     $clientDetails['client_name']=$data['client_name'];
            //     $clientDetails['client_email']=$data['client_email'];
            //     $clientDetails['client_addr']=$data['client_addr'];
            //     $clientDetails['client_phone']=$data['client_phone'];
            //     $clientDetails['client_contact']=$data['client_contact'];
            //     $clientDetails['client_dicip']=$data['client_dicip'];
            //     $clientDetails['client_comments']=$data['client_comments'];
            //     return view('admin.admin_manager.clients.client_edit')->with(compact('clientDetails'));
            // }
            // else {
            //     Client::where(['id'=>$id])->update(['client_name'=>$data['client_name'],'client_email'=>$data['client_email'],'client_addr'=>$data['client_addr'],'client_phone'=>$data['client_phone']
            //     ,'client_contact'=>$data['client_contact'],'client_dicip'=>$data['client_dicip'],'client_comments'=>$data['client_comments']]);
            //     return redirect()->back()->with('flash_message_success', 'client has been updated successfully');
            // }
            $this->validate($request, [
                'client_name' => 'required',
                'client_email' => 'required|email|unique:users,email',
                'client_addr' => 'required',
                'client_phone' => 'required'
                ]);
            Client::where(['id'=>$id])->update(['client_name'=>$data['client_name'],'client_email'=>$data['client_email'],'client_addr'=>$data['client_addr'],'client_phone'=>$data['client_phone']
            ,'client_contact'=>$data['client_contact'],'client_dicip'=>$data['client_dicip'],'client_comments'=>$data['client_comments'],'importance_level'=>$data['importance_level']]);
            return redirect('admin/clients');
            
        }
        $clientDetails = Client::where(['id'=>$id])->first();
        return view('admin.admin_manager.clients.client_edit')->with(compact('clientDetails'));
    }

    public function deleteClient($id = null){
        Client::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'client has been deleted successfully');
    }
}
