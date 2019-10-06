<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
    <thead>
        <tr>
            <th style="width: 5%;"> Project Nr. </th>
            <th style="width: 10%;"> Project Name </th>
            <th style="width: 10%;"> Total Hrs </th>
            <th style="width: 10%;"> Contract Rate </th>
            <th style="width: 10%;"> Contract Exhaustion </th>
            <th style="width: 5%;"> Actual Rate </th>
            <th style="width: 5%;"> Actual Exhaustion </th>
            <th style="width: 5%;"> Contract Rate % </th>
            <th style="width: 5%;"> Profit Rate % </th>
        </tr>
    </thead>
    <tbody>
        <?php
            $total_sum_col=array(0,0,0,0,0,0,0,0,0,0,0,0);
            $total_rates=0;
        ?>
        <?php if(count($result_datas)>0): ?>
            <?php $__currentLoopData = $result_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                    $total_sum_col[2]+=(double)$result_data->sum;
                    $total_sum_col[3]+=(double)$result_data->project_rate;
                    $total_sum_col[4]+=(double)$result_data->sum * $result_data->project_rate;
                    $total_sum_col[5]+=(double)$result_data->project_actual_rate;
                    $total_sum_col[6]+=(double)$result_data->sum*$result_data->project_actual_rate;
                    if($result_data->project_actual_rate){
                        $total_sum_col[7]+=(double)$result_data->project_rate/$result_data->project_actual_rate*100;
                        $total_sum_col[8]+=(double)$result_data->project_rate/$result_data->project_actual_rate*100;
                    }
                ?>
                <tr>
                    <td class="center"><?php echo e($result_data->project_number); ?></td>
                    <td class="center"><?php echo e($result_data->project_name); ?></td>
                    <td class="center"><?php echo e($result_data->sum); ?></td>
                    <td class="center"><?php echo e($result_data->project_rate); ?></td>
                    <td class="center"><?php echo e($result_data->sum * $result_data->project_rate); ?></td>
                    <td class="center"><input type='number' name='actual_rate[]' onchange="calc(this)" style='width: 100%;height: 100%; border: none;' data-initial-value='<?php echo e($result_data->project_actual_rate); ?>' value='<?php echo e($result_data->project_actual_rate); ?>' /></td>
                    <td class="center"><?php echo e($result_data->sum*$result_data->project_actual_rate); ?></td>  
                    <td class="center"><?php echo e(($result_data->project_actual_rate) ? round($result_data->project_rate/$result_data->project_actual_rate*100,2) : ''); ?></td>    
                    <td class="center"><?php echo e(($result_data->project_actual_rate) ? round($result_data->project_rate/$result_data->project_actual_rate*100,2) : ''); ?></td>  
                    <input type='hidden' name='project_id[]' value='<?php echo e($result_data->project_id); ?>' />
                </tr>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php 
                $total_sum=0;
            ?>
            <tr>
                <td colspan="2" class="center">Total</td>
                <td class="center" id="total_time_sum"><?php echo e($total_sum_col[2]); ?></td>
                <td class="center"><?php echo e(round($total_sum_col[3]/count($result_datas),2)); ?></td>
                <td class="center"><?php echo e($total_sum_col[4]); ?></td>
                <td class="center" id="average_actual_rate"><?php echo e(round($total_sum_col[5]/count($result_datas),2)); ?></td>
                <td class="center" id="actual_sum"><?php echo e($total_sum_col[6]); ?></td>
                <td class="center" id="percent_rate"><?php echo e(round($total_sum_col[7]/count($result_datas),2)); ?></td>
                <td class="center" id="percent_exhaustion"><?php echo e(round($total_sum_col[8]/count($result_datas),2)); ?></td>
            </tr>
            <input type="hidden" id="row_count" value="<?php echo e(count($result_datas)); ?>" />
        <?php endif; ?>
    </tbody>
</table>



<script type="text/javascript" src="/js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        
    });
    function calc(sel){
        var pre_actual_rate=$(sel).attr("data-initial-value");
        var pre_actual_exhaustion=$(sel).parent().parent().children().eq(6).text();
        var pre_percent_rate=$(sel).parent().parent().children().eq(7).text();
        var percent_exhaustion=$(sel).parent().parent().children().eq(8).text();

        var total_hrs=$(sel).parent().parent().children().eq(2).text();
        var constract_rate=$(sel).parent().parent().children().eq(3).text();
        var actual_rate=$(sel).val();
        

        // console.log($(sel).parent().parent().children().eq(1).text());
        $(sel).parent().parent().children().eq(6).html(total_hrs*actual_rate);
        $(sel).parent().parent().children().eq(7).html(Number(constract_rate/actual_rate*100).toFixed(2));
        $(sel).parent().parent().children().eq(8).html(Number(constract_rate/actual_rate*100).toFixed(2));
        var pre_average_actual_rate =Number($("#average_actual_rate").html());
        // if(pre_actual_rate>actual_rate){
            // $("#average_actual_rate").html(Number(pre_average_actual_rate+(pre_actual_rate-actual_rate)/$("#row_count").val()).toFixed(2));
        // }else{
            $("#average_actual_rate").html(Number(pre_average_actual_rate-(pre_actual_rate-actual_rate)/$("#row_count").val()).toFixed(2));
        // }
        var temp_totalhrs =$("#total_time_sum").html();
        var temp_auctual_rate =Number($("#average_actual_rate").html());
        $("#actual_sum").html(Number(temp_totalhrs*temp_auctual_rate).toFixed(2));
        $(sel).attr("data-initial-value",actual_rate);
    }
</script>
<?php /**PATH E:\Laravel\timesheet\resources\views/accounting/staff_rates_content.blade.php ENDPATH**/ ?>