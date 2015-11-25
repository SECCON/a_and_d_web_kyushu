<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InquiryController extends Controller
{
    public function index()
    {
		return view('inquiries.index');
    }
	public function postIndex(){
		$input = \Input::all();

		$rules = [
			'name'=>'required',
			'email'=>'required',
			'title'=>'required',
			'body'=>'required',
		];

		$messages = [
			'name.required'=>'お名前は必須です。',
			'email.required'=>'メールアドレスは必須です。',
			'title.required'=>'タイトルは必須です。',
			'body.required'=>'本文は必須です。',
		];

		$validation = \Validator::make($input,$rules,$messages);

		if($validation->fails()){
			return redirect()->back()->withErrors($validation->errors())->withInput();;
		}

		$date = date("Y/m/d H:i:s");

		\DB::select(\DB::raw("INSERT INTO `inquiries` (`is_done`, `name`, `email`, `title`, `body`, `deleted_at`, `created_at`, `updated_at`) VALUES (0, '{$input["name"]}', '{$input["email"]}', '{$input["title"]}', '{$input["body"]}', NULL, '{$date}', '{$date}');"));

		return view('inquiries.sent');
	}
}
