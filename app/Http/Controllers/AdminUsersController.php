<?php

namespace App\Http\Controllers;

use App\Inquiry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class AdminUsersController extends Controller
{
    public function index()
    {
		$data["user"] = \App\User::getAdminWithCheck(\Cookie::get('adweb3'));
		$data["users"] = \App\User::orderBy('created_at', 'desc')->paginate(10);

		return view('admin.users.index', $data);
    }

	public function create()
	{
		$data["user"] = \App\User::getUserWithCheck(\Cookie::get('adweb3'));
		$data["user"] = new \App\User;
		$data["user"]->is_admin = 0;
		return view('admin.users.form', $data);
	}

	public function update($id)
	{
		$data["user"] = \App\User::getUserWithCheck(\Cookie::get('adweb3'));
		$data["user"] = \App\User::where("id", $id)->firstOrFail();
		return view('admin.users.form', $data);
	}

	public function delete($id)
	{
		$data["user"] = \App\User::getUserWithCheck(\Cookie::get('adweb3'));
		$data["user"] = \App\User::where("id", $id)->firstOrFail();
		$data["user"]->delete();
		return redirect("/admin/users");
	}

	public function postCreate(){
		$input = \Input::all();

		$data["user"] = \App\User::getUserWithCheck(\Cookie::get('adweb3'));

		$user = new \App\User;

		$user->name = $input["name"];
		$user->is_admin = 0;
		$user->password = $input["password"];
		$user->kana = $input["kana"];
		$user->tel = $input["tel"];
		$user->zip_code = $input["zip_code"];
		$user->address = $input["address"];
		$user->email = $input["email"];

		$user->save();

		return redirect("/admin/users");
	}

	public function postUpdate($id){
		$input = \Input::all();

		$data["user"] = \App\User::getUserWithCheck(\Cookie::get('adweb3'));

		$user = \App\User::where("id", $id)->firstOrFail();

		$user->name = $input["name"];
		$user->password = $input["password"];
		$user->kana = $input["kana"];
		$user->tel = $input["tel"];
		$user->zip_code = $input["zip_code"];
		$user->address = $input["address"];
		$user->email = $input["email"];

		$user->save();
		
		return redirect("/admin/users");
	}
}
