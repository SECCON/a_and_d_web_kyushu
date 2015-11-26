@extends('layouts.admin')

@section('title', 'お知らせ登録・編集')

@section('content')

<form method="post" action="" class="normal-form" enctype="multipart/form-data">
	<fieldset>
		<label for="is_public">公開:</label>
		<input type="checkbox" name="is_public" id="is_public" value="1" {{Config::get("strings.checked")[$topic->is_public]}}>
	</fieldset>
	<fieldset>
		<label for="title">タイトル:</label>
		<input type="text" name="title" id="title" value="{{$topic->title}}">
	</fieldset>
	<fieldset>
		<label for="body">本文:</label>
		<textarea name="body" id="body" >{{$topic->body}}</textarea>
	</fieldset>
	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<button type="submit" class="normal-button center">送信</button>
</form>
@stop