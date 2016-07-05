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
Route::get('/forms/', 'HomeController@forms');
Route::resource('FormAnswers','FormAnswerController');
Route::group(['prefix'=>'admin'], function()
{
	Route::get('/', function()
	{
    	return view('admin.index');
	});
	Route::get('/users/', 'UserController@index');
	Route::get('/categories/create', 'CategoriesController@create');
	Route::get('/categories/', 'CategoriesController@index');
	Route::get('/posts/create', 'PostController@create');
	Route::get('/categories/{id}','CategoriesController@show');
	Route::get('/posts/', 'PostController@index');
	Route::get('/forms/create', 'FormController@create');
	Route::get('/forms/answers', 'FormController@index');
	//Route::get('categories/')
	Route::resource('Posts','PostController');
	Route::resource('Forms','FormController');

	Route::resource('Categories','CategoriesController');

});

Route::auth();
