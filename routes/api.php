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

Route::post('/login', 'LoginController@authenticate');
Route::post('/register', 'RegisterController@register');
Route::get('galleries', 'GalleryController@index');
Route::get('galleries/{id}', 'GalleryController@show');
Route::middleware('jwt')->post('galleries', 'GalleryController@store');
Route::middleware('jwt')->get('my-galleries', 'GalleryController@getMyGalleries');
Route::middleware('jwt')->get('authors-galleries', 'GalleryController@getAuthorsGalleries');
