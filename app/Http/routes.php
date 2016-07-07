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
Route::resource('portfolio','PortfolioController');
Route::group(['prefix'=>'admin'], function()
{
	Route::get('/', function()
	{
    	return view('admin.index');
	});
	Route::get('/users/', 'UserController@index');
	Route::get('/forms/answers', 'FormController@index');
	Route::get('/forms/', 'FormController@indexAdmin');
	
	//Route::get('categories/')
	
	Route::resource('posts','PostController');
	Route::resource('forms','FormController');
	Route::resource('reviews', 'ReviewController');
	Route::resource('projects', 'ProjectController');
	Route::resource('categories','CategoriesController');

});

Route::auth();
