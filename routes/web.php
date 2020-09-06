<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/set-locale', 'FrontendController@setLocale')->name('set_locale');

    Route::get('/post/{slug}', 'PostController@show')->name('post.detail');

    Route::get('/overall-category', 'CategoryController@index')->name('category.overall');

    Route::get('/category/{slug}', 'CategoryController@show')->name('category.detail');

    Route::get('/tag/{name}', 'TagController@show')->name('tag.detail');

    Route::get('/contact', 'ContactController')->name('contact');

    Route::resource('writer-requests', 'WriterController')->only([
        'create', 'store'
    ]);
});

Route::group([
    'namespace' => 'Admin',
    'prefix' => '/admin',
    'middleware' => 'check_if_admin'
], function () {
    Route::get('dashboard', 'DashboardController')->name('dashboard');
});

Route::group(['namespace' => 'Api'], function () {
    Route::get('/check-user', 'UserApiController@checkUser')->name('api.check.user');

    Route::get('/check-username', 'UserApiController@checkUsername')->name('api.check.username');

    Route::get('/check-email', 'UserApiController@checkEmail')->name('api.check.email');
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/social-login/{provider}', 'SocialAuthController@redirectToProvider')
        ->name('auth.social.login');

    Route::get('/auth/{provider}/callback', 'SocialAuthController@handleProviderCallback')
        ->name('auth.social.callback');
});
