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
Auth::routes();
Route::get('/', "UserController@home");
Route::post('send-email', "UserController@sendEmail");
Route::post('open-payment', "UserController@openPayment");
Route::get('complete-payment/{userId}', "UserController@completePaymentView");
Route::get('user-login', "UserController@userLogin");
Route::get('user-signup', "UserController@userSignup");
Route::post('userlogin', "UserController@userpostlogin");
Route::post('usersignup', "UserController@userpostSignup");
Route::get('/get-classified-photo/{id}', "HomeController@getClassifiedPhoto");
Route::get('/get-event-photo/{id}', "HomeController@getEventPhoto");
Route::get('/classified', "UserController@classified");
Route::get('/events', "UserController@events");
Route::get('/classified-by-category/{id}', "UserController@classifiedByCategory");
Route::get('/classified-details/{id}', "UserController@classifiedDetails");
Route::get('/event-details/{id}', "UserController@eventDetails");
Route::get('/forgot-password', "UserController@forgotPassword");
Route::get('/reset-password/{token}', "UserController@resetPassword");
Route::post('/send-message-to-advertiser', "HomeController@sendMessageToAdvertiser");
Route::post('/sendresetpasswordlink', "UserController@sendresetpasswordlink");
Route::post('/resetpassword', "UserController@resetpasswordBackend");

Route::post('/updateprofile', "HomeController@updateprofile")->middleware('dashboard');
Route::get('/my-profile', "HomeController@myProfile")->middleware('dashboard');
Route::get('/home', "HomeController@showDashboard")->middleware('dashboard');
Route::get('/my-classifieds', "HomeController@myClassified")->middleware('dashboard');
Route::get('/add-classified', "HomeController@addClassified")->middleware('dashboard');
Route::get('/delete-classified/{id}', "HomeController@deleteClassified")->middleware('dashboard');
Route::get('/edit-classified/{id}', "HomeController@editClassified")->middleware('dashboard');
Route::post('/save-classified', "HomeController@saveClassified")->middleware('dashboard');
Route::post('/update-classified', "HomeController@updateClassified")->middleware('dashboard');
Route::post('/post-classified-comment', "HomeController@postClassifiedComment")->middleware('dashboard');


Route::get('/my-events', "HomeController@myEvents")->middleware('dashboard');
Route::get('/add-events', "HomeController@addEvent")->middleware('dashboard');
Route::get('/delete-event/{id}', "HomeController@deleteEvent")->middleware('dashboard');
Route::get('/edit-event/{id}', "HomeController@editEvent")->middleware('dashboard');
Route::post('/save-event', "HomeController@saveEvent")->middleware('dashboard');
Route::post('/update-event', "HomeController@updateEvent")->middleware('dashboard');
Route::post('/post-event-comment', "HomeController@postEventComment")->middleware('dashboard');




Route::get('/admin', "AdminController@loginPage");
Route::get('/admin-dashboard', "AdminController@dashboard")->middleware('checkAuth');
Route::get('/all-users', "AdminController@allUsers")->middleware('checkAuth');
Route::get('/block-user/{id}', "AdminController@blockUser")->middleware('checkAuth');
Route::get('/unblock-user/{id}', "AdminController@unBlockUser")->middleware('checkAuth');
Route::get('/all-classifieds', "AdminController@allClassifieds")->middleware('checkAuth');
Route::get('/all-events', "AdminController@allEvents")->middleware('checkAuth');
Route::get('/delete-classified-by-admin/{id}', "AdminController@deleteClassifiedByAdmin")->middleware('checkAuth');
Route::get('/delete-event-by-admin/{id}', "AdminController@deleteEventByAdmin")->middleware('checkAuth');
Route::post('/adminlogin', "AdminController@adminLogin");
Route::get('/logout-admin', "AdminController@logoutAdmin");
//Route::get('admin-dashboard', "AdminController@adminDashboard");
//Route::post('admin-logout', "AdminController@logout")->name('admin.logout');





Route::get('/delete-dream/{id}', "HomeController@deleteDream")->middleware('dashboard');
Route::get('/my-profile', "HomeController@myProfile")->middleware('dashboard');
Route::get('/payment-method', "HomeController@paymentMethod")->middleware('dashboard');
Route::get('/my-payments', "HomeController@myPayments")->middleware('dashboard');
Route::get('/translate/{id}', "HomeController@translate")->middleware('dashboard');
Route::get('/my-payments', "HomeController@myPayments")->middleware('dashboard');
Route::get('/end-subscription/{id}', "HomeController@endSubscription")->middleware('dashboard');
Route::get('/activate-subscription/{id}', "HomeController@activateSubscription")->middleware('dashboard');
Route::get('/contact-users', "HomeController@contactUsers")->middleware('dashboard');
Route::get('/open-chat/{userId}', "HomeController@openChat")->middleware('dashboard');
Route::post('/save-dream', "HomeController@saveDream")->middleware('dashboard');
Route::post('/updatecarddetails', "HomeController@updatecarddetails")->middleware('dashboard');
Route::post('/startchat', "HomeController@startchat")->middleware('dashboard');
Route::post('/send-message', "HomeController@sendMessage")->middleware('dashboard');
Route::get('/chat-details/', "HomeController@chatDetails")->middleware('dashboard');


Route::get('/unsubscribe/{token}', "HomeController@unsubscribe");

Route::get('logout-user', function (){
    \Illuminate\Support\Facades\Session::flush();
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
})->name('logout-user');

Route::get('import', function (){
    return view('import');
});
Route::post('/import_excel/import', 'HomeController@import');

