<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiry extends Model
{
	use SoftDeletes;

	protected $table = 'inquiries';
	protected $dates = ['deleted_at'];

	protected $fillable = ['is_done', 'name', 'email', 'title', 'body'];

	public static function  validation($input)
	{
		$rules = [
			'name'=>'required',
			'email'=>'required',
			'title'=>'required',
			'body'=>'required',
		];

		$messages = [
			'name.required'=>'お名前は必須です。',
			'email.required'=>'メールアドレスは必須です。',
			'title.required'=>'タイトルは必須です。',
			'body.required'=>'本文は必須です。',
		];

		 return \Validator::make($input,$rules,$messages);
	}
}