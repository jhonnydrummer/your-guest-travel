@extends('layouts.app')

@section('content')


<section class="container">
    <div>
<div class="card-body">
    <button class="btn btn-primary"><a href="/generate-pdf" class="text_button">Baixar Fatura</a></button>
</div>
    </div>
</section>
@endsection
<style>
    .container{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 80vw;
    }
    Button .text_button{
        color: white;
        text-decoration: none;
    }


</style>
