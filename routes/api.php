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
Route::get('/homecontentdata', 'HomeContent@getData');

Route::get('/bookingcontentregional', 'BookingContent@regional');
Route::get('/bookingcontentwitel/{regional_id}', 'BookingContent@witel');
Route::get('/bookingcontentsto/{witel_id}', 'BookingContent@sto');
Route::get('/bookingcontentmitra', 'BookingContent@mitra');
Route::get('/bookingcontenttypeproj', 'BookingContent@typeproj');
Route::get('/bookingcontentodc/{sto_id}', 'BookingContent@odc');
Route::get('/bookingcontentodcspec', 'BookingContent@odcspec');
Route::get('/bookingcontentdistribution/{odc_id}', 'BookingContent@distribution');
Route::post('/bookingcontentbooking', 'BookingContent@booking');
Route::get('/bookingcontentodpcountofdistribution/{distribution_id}', 'BookingContent@odpcountofdistribution');
Route::get('/bookingcontentodpcountofodc/{odc_id}', 'BookingContent@odpcountofodc');

Route::get('/monitoringcontentregional', 'BookingContent@regional');
Route::get('/monitoringcontentwitel/{regional_id}', 'BookingContent@witel');
Route::get('/monitoringcontentsto/{witel_id}', 'BookingContent@sto');
Route::get('/monitoringcontentproject/{regional_id}/{witel_id}/{sto_id}', 'BookingContent@project');
Route::post('/monitoringcontentprojectedit', 'BookingContent@editProject');
Route::get('/monitoringcontentprojectdelete/{id}', 'BookingContent@deleteProject');

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
Route::post('/alproodccontentodcedit', 'OdcContent@odcedit');
Route::get('/alproodccontentodcspec', 'OdcContent@odcspec');
Route::get('/alproodccontenttypeproj', 'OdcContent@typeproject');
Route::get('/alproodccontentstatuscons', 'GponContent@statuscons');
Route::get('/alproodccontentstatusinv', 'GponContent@statusinv');
Route::get('/alproodccontentmitra', 'BookingContent@mitra');
Route::get('/alproodccontentodcshow/{odc_id}', 'OdcContent@odcshow');

// Alpro ODP
Route::get('/getodp/{odc_id}', 'OdpContent@odp');
Route::get('/getodc/{sto_id}', 'OdcContent@allOdc');

Route::post('/editodp', 'OdpContent@edit');

// ODP 
Route::get('/odp-get/{odc_id}/{distribution_id}', 'OdpContent@getOdp');

// Mitra 
Route::get('mitra-get', 'MitraController@index');
Route::get('mitra-delete/{mitra_id}', 'MitraController@delete');

Route::post('mitra-save', 'MitraController@save');

// Mitra 
Route::get('users-get', 'UserController@index');
Route::get('users-delete/{users_id}', 'UserController@delete');

Route::post('users-save', 'UserController@save');

// Distribution
Route::get('distribution-get', 'DistribusiContent@distribution');
Route::get('port-delete/{id}', 'DistribusiContent@delete');

// Distribution
Route::get('gpon-get/{sto_id}', 'GponContent@getGpon');

// Splitter
Route::get('splitter-get/{odc_id}', 'SplitterController@index');
Route::get('splitter-delete/{odc_id}', 'SplitterController@delete');

Route::post('splitter-save', 'SplitterController@save');

Route::get('/distributioncontentregional', 'BookingContent@regional');
Route::get('/distributioncontentwitel/{regional_id}', 'BookingContent@witel');
Route::get('/distributioncontentsto/{witel_id}', 'BookingContent@sto');
Route::get('/distributioncontentodc/{sto_id}', 'BookingContent@odc');
Route::post('/distributioncontentoneodc', 'DistribusiContent@oneodc');
Route::post('/odcsaveportdata', 'DistribusiContent@saveodc');
Route::post('/distributioncontentadd', 'DistribusiContent@add');
Route::post('/distributioncontentchangeonedistribution', 'DistribusiContent@changeonedistribution');
Route::post('/distributioncontentchangecapacitydistribution', 'DistribusiContent@changecapacitydistribution');

Route::get('/mancorecontentregional', 'BookingContent@regional');
Route::get('/mancorecontentwitel/{regional_id}', 'BookingContent@witel');
Route::get('/mancorecontentsto/{witel_id}', 'BookingContent@sto');
Route::get('/mancorecontentodc/{sto_id}', 'BookingContent@odc');

// Master Regional
Route::get('/regional-delete/{id}', 'RegionalController@delete');
Route::get('/regional-get', 'RegionalController@index');
Route::post('/regional-save', 'RegionalController@save');

// Master Witel
Route::get('/witel-delete/{id}', 'WitelController@delete');
Route::get('/witel-get', 'WitelController@index');
Route::post('/witel-save', 'WitelController@save');

// Master Witel
Route::get('/sto-delete/{id}', 'StoController@delete');
Route::get('/sto-get', 'StoController@index');
Route::post('/sto-save', 'StoController@save');

// Master Status Cons
Route::get('/status-cons-delete/{id}', 'StatusConsController@delete');
Route::get('/status-cons-get', 'StatusConsController@index');
Route::post('/status-cons-save', 'StatusConsController@save');

// Master Status Inventory
Route::get('/status-inventory-delete/{id}', 'StatusInventoryController@delete');
Route::get('/status-inventory-get', 'StatusInventoryController@index');
Route::post('/status-inventory-save', 'StatusInventoryController@save');

// Master Status Project
Route::get('/status-project-delete/{id}', 'StatusProjectController@delete');
Route::get('/status-project-get', 'StatusProjectController@index');
Route::post('/status-project-save', 'StatusProjectController@save');

// Master ODC Spek
Route::get('/odc-spek-delete/{id}', 'OdcSpekController@delete');
Route::get('/odc-spek-get', 'OdcSpekController@index');
Route::post('/odc-spek-save', 'OdcSpekController@save');

// Master ODP Spek
Route::get('/odp-spek-delete/{id}', 'OdpSpekController@delete');
Route::get('/odp-spek-get', 'OdpSpekController@index');
Route::post('/odp-spek-save', 'OdpSpekController@save');

// Master ODP Spek
Route::get('/gpon-merk-delete/{id}', 'GponMerkController@delete');
Route::get('/gpon-merk-get', 'GponMerkController@index');
Route::post('/gpon-merk-save', 'GponMerkController@save');