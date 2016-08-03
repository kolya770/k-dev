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
	Route::get('/blog/', 'HomeController@blog');
	Route::get('/tags/{id}', 'TagController@find');
	Route::get('/pages/{id}', 'PageController@show');
	Route::get('/categories/{id}', 'CatPageController@find');
	Route::post('/messages/', 'MessageController@store');

	Route::resource('comments', 'CommentController');
	Route::resource('FormAnswers','FormAnswerController');
	Route::resource('portfolio','PortfolioController');
	Route::resource('messages','MessageController');
	Route::group(['middleware' => ['auth', 'role']], function () {
		Route::group(['prefix'=>'adm'], function() {
			Route::get('/', function() {
				return view('admin.index');
			});
			Route::get('/messages', function () {
				return view('admin.messages');
			});
			Route::get('/users/', 'UserController@index');
			Route::post('/projects/images', 'ProjectController@imageStore');
			Route::get('/forms/answers', 'FormController@answers');
			Route::get('/settings/', 'SettingsController@settings');
			Route::get('/users/assign_{id}_{role}', 'UserController@assignRole');
			Route::get('/users/revoke_{id}_{role}', 'UserController@revokeRole');
			Route::post('/config/choose', 'ConfigController@choose');

			//Route::get('categories/')

			Route::resource('utm', 'UTMController');
			Route::resource('blocks', 'BlockController');
			Route::resource('groups', 'GroupController');
			Route::resource('config', 'ConfigController');
			Route::resource('users', 'UserController');
			Route::resource('settings', 'SettingsController');
			Route::resource('posts','PostController');
			Route::resource('forms','FormController');
			Route::resource('reviews', 'ReviewController');
			Route::resource('projects', 'ProjectController');
			Route::resource('categories','CategoriesController');
			Route::resource('tags','TagController');
			Route::get('/', function()
			{
		    	return view('admin.index');
			});
		});
	});

	Route::auth();

