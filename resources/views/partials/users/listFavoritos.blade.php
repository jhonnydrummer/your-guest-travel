<?php

use App\Models\Photo;
use App\Models\Product;

$photo = Photo::all();
$products = Product::all();
$user = auth()->user();
$favorites = $user->favoriteProducts()->get();
?>


<table>
    <thead>
    <tr class="titulos">
        <th>ID</th>
        <th>Nome do Produto</th>
        <th>Preço</th>
        <th>Imagens</th>
        <th>Favoritar/Desfavoritar</th>

    </tr>
    </thead>
    <tbody>


    @foreach($products as $product)
        @if($product->isFavoritedByUser($user))
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    @if($product->photos->isNotEmpty())
                            <?php
                            $firstPhoto = $product->photos->first();
                            $string = $firstPhoto->path;
                            $remove = 6;
                            $inicio = 0;

                            $novoPath = substr($string, $inicio + $remove);
                            ?>
                        <div class=".image-item">
                            <img src="{{ url('storage'.$novoPath) }}" alt="{{$firstPhoto->name}}">
                        </div>
                    @endif
                </td>
                <td>
                    @include('partials.favorite')

                </td>
            </tr>
        @endif
    @endforeach
    </tbody>

</table>

<style>


    img {
        width: 50px;
    }


    tr:nth-child(even) {
        background:lightgray;
    }

    /* Estilo da tabela */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }


    th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-align: left;
        padding: 10px;
        color: black;
    }


    td {
        border-bottom: 1px solid #ddd;
        padding: 10px;
    }


    tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }


    tbody tr:hover {
        background-color: #6ea6f5;
    }




</style>
