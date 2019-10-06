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
                    <form class="form-horizontal" method="post" action="{{ url('admin/clients/edit/'.$clientDetails->id) }}" name="edit_client" id="edit_client" novalidate="novalidate">{{ csrf_field() }}
                        <div class="form-body">
                            <h3 class="form-section">Edit Client</h3>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Client Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="client_name" id="client_name" value="{{ $clientDetails->client_name }}" required/>
                                    {{-- @if ($clientDetails->client_name == NULL)
                                    <label style="color: red"> enter your name <label>
                                    @endif --}}
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Client Email</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="client_email" id="client_email" value="{{ $clientDetails->client_email }}" required/>
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Client Address</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="client_addr" id="client_addr" value="{{ $clientDetails->client_addr }}" required/>
                                </div>
                            </div>                            
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Phone Number</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="client_phone" id="client_phone" value="{{ $clientDetails->client_phone }}" required/>
                                </div>
                                
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Person to Contact</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="client_contact" id="client_contact" value="{{ $clientDetails->client_contact }}" />
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Dicipline</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="client_dicip" id="client_dicip" value="{{ $clientDetails->client_dicip }}" />
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Importance Level</label>
                                <div class="col-md-4">
                                    <select name="importance_level" class="form-control input-sm select2-multiple">
                                        <option></option>
                                        <option value="high" {{ ($clientDetails->importance_level=="high") ? "selected" : "" }}>high</option>
                                        <option value="medium" {{ ($clientDetails->importance_level=="medium") ? "selected" : "" }}>medium</option>
                                        <option value="low" {{ ($clientDetails->importance_level=="low") ? "selected" : "" }}>low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Comments</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" name="client_comments" id="client_comments" col="10" row="5">
                                    {{ $clientDetails->client_comments }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <input type="submit" value="Edit Client" class="btn btn-success">
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