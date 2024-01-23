@extends('home')

@section('content')

    <div class="container p-4">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 border border-dark rounded p-4">
                <h3><i class="bi bi-box-arrow-in-right h3"></i><span class="ps-3">Авторизация</span></h3>
                <hr>
                <form method="POST" action="{{ route('login') }}" class="form-control p-3">
                    @csrf

                    <div class="form-group row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Электронная почта') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Введите почту" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Введите пароль" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Запомнить меня') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-warning">
                                {{ __('Войти') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Забыли свой пароль?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
