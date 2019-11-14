<?php

use App\mitra;
use App\gpon;
use App\gponmerk;
use App\distribution;
use App\odc;

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

Route::get('/mitra', 'HomeController@mitra')->name('mitra');
Route::get('/splitter', 'HomeController@splitter')->name('splitter');

Route::get('/pengguna', 'HomeController@pengguna')->name('pengguna');

Route::get('/regional', 'HomeController@regional')->name('regional');
Route::get('/witel', 'HomeController@witel')->name('witel');
Route::get('/sto', 'HomeController@sto')->name('sto');
Route::get('/status-project', 'HomeController@statusProject')->name('status-project');
Route::get('/status-cons', 'HomeController@statusCons')->name('status-cons');
Route::get('/status-inventory', 'HomeController@statusInventory')->name('status-inventory');
Route::get('/odc-spek', 'HomeController@odcSpek')->name('odc-spek');
Route::get('/odp-spek', 'HomeController@odpSpek')->name('odp-spek');
Route::get('/gpon-merk', 'HomeController@gponMerk')->name('gpon-merk');
Route::get('/distribusi', 'HomeController@distribusi')->name('distribusi');

Route::get('/mancore', 'HomeController@mancore')->name('mancore');

Route::get('/test', function(){
	// $gpon = gpon::find(1)->gponmerk->name;
	$data = odc::find(2);
	$data = intval(preg_replace('/[^0-9]+/', '', $data->odcspec->name), 10);
	// $gpon = gpon::all();
	// $merk = array(); $i = 0;
	// foreach($gpon as $index):
	// 	$merk[] = gponmerk::find($index->gponmerk_id)->toArray();
	// 	$gpon[$i]->merk = $merk[$i];
	// 	$i++;
	// endforeach;

	// $gpon[0]->merk = $merk[0];

	echo '<pre>';
	// print_r($gpon[0]->merk->name);
	print_r($data / 12);
	echo '</pre>';
});
