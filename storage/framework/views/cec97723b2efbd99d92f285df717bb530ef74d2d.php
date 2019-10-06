<?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<!-- BEGIN CONTENT -->

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
                            <span class="caption-subject font-red sbold uppercase">Total Hours per Phases</span>
                        </div>
                        
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="width: 10%;"> Phase </th>
                                    <th colspan="13" style="width: 40%;">Total Hours</th>
                                </tr>
                                <tr>
                                    <th style="width: 5%;"> January </th>
                                    <th style="width: 5%;"> February </th>
                                    <th style="width: 5%;"> March </th>
                                    <th style="width: 5%;"> April </th>
                                    <th style="width: 5%;"> May </th>
                                    <th style="width: 5%;"> June </th>
                                    <th style="width: 5%;"> July </th>
                                    <th style="width: 5%;"> August </th>
                                    <th style="width: 5%;"> September </th>
                                    <th style="width: 5%;"> October </th>
                                    <th style="width: 5%;"> November </th>
                                    <th style="width: 5%;"> December </th>
                                    <th style="width: 5%;"> Total </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $total_sum_col=array(0,0,0,0,0,0,0,0,0,0,0,0);
                                ?>
                                <?php if(count($result_datas)>0): ?>
                                    <?php $__currentLoopData = $result_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php 
                                            $total_sum=0;
                                        ?>
                                        <tr>
                                            <td class="center"><?php echo e($result_data->phase_name); ?></td>
                                            <?php for($i=1; $i<13; $i++): ?>
                                                <?php if($result_data->month_val==$i): ?>
                                                    <td class="center"><?php echo e($result_data->sum); ?></td>
                                                    <?php 
                                                        $total_sum+=$result_data->sum;
                                                        $total_sum_col[$i-1]+=$result_data->sum;
                                                    ?>
                                                <?php else: ?>
                                                    <td class="center"></td>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                            <td class="center"><?php echo e($total_sum); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php 
                                        $total_sum=0;
                                    ?>
                                    <tr>
                                        <td class="center">Total</td>
                                        <?php $__currentLoopData = $total_sum_col; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td class="center"><?php echo e($value); ?></td>
                                            <?php 
                                                $total_sum+=$value;
                                            ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <td class="center"><?php echo e($total_sum); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    
    <!-- END CONTENT BODY -->

<!-- END CONTENT -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front_layouts.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\timesheet\resources\views/project_manager/phases.blade.php ENDPATH**/ ?>