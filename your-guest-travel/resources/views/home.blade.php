
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Home</div>
                    <div class="card-body">
                        É um usuário normal.
                    </div>


                        <div class="image-grid">
                            @foreach($pictures as $picture)
                                <div class="image-item">
                                    <img src="{{ asset('storage/images/'.$picture->path) }}" alt="{{ $picture->name }}" width="200" height="auto">
                                    <p>Preço: {{ $picture->price ?? 'Não disponível' }}</p>
                                </div>
                            @endforeach
                        </div>




                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .container{
        width: 80vw;
    }
    Button .text_button{
        color: white;
        text-decoration: none;
    }

    .image-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Tamanho das colunas */
        gap: 20px; /* Espaço entre as imagens */
    }

    .image-item {
        border: 1px solid #ccc; /* Borda para cada imagem */
        padding: 10px; /* Espaçamento interno */
    }

    .image-item img {
        max-width: 100%;
        height: auto;
        display: block;
    }
    img{
        width: 100%;
    }
</style>
