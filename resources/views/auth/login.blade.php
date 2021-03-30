@extends('auth.master')

@section('content')
                <form method="POST" action="{{ route('login') }}">
                    @csrf
					<div class="form-group">
						<label for="exampleInputEmail1">Логин
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Логин">
                        </label>
                         @error('email')
            <p>{{$message}}</p>
                    @enderror

					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Пароль</label>
						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
                            @error('password')
            <p>{{$message}}</p>
                    @enderror
                    </div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
					</div>
					<br>
					<button type="submit" class="btn btn-primary">Войти</button>
				</form>
				<br>
				{{-- <button class="btn btn-primary">Добавить</button> --}}

@endsection


