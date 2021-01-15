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

Route::get('/oferta', 'App\Http\Controllers\IndexController@oferta');
Route::get('/ateneo', 'App\Http\Controllers\IndexController@ateneo');
Route::get('/centro-convenciones', 'App\Http\Controllers\IndexController@centroConvenciones');
Route::get('/aulas-105', 'App\Http\Controllers\IndexController@aulas105');
Route::get('/aulas-220', 'App\Http\Controllers\IndexController@aulas220');
Route::get('/complejo-hospedaje', 'App\Http\Controllers\IndexController@complejoHospedaje');
Route::get('/residencias', 'App\Http\Controllers\IndexController@residencias');
Route::get('/cotizacion/{step}', 'App\Http\Controllers\IndexController@request');
Route::post('/cotizacion/{step}', 'App\Http\Controllers\IndexController@request');