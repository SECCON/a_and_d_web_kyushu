<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class APISignupController extends Controller
{
	public function index()
	{
		$input = \Input::all();

		$validation = \App\User::validation($input);

		if($validation->fails())
		{
			$view = \View::make('errors.400');
			return \Response::make($view->render(), '400');
		}

		$user = new \App\User;

		$user->name = $input["name"];
		$user->is_admin = $input["is_admin"];
		$user->password = $input["password"];
		$user->kana = $input["kana"];
		$user->tel = $input["tel"];
		$user->zip_code = $input["zip_code"];
		$user->address = $input["address"];
		$user->email = $input["email"];

		$user->save();

		return "";
	}
}
