@extends('layouts.master')

@section('title', '名刺一覧')

@section('content')
<a href="/cards/create" class="normal-button center">新規作成</a>
<table class="normal-table">
	<tr>
		<th>タグ</th>
		<th>名刺画像</th>
		<th></th>
	</tr>
@foreach($cards as $card)
	<tr>
		<td>{{$card->tag}}</td>
		<td><img src="/files/{!!$card->url!!}" width="200"></td>
		<td><a href="/cards/delete/{{$card->id}}" class="normal-button center">削除</a>
			<br><br><a href="/cards/update/{{$card->id}}" class="normal-button center">編集</a></td>
	</tr>
@endforeach
</table>
<?php echo $cards->render(); ?>
@stop