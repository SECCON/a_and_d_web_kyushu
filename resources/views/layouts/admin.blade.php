<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title') | A&D　名刺預かりサービス</title>
	<link type="text/css" rel="stylesheet" href="/css/main.css" />
</head>
<body>
<div class="container">
	<header>
		<a href="/">
			<img src="/img/s_ad.png" width="100" height="100" alt="a_and_d">
		</a>

		@section('menu')
		<ul>
			<li><a href="/admin">トップ</a></li>
			@if (isset($user) && $user != null)
			<li><a href="/admin/topics">お知らせ</a></li>
			<li><a href="/admin/users">ユーザ</a></li>
			<li><a href="/admin/cards">名刺</a></li>
			<li><a href="/admin/inquiries">お問い合わせ</a></li>
			<li class="logout"><a href="/logout">ログアウト</a></li>
			@else
			<li class="logout">
				<a href="/admin/signin">ログイン</a>
			</li>
			@endif
		</ul>
		@show
	</header>
	<section>
		<h1>@yield('title')</h1>
		@yield('content')
	</section>
	<footer>
		<p>Copyright 2015 エーアンドディー株式会社 All rights reserved.</p>
	</footer>
</div>
</body>
</html>
