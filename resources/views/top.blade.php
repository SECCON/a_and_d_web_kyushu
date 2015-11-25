@extends('layouts.master')

@section('title', 'A&D　名刺預かりサービスへようこそ！')

@section('content')
@if (isset($topic))
<h2>最新のお知らせ</h2>
<div class="topics">
	<h3>{!!$topic->title!!}</h3>
	<p class="center">{!!$topic->body!!}</p>
</div>
@endif
<h2>サービス</h2>
<p class="center">本サービスは、お客様の名刺を<br>お預かりし簡単かつセキュアに管理できる画期的なサービスです！<br>下の会員登録からぜひ使ってみて下さい！</p>
<a href="/signup" class="big-button">会員登録へ</a>
<h2>今後の予定</h2>
<p class="center">スマートフォン版アプリの開発を進めています！<br>ご期待ください！</p>
@stop