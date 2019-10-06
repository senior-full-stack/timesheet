<?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <br><br>
    <div class="page-content">
        
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-green-sharp">
                            <span data-counter="counterup" data-value="<?php echo e($total_projects); ?>">0</span>
                                
                            </h3>
                            <small>TOTAL PROJECTS</small>
                        </div>
                        <div class="icon">
                            <i class="icon-pie-chart"></i>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-red-haze">
                                <span data-counter="counterup" data-value="<?php echo e($total_employees); ?>">0</span>
                            </h3>
                            <small>TOTAL EMPLOYEES</small>
                        </div>
                        <div class="icon">
                            <i class="icon-like"></i>
                        </div>
                    </div>
                   
                </div>
            </div>
            
            
        <div class="row">
            <div class="col-md-8">
                <!-- BEGIN CHART PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-green-haze"></i>
                            <span class="caption-subject bold uppercase font-green-haze"> Spent Time per Project</span>
                            
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="fullscreen"> </a>
                            <a href="javascript:;" class="remove"> </a>
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
            <div class="col-md-4">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase">Project List</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_4">
                            <thead>
                                <tr>
                                    <th> Number </th>
                                    <th> Name </th>
                                    <th> Rate </th>
                                    <th> Total Hrs </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $project_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($project_list->project_number); ?></td>
                                        <td><?php echo e($project_list->project_name); ?></td>
                                        <td><?php echo e($project_list->project_rate); ?></td>
                                        <td><?php echo e($project_list->project_totalhrs); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase">Employee List</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_3">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> FullName </th>
                                    <th> Rate </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $employee_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="employee_list" id="<?php echo e($employee_list->id); ?>">
                                        <td><?php echo e($employee_list->id); ?></td>
                                        <td><?php echo e($employee_list->fullname); ?></td>
                                        <td><?php echo e($employee_list->rates); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END QUICK SIDEBAR -->
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        // initChartSample5();
        project_spenttime_load();
        function project_spenttime_load () {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/admin/dashboard/project_spenttime_load',
                data: {temp: "asdfasfd"},
                success: function(data) {
                    initChartSample5(data.project_content)
                    console.log(data.project_content);
                }
            });
        }
    });
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
<?php echo $__env->make('layouts.admin_layouts.admin_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Laravel\timesheet\resources\views/admin/admin_dashboard.blade.php ENDPATH**/ ?>