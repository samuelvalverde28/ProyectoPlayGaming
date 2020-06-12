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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::get('game', 'ApiController@index');

Route::get('game/{id}', 'ApiController@show');

Route::get('gameName/{id}', 'ApiController@showName');

Route::post('game', 'ApiController@store');

Route::post('game/{id}', 'ApiController@update');

Route::delete('game/{id}', 'ApiController@delete');







