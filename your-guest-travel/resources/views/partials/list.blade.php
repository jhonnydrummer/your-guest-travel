@foreach ($pictures as $picture)
    <img src="{{asset('storage/images/'.$picture->path)}}" alt="{{$picture->name}}" width="200" height="auto">
@endforeach
<style>

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

    .rating {
        unicode-bidi: bidi-override;
        direction: rtl;
        text-align: center;
        position: relative;
    }

    .rating input {
        display: none;
    }

    .rating label {
        display: inline-block;
        padding: 5px;
        font-size: 24px;
        color: #777;
        cursor: pointer;
    }

    .rating label:hover,
    .rating label:hover ~ label {
        color: orange;
    }

    .rating input:checked ~ label {
        color: orange;
    }

    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;

    }

    input[type=number] {
        -moz-appearance: textfield;
        appearance: textfield;

    }

    img {
        width: 100%;
    }

</style>

