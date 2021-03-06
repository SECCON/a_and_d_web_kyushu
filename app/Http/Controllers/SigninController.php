<?php

namespace App\Http\Controllers;

use App\Inquiry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class SigninController extends Controller
{
    public function index()
    {
		return view('signin.index');
    }

	public function postIndex(){
		$input = \Input::all();

		$user = \App\User::where('email', $input["email"])->where('password', $input["password"])->first();

		if($user == null)
		{
			return redirect()->back()->withErrors(["ログインに失敗しました。"])->withInput();
		}

		$user->token = md5($input["email"] . time());
		$user->save();

		\App\Loginlog::setLoginLog($user->id);
		$cookie = \Cookie::forever('adweb3', $user->token);

		return redirect('/')->withCookie($cookie);
	}
}
