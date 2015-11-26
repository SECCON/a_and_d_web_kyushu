<?php

namespace App\Http\Controllers;

use App\Inquiry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class AdminInquiriesController extends Controller
{
    public function index()
    {
		$data["user"] = \App\User::getAdminWithCheck(\Cookie::get('adweb3'));
		$data["inquiries"] = \App\Inquiry::orderBy('created_at', 'desc')->paginate(10);

		return view('admin.inquiries.index', $data);
    }

	public function update($id){

		$data["user"] = \App\User::getAdminWithCheck(\Cookie::get('adweb3'));

		$data["inquiry"] = \App\Inquiry::where("id", $id)->firstOrFail();
		$data["inquiry"]->is_done = 1;
		$data["inquiry"]->save();

		return redirect("/admin/inquiries");
	}
}
