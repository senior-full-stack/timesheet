<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
        <thead>
            <tr>
                <th rowspan="2" style="width: 10%;"> Project Name </th>
                <th colspan="15" style="width: 40%;">Total Hours</th>
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
                <th style="width: 5%;"> Rates </th>
                <th style="width: 5%;"> Total Budget </th>
            </tr>
        </thead>
        <tbody>
            <?php
                $total_sum_col=array(0,0,0,0,0,0,0,0,0,0,0,0);
                $total_rates=0;
                $total_budget=0;
            ?>
            <?php if(count($result_datas)>0): ?>
                <?php $__currentLoopData = $result_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                        $total_budget+=$result_data->sum*$result_data->project_rate;
                        $total_sum=0;
                        $total_rates+=(double)$result_data->project_rate;
                    ?>
                    <tr>
                        <td class="center"><?php echo e($result_data->project_name); ?></td>
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
                        <td class="center"><?php echo e($result_data->project_rate); ?></td>
                        <td class="center"><?php echo e($total_sum*$result_data->project_rate); ?></td>
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
                    <td class="center"><?php echo e(round($total_rates/count($result_datas),2)); ?></td>
                    <td class="center"><?php echo e($total_budget); ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table><?php /**PATH E:\Laravel\timesheet\resources\views/admin/project_manager/employee_content.blade.php ENDPATH**/ ?>