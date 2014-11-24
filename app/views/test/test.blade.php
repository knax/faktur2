<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css"/>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Brand</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				@forelse($urlList as $key => $url)
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{$key}} <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						@foreach($url as $u)
						<li><a href="{{$u->nama}}">{{$u->judul}}</a></li>
						@endforeach
					</ul>
				</li>
				@else
				@endforeach
			</ul>

			<!--<ul class="nav navbar-nav navbar-right">-->
				<!--<li><a href="#">Link</a></li>-->
				<!--<li class="dropdown">-->
					<!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>-->
					<!--<ul class="dropdown-menu" role="menu">-->
						<!--<li><a href="#">Action</a></li>-->
						<!--<li><a href="#">Another action</a></li>-->
						<!--<li><a href="#">Something else here</a></li>-->
						<!--<li class="divider"></li>-->
						<!--<li><a href="#">Separated link</a></li>-->
					<!--</ul>-->
				<!--</li>-->
			<!--</ul>-->
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>