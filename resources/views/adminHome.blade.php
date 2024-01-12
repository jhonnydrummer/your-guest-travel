@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">DASHBOARD</div>
                    <div class="card-body">
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @error('sku')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
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

                            <p>
                                <a class="btn-editar-perfil" data-bs-toggle="collapse"
                                   href="#multiCollapseExample4" role="button" aria-expanded="false"
                                   aria-controls="multiCollapseExample4">Editar meu Perfil</a>
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

                            <div class="row">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample4">
                                        <div class="card card-body">
                                            @include('partials.minhaConta.perfil')
                                            @include('partials.users.excluirConta')
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

    .container-button p{
        padding: 10px;
        border: none;
        border-radius: 100px;
        background-color: #001a3f;
        color: white;
    }
    .container-button p:hover{
        background-color: #043b88;
    }
    .btn-usuario, .btn-editar-perfil, .btn-inserir-produto, .btn-listar-produto{
        min-width: 140px;
        color: white;
        text-decoration: none;
    }

    .btn-usuario:hover, .btn-editar-perfil:hover, .btn-inserir-produto:hover, .btn-listar-produto:hover{
        color: white;
        text-decoration: none;
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

