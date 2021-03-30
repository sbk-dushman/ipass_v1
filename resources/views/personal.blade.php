@extends('master')
@section('content')

  <div class="container-personal">
      <h2 class="main-title">Сотрудники</h2>
    <table class="main-content select-list">
            {{-- <caption></caption> --}}
            <tr>
                <th>Фамилия:</th>
                <th>Имя:</th>
                <th>Отчество:</th>
                <th>Роль:</th>
                <th>Дествия</th>
            </tr>
            @foreach ($personal as $item)
                
            
            <form action="{{ route('print-get') }}">
                @csrf

                      {{-- @foreach($studentDatas_s as $data) --}}
                    <tr class="select-list__item">
                        <td>
                          {{ $item->name }}
                            {{-- {{ $data->surname }} --}}
                            <input class="select-surname" type="hidden" value="{{--$data->surname --}}">
                        </td>
                        <td>
                            {{ $item->surname }}
                            
                            {{-- {{ $data->name }} --}}
                            <input class="select-name" name="{{-- $loop->index --}}{{-- $data->name --}}" type="hidden" value="{{-- $data->name --}}">
                        </td>
                        <td>
                            {{ $item->lastname }}
                            {{-- {{ $data->lastname }} --}}
                            <input class="select-lastname" type="hidden" value="{{--$data->lastname --}}">
                        </td>
                        <td>
                            {{ $item->position }}
                        </td>
                              
                        <td>
               <button type="submit"
                                name="add_to_cart"
                                value="{{-- $student->id --}}"
                        >
                            <i class="fas fa-plus-circle"></i>
                        </button>
                        <a href="#"><i class="fas fa-pen"></i></a>
                        </td>
                    </tr>
                {{-- @endforeach --}}
                {{-- <button class="select-section__btn-print"
                        name="printid"
                        type="submit"
                >
                    <a href="{{ route('print-get') }}"><svg id="Capa_1"viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><path d="m437 129h-14v-54c0-41.355-33.645-75-75-75h-184c-41.355 0-75 33.645-75 75v54h-14c-41.355 0-75 33.645-75 75v120c0 41.355 33.645 75 75 75h14v68c0 24.813 20.187 45 45 45h244c24.813 0 45-20.187 45-45v-68h14c41.355 0 75-33.645 75-75v-120c0-41.355-33.645-75-75-75zm-318-54c0-24.813 20.187-45 45-45h184c24.813 0 45 20.187 45 45v54h-274zm274 392c0 8.271-6.729 15-15 15h-244c-8.271 0-15-6.729-15-15v-148h274zm89-143c0 24.813-20.187 45-45 45h-14v-50h9c8.284 0 15-6.716 15-15s-6.716-15-15-15h-352c-8.284 0-15 6.716-15 15s6.716 15 15 15h9v50h-14c-24.813 0-45-20.187-45-45v-120c0-24.813 20.187-45 45-45h362c24.813 0 45 20.187 45 45z"/><path d="m296 353h-80c-8.284 0-15 6.716-15 15s6.716 15 15 15h80c8.284 0 15-6.716 15-15s-6.716-15-15-15z"/><path d="m296 417h-80c-8.284 0-15 6.716-15 15s6.716 15 15 15h80c8.284 0 15-6.716 15-15s-6.716-15-15-15z"/><path d="m128 193h-48c-8.284 0-15 6.716-15 15s6.716 15 15 15h48c8.284 0 15-6.716 15-15s-6.716-15-15-15z"/></g></svg></a>
                </button>--}}
            </form>
            @endforeach
        </table>
  </div>

@endsection
