@extends('layouts.master')

@section('title', 'ログイン')

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
		<input type="password" required="" name="password" id="password">
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<button type="submit" class="normal-button center">ログイン</button>
</form>
@stop