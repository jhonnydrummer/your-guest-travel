@extends('layouts.app')
<header><link rel="stylesheet" href="css/styleRegisto.css"></header>
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <img src="img/logo.png" alt="logomarca" href="/login">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }} ">
                        @csrf

                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6">
                                <input placeholder="Nome Completo" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6">
                                <input placeholder="E-mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6">
                                <input placeholder="Palavra-passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6">
                                <input placeholder="Confirme a Palavra-passe" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                        </div>

                        <div class="roww">
                                <button type="submit" class="btn_registar">
                                    {{ __('Registar') }}
                                </button>

                        </div>

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <a class="fazer_login_link" href="/login">Já tenho conta</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
