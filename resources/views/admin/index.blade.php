@extends('layouts.admin')

@section('title', 'A&D　管理ページ')

@section('content')
@if (isset($topic))
<h2>最新のお知らせ</h2>
<div class="topics">
	<h3>{!!$topic->title!!} ({{$topic->created_at}})</h3>
	<p class="center">{!!$topic->body!!}</p>
</div>
@endif
@if (isset($inquiry))
<h2>最新のお問い合わせ</h2>
<div class="topics">
	<h3>{!!$inquiry->title!!} by {!!$inquiry->name!!} ({{$inquiry->created_at}})</h3>
	<p class="center">{!!$inquiry->body!!}</p>
</div>
@endif
@stop