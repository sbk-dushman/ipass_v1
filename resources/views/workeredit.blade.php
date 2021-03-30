@extends('selected')
@section('content')
    <div class="workeredit">

	    <form method="POST" action="/workeredit">
            <h2 class="main-title">Редактирование данных</h2>

            <label for="edit-name">Имя:</label>
            <input name="name" id="edit-name" value="" type="text">

            <label for="edit-surname">Фамилия: </label>
            <input name="surname" id="edit-surname" type="text">

            <label for="edit-lastname">Отчество:</label>
            <input name="lastname" id="edit-lastname" value="" type="text">

            <label for="edit-position">Должность:</label>
            <input name="position" id="edit-position" value="" type="text">

            <button class="main-btn" type="submint">Отправить</button>
        </form>
    </div>
@endsection
