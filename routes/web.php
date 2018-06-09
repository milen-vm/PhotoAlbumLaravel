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
Route::get('auth/register', 'Auth\\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\\RegisterController@register');
Route::get('auth/login', 'Auth\\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\\LoginController@login')->name('login');
Route::get('auth/logout', 'Auth\\LoginController@logout');      // TODO change request to post

/**
 * Albums routes
 */
Route::resource('albums', 'AlbumsController');
