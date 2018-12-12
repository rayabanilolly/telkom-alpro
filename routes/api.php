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
Route::post('/bookingcontentbooking', 'BookingContent@booking');

Route::get('/alprogponcontentregional', 'BookingContent@regional');
Route::get('/alprogponcontentwitel/{regional_id}', 'BookingContent@witel');
Route::get('/alprogponcontentsto/{witel_id}', 'BookingContent@sto');
Route::get('/alprogponcontentgponmerk', 'GponContent@gponmerk');
Route::get('/alprogponcontentmitra', 'BookingContent@mitra');
Route::get('/alprogponcontentstatuscons', 'GponContent@statuscons');
Route::get('/alprogponcontentstatusinv', 'GponContent@statusinv');
Route::post('/alprogponcontentgpon', 'GponContent@gpon');
Route::post('/alprogponcontentgponadd', 'GponContent@gponadd');
Route::get('/alprogponcontentgponshow/{gpon_id}', 'GponContent@gponshow');
Route::put('/alprogponcontentgponedit/{gpon_id}', 'GponContent@gponedit');

Route::get('/alproodfcontentregional', 'BookingContent@regional');
Route::get('/alproodfcontentwitel/{regional_id}', 'BookingContent@witel');
Route::get('/alproodfcontentsto/{witel_id}', 'BookingContent@sto');
Route::post('/alproodfcontentodf', 'OdfContent@odf');
Route::get('/alproodfcontentmitra', 'BookingContent@mitra');
Route::get('/alproodfcontentstatuscons', 'GponContent@statuscons');
Route::get('/alproodfcontentstatusinv', 'GponContent@statusinv');
Route::post('/alproodfcontentodfadd', 'OdfContent@odfadd');
Route::get('/alproodfcontentodfshow/{odf_id}', 'OdfContent@odfshow');
Route::put('/alproodfcontentodfedit/{odf_id}', 'OdfContent@odfedit');

Route::get('/alproodccontentregional', 'BookingContent@regional');
Route::get('/alproodccontentwitel/{regional_id}', 'BookingContent@witel');
Route::get('/alproodccontentsto/{witel_id}', 'BookingContent@sto');
Route::post('/alproodccontentodc', 'OdcContent@odc');
Route::get('/alproodccontentodcspec', 'OdcContent@odcspec');
Route::get('/alproodccontenttypeproj', 'OdcContent@typeproject');
Route::get('/alproodccontentstatuscons', 'GponContent@statuscons');
Route::get('/alproodccontentstatusinv', 'GponContent@statusinv');
Route::get('/alproodccontentmitra', 'BookingContent@mitra');
