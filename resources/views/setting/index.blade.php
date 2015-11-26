@extends('layouts.master')

@section('title', 'アカウント編集')

@section('content')
@if (isset($changed))
<p class="center">変更しました。</p>
@endif
<form method="post" action="" class="normal-form">
	<fieldset>
		<label for="email">メールアドレス:</label>
		<input type="text" name="email" id="email" value="{{$user->email}}">
	</fieldset>
	<fieldset>
		<label for="password">パスワード:</label>
		<input type="text" name="password" id="password" value="{{$user->password}}">
	</fieldset>
	<fieldset>
		<label for="name">お名前:</label>
		<input type="text" name="name" id="name" value="{{$user->name}}">
	</fieldset>
	<fieldset>
		<label for="kana">カナ:</label>
		<input type="text" name="kana" id="kana" value="{{$user->kana}}">
	</fieldset>
	<fieldset>
		<label for="zip_code">郵便番号:</label>
		<input type="text" name="zip_code" id="zip_code" value="{{$user->zip_code}}">
	</fieldset>
	<fieldset>
		<label for="address">住所:</label>
		<input type="text" name="address" id="address" value="{{$user->address}}">
	</fieldset>
	<fieldset>
		<label for="tel">電話番号:</label>
		<input type="text" name="tel" id="tel" value="{{$user->tel}}">
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<button type="submit" class="normal-button center">変更</button>
</form>
@stop