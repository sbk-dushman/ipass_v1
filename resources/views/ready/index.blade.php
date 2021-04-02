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
							<button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="20" height="20" viewBox="0 0 30.239 30.239" style="enable-background:new 0 0 30.239 30.239;" xml:space="preserve">
<g>
	<path d="M20.194,3.46c-4.613-4.613-12.121-4.613-16.734,0c-4.612,4.614-4.612,12.121,0,16.735   c4.108,4.107,10.506,4.547,15.116,1.34c0.097,0.459,0.319,0.897,0.676,1.254l6.718,6.718c0.979,0.977,2.561,0.977,3.535,0   c0.978-0.978,0.978-2.56,0-3.535l-6.718-6.72c-0.355-0.354-0.794-0.577-1.253-0.674C24.743,13.967,24.303,7.57,20.194,3.46z    M18.073,18.074c-3.444,3.444-9.049,3.444-12.492,0c-3.442-3.444-3.442-9.048,0-12.492c3.443-3.443,9.048-3.443,12.492,0   C21.517,9.026,21.517,14.63,18.073,18.074z"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
</button>
							<input type="text" placeholder="Поиск...">
						</form>
					</div>

					@if ( Request::is('group*') )
						@include('ready.dropdown')
					@elseif( Request::is('selected') )
						@include('ready.print')
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
								<a href="/workers"><i class="fa fa-user" aria-hidden="true"></i></a>
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
