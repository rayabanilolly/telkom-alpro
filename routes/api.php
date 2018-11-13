<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/homecontentproject', 'HomeContent@ContentDataProject');
Route::get('/homecontentgpon', 'HomeContent@ContentDataGpon');
Route::get('/homecontentodc', 'HomeContent@ContentDataODC');
Route::get('/homecontentodp', 'HomeContent@ContentDataODP');

Route::get('/bookingcontentregional', 'BookingContent@regional');
Route::get('/bookingcontentwitel/{regional_id}', 'BookingContent@witel');
Route::get('/bookingcontentsto/{witel_id}', 'BookingContent@sto');
Route::get('/bookingcontentmitra', 'BookingContent@mitra');
Route::get('/bookingcontenttypeproj', 'BookingContent@typeproj');
Route::get('/bookingcontentodc/{sto_id}', 'BookingContent@odc');
Route::get('/bookingcontentodcspec', 'BookingContent@odcspec');
Route::get('/bookingcontentdistribution/{odc_id}', 'BookingContent@distribution');

Route::get('/alprogponcontentregional', 'BookingContent@regional');
Route::get('/alprogponcontentwitel/{regional_id}', 'BookingContent@witel');
Route::get('/alprogponcontentsto/{witel_id}', 'BookingContent@sto');
Route::get('/alprogponcontentgponmerk', 'GponContent@gponmerk');
Route::get('/alprogponcontentmitra', 'BookingContent@mitra');
Route::get('/alprogponcontentstatuscons', 'GponContent@statuscons');
Route::get('/alprogponcontentstatusinv', 'GponContent@statusinv');
