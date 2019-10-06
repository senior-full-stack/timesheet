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
                    <form class="form-horizontal" method="post" action="{{ url('admin/disciplines/edit/'.$disciplineDetails->discipline_id) }}" name="edit_discipline" id="edit_discipline" novalidate="novalidate">{{ csrf_field() }}
                        <div class="form-body">
                            <h3 class="form-section">Edit Discipline</h3>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Discipline Nr.</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="discipline_number" id="discipline_number" value="{{ $disciplineDetails->discipline_number }}" />
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Discipline Type</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="discipline_type" id="discipline_type" value="{{ $disciplineDetails->discipline_type }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <input type="submit" value="Edit Discipline" class="btn btn-success">
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