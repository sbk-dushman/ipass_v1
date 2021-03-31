@extends('selected')
@section('content')
    <div class="workeredit">

	    @foreach ($data as $item)
        <form method="POST" action="/workeredit">
            <h2 class="main-title">Редактирование данных</h2>

            <label for="edit-name">Имя:</label>
            <input name="name" id="edit-name" value="{{ $item->name }}" type="text">

            <label for="edit-surname">Фамилия: </label>
            <input name="surname" id="edit-surname" value="{{ $item->surname }}" type="text">

            <label for="edit-lastname">Отчество:</label>
            <input name="lastname" id="edit-lastname" value="{{ $item->lastname }}" type="text">

            <label for="edit-position">Должность:</label>
            <input name="position" id="edit-position" value="{{ $item->position }}" type="text">

            <button name="workerid" value="{{ $item->id }}" class="main-btn" type="submint">Отправить</button>
        </form>
        @endforeach
    </div>
@endsection
