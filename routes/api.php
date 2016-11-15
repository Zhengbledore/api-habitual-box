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

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
//    $api->get('users', 'App\Api\Controllers\UserController@show');
    $api->get('index', 'App\Api\Controllers\UserController@index');
    $api->get('auth', 'App\Api\Controllers\UserController@authenticate');
    $api->get('abc', 'App\Api\Controllers\UserController@aabbcc');
    $api->post('users/', 'App\Api\Controllers\UserController@store');
    $api->post('test', 'App\Api\Controllers\UserController@testJwt');

    // home


    // companies


    // services


    // orders

    // search
//    $api->get('search', '');
    
    // current address


});

$api->version('v1', ['middleware' => ['jwt.auth']], function ($api) {
    // Routes within this version group will require authentication.
    $api->post('show2', 'App\Api\Controllers\UserController@show2');
});

$api->version('v1', ['middleware' => ['jwt.refresh']], function ($api) {
    // Routes within this version group will require authentication.
    $api->post('show', 'App\Api\Controllers\UserController@show');
});
