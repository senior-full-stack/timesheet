<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
        <thead>
            <tr>
                <th style="width: 5%;"> Project Nr. </th>
                <th style="width: 10%;"> Client Name </th>
                <th style="width: 10%;"> Project Name </th>
                <th style="width: 10%;"> Project Phases </th>
                <th style="width: 10%;"> Project Discipline </th>
                <th style="width: 10%;"> Project Resource Types </th>
                <th style="width: 5%;"> Task Contract Amount </th>
                <th style="width: 5%;"> Contract Amount </th>
                <th style="width: 5%;"> Authorized Budget </th>
                <th style="width: 5%;"> Not Authorized </th>
                <th style="width: 5%;"> Project Budget </th>
                <th style="width: 5%;"> Task Budget </th>
                <th style="width: 5%;"> Contract Exhaustion(AED) </th>
                <th style="width: 5%;"> % of Contract </th>
            </tr>
        </thead>
        <tbody>
            <?php
                $total_sum_col=array(0,0,0,0,0,0,0,0,0,0,0,0);
                $total_exhaustion=0;
                $total_task_contract_amount=0;
                $i=1;
                $pre_project_number="";
                $project_number="";
            ?>
            <?php if(count($result_datas)>0): ?>
                <?php $__currentLoopData = $result_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                        $total_exhaustion+=$result_data->sum * $result_data->project_rate;
                        $total_task_contract_amount+=$result_data->task_contract_amount;

                        $project_number=$result_data->project_number;
                        @if($project_number!=$pre_project_number){
                            
                            $i=1;
                        }
                        $i+=1;
                        $pre_project_number=$project_number;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $result_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                        $task_budget= ($result_data->contractamount) ? $result_data->task_contract_amount/$result_data->contractamount*$result_data->authorizedbudget*0.9 : 0;
                        $percentofconstract=($result_data->authorizedbudget) ? round(1-$total_task_contract_amount/$result_data->authorizedbudget*0.9,2) : 0;
    
                        $total_sum_col[0]+=$result_data->task_contract_amount;
                        $total_sum_col[1]=$result_data->contractamount;
                        $total_sum_col[2]=$result_data->authorizedbudget;
                        $total_sum_col[3]=$result_data->contractamount-$result_data->authorizedbudget;
                        $total_sum_col[4]=$result_data->authorizedbudget*0.9;
                        $total_sum_col[5]+=$task_budget;
                        $total_sum_col[6]+=$result_data->sum * $result_data->project_rate;

                        $project_number=$result_data->project_number;
                    ?>
                    <tr>
                        <?php if($project_number!=$pre_project_number): ?>
                            <td rowspan="<?php echo e(count($result_datas)); ?>" class="center"><?php echo e($result_data->project_number); ?></td>
                            <td rowspan="<?php echo e(count($result_datas)); ?>" class="center">
                                <select id="client_sel" name="client_id" class="form-control input-sm select2-multiple" style="border-radius: 4px !important;">
                                    <option></option>
                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($client->id); ?>" <?php echo e(($client->id==$result_data->clientid) ? "selected" : ""); ?>><?php echo e($client->client_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                
                            <td rowspan="<?php echo e(count($result_datas)); ?>" class="center"><?php echo e($result_data->project_name); ?></td>
                        <?php endif; ?>
                            <td class="center"><?php echo e($result_data->phase_name); ?></td>
                            <td class="center"><?php echo e($result_data->discipline_type); ?></td>
                            <td class="center"><?php echo e($result_data->resource_type); ?></td>
                            <td class="center"><input type='number' min="0" name='task_contract_amount[]' onchange="calc1(this)" style='width: 100%;height: 100%; border: none;' data-initial-value='<?php echo e($result_data->task_contract_amount); ?>' value='<?php echo e($result_data->task_contract_amount); ?>'></td>
                        <?php if($project_number!=$pre_project_number): ?>
                            <td rowspan="<?php echo e(count($result_datas)); ?>" class="center"><input type='number' min="0" name='contract_amount' onchange="calc2(this)" style='width: 100%;height: 100%; border: none;' data-initial-value='<?php echo e($result_data->contractamount); ?>' value='<?php echo e($result_data->contractamount); ?>'></td>
                            <td rowspan="<?php echo e(count($result_datas)); ?>" class="center"><input type='number' min="0" name='authorized_budget' onchange="calc3(this)" style='width: 100%;height: 100%; border: none;' data-initial-value='<?php echo e($result_data->authorizedbudget); ?>' value='<?php echo e($result_data->authorizedbudget); ?>'></td>
                            <td rowspan="<?php echo e(count($result_datas)); ?>" class="center"><?php echo e($result_data->contractamount-$result_data->authorizedbudget); ?></td>
                            <td rowspan="<?php echo e(count($result_datas)); ?>" class="center"><?php echo e($result_data->authorizedbudget*0.9); ?></td>
                        <?php endif; ?>
                        <td class="center"><?php echo e($task_budget); ?></td>
                        <td class="center"><?php echo e($result_data->sum * $result_data->project_rate); ?></td>
                        <?php if($project_number!=$pre_project_number): ?>
                            <td rowspan="<?php echo e(count($result_datas)); ?>" class="center"><?php echo e($percentofconstract); ?></td>
                        <?php endif; ?>
                        
                    </tr>
                    <input type='hidden' name='timesheet_id[]' value='<?php echo e($result_data->id); ?>' />
                    <?php
                        $i+=1;
                        $pre_project_number=$project_number;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <tr>
                    <td colspan="6" class="center">Total</td>
                    <td class="center" id="total_task_contract_amount"><?php echo e($total_sum_col[0]); ?></td>
                    <td class="center" id="total_contract_amount"><?php echo e($total_sum_col[1]); ?></td>
                    <td class="center" id="total_authorized_budget"><?php echo e($total_sum_col[2]); ?></td>
                    <td class="center" id="total_not_authorized"><?php echo e($total_sum_col[3]); ?></td>
                    <td class="center" id="total_project_budget"><?php echo e($total_sum_col[4]); ?></td>
                    <td class="center" id="total_task_budget"><?php echo e($total_sum_col[5]); ?></td>
                    <td class="center" id="total_AED"><?php echo e($total_sum_col[6]); ?></td>
                    
                    <td class="center" id="total_percent_contract"></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <style>
    table, td{
        vertical-align: middle !important;
    }
    </style>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            
        });
        function calc1(sel){
            var pre_value=$(sel).attr("data-initial-value");
            var current_value=$(sel).val();
            var pre_total_value =Number($("#total_task_contract_amount").html());
            
            $("#total_task_contract_amount").html(Number(pre_total_value-(pre_value-current_value)).toFixed(2));
            
            pre_total_value =Number($("#total_task_contract_amount").html());
            var authorized_budget=$(sel).parent().parent().parent().children().eq(0).children().eq(8).children().val();
            if(authorized_budget){
                $(sel).parent().parent().parent().children().eq(0).children().eq(13).html(Number(1-pre_total_value/authorized_budget*0.9).toFixed(2));
            }
            
            $(sel).attr("data-initial-value",current_value);
        }
        function calc2(sel){
            var pre_value=$(sel).attr("data-initial-value");
            var current_value=$(sel).val();
            var pre_total_value =Number($("#total_contract_amount").html());
            
            $("#total_contract_amount").html(Number(pre_total_value-(pre_value-current_value)).toFixed(2));
            
            var authorized_budget=$(sel).parent().parent().children().eq(8).children().val();
            $(sel).parent().parent().children().eq(9).html(current_value-authorized_budget); //Not Authorized value calc
    
            var total_value=Number($("#total_contract_amount").html());
            var total_authorized_budget=Number($("#total_authorized_budget").html());
            $("#total_not_authorized").html(total_value-total_authorized_budget);   //Not Authorized Total value calc
    
            $(sel).attr("data-initial-value",current_value);
        }
        function calc3(sel){
            var pre_value=$(sel).attr("data-initial-value");
            var current_value=$(sel).val();
            var pre_total_value =Number($("#total_authorized_budget").html());
            
            $("#total_authorized_budget").html(Number(pre_total_value-(pre_value-current_value)));
            
            var contract_amount=$(sel).parent().parent().children().eq(7).children().val();
            
            $(sel).parent().parent().children().eq(9).html(contract_amount-current_value); //Not Authorized value calc
            $(sel).parent().parent().children().eq(10).html(Number(current_value*0.9).toFixed(2)); //Project Budget value calc
    
            var project_budget=$(sel).parent().parent().children().eq(10).html();
    
            var totalRowCount = $("#sample_editable_1 tr").length;
            for(var i=1; i<totalRowCount-1; i++){
                // $task_budget= ($result_data->contractamount) ? $result_data->task_contract_amount/$result_data->contractamount*$result_data->authorizedbudget*0.9 : '';
                if(i==1){
                    var task_contract_amount= $(sel).parent().parent().children().eq(6).children().val();
                    var task_budget= (contract_amount) ? task_contract_amount/contract_amount*project_budget : '';
                    $(sel).parent().parent().children().eq(11).html(Number(task_budget).toFixed(2)); //Task Budget value calc
                    
                }else{
                    var task_contract_amount= $(sel).parent().parent().parent().children().eq(i).children().eq(3).children().val();
                    var task_budget= (contract_amount) ? task_contract_amount/contract_amount*project_budget : '';
                    $(sel).parent().parent().parent().children().eq(i).children().eq(4).html(Number(task_budget).toFixed(2));
                }
            }
    
            var total_value=Number($("#total_authorized_budget").html());
            var total_contract_amount=Number($("#total_contract_amount").html());
            $("#total_not_authorized").html(total_contract_amount-total_value);   //Total Not Authorized  value calc
            
            $("#total_project_budget").html(Number(total_value*0.).toFixed(2)); //Total Project Budget value calc
            $("#total_task_budget").html(Number(total_value*0.).toFixed(2)); //Total Task Budget value calc
    
            $(sel).attr("data-initial-value",current_value);
        }
    </script><?php /**PATH E:\Laravel\timesheet\resources\views/accounting/project_budget_viewAll.blade.php ENDPATH**/ ?>