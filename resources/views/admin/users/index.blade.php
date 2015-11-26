@extends('layouts.admin')

@section('title', 'ユーザ一覧')

@section('content')
<a href="/admin/users/create" class="normal-button center">新規作成</a>
<table class="normal-table">
	<tr>
		<th class="small">ID</th>
		<th>権限</th>
		<th>作成日<br>更新日</th>
		<th>カナ<br>名前</th>
		<th>メールアドレス<br>電話番号</th>
		<th></th>
	</tr>
@foreach($users as $user)
	<tr>
		<td>{{$user->id}}</td>
		<td>{{Config::get("strings.group")[$user->is_admin]}}</td>
		<td>{{$user->created_at}}<br>{{$user->updated_at}}</td>
		<td>{!!$user->kana!!}<br>{!!$user->name!!}</td>
		<td>{!!$user->email!!}<br>{!!$user->tel!!}</td>
		<td><a href="/admin/users/delete/{{$user->id}}" class="normal-button center">削除</a>
			<br><a href="/admin/users/update/{{$user->id}}" class="normal-button center">編集</a></td>
	</tr>
@endforeach
</table>
<?php echo $users->render(); ?>
@stop