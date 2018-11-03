<?php

use App\mitra;

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
    // return view('welcome');
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/booking', 'HomeController@booking')->name('booking');
Route::get('/monitoring', 'HomeController@monitoring')->name('monitoring');
Route::get('/laporan', 'HomeController@laporan')->name('laporan');

Route::get('/test', function(){
	$mitra = mitra::all()->toArray();

	echo '<pre>';
	print_r(json_encode($mitra));
	echo '</pre>';
});
