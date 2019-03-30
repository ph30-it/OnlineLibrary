<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1/admin'], function(){
	Route::group(['prefix' => 'category'], function(){
		Route::put('/updated', 'Admin\CategoryController@update');
		Route::delete('/deleted', 'Admin\CategoryController@destroy');
		Route::post('/add', 'Admin\CategoryController@store');
	});
	
	Route::group(['prefix' => 'book'], function(){
		Route::delete('/deleted', 'Admin\BookController@destroy');
	});

	Route::group(['prefix' => 'user'], function(){
		Route::delete('/deleted', 'Admin\UserController@destroy');
	});

	Route::group(['prefix' => 'comment'], function(){
		Route::delete('/deleted', 'Admin\CommentController@destroy');
	});

	Route::group(['prefix' => 'order'], function(){
		Route::put('/updated', 'Admin\OrderController@update');
		Route::get('/show', 'Admin\OrderController@show');
		Route::delete('/deleted', 'Admin\OrderController@destroy');
	});
});


