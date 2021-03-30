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
</head>
<body>
<div class="cards">
    <div class="card-block">
        @foreach ($datas as $data)
            @if ($select[$data->id] == 1)
                <div class="teach-card">
                    <div class="teach-card__logo">
                        <img src="/storage/images/logo.png">
                    </div>
                    <div class="teach-photo">
                        <img src="data:image/jpeg;base64,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">
                    </div>
                    <div class="params">
                        <div class="lastname">
                            <pre>Фамилия</pre>
                            {{ $data->lastname }}
                        </div>
                        <div class="firstname">
                            <pre>Имя</pre>
                            {{ $data->name }}
                        </div>
                        <div class="patronymic">
                            <pre>Отчество</pre>
                            {{ $data->surname }}
                        </div>
                        <div class="position">
                            <pre>Должность</pre>
                            преподаватель
                        </div>
                    </div>
                </div>
            @elseif($select[$data->id] == 2)
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
                            <img src="data:image/jpeg;base64,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"
                                alt="">
                        </div>
                        <div class="info">
                            <div class="stud">СТУДЕНЧЕСКИЙ БИЛЕТ №<span class="stud-number">777-777</span></div>
                            <div class="stud-surname">Фамилия <span class="surname">{{ $data->lastname }}</span></div>
                            <div class="stud-name">
                                Имя
                                <span class="name">{{ $data->name }}</span>
                            </div>
                            <div class="stud-name">
                                отчество
                                <span class="name"> {{ $data->surname }} </span>
                            </div>
                            <div class="stud-form">Форма обучения <span class="form">{{ $data->form_of_education }}</span></div>
                            <div class="stud-order">Зачислен приказом от <span class="order-date">{{ $data->date_of_enrollment }}</span> №<span
                                        class="stud-order-number">101</span></div>
                            <div class="stud-time">Дата выдачи <span class="time">{{-- Date::now()->format('d') }} {{ $dateNow }} {{ Date::now()->format('Y') --}}г.</span></div>
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
</div>
{{-- <div class="cards">
    <div class="card-block">
        <div class="stud-card card-wrap">
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
                    <img src="data:image/jpeg;base64,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"
                         alt="">
                </div>
                <div class="info">
                    <div class="stud">СТУДЕНЧЕСКИЙ БИЛЕТ №<span class="stud-number">777-777</span></div>
                    <div class="stud-surname">Фамилия <span class="surname">Путин</span></div>
                    <div class="stud-name">
                        Имя
                         <span class="name">Владимир</span>
                    </div>
                     <div class="stud-name">
                        отчество
                         <span class="name">Владимирович</span>
                    </div>
                    <div class="stud-form">Форма обучения <span class="form">очная</span></div>
                    <div class="stud-order">Зачислен приказом от <span class="order-date">21.08.2019г.</span> №<span
                                class="stud-order-number">101</span></div>
                    <div class="stud-time">Дата выдачи <span class="time">2 сентября 2019г.</span></div>
                    <div class="sign">_____________________</div>
                    <div class="sign-description">(подпись студента)</div>
                </div>
            </div>
            <div class="director">
                Директор колледжа ________________________ Кунсбаев С. З.
            </div>
        </div>
        </div>
        <div class="teach-card">
			<div class="teach-card__logo">
				<img src="/storage/images/logo.png">
			</div>
			<div class="teach-photo">
				<img src="data:image/jpeg;base64,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">
			</div>
			<div class="params">
				<div class="lastname">
					<pre>Фамилия</pre>
					Тяпкина
				</div>
				<div class="firstname">
					<pre>Имя</pre>
					Надежда
				</div>
				<div class="patronymic">
					<pre>Отчество</pre>
					Борисовна
				</div>
				<div class="position">
					<pre>Должность</pre>
					преподаватель
				</div>
			</div>
	</div>
    </div>

</div> --}}
<style>
    html, body {
        margin: 0;
        font-family: 'Times New Roman';
    }

    .card-wrap {
        position: relative;
    }


		.teach-card__logo {
			margin-left: 28px;
			margin-top: 15px;
			width: 80px;
			height: 58px;
		}
		.teach-card__logo img{
			width: 80px;
		}

		.teach-photo{
			margin-left: 25px;
			margin-top: 15px;
			width: 80px;
			float: left;
			height: 108px;
		}
		.teach-photo img{
			width: 80px;
		}
		.teach-card {
			background-image: url(/storage/images/bg.png);
			background-repeat: no-repeat;
			background-position: right bottom;
			width: 340px;
			height: 216px;
			margin: 10px;
			border-radius: 15px;
			border: 1px solid #CCC;
			float: left;
			background-size: 27%;
		}
		body{
			width: 725px;
		}
		.params{
			width: 221px;
			margin-left: 130px;
			margin-top: -65px;
		}
		.params pre{
			margin-bottom: 0px;
		}
    .card-wrap.disabled {
        display: none;
    }

    .card-wrap-figure {
        background-image: url('/storage/images/figure3.png');
        /* {{ asset("/img/conventions/convention_title.jpg")}} */
        width: 95mm;
        height: calc(9mm - 8px);
        position: absolute;
        left: calc(10mm + 2px);
        top: 0;
    }

    .card-wrap-figure.bottom {
        bottom: 5px;
        top: auto;
        transform: rotate(180deg);
        left: calc(11mm + 2px);
        height: calc(9mm - 5px);
    }

    .card-wrap-figure2 {
        background-image: url('/storage/images/figure4.png');
        width: 67mm;
        height: calc(10mm - 3px);
        position: absolute;
        left: calc(-25mm - -4px);
        top: calc(36mm - 2px);
        transform: rotate(-90deg);
    }

    .card-wrap-figure2.right {
        left: auto;
        right: -29mm;
        transform: rotate(90deg);
        height: 9mm;
        width: 69mm;
    }
    .card {
        /*width: 340px;*/
        /*height: 226px;*/
        /*margin: 37px;*/
        width: 90mm;
        height: 60mm;
        margin: 10mm;
        border: 1px solid rgba(0,0,0,0);
        padding-left: 3mm;
    }

    .card-block {
        display: flex;
        flex-wrap: wrap;
        width: 867px;
        justify-content: space-evenly;
        /* width: 850px; */
    }

    .card .header {
        font-size: 10px;
        text-align: center;
        line-height: 2px;

    }

    .card .header p:first-child {
        font-weight: 400;
    }

    .data {
        display: flex;
        margin-top: 30px;
        font-size: 11px;
    }

    .data img {
        width: 100px;
        height: 130px;
        margin-left: 10px;
        margin-right: 10px;
        object-fit: cover;
        /*border: 1px solid #000;*/
    }

    .data img[src=undefined] {
        display: block;
        height: 128px;
        width: 98px;
        border: 1px solid #000;
    }

    .stud {
        margin-bottom: 6px;
    }

    .stud-number {
        border-bottom: 0.5px solid #474742;
    }

    .name, .surname, .form, .order-date, .stud-order-number, .time {
        /*padding-bottom: 1px;*/
        /*text-decoration: underline;*/
        border-bottom: 0.5px solid #474742;
    }

    .stud-form {
        margin-top: 6px;
    }

    .director {
        font-size: 11px;
        margin-left: 10px;
    }

    @font-face {
        font-family: 'Times New Roman';
        src: url('11874.ttf');
    }

    @media print {
        /* .header-left-top, .a-right-bottom, .time-right-bottom {
            display: none;
        } */

        .card-block {
            margin-top: 1px;
            /*display: none;*/
        }
        .teach-card,.card-wrap-figure2,.card-wrap-figure  {
        -webkit-print-color-adjust: exact;
        }
        .studcard {
            page-break-inside: avoid;
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
</script> --}}
</body>
</html>

