<?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <?php echo e(csrf_field()); ?>

        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">Total Hours per Employees</span>
                        </div>
                        
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-1">
                                    <span class="caption-subject font-red sbold uppercase">Employees</span>  
                                </div>
                                <div class="col-md-3">
                                    <select id="employee_sel" class="form-control input-sm select2-multiple">
                                        <option></option>
                                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->fullname); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="employeesContent" data-url=<?php echo e(route('employees.content')); ?>></div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var default_employee = '';
        default_load(default_employee);

        $("#employee_sel").change(function(e){
            e.preventDefault();
            default_load($(this).val());
        })
        function default_load (default_employee) {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: $("#employeesContent").data('url'),
                data: {employee_id: default_employee},
                success: function(data) {
                    $("#employeesContent").html(data.content);
                }
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layouts.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\timesheet\resources\views/admin/project_manager/employees.blade.php ENDPATH**/ ?>