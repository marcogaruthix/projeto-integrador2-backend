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

Route::post('/user/login', 'LoginController@login');
Route::post('/user/create', 'RegisterController@create');
Route::post('/user/releases', 'UserController@findReleases');
Route::post('/user/update', 'UserController@update');
Route::post('/release/create', 'ReleaseController@create');
Route::post('/release/find', 'ReleaseController@find');
Route::post('/release/findWeekly', 'ReleaseController@findWeekly');
Route::post('/release/findMonth', 'ReleaseController@findMonth');
Route::post('/release/delete', 'ReleaseController@delete');
Route::post('/release/update', 'ReleaseController@update');
Route::get('/error', 'Controller@invalidRequest');
Route::post('/error', 'Controller@invalidRequest');