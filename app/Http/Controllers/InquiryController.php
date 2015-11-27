<?php

namespace App\Http\Controllers;

use App\Inquiry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InquiryController extends Controller
{
    public function index()
    {
		$data["user"] = \App\User::getUser(\Cookie::get('adweb3'));
		return view('inquiries.index', $data);
    }
	public function postIndex(){
		$input = \Input::all();

		$validation = Inquiry::validation($input);

		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation->errors())->withInput();
		}

		$date = date("Y/m/d H:i:s");

		\DB::statement("INSERT INTO `inquiries` (`is_done`, `name`, `email`, `title`, `body`, `deleted_at`, `created_at`, `updated_at`) VALUES (0, '{$input["name"]}', '{$input["email"]}', '{$input["title"]}', '{$input["body"]}', NULL, '{$date}', '{$date}');");

		$data["user"] = \App\User::getUser(\Cookie::get('adweb3'));
		return view('inquiries.sent', $data);
	}
}
