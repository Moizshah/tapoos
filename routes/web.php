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
	  return view('public/index');
});



Route::get('/checkdata', function () {
   $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));

   dd($analyticsData);
});
