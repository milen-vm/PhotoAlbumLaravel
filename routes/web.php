<?php

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

Route::get('/', function () {
    return view('test');
});

/**
 * Auth routes
 */
Route::prefix('auth')->group(function () {

    Route::namespace('Auth')->group(function () {
        Route::get('register', 'RegisterController@showRegistrationForm');
        Route::post('register', 'RegisterController@register');
        Route::get('login', 'LoginController@showLoginForm');
        Route::post('login', 'LoginController@login')->name('login');
        Route::get('logout', 'LoginController@logout');      // TODO change request to post
    });
});

/**
 * Albums routes
 */
Route::resource('albums', 'AlbumsController');
