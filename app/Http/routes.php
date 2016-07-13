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
Route::group(['prefix'=>'admin'], function()
{
	Route::get('/', function()
	{
    	return view('admin.index');
	});

	Route::get('/messages', function () {
		$messages = App\Models\Message::all();

		return view('admin.messages')->withMessages($messages);
	});
	Route::get('/users/', 'UserController@index');
	Route::get('/forms/answers', 'FormController@index');
	Route::get('/forms/', 'FormController@indexAdmin');
	Route::get('/settings/', 'BlogController@settings');
	//Route::get('categories/')
	Route::resource('settings', 'BlogController');
	Route::resource('posts','PostController');
	Route::resource('forms','FormController');
	Route::resource('reviews', 'ReviewController');
	Route::resource('projects', 'ProjectController');
	Route::resource('categories','CategoriesController');
	Route::resource('tags','TagController');

});

Route::auth();
