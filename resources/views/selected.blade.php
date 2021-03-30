@extends('master')
@section('content')
<div class="main-content container-selected">
   {{-- <div class="main-content__header">


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
         <select class="select-sort">
            <option value="sortByDate">дате</option>
            <option value="sortByAlphabet">Алфавиту</option>
        </select>
    </label>

   </div> --}}

    <h2 class="main-title">Печать</h2>
    <div class="table_conrainer ">
                     @if ($studentDatas_s->total()<=0)
                    <div>
                        Список для печати пуст...
                    </div>
                @else
        <table class="main-content select-list">
            {{-- <caption></caption> --}}
            <tr>
                <th>Фамилия:</th>
                <th>Имя:</th>
                <th>Отчество:</th>
                <th>Шаблон</th>
            </tr>
            <form action="{{ route('print-get') }}">
                @csrf

                      @foreach($studentDatas_s as $data)
                    <tr class="select-list__item">

                        <td>
                            {{ $data->surname }}
                            <input class="select-surname" type="hidden" value="{{$data->surname }}">
                        </td>
                        <td>
                            {{ $data->name }}
                            <input class="select-name" name="{{ $loop->index }}{{ $data->name }}" type="hidden" value="{{ $data->name }}">
                        </td>
                        <td>
                            {{ $data->lastname }}
                            <input class="select-lastname" type="hidden" value="{{ $data->lastname }}">
                        </td>
                        <td>
                            <select name="{{ $data->id }}">
                                <option value="1">Преподователь</option>
                                <option selected value="2">Студент</option>
                            </select>
                        </td>
                        <td>
                            <button class="select_section__btn-remove" data-studID="{{ $data->id }}" >
                                    <svg id="Layer_1" viewBox="0 0 512 512"  xmlns="http://www.w3.org/2000/svg"><g><path d="m424 64h-88v-16c0-26.467-21.533-48-48-48h-64c-26.467 0-48 21.533-48 48v16h-88c-22.056 0-40 17.944-40 40v56c0 8.836 7.164 16 16 16h8.744l13.823 290.283c1.221 25.636 22.281 45.717 47.945 45.717h242.976c25.665 0 46.725-20.081 47.945-45.717l13.823-290.283h8.744c8.836 0 16-7.164 16-16v-56c0-22.056-17.944-40-40-40zm-216-16c0-8.822 7.178-16 16-16h64c8.822 0 16 7.178 16 16v16h-96zm-128 56c0-4.411 3.589-8 8-8h336c4.411 0 8 3.589 8 8v40c-4.931 0-331.567 0-352 0zm313.469 360.761c-.407 8.545-7.427 15.239-15.981 15.239h-242.976c-8.555 0-15.575-6.694-15.981-15.239l-13.751-288.761h302.44z"/><path d="m256 448c8.836 0 16-7.164 16-16v-208c0-8.836-7.164-16-16-16s-16 7.164-16 16v208c0 8.836 7.163 16 16 16z"/><path d="m336 448c8.836 0 16-7.164 16-16v-208c0-8.836-7.164-16-16-16s-16 7.164-16 16v208c0 8.836 7.163 16 16 16z"/><path d="m176 448c8.836 0 16-7.164 16-16v-208c0-8.836-7.164-16-16-16s-16 7.164-16 16v208c0 8.836 7.163 16 16 16z"/></g></svg>
                        </button>
                        </td>
                    </tr>
                @endforeach
                <button class="select-section__btn-print"
                        name="printid"
                        type="submit"
                >
                    <a href="{{ route('print-get') }}"><svg id="Capa_1"viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><path d="m437 129h-14v-54c0-41.355-33.645-75-75-75h-184c-41.355 0-75 33.645-75 75v54h-14c-41.355 0-75 33.645-75 75v120c0 41.355 33.645 75 75 75h14v68c0 24.813 20.187 45 45 45h244c24.813 0 45-20.187 45-45v-68h14c41.355 0 75-33.645 75-75v-120c0-41.355-33.645-75-75-75zm-318-54c0-24.813 20.187-45 45-45h184c24.813 0 45 20.187 45 45v54h-274zm274 392c0 8.271-6.729 15-15 15h-244c-8.271 0-15-6.729-15-15v-148h274zm89-143c0 24.813-20.187 45-45 45h-14v-50h9c8.284 0 15-6.716 15-15s-6.716-15-15-15h-352c-8.284 0-15 6.716-15 15s6.716 15 15 15h9v50h-14c-24.813 0-45-20.187-45-45v-120c0-24.813 20.187-45 45-45h362c24.813 0 45 20.187 45 45z"/><path d="m296 353h-80c-8.284 0-15 6.716-15 15s6.716 15 15 15h80c8.284 0 15-6.716 15-15s-6.716-15-15-15z"/><path d="m296 417h-80c-8.284 0-15 6.716-15 15s6.716 15 15 15h80c8.284 0 15-6.716 15-15s-6.716-15-15-15z"/><path d="m128 193h-48c-8.284 0-15 6.716-15 15s6.716 15 15 15h48c8.284 0 15-6.716 15-15s-6.716-15-15-15z"/></g></svg></a>
                </button>
                @endif


            </form>

        </table>
                @if ($studentDatas_s->total() > $studentDatas_s->count())
                        <ul class="pagination">
                              <li class="pagination__item">
                                    <div>
                                          {{$studentDatas->onEachSide(1)->links()}}
                                    </div>
                              </li>
                        </ul>
                  @endif

    </div>

</div>

@endsection
