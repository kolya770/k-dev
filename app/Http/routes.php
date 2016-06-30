<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('/show/{id}','HomeController@show');
Route::group(['prefix'=>'admin'], function()
{
	Route::get('/', function()
	{
    	return view('admin.index');
	});
	Route::get('/users/', function() {
		return view('admin.users');
	});
	Route::get('/categories/create', 'CategoriesController@create');
	Route::get('/categories/', 'CategoriesController@index');
	Route::get('/posts/create', 'PostController@create');
	Route::get('/categories/{id}','CategoriesController@show');
	Route::get('/posts/', 'PostController@index');
	//Route::get('categories/')
	Route::resource('Posts','PostController');
	//Route::resource('Pages','PagesController');
	Route::resource('Categories','CategoriesController');
});

Route::auth();
