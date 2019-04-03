<?php

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home',function(){
	return redirect()->route('home');
});

Route::get('/book/{id}','BookController@showBookDetailByID')->name('book')->where('id', '[0-9]+');
Route::post('/book/{id}','RatingController@getRatingPaginate')->name('book')->where('id', '[0-9]+');

Route::get('/category/{id}','CategoryController@listBooksById')->name('category')->where('id', '[0-9]+');
Route::post('/category/{id}','CategoryController@listBookPaginate')->name('post_category');

Route::post('/newsletter','NewsletterController@subscribe')->name('newsletter_subscribe');

Route::delete('/delete_rating/','RatingController@destroy')->name('delete_rating');
Route::post('/add_rating','RatingController@Rating')->name('add_rating');

Route::group(['prefix' => 'account','middleware' => ['auth', 'verified']], function(){
	Route::get('/','UserController@account')->name('account_profile');
	Route::get('/edit','UserController@edit_show')->name('account_edit');
	Route::post('/edit','UserController@update')->name('account_update');
	Route::get('/order/{status?}','OrderController@orderstatus')->name('order_by_status');
	Route::delete('/cart_cancel','OrderController@cancel')->name('cart_cancel');
	Route::post('/upload', 'UserController@upload')->name('upload');
});

Route::group(['prefix' => 'cart'], function(){
	Route::get('/', 'CartController@cart')->name('cart');
	Route::get('/add_to_cart/{id}','CartController@addToCart');
	Route::delete('/remove_from_cart','CartController@remove')->name('remove-cart');
	Route::get('submit','CartController@submit_cart')->name('submit_cart')->middleware('auth');
});

Route::get('logout', 'Auth\LoginController@logout', function () {
	return abort(404);
});

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

