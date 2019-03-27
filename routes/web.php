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
		Route::get('/list', 'Admin\UsersController@index')->name('ListUser');
		Route::delete('/deleted', 'Admin\UsersController@delete')->name('deleteUser');
		Route::get('/{id}/detail', 'Admin\UsersController@detail')->name('detailUser');
		Route::get('/{id}/edit', 'Admin\UsersController@showEditUser')->name('showEditUser');
		Route::post('/{id}/edit', 'Admin\UsersController@update')->name('updateUser');
		Route::get('/search', 'Admin\UsersController@search')->name('searchUser');
		Route::get('/create', 'Admin\UsersController@showAddUser')->name('showAddUser');
		Route::post('/create', 'Admin\UsersController@create')->name('createUser');
	});

	Route::group(['prefix' => 'category'], function(){
		Route::get('/list', 'Admin\CategoryController@index')->name('ListCategory');
		Route::post('/list', 'Admin\CategoryController@create')->name('addCategory');
		Route::delete('/deleted', 'Admin\CategoryController@delete')->name('deleteCategory');
		Route::post('/updated', 'Admin\CategoryController@update')->name('updateCategory');
	});

	Route::group(['prefix' => 'books'], function(){
		Route::get('/list', 'Admin\BookController@index')->name('ListBook');
		Route::delete('/list', 'Admin\BookController@delete')->name('deleteBook');
		Route::get('/create', 'Admin\BookController@showAddBook')->name('showAddBook');
		Route::post('/create', 'Admin\BookController@create')->name('addBook');
		Route::get('/{id}/edit', 'Admin\BookController@showEditBook')->name('showEditBook');
		Route::post('/{id}/edit', 'Admin\BookController@update')->name('updateBook');
		Route::get('/search', 'Admin\BookController@search')->name('searchBook');
	});

	Route::group(['prefix' => 'order'], function(){
		Route::get('/list', 'Admin\OrderController@index')->name('ListOrder');
		Route::post('/updated', 'Admin\OrderController@update')->name('updateOrder');
		Route::get('/detail', 'Admin\OrderController@ViewDetail')->name('detailOrder');
		Route::get('/search', 'Admin\OrderController@search')->name('searchOrder');
	});

	Route::group(['prefix' => 'comment'], function(){
		Route::get('/list', 'Admin\CommentController@index')->name('ListComment');
		Route::delete('/deleted', 'Admin\CommentController@delete')->name('deleteComment');
		Route::get('/search', 'Admin\CommentController@search')->name('searchComment');
	});

	// Route::group(['prefix' => 'sendmail'], function(){
	// 	route::get('/',);
	// });
});

