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
                    <form class="form-horizontal" method="post" action="{{ url('admin/projects/edit/'.$projectDetails->project_id) }}" name="edit_project" id="edit_project" novalidate="novalidate">{{ csrf_field() }}
                        <div class="form-body">
                            <h3 class="form-section">Edit Project</h3>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Project Nr.</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="project_number" id="project_number" value="{{ $projectDetails->project_number }}" />
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Project Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="project_name" id="project_name" value="{{ $projectDetails->project_name }}"/>
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Total Hrs.</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="project_totalhrs" id="project_totalhrs" value="{{ $projectDetails->project_totalhrs }}"/>
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Project Rate</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="project_rate" id="project_rate" value="{{ $projectDetails->project_rate }}"/>
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