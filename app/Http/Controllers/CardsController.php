<?php

namespace App\Http\Controllers;

use App\Inquiry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CardsController extends Controller
{
	public function index()
	{
		$data["user"] = \App\User::getUserWithCheck(\Cookie::get('adweb3'));
		$data["cards"] = \App\Card::where('user_id', $data["user"]->id)->orderBy('created_at', 'desc')->paginate(10);
		return view('cards.index', $data);
	}

    public function create()
    {
		$data["user"] = \App\User::getUserWithCheck(\Cookie::get('adweb3'));
		$data["card"] = new \App\Card;
		return view('cards.form', $data);
    }

	public function update($id)
	{
		$data["user"] = \App\User::getUserWithCheck(\Cookie::get('adweb3'));
		$data["card"] = \App\Card::where("id", $id)->where("user_id", $data["user"]->id)->firstOrFail();
		return view('cards.form', $data);
	}

	public function delete($id)
	{
		$data["user"] = \App\User::getUserWithCheck(\Cookie::get('adweb3'));
		$data["card"] = \App\Card::where("id", $id)->where("user_id", $data["user"]->id)->firstOrFail();
		$data["card"]->delete();
		return redirect("/cards");
	}

	public function postUpdate($id){
		$input = \Input::all();

		$data["user"] = \App\User::getUserWithCheck(\Cookie::get('adweb3'));

		$data["card"] = \App\Card::where("id", $id)->where("user_id", $data["user"]->id)->firstOrFail();
		$data["card"]->tag = $input["tag"];
		$data["card"]->user_id = $data["user"]->id;

		if(move_uploaded_file($_FILES['file']['tmp_name'], public_path() . "/files/" . $_FILES['file']['name']))
		{
			$data["card"]->url = $_FILES['file']['name'];
		}

		$data["card"]->save();

		return redirect("/cards");
	}

	public function postCreate(){
		$input = \Input::all();

		$data["user"] = \App\User::getUserWithCheck(\Cookie::get('adweb3'));

		$data["card"] = new \App\Card;
		$data["card"]->tag = $input["tag"];
		$data["card"]->user_id = $data["user"]->id;
		$data["card"]->url = "";

		if(move_uploaded_file($_FILES['file']['tmp_name'], public_path() . "/files/" . $_FILES['file']['name']))
		{
			$data["card"]->url = $_FILES['file']['name'];
		}

		$data["card"]->save();

		return redirect("/cards");
	}
}
