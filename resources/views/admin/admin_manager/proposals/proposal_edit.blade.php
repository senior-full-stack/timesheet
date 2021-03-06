@extends('layouts.admin_layouts.admin_design')
@section('content')

<div class="page-content-wrapper">
  
  <div class="page-content"><hr>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered" id="form_wizard_1">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form class="form-horizontal" method="post" action="{{ url('admin/proposals/edit/'.$proposalDetails->proposal_id) }}" name="edit_proposal" id="edit_proposal" novalidate="novalidate">{{ csrf_field() }}
                        <div class="form-body">
                            <h3 class="form-section">Edit Proposal</h3>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Proposal Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="proposal_name" id="proposal_name" value={{ $proposalDetails->proposal_name }} />
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Client Name</label>
                                <div class="col-md-4">
                                    <select id="proposal_cel" name="client_id" class="form-control input-sm select2-multiple">
                                        <option></option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" {{ ($proposalDetails->client_id==$client->id) ? "selected" : "" }}>{{$client->client_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Start Date</label>
                                <div class="col-md-4">
                                    <input type="date" name="startDate" max="3000-12-31" min="1000-01-01" class="form-control" value={{ $proposalDetails->startDate }}>
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">End Date</label>
                                <div class="col-md-4">
                                    <input type="date" name="endDate" max="3000-12-31" min="1000-01-01" class="form-control" value={{ $proposalDetails->endDate }}>
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Importance Level</label>
                                <div class="col-md-4">
                                    <select name="importance_level" class="form-control input-sm select2-multiple">
                                        <option value="high" {{ ($proposalDetails->importance_level=="high") ? "selected" : "" }}>high</option>
                                        <option value="medium" {{ ($proposalDetails->importance_level=="medium") ? "selected" : "" }}>medium</option>
                                        <option value="low" {{ ($proposalDetails->importance_level=="low") ? "selected" : "" }}>low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <input type="submit" value="Edit Project" class="btn btn-success">
                                    <!-- <button type="submit" class="btn green">Submit</button>
                                    <button type="button" class="btn default">Cancel</button> -->
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
  </div>
</div>

@endsection