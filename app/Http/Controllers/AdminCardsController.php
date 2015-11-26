<?php

namespace App\Http\Controllers;

use App\Inquiry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class AdminCardsController extends Controller
{
	public function index()
	{
		$data["q"] = \Input::get('q');

		$data["user"] = \App\User::getAdminWithCheck(\Cookie::get('adweb3'));
		$data["cards"] = \App\Card::orderBy('created_at', 'desc')->where('tag', 'like', "%{$data["q"]}%")->paginate(10);
		return view('admin.cards.index', $data);
	}

	public function delete($id)
	{
		$data["user"] = \App\User::getAdminWithCheck(\Cookie::get('adweb3'));
		$data["card"] = \App\Card::where("id", $id)->firstOrFail();
		$data["card"]->delete();
		return redirect("/admin/cards");
	}
}
