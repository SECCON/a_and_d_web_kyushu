<?php

namespace App\Http\Controllers;

use App\Inquiry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    public function index()
    {
		$data["user"] = \App\User::getAdminWithCheck(\Cookie::get('adweb3'));
		$data["topic"] = \App\Topic::where('is_public', '=', 1)->orderBy('created_at', 'desc')->first();
		$data["inquiry"] = \App\Inquiry::where('is_done', '=', 0)->orderBy('created_at', 'desc')->first();
		return view('admin.index', $data);
    }
}
