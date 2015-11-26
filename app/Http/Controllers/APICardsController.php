<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class APICardsController extends Controller
{
	public function index()
	{
		$input = \Input::all();

		$user = \App\User::getUser($input["token"]);

		if($user == null)
		{
			$view = \View::make('errors.400');
			return \Response::make($view->render(), '400');
		}

		$response["cards"] = \DB::select(\DB::raw("SELECT id, tag, url, created_at, updated_at FROM cards WHERE user_id = {$user->id} AND deleted_at IS NULL ORDER BY created_at DESC limit {$input["offset"]},{$input["length"]};"));
		return Response::json($response);
	}
}
