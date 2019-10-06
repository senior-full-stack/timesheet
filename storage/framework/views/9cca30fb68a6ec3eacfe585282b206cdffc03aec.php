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
                            <span class="caption-subject font-red sbold uppercase">Project List</span>
                        </div>
                        
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="<?php echo e(url('/admin/projects/create')); ?>" class="btn btn-success"><span><i class="fa fa-plus"></i>Add New Project</span></a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                                <tr>
                                    <th style="width: 20%;"> Project Nr. </th>
                                    <th style="width: 20%;"> Project Name </th>
                                    <th style="width: 20%;"> Total Hrs. </th>
                                    <th style="width: 20%;"> Rates </th>
                                    <th style="width: 20%;"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="center"><?php echo e($project->project_number); ?></td>
                                    <td class="center"><?php echo e($project->project_name); ?></td>
                                    <td class="center"><?php echo e($project->project_totalhrs); ?></td>
                                    <td class="center"><?php echo e($project->project_rate); ?></td>
                                    <td class="center ">
                                        <a href="<?php echo e(url('/admin/projects/edit/'.$project->project_id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit "></i> Edit</a>                                                       
                                        <a href="<?php echo e(url('/admin/projects/delete/'.$project->project_id)); ?>" data-method="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash "></i> Delete</a>
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
<?php echo $__env->make('layouts.admin_layouts.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\timesheet\resources\views/admin/admin_manager/projects/index.blade.php ENDPATH**/ ?>