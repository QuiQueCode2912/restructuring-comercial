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

Route::get('/', 'App\Http\Controllers\IndexController@index');

Route::get('/one-login', 'App\Http\Controllers\IndexController@oneLogin');
Route::get('/portal-clientes', 'App\Http\Controllers\IndexController@portalClientes');
Route::post('/one-login', 'App\Http\Controllers\IndexController@oneLogin');
Route::post('/portal-clientes', 'App\Http\Controllers\IndexController@portalClientes');

Route::get('/espacios-fcds', 'App\Http\Controllers\IndexController@cds');
Route::get('/oferta', 'App\Http\Controllers\IndexController@oferta');
Route::get('/l-173', 'App\Http\Controllers\IndexController@l173');
Route::get('/g-214abc', 'App\Http\Controllers\IndexController@g214abc');
Route::get('/parque-de-los-lagos', 'App\Http\Controllers\IndexController@parqueDeLosLagos');
Route::get('/parque-cds', 'App\Http\Controllers\IndexController@parqueCds');

Route::get('/parque-cds/futbol', 'App\Http\Controllers\IndexController@parqueCds');
Route::get('/parque-cds/beisbol', 'App\Http\Controllers\IndexController@parqueCds');
Route::get('/parque-cds/baloncesto', 'App\Http\Controllers\IndexController@parqueCds');
Route::get('/parque-cds/tenis', 'App\Http\Controllers\IndexController@parqueCds');
Route::get('/parque-cds/raquetbol', 'App\Http\Controllers\IndexController@parqueCds');
Route::get('/parque-cds/boxeo', 'App\Http\Controllers\IndexController@parqueCds');
Route::get('/parque-cds/pesas', 'App\Http\Controllers\IndexController@parqueCds');
Route::get('/parque-cds/golf', 'App\Http\Controllers\IndexController@parqueCds');
Route::get('/parque-cds/gimnasio', 'App\Http\Controllers\IndexController@parqueCds');
Route::get('/parque-cds/piscina', 'App\Http\Controllers\IndexController@parqueCds');
Route::get('/parque-cds/voleibol', 'App\Http\Controllers\IndexController@parqueCds');
Route::get('/parque-cds/bohios', 'App\Http\Controllers\IndexController@parqueCds');


Route::get('/e-104', 'App\Http\Controllers\IndexController@e104');
Route::get('/e-109', 'App\Http\Controllers\IndexController@e109');
Route::get('/e-300', 'App\Http\Controllers\IndexController@e300');
Route::get('/ateneo', 'App\Http\Controllers\IndexController@ateneo');
Route::get('/centro-convenciones', 'App\Http\Controllers\IndexController@centroConvenciones');
Route::get('/aulas-105', 'App\Http\Controllers\IndexController@aulas105');
Route::get('/aulas-220', 'App\Http\Controllers\IndexController@aulas220');
Route::get('/complejo-hospedaje', 'App\Http\Controllers\IndexController@complejoHospedaje');
Route::get('/residencias', 'App\Http\Controllers\IndexController@residencias');
Route::get('/cotizacion/{step}', 'App\Http\Controllers\IndexController@request');
Route::post('/cotizacion/{step}', 'App\Http\Controllers\IndexController@request');
Route::post('/getAvailableSlots', 'App\Http\Controllers\IndexController@getAvailableSlots');
Route::post('/getInsertedLeadId', 'App\Http\Controllers\IndexController@getInsertedLeadId');

Route::get('/aceptar-cotizacion/{token}', 'App\Http\Controllers\IndexController@acceptQuote');
Route::get('/rechazar-cotizacion/{token}', 'App\Http\Controllers\IndexController@rejectQuote');

Route::get('/confirmacion-pago/{token}', 'App\Http\Controllers\IndexController@paymentConfirmation');
Route::post('/confirmacion-pago/{token}', 'App\Http\Controllers\IndexController@paymentConfirmation');
Route::get('/solicitud-pago/{token}', 'App\Http\Controllers\IndexController@docuSignPayment');
Route::post('/solicitud-pago/{token}', 'App\Http\Controllers\IndexController@docuSignPayment');

Route::get('/cancelar-reserva/{token}', 'App\Http\Controllers\IndexController@cancelarReserva');
Route::post('/cancelar-reserva/{token}', 'App\Http\Controllers\IndexController@cancelarReserva');

Route::get('/galeria/{venue}', 'App\Http\Controllers\IndexController@gallery');
Route::post('/galeria/{venue}', 'App\Http\Controllers\IndexController@gallery');
Route::get('/galeria/{venue}/eliminar/{token}', 'App\Http\Controllers\IndexController@deleteImage');

Route::post('/sfASWEwweWEQQW/inbound', 'App\Http\Controllers\eventsController@handleInboundMessage');
Route::post('/sfASWEwweWEQQW/inboundd', 'App\Http\Controllers\eventsController@handleInbounddMessage');

Route::get('/sfASWEwweWEQQW/getEvents', 'App\Http\Controllers\eventsController@getEvents');
Route::post('/sfASWEwweWEQQW/setEvent', 'App\Http\Controllers\eventsController@setEvent');

Route::get('/email/quote', function() {
  return view('email.quote');
});
