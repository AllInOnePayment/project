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
use Barryvdh\DomPDF\PDF;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pdf/{id}','PdfController@index')->name('printreceipt')->middleware('preventbackbutton');

Route::get('/','GuestController@index');
// Route for error messages in all pages
Route::view('error','errors.unauthorized')->name('unauthorized');
Route::post('send','WelcomeController@index')->name('suggestionmail');
Route::view('/try','tryinterface');

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


/*  Route for common features in all services */

//Route::get('/user/start','User\UserProfileController@starttransaction')->name('starttransaction');
Route::get('/profile','UserProfileController@index')->name('userprofile');
Route::get('/transfer','TransactionController@index')->name('moneytransfer');
Route::post('/deposite/start','TransactionController@deposite')->name('startdeposite');
Route::post('/withdraw/start','TransactionController@withdraw')->name('startwithdraw');
Route::get('/profile/deposite','UserProfileController@deposite')->name('deposite');
Route::get('/profile/edit','UserProfileController@edit')->name('usereditprofile');
Route::post('/profile/update/{id}','UserProfileController@update')->name('updateuserprofile');
Route::get('/profile/withdraw','UserProfileController@withdraw')->name('withdraw');
Route::get('/profile/changepass','UserProfileController@changepass')->name('changepassword');
Route::post('/profile/updatepassword','UserProfileController@updatepass')->name('updatepassword');

// route for the users
//Route::post('/register','Auth\RegisterController@create')->name('register');
Route::get('/user','User\InformationController@index')->name('user');
Route::get('/user/notfication','User\InformationController@notfication')->name('notfication');
Route::get('user/bill/index','User\userBillController@bill')->name('userBill');
Route::get('user/bill/pay/{id}','User\userBillController@pay')->name('userBill.pay');
Route::get('user/history','User\HistoryController@index')->name('seehistory');
Route::get('user/transaction','User\HistoryController@transaction')->name('seetransaction');
Route::get('user/history/show/{id}','User\HistoryController@show')->name('showbill');

Route::get('user/register/index','User\RegisterServiceController@index')->name('register.users');
Route::post('user/register/display/{id}','User\RegisterServiceController@display')->name('userregister.display');
Route::get('user/register/{id}','User\RegisterServiceController@show')->name('userregister.show');
Route::get('user/register/user/{id}','User\RegisterServiceController@register')->name('userregister.register');


//// route for super admin 
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

    Route::get('school/{name}','Admin\SchoolInfoController@index')->name('schoolinfo');
    Route::post('school/','Admin\SchoolInfoController@store')->name('schoolinfostore');
 }); 


// route for service admin
Route::resource('ServiceUser','Service\ServiceUserController');
Route::resource('ServiceNotification','Service\NotificationController');
Route::resource('ServiceNews','Service\NewsController');
Route::resource('ServiceBill','Service\BillController');
Route::post('service/ImportExcel/user','service\ImportExcelController@import_user')->name('ImportUser');
Route::post('service/ImportExcel/bill','service\ImportExcelController@import_bill')->name('ImportBill');
Route::post('service/Filter','service\FilterController@index')->name('Filter');
Route::get('service/UserRegisterController/{id}','service\UserRegisterController@index')->name('UserRegister.index');
Route::get('TestsController/{id}','TestsController@index')->name('Tests.index');
Route::post('service/UserRegisterController/{id}','service\UserRegisterController@store')->name('UserRegister.store');
Route::get('service/History/index','Service\HistoryController@index')->name('History.index');
Route::get('service/Mail/index','Service\MailServiceController@index')->name('Mail.index');
Route::post('service/Mail/send','Service\MailServiceController@send')->name('Mail.send');

Route::view('/manage_service_user', 'service/manageUser');
Route::view('/notifay', 'service/notifay');
Route::view('/send_bill', 'service/send_bill');

















/*Route::get('service/ServiceProfile/index','Service\ServiceProfileController@index')->name('ServiceProfile');
Route::get('service/ServiceProfile/edit','Service\ServiceProfileController@edit')->name('ServiceProfile.edit');
Route::post('service/ServiceProfile/picture','Service\ServiceProfileController@picture')->name('ServiceProfile.picture');
Route::post('service/ServiceProfile/password','Service\ServiceProfileController@password')->name('ServiceProfile.password');
Route::post('service/ServiceProfile/info','Service\ServiceProfileController@info')->name('ServiceProfile.info');
Route::get('service/Profile/editaccount/{id}','Service\ServiceProfileController@editaccount')->name('ServiceProfile.editaccount');*/