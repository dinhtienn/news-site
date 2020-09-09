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
    Route::get('/', 'DashboardController')->name('dashboard');

    Route::get('/dashboard', 'DashboardController')->name('dashboard');

    Route::group(['middleware' => 'check_admin'], function () {
        Route::get('/writer-requests/waiting', 'WriterController@index')->name('writer-requests.index');

        Route::get('/writer-requests/rejected', 'WriterController@rejected')->name('writer-requests.rejected');

        Route::get('/writer-requests/accept', 'WriterController@accept')->name('writer-requests.accept');

        Route::get('/writer-requests/reject', 'WriterController@reject')->name('writer-requests.reject');

        Route::get('/users/user', 'UserController@user')->name('users.user');

        Route::get('/users/writer', 'UserController@writer')->name('users.writer');

        Route::get('/users/admin', 'UserController@admin')->name('users.admin');

        Route::get('/destroy/category', 'CategoryController@destroy')->name('category.destroy');

        Route::resource('/category', 'CategoryController')->except([
            'show', 'destroy'
        ]);
    });

    Route::get('/post-accept', 'PostController@acceptPost')->name('post.accept');

    Route::get('/post-hide', 'PostController@hidePost')->name('post.hide');

    Route::get('/post-reject', 'PostController@rejectPost')->name('post.reject');

    Route::get('/post-review', 'PostController@reviewPost')->name('post.review');

    Route::get('/rejected-post', 'PostController@rejectedPosts')->name('post.rejected');

    Route::get('/waiting-post', 'PostController@waitingPosts')->name('post.waiting');

    Route::get('/my/post', 'PostController@myPosts')->name('post.mine');

    Route::get('/destroy/post', 'PostController@destroy')->name('post.destroy');

    Route::resource('/post', 'PostController')->except([
        'show', 'destroy'
    ]);
});

Route::group(['namespace' => 'Api'], function () {
    Route::get('/check-user', 'UserApiController@checkUser')->name('api.check.user');

    Route::get('/check-username', 'UserApiController@checkUsername')->name('api.check.username');

    Route::get('/check-email', 'UserApiController@checkEmail')->name('api.check.email');

    Route::get('/mark-comment-as-read', 'CommentApiController@markCommentAsRead')->name('api.mask.comment.read');

    Route::get('/insert-comment', 'CommentApiController@insertComment')->name('api.insert.comment');
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/social-login/{provider}', 'SocialAuthController@redirectToProvider')
        ->name('auth.social.login');

    Route::get('/auth/{provider}/callback', 'SocialAuthController@handleProviderCallback')
        ->name('auth.social.callback');
});
