@extends('master')
@section('content')
<div class="main-content container-selected">
    <h2 class="main-title">Печать</h2>
    <div class="table_conrainer ">
        {{-- @if ($datas->total()<=0)
            <div>
                Список для печати пуст...
            </div>
        @else --}}
        <table class="main-content select-list">
            <caption></caption>
            <tr>
                <th>Статус</th>
                <th>Фамилия:</th>
                <th>Имя:</th>
                <th>Отчество:</th>
                <th>Группа</th>
                <th>Роль</th>
                <th>Шаблон</th>
            </tr>
            <form action="{{ route('print-get') }}">

                    @foreach($datas as $data)
                        <tr class="select-list__item">
                            <td>
                                @if ( $data->group )
                                    <i class="fas fa-graduation-cap"></i>
                                @else
                                    <i class="fas fa-hard-hat"></i>
                                @endif
                            </td>
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
                            <td>{{ $data->group }}</td>
                            <td>{{ $data->position }}</td>
                            <td>
                                @if ($data->group)
                                    <select class="select" name="{{ $data->id }}">
                                        <option selected value="2">Студент</option>
                                    </select>
                                @else
                                    <select class="select" name="{{ $data->id }}">
                                        <option value="1">Преподователь</option>
                                        <option selected value="2">Студент</option>
                                    </select>
                                @endif
                            </td>


                            <td>
                                <button class="select_section__btn-remove" data-studID="{{ $data->id }}" >
                                        <svg id="Layer_1" viewBox="0 0 512 512"  xmlns="http://www.w3.org/2000/svg"><g><path d="m424 64h-88v-16c0-26.467-21.533-48-48-48h-64c-26.467 0-48 21.533-48 48v16h-88c-22.056 0-40 17.944-40 40v56c0 8.836 7.164 16 16 16h8.744l13.823 290.283c1.221 25.636 22.281 45.717 47.945 45.717h242.976c25.665 0 46.725-20.081 47.945-45.717l13.823-290.283h8.744c8.836 0 16-7.164 16-16v-56c0-22.056-17.944-40-40-40zm-216-16c0-8.822 7.178-16 16-16h64c8.822 0 16 7.178 16 16v16h-96zm-128 56c0-4.411 3.589-8 8-8h336c4.411 0 8 3.589 8 8v40c-4.931 0-331.567 0-352 0zm313.469 360.761c-.407 8.545-7.427 15.239-15.981 15.239h-242.976c-8.555 0-15.575-6.694-15.981-15.239l-13.751-288.761h302.44z"/><path d="m256 448c8.836 0 16-7.164 16-16v-208c0-8.836-7.164-16-16-16s-16 7.164-16 16v208c0 8.836 7.163 16 16 16z"/><path d="m336 448c8.836 0 16-7.164 16-16v-208c0-8.836-7.164-16-16-16s-16 7.164-16 16v208c0 8.836 7.163 16 16 16z"/><path d="m176 448c8.836 0 16-7.164 16-16v-208c0-8.836-7.164-16-16-16s-16 7.164-16 16v208c0 8.836 7.163 16 16 16z"/></g></svg>
                                </button>
                            </td>
                            <td>
                                @if (!(($data->group)))
                                    <a href="/workeredit" data-workerID="{{ $data->id }}">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                        <button class="select-section__btn-print"
                                name="printid"
                                type="submit"
                        >
                            <a href="{{ route('print-get') }}"><svg id="Capa_1"viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><path d="m437 129h-14v-54c0-41.355-33.645-75-75-75h-184c-41.355 0-75 33.645-75 75v54h-14c-41.355 0-75 33.645-75 75v120c0 41.355 33.645 75 75 75h14v68c0 24.813 20.187 45 45 45h244c24.813 0 45-20.187 45-45v-68h14c41.355 0 75-33.645 75-75v-120c0-41.355-33.645-75-75-75zm-318-54c0-24.813 20.187-45 45-45h184c24.813 0 45 20.187 45 45v54h-274zm274 392c0 8.271-6.729 15-15 15h-244c-8.271 0-15-6.729-15-15v-148h274zm89-143c0 24.813-20.187 45-45 45h-14v-50h9c8.284 0 15-6.716 15-15s-6.716-15-15-15h-352c-8.284 0-15 6.716-15 15s6.716 15 15 15h9v50h-14c-24.813 0-45-20.187-45-45v-120c0-24.813 20.187-45 45-45h362c24.813 0 45 20.187 45 45z"/><path d="m296 353h-80c-8.284 0-15 6.716-15 15s6.716 15 15 15h80c8.284 0 15-6.716 15-15s-6.716-15-15-15z"/><path d="m296 417h-80c-8.284 0-15 6.716-15 15s6.716 15 15 15h80c8.284 0 15-6.716 15-15s-6.716-15-15-15z"/><path d="m128 193h-48c-8.284 0-15 6.716-15 15s6.716 15 15 15h48c8.284 0 15-6.716 15-15s-6.716-15-15-15z"/></g></svg></a>
                        </button>
        {{-- @endif --}}


            </form>

        </table>
                {{-- @if ($studentDatas_s->total() > $studentDatas_s->count())
                        <ul class="pagination">
                              <li class="pagination__item">
                                    <div>
                                          {{$studentDatas->onEachSide(1)->links()}}
                                    </div>
                              </li>
                        </ul>
                  @endif --}}

    </div>

</div>

@endsection
