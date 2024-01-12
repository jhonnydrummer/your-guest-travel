@extends('layouts.app')
<header>
    <link rel="stylesheet" href="/css/styleLogin.css">
</header>
@section('content')
    <div class="container">
        <div class="roww">
            <div class="total">
                <div class="card">
                    <img src="/img/logo.png" alt="logomarca" href="/login">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3 justify-content-center">

                                <div class="col-md-6">
                                    <label for="email"></label><input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">

                                <div class="col-md-6">
                                    <label for="password"></label><input placeholder="Palavra-passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0 justify-content-center">
                                <button type="submit" class="btn_login">
                                    {{ __('Login') }}
                                </button>

                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu palavra-passe?') }}
                                    </a>
                                @endif
                                <a class="nao_tenho_conta_link" href="/register">Não tenho conta. Registar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
