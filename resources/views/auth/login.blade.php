@extends('auth.master')

@section('content')

  <form  method="POST" action="{{ route('login') }}">
                    @csrf

		<h1 class="text-center h3 mb-3 fw-normal">Войти</h1>
        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                 @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
          {{-- <img class=" mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
					<div class="form-group">
						<label for="exampleInputEmail1">Логин
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Логин">
                        </label>




                         {{-- @error('username')
            <p>{{$message}}</p>
                    @enderror --}}

					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Пароль</label>
						<input type="password" class="form-control" id="exampleInputPassword1"
                        name="password"
                        placeholder="Пароль">
                            {{-- @error('password')
            <p>{{$message}}</p>
                    @enderror --}}
                    </div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
					</div>
					<br>
					<button type="submit" class="btn btn-primary">Войти</button>
				</form>
				<br>

@endsection


