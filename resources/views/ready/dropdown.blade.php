<div class="select-box">
  <div class="dropdown">
    <button onclick="myFunction()" class="dropbtn">
           @if (isset($item->group))
            {{$item->group}}
        @else
            Выбрать группу
        @endif


    </button>
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
