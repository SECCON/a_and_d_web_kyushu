@extends('layouts.master')

@section('title', '名刺登録・編集')

@section('content')

<form method="post" action="" class="normal-form" enctype="multipart/form-data">
	<fieldset>
		<label for="tag">タグ:</label>
		<input type="text" name="tag" id="tag" value="{{$card->tag}}">
	</fieldset>
	<fieldset>
		<label for="password">画像:</label>
		<input type="file" name="file" id="file">
@if ($card->url != "")
		<br>
		<img src="/files/{!!$card->url!!}" width="200">
@endif
	</fieldset>

	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<button type="submit" class="normal-button center">送信</button>
</form>
@stop