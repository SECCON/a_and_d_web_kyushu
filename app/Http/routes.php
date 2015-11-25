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

Route::get('/', function () {

	$data["topic"] = \App\Topic::where('is_public', '=', 1)->orderBy('created_at')->first();

    return view('top', $data);
});

Route::get('/topics', function () {
	$data["topics"] = \App\Topic::where('is_public', '=', 1)->orderBy('created_at')->paginate(10);
	return view('topics', $data);
});

Route::get("/inquiry", 'InquiryController@index');
Route::controller('inquiry', 'InquiryController');

Route::get('/company', function () {
	return view('company');
});

Route::get('/term', function () {
	return view('term');
});

Route::get('/policy', function () {
	return view('policy');
});

Route::post('/api/inquiry/create', 'APIInquiryController@create');
Route::get('/api/topics', 'APITopicsController@index');
