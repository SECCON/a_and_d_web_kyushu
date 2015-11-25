<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class APITopicsController extends Controller
{
	public function index()
	{
		$input = \Input::all();
		$response["topics"] = \DB::select(\DB::raw("SELECT id, title, body, created_at FROM topics WHERE is_public = 1 AND deleted_at IS NULL ORDER BY created_at limit {$input["offset"]},{$input["length"]};"));
		return Response::json($response);
	}
}
