<?php

namespace App\Http\Controllers;

use App\Inquiry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class SignupController extends Controller
{
    public function index()
    {
		return view('signup.index');
    }

	public function postIndex(){
		$input = \Input::all();
		$input["is_admin"] = 0;
		$validation = \App\User::validation($input);

		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation->errors())->withInput();
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

		return view('signup.finish');
	}
}
