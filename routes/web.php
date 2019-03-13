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

/*Auth::routes();*/

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'Admin\LoginController@showLoginForm')->name('form-login');
Route::post('/login', 'Admin\LoginController@login')->name('login');
Route::get('/register','Admin\RegisterController@showRegistrationForm')->name('form-register');
Route::post('/register','Admin\RegisterController@register')->name('register');

Route::get('/admin/home','Admin\HomeController@index')->name('admin-home');