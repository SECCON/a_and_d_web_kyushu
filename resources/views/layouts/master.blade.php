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
			<li><a href="/">トップ</a></li>
			<li><a href="/topics">お知らせ</a></li>
			<li><a href="/cards">名刺</a></li>
			<li><a href="/log">ログイン履歴</a></li>
			@if (isset($user) && $user != null)
			<li class="logout"><a href="/?logout=1">ログアウト</a></li>
			<li class="header_user"><a href="/setting">名前</a></li>
			@else
			<li class="logout">
				<a href="/signin">ログイン</a>
			</li>
			<li class="logout">
				<a href="/signup">登録</a>
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
		<div><a href="/policy">プライバシーポリシー</a> | <a href="/term">利用規約</a> | <a href="/company">運営会社</a> | <a href="/inquiry">お問い合わせ</a></div>
		<p>Copyright 2015 エーアンドディー株式会社 All rights reserved.</p>
	</footer>
</div>
</body>
</html>
