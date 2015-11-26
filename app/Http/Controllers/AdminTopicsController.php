<?php

namespace App\Http\Controllers;

use App\Inquiry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class AdminTopicsController extends Controller
{
    public function index()
    {
		$data["user"] = \App\User::getAdminWithCheck(\Cookie::get('adweb3'));
		$data["topics"] = \App\Topic::orderBy('created_at', 'desc')->paginate(10);

		return view('admin.topics.index', $data);
    }

	public function create()
	{
		$data["user"] = \App\User::getAdminWithCheck(\Cookie::get('adweb3'));
		$data["topic"] = new \App\Topic;
		$data["topic"]->is_public = 0;
		return view('admin.topics.form', $data);
	}

	public function update($id)
	{
		$data["user"] = \App\User::getAdminWithCheck(\Cookie::get('adweb3'));
		$data["topic"] = \App\Topic::where("id", $id)->firstOrFail();
		return view('admin.topics.form', $data);
	}

	public function delete($id)
	{
		$data["user"] = \App\User::getAdminWithCheck(\Cookie::get('adweb3'));
		$data["topic"] = \App\Topic::where("id", $id)->firstOrFail();
		$data["topic"]->delete();
		return redirect("/admin/topics");
	}

	public function postCreate(){
		$input = \Input::all();

		$data["user"] = \App\User::getAdminWithCheck(\Cookie::get('adweb3'));

		if(!isset($input["is_public"]))
		{
			$input["is_public"] = 0;
		}

		$data["topic"] = new \App\Topic;
		$data["topic"]->is_public = $input["is_public"];
		$data["topic"]->title = $input["title"];
		$data["topic"]->body = $input["body"];

		$data["topic"]->save();

		return redirect("/admin/topics");
	}

	public function postUpdate($id){
		$input = \Input::all();

		$data["user"] = \App\User::getAdminWithCheck(\Cookie::get('adweb3'));
		$data["topic"] = \App\Topic::where("id", $id)->firstOrFail();

		if(!isset($input["is_public"]))
		{
			$input["is_public"] = 0;
		}

		$data["topic"]->is_public = $input["is_public"];
		$data["topic"]->title = $input["title"];
		$data["topic"]->body = $input["body"];

		$data["topic"]->save();

		return redirect("/admin/topics");
	}
}
