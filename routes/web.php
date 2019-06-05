<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/perros','DogController');
Route::resource('/eventos','EventsController');
Route::resource('/denuncias','ComplaintController');
Route::resource('/peticiones','ResquestController');
Route::resource('/vacunas','VaccinationsController');
Route::resource('/desparasitacion','DewormingsController');
Route::post('/vacunas/post','VaccinationsController@busqueda');

Route::get('/pdf/{qrcode}','DogController@pdf')->name('pdf');