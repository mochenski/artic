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

// Articles
Route::get('/articles', 'api\ArticleController@index');
Route::get('/articles/{slug}', 'api\ArticleController@show');

// TEST tags
Route::get('/tags', 'api\TagController@index');
Route::get('/tags/{name}', 'api\TagController@show');
Route::post('/tags', 'api\TagController@store');
Route::put('/tags/{name}', 'api\TagController@update');
Route::delete('/tags/{name}', 'api\TagController@destroy');

// Middleware for athorized users
Route::middleware('auth:api')->group(function () {

    // User
    Route::get('/user', 'api\UserController@user');
    Route::post('/logout', 'api\UserController@logout');

    // Articles
    Route::post('/articles', 'api\ArticleController@store');
    Route::put('/articles/{slug}', 'api\ArticleController@update');
    Route::delete('/articles/{slug}', 'api\ArticleController@destroy');

    // Tags
});
