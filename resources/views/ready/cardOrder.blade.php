<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="/css/all.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/all.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> --}}

</head>
<body>
    <style>.login-btn{
        transform:translateX(90vw);
    }
    .send-order{
margin-top: 20px;
}
.order-card{
    /* padding: 20px 0; */
    border-bottom: none!important;
}
    </style>
    <a class="login-btn btn btn-primary" href="/login">Войти</a>
    <div class="card order-card align-items-center">
        <h2>Заявка на выпуск карты</h2>
        @if(session()->has('card_send_succsess'))
        <p class="alert alert-success sendCard-alert">{{ session()->get('card_send_succsess') }}</p>
        @endif
  <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
              @error('surname')
                <p class="alert alert-danger">{{$message}}</p>
                        @enderror
            <label for="surname" class="col-md-4 col-form-label text-md-right">Фамилия:</label>

            <div class="col-md-12">
                <input id="surname" type="text" class="form-control"
                       name="surname" value="" required>

            </div>
        </div>
        <div class="form-group row">
            @error('name')
                <p class="alert alert-danger">{{$message}}</p>
                        @enderror
            <label for="name" class="col-md-4 col-form-label text-md-right">Имя:</label>

            <div class="col-md-12">
                <input id="name" type="text" class="form-control" name="name"
                       value="" required autofocus>

            </div>
        </div>


  <div class="form-group row">
            <label for="lastname" class="col-md-4 col-form-label text-md-right">Отчество:</label>
              @error('lastname')
                <p class="alert alert-danger">{{$message}}</p>
                        @enderror
            <div class="col-md-12">
                <input id="lastname" type="text" class="form-control" name="lastname"
                       value="" required autofocus>

            </div>
        </div>
          <div class="form-group row">
            <label for="order-position" class="col-md-4 col-form-label text-md-right">Должность:</label>
              @error('position')
                <p class="alert alert-danger">{{$message}}</p>
                        @enderror
            <div class="col-md-12">
                <input id="name" type="text" class="form-control" name="position"
                       value="" required autofocus>

            </div>
        </div>
          <div class="form-group row">
            <label for="order-position" class="col-md-4 col-form-label text-md-right">Фото:</label>
               @error('photo')
                <p class="alert alert-danger">{{$message}}</p>
                        @enderror
            <div class="col-md-12">
                <input id="order-position" type="file" class="form-control" name="photo"
                       value="" required autofocus>

            </div>
        </div>


        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn send-order  btn-success text-center">
                        Отправить
                </button>
            </div>
        </div>
    </form>
  </div>

</body>
</html>
