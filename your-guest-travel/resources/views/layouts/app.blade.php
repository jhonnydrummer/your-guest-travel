<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                <img class="logomarca_top" src="{{ asset('img/logo.png') }}" alt="Your Guest Travel logo">
                <!--{{ config('app.name') }}-->
            </a>
            @if(auth()->check())
                <div>
                    <ul class="nav justify-content-center">

                        <li class="nav-item">
                            <a class="nav-link" href="/home">
                                <img class="icones-top" src="{{ asset('img/home.png') }}" alt="icon-home">
                            </a>
                            <a>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img class="icones-top" src="{{ asset('img/sports.png') }}" alt="icon-sports">
                            </a>
                            <a>Esportes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img class="icones-top" src="{{ asset('img/natureza.png') }}" alt="icon-natureza">
                            </a>
                            <a>Natureza</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img class="icones-top" src="{{ asset('img/food.png') }}" alt="icon-food">
                            </a>
                            <a>Culinária</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img class="icones-top" src="{{ asset('img/cultura.png') }}" alt="icon-cultura">
                            </a>
                            <a>Cultura</a>
                        </li>
                    </ul>
                </div>

            @endif
            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <ul class="navbar-nav ms-auto">

                    @guest
                        @if(auth()->check() == 0)

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>


                                    <img class="icon-profile" src="{{ asset('img/icon-perfil.png') }}"
                                         alt="icon-profile">

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <div>
                                        <a class="dropdown-item" href="/login" style="text-decoration: none">Login</a>
                                        <a class="dropdown-item" href="/register"
                                           style="text-decoration: none">Registo</a>
                                    </div>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif

                    @else
                        <!-- Button modal -->
                        @if(auth()->check() && !auth()->user()->is_admin)

                            <button type="button" class="bnt-cart" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                <img class="cart-shop" src="{{ asset('img/icon-cart.png') }}" alt="icon-cart">
                            </button>

                            <!-- Janela Modal do carrinho-->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                 data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Carrinho de
                                                Compras</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @include('cart')
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Fechar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!--Fim da Janela Modal do carrinho -->

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                <img class="icon-profile" src="{{ asset('img/icon-perfil.png') }}" alt="icon-profile">

                            </a>


                            <a class="name_top">{{ auth()->user()->name }}</a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <div>
                                    @if(auth()->user()->is_admin)
                                        <a class="dropdown-item" href="/admin/home" style="text-decoration: none">Dashboard</a>
                                    @else
                                        <a class="dropdown-item" href="minhaConta" style="text-decoration: none">Minha
                                            Conta</a>
                                    @endif
                                </div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    @endguest
                </ul>

            </div>
        </div>

    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
@include('includes.footer')
</body>
</html>
<style>
    .modal-content{
        width: 50vw;
        height: 80vh;
        margin-top: 25%;
        margin-left: 50%;
    }
    .logomarca_top, .icon-profile {
        width: 40%;
    }

    .bnt-cart {
        width: 40px;
        background-color: white;
        border: none;
    }

    .cart-shop {
        color: #63687C;
    }

    #navbarDropdown {
        border: none;
        width: 100px;
    }

    body {
        font-family: 'Montserrat Bold', sans-serif;
        font-size: 16px;
    }

    .nav-link {
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #a0aec0;
        border-radius: 5px;
        width: 4vw;
        height: 8vh;
        margin: 10px;
    }

    .nav-item {
        text-align: center;
        font-size: small;
    }

    .nav-link:last-child {
        border: none;
    }

    .icones-top {
        width: 100%;
    }

    .name_top {
        font-size: small;
        text-decoration: none;
    }
</style>
