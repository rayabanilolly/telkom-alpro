<?php

use App\mitra;
use App\gpon;
use App\gponmerk;

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
	// $gpon = gpon::find(1)->gponmerk->name;
	// $gpon = gpon::find(1);
	$gpon = gpon::all();
	$merk = array(); $i = 0;
	foreach($gpon as $index):
		$merk[] = gponmerk::find($index->gponmerk_id)->toArray();
		$gpon[$i]->merk = $merk[$i];
		$i++;
	endforeach;

	// $gpon[0]->merk = $merk[0];

	echo '<pre>';
	// print_r($gpon[0]->merk->name);
	print_r(json_encode($gpon));
	echo '</pre>';
});
