@extends('layouts.admin')

@section('title', 'お知らせ一覧')

@section('content')
<a href="/admin/topics/create" class="normal-button center">新規作成</a>
<table class="normal-table">
	<tr>
		<th>ID</th>
		<th>公開/非公開</th>
		<th>作成日<br>更新日</th>
		<th>タイトル</th>
		<th></th>
	</tr>
@foreach($topics as $topic)
	<tr>
		<td>{{$topic->id}}</td>
		<td>{{Config::get('strings.yn')[$topic->is_public]}}</td>
		<td>{{$topic->created_at}}<br>{{$topic->updated_at}}</td>
		<td>{!!$topic->title!!}</td>
		<td><a href="/admin/topics/delete/{{$topic->id}}" class="normal-button center">削除</a>
			<br><a href="/admin/topics/update/{{$topic->id}}" class="normal-button center">編集</a></td>
	</tr>
@endforeach
</table>
<?php echo $topics->render(); ?>
@stop