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

Route::group(['middleware' => 'auth:api', 'namespace' => 'API'], function(){
	Route::get('/user', 'UserController@show');
	Route::post('/user', 'UserController@create');
	Route::post('/user/authenticate', 'UserController@authenticate');
	Route::post('/user/add/email', 'UserController@addEmail');
	Route::post('/user/update/email', 'UserController@updateEmail');
	Route::post('/user/remove/email', 'UserController@removeEmail');

	Route::post('/activate/puller', 'PullerController@activatePuller');
	Route::post('/deactivate/puller', 'PullerController@deactivatePuller');

	Route::post('/add/comentary', 'ComentaryController@addComentary');

	Route::post('/routes/add', 'RouteController@newRoute');
	Route::get('/routes', 'RouteController@index');

	Route::post('/get/car', 'CarController@getCar');

	Route::get('/car/brands', 'CarBrandController@index');

});