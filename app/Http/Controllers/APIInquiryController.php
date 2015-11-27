<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class APIInquiryController extends Controller
{
	public function create()
	{
		$input = \Input::all();

		$validation = \App\Inquiry::validation($input);

		if($validation->fails())
		{
			$view = \View::make('errors.400');
			return \Response::make($view->render(), '400');
		}

		$date = date("Y/m/d H:i:s");

		\DB::statement("INSERT INTO `inquiries` (`is_done`, `name`, `email`, `title`, `body`, `deleted_at`, `created_at`, `updated_at`) VALUES (0, '{$input["name"]}', '{$input["email"]}', '{$input["title"]}', '{$input["body"]}', NULL, '{$date}', '{$date}');");

		return "";
	}
}
