<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<style>
		body, html {
		margin: 0;
		padding: 0;
		height: 100%;
		width: 100%;
		box-sizing: border-box;
		font-family: sans-serif;
	}
	.all-container {
		/* padding-top: 20px; */
		width: 100%;
		height: 100%;
		background-color: #60C4F2;
	}
	.all-container .main-container {
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
	header input:active{
		border:none;
		outline: none;
	}
	header input:focus {
		border:none;
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
	.table-box table tr td:nth-child(9) {
		width: 25px;
		height: 40px;
		padding-right: 6px;
		padding-left: 6px;
		text-align: center;
	}
	.table-box table tr th:last-child {
		height: 20px;
		padding-left: 0px;
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
	.table-box table tr td:first-child {
		width: 25px;
	}
	.table-box table tr {
		transition: 0.2s ease-in-out;
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
	select {
		border-radius: 5px;
		border: 1px solid #000;
	}
	select:active{
		/* border-radius: 5px; */
		outline: none;
	}
	option:active {
		outline: none;
	}
	option{
		border-radius: 5px;
		box-shadow: none;
	}
	a {
		color: black;
	}
	.print-box {
		padding-top: 25px;
	}
	.print-box button {
		width: 200px;
		height: 44px;
		background-color: #fff;
		border: none;
		outline: none;
		border-radius: 5px;
		box-shadow: 0 5px 10px rgb(0, 0, 0, 0.2);
		font-size: 16px;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.print-box button:hover,
	.print-box button .fa:hover {
		color: #60C4F2;
	}
	.print-box button:focus,
	.print-box button:active {
		border: none;
		outline: none;
	}
	.print-box button .fa {
		font-size: 30px;
		padding-left: 10px;
	}
	
	</style>	


	<div class="all-container">
		<div class="main-container">
			<header>
				<div class="search-box">
					<form action="">
						<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
						<input type="text" placeholder="Поиск...">
					</form>
				</div>
				<div class="print-box">
					<button>Печать<i class="fa fa-print" aria-hidden="true"></i></button>
				</div>
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
						<th></th>
						<th>Фамилия</th>
						<th>Имя</th>
						<th>Отчество</th>
						<th>Группа</th>
						<th>Должность</th>
						<th>Шаблон</th>
						<th></th>
					</tr>
					@foreach ($selecteds as $item)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>
								@if ( $item->group )
                                    <i class="fas fa-graduation-cap"></i>
                                @else
                                    <i class="fas fa-hard-hat"></i>
                                @endif
							</td>
							<td>{{$item->surname}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->lastname}}</td>
							<td>{{$item->group}}</td>
							<td>{{$item->position}}</td>
							<td>
								@if ($item->group)
                                    <select class="select" name="{{ $item->id }}">
                                        <option selected value="2">Студент</option>
                                    </select>
                                @else
                                    <select class="select" name="{{ $item->id }}">
                                        <option value="1">Преподователь</option>
                                        <option selected value="2">Студент</option>
                                    </select>
                                @endif
							</td>
							<td>
								@if ($item->group)
									<i class="fa fa-trash-o" aria-hidden="true"></i>
								@else
									<i class="fa fa-trash-o" aria-hidden="true"></i>
									<i class="fa fa-pencil" aria-hidden="true"></i>
								@endif
							</td>
						</tr>
					@endforeach
					{{-- <tr>
						<td>1</td>
						<th></th>
						<td>Иванов</td>
						<td>Иван</td>
						<td>Иванович</td>
						<td>17Ис-2</td>
						<td></td>
						<td>
							<select name="" id="">
								<option value="" selected>Студент</option>
								<option value="">Преподователь</option>
							</select>
						</td>
						<td><i class="fa fa-trash-o" aria-hidden="true"></i></td>
						<td></td>
					</tr>
					<tr>
						<td>2</td>
						<th></th>
						<td>Иванов</td>
						<td>Иван</td>
						<td>Иванович</td>
						<td></td>
						<td>Преподователь</td>
						<td>
							<select name="" id="">
								<option value="" selected>Студент</option>
								<option value="">Преподователь</option>
							</select>
						</td>
						<td><i class="fa fa-trash-o" aria-hidden="true"></i></td>
						<td><i class="fa fa-pencil" aria-hidden="true"></i></td>
					</tr> --}}
				</table>
			</div>
		</div>
	</div>



</body>
</html>