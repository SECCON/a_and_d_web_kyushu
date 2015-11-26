@extends('layouts.master')

@section('title', '名刺一覧')

@section('content')
<form class="normal-form" method="get">
	検索:<input type="text" name="q" value="{{$q}}">
</form>
<table class="normal-table">
	<tr>
		<th>ユーザ</th>
		<th>タグ</th>
		<th>名刺画像</th>
		<th></th>
	</tr>
@foreach($cards as $card)
	<tr>
		<td>
			@if($card->user != null)
				{{$card->user->name}}
			@endif
		</td>
		<td>{{$card->tag}}</td>
		<td><img src="/files/{!!$card->url!!}" width="200"></td>
		<td><a href="/admin/cards/delete/{{$card->id}}" class="normal-button center">削除</a></td>
	</tr>
@endforeach
</table>
<?php echo $cards->render(); ?>
@stop