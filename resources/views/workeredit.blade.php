@extends('selected')
@section('content')
    <div class="workeredit">

	    <form method="POST" action="/workeredit">
            <h2 class="main-title">Редактирование данных</h2>

            <label for="edit-name">Имя:</label>
            <input   id="edit-name" name="edit-name" value="" type="text">

            <label for="edit-surname">Фамилия: </label>
            <input name="surname" id="edit-surname" type="text">

            <label for="edit-lastname">Фамилия: </label>
            <input   id="edit-lastname" name="edit-lastname" type="text">

            <label for="edit-surname">Отчество:</label>
                <input   id="edit-surname" name="edit-surname" value="" type="text">

                <label for="edit-surname">Должность:</label>
                <input   id="edit-position" name="edit-position" value="" type="text">

            <button class="main-btn" type="submint">Отправить</button>
        </form>
    </div>
@endsection
