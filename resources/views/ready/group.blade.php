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
                                @if ($addStatus->Oba())
                                	    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
                                        <path style="fill:#A5EB78;" d="M427.534,73.084l-224.51,224.51c-6.051,6.051-15.863,6.051-21.914,0l-96.645-96.645L8.099,277.313  l145.785,145.785c10.127,10.127,23.862,15.816,38.183,15.816l0,0c14.32,0,28.057-5.69,38.182-15.816l273.65-273.65L427.534,73.084z"/>
                                            <g style="opacity:0.1;">
                                                <path d="M478.646,124.196L189.754,413.087c-7.993,7.992-18.043,13.442-28.902,15.872c9.066,6.425,19.956,9.955,31.215,9.955l0,0   c14.32,0,28.057-5.69,38.182-15.816l273.65-273.65L478.646,124.196z"/>
                                            </g>
                                            <path d="M192.068,447.014c-16.587,0-32.182-6.459-43.912-18.189L2.372,283.04c-3.163-3.163-3.163-8.292,0-11.454l76.366-76.366  c3.164-3.163,8.292-3.163,11.455,0l28.668,28.667c3.163,3.163,3.163,8.292,0,11.454c-3.165,3.163-8.293,3.162-11.455,0l-22.94-22.94  l-64.911,64.911l140.058,140.058c8.669,8.669,20.195,13.443,32.456,13.443c12.26,0,23.785-4.775,32.456-13.443l186.951-186.952  c3.163-3.163,8.291-3.164,11.455,0c3.163,3.163,3.163,8.292,0,11.454L235.979,428.826  C224.248,440.555,208.653,447.014,192.068,447.014z"/>
                                            <path d="M192.068,310.232c-6.303,0-12.228-2.454-16.684-6.911l-45.068-45.068c-3.163-3.163-3.163-8.292,0-11.454  c3.164-3.163,8.292-3.163,11.455,0l45.068,45.068c1.396,1.396,3.254,2.165,5.229,2.165s3.833-0.769,5.23-2.166L421.806,67.357  c3.164-3.163,8.292-3.163,11.455,0l76.366,76.366c1.518,1.518,2.372,3.579,2.372,5.727s-0.853,4.209-2.372,5.727l-63.787,63.787  c-3.164,3.163-8.292,3.162-11.455,0c-3.163-3.163-3.163-8.292,0-11.454l58.061-58.06l-64.91-64.91L208.752,303.321  C204.295,307.777,198.369,310.232,192.068,310.232z"/>
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
                                    @else

                                <button
									class="btn_add"
									type="submit"
									name="add_to_cart"
									value="{{ $item->id }}"
								>
									<i class="fa fa-plus" aria-hidden="true"></i>
								</button>
                                 @endif
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
