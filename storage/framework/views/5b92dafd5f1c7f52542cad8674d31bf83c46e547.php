<?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<!-- BEGIN CONTENT -->

    <!-- BEGIN CONTENT BODY -->
<div class="page-content">
    <form method="post" action="<?php echo e(url('/accounting/staff_rates_store')); ?>"><?php echo e(csrf_field()); ?>

        
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">Staff Rates</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-1">
                                        <i class="icon-user"></i>  <span class="caption-subject font-red sbold uppercase">Employees</span>  
                                </div>
                                <div class="col-md-3">
                                    <select id="employee_sel" name="employee_id" class="form-control input-sm select2-multiple" style="    border-radius: 4px !important;">
                                        <option></option>
                                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($employee->id); ?>" <?php echo e(($employee->id==$employee_id) ? "selected" : ""); ?>><?php echo e($employee->fullname); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-8" >
                                    <button type="submit" class="btn green-jungle" value="Save">
                                        <i class="icon-pencil"></i>
                                        <span>Save</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="staffratesContent" data-url=<?php echo e(route('front_staffrates.content')); ?>></div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </form>
</div>
    
    <!-- END CONTENT BODY -->

<!-- END CONTENT -->
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var default_employee = $("#employee_sel").val();
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
                url: $("#staffratesContent").data('url'),
                data: {employee_id: default_employee},
                success: function(data) {
                    $("#staffratesContent").html(data.content);
                }
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front_layouts.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\timesheet\resources\views/accounting/staff_rates.blade.php ENDPATH**/ ?>