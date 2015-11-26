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
	$data["topic"] = \App\Topic::where('is_public', '=', 1)->orderBy('created_at', 'desc')->first();
    return view('top', $data);
});

Route::get('/topics', function ()
{
	$data["user"] = \App\User::getUser(Cookie::get('adweb3'));
	$data["topics"] = \App\Topic::where('is_public', '=', 1)->orderBy('created_at', 'desc')->paginate(10);
	return view('topics', $data);
});

Route::get('/log', function ()
{
	$data["user"] = \App\User::getUserwithCheck(Cookie::get('adweb3'));
	$data["logs"] = \App\Loginlog::where('user_id', $data["user"]->id)->orderBy('created_at', 'desc')->paginate(10);
	return view('log', $data);
});

Route::get("/signup", 'SignupController@index');
Route::controller('signup', 'SignupController');

Route::get("/signin", 'SigninController@index');
Route::controller('signin', 'SigninController');

Route::get("/inquiry", 'InquiryController@index');
Route::controller('inquiry', 'InquiryController');

Route::get("/cards", 'CardsController@index');
Route::get("/cards/create", 'CardsController@create');
Route::get("/cards/update/{id}", 'CardsController@update');
Route::get("/cards/delete/{id}", 'CardsController@delete');
Route::controller('cards', 'CardsController');

Route::get("/setting", 'SettingController@index');
Route::controller('setting', 'SettingController');

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

Route::get('/logout', function ()
{
	$data["user"] = \App\User::getUser(Cookie::get('adweb3'));
	if($data["user"] != null)
	{
		$data["user"]->token = null;
		$data["user"]->save();
	}
	return redirect("/");
});

Route::post('/api/inquiry/create', 'APIInquiryController@create');
Route::get('/api/topics', 'APITopicsController@index');
Route::post('/api/signup', 'APISignupController@index');
Route::post('/api/signin', 'APISigninController@index');
Route::post('/api/users/password', 'APIUsersController@password');
Route::post('/api/users/email', 'APIUsersController@email');
Route::post('/api/users/update', 'APIUsersController@update');
Route::post('/api/users/info', 'APIUsersController@info');
Route::post('/api/cards', 'APICardsController@index');

Route::get("/admin", 'AdminController@index');
Route::get("/admin/signin", 'AdminSigninController@index');
Route::controller('/admin/signin', 'AdminSigninController');

Route::get("/admin/topics", 'AdminTopicsController@index');
Route::get("/admin/topics/create", 'AdminTopicsController@create');
Route::get("/admin/topics/update/{id}", 'AdminTopicsController@update');
Route::get("/admin/topics/delete/{id}", 'AdminTopicsController@delete');
Route::controller('admin/topics', 'AdminTopicsController');
