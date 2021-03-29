
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
	html, body {
		height: 100%;
	}
	.container {
		height: 100%;
		display: flex;
		flex-direction: column;
		justify-content: center;
	}
</style>
<body>
	<div class="container">
		<div class="row">
			{{-- <div class="col-lg-4"></div> --}}
			<div class="col-lg-6">
				@yield('content')
			</div>
			{{-- <div class="col-lg-4"></div> --}}
		</div>
	</div>
</body>
</html>