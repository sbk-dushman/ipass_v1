{{-- <!doctype html> --}}

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>iPass Print</title> --}}
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    {{--dump($datas)--}}
<div class="cards">
    {{--dd($selectedPrint->chunk(2))--}}
        @foreach ($selectedPrint->chunk(2) as  $data)

{{-- @dump($data) --}}
 <div class="card-block">
             @foreach($data as $datas)

                @if ($datas->shablon == 2)

                    <div class="teach-card">
                        <div class="teach-card__logo">
                        <img src="/storage/images/logo.png">
                        </div>
                        <div class="teach-photo">
                            <img src="/storage/images/{{$datas->photo}}">
                        </div>
                        <div class="params">
                            <div class="lastname">
                                <pre>Фамилия</pre>
                                {{ $datas->lastname }}
                            </div>
                            <div class="firstname">
                                <pre>Имя</pre>
                                {{ $datas->name }}
                            </div>
                            <div class="patronymic">
                                <pre>Отчество</pre>
                                {{ $datas->surname }}
                            </div>
                            <div class="position">
                                <pre>Должность</pre>
                                преподаватель
                            </div>
                        </div>
                    </div>
                  @elseif($datas->shablon == 1)
                <div class="studcard card-wrap">
                    <div class="card-wrap-figure top"></div>
                    <div class="card-wrap-figure bottom"></div>
                    <div class="card-wrap-figure2 left"></div>
                    <div class="card-wrap-figure2 right"></div>
                    <div class="card">
                    <div class="header">
                        <p>МИНИСТЕРСТВО ОБРАЗОВАНИЯ РЕСПУБЛИКИ БАШКОРТОСТАН</p>
                        <p>Государственное бюджетное образовательное учреждение</p>
                        <p>«Уфимский колледж статистики, информатики и вычислительной техники»</p>
                    </div>
                    <div class="data">
                        <div class="img">
                            <img src="/storage/images/{{$datas->photo}}"
                                alt="">
                        </div>
                        <div class="info">
                            <div class="stud">СТУДЕНЧЕСКИЙ БИЛЕТ №<span class="stud-number">777-777</span></div>
                            <div class="stud-surname">Фамилия <span class="surname">{{ $datas->lastname }}</span></div>
                            <div class="stud-name">
                                Имя
                                <span class="name">{{ $datas->name }}</span>
                            </div>
                            <div class="stud-name">
                                отчество
                                <span class="name"> {{ $datas->surname }} </span>
                            </div>
                            <div class="stud-form">Форма обучения <span class="form">{{ $datas->form_of_education }}</span></div>
                            <div class="stud-order">Зачислен приказом от <span class="order-date">{{ $datas->date_of_enrollment }}</span> №<span
                                        class="stud-order-number">101</span></div>
                            <div class="stud-time">Дата выдачи <span class="time"><?php echo date('d'); ?> {{ $dateNow }} <?php echo date('Y'); ?>г.</span></div>
                            <div class="sign">_____________________</div>
                            <div class="sign-description">(подпись студента)</div>
                        </div>
                    </div>
                    <div class="director">
                        Директор колледжа ________________________ Кунсбаев С. З.
                    </div>
                    </div>
                </div>
                @endif

        @endforeach
</div>

                  @if ($loop->index%2)
                    <div class="breaker"></div>


                @endif
        @endforeach


<style>
       html, body {
        margin: 0;
        font-family: 'Times New Roman';
    }
    body{
			width: 725px;
		}

</style>


</body>
</html>

