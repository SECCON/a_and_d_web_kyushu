@extends('layouts.master')

@section('title', 'ユーザ登録')

@section('content')
@foreach ($errors->all() as $error)
<p class="error">{{$error}}</p>
@endforeach
<form method="post" action="" class="normal-form">
	<fieldset>
		<label for="email">メールアドレス:</label>
		<input type="text" name="email" id="email" value="{{Input::old('email')}}">
	</fieldset>
	<fieldset>
		<label for="password">パスワード:</label>
		<input type="text" name="password" id="password" value="{{Input::old('password')}}">
	</fieldset>
	<fieldset>
		<label for="name">お名前:</label>
		<input type="text" name="name" id="name" value="{{Input::old('name')}}">
	</fieldset>
	<fieldset>
		<label for="kana">カナ:</label>
		<input type="text" name="kana" id="kana" value="{{Input::old('kana')}}">
	</fieldset>
	<fieldset>
		<label for="zip_code">郵便番号:</label>
		<input type="text" name="zip_code" id="zip_code" value="{{Input::old('zip_code')}}">
	</fieldset>
	<fieldset>
		<label for="address">住所:</label>
		<input type="text" name="address" id="address" value="{{Input::old('address')}}">
	</fieldset>
	<fieldset>
		<label for="tel">電話番号:</label>
		<input type="text" name="tel" id="tel" value="{{Input::old('tel')}}">
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<button type="submit" class="normal-button center">登録</button>
</form>
@stop