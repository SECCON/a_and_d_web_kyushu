@extends('layouts.master')

@section('title', 'ログイン履歴')

@section('content')
<table class="normal-table">
	<tr>
		<th>日時</th>
		<th>IP</th>
		<th>UA</th>
	</tr>
@foreach($logs as $log)
	<tr>
		<td>{{$log->created_at}}</td>
		<td>{{$log->ip}}</td>
		<td>{{$log->ua}}</td>
	</tr>
@endforeach
</table>
<?php echo $logs->render(); ?>
@stop