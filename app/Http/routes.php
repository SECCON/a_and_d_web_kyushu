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

Route::get('/', function ()
{
	$data["user"] = \App\User::getUser(Cookie::get('adweb3'));
	$data["topic"] = \App\Topic::where('is_public', '=', 1)->orderBy('created_at')->first();
    return view('top', $data);
});

Route::get('/topics', function ()
{
	$data["user"] = \App\User::getUser(Cookie::get('adweb3'));
	$data["topics"] = \App\Topic::where('is_public', '=', 1)->orderBy('created_at')->paginate(10);
	return view('topics', $data);
});

Route::get("/signin", 'SigninController@index');
Route::controller('signin', 'SigninController');

Route::get("/inquiry", 'InquiryController@index');
Route::controller('inquiry', 'InquiryController');

Route::get('/company', function ()
{
	$data["user"] = \App\User::getUser(Cookie::get('adweb3'));
	return view('company', $data);
});

Route::get('/term', function ()
{
	$data["user"] = \App\User::getUser(Cookie::get('adweb3'));
	return view('term', $data);
});

Route::get('/policy', function ()
{
	$data["user"] = \App\User::getUser(Cookie::get('adweb3'));
	return view('policy', $data);
});

Route::post('/api/inquiry/create', 'APIInquiryController@create');
Route::get('/api/topics', 'APITopicsController@index');
Route::post('/api/signup', 'APISignupController@index');
Route::post('/api/signin', 'APISigninController@index');
Route::post('/api/users/password', 'APIUsersController@password');
Route::post('/api/users/email', 'APIUsersController@email');
Route::post('/api/users/update', 'APIUsersController@update');
Route::post('/api/users/info', 'APIUsersController@info');
