@extends('Nhome')
@section('tabel-group')
  <div class="table">
    <table class="main-content select-list">
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Группа</th>
            <th>Дествия</th>
        </tr>
        <tbody>
        @foreach($students as $student)
            <tr class="select-list__item">
                <form class="add-to-selected-list"
                    action=""
                    method="POST"
                >
                @csrf
                    <td>
                        {{ $student->surname }}
                    </td>
                    <td>
                        {{ $student->name }}
                    </td>
                    <td>
                        {{ $student->lastname }}
                    </td>
                    <td>
                        
                    </td>
                    <td class="td">
                        <button 
                            class="btn_add"
                            type="submit"
                            name="add_to_cart"
                            value="{{ $student->id }}"
                        >  
                            <i class="add_logo fas fa-plus-circle"></i>
                        </button>
                    </td>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>                    
</div>

<div class="groups-name">
    <h2 class="man-title">Состав группы </h2>
</div>
@endsection
