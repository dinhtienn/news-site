<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/set-locale', 'FrontendController@setLocale')->name('set_locale');

    Route::get('/post/{slug}', 'PostController@show')->name('post.detail');

    Route::get('/overall-category', 'CategoryController@index')->name('category.overall');

    Route::get('/category/{slug}', 'CategoryController@show')->name('category.detail');

    Route::get('/tag/{name}', 'TagController@show')->name('tag.detail');
});
