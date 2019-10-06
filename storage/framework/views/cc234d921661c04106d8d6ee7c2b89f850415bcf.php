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
                            <span class="caption-subject font-red sbold uppercase">Resource List</span>
                        </div>
                        
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="<?php echo e(url('/admin/resources/create')); ?>" class="btn btn-success"><span><i class="fa fa-plus"></i>Add New Resource</span></a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                                <tr>
                                    <th style="width: 20%;"> Resource Nr. </th>
                                    <th style="width: 40%;"> Resource Type </th>
                                    <th style="width: 20%;"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="center"><?php echo e($resource->resource_number); ?></td>
                                    <td class="center"><?php echo e($resource->resource_type); ?></td>
                                    <td class="center ">
                                        <a href="<?php echo e(url('/admin/resources/edit/'.$resource->resource_id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit "></i> Edit</a>                                                       
                                        <a href="<?php echo e(url('/admin/resources/delete/'.$resource->resource_id)); ?>" data-method="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash "></i> Delete</a>
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
<?php echo $__env->make('layouts.admin_layouts.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\timesheet\resources\views/admin/admin_manager/resources/index.blade.php ENDPATH**/ ?>