<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="{{ asset('js/app.js') }}" defer></script>
	<link rel="stylesheet" href="{{ asset('css/all.css') }}">
</head>
<body>
  
	<div class="all-container">
		<div class="main-container">


			@section('header')
				<header>

					<div class="search-box">
						<form action="">
							<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
							<input type="text" placeholder="Поиск...">
						</form>
					</div>

					@if ( Request::is('group*') )
						@include('ready.dropdown')
					@elseif ( Request::is('selected') )
						@include('ready.print')
					@elseif ( Request::is('workers') )
						<div></div>
					@endif
						
					<nav>
						<ul>
							<li>
								<a href="{{ route('group') }}"><i class="fa fa-table" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="{{ route('selected') }}"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="{{ route('workers') }}"><i class="fa fa-user" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href=""><i class="fa fa-refresh" aria-hidden="true"></i></a>
							</li>
						</ul>
					</nav>
	
				</header>	
			@show


			@yield('content')


		</div>
	</div>
</body>
</html>