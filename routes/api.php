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
Route::get('/events', 'ApiController@showEvents');
Route::get('/create_request','ApiController@createRequest');
Route::get('/create_complaint','ApiController@createComplaint');
Route::get('/search_qr_code', 'ApiController@searchWithQrCode');
Route::get('/getVaccinations','ApiController@getVaccinations');
Route::get('/getDewormings','ApiController@getDewormings');