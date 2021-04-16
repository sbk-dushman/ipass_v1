const { data } = require('jquery');

require('./bootstrap');
window.$ = window.jQuery = require('jquery');
function declOfNum(number, titles) {
  cases = [2, 0, 1, 1, 1, 2];
  return titles[(number % 100 > 4 && number % 100 < 20) ? 2 : cases[(number % 10 < 5) ? number % 10 : 5]];
}
// меню группы
function myFunction() {
    document.getElementById("my Dropdown").classList.toggle("show");
}

// function filterFunction() {
//     $.ajax({
// 			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
// 			url: '/group',
// 			data: { workerrid: $(this).val() },
// 			method: 'POST',
// 			success: function (data) {
// 				console.log("w");
// 			}
// 		});
//     // var input, filter, ul, li, a, i;
//     // input = document.getElementById("myInput");
//     // filter = input.value.toUpperCase();
//     // div = document.getElementById("my Dropdown");
//     // a = div.getElementsByTagName("a");
//     // for (i = 0; i < a.length; i++) {
//     //     txtZnac = a[i].textSod || a[i].innerText;
//     //     if (txtZnac.toUpperCase().indexOf(filter) > -1) {
//     //         a[i].style.display = "";
//     //     } else {
//     //         a[i].style.display = "none";
//     //     }
//     // }
// }

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
    $(".btn_search").on("click", function() {
         let input = document.querySelector('.input_search');
        if (input.value=="") {
            alert("Заполните поле!")
        }

    })

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
    // Добавить из  поиска

	$(".add_from_workers").on("click", function(e) {
		e.preventDefault()
		$(this).children('svg').remove('svg')
		$(this).append('<svg  fill="#5fc321"viewBox="0 -46 417.81333 417" width="417pt" xmlns="http://www.w3.org/2000/svg"><path d="m159.988281 318.582031c-3.988281 4.011719-9.429687 6.25-15.082031 6.25s-11.09375-2.238281-15.082031-6.25l-120.449219-120.46875c-12.5-12.5-12.5-32.769531 0-45.246093l15.082031-15.085938c12.503907-12.5 32.75-12.5 45.25 0l75.199219 75.203125 203.199219-203.203125c12.503906-12.5 32.769531-12.5 45.25 0l15.082031 15.085938c12.5 12.5 12.5 32.765624 0 45.246093zm0 0"/></svg>')
		$(this).children('svg').hover(function() {
			$(this).css({
				"fill": "#5fc321"
			})

		})
		let workerid = $(this).attr("data-workerid");

		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: '/workers',
			data: { workerid },
			method: 'POST',
			success: function (data) {
				console.log(data);
			}
		});
	})


	// $('.link_search').on("click", function(e) {
	// 	// console.log(1);
	// 	e.preventDefault()
	// 	search_val = $('.input_search').val()
	// 	console.log(search_val);
	// 	$.ajax({
	// 		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	// 		url: '/search',
	// 		data: { search_val },
	// 		method: 'GET',
	// 		success: function (data) {
	// 			console.log(1);
	// 		}
	// 	})
	// })

	// $('_1s').on("click", function() {
	// 	let q = 1
	// 	$.ajax({
	// 		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	// 		url: '/getGroupInfo',
	// 		data: {  },
	// 		method: 'POST',
	// 		success: function (data) {
	// 			console.log(1);
	// 		}
	// 	})
	// })

	$('.select').change( function(e) {
		console.log($(this).val())
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: '/workers',
			data: { workerrid: $(this).attr('data-workid'), select: $(this).val() },
			method: 'POST',
			success: function (data) {
				console.log(data);
			}
		});
		alert('Изменено')
		$(this).attr("selected", "selected");
	})

	$('.update_worker_w').on("click", function() {
		$(this).addClass('hidden')
		$(this).siblings('.save_worker_w').removeClass('hidden')
		$(this).closest('tr').children('td').children('.input_worker').removeAttr("disabled")
		$(this).closest('tr').children('td').children('.input_worker').css({
			"border-radius": "5px",
            "background-color": "#61e1f2",
            "padding":"0 6px"
		})
		// let surname_w = $(this).closest('tr').children('td').children('.input_surname_val').val().trim()
		// let name_w = $(this).closest('tr').children('td').children('.input_name_val').val().trim()
		// let lastname_w = $(this).closest('tr').children('td').children('.input_lastname_val').val().trim()
		// let position_w = $(this).closest('tr').children('td').children('.input_position_val').val().trim()
	})



 	$('#updateGroup').on("click", function() {
			const updateGroups = () => {

				fetch('./1c/update-groups.php').then(() => {
					// getGroups();
					// $(".simpleLoader").slideUp();
					getGroupsInfo();
				}).catch(() => updateGroups())
		}
	 })
	const getGroupsInfo = () => {
		fetch('./1c/get-group-info.php')
			.then(res => res.json())
			.then(res => {
				if (res.percent !== 100) {
					getGroupsInfo(false);
				} else {
					getStudentInfo();
				}
			}).catch(() => getGroupsInfo())
	}


	const getStudentInfo = (refresh = true) => {

	fetch('./1c/get-students-info.php')
		.then(res => res.json())
		.then(res => {

			if (res.percent !== 100) {
				getStudentInfo(false);
			} else {
				loadPhotos();
				getGroups();
			}
		}).catch(() => getStudentInfo())
}





	const loadPhotos = (refresh = true) => {

		fetch('./1c/get-images.php')
			.then(res => res.json())
			.then(res => {

				if (res.percent !== 100) {
					loadPhotos(false);
				}
			}).catch(() => loadPhotos())
	};

    // const updateGroups = () => {
    //     $(".simpleLoader").slideDown();
    //     fetch('./update-groups.php').then(() => {
    //         // getGroups();
    //         $(".simpleLoader").slideUp();
    //         getGroupsInfo();
    //     }).catch(() => updateGroups())
    // };

	$('.save_worker_w').on("click", function() {
		let surname = $(this).closest('tr').children('td').children('.input_surname_val').val().trim()
		let name = $(this).closest('tr').children('td').children('.input_name_val').val().trim()
		let lastname = $(this).closest('tr').children('td').children('.input_lastname_val').val().trim()
		let position = $(this).closest('tr').children('td').children('.input_position_val').val().trim()
		let worker_idd = $(this).attr('data-workerid')
		$.ajax({
			url: '/workers',
			data: {
				worker_id: $(this).attr('data-workerid'),
			},
			method: 'POST',
			success: function (data) {
				console.log(data)
				let default_name = data[0]['name']
				let default_surname = data[0]['surname']
				let default_lastname = data[0]['lastname']
				let default_position = data[0]['position']

				arr = []
				if( name == null || name.trim() == "" ) {
					arr.push({name: default_name})
					console.log(arr)
				}else {
					arr.push({name: name})
				}
				if( surname == null || surname.trim() == "" ) {
					arr.push({surname: default_surname})
					console.log(arr)
				}else {
					arr.push({surname: surname})
				}
				if( lastname == null || lastname.trim() == "" ) {
					arr.push({lastname: default_lastname})
					console.log(arr)
				}else {
					arr.push({lastname: lastname})
				}
				if( position == null || position.trim() == "" ) {
					arr.push({position: default_position})
					console.log(arr)
				} else {
					arr.push({position: position})
				}
				$.ajax({
					url: '/workers',
					data: {
						arr,
						worker_idd

					},
					method: 'POST',
					success: (data) => {
						console.log(data)
					}
				})
			}
		})
		$(this).addClass('hidden')
		$(this).closest('tr').children('td').children('.input_worker').attr("disabled", "true")
		$(this).siblings('.update_worker_w').removeClass('hidden')
		$(this).closest('tr').children('td').children('.input_worker').css({
			"border": "none",
			"border-radius": "5px",
			"background": "transparent"
		})
		$(this).closest('tr').children('td').css({
			"background": "#fff",
			"transition": "0.2s ease-in-out"
		})
		$(this).closest('tr').hover(function() {
			$(this).children('td').css({
				"background": " rgb(243, 242, 242)"
			})
		})
		$(this).closest('tr').mouseleave(function() {
			$(this).children('td').css({
				"background": "#fff"
			})
		})
	})

	$('.update_worker').on("click", function(e) {
		$(this).addClass('hidden')
		$(this).siblings('.save_worker').removeClass('hidden')
		$(this).closest('tr').children('td').children('.input').removeAttr("disabled")
		$(this).closest('tr').children('td').children('.input').css({
            "border-radius": "5px",
            "background-color": "#61e1f2",
            "padding": "0 6px"
		})
		// $(this).closest('tr').children('td').css({
		// 	"background-color": "#FFEBCD"
		// })
	})



	$('.save_worker').on("click", function(e) {
		e.preventDefault()
		let workerireset = $(this).attr("data-workerid");

		let td = $(this).closest('tr').children('td')
		let surname = td.children('.input_surname_val').val()
		let name = td.children('.input_name_val').val()
		let lastname = td.children('.input_lastname_val').val()
		let position = td.children('.input_position_val').val()
		// console.log(surname, name, lastname, position)

		let surname_placeholder = td.children('.input_surname_val').attr('placeholder')
		let name_placeholder = td.children('.input_name_val').attr('placeholder')
		let lastname_placeholder = td.children('.input_lastname_val').attr('placeholder')
		let position_placeholder = td.children('.input_position_val').attr('placeholder')

		let data = [{
			surname: null,
			name: null,
			lastname: null,
			position: null
		}]

		if( surname == null || surname.trim() == "") {
			data[0]['surname'] = surname_placeholder.trim()
		} else {
			data[0]['surname'] = surname.trim()
		}

		if( name == null || name.trim() == "") {
			data[0]['name'] = name_placeholder.trim()
		} else {
			data[0]['name'] = name.trim()
		}

		if( lastname == null || lastname.trim() == "") {
			data[0]['lastname'] = lastname_placeholder.trim()
		} else {
			data[0]['lastname'] = lastname.trim()
		}

		if( position == null || position.trim() == "") {
			data[0]['position'] = position_placeholder.trim()
		} else {
			data[0]['position'] = position.trim()
		}
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: '/selected',
			data: {
				data,
				workerireset
			},
			method: 'POST',
			success: function (data) {
				console.log(data);
			}
		})

		td.children('.input_surname_val').attr('placeholder')
		td.children('.input_surname_val').val(data[0]['surname'])
		td.children('.input_surname_val').css({
			"border": "none",
			"background": "transparent"
		})
		td.children('.input_surname_val').prop('disabled', true)

		td.children('.input_name_val').attr('placeholder')
		td.children('.input_name_val').val(data[0]['name'])
		td.children('.input_name_val').css({
			"border": "none",
			"background": "transparent"
		})
		td.children('.input_name_val').prop('disabled', true)

		td.children('.input_lastname_val').attr('placeholder')
		td.children('.input_lastname_val').val(data[0]['lastname'])
		td.children('.input_lastname_val').css({
			"border": "none",
			"background": "transparent"
		})
		td.children('.input_lastname_val').prop('disabled', true)

		td.children('.input_position_val').attr('placeholder')
		td.children('.input_position_val').val(data[0]['position'])
		td.children('.input_position_val').css({
			"border": "none",
			"background": "transparent"
		})
		td.children('.input_position_val').prop('disabled', true)

		$(this).addClass('hidden')
		$(this).siblings('.update_worker').removeClass('hidden')
	})

	$(".remove_from_worker").on("click", function(e) {
		e.preventDefault()
		let workeriddelete = $(this).attr("data-workerid");
		$(this).closest('.select-list__item_worker').remove();
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: '/workers',
			data: { workeriddelete },
			method: 'POST',
			success: function (data) {
				console.log(data);
			}
		  });
	})
	// console.log(1)
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

	$('.search_surname').on("click", function() {
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: '/search',
			data: {
				sort_by_fam: 1,
				sort_by_nam: 2,
				sort_by_las: 2,
			},
			method: 'GET',
			success: function (data) {
				console.log(1);
			}
		})
	})

    $('.select_section__btn-remove').on("click", function(e) {
      	console.log(1)
        e.preventDefault();
        $(this).closest('.select-list__item').remove();
		let studid = $(this).attr("data-studID");
		console.log(studid)
		$.ajax({

			url: '/selected',
			data: { studid },
			method: 'POST',

			success: function (data) {
			  console.log(data);
			}
		});
    })

    $('.selected_edit').on("click", function(e) {
      e.preventDefault();

      let workerid = $(this).attr("data-workerID");
      $.ajax({
        url: '/workeredit',
        data: { workerid },
        method: 'POST',

        success: function (data) {
          console.log(1);
        }
      });
    })
    $("#search-req").on('change', function() {
        console.log("");
    });
})
//  сортировка таблиц
const getSort = ({ target }) => {
    const order = (target.dataset.order = -(target.dataset.order || -1));
    const index = [...target.parentNode.cells].indexOf(target);
    const collator = new Intl.Collator(['en', 'ru'], { numeric: true });
    const comparator = (index, order) => (a, b) => order * collator.compare(
        a.children[index].innerHTML,
        b.children[index].innerHTML
    );

    for (const tBody of target.closest('table').tBodies)
        tBody.append(...[...tBody.rows].sort(comparator(index, order)));

    for (const cell of target.parentNode.cells)
        cell.classList.toggle('sorted', cell === target);
};

document.querySelectorAll('.table_sort .sortON').forEach(tableTH => tableTH.addEventListener('click', () => getSort(event)));
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
// });

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
