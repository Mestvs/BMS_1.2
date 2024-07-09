<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\home_page;
use App\Http\Controllers\setLanguage;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Finance\FinanceController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Limatekid\LimatekidController;
use App\Http\Controllers\FinanceManager\FinanceManagerController;
use App\Http\Controllers\TopManager\TopManagerController;
use App\Http\Controllers\TopManager\DirectorateManageController;
use App\Http\Controllers\TopManager\RoleController;
use App\Http\Controllers\Zerfe\ZerfeController;
use App\Http\Controllers\Directorate\DirectorateController;
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
/*############################### Home route ############################*/
Route::get('/', [home_page::class, 'home'])->name('home_page.home')->middleware('setLocale');
                /*route to include language in all routes*/
Route::group(array('middleware'=>['setLocale']), function() {

/*********************************************Auth routes****************************************************/
              /*-----------------------ForgetPassword controler------------------------ */
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
                 /*-----------------------Logout controler------------------------ */
Route::get('/logout', [LogoutController::class,'__construct'])->name('logout');
                 /*-----------------------authmanager controler------------------------ */
Route::post('/login', [AuthManager::class,'login'])->name('login.post');
Route::post('/register', [AuthManager::class,'register'])->name('register.post');
Route::post('change/password', [AuthManager::class,'changePassword'])->name('change.password');
Route::get('change_password', [AuthManager::class,'showChangePasswordForm'])->name('change.password.form');
Route::post('/change_profile/{id}',[AuthManager::class,'changeProfile'])->name('change_profile');

Route::get('password_expired', 'App\Http\Controllers\Auth\ExpiredPasswordController@expired')
        ->name('password.expired');
Route::post('password/post_expired', 'App\Http\Controllers\Auth\ExpiredPasswordController@postExpired')
        ->name('password.post_expired');
/*********************************************Home page routes****************************************************/
                 /*-----------------------Home_page controler------------------------ */
Route::get('developers', [home_page::class, 'developers'])->name('home_page.developers');
Route::get('/home', [home_page::class, 'home'])->name('home_page.home');
Route::get('/about',[home_page::class,'about'])->name('home_page.about');
Route::get('/help',[home_page::class,'help'])->name('home_page.help');
Route::get('/login',[home_page::class,'showLoginForm'])->name('login');
Route::get('/contact',[home_page::class,'contactUs'])->name('home_page.contactUs');
Route::get('/register',[home_page::class,'showRegisterationForm'])->name('home_page.register'); 
Route::get('rotation', [Home_page::class, 'showrotation'])->name('rotation.send');

/*********************************************General routes****************************************************/
                  /*-----------------------Message controler------------------------ */
Route::POST('/send_message',[MessageController::class,'send_message'])->name('admin_page.send_message');
Route::GET('/remove_inbox_message/{id}',[MessageController::class,'remove_inbox_message'])->name('remove_inbox_message');
Route::GET('/remove_sent_message/{id}',[MessageController::class,'remove_sent_message'])->name('remove_sent_message');
Route::POST('/read_message',[MessageController::class,'read_message'])->name('read_message');
Route::get('/l_download_file/{id}',[App\Http\Controllers\Limatekid\PlanController::class,'download_file'])->name('limatekid.download.file');

                 /*-----------------------locale controler------------------------ */
                               /*Switch between the included languages*/
Route::get('it/{locale}', [LocaleController::class, 'change'])->name('locale.change');
Route::get('en/{locale}', [LocaleController::class, 'change'])->name('locale.change');


/**************************************Routes based on user roles**************************************/
                 /*-----------------------Admin Routes------------------------ */
Route::group(array('middleware'=>['admin']), function() {   
Route::middleware(['password_expired'])->group(function () {
Route::get('/admin_home',[AdminController::class,'home'])->name('admin_page.home');
});//Dashboard      
Route::get('/user_message',[AdminController::class,'message'])->name('admin_page.message');
Route::get('/sent_message',[AdminController::class,'sent_message'])->name('admin_page.sent_message');
Route::get('/allow_registeration',[AdminController::class,'allow_registeration'])->name('allow_registeration');
Route::get('/add_user',[AdminController::class,'showAddUserForm'])->name('admin_page.add_user.form');
Route::post('/add_user',[AdminController::class,'addUser'])->name('admin_page.add_user');
Route::get('/admin_manage_user',[AdminController::class,'manage_user'])->name('admin_page.manage_user');
Route::get('/update_user/{id}',[AdminController::class,'showUserUpdateForm']);
Route::post('/edit_user/{id}',[AdminController::class,'updateUser']);
Route::get('/view_news',[AdminController::class,'view_news'])->name('admin_page.view_news');
Route::post('/allow_registeration/{id}',[AdminController::class,'allow_register'])->name('admin_page.allow_register');
});
                 /*-----------------------Top Manager Routes------------------------ */
Route::group(array('middleware'=>['top_manager']), function() {  
Route::middleware(['password_expired'])->group(function () {
Route::get('/top_manager_home',[TopManagerController::class,'home'])->name('top_manager.home');
});//Dashboard
Route::get('/reportnews',[TopManagerController::class,'post_news'])->name('top_manager.reportnews');
Route::get('/t_plan',[TopManagerController::class,'plan'])->name('top_manager.plan');
Route::post('/add_news',[TopManagerController::class,'add_news'])->name('top_manager.add_news');
Route::get('/top_manager_user',[TopManagerController::class,'user'])->name('top_manager.usr');
Route::get('/assign_zerfe_list',[DirectorateManageController::class,'show_zerfe'])->name('top_manager.directorate_manage');
Route::get('/assign_zerfe_list/{id}',[DirectorateManageController::class,'show_zerfe_list_update']);
Route::post('/approve_as_zerfe/{id}',[DirectorateManageController::class,'approve_as_zerfe'])->name('top_manager.directorate_approve');
Route::get('/assign_dept_select',[DirectorateManageController::class,'show_category']);
Route::get('/assign_directorate_list/{id}',[DirectorateManageController::class,'show_directorate_assign']);
Route::get('/assign_directorate_list/{zid}/{uid}',[DirectorateManageController::class,'show_directorate_assign_form'])->name('top.assign.directorate.form');
Route::post('/assign_directorate_list/{zid}/{uid}',[DirectorateManageController::class,'assign_directorate'])->name('top.assign.directorate');
Route::get('/roles',[RoleController::class,'show_roles'])->name('top.show.role');
Route::get('/add_roles',[RoleController::class,'show_role_form'])->name('top.show.role.form');
Route::post('/add_roles',[RoleController::class,'add_role'])->name('top.add.role');
Route::get('/update_role/{id}',[RoleController::class,'show_update_role_form'])->name('top.update.role');
Route::post('/update_role/{id}',[RoleController::class,'update_role'])->name('top.update.role');
///message
Route::get('/t_message',[TopManagerController::class,'message'])->name('top.message');
Route::get('/t_sent_message',[TopManagerController::class,'sent_message'])->name('top.sent_message');
//budget
Route::get('/t_budget',[App\Http\Controllers\TopManager\BudgetController::class,'viewBudget'])->name('top.viewBudget');
Route::get('/t_budget_category_select',[App\Http\Controllers\TopManager\BudgetController::class,'showBudgetCategorySelection'])->name('top.budget_category');
Route::get('/t_budget_report_list/{category}',[App\Http\Controllers\TopManager\BudgetController::class,'viewBudgetReport'])->name('top.budget.report');
Route::post('/t_budget_report_list/{category}',[App\Http\Controllers\TopManager\BudgetController::class,'viewBudgetReports'])->name('top.budget.reports');
});

                 /*-----------------------Limatekid Routes------------------------ */
Route::group(array('middleware'=>['limatekid']), function() {  
Route::middleware(['password_expired'])->group(function () {
Route::get('/limatekid_home',[LimatekidController::class,'home'])->name('limatekid.home');
});//Dashboard
Route::get('/limatekid_plan',[App\Http\Controllers\Limatekid\PlanController::class,'plan'])->name('limatekid.plan');
Route::get('/l_plan_prepare_form',[App\Http\Controllers\Limatekid\PlanController::class,'plan_form'])->name('limatekid.plan_form');
Route::post('/plan_submit',[App\Http\Controllers\Limatekid\PlanController::class,'plan_submit'])->name('limatekid.plan_submit');
Route::get('/budget_codes',[LimatekidController::class,'show_budget_code'])->name('limatekid.budget_code');
Route::get('/add_budget_category_form',[LimatekidController::class,'add_budget_category_form'])->name('limatekid.add_budget_category_form');
Route::post('/add_budget_category',[LimatekidController::class,'add_budget_category'])->name('limatekid.add_budget_category');
Route::post('/delete_budget_code',[LimatekidController::class,'budget_code_delete'])->name('limatekid.delete_budget_code');
Route::get('/account_codes',[LimatekidController::class,'show_account_code'])->name('limatekid.account_code');
Route::get('/add_account_code_form',[LimatekidController::class,'add_account_code_form'])->name('limatekid.add_account_code_form');
Route::post('/add_account_code',[LimatekidController::class,'add_account_code'])->name('limatekid.add_account_code');
Route::post('/delete_account_code',[LimatekidController::class,'acc_code_delete'])->name('limatekid.delete_account_code');
Route::get('/account_code_list',[LimatekidController::class,'show_account_code_list'])->name('limatekid.account_code_list');
Route::post('/adjust_account_code',[LimatekidController::class,'account_code_adjust'])->name('limatekid.adjust_account_code');
Route::get('/update_zerfe_account/{id}',[LimatekidController::class,'update_zerfe_account_form'])->name('limatekid.update_zefe_account');
Route::post('/update_zerfe_account/{id}',[LimatekidController::class,'update_zerfe_account'])->name('limatekid.update_zerfe_account');
Route::get('/l_message',[LimatekidController::class,'message'])->name('limatekid.message');
Route::get('/l_sent_message',[LimatekidController::class,'sent_message'])->name('limatekid.sent_message');
Route::get('/l_view_news',[LimatekidController::class,'view_news'])->name('limatekid.news');
//
Route::get('/l_plan_edit/{id}',[App\Http\Controllers\Limatekid\PlanController::class,'plan_edit_form'])->name('limatekid.plan.edit.form');
Route::post('/l_plan_edit/{id}',[App\Http\Controllers\Limatekid\PlanController::class,'plan_edit'])->name('limatekid.plan.edit');
//budget
Route::get('/l_budget',[App\Http\Controllers\Limatekid\BudgetController::class,'viewBudget'])->name('limatekid.budget');
Route::get('/l_budget_category_select',[App\Http\Controllers\Limatekid\BudgetController::class,'showBudgetCategorySelection'])->name('limatekid.budget.category');
Route::get('/budget_adjust/{category}/{bd_id}',[App\Http\Controllers\Limatekid\BudgetController::class,'showBudgetAdjustForm'])->name('limatekid.budget.adjust');
Route::post('/budget_adjust/{category}/{bd_id}',[App\Http\Controllers\Limatekid\BudgetController::class,'adjustBudget'])->name('limatekid.budget.adjust');
});

                 /*-----------------------Zerfe Routes------------------------ */
 Route::group(array('middleware'=>['zerfe']), function() {  
Route::middleware(['password_expired'])->group(function () {
Route::get('/zerfe_home',[ZerfeController::class,'home'])->name('zerfe.home');
});//Dashboard
Route::get('/z_view_news',[ZerfeController::class,'view_news'])->name('zerfe.news');
Route::get('/zerfe_plan',[App\Http\Controllers\Zerfe\PlanController::class,'plan'])->name('zerfe.plan');
Route::get('/annual_plan_download',[App\Http\Controllers\Zerfe\PlanController::class,'annual_plan'])->name('zerfe.annual.plan');
Route::get('/download_annual_file/{id}',[App\Http\Controllers\Zerfe\PlanController::class,'download_file'])->name('zerfe.download.file');
Route::get('/plan_submit_select',[App\Http\Controllers\Zerfe\PlanController::class,'plan_submit_selection'])->name('zerfe.submit_select');
Route::get('/plan_prepare_form/{category}',[App\Http\Controllers\Zerfe\PlanController::class,'plan_form'])->name('zerfe.plan.form');
Route::Post('/plan_submit_to_directorate',[App\Http\Controllers\Zerfe\PlanController::class,'plan_to_directorate'])->name('zerfe.plan.to_directorate');
Route::Post('/plan_submit_to_limatekid',[App\Http\Controllers\Zerfe\PlanController::class,'plan_to_limatekid'])->name('zerfe.plan.to_limatekid');
Route::get('/plan_edit/{id}',[App\Http\Controllers\Zerfe\PlanController::class,'plan_edit_form'])->name('zerfe.plan.edit');
Route::post('/plan_edit/{id}',[App\Http\Controllers\Zerfe\PlanController::class,'plan_edit'])->name('zerfe.plan.edit');
Route::get('/download_file/{id}',[App\Http\Controllers\Zerfe\PlanController::class,'d_download_file'])->name('zerfe.download.file');
     
                ///payment
Route::get('/z_payment',[App\Http\Controllers\Zerfe\PaymentController::class,'payment'])->name('zerfe.payment');
Route::get('/payment_sign/{id}',[App\Http\Controllers\Zerfe\PaymentController::class,'sign_payment_form'])->name('zerfe.payment_sign.form');
Route::post('/payment_sign/{id}',[App\Http\Controllers\Zerfe\PaymentController::class,'sign_payment'])->name('zerfe.payment_sign');
                    ///budget
Route::get('/z_budget',[App\Http\Controllers\Zerfe\BudgetController::class,'viewBudget'])->name('zerfe.budget');
Route::get('/z_budget_report',[App\Http\Controllers\Zerfe\BudgetController::class,'viewReport'])->name('zerfe.report');
Route::post('/z_budget_report',[App\Http\Controllers\Zerfe\BudgetController::class,'viewReports'])->name('zerfe.reports');
Route::get('/z_budget_detail/{budget_id}/{direction}',[App\Http\Controllers\Zerfe\BudgetController::class,'showBudgetDetail'])->name('zerfe.budget.detail');
Route::get('/budget_request',[App\Http\Controllers\Zerfe\BudgetController::class,'showBudgetRequestForm'])->name('zerfe.budget.request.form');
Route::post('/budget_request',[App\Http\Controllers\Zerfe\BudgetController::class,'requestBudget'])->name('zerfe.budget.request');
                        

Route::get('/z_message',[ZerfeController::class,'message'])->name('zerfe.message');
Route::get('/z_sent_message',[ZerfeController::class,'sent_message'])->name('zerfe.sent_message');
});
                 /*-----------------------Directorate Routes------------------------ */
Route::group(array('middleware'=>['directorate']), function() {  
Route::middleware(['password_expired'])->group(function () {
Route::get('/directorate_home',[DirectorateController::class,'home'])->name('directorate.home');
});//Dashboard
Route::get('/directorate_plan',[App\Http\Controllers\Directorate\PlanController::class,'plan'])->name('directorate.plan');
Route::post('/delete_plan',[App\Http\Controllers\Directorate\PlanController::class,'plan_delete'])->name('directorate.plan.delete');
Route::get('/plan_prepare_form',[App\Http\Controllers\Directorate\PlanController::class,'plan_form'])->name('directorate.plan.form');
Route::post('/d_plan_submit',[App\Http\Controllers\Directorate\PlanController::class,'plan_submit'])->name('directorate.plan.submit');
Route::get('/update_plan/{id}',[App\Http\Controllers\Directorate\PlanController::class,'update_plan_form'])->name('directorate.plan.update.form');
Route::post('/update_plan/{id}',[App\Http\Controllers\Directorate\PlanController::class,'update_plan'])->name('directorate.plan.update');
Route::get('/d_annual_plan_download',[App\Http\Controllers\Directorate\PlanController::class,'annual_plan'])->name('directorate.annual.plan');
Route::get('/d_download_annual_file/{id}',[App\Http\Controllers\Directorate\PlanController::class,'download_file'])->name('directorate.download.file');
Route::get('/d_view_news',[DirectorateController::class,'view_news'])->name('directorate.news');

Route::get('/d_message',[DirectorateController::class,'message'])->name('directorate.message');
Route::get('/d_sent_message',[DirectorateController::class,'sent_message'])->name('directorate.sent_message');
                      //payment
Route::get('/d_payment',[App\Http\Controllers\Directorate\PaymentController::class,'payment'])->name('directorate.payment');
Route::get('/payment_request_form',[App\Http\Controllers\Directorate\PaymentController::class,'request_payment'])->name('directorate.payment.request');
Route::get('/track_payment/{request_id}',[App\Http\Controllers\Directorate\PaymentController::class,'truckPayment'])->name('directorate.payment.request.truck');
Route::post('/payment_request',[App\Http\Controllers\Directorate\PaymentController::class,'submit_request'])->name('directorate.payment.request.submit');
Route::get('/edit_payment/{id}',[App\Http\Controllers\Directorate\PaymentController::class,'edit_payment_form'])->name('directorate.payment.edit.form');
Route::post('/edit_payment/{id}',[App\Http\Controllers\Directorate\PaymentController::class,'edit_payment'])->name('directorate.payment.edit');
Route::post('/payment_delete',[App\Http\Controllers\Directorate\PaymentController::class,'payment_delete'])->name('directorate.payment.delete');
});
                 /*-----------------------Finance Routes------------------------ */
Route::group(array('middleware'=>['finance']), function() {  
Route::middleware(['password_expired'])->group(function () {
Route::get('/Finance_home',[FinanceController::class,'home'])->name('Finance.home');
});//Dashboard
Route::get('/finance_budget',[App\Http\Controllers\Finance\BudgetController::class,'budget'])->name('Finance.budget');
Route::get('/budget_category_select',[App\Http\Controllers\Finance\BudgetController::class,'budget_category'])->name('Finance.budget_category');
Route::get('/budget_add_form/{category_code}',[App\Http\Controllers\Finance\BudgetController::class,'showBudgetAddForm'])->name('Finance.budget_add_form');
Route::post('/add_budget/{category_id}',[App\Http\Controllers\Finance\BudgetController::class,'addBudget'])->name('Finance.add_budget');
Route::post('/budget_detail_add/{id}',[App\Http\Controllers\Finance\BudgetController::class,'budget_detail_add'])->name('Finance.budget_detail_add');
Route::get('/budget_categorize',[App\Http\Controllers\Finance\BudgetController::class,'budget_categorize_list'])->name('Finance.budget_categorize');
Route::get('/categorize_budget/{budget_id}',[App\Http\Controllers\Finance\BudgetController::class,'budget_categorize_form'])->name('Finance.budget_categorize_form');
Route::get('/budget_categorize_update_form/{budget_id}',[App\Http\Controllers\Finance\BudgetController::class,'budget_categorize_update_form'])->name('Finance.budget_categorize_update_form');
Route::get('/budget_categorize_update/{budget_detail_id}',[App\Http\Controllers\Finance\BudgetController::class,'budget_categorize_update_show'])->name('Finance.budget_categorize_update_show');
Route::post('/budget_categorize_update/{budget_detail_id}',[App\Http\Controllers\Finance\BudgetController::class,'budget_categorize_update'])->name('Finance.budget_categorize_update');

Route::get('/budget/update/{id}',['as'=>'update.budget', 'uses'=> 'App\Http\Controllers\Finance\BudgetController@update_budget']);
Route::post('/budget/update/{id}',['as'=>'update', 'uses'=> 'App\Http\Controllers\Finance\BudgetController@update']);
		
Route::get('/f_message',[FinanceController::class,'message'])->name('finance.message');
Route::get('/f_sent_message',[FinanceController::class,'sent_message'])->name('finance.sent_message');

///payment
Route::get('/f_payment',[App\Http\Controllers\Finance\PaymentController::class,'payment'])->name('finance.payment');
Route::get('/f_payment_request_list',[App\Http\Controllers\Finance\PaymentController::class,'payment_requests'])->name('f.payment.requests');
Route::get('/f_payment_approve_detail/{id}',[App\Http\Controllers\Finance\PaymentController::class,'approve_detail'])->name('f.payment.approve_detail');
Route::get('/payment_add_request_list',[App\Http\Controllers\Finance\PaymentController::class,'payment_add_list'])->name('f.payment.add_list');
Route::get('/payment_add_form/{id}',[App\Http\Controllers\Finance\PaymentController::class,'payment_add_form'])->name('f.payment.add_form');
Route::Post('/payment_add/{id}',[App\Http\Controllers\Finance\PaymentController::class,'Add_payment'])->name('f.payment.add');
Route::get('/print_voucher_form/{id}',[App\Http\Controllers\Finance\PaymentController::class,'printVoucherForm'])->name('f.print.voucher');
Route::get('/edit/payment/form/{request_id}',[App\Http\Controllers\Finance\PaymentController::class,'editPaymentForm'])->name('f.edit.payment.form');
Route::post('/edit/payment/{p_id}',[App\Http\Controllers\Finance\PaymentController::class,'editPayment'])->name('f.edit.payment');
Route::get('/edit/payment/{p_id}',[App\Http\Controllers\Finance\PaymentController::class,'printPayment'])->name('f.print.payment');
///report
Route::get('/f_generate_report',[App\Http\Controllers\Finance\ReportController::class,'viewReport'])->name('f.report');
Route::post('/generate_report',[App\Http\Controllers\Finance\ReportController::class,'generateReport'])->name('f.generate_report');
});
                 /*-----------------------Finance Manager Routes------------------------ */
Route::group(array('middleware'=>['finance_manager']), function() {  
Route::middleware(['password_expired'])->group(function () {
Route::get('/finance_manager_home',[FinanceManagerController::class,'home'])->name('Finance_manager.home');
});//Dashboard
Route::get('/fm_message',[FinanceManagerController::class,'message'])->name('finance_manager.message');
Route::get('/fm_sent_message',[FinanceManagerController::class,'sent_message'])->name('finance_manager.sent_message');
Route::get('/fm_payment',[App\Http\Controllers\FinanceManager\PaymentController::class,'payment'])->name('fm.payment');
Route::get('/fm_payment_request_list',[App\Http\Controllers\FinanceManager\PaymentController::class,'payment_requests'])->name('fm.payment.requests');
Route::get('/payment_approve/{id}',[App\Http\Controllers\FinanceManager\PaymentController::class,'payment_approve'])->name('fm.payment.approve');
Route::post('/approve_payment/{id}',[App\Http\Controllers\FinanceManager\PaymentController::class,'approve'])->name('fm.payment.approve');
Route::get('/payment_approve_detail/{id}',[App\Http\Controllers\FinanceManager\PaymentController::class,'approve_detail'])->name('fm.payment.approve_detail');
//Budget         
Route::get('/fm_budget',[App\Http\Controllers\FinanceManager\BudgetController::class,'viewBudget'])->name('fm.view.budget');
Route::get('/budget_request_list',[App\Http\Controllers\FinanceManager\BudgetController::class,'showBudgetRequest'])->name('fm.show.budget.requests');
Route::get('/budget_approve/{b_request_id}',[App\Http\Controllers\FinanceManager\BudgetController::class,'showBudgetRequestApproveForm'])->name('fm.show.budget.requests');
Route::post('/budget_approve/{b_request_id}',[App\Http\Controllers\FinanceManager\BudgetController::class,'approveBudget'])->name('approve_budget');
Route::get('/approval_info/{id}',[App\Http\Controllers\FinanceManager\BudgetController::class,'getDetailInfo'])->name('get_info');

Route::get('/fm_generate_report',[App\Http\Controllers\FinanceManager\ReportController::class,'viewReport'])->name('fm.report');
Route::post('/fm_generate_report',[App\Http\Controllers\FinanceManager\ReportController::class,'generateReport'])->name('fm.generate_report');
});

});
