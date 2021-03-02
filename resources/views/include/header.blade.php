<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>CMS - Laravel 8</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href=" {{ asset('css/font-awesome.min.css') }}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->


</head>

<body>
	<!-- HEADER -->
	<header id="header">
		<!-- NAV -->
		<div id="nav">
			<!-- Top Nav -->
			<div id="nav-top">
				<div class="container">
					<!-- social -->
					<ul class="nav-social">
						<li><a href="/"><h4>{{ $blog_name }}</h4></a></li>
						<li><a href="www.facebook.com"><i class="fa fa-twitter"></i></a></li>
						<li><a href="www.google.com"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="www.instagram.com"><i class="fa fa-instagram"></i></a></li>
					</ul>
					<!-- /social -->

					<!-- search & aside toggle -->
					<div class="nav-btns">
						<button class="aside-btn"><i class="fa fa-bars"></i></button>
						<button class="search-btn"><i class="fa fa-search"></i></button>
						<div id="nav-search">
							<form method="GET" action="/results">
								@csrf
								<input type="text" class="input" name="search" placeholder="Enter your search...">
							</form>
							<button class="nav-close search-close">
								<span></span>
							</button>
						</div>
					</div>
					<!-- /search & aside toggle -->
				</div>
			</div>
			<!-- /Top Nav -->

			<!-- Main Nav -->
			<div id="nav-bottom">
				<div class="container">
					<!-- nav -->
					<ul class="nav-menu">
						@foreach ($categories as $category)
							<li><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></li>
						@endforeach
					</ul>
					<!-- /nav -->
				</div>
			</div>
			<!-- /Main Nav -->

			<!-- Aside Nav -->
			<div id="nav-aside">
				<ul class="nav-aside-menu">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li class="has-dropdown"><a>Categories</a>
						<ul class="dropdown">
							@foreach ($categories as $category)
								<li><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></li>
							@endforeach
						</ul>
					</li>
					<li><a href="{{ route('about') }}">About Us</a></li>
					<li><a href="{{ route('contact') }}">Contact Us</a></li>
					{{-- Show Login & Register Links for Not Authenticated Users --}}
					@if (!Auth::check())
						<li><a href="{{ route('register') }}">Register</a></li>
						<li><a href="{{ route('login') }}">Login</a></li>
					@endif
					@if (Auth::check())
						<li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
					@endif
				</ul>
				<button class="nav-close nav-aside-close"><span></span></button>
			</div>
			<!-- /Aside Nav -->
		</div>
		<!-- /NAV -->
	</header>
	<!-- /HEADER -->
