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

/*Route::get('/', function () {
    return view('welcome');
})->middleware('verified');*/

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');



Route::get('/book/{id}','BookController@showBookDetailByID')->name('book');
Route::get('/category/{id}','CategoryController@listBooksById')->name('category');;


Route::get('/account','UserController@account')->name('account_profile');
Route::get('/account/edit','UserController@edit')->name('account_edit');

Route::get('/admin/home','Admin\HomeController@index')->name('admin-home');