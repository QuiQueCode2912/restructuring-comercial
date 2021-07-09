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

Route::get('/one-login', function() {
  return view('index.one-login');
});
Route::post('/one-login', 'App\Http\Controllers\IndexController@oneLogin');

Route::get('/espacios-cds', 'App\Http\Controllers\IndexController@cds');
Route::get('/oferta', 'App\Http\Controllers\IndexController@oferta');
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

Route::get('/aceptar-cotizacion/{token}', 'App\Http\Controllers\IndexController@acceptQuote');
Route::get('/rechazar-cotizacion/{token}', 'App\Http\Controllers\IndexController@rejectQuote');

Route::get('/confirmacion-pago/{token}', 'App\Http\Controllers\IndexController@paymentConfirmation');
Route::get('/solicitud-pago/{token}', 'App\Http\Controllers\IndexController@docuSignPayment');
Route::post('/solicitud-pago/{token}', 'App\Http\Controllers\IndexController@docuSignPayment');

Route::get('/galeria/{venue}', 'App\Http\Controllers\IndexController@gallery');
Route::post('/galeria/{venue}', 'App\Http\Controllers\IndexController@gallery');
Route::get('/galeria/{venue}/eliminar/{token}', 'App\Http\Controllers\IndexController@deleteImage');

Route::get('/email/quote', function() {
  return view('email.quote');
});