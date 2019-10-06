<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
use App\Client;

class ProposalsController extends Controller
{
    //
    public function index(){
        $proposals=Proposal::join('clients', 'proposals.client_id', '=', 'clients.id')
            ->select('proposals.proposal_id', 'clients.id as client_id', 'clients.client_name','clients.client_email','clients.client_addr'
                        ,'clients.client_phone', 'clients.client_contact', 'clients.client_dicip', 'clients.client_comments'
                        ,'proposals.proposal_name', 'proposals.startDate', 'proposals.endDate', 'proposals.importance_level')
            ->orderby('proposals.created_at','desc')
            ->get();
        return view('admin.admin_manager.proposals.index')->with(compact('proposals'));
    }
    public function addProposal(Request $request){
        $clients=Client::get();
        if ($request->isMethod('post')){
            $data=$request->all();
            $proposal=new Proposal;
            $proposal->proposal_name=$data['proposal_name'];
            $proposal->client_id=$data['client_id'];
            $proposal->startDate=$data['startDate'];
            $proposal->endDate=$data['endDate'];
            $proposal->importance_level=$data['importance_level'];
            $proposal->save();
            return redirect()->action('ProposalsController@index')->with('flash_message_success','Proposal has been added successfully');
        }
        return view('admin.admin_manager.proposals.proposal_add')->with(compact('clients'));
    }
    public function editProposal(Request $request,$id=null){

        if($request->isMethod('post')){
            $data = $request->all();
            Proposal::where(['proposal_id'=>$id])->update(['proposal_name'=>$data['proposal_name'],'client_id'=>$data['client_id'],'startDate'=>$data['startDate'],'endDate'=>$data['endDate'],'importance_level'=>$data['importance_level']]);
            return redirect()->action('ProposalsController@index');
        }
        $clients=Client::get();
        $proposalDetails = Proposal::where(['proposal_id'=>$id])->first();
        return view('admin.admin_manager.proposals.proposal_edit')->with(compact('proposalDetails', 'clients'));
    }

    public function deleteProposal($id = null){
        Proposal::where(['proposal_id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Proposal has been deleted successfully');
    }
}
