<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/','UsersController@index')->name('home');
Route::post('/Login/Checklogin','UsersController@checklogin');
Route::get('/logout','UsersController@logout');

//report
Route::get('/Report','PlanController@report')->name('Report');
Route::get('/Report/delete/{id}','PlanController@destroyPlan');
Route::get('/Report/edit/{id_plan}','PlanController@edit');
Route::post('/Report/edit/update','PlanController@update')->name('Update');
Route::post('/Report/edit/delete','PlanController@destroy')->name('Delete');
Route::post('/Report/edit/deletePlan','PlanController@destroyPlan')->name('DeletePlan');
Route::get('/Report/showPDFMonth/{id_plan}','PlanController@showPDFMonth')->name('showPDFMonths');
Route::get('/Report/showPDFMoney/{id_plan}','PlanController@showPDFMoney')->name('showPDFMoneys');
Route::get('/Report/showPDFHR/{id_plan}','PlanController@showPDFHR')->name('showPDFHR');
Route::get('/Report/showALL/{id_plan}','PlanController@allPDF')->name('allPDF');

//user
Route::get('/AddUser','UsersController@show')->name('showUser');
Route::post('/AddUser/delete','UsersController@destroyUser')->name('deleteUser');
Route::post('/AddUser/CreateUser/Save','UsersController@createUser');
Route::post('/AddUser/upload','UsersController@upload');
Route::get('/AddUser/CreateUser', function () {
    return view('CreateUser');   
});

//Plan
Route::get('/Plan','PlanController@index')->name('OnSite');
Route::get('/Plan/CreatePlan','UsersController@listUser');
Route::post('/Plan/submit', 'PlanController@Save');

//Monitor
Route::get('/Monitor/Timeline','MonitorController@index');
Route::get('/Monitor/Timeline/Detail/{id}','MonitorController@Detail');
Route::get('/ProjectManager','MonitorController@projectlist')->name('Project');
Route::get('/ProjectManager/Createproject','MonitorController@createproject');
Route::post('/ProjectManager/Createproject/Save','MonitorController@Save');
Route::get('/ProjectManager/Updateproject/{id}','MonitorController@updateproject');
Route::post('/ProjectManager/Updateproject/submit', 'MonitorController@updatesave');

//CheckWorking
Route::get('/CheckWorking','CheckWorkingController@index')->name('CheckWorking');
Route::post('/CheckWorking/Save','CheckWorkingController@Save');
