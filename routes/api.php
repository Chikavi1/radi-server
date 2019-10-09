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
Route::get('/eventsFinished', 'ApiController@showEventsFinished');
Route::get('/create_request','ApiController@createRequest');
Route::get('/create_complaint','ApiController@createComplaint');
Route::get('/search_qr_code', 'ApiController@searchWithQrCode');
Route::get('/getVaccinations','ApiController@getVaccinations');
Route::get('/getDewormings','ApiController@getDewormings');
Route::get('/alies','ApiController@showAllies');

Route::get('getCases','ApiController@getCases');
Route::get('/getStatus','ApiController@getStatus');

    Route::post('createdog','AuthController@createDogProfile');
    Route::get('getDogs','AuthController@getDogs');
    Route::get('deletedog','AuthController@deleteDog');
//						auth 

	Route::get('crear_cuenta','AuthController@crearCuenta');
	Route::get('ingresar_cuenta','AuthController@ingresarCuenta');

  	Route::get('profile','AuthController@profile');
    Route::post('getimage','AuthController@getimage64');
    Route::get('deletesession','AuthController@deletesession');
    Route::post('changepassword','AuthController@changepassword');


    Route::group(['middleware' => 'auth:api'], function() {
    	Route::get('signup', 'AuthController@signup');

        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });


