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
        
        <div class="row">
        <div class="col-md-3">
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-blue-madison bold uppercase">Employee List</span>
                            
                        </div>
                    </div>
                    <div class="portlet-body table-both-scroll ">
                        <div class="row">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="10%"> ID </th>
                                        <th width="15%"> Employee Name </th>
                                        <th width="10%"> Employee Rate </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $result_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="employee_list" id="<?php echo e($result_data->id); ?>">
                                            <td><?php echo e($result_data->id); ?></td>
                                            <td><?php echo e($result_data->fullname); ?></td>
                                            <td><?php echo e($result_data->rates); ?></td>
                                            
                                            
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>

            
        </div>
        <div class="col-md-9">
            <!-- BEGIN CHART PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                            
                        <i class="icon-bar-chart font-green-haze"></i>
                        
                        <span class="caption-subject bold uppercase font-green-haze"> Spent Time per Project</span>
                        
                        
                    </div>
                    <div class="tools">
                            <div class="" id="employee_details"></div>
                    </div>
                </div>
                <div class="portlet-body">
                    
                    <div id="monthly_chart" class="chart" style="height: 400px;"> </div>
                    <div class="well margin-top-20">
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="text-left">Top Radius:</label>
                                <input class="monthly_chart_chart_input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01" /> </div>
                            <div class="col-sm-3">
                                <label class="text-left">Angle:</label>
                                <input class="monthly_chart_chart_input" data-property="angle" type="range" min="0" max="89" value="30" step="1" /> </div>
                            <div class="col-sm-3">
                                <label class="text-left">Depth:</label>
                                <input class="monthly_chart_chart_input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1" /> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CHART PORTLET-->
        </div>
        </div>
        <div class="row">
                <div class="col-md-3">
                        <div class="portlet light portlet-fit portlet-datatable bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-blue-madison bold uppercase">Projects List</span>
                                    
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
                                            <?php $__currentLoopData = $result_projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result_project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="project_list" id="<?php echo e($result_project->project_id); ?>">
                                                    <td><?php echo e($result_project->project_number); ?></td>
                                                    <td><?php echo e($result_project->project_name); ?></td>
                                                    <td><?php echo e($result_project->project_totalhrs); ?></td>
                                                    <td><?php echo e($result_project->sum); ?></td>
                                                    
                                                    
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>  
                        </div>
        
                    
                </div>
                <div class="col-md-9 col-sm-6">
                    
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
    </div>

<script type="text/javascript" src="/js/jquery.min.js"></script>

<script>
    $(document).ready(function(){


        $(".employee_list").click(function(e){
            e.preventDefault();
            // project_number=$(this).children().eq(0).html();
            employee_fullname=$(this).children().eq(1).html();
            employee_amchart_load($(this).attr("id"),employee_fullname);
        });
        function employee_amchart_load (employee_id,employee_fullname) {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/projectmanager_dashboard/employee_amchart_content',
                data: {employee_id: employee_id},
                success: function(data) {
                    console.log(data.content)
                    initChartSample5(data.content)
                    $("#employee_details").html("<label>"+ employee_fullname + "</label>")
                    // var content_data=data.content;
                    // if(data.total_hours>0){
                    //     content_data.push({'hourly_type':" ",'sum':data.total_hours});
                    //     initChartSample7(data.content);
                    // }
                }
            });
        }

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
                url: '/projectmanager_dashboard/project_amchart_content',
                data: {project_id: project_id},
                success: function(data) {
                    var content_data=data.content;
                    if(data.total_hours>0){
                        content_data.push({'fullname':"Empty",'sum':data.total_hours});
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
            "titleField": "fullname",
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
    var initChartSample5 = function(data_array) {
        var chart = AmCharts.makeChart("monthly_chart", {
            "theme": "light",
            "type": "serial",
            "startDuration": 2,

            "fontFamily": 'Open Sans',
            
            "color":    '#888',

            "dataProvider": data_array,
            "valueAxes": [{
                "position": "left",
                "axisAlpha": 0,
                "gridAlpha": 0
            }],
            "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "colorField": "color",
                "fillAlphas": 0.85,
                "lineAlpha": 0.1,
                "type": "column",
                "topRadius": 1,
                "valueField": "sum"
            }],
            "depth3D": 40,
            "angle": 30,
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "project_number",
            "categoryAxis": {
                "gridPosition": "start",
                "axisAlpha": 0,
                "gridAlpha": 0

            },
            "exportConfig": {
                "menuTop": "20px",
                "menuRight": "20px",
                "menuItems": [{
                    "icon": '/lib/3/images/export.png',
                    "format": 'png'
                }]
            }
        }, 0);

        jQuery('.monthly_chart_chart_input').off().on('input change', function() {
            var property = jQuery(this).data('property');
            var target = chart;
            chart.startDuration = 0;

            if (property == 'topRadius') {
                target = chart.graphs[0];
            }

            target[property] = this.value;
            chart.validateNow();
        });

        $('#monthly_chart').closest('.portlet').find('.fullscreen').click(function() {
            chart.invalidateSize();
        });
    }

    
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front_layouts.front_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\timesheet\resources\views/projectmanager_dashboard.blade.php ENDPATH**/ ?>