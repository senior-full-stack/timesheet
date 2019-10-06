<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('user_login');
});



Route::match(['get','post'], '/admin', 'AdminController@login');

Auth::routes();

Route::get('/chat', 'HomeController@chat')->name('chat');

Route::match(['get','post'], '/calendar_view', 'HomeController@calendar_view');
Route::post('/calendar_view_load', 'HomeController@calendar_view_load');

Route::match(['get','post'], '/home', 'HomeController@login');
Route::match(['get','post'], '/employee_dashboard', 'HomeController@employee_dashboard');
Route::post('/employee_dashboard/project_amchart_view', 'HomeController@project_amchart_view');

Route::match(['get','post'], '/projectmanager_dashboard', 'HomeController@projectmanager_dashboard');
Route::post('/projectmanager_dashboard/employee_amchart_content', 'HomeController@employee_amchart_content');
Route::post('/projectmanager_dashboard/project_amchart_content', 'HomeController@project_amchart_content');


Route::match(['get','post'], '/user_profile', 'UserProfileController@index');
Route::match(['get','post'], '/user_profilename_change', 'UserProfileController@change_profile_name');
Route::match(['get','post'], '/user_profileimage_save', 'UserProfileController@save_user_image');
Route::match(['get','post'], '/user_password_change', 'UserProfileController@change_user_password');

Route::get('/timesheet', 'TimesheetController@index');
Route::get('/timesheet/{week_date}', 'TimesheetController@index')->name('timesheet');
Route::post('/timesheet/load_content', 'TimesheetController@timesheet_view')->name('timesheet.content');

Route::match(['get','post'],'/timesheet_store', 'TimesheetController@timesheet_store');

Route::match(['get', 'post'], '/project_manager/employees','ProjectManagerController@front_employee_index');
Route::post('/project_manager/load_content', 'ProjectManagerController@front_employee_view')->name('front_employees.content');

Route::match(['get', 'post'], '/project_manager/projects','ProjectManagerController@front_project_index');
Route::post('/project_manager/load_project_content', 'ProjectManagerController@front_project_view')->name('front_projects.content');

Route::match(['get', 'post'], '/project_manager/disciplines','ProjectManagerController@front_discipline_index');
Route::match(['get', 'post'], '/project_manager/phases','ProjectManagerController@front_phase_index');

Route::match(['get', 'post'], '/accounting/project_exhaustion','ProjectManagerController@front_project_index');

Route::match(['get', 'post'], '/accounting/employee_rates','ProjectManagerController@front_employee_index');

// Route::resource('/admin/accounting/project_budget', 'ProjectBudgetController');
Route::get('/accounting/project_budget','AccountingController@front_projectbudget_index');
Route::get('/accounting/project_budget/{project_id}','AccountingController@front_projectbudget_index')->name('project_budget');
Route::match(['get', 'post'], '/accounting/project_budget_store','AccountingController@front_projectbudget_store');
Route::post('/accounting/load_projectbudget_content', 'AccountingController@front_projectbudget_view')->name('front_projectbudget.content');


Route::get('/accounting/staff_rates','AccountingController@front_staffrates_index');
Route::get('/accounting/staff_rates/{employee_id}','AccountingController@front_staffrates_index')->name('staff_rates');
Route::match(['get', 'post'], '/accounting/staff_rates_store','AccountingController@front_staffrates_store');
Route::post('/accounting/load_staffrates_content', 'AccountingController@front_staffrates_view')->name('front_staffrates.content');



Route::group(['middleware'=>['adminlogin']],function(){
    Route::get('/admin/dashboard','AdminController@admin_dashboard');
    Route::post('/admin/dashboard/project_spenttime_load', 'AdminController@project_spenttime_load');

    Route::resource('/admin/projects', 'ProjectController');
    Route::match(['get','post'],'/admin/projects/create','ProjectController@addProject');
    Route::match(['get', 'post'], '/admin/projects/edit/{id}','ProjectController@editProject');
    Route::match(['get', 'post'], '/admin/projects/delete/{id}','ProjectController@deleteProject');

    Route::resource('/admin/clients', 'ClientsController');
    Route::match(['get','post'],'/admin/clients/create','ClientsController@addClient');
    Route::match(['get', 'post'], '/admin/clients/edit/{id}','ClientsController@editClient');
    Route::match(['get', 'post'], '/admin/clients/delete/{id}','ClientsController@deleteClient');

    Route::resource('/admin/proposals', 'ProposalsController');
    Route::match(['get','post'],'/admin/proposals/create','ProposalsController@addProposal');
    Route::match(['get', 'post'], '/admin/proposals/edit/{id}','ProposalsController@editProposal');
    Route::match(['get', 'post'], '/admin/proposals/delete/{id}','ProposalsController@deleteProposal');
    
    Route::resource('/admin/disciplines', 'DisciplineController');
    Route::match(['get','post'],'/admin/disciplines/create','DisciplineController@addDiscipline');
    Route::match(['get', 'post'], '/admin/disciplines/edit/{id}','DisciplineController@editDiscipline');
    Route::match(['get', 'post'], '/admin/disciplines/delete/{id}','DisciplineController@deleteDiscipline');
    
    Route::resource('/admin/phases', 'PhaseController');
    Route::match(['get','post'],'/admin/phases/create','PhaseController@addPhase');
    Route::match(['get', 'post'], '/admin/phases/edit/{id}','PhaseController@editPhase');
    Route::match(['get', 'post'], '/admin/phases/delete/{id}','PhaseController@deletePhase');
    
    Route::resource('/admin/resources', 'ResourceController');
    Route::match(['get','post'],'/admin/resources/create','ResourceController@addResource');
    Route::match(['get', 'post'], '/admin/resources/edit/{id}','ResourceController@editResource');
    Route::match(['get', 'post'], '/admin/resources/delete/{id}','ResourceController@deleteResource');
    
    Route::resource('/admin/users', 'UserController');
    Route::match(['get','post'],'/admin/users/create','UserController@adduser');
    Route::match(['get', 'post'], '/admin/users/edit/{id}','UserController@edituser');
    Route::match(['get', 'post'], '/admin/users/delete/{id}','UserController@deleteuser');
    
    // Route::resource('admin/project_manager/employees', 'ProjectManagerController');
    Route::match(['get', 'post'], 'admin/project_manager/employees','ProjectManagerController@employee_index');
    Route::post('admin/project_manager/load_content', 'ProjectManagerController@employee_view')->name('employees.content');

    Route::match(['get', 'post'], 'admin/project_manager/projects','ProjectManagerController@project_index');
    Route::post('admin/project_manager/load_project_content', 'ProjectManagerController@project_view')->name('projects.content');

    Route::match(['get', 'post'], 'admin/project_manager/disciplines','ProjectManagerController@discipline_index');

    Route::match(['get', 'post'], 'admin/project_manager/phases','ProjectManagerController@phase_index');

    Route::match(['get', 'post'], 'admin/accounting/project_exhaustion','ProjectManagerController@project_index');

    Route::match(['get', 'post'], 'admin/accounting/employee_rates','ProjectManagerController@employee_index');

    // Route::resource('/admin/accounting/project_budget', 'ProjectBudgetController');
    Route::get('admin/accounting/project_budget','AccountingController@projectbudget_index');
    Route::get('admin/accounting/project_budget/{project_id}','AccountingController@projectbudget_index')->name('admin_project_budget');
    Route::match(['get', 'post'], 'admin/accounting/project_budget_store','AccountingController@projectbudget_store');
    Route::post('admin/accounting/load_projectbudget_content', 'AccountingController@projectbudget_view')->name('projectbudget.content');

    Route::get('admin/accounting/staff_rates','AccountingController@staffrates_index');
    Route::get('admin/accounting/staff_rates/{employee_id}','AccountingController@staffrates_index')->name('admin_staff_rates');
    Route::match(['get', 'post'], 'admin/accounting/staff_rates_store','AccountingController@staffrates_store');
    Route::post('admin/accounting/load_staffrates_content', 'AccountingController@staffrates_view')->name('staffrates.content');

 
});
