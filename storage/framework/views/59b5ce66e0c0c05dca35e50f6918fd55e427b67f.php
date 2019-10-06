<?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php
    $total_hrs=0;
    $total_workedhrs=0;
    $total_budget=0;
?>
<?php $__currentLoopData = $result_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $total_hrs+=$result_data->project_totalhrs;
        $total_workedhrs+=$result_data->sum;    
        $total_budget+=$result_data->sum*$result_data->project_rate;
    ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="page-content" style="background-color: white !important;">
        <br><br><br>
        <div class="row widget-row">
            <div class="col-md-3">
                <!-- BEGIN WIDGET THUMB -->
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                    <h4 class="widget-thumb-heading">Total Hrs.</h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-green icon-bulb"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle">Hrs</span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo e($total_hrs); ?>">0</span>
                        </div>
                    </div>
                </div>
                <!-- END WIDGET THUMB -->
            </div>
            <div class="col-md-3">
                <!-- BEGIN WIDGET THUMB -->
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                    <h4 class="widget-thumb-heading">Worked Hrs.</h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-red icon-layers"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle">Hrs</span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo e($total_workedhrs); ?>">0</span>
                        </div>
                    </div>
                </div>
                <!-- END WIDGET THUMB -->
            </div>
            <div class="col-md-3">
                <!-- BEGIN WIDGET THUMB -->
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                    <h4 class="widget-thumb-heading">Percent</h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle">%</span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo e(($total_hrs) ? round($total_workedhrs/$total_hrs*100,2) : 0); ?>">0</span>
                        </div>
                    </div>
                </div>
                <!-- END WIDGET THUMB -->
            </div>
            <div class="col-md-3">
                <!-- BEGIN WIDGET THUMB -->
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                    <h4 class="widget-thumb-heading">Employee Budget</h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle">USD</span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo e($total_budget); ?>">0</span>
                        </div>
                    </div>
                </div>
                <!-- END WIDGET THUMB -->
            </div>
        </div>
        
        <div class="col-md-3">
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue-madison bold uppercase">My Projects List</span>
                            
                        </div>
                    </div>
                    <div class="portlet-body table-both-scroll ">
                        <div class="row">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="10%"> # </th>
                                        <th width="15%"> Project Name </th>
                                        <th width="10%"> Total Hrs. </th>
                                        <th width="10%"> Worked Hrs. </th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $result_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="project_list" id="<?php echo e($result_data->project_id); ?>">
                                            <td><?php echo e($result_data->project_number); ?></td>
                                            <td><?php echo e($result_data->project_name); ?></td>
                                            <td><?php echo e($result_data->project_totalhrs); ?></td>
                                            <td><?php echo e($result_data->sum); ?></td>
                                            
                                            
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>

            
        </div>
        <div class="col-md-6 col-sm-6">
            
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption ">
                        <span class="caption-subject font-dark bold uppercase">Hours per Project</span>
                        
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="" id="project_details"></div>
                    <div id="example_amchart" class="CSSAnimationChart"></div>
                    
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script>
    $(document).ready(function(){


        $(".project_list").click(function(e){
            e.preventDefault();
            project_number=$(this).children().eq(0).html();
            project_name=$(this).children().eq(1).html();
            project_amchart_load($(this).attr("id"),project_number,project_name);
        });
        function project_amchart_load (project_id,project_number,project_name) {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/employee_dashboard/project_amchart_view',
                data: {project_id: project_id},
                success: function(data) {
                    var content_data=data.content;
                    if(data.total_hours>0){
                        content_data.push({'hourly_type':" ",'sum':data.total_hours});
                        initChartSample7(data.content);
                    }
                    $("#project_details").html("<label>"+project_number+":"+ project_name + "</label>")
                }
            });
        }
    });

    var initChartSample7 = function(array_data) {
        var chart = AmCharts.makeChart("example_amchart", {
            "type": "pie",
            "theme": "light",
            "fontFamily": 'Open Sans',
            "color":    '#888',
            "dataProvider": array_data,
            "valueField": "sum",
            "titleField": "hourly_type",
            "outlineAlpha": 0.4,
            "depth3D": 15,
            "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
            "angle": 30,
            "exportConfig": {
                menuItems: [{
                    icon: '/lib/3/images/export.png',
                    format: 'png'
                }]
            }
        });

        // jQuery('.chart_7_chart_input').off().on('input change', function() {
        //     var property = jQuery(this).data('property');
        //     var target = chart;
        //     var value = Number(this.value);
        //     chart.startDuration = 0;

        //     if (property == 'innerRadius') {
        //         value += "%";
        //     }

        //     target[property] = value;
        //     chart.validateNow();
        // });

        $('#example_amchart').closest('.portlet').find('.fullscreen').click(function() {
            chart.invalidateSize();
        });
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front_layouts.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\timesheet\resources\views/employee_dashboard.blade.php ENDPATH**/ ?>