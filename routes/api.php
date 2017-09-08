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

/*
|--------------------------------------------------------------------------
| Book API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::resource('v1/books', 'Api\BooksController', ['as' => 'api']);
});

/*
|--------------------------------------------------------------------------
| Book API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::resource('v1/books', 'Api\BooksController', ['as' => 'api']);
});

/*
|--------------------------------------------------------------------------
| Toy API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::resource('v1/toys', 'Api\ToysController', ['as' => 'api']);
});

/*
|--------------------------------------------------------------------------
| Category API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::resource('v1/categories', 'Api\CategoriesController', ['as' => 'api']);
});

/*
|--------------------------------------------------------------------------
| Post API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::resource('v1/posts', 'Api\PostsController', ['as' => 'api']);
});

/*
|--------------------------------------------------------------------------
| Tag API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::resource('v1/tags', 'Api\TagsController', ['as' => 'api']);
});

/*
|--------------------------------------------------------------------------
| Tag API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::resource('v1/tags', 'Api\TagsController', ['as' => 'api']);
});

/*
|--------------------------------------------------------------------------
| Article API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::resource('v1/articles', 'Api\ArticlesController', ['as' => 'api']);
});
