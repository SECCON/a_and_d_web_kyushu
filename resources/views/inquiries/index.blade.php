@extends('layouts.master')

@section('title', 'お問い合わせ')

@section('content')
<p class="center">下記のフォームからお問い合わせください。</p>
@foreach ($errors->all() as $error)
<p class="error">{{$error}}</p>
@endforeach
<form method="post" action="" class="normal-form">
	<fieldset>
		<label for="name">お名前:</label>
		<input type="text" name="name" id="name" value="{{Input::old('name')}}">
	</fieldset>
	<fieldset>
		<label for="email">メールアドレス:</label>
		<input type="text" required="" name="email" id="email" value="{{Input::old('email')}}">
	</fieldset>
	<fieldset>
		<label for="title">タイトル:</label>
		<input type="text" required="" name="title" id="title" value="{{Input::old('title')}}">
	</fieldset>
	<fieldset>
		<label for="body">本文:</label>
		<textarea class="normal-textarea" required="" name="body" id="body">{{Input::old('body')}}</textarea>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<button type="submit" class="normal-button center">送信</button>
</form>
@stop