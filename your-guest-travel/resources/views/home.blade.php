@extends('layouts.app')

@section('content')
    <div class="container">
        @include('includes/banner_principal')
        <div class="row justify-content-center">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-head">
                    <h2 STYLE="margin: 10px">PRODUTOS</h2>
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
        background-color: black;
        color: white;
    }
    .image-item{
        min-height: 500px;
    }

</style>
