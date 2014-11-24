<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!--<link rel="stylesheet" href="http://bootswatch.com/united/bootstrap.min.css"/>-->
	<link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/css/bootstrapValidator.min.css"/>
	<link rel="stylesheet" href="/css/style.css"/>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
							data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Mega Beton</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				@forelse($urlList as $key => $url)
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{$key}} <span
									class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						@foreach($url as $u)
						<li><a href="{{$u->nama}}">{{$u->judul}}</a></li>
						@endforeach
					</ul>
				</li>
				@empty
				@endforelse
			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
				<li><p class="navbar-text">{{Auth::user()->username}}</p></li>
				<li><a href="{{URL::route('auth.logout')}}">Logout</a></li>
				@else
				<li><a href="{{URL::route('auth.login')}}">Login</a></li>
				@endif
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
<div class="container">
	@yield('content')
</div>
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/js/moment.js"></script>
<script src="/js/bootstrapValidator.min.js"></script>
<script src="/js/faktur.js"></script>
</body>
</html>