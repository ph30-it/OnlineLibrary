<?php

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home',function(){
	return redirect()->route('home');
});

Route::get('/book/{id}','BookController@showBookDetailByID')->name('book')->where('id', '[0-9]+');
Route::get('/category/{id}','CategoryController@listBooksById')->name('category')->where('id', '[0-9]+');


Route::group(['prefix' => 'account'], function(){
	Route::get('/','UserController@account')->name('account_profile');
	Route::get('/edit','UserController@edit_show')->name('account_edit');
	Route::post('/edit','UserController@update')->name('account_update');
});

Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::get('admin/login', 'Admin\LoginController@show')->name('AdminLoginForm');
Route::post('admin/login', 'Admin\LoginController@login')->name('AdminLogin');
Route::get('admin/logout', 'Admin\LoginController@logout')->name('AdminLogout');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
	Route::get('/', 'Admin\DashboardController@index')->name('admin-home');

	Route::group(['prefix' => 'users'], function(){
		Route::get('/list', 'Admin\UserController@index')->name('ListUser');
		Route::delete('/deleted', 'Admin\UserController@destroy')->name('deleteUser');
		Route::get('/{id}/show', 'Admin\UserController@show')->name('detailUser');
		Route::get('/{id}/edit', 'Admin\UserController@edit')->name('showEditUser');
		Route::post('/{id}/edit', 'Admin\UserController@update')->name('updateUser');
		Route::get('/search', 'Admin\UserController@search')->name('searchUser');
		Route::get('/create', 'Admin\UserController@create')->name('showAddUser');
		Route::post('/create', 'Admin\UserController@store')->name('createUser');
	});

	Route::group(['prefix' => 'category'], function(){
		Route::get('/list', 'Admin\CategoryController@index')->name('ListCategory');
	});

	Route::group(['prefix' => 'books'], function(){
		Route::get('/list', 'Admin\BookController@index')->name('ListBook');
		Route::delete('/list', 'Admin\BookController@destroy')->name('deleteBook');
		Route::get('/create', 'Admin\BookController@create')->name('showAddBook');
		Route::post('/create', 'Admin\BookController@store')->name('addBook');
		Route::get('/{id}/edit', 'Admin\BookController@edit')->name('showEditBook');
		Route::post('/{id}/edit', 'Admin\BookController@update')->name('updateBook');
		Route::get('/search', 'Admin\BookController@search')->name('searchBook');
	});

	Route::group(['prefix' => 'order'], function(){
		Route::get('/list/{status}', 'Admin\OrderController@index')->name('ListOrder');
		Route::post('/updated', 'Admin\OrderController@update')->name('updateOrder');
		Route::get('/show', 'Admin\OrderController@show')->name('detailOrder');
		Route::get('/create', 'Admin\OrderController@create')->name('showAddOrder');
		Route::get('/search', 'Admin\OrderController@search')->name('searchOrder');
	});

	Route::group(['prefix' => 'comment'], function(){
		Route::get('/list', 'Admin\CommentController@index')->name('ListComment');
		Route::get('/search', 'Admin\CommentController@search')->name('searchComment');
	});

	
});

