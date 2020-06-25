<?php

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

// Auth User
Route::post('/login', 'api\UserController@login');
Route::post('/register', 'api\UserController@register');

// Middleware for athorized users
Route::middleware('auth:api')->group(function () {

    // User
    Route::get('/user', 'api\UserController@user');
    Route::post('/logout', 'api\UserController@logout');
});
