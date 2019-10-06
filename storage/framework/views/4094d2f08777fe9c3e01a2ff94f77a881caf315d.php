<?php $__env->startSection('content'); ?>

<div class="page-content-wrapper">
  
  <div class="page-content"><hr>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered" id="form_wizard_1">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form class="form-horizontal" method="post" action="<?php echo e(url('/admin/users/edit/'.$userDetails->id)); ?>" novalidate="novalidate"><?php echo e(csrf_field()); ?>

                        <div class="form-body">
                            <h3 class="form-section">Edit Employee</h3>
                            
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Last Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="user_lastname" value="<?php echo e($userDetails->lastname); ?>" />
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Fisrt Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="user_firstname" value="<?php echo e($userDetails->firstname); ?>" />
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Department</label>
                                <div class="col-md-4">
                                    <select style='width: 100%;height: 100%;' class='department' name='department'>
                                        <option value=''></option>
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($department->id); ?>" <?php echo e($department->id==$userDetails->departmentid ? 'selected' : ''); ?>><?php echo e($department->type); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Password</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="user_password" value="<?php echo e($userDetails->password); ?>" />
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Rates</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="user_rate" value="<?php echo e($userDetails->rates); ?>" />
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Education</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="user_education" value="<?php echo e($userDetails->education); ?>" />
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Citizenship</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="user_citizenship" value="<?php echo e($userDetails->citizenship); ?>" />
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Supervisor</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="user_supervisor" value="<?php echo e($userDetails->supervisor); ?>" />
                                </div>
                            </div>

                            <div class="form-group has-success">
                                <label class="control-label col-md-3" >Permission</label>
                                <div class="md-checkbox-list col-md-4">
                                    <div class="md-checkbox has-success">
                                        <input type="checkbox" id="timesheet_check" class="md-check" <?php echo e(($userDetails->is_timesheets==1) ? "checked" : ""); ?>>
                                        <input type="hidden" id="timesheet_check_temp" class="md-check" name="timesheet_check" value="<?php echo e(($userDetails->is_timesheets==1) ? '1' : ''); ?>">
                                        <label for="timesheet_check">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Timesheet </label>
                                    </div>
                                    <div class="md-checkbox has-error">
                                        <input type="checkbox" id="summary_check" class="md-check" <?php echo e(($userDetails->is_summary==1) ? "checked" : ""); ?>>
                                        <input type="hidden" id="summary_check_temp" class="md-check" name="summary_check" value="<?php echo e(($userDetails->is_summary==1) ? '1' : ''); ?>">
                                        <label for="summary_check">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Project Manager </label>
                                    </div>
                                    <div class="md-checkbox has-warning">
                                        <input type="checkbox" id="accounting_check" class="md-check" <?php echo e(($userDetails->is_accounting==1) ? "checked" : ""); ?>>
                                        <input type="hidden" id="accounting_check_temp" class="md-check" name="accounting_check" value="<?php echo e(($userDetails->is_accounting==1) ? '1' : ''); ?>">
                                        <label for="accounting_check">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Accounting </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <input type="submit" value="Edit Employee" class="btn btn-success">
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
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#timesheet_check").click(function(){
            if($(this).is(":checked")){
                $("#timesheet_check_temp").val("1");
                console.log($("#timesheet_check_temp").val());
            }else{
                $("#timesheet_check_temp").val("");
            }
        });
        $("#summary_check").click(function(){
            if($(this).is(":checked")){
                $("#summary_check_temp").val("1");
            }else{
                $("#summary_check_temp").val("");
            }
        });
        $("#accounting_check").click(function(){
            if($(this).is(":checked")){
                $("#accounting_check_temp").val("1");
            }else{
                $("#accounting_check_temp").val("");
            }
        });
    });
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layouts.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\timesheet\resources\views/admin/admin_manager/users/user_edit.blade.php ENDPATH**/ ?>