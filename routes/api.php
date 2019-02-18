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


// List passers
Route::get('passers', 'PasserController@index');

// List single passer
Route::get('passer/{keyword}/filter/{filter}', 'PasserController@show');

// Add new passer
Route::post('passer', 'PasserController@store');


Route::get('passer/summary', 'PasserController@summary');







