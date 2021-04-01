<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.6.0.slim.js"
		integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<style>
	body,
	html {
		margin: 0;
		padding: 0;
		height: 100%;
		width: 100%;
		box-sizing: border-box;
		font-family: sans-serif;
	}

	.all_container {
		/* padding-top: 20px; */
		width: 100%;
		height: 100%;
		background-color: #60C4F2;
	}

	.all_container .main_container {
		/* padding-top: 20px; */
		margin: 0 auto;
		/* border: 1px solid black; */
		width: 1200px;
		height: 100%;
		background-color: #60C4F2;
		display: grid;
		grid-template-rows: 100px 1fr 40px;
		grid-gap: 5px;
	}

	header {
		display: grid;
		grid-template-columns: 700px 1fr 200px;
		/* border: 1px solid black; */
		/* align-items: center; */
	}

	header .search-box input {
		border-radius: 5px;
		/* margin-left: 16px; */
		margin-top: 26px;
		width: 600px;
		height: 40px;
		outline: none;
		border: none;
		box-shadow: 0 5px 10px rgb(0, 0, 0, 0.2);
		font-size: 16px;
		padding-left: 20px;
	}

	header .search-box input:active {
		border: none;
		outline: none;
	}

	header .search-box input:focus {
		border: none;
		outline: none;
	}

	header nav {

		padding-top: 20px;
		margin: 0;
		/* margin-right: 16px; */
		height: 60px;

	}

	header nav ul {
		border-radius: 5px;
		margin: 0;
		height: 100%;
		background-color: #fff;
		list-style-type: none;
		display: grid;
		padding: 0;
		grid-template-columns: 1fr 1fr 1fr 1fr;
		box-shadow: 0 5px 10px rgb(0, 0, 0, 0.2);
	}

	header nav ul li {
		display: flex;
		justify-content: center;
		align-items: center;

	}

	.search-box {
		position: relative;
	}

	.search-box button {
		position: absolute;
		top: 33px;
		left: 584px;
		border: none;
		background-color: #fff;
	}

	.search-box button:focus {
		outline: none;
		border: none;
	}

	.search-box button:active {
		outline: none;
		border: none;
	}

	header nav ul li:hover {
		background-color: rgb(223, 223, 223);
	}

	header nav ul li:hover:first-child {
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
	}

	header nav ul li:hover:last-child {
		border-top-right-radius: 5px;
		border-bottom-right-radius: 5px;
	}

	.table-box {
		border-radius: 5px;
		/* border: 1px solid black; */
		box-shadow: 0 50px 40px rgb(0, 0, 0, 0.2);
		background-color: #fff;
	}

	.table-box table {
		width: 100%;
		/* height: 100%; */
	}

	.table-box table tr th {
		height: 40px;
		padding-left: 20px;
		text-align: left;
	}

	.table-box table tr th:nth-child(7) {
		height: 40px;
		padding-left: 0px;
		text-align: center;
	}

	.table-box table tr th:last-child {
		height: 20px;
		width: 25px;
		padding-left: 0px;
	}

	.table-box table tr td:last-child {
		width: 25px;
		display: flex;
		align-items: center;
		padding-right: 10px;
		/* margin: 10px; */
	}

	.table-box table tr td {
		height: 40px;
		padding-left: 20px;
	}

	.table-box table tr td:nth-child(7) {
		text-align: center;
		padding: 0;
	}

	.table-box table tr td:nth-child(8) {
		text-align: center;
		padding: 0;
	}

	.table-box table tr td:nth-child(6) {
		display: flex;
		justify-content: center;
		align-items: center;
		padding-right: 10px;
		padding-left: 10px;
	}

	.table-box table tr td:nth-child(6) button {
		outline: none;
		border: none;
		background: transparent;
		/* margin-right: 10px; */
	}

	.table-box table tr td:nth-child(6) button:focus {
		outline: none;
		border: none;
	}

	.table-box table tr td:nth-child(6) button:active {
		outline: none;
		border: none;
	}

	.table-box table tr td:first-child {
		width: 25px;
	}

	.table-box table tr {
		transition: 0.1s ease-in-out;
	}

	.table-box table tr:first-child {
		/* transition: 0.2s ease-in-out; */
		height: 40px;
		background-color: rgb(243, 242, 242);
	}

	.table-box table tr:hover {
		background-color: rgb(243, 242, 242);
	}

	.fa {
		font-size: 24px;
	}

	.fa:hover {
		color: #60C4F2;
	}

	header .select-box .dropdown {
		margin-top: 25px;
		width: 200px;
		height: 100%;
		
	}

	.dropbtn {
		width: 200px;
		border-radius: 5px;
		height: 44px;
		background-color: #fff;
		color: black;
		/* padding: 16px; */
		font-size: 16px;
		border: none;
		cursor: pointer;
		box-shadow: 0 5px 10px rgb(0, 0, 0, 0.2);
	}

	.dropbtn:focus,
	.dropbtn:active {
		outline: none;
		border: none;
	}

	.dropbtn:hover,
	.dropbtn:focus {
		background-color: #fff;
	}

	#myInput {
		box-sizing: border-box;
		background-image: url('searchicon.png');
		background-position: 14px 12px;
		background-repeat: no-repeat;
		font-size: 16px;
		padding: 14px 20px 12px 45px;
		border: none;
		border-bottom: 1px solid #ddd;
	}

	#myInput:focus {
		outline: none
	}

	.dropdown {
		height: 40px;
		position: relative;
		display: inline-block;
	}

	.dropdown-content {
		display: none;
		position: absolute;
		background-color: #f6f6f6;
		min-width: 230px;
		overflow: auto;
		border: 1px solid #ddd;
		z-index: 1;
	}

	.dropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}

	.dropdown a:hover {
		background-color: #ddd;
	}

	.show {
		display: block;
	}
	a {
		color: #000;
	}
</style>

<body>
	<div class="all_container">
		<div class="main_container">
			<header>
				<div class="search-box">
					<form action="">
						<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
						<input type="text" placeholder="Поиск...">
					</form>
				</div>
				<div class="select-box">
					<div class="dropdown">
						<button onclick="myFunction()" class="dropbtn">Выбрать группу</button>
						<div id="my Dropdown" class="dropdown-content">
							<input type="text" placeholder="Поиск.." id="myInput" onkeyup="filterFunction()">
							@foreach ($groups as $item)
								<a href="/group{{$item->group_id}}">{{ $item->group }}</a>
							@endforeach		
						</div>
					</div>
				</div>
				<script>
					function myFunction() {
						document.getElementById("my Dropdown").classList.toggle("show");
					}

					function filterFunction() {
						var input, filter, ul, li, a, i;
						input = document.getElementById("myInput");
						filter = input.value.toUpperCase();
						div = document.getElementById("my Dropdown");
						a = div.getElementsByTagName("a");
						for (i = 0; i < a.length; i++) {
							txtZnac = a[i].textSod || a[i].innerText;
							if (txtZnac.toUpperCase().indexOf(filter) > -1) {
								a[i].style.display = "";
							} else {
								a[i].style.display = "none";
							}
						}
					}
				</script>
				<nav>
					<ul>
						<li>
							<a href="/group"><i class="fa fa-table" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="/selected"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
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
			<div class="table-box">
				<table>
					<tr>
						<th>#</th>
						<th>Фамилия</th>
						<th>Имя</th>
						<th>Отчество</th>
						<th>Группа</th>
						<th></th>
					</tr>
					@foreach ($students as $item)
					<form action="" method="POST">
						{{ csrf_field() }}
						<tr>	
							<td>{{$loop->iteration}}</td>
							<td>{{$item->surname}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->lastname}}</td>
							<td>{{$item->group}}</td>
							<td>
								<button 
									class="btn_add"
									type="submit"
									name="add_to_cart"
									value="{{ $item->id }}"
								>  
									<i class="fa fa-plus" aria-hidden="true"></i>
								</button>
							</td>	
						</tr>
					</form>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</body>

</html>