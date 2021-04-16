<script> window.$ = window.jQuery = require('jquery');</script>
<div class="select-box">
  <div class="dropdown">
    <button onclick="myFunction()" class="dropbtn">
           @if (isset($item->group))
            {{$item->group}}
        @else
            Выбрать группу
        @endif


    </button>
    <div style="overflow-y: scroll; max-height: 500px;" id="my Dropdown" class="dropdown-content">
      <input type="text" placeholder="Поиск.." id="myInput" onkeyup="filterFunction()">
      @foreach ($groups as $item)
        <a href="/group{{trim($item->group)}}">{{ $item->group }}</a>
      @endforeach
    </div>
  </div>
</div>
<script>
  function myFunction() {
    document.getElementById("my Dropdown").classList.toggle("show");
  }

  function filterFunction() {
      let d
      	$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: '/group',
			data: { workerrid: $(this).val() },
			method: 'POST',
			success: function (data) {
				console.log("w");
			}
		});
    // console.log("w")

    // var input, filter, ul, li, a, i;
    // input = document.getElementById("myInput");
    // filter = input.value.toUpperCase();
    // div = document.getElementById("my Dropdown");
    // a = div.getElementsByTagName("a");
    // for (i = 0; i < a.length; i++) {
    //   txtZnac = a[i].textSod || a[i].innerText;
    //   if (txtZnac.toUpperCase().indexOf(filter) > -1) {
    //     a[i].style.display = "";
    //   } else {
    //     a[i].style.display = "none";
    //   }
    // }
  }
</script>
