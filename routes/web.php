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
    return view('welcome');
});
Auth::routes();
Route::get('/signup', 'RestController@index')->name('signup');
Route::post('/signup', 'RestController@create')->name('signup.submit');
Route::get('/varifyemail', 'RestController@varifyemail')->name('varifyemail');
Route::get('/activate/{id}/{verificationcode}', 'RestController@activate')->name('activate');
Route::get('/profiledit/{id}', 'RestController@profile')->name('profiledit');
Route::post('/profiledit/{id}', 'RestController@profiledit')->name('profiledit');
Route::get('/userlist', 'RestController@userlist')->name('userlist');
Route::get('/home', 'RestController@home')->name('home');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login.submit');

Route::get('/logout', 'Auth\LoginController@userLogout')->name('logout');

