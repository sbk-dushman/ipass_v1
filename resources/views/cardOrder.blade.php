<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="/css/all.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> --}}

</head>
<body>
    <form >
        <div class="form-group">
            <h2>Заявка на выпуск карты</h2>

        </div>
        <div class="form-group">
            <label>фамилия
                <input type="text"  placeholder="фамилия">
            </label>

        </div>
        <div class="form-group form-check">
            <label> Имя:
                <input type="text"  placeholder="Имя">
            </label>
        </div>
         <div class="form-group form-check">
            <label>Отчество:
                <input type="text"  placeholder="Отчество">
            </label>
        </div>
        <div class="form-group form-check">
            <label>
                <input type="file">
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
