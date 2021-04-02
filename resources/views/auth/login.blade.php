@extends('auth.master')

@section('content')
{{-- <main class=""> --}}
  <form class=" col-lg-6 form-signin">
    <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
  </form>
    {{-- <form method="POST" action="{{ route('login') }}">
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
				<br> --}}
				{{-- <button class="btn btn-primary">Добавить</button> --}}

@endsection


