<?php

use App\Http\Controllers\SalesforceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/confirmacion-pago', 'App\Http\Controllers\IndexController@paymentConfirmationPost');

Route::get('/test', function () {
    
// Get the URL from the request
    $url = "https://comercial.ciudaddelsaber.org/confirmacion-pago/00QRb000007ERxEMAW?PARM_1=70621";
    $request = Request::create($url);

    // Get the 'id' parameter value
    $id = basename($request->path());

    // Output the result
    return $id;
});