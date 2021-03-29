require('./bootstrap');
function declOfNum(number, titles) {
  cases = [2, 0, 1, 1, 1, 2];
  return titles[(number % 100 > 4 && number % 100 < 20) ? 2 : cases[(number % 10 < 5) ? number % 10 : 5]];
}
function getStudId(contex,url) {
    let studID = $(contex).attr("data-studID");
    let test = studID;
    $.ajax({

        url: '/'+url,
        data: { test },
        method: 'POST',

        success: function (data) {
          console.log(data);
        }
    });
}

// дроп файлов
var $fileInput = $('.file-input');
var $droparea = $('#drop-area');

// highlight drag area
$fileInput.on('dragenter focus click', function() {
  $droparea.addClass('is-active');
});

// back to normal state
$fileInput.on('dragleave blur drop', function() {
  $droparea.removeClass('is-active');
});

// change inner text
$fileInput.on('change', function() {
  var filesCount = $(this)[0].files.length;
  var $textContainer = $(this).prev();

  if (filesCount === 1) {
    // if single file is selected, show file name
    var fileName = $(this).val().split('\\').pop();
    $textContainer.text(fileName);
  } else {
    // otherwise show number of files
    $textContainer.text(`${'Выбрано: '+ ' '+filesCount + declOfNum(filesCount, [' Файл ', ' Файла ', ' файлов '])}`);
  }
});
// список выбора
$(document).ready(function() {

    // Добавить из  поиска

    $('.btn_add_from_search').on("click", function (e) {
        e.preventDefault();
        let studID = $(this).attr("data-studID");
		let test = studID;
		$.ajax({

			url: '/search',
			data: { test },
			method: 'POST',
		});
    });

    $('.select_section__btn-remove').on("click", function(e) {
        e.preventDefault();  //функция приёма id и url для ajax запроса
        $(this).closest('.select-list__item').remove();
		let studid = $(this).attr("data-studID");
		$.ajax({

			url: '/selected',
			data: { studid },
			method: 'POST',
	
			success: function (data) {
			  console.log(data);
			}
		});
    })
    // поисковой запрос

    // $('#search-btn').on("click", function (e) {
    //     let req = $('#search__inpput');
    //     // e.preventDefault();
    //     if (req.val()=='') {
    //             alert("Введите запрос!");
    //     } else{
    //         let carentJson = JSON.stringify(req.val());
    //     $.ajax({

    //         url: '/search',
    //         // type:'JSON',
    //         data: {name:carentJson},
    //         method: 'POST',
    //         success: function (data) {
    //             console.log(data)
    //             $(".serch-output").empty()
    //             if (data.length<=0) {
    //                 $('.serch-output').append('<li class="results-list__item">  Ничего не нашлось!!</li>');

    //             } else {
    //                 // переберём массив arr
    //                 for (var i = 0; i <= data.length - 1; i++) {

    //                     console.log(data);
    //                     $('#id').html(data[i].lastname)
    //                     $('.serch-output').append(`<li class="results-list__item">
    //                             <form  class="search-result-form"  action="{{ route('search-add-post') }}" method="POST">

    //                                 <p>Студент</p>
    //                                 <p name=" req-1" value=" ${data[i].lastname}">
    //                                     <span class="lable">
    //                                         фамилия:
    //                                     </span>
    //                                         ${data[i].lastname}
    //                                     <input type="hidden" name ="lastname" value="${data[i].lastname}">
    //                                 </p>
    //                                 <p>
    //                                     <span class="lable">
    //                                         Имя:
    //                                     </span>
    //                                     ${data[i].name}
    //                                     <input type="hidden" name ="stud-name" value="${data[i].name}">
    //                                 </p>
    //                                 <p>
    //                                     <span class="lable">
    //                                         Отчество:
    //                                     </span>
    //                                     ${data[i].surname}
    //                                     <input type="hidden" name ="surname" value="${data[i].surname}">
    //                                 </p>
    //                                 <p>
    //                                     <span class="lable">
    //                                         Группа:
    //                                     </span>
    //                                     <a
    //                                         href="{{ route('group-URL') }}${data[i].group }"
    //                                     >
    //                                     ${data[i].group}
    //                                 </a>
    //                                 </p>

    //                                 <button
    //                                     id="btn_add_from_search"
    //                                     type="submit"
    //                                     name="add_from_search"
    //                                     value="${data.id}"
    //                                     class="main-btn"
    //                                     >
    //                                     Добавить
    //                                 </button>
    //                                 <p
    //                                                         <div
    //                                                             style="color:green;"
    //                                                         >
    //                                                             Добавлено
    //                                                         </div>
    //                                 </p>
    //                             </form>
    //                         </li>`);
    //                 }

    //             }

    //         }

    //     });
    //     }


    // });

     // поисковой запросV2
    // $('#search__inpput').on("keydown", function (e) {
    //     console.log($('#search__inpput').val());
        // let req = $('#search__inpput').val();
        // e.preventDefault();

        // let carentJson = JSON.stringify(req);
        // console.log("Уп"+carentJson);
        // $.ajax({

        //     url: '/search',
        //     data: carentJson,
        //     method: 'POST',

        //     success: function (data) {
        //         // $('#search__inpput').val('');
        //     }

        // });



    // });
});

// старый дроп
//     var dropArea = $('#drop-area'),
//         maxFileSize = 1000000; // максимальный размер файла - 1 мб.
//         if (typeof(window.FileReader) == 'undefined') {
//             dropArea.text('Не поддерживается браузером!');
//             dropArea.addClass('error');
//         }
//         dropArea[0].ondragover = function() {
//             dropArea.addClass('is-active');
//             return false;
//         };

//         dropArea[0].ondragleave = function() {
//             dropArea.removeClass('is-active');
//             return false;
//         };
//         dropArea[0].ondrop = function(event) {
//             event.preventDefault();
//             dropArea.removeClass('is-active');
//             dropArea.addClass('is-active');
//             console.log(file +"wqdsw")
//             var file = event.dataTransfer.files[0];
//             console.log(file);

//             if (file.size > maxFileSize) {
//                 dropArea.text('Файл слишком большой!');
//                 dropArea.addClass('error');
//                 return false;
//             }
//         };
//             var xhr = new XMLHttpRequest();
//             xhr.upload.addEventListener('progress', uploadProgress, false);
//             xhr.onreadystatechange = stateChange;
//             xhr.open('POST', '/upload.php');
//             xhr.setRequestHeader('X-FILE-NAME', file.name);
//             xhr.send(file);

//             function uploadProgress(event) {
//                 var percent = parseInt(event.loaded / event.total * 100);
//                 dropArea.text('Загрузка: ' + percent + '%');
//             }
//             function stateChange(event) {
//                 if (event.target.readyState == 4) {
//                     if (event.target.status == 200) {
//                         dropArea.text('Загрузка успешно завершена!');
//                     } else {
//                         dropArea.text('Произошла ошибка!');
//                         dropArea.addClass('error');
//                     }
//                 }
//             }

    // табы
// if (document.querySelector('.main-sidebar')!=null) {
//     let tabs = document.querySelector('.main-sidebar');
//     let btns = tabs.querySelectorAll('.tab-list__item');
//     let items = tabs.querySelectorAll('.content-list__item');


    // function change(arr, i) {
    //     arr.forEach(item => {
    //         item.forEach(i => { i.classList.remove('is-active') })
    //         item[i].classList.add('is-active')
    //     })
    // }
    // for (let i = 0; i < btns.length; i++) {
    //     btns[i].addEventListener('click', () => {
    //         change([btns, items], i)
    //     })
    // }

// } else{
//     console.log('Слайдер скрыт');
// }
