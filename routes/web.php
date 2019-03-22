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

/*
Route::get('/', function () {
    return view('welcome');
})->middleware('verified');
*/

Route::get('/', 'HomePageController@ShowHomePage')->name('home');

Route::get('/category={id}','BookController@ShowCategoryPageByID');

Route::get('/get_book={id}','BookController@ShowBookDetailPage');

Route::get('/get_this_book_with_id={id}','PaymentController@GetBookWithAuth');
Route::get('/confirm_ordered_book','UserPageController@ConfirmOrderedBooks');

Route::get('/user','UserPageController@ShowUserPage');
Route::get('/loading_sub_page={section_id}','UserPageController@LoadSubPage');

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/admin/home','Admin\HomeController@index')->name('admin-home');