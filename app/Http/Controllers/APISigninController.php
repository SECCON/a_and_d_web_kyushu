<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class APISigninController extends Controller
{
	public function index()
	{
		$input = \Input::all();

		$user = \App\User::where('email', $input["email"])->where('password', $input["password"])->first();

		if($user == null)
		{
			$view = \View::make('errors.400');
			return \Response::make($view->render(), '400');
		}

		$user->token = md5($input["email"] . time());
		$user->save();

		return "";
	}
}
