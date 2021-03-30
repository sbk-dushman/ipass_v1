@extends('selected')
@section('content')
    <div class="workeredit">

	    <form>
            <h2 class="main-title">Редактирование данных</h2>
            {{--dd($datas->name)--}}

            <label for="">Имя:</label>
            <input name="edit-name" value="" type="text">


            <label for="">Фамилия: </label>
            <input name="edit-lastname" type="text">

            <label for="">Отчество:</label>
                <input name="edit-surname" value="" type="text">

            <button class="main-btn" type="submint">Отправить</button>
        </form>
    </div>
@endsection
