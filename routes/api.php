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

Route::middleware('auth:api')->group(function ($router) {
    Route::post('/markTag', 'TimeTraceController@store');
    Route::post('/index', 'TimeTraceController@index');
    Route::get('/monthStat/user/{user}/month/{month}','TimeTraceController@monthStat');
});

Route::prefix('auth')->group(function ($router) {
    Route::post('register','Auth\RegisterController@register');
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
});


Route::middleware('refresh.token')->group(function ($router) {
    $router->get('profile', 'UserController@profile');
});
