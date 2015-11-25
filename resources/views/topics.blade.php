@extends('layouts.master')

@section('title', 'お知らせ')

@section('content')
@foreach($topics as $topic)
<div class="topics">
	<h3>{!!$topic->title!!}</h3>
	<p class="center">{!!$topic->body!!}</p>
</div>
@endforeach
<?php echo $topics->render(); ?>
@stop