@extends('master')
@section('content')
<div class="main-content">

    <div class="main-content__header">


        <a class="step-back" href="{{ route('home-URL') }}">
            <svg class="arrow-icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 447.243 447.243" style="enable-background:new 0 0 447.243 447.243;" xml:space="preserve">
                <g>
                    <g>
                    <path d="M420.361,192.229c-1.83-0.297-3.682-0.434-5.535-0.41H99.305l6.88-3.2c6.725-3.183,12.843-7.515,18.08-12.8l88.48-88.48
                        c11.653-11.124,13.611-29.019,4.64-42.4c-10.441-14.259-30.464-17.355-44.724-6.914c-1.152,0.844-2.247,1.764-3.276,2.754
                        l-160,160C-3.119,213.269-3.13,233.53,9.36,246.034c0.008,0.008,0.017,0.017,0.025,0.025l160,160
                        c12.514,12.479,32.775,12.451,45.255-0.063c0.982-0.985,1.899-2.033,2.745-3.137c8.971-13.381,7.013-31.276-4.64-42.4
                        l-88.32-88.64c-4.695-4.7-10.093-8.641-16-11.68l-9.6-4.32h314.24c16.347,0.607,30.689-10.812,33.76-26.88
                        C449.654,211.494,437.806,195.059,420.361,192.229z"/>
                </g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
            </svg>
        </a>
        <label for=""> Cортировать по:
            <select name="section" class="select-sort">
                <option value="sortByDate">дате</option>
                <option value="sortByAlphabet">Алфавиту</option>
            </select>
            <form action="">
                <button name="sort" value="date">date</button>
                <button name="sort" value="alfh">alfh</button>
            </form>
        </label>
   </div>

	    <h2 class="main-title">Состав группы</h2>
    <table class="main-content select-list">
        {{-- <caption></caption> --}}
		<tr>
            <th>Статус:</th>
			<th>Выбрать:</th>
			<th>Фамилия:</th>
			<th>Имя:</th>
			<th>Отчество:</th>
		</tr>
		@foreach($students as $student)
            @if ($sort == 'date')
                date
            @elseif ($sort == 'alfh')
                alfh
            @endif
			<tr class="select-list__item">
                <form
                    class="add-to-selected-list"
                    action=""
                    method="POST"
                >
                @csrf
                    <td>
                    @foreach( $cartStudents as $stud )
                        @if($stud->name == $student->name)
                            @if( $stud->surname == $student->surname )
                                @if( $stud->lastname == $student->lastname )
                                    @if( $stud->group == $student->group )
                                        <div
                                            style="color:green;"
                                        >
                                            Добавлено
                                        </div>
                                    @else

                                    @endif
                                @else

                                @endif
                            @else

                            @endif
                        @else

                        @endif
                    @endforeach
                    </td>
                    <td>
                        <div class="quantity">
                                <button
                                    id="btn_add"
                                    type="submit"
                                    name="add_to_cart"
                                    value="{{ $student->id }}"
                                    class="main-btn"
                                >
                                    Добавить
                                </button>
                        </div>
                    </td>
                    <td>
                        {{ $student->surname }}
                    </td>
                    <td>
                        {{ $student->name }}
                    </td>
                    <td>
                        {{ $student->lastname }}
                    </td>

                </form>
			</tr>
             {{-- <ul class="pagination">
                    <li class="pagination__item">
                        {{$student->links()}}
                    </li>
                </ul> --}}
		@endforeach
  	</table>
</div>
@endsection
