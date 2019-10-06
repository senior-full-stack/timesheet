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
                            <span class="caption-subject font-red sbold uppercase">Proposal List</span>
                        </div>
                        
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="<?php echo e(url('/admin/proposals/create')); ?>" class="btn btn-success"><span><i class="fa fa-plus"></i>Add New Proposal</span></a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                                <tr>
                                    <th> Proposal Name </th>
                                    <th> Client Name </th>
                                    <th> Client Email </th>
                                    <th> Client Address </th>
                                    <th> Client Phone </th>
                                    <th> Client Contact </th>
                                    <th> Client Dicipline </th>
                                    <th> Client Comments </th>
                                    <th> Start Date </th>
                                    <th> End Date </th>
                                    <th> Importance Level </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="center"><?php echo e($proposal->proposal_name); ?></td>
                                    <td class="center"><?php echo e($proposal->client_name); ?></td>
                                    <td class="center"><?php echo e($proposal->client_email); ?></td>
                                    <td class="center"><?php echo e($proposal->client_addr); ?></td>
                                    <td class="center"><?php echo e($proposal->client_phone); ?></td>
                                    <td class="center"><?php echo e($proposal->client_contact); ?></td>
                                    <td class="center"><?php echo e($proposal->client_dicip); ?></td>
                                    <td class="center"><?php echo e($proposal->client_comments); ?></td>
                                    <td class="center"><?php echo e($proposal->startDate); ?></td>
                                    <td class="center"><?php echo e($proposal->endDate); ?></td>
                                    <td class="center">
                                        <?php if($proposal->importance_level=="high"): ?>
                                        <label class="high"> <?php echo e($proposal->importance_level); ?> </label>
                                        <?php elseif($proposal->importance_level=="medium"): ?>
                                        <label class="medium"> <?php echo e($proposal->importance_level); ?> </label>
                                        <?php elseif($proposal->importance_level=="low"): ?>
                                        <label class="low"> <?php echo e($proposal->importance_level); ?> </label>
                                        <?php else: ?>
                                        <label></label>
                                        <?php endif; ?>
                                    </td>
                                    <td class="center ">
                                        <a href="<?php echo e(url('/admin/proposals/edit/'.$proposal->proposal_id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit "></i> Edit &nbsp&nbsp</a>                                                       
                                        <a href="<?php echo e(url('/admin/proposals/delete/'.$proposal->proposal_id)); ?>" data-method="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash "></i> Delete</a>
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
<?php echo $__env->make('layouts.admin_layouts.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\timesheet\resources\views/admin/admin_manager/proposals/index.blade.php ENDPATH**/ ?>