<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class APIUsersController extends Controller
{
	public function password()
	{
		$input = \Input::all();

		$user = \App\User::getUser($input["token"]);

		if($user == null)
		{
			$view = \View::make('errors.400');
			return \Response::make($view->render(), '400');
		}
		$user->password = $input["password"];
		$user->save();

		return "";
	}

	public function email()
	{
		$input = \Input::all();

		$user = \App\User::getUser($input["token"]);

		if($user == null)
		{
			$view = \View::make('errors.400');
			return \Response::make($view->render(), '400');
		}
		$user->email = $input["email"];
		$user->save();

		return "";
	}

	public function info()
	{
		$input = \Input::all();

		$user = \App\User::getUser($input["token"]);

		if($user == null)
		{
			$view = \View::make('errors.400');
			return \Response::make($view->render(), '400');
		}

		$response["user"] = $user;

		return Response::json($response);
	}
}
