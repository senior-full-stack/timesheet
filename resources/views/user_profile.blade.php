@extends('layouts.front_layouts.front_design')
<link href="/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
@section('content')
<div class="page-container">
    <br>
    <!-- BEGIN CONTENT -->
    {{-- <div class="page-content-wrapper"> --}}
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{ url('/employee_dashboard') }}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>User</span>
                    </li>
                </ul>
                
            </div>
            <!-- END PAGE BAR -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet ">
                            <!-- SIDEBAR USERPIC -->
                            <div class="">
                                @if($result_userprofile->filename)
                                    <img src="{{ asset('uploads/'.$result_userprofile->filename) }}" class="img-responsive" alt="" /> </div>
                                @else
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" class="img-responsive" alt="" /> </div>
                                @endif
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"> Marcus Doe </div>
                                <div class="profile-usertitle-job"> Developer </div>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->
                            {{-- <div class="profile-userbuttons">
                                <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                                <button type="button" class="btn btn-circle red btn-sm">Message</button>
                            </div> --}}
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- SIDEBAR MENU -->
                            {{-- <div class="profile-usermenu">
                                <ul class="nav">
                                    <li>
                                        <a href="page_user_profile_1.html">
                                            <i class="icon-home"></i> Overview </a>
                                    </li>
                                    <li class="active">
                                        <a href="page_user_profile_1_account.html">
                                            <i class="icon-settings"></i> Account Settings </a>
                                    </li>
                                    <li>
                                        <a href="page_user_profile_1_help.html">
                                            <i class="icon-info"></i> Help </a>
                                    </li>
                                </ul>
                            </div> --}}
                            <!-- END MENU -->
                        </div>
                        <!-- END PORTLET MAIN -->
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light ">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <!-- PERSONAL INFO TAB -->
                                            <div class="tab-pane active" id="tab_1_1">
                                                <form role="form" action="{{ url('/user_profilename_change') }}">{{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label class="control-label">First Name</label>
                                                        <input type="text"  name="user_firstname" class="form-control" value="{{ $result_userprofile->firstname }}"/> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Last Name</label>
                                                        <input type="text" name="user_lastname" class="form-control" value="{{ $result_userprofile->lastname }}"/> </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label">Development</label>
                                                        <select class="form-control" name="department">
                                                            <option value=''></option>
                                                            @foreach($departments as $department)
                                                            <option value="{{ $department->id }}" {{ $department->id==$result_userprofile->departmentid ? 'selected' : '' }}>{{ $department->type }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="margiv-top-10">
                                                        <input type="submit" value="Save Changes" class="btn green">
                                                        {{-- <a href="javascript:;" class="btn green"> Save Changes </a> --}}
                                                        <a href="/employee_dashboard" class="btn default"> Cancel </a>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END PERSONAL INFO TAB -->
                                            <!-- CHANGE AVATAR TAB -->
                                            <div class="tab-pane" id="tab_1_2">
                                                <p> </p>
                                                <form action="{{ url('user_profileimage_save') }}" method="POST" enctype="multipart/form-data">{{ csrf_field() }}
                                                    <div class="form-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                @if($result_userprofile->filename)
                                                                    <img src="{{ asset('uploads/'.$result_userprofile->filename) }}" alt="" /> </div>
                                                                @else
                                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                @endif
                                                               
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                            </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="bookcover"></span>
                                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="margin-top-10">
                                                        <input type="submit" value="Submit" class="btn green">
                                                        {{-- <a href="javascript:;" class="btn green"> Submit </a> --}}
                                                        <a href="/employee_dashboard" class="btn default"> Cancel </a>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END CHANGE AVATAR TAB -->
                                            <!-- CHANGE PASSWORD TAB -->
                                            <div class="tab-pane" id="tab_1_3">
                                                <form action="{{ url('user_password_change') }}" method="POST" id="frmpasswordchange">
                                                    <div class="form-group">
                                                        <label class="control-label">Current Password</label>
                                                        <input type="password" class="form-control" id="confirm_password" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">New Password</label>
                                                        <input type="password" class="form-control" id="new_password" name="new_password" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Re-type New Password</label>
                                                        <input type="password" class="form-control" id="renew_password" /> </div>
                                                    <div class="margin-top-10">
                                                        <input type="submit" id="change_password" value="Change Password" class="btn green">
                                                        {{-- <a href="javascript:;" class="btn green"> Change Password </a> --}}
                                                        <a href="/employee_dashboard" class="btn default"> Cancel </a>
                                                    </div>
                                                    <input type="hidden" class="form-control" id="current_password" value="{{ $result_userprofile->password }}"/> </div>
                                                </form>
                                            </div>
                                            <!-- END CHANGE PASSWORD TAB -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE CONTENT -->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    {{-- </div> --}}
    <!-- END CONTENT -->
</div>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script>
    $("#change_password").on("click", function(e){
        e.preventDefault();
        if($("#confirm_password").val()!=$("#current_password").val()){
            alert("Old Password is Incorrect!");
            return;
        }
        if($("#new_password").val()!=$("#renew_password").val()){
            alert("The passwords you entered don't match");
            return;
        }
        if($("#new_password").val()==""){
            alert("New Password is required!");
            return;
        }
        
        $("#frmpasswordchange").serialize();
        $("#frmpasswordchange").submit();
        
    });
</script>
@endsection