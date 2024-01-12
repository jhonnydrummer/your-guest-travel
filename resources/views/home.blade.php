@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">

                <div class="card">
                    @include('includes.banner_principal')
                    <div class="card-head">
                    <h2 style="margin: 10px">Todos os Produtos</h2>
                    </div>
                        <div class="image-item">
                            @include('partials.list')
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<style>

.card-head{
    background-color: #033a88;
    color: white;
}




</style>
