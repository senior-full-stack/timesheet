<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>TimeSheets | Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <meta name="ws_url" content="<?php echo e(env('WS_URL')); ?>">
        <meta name="user_id" content="<?php echo e(session('user_id')); ?>">

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        
        
        <link href="<?php echo e(asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <link href="<?php echo e(asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')); ?>" rel="stylesheet" type="text/css">
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo e(asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/global/plugins/morris/morris.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/global/plugins/fullcalendar/fullcalendar.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/pages/css/profile.min.css" rel="stylesheet')); ?>" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo e(asset('assets/global/css/components.min.css')); ?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo e(asset('assets/global/css/plugins.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo e(asset('assets/layouts/layout/css/layout.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/layouts/layout/css/themes/darkblue.min.css')); ?>" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo e(asset('assets/layouts/layout/css/custom.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>


        <!---- MY CUSTOM STYLE ----->
        <link href="<?php echo e(asset('css/accounting.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/timesheets.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- END HEAD -->
        
        
        <link href="<?php echo e(asset('css/AdminLTE.min.css')); ?>" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php echo $__env->yieldContent('page-style'); ?>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <?php echo $__env->make('layouts.front_layouts.front_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>
        
        <?php echo $__env->make('layouts.front_layouts.front_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="chatbox">
            <?php echo $__env->make('chat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!--[if lt IE 9]>
<script src="<?php echo e(asset('assets/global/plugins/respond.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/global/plugins/excanvas.min.js')); ?>"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo e(asset('assets/global/plugins/jquery.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/js.cookie.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/jquery.blockui.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo e(asset('assets/global/plugins/moment.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/morris/morris.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/morris/raphael-min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/counterup/jquery.waypoints.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/counterup/jquery.counterup.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/amcharts/amcharts/amcharts.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/amcharts/amcharts/serial.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/amcharts/amcharts/pie.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/amcharts/amcharts/radar.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/amcharts/amcharts/themes/light.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/amcharts/amcharts/themes/patterns.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/amcharts/amcharts/themes/chalk.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/amcharts/ammap/ammap.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/amcharts/ammap/maps/js/worldLow.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/amcharts/amstockcharts/amstock.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/fullcalendar/fullcalendar.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/flot/jquery.flot.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/flot/jquery.flot.resize.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/flot/jquery.flot.categories.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/jquery.sparkline.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')); ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->

        <script src="<?php echo e(asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')); ?>" type="text/javascript"></script>
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo e(asset('assets/global/scripts/app.min.js')); ?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo e(asset('assets/pages/scripts/dashboard.min.js')); ?>" type="text/javascript"></script>
        
        <!-- END PAGE LEVEL SCRIPTS -->
        <script src="<?php echo e(asset('assets/pages/scripts/profile.min.js')); ?>" type="text/javascript"></script>
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo e(asset('assets/layouts/layout/scripts/layout.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/layouts/layout/scripts/demo.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/layouts/global/scripts/quick-sidebar.min.js')); ?>" type="text/javascript"></script>
        
        <!-- END THEME LAYOUT SCRIPTS -->

        <!-- Scripts -->
        
        
        <script src="<?php echo e(asset('js/vue.js')); ?>"></script>
        <script src="<?php echo e(asset('js/socket.io.js')); ?>"></script>
        <script src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/chat.js')); ?>" charset="utf-8"></script>
        
        
        <?php echo $__env->yieldContent('page-script'); ?>
    </body>

</html><?php /**PATH E:\Laravel\timesheet\resources\views/layouts/front_layouts/front_design.blade.php ENDPATH**/ ?>