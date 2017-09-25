<?php

use Spatie\Analytics\Period;

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
  //  return view('welcome');
	  return view('public/profile');
});


Route::get('/register', function(){
	 return view('register');
});

Route::get('/login', function(){
	 return view('login');
});

Route::get('/submitlink', function(){
	 return view('public/submitlink');
});

Route::get('/paymentinfo', function(){
	 return view('public/payment_info');
});

Route::resource('userprofile', 'UserProfileController');
Route::resource('dashboard', 'DashBoardController');

Route::get('/logout', 'Auth\LoginController@logout');

Route::post('/register', 'Auth\RegisterController@registerUser');


Route::post('/login', 'Auth\LoginController@loginIn');

Route::get('/checkdata', function () {
   $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
   

   dd($analyticsData);
});





