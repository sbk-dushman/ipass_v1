@extends('master')
@section('content')
<div class="grid-container-search">
    <div class="tabel_students">
        <h2 class="main-title">Поиск</h2>
        @if  ($results==NULL)
        <div class="alert alert-success alert-block">
          Пока нет резултвтов
            </div>

        @elseif ($results->count()<=0)
                            <div class="alert alert-success alert-block">
                                Ничего не нашлось
                             </div>
        @else
        <table class="main-content select-list">

            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Группа</th>
                <th>Дествия</th>
            </tr>
            <tbody>
                 @foreach ($results as $item)
                    <tr style="height: 50px;" class="select-list__item ">
                        <td>{{$item->lastname}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->surname}}</td>

                        <td>
                            <a href="/group{{ $item->group }}">{{$item->group_id}}</a>
                        </td>
                        <td>
                            <button data-studID="{{$item->id}}" id="btn_add_from_search" class="btn_add_from_search">
                                <i class="fas fa-plus-circle"></i>
                            </button>
                        </td>

                    </tr>
                @endforeach
        </tbody>
    </table>

        @endif
    </div>
    <div class="search_box">
           <form action="{{ route('search-get') }}" method="POST">
                    @csrf
                    <input required id="search__inpput" placeholder="Введите запрос"  class="search-input" name="search_req" type="text">
                    <button type="submit" id="search-btn" сlass="main-btn">Найти</button>

                </form>
            </div>
</div>
@endsection
