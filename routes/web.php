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

Route::get('/', function () {
  return view('index.index');
});

Route::get('/solicitud/{step}', function () {
  return view('index.request');
});

Route::get('/ateneo', function () { return view('index.venues'); });
Route::get('/centro-convenciones', function () { return view('index.venues'); });
Route::get('/aulas-105', function () { return view('index.venues'); });
Route::get('/aulas-220', function () { return view('index.venues'); });
Route::get('/complejo-hospedaje', function () { return view('index.venues'); });
Route::get('/residencias', function () { return view('index.venues'); });

Route::get('/venue', function () {
  return view('index.venue');
});