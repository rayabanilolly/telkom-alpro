<?php

use App\mitra;
use App\gpon;

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

Route::get('/gpon', 'HomeController@gpon')->name('gpon');
Route::get('/odf', 'HomeController@odf')->name('odf');
Route::get('/odc', 'HomeController@odc')->name('odc');
Route::get('/odp', 'HomeController@odp')->name('odp');

Route::get('/test', function(){
	$gpon = gpon::all()->toArray();

	echo '<pre>';
	print_r(json_encode($gpon));
	echo '</pre>';
});
