@extends('layouts.admin')

@section('title', 'お問い合わせ一覧')

@section('content')
<table class="normal-table">
	<tr>
		<th>ID</th>
		<th>作成日<br>更新日</th>
		<th>タイトル<br>本文</th>
		<th>確認</th>
	</tr>
@foreach($inquiries as $inquiry)
	<tr>
		<td>{{$inquiry->id}}</td>
		<td>{{$inquiry->created_at}}<br>{{$inquiry->updated_at}}</td>
		<td>{!!$inquiry->title!!}<br>{!!nl2br($inquiry->body)!!}</td>
		<td>
		@if ($inquiry->is_done != 1)
			<a href="/admin/inquiries/update/{{$inquiry->id}}" class="normal-button center">確認</a>
		@else
			確認済み
		@endif
		</td>
	</tr>
@endforeach
</table>
<?php echo $inquiries->render(); ?>
@stop