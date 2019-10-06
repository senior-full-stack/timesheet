<?php $admin_helper = app('App\Service\AdminHelper'); ?>
<?php 
    // get menu name    
    $menu_name = $admin_helper->getAdminMenuName();
    $dashboard=($menu_name == 'dashboard') ? true : false; 
    $admin = ($menu_name == 'projects' || $menu_name == 'disciplines' || $menu_name == 'phases' || $menu_name == 'resources' || $menu_name == 'users' ) ? true : false; 
    $account = ($menu_name == 'accounting/employee_rates' || $menu_name == 'accounting/project_exhaustion' || $menu_name == 'accounting/project_budget' || $menu_name == 'accounting/staff_rates') ? true : false; 
    $project_manager = ($menu_name == 'project_manager/employees' || $menu_name == 'project_manager/projects' || $menu_name == 'project_manager/disciplines' || $menu_name == 'project_manager/phases' ) ? true : false; 

?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="300" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                    <span></span>
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="nav-item" <?php echo e(($dashboard) ? 'active open' : ''); ?>>
                <a href="<?php echo e(url('/admin/dashboard')); ?>" class="nav-link">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            
            <li class="nav-item  <?php echo e(($project_manager) ? 'active open' : ''); ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-puzzle"></i>
                    <span class="title">PROJECT MANAGER</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo e(url('/admin/project_manager/employees')); ?>" class="nav-link ">
                            <span class="title">EMPLOYEES</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo e(url('/admin/project_manager/projects')); ?>" class="nav-link ">
                            <span class="title">PROJECTS</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo e(url('/admin/project_manager/disciplines')); ?>" class="nav-link ">
                            <span class="title">DISCIPLINE</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo e(url('/admin/project_manager/phases')); ?>" class="nav-link ">
                            <span class="title">PHASES</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  <?php echo e(($account) ? 'active open' : ''); ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">ACCOUNTING</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo e(url('/admin/accounting/employee_rates')); ?>" class="nav-link ">
                            <span class="title">EMPLOYEE RATES</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo e(url('/admin/accounting/project_exhaustion')); ?>" class="nav-link ">
                            <span class="title">PROJECT EXHAUSTION</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo e(url('/admin/accounting/project_budget')); ?>" class="nav-link ">
                            <span class="title">PROJECT BUDGET</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo e(url('/admin/accounting/staff_rates')); ?>" class="nav-link ">
                            <span class="title">STAFF RATES</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  <?php echo e(($admin) ? 'active open' : ''); ?> ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-bulb"></i>
                    <span class="title">ADMIN</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo e(url('/admin/projects')); ?>" class="nav-link ">
                            <span class="title">PROJECT</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo e(url('/admin/disciplines')); ?>" class="nav-link ">
                            <span class="title">DISCIPLINE</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo e(url('/admin/phases')); ?>" class="nav-link ">
                            <span class="title">PHASE</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo e(url('/admin/resources')); ?>" class="nav-link ">
                            <span class="title">RESOURCE</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo e(url('/admin/users')); ?>" class="nav-link ">
                            <span class="title">EmployeeList</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo e(url('/admin/clients')); ?>" class="nav-link ">
                            <span class="title">ClientList</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo e(url('/admin/proposals')); ?>" class="nav-link ">
                            <span class="title">Proposals</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->

<?php /**PATH E:\Laravel\timesheet\resources\views/layouts/admin_layouts/admin_sidebar.blade.php ENDPATH**/ ?>