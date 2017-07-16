<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**** ADMIN ****/

Route::post('admin/adminlogin', [
  'as' => 'adminlogin', 
  'uses' => 'LogController@adminLogin'
]);	

Route::group(['prefix' => 'admin'], function () {

	Route::get('login','LogController@adminIndex');
	
	Route::group(['middleware'=>'auth'],function(){
		
		Route::get('','AdminController@dashboard');
		Route::get('adminLogout','LogController@adminLogout');
                
                
		
		Route::resource('job-types','JobTypeController');		
		Route::resource('application-status','ApplicationStatusController');		
		Route::resource('users','UserController');
		Route::resource('profiles','ProfileController');
		Route::resource('category-groups','CategoryGroupController');
		Route::resource('categorys','CategoryController');
		Route::resource('permissions','PermissionController');
		Route::resource('candidates','CandidateController');
                Route::resource('companies','CompanyController');
	});		
	
});
/**** END ADMIN ****/


/*** WEBISTE ****/

Route::get('/','FrontController@index');

Route::get('logout', [
  'as' => 'webLogout', 
  'uses' => 'LogController@webLogout'
]);

Route::post('login', [
  'as' => 'webLogin', 
  'uses' => 'LogController@webLogin'
]);

Route::post('candidateRegister', [
  'as' => 'candidateRegister', 
  'uses' => 'UserController@candidateRegister'
]);	

Route::post('resume', [
  'as' => 'resume', 
  'uses' => 'CandidateController@resume'
]);	

Route::post('candidateJobApply', [
  'as' => 'candidateJobApply', 
  'uses' => 'CandidateController@jobApply'
]);	

Route::post('companyRegister', [
  'as' => 'companyRegister', 
  'uses' => 'UserController@companyRegister'
]);

Route::post('jobs/add', [
  'as' => 'jobs/add', 
  'uses' => 'CompanyController@addJob'
]);

Route::post('jobs/edit', [
  'as' => 'jobs/edit', 
  'uses' => 'CompanyController@editJob'
]);

Route::post('company/edit', [
  'as' => 'company/edit', 
  'uses' => 'CompanyController@update'
]);

Route::post('applications/manage/edit', [
  'as' => 'applications/manage/edit', 
  'uses' => 'CandidateApplicationController@editApplication'
]);

Route::post('applications/manage/note', [
  'as' => 'applications/manage/note', 
  'uses' => 'CandidateApplicationController@editNote'
]);


// El retorno de todas las vistas del website se hacen desde el frontcontroller
Route::get('about-us','FrontController@aboutUs');
Route::get('applications/manage/{id}','FrontController@applicationManage');
Route::get('company/profile','FrontController@editCompany');
Route::get('contact','FrontController@contact');
Route::get('jobs/browse','FrontController@browseJobs');
Route::get('jobs/add','FrontController@addJob');
Route::get('jobs/manage','FrontController@manageJobs');
Route::get('jobs/{id}','FrontController@viewJob');
Route::get('jobs/candidates/find/{id}','FrontController@candidatesByJob');
Route::get('jobs/candidates/detail/{id}','FrontController@candidateDetail');
Route::get('jobs/edit/{id}','FrontController@editJob');
Route::get('my-account','FrontController@myaccount');
Route::get('resume','FrontController@resume');
Route::get('terms','FrontController@termsOfService');
Route::get('user/activation/{token}', 'UserController@userActivation');

Route::resource('user','UserController');
Route::resource('mail','MailController');
Route::resource('message','MessageController');

Route::get('password','Auth\WebsitePasswordController@getEmail');
Route::post('password','Auth\WebsitePasswordController@postEmail');

Route::get('password/reset/{token}','Auth\WebsitePasswordController@getReset');
Route::post('password/reset','Auth\WebsitePasswordController@postReset');

Route::get('password/change','FrontController@getChange');
Route::post('password/change','UserController@changePassword');

/**** END WEBSITE ****/