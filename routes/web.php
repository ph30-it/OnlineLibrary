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
})->middleware('verified');

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('AdminLoginForm');
Route::post('admin/login', 'Admin\LoginController@login')->name('AdminLogin');
Route::get('admin/logout', 'Admin\LoginController@logout')->name('AdminLogout');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
	Route::get('/', 'Admin\DashboardController@index')->name('admin-home');

	Route::group(['prefix' => 'users'], function(){
		Route::get('/list', 'Admin\UsersController@index')->name('listUsers');
		Route::delete('/list', 'Admin\UsersController@delete')->name('deleteUsers');
		Route::get('/create', 'Admin\UsersController@showCreateUser')->name('showaddUsers');
		Route::post('/create', 'Admin\UsersController@create')->name('createUsers');
		Route::get('/{id}/edit', 'Admin\UsersController@showEditUser')->name('showeditUsers');
		Route::post('/{id}/edit', 'Admin\UsersController@update')->name('updateUsers');
	});

	Route::group(['prefix' => 'categories'], function(){
		Route::get('/list', 'Admin\CategoriesController@index')->name('listCategory');
		Route::delete('/list', 'Admin\CategoriesController@delete')->name('deleteCategory');
		Route::get('/create', 'Admin\CategoriesController@showCreateCategory')->name('showaddCategory');
		Route::post('/create', 'Admin\CategoriesController@create')->name('createCategory');
		Route::get('/{id}/edit', 'Admin\CategoriesController@showEdit')->name('showeditCategory');
		Route::post('/{id}/edit', 'Admin\CategoriesController@update')->name('updateCategory');
	});

	Route::group(['prefix' => 'books'], function(){
		Route::get('/list', 'Admin\BooksController@index')->name('listBooks');
		Route::get('/create', 'Admin\BooksController@showCreateBooks')->name('showaddBooks');
		Route::post('/create', 'Admin\BooksController@create')->name('createBooks');
		Route::get('/{id}/edit', 'Admin\BooksController@showEditBooks')->name('showeditBooks');
		Route::post('/{id}/edit', 'Admin\BooksController@update')->name('updateBooks');
		Route::delete('/list', 'Admin\BooksController@delete')->name('deleteBooks');
	});

	Route::group(['prefix' => 'order'], function(){
		Route::get('/list', 'Admin\OrderController@index')->name('listOrder');
		Route::post('/list', 'Admin\OrderController@updateStatus')->name('updateStatus');
		Route::get('/detail', 'Admin\OrderController@ViewDetail')->name('detail');
	});
});



