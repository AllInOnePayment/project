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
// route for the users
Route::view('/bill', 'users.bill');
Route::view('/history', 'users.history');
Route::view('/main', 'users.home');
Route::view('/notification', 'users.notification');
Route::view('/profile', 'users.profile');
Route::view('/register_service', 'users.registerService');




// route for admin
Route::prefix('admin')->group( function()
 {
 	Route::resource('user', 'Admin\UserController',
				['as'=>'admin']);
    Route::get('index','Admin\AdminController@index')
                ->name('adminhome');
    Route::resource('service', 'Admin\ServiceController',
				['as'=>'admin']);
    Route::resource('manager', 'Admin\AddmanagerController',
				['as'=>'admin']);
    Route::resource('bank', 'Admin\BankController',
				['as'=>'admin']);
    Route::view('calander','admin\user\todolist')
                ->name('calander');
    Route::get('information','Admin\InformationController@index')
				->name('information');
    Route::get('information/system',
	'Admin\InformationController@index2')
				->name('systeminfo');
    Route::get('information/database',
	'Admin\InformationController@index3')
				->name('databaseinfo');
    Route::get('information/transaction',
	'Admin\InformationController@index4')
				->name('transactioninfo');
    Route::POST('email/send/{id}','Admin\MailController@send')->name('sendmailtomanager');
    Route::get('email','Admin\MailController@index')->name('sendmail');
    Route::get('email/create/{id}','Admin\MailController@create')->name('mailmanager'); 
    Route::get('email/customer','Admin\MailController@mailcustomer')->name('sendtocustomer');
    Route::POST('email/customer/send','Admin\MailController@sendcustomer')->name('sendmailtocustomer');
    Route::get('listuser','Admin\UserController@filter')->name('FilterUser');
 }); 
Route::view('/manage_service', 'admin/manageService');
Route::view('/admin/update','admin/user/update');
Route::view('/add_admin', 'admin/addAdmin');
Route::view('/manage_bank', 'admin/manageBank');

// route for service admin
Route::view('/manage_service_user', 'service/manageUser');
Route::view('/notifay', 'service/notifay');
Route::view('/send_bill', 'service/send_bill');

