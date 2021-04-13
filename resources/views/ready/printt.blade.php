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

</div>

<style>
       html, body {
        margin: 0;
        font-family: 'Times New Roman';
    }
    body{
			width: 725px;
		}

</style>


<script>
    function getAllUrlParams(url) {

        // get query string from url (optional) or window
        var queryString = url ? url.split('?')[1] : window.location.search.slice(1);

        // we'll store the parameters here
        var obj = {};

        // if query string exists
        if (queryString) {

            // stuff after # is not part of query string, so get rid of it
            queryString = queryString.split('#')[0];

            // split our query string into its component parts
            var arr = queryString.split('&');

            for (var i = 0; i < arr.length; i++) {
                // separate the keys and the values
                var a = arr[i].split('=');

                // set parameter name and value (use 'true' if empty)
                var paramName = a[0];
                var paramValue = typeof (a[1]) === 'undefined' ? true : a[1];

                // (optional) keep case consistent
                paramName = paramName.toLowerCase();
                if (typeof paramValue === 'string') paramValue = paramValue.toLowerCase();

                // if the paramName ends with square brackets, e.g. colors[] or colors[2]
                if (paramName.match(/\[(\d+)?\]$/)) {

                    // create key if it doesn't exist
                    var key = paramName.replace(/\[(\d+)?\]/, '');
                    if (!obj[key]) obj[key] = [];

                    // if it's an indexed array e.g. colors[2]
                    if (paramName.match(/\[\d+\]$/)) {
                        // get the index value and add the entry at the appropriate position
                        var index = /\[(\d+)\]/.exec(paramName)[1];
                        obj[key][index] = paramValue;
                    } else {
                        // otherwise add the value to the end of the array
                        obj[key].push(paramValue);
                    }
                } else {
                    // we're dealing with a string
                    if (!obj[paramName]) {
                        // if it doesn't exist, create property
                        obj[paramName] = paramValue;
                    } else if (obj[paramName] && typeof obj[paramName] === 'string') {
                        // if property does exist and it's a string, convert it to an array
                        obj[paramName] = [obj[paramName]];
                        obj[paramName].push(paramValue);
                    } else {
                        // otherwise add the property
                        obj[paramName].push(paramValue);
                    }
                }
            }
        }

        return obj;
    }

    const sub = (x) => ('0' + x).substr(-2);

    const today = `${sub(new Date().getDate())}.${sub(new Date().getMonth() + 1)}.${sub(new Date().getFullYear())}`;

    fetch('/db/groups.json')
        .then(res => res.json())
        .then(groups => {
            const ref = getAllUrlParams(window.location.href).ref;
            const student = getAllUrlParams(window.location.href).student;
            const studList = $.get("/listPrint/getListPrint.php", function (data) {
                let dt = JSON.parse(data)
                dt = dt.replace(/["[]/g,'').replace(']','').split(',')
                let group = [], students = [];
                if(!ref) {
                    if (student || dt) {
                        if (student) {
                            Object.values(groups).forEach(x => {
                                const match = Object.values(x.students).find(y => y.Profile_Key === student);
                                if (match) {
                                    group = x;
                                    students = [match];
                                }
                            });
                        } else {
                            Object.values(groups).forEach(x => {
                                Object.values(dt).forEach(val => {
                                    const match = Object.values(x.students).find(y => y.Profile_Key === val);
                                    if (match) {
                                        group.push(x);
                                        students.push(match);
                                    }

                                })
                            });
                        }
                    }
                }else {
                    group = Object.values(groups).find(x => x.Ref_Key === ref);
                    students = Object.values(group.students);
                }
            // })

            if(students.length % 2 !== 0) {
				students.push({
                    imageFile: '',
                    disable: true,
                });
            }



            let breaker = 0;
            if(group.length === undefined) {
            for (let i = 0; i <= students.length; i += 2) {
                breaker++;
                if (breaker === 3) {
                    breaker = 1;
                    $(".cards").append('<div class="breaker"></div>');
                }

                $('.cards').append(`<div class="card-block">
            <div class="card-wrap">
                <div class="card">
                    <div class="card-wrap-figure top"><img src="" alt=""></div>
                    <div class="card-wrap-figure bottom"><img src="" alt=""></div>
                    <div class="card-wrap-figure2 left"><img src="" alt=""></div>
                    <div class="card-wrap-figure2 right"><img src="" alt=""></div>
                    <div class="header">
                        <p>МИНИСТЕРСТВО ОБРАЗОВАНИЯ РЕСПУБЛИКИ БАШКОРТОСТАН</p>
                        <p>Государственное бюджетное профессиональное образовательное учреждение</p>
                        <p>Уфимский колледж статистики, информатики и вычислительной техники</p>
                    </div>
                    <div class="data">
                        <div class="img">
                            <img src="${students[i].imageFile}" alt="">
                        </div>
                        <div class="info">
                            <div class="stud">СТУДЕНЧЕСКИЙ БИЛЕТ № <span class="stud-number">${students[i].code}</span></div>
                            <div class="stud-surname">Фамилия <span class="surname">${students[i].surname}</span></div>
                            <div class="stud-name">Имя <span class="name">${students[i].name}</span></div>
                            <div class="stud-name">Отчество <span class="name">${students[i].patronymic}</span></div>
                            <div class="stud-form">Форма обучения <span class="form">${group.form}</span></div>
                            <div class="stud-order">Зачислен приказом от <span class="order-date">${group.orderDate}г.</span>  № <span class="stud-order-number">${group.order}</span></div>
                            <div class="stud-time">Дата выдачи <span class="time">${today}г.</span></div>
                            <div class="sign">_____________________</div>
                            <div class="sign-description">(подпись студента)</div>
                        </div>
                    </div>
                    <div class="director">
                        Директор  ___________________________________ Кунсбаев С. З.
                    </div>
                </div>
            </div>

            <div class="card-wrap ${students[i + 1].disable ? 'disabled' : ''}">
                <div class="card-wrap-figure top"><img src="" alt=""></div>
                <div class="card-wrap-figure bottom"><img src="" alt=""></div>
                <div class="card-wrap-figure2 left"><img src="" alt=""></div>
                <div class="card-wrap-figure2 right"><img src="" alt=""></div>
                <div class="card">
                    <div class="header">
                        <p>МИНИСТЕРСТВО ОБРАЗОВАНИЯ РЕСПУБЛИКИ БАШКОРТОСТАН</p>
                        <p>Государственное бюджетное профессиональное образовательное учреждение</p>
                        <p>Уфимский колледж статистики, информатики и вычислительной техники</p>
                    </div>
                    <div class="data">
                        <div class="img">
                            <img src="${students[i + 1].imageFile}" alt="">
                        </div>
                        <div class="info">
                            <div class="stud">СТУДЕНЧЕСКИЙ БИЛЕТ № <span class="stud-number">${students[i+1].code}</span></div>
                            <div class="stud-surname">Фамилия <span class="surname">${students[i+1].surname}</span></div>
                            <div class="stud-name">Имя <span class="name">${students[i+1].name}</span></div>
                            <div class="stud-name">Отчество <span class="name">${students[i+1].patronymic}</span></div>
                            <div class="stud-form">Форма обучения <span class="form">${group.form}</span></div>
                            <div class="stud-order">Зачислен приказом от <span class="order-date">${group.orderDate}г.</span>  № <span class="stud-order-number">${group.order}</span></div>
                            <div class="stud-time">Дата выдачи <span class="time">${today}г.</span></div>
                            <div class="sign">_____________________</div>
                            <div class="sign-description">(подпись студента)</div>
                        </div>
                    </div>
                    <div class="director">
                        Директор  ___________________________________ Кунсбаев С. З.
                    </div>
                </div>
            </div>
        </div>`);
            }
        }else {
			group.push({imageFile: '', disable: true});

			for (let i = 0; i < students.length-1; i += 2) {
                breaker++;
                if (breaker === 3) {
                    breaker = 1;
                    $(".cards").append('<div class="breaker"></div>');
                }

                $('.cards').append(`<div class="card-block">
            <div class="card-wrap">
                <div class="card">
                    <div class="card-wrap-figure top"><img src="" alt=""></div>
                    <div class="card-wrap-figure bottom"><img src="" alt=""></div>
                    <div class="card-wrap-figure2 left"><img src="" alt=""></div>
                    <div class="card-wrap-figure2 right"><img src="" alt=""></div>
                    <div class="header">
                        <p>МИНИСТЕРСТВО ОБРАЗОВАНИЯ РЕСПУБЛИКИ БАШКОРТОСТАН</p>
                        <p>Государственное бюджетное профессиональное образовательное учреждение</p>
                        <p>Уфимский колледж статистики, информатики и вычислительной техники</p>
                    </div>
                    <div class="data">
                        <div class="img">
                            <img src="${students[i].imageFile}" alt="">
                        </div>
                        <div class="info">
                            <div class="stud">СТУДЕНЧЕСКИЙ БИЛЕТ № <span class="stud-number">${students[i].code}</span></div>
                            <div class="stud-surname">Фамилия <span class="surname">${students[i].surname}</span></div>
                            <div class="stud-name">Имя <span class="name">${students[i].name}</span></div>
                            <div class="stud-name">Отчество <span class="name">${students[i].patronymic}</span></div>
                            <div class="stud-form">Форма обучения <span class="form">${group[i].form}</span></div>
                            <div class="stud-order">Зачислен приказом от <span class="order-date">${group[i].orderDate}г.</span>  № <span class="stud-order-number">${group[i].order}</span></div>
                            <div class="stud-time">Дата выдачи <span class="time">${today}г.</span></div>
                            <div class="sign">_____________________</div>
                            <div class="sign-description">(подпись студента)</div>
                        </div>
                    </div>
                    <div class="director">
                        Директор  ___________________________________ Кунсбаев С. З.
                    </div>
                </div>
            </div>

            <div class="card-wrap ${students[i + 1].disable ? 'disabled' : ''}">
                <div class="card-wrap-figure top"><img src="" alt=""></div>
                <div class="card-wrap-figure bottom"><img src="" alt=""></div>
                <div class="card-wrap-figure2 left"><img src="" alt=""></div>
                <div class="card-wrap-figure2 right"><img src="" alt=""></div>
                <div class="card">
                    <div class="header">
                        <p>МИНИСТЕРСТВО ОБРАЗОВАНИЯ РЕСПУБЛИКИ БАШКОРТОСТАН</p>
                        <p>Государственное бюджетное профессиональное образовательное учреждение</p>
                        <p>Уфимский колледж статистики, информатики и вычислительной техники</p>
                    </div>
                    <div class="data">
                        <div class="img">
                            <img src="${students[i + 1].imageFile}" alt="">
                        </div>
                        <div class="info">
                            <div class="stud">СТУДЕНЧЕСКИЙ БИЛЕТ № <span class="stud-number">${students[i+1].code}</span></div>
                            <div class="stud-surname">Фамилия <span class="surname">${students[i+1].surname}</span></div>
                            <div class="stud-name">Имя <span class="name">${students[i+1].name}</span></div>
                            <div class="stud-name">Отчество <span class="name">${students[i+1].patronymic}</span></div>
                            <div class="stud-form">Форма обучения <span class="form">${group[i+1].form}</span></div>
                            <div class="stud-order">Зачислен приказом от <span class="order-date">${group[i+1].orderDate}г.</span>  № <span class="stud-order-number">${group[i+1].order}</span></div>
                            <div class="stud-time">Дата выдачи <span class="time">${today}г.</span></div>
                            <div class="sign">_____________________</div>
                            <div class="sign-description">(подпись студента)</div>
                        </div>
                    </div>
                    <div class="director">
                        Директор  ___________________________________ Кунсбаев С. З.
                    </div>
                </div>
            </div>
        </div>`);
            }


        }
        });
        });
</script>
</body>
</html>

