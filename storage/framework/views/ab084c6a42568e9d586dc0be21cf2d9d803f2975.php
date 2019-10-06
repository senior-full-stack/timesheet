<?php $__env->startSection('content'); ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">Employee List</span>
                        </div>
                        
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="<?php echo e(url('/admin/users/create')); ?>" class="btn btn-success"><span><i class="fa fa-plus"></i>Add New Employee</span></a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                                <tr>
                                    <th> Employee ID </th>
                                    <th> Full Name </th>
                                    <th> Last Name </th>
                                    <th> Fisrt Name </th>
                                    <th> Department </th>
                                    <th> Password </th>
                                    <th> Rates </th>
                                    
                                    <!-- <th> is_Timesheets </th>
                                    <th> is_Summary </th>
                                    <th> is_Accounting </th> -->
                                    <th> Education </th>
                                    <th> Citizenship </th>
                                    <th> Supervisor </th>
                                    <th> Permission </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="center"><?php echo e($user->id); ?></td>
                                    <td class="center"><?php echo e($user->fullname); ?></td>
                                    <td class="center"><?php echo e($user->lastname); ?></td>
                                    <td class="center"><?php echo e($user->firstname); ?></td>
                                    <td class="center">
                                        <select style='width: 100%;height: 100%;' class='department' name='department'>
                                            <option value=''></option>
                                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($department->id); ?>" <?php echo e($department->id==$user->departmentid ? 'selected' : ''); ?>><?php echo e($department->type); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select></td>
                                    <td class="center"><?php echo e($user->password); ?></td>
                                    <td class="center"><?php echo e($user->rates); ?></td>
                                    <td class="center"><?php echo e($user->education); ?></td>
                                    <td class="center"><?php echo e($user->citizenship); ?></td>
                                    <td class="center"><?php echo e($user->supervisor); ?></td>
                                    <td class="center">
                                        <div class="md-checkbox-inline">
                                            <div class="md-checkbox has-info">
                                                <input type="checkbox" id="timesheet_check" disabled="" class="md-check" <?php echo e(($user->is_timesheets==1) ? "checked" : ""); ?>>
                                                <label for="checkbox12">
                                                    <span class="inc"></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Timesheet </label>
                                            </div>
                                            <div class="md-checkbox has-info">
                                                <input type="checkbox" id="summary_check" disabled="" class="md-check" <?php echo e(($user->is_summary==1) ? "checked" : ""); ?>>
                                                <label for="checkbox12">
                                                    <span class="inc"></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Summary </label>
                                            </div>
                                            <div class="md-checkbox has-info">
                                                <input type="checkbox" id="accounting_check" disabled="" class="md-check" <?php echo e(($user->is_accounting==1) ? "checked" : ""); ?>>
                                                <label for="checkbox12">
                                                    <span class="inc"></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Accounting </label>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="center ">
                                        <a href="<?php echo e(url('/admin/users/edit/'.$user->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit "></i> Edit</a>                                                       
                                        <a href="<?php echo e(url('/admin/users/delete/'.$user->id)); ?>" data-method="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash "></i> Delete</a>
                                    </td>
                                </tr>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layouts.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\timesheet\resources\views/admin/admin_manager/users/index.blade.php ENDPATH**/ ?>