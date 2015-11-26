<?php

namespace App\Http\Controllers;

use App\Inquiry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class SettingController extends Controller
{
    public function index()
    {
		$data["user"] = \App\User::getUserWithCheck(\Cookie::get('adweb3'));
		return view('setting.index', $data);
    }

	public function postIndex(){
		$input = \Input::all();

		$data["user"] = \App\User::getUserWithCheck(\Cookie::get('adweb3'));

		$data["user"]->name = $input["name"];
		$data["user"]->email = $input["email"];
		$data["user"]->password = $input["password"];
		$data["user"]->kana = $input["kana"];
		$data["user"]->zip_code = $input["zip_code"];
		$data["user"]->address = $input["address"];
		$data["user"]->tel = $input["tel"];
		$data["user"]->save();

		$data["changed"] = true;

		return view('setting.index', $data);
	}
}
