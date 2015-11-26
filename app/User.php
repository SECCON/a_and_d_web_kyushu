<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
	use SoftDeletes;

	protected $table = 'users';
	protected $dates = ['deleted_at'];

	protected $fillable = ['is_admin', 'name', 'email', 'password', 'kana', 'address', 'tel', 'token'];

	public static function validation($input)
	{
		$rules = [
			'name'=>'required',
			'email'=>'required',
			'password'=>'required',
			'is_admin'=>'required',
			'kana'=>'required',
			'address'=>'required',
			'tel'=>'required',
		];

		$messages = [
			'name.required'=>'お名前は必須です。',
			'email.required'=>'メールアドレスは必須です。',
			'password.required'=>'パスワードは必須です。',
			'kana.required'=>'カナは必須です。',
			'address.required'=>'住所は必須です。',
			'tel.required'=>'電話番号は必須です。',
		];

		return \Validator::make($input,$rules,$messages);
	}
}
