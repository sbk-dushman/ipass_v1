@extends('selected')
@section('content')
    <div class="workeredit">

	    <form>
            <h2 class="main-title">Редактирование данных</h2>
            {{--dd($datas->name)--}}

            <label for="edit-name">Имя:</label>
            <input name="edit-name" value="" type="text">


            <label for="edit-lastname">Фамилия: </label>
            <input name="edit-lastname" type="text">

            <label for="edit-surname">Отчество:</label>
                <input name="edit-surname" value="" type="text">

                <label for="edit-surname">Должность:</label>
                <input name="edit-surname" value="" type="text">

            <button class="main-btn" type="submint">Отправить</button>
        </form>
    </div>
@endsection
