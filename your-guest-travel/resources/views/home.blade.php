@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-head"></div>
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
        background-color: #0B5ED7;
        color: white;
    }

</style>
