<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="/css/all.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<div class="all-container">
    <main class="main-container">

        @section('sidebar')
        <header>
				<div class="search-box">
					<form action="">
						<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
						<input type="text" placeholder="Поиск...">
					</form>
				</div>
				<div class="select-box">
					<select name="" id="">
						<option value=""></option>
						<option value="">2</option>
						<option value="">3</option>
					</select>
				</div>
				<nav>
					<ul>
						<li>
							<a href=""><i class="fa fa-table" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href="file:///C:/Users/admin/Desktop/1/index.html?"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href=""><i class="fa fa-user" aria-hidden="true"></i></a>
						</li>
						<li>
							<a href=""><i class="fa fa-refresh" aria-hidden="true"></i></a>
						</li>
					</ul>
				</nav>
			</header>
            {{-- <aside class="sidebar">
                <div class="container">
                    <ul class="link-list">
                        <li class="link-list__item"><a title="Поиск по базе" href="/search"><i class="fas fa-search"></i></a></li>
                        <li class="link-list__item"><a title="Список групп" href="/group"><i class="fas fa-table"></i></a></li>
                        <li class="link-list__item"><a title="Список для печати" href="/selected"><i class="fas fa-user-check"></i></a></li>
                        <li class="link-list__item"><a title="Таблица сотрудников" href="{{ route('personal')}}"><i class="fas fa-user-tie"></i></a></li>
                        {{-- <li class="link-list__item"><a title="Загрузка данных сотрудников" href="route('file.upload')"><i class="fas fa-file-download"></i></a></li> --}}
                        {{-- <li class="link-list__item"><a title="Синхронизация с 1С" href="#"><i class="fas fa-sync-alt"></i></a></li>
                    </ul>
                </div> --}}
           {{-- </aside> --}}
        @show

        <div class="table-box">
				  @yield('content')
			</div>
    </main>
</div>
            {{-- <table>
					<tr>
						<th>#</th>
						<th>Фамилия</th>
						<th>Имя</th>
						<th>Отчество</th>
						<th>Группа</th>
						<th></th>
					</tr>
					<tr>
						<td>1</td>
						<td>Иванов</td>
						<td>Иван</td>
						<td>Иванович</td>
						<td>17Ис-2</td>
						<td><i class="fa fa-plus" aria-hidden="true"></i></td>
					</tr>
					<tr>
						<td>1</td>
						<td>Иванов</td>
						<td>Иван</td>
						<td>Иванович</td>
						<td>17Ис-2</td>
						<td><i class="fa fa-plus" aria-hidden="true"></i></td>
					</tr>
				</table> --}}

    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>

</body>
</html>
