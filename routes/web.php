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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function () {
    $a='is best';
    return view('test');
});
Route::post('/test', 'TestsController@store');
Route::get('/relation', 'TestsController@relation');

// route for the users
Route::view('/bill', 'users.bill');
Route::view('/history', 'users.history');
Route::view('/main', 'users.home');
Route::view('/notification', 'users.notification');
Route::view('/profile', 'users.profile');
Route::view('/register_service', 'users.registerService');

// route for admin
Route::view('/manage_user', 'admin/manageUser');
Route::view('/manage_service', 'admin/manageService');
Route::view('/add_admin', 'admin/addAdmin');
Route::view('/manage_bank', 'admin/manageBank');

// route for service admin
Route::resource('ServiceUser','Service\ServiceUserController');
Route::resource('ServiceNotification','Service\NotificationController');
Route::resource('ServiceNews','Service\NewsController');
Route::resource('ServiceBill','Service\BillController');
Route::get('service/ServiceProfile/index','Service\ServiceProfileController@index')->name('ServiceProfile');
Route::get('service/ServiceProfile/edit','Service\ServiceProfileController@edit')->name('ServiceProfile.edit');
Route::post('service/ServiceProfile/picture','Service\ServiceProfileController@picture')->name('ServiceProfile.picture');
Route::post('service/ServiceProfile/password','Service\ServiceProfileController@password')->name('ServiceProfile.password');
Route::post('service/ServiceProfile/info','Service\ServiceProfileController@info')->name('ServiceProfile.info');
Route::post('service/ImportExcel/user','service\ImportExcelController@import_user')->name('ImportUser');
Route::post('service/ImportExcel/bill','service\ImportExcelController@import_bill')->name('ImportBill');
Route::post('service/Filter','service\FilterController@index')->name('Filter');
Route::get('service/UserRegisterController/{id}','service\UserRegisterController@index')->name('UserRegister.index');
Route::get('TestsController/{id}','TestsController@index')->name('Tests.index');
Route::post('service/UserRegisterController/{id}','service\UserRegisterController@store')->name('UserRegister.store');

Route::get('service/History/index','Service\HistoryController@index')->name('History.index');

Route::view('/manage_service_user', 'service/manageUser');
Route::view('/notifay', 'service/notifay');
Route::view('/send_bill', 'service/send_bill');

