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
    <main class="grid-container">
        @section('sidebar')
            <aside class="sidebar">
                <div class="container">
                    <ul class="link-list">
                        <li class="link-list__item"><a title="Поиск по базе" href="{{-- route('search-get') --}}"><i class="fas fa-search"></i></a></li>
                        <li class="link-list__item"><a title="Список групп" href="{{-- route('groups')--}}"><i class="fas fa-table"></i></a></li>
                        <li class="link-list__item"><a title="Список для печати" href="{{-- route('selected-URL') --}}"><i class="fas fa-user-check"></i></a></li>
                        <li class="link-list__item"><a title="Таблица сотрудников" href="{{-- route('personal')--}}"><i class="fas fa-user-tie"></i></a></li>
                        <li class="link-list__item"><a title="Загрузка данных сотрудников" href="{{-- route('file.upload') --}}"><i class="fas fa-file-download"></i></a></li>
                        <li class="link-list__item"><a title="Синхронизация с 1С" href="#"><i class="fas fa-sync-alt"></i></a></li>
                    </ul>
                </div>
            </aside>
        @show
        <div class="content">
            @yield('content')
        </div>
    </main>
    {{-- <div class="container-main">

    @yield('content')

    </div> --}}
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>

</body>
</html>
