@extends('layouts.app')
<title>Dashboard</title>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">DASHBOARD</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('status'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="container-button">
                            <p>
                                <a class="btn-inserir-produto" data-bs-toggle="collapse" href="#multiCollapseExample1"
                                   role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Inserir
                                    Produtos</a>
                            </p>

                            <p>
                                <a class="btn-listar-produto" data-bs-toggle="collapse"
                                   href="#multiCollapseExample2" role="button" aria-expanded="false"
                                   aria-controls="multiCollapseExample2">Listar Produtos</a>
                            </p>

                            <p>
                                <a class="btn-usuario" data-bs-toggle="collapse"
                                   href="#multiCollapseExample3" role="button" aria-expanded="false"
                                   aria-controls="multiCollapseExample3">Usuários</a>
                            </p>


                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                        <div class="card card-body">
                                            @include('partials.upload')
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                                        <div class="card card-body">
                                            @include('exibeTabelaProducts')
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample3">
                                        <div class="card card-body">
                                            <strong>Lista de Usuários</strong>
                                            @include('partials.users.listUsers')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


<style>

    .container-button {
        display: flex;
        justify-content: center;
    }
    p a{
        text-decoration: none;
        padding: 10px;
        border: none;
        border-radius: 100px;
        background-color: #001a3f;
        color: white;
    }
    .btn-usuario{
        width: 150px;
    }

    .collapse {
        &:not(.show) {
            display: none;
        }
    }

    .container-button p {
        margin: 10px;
    }

    .container-button a {
        min-width: 150px;
    }

    .lista{
        border-bottom: solid 1px #afafaf;
    }
    strong{
        text-align: center;
        background-color: #0B5ED7;
        color: white;
    }
</style>

