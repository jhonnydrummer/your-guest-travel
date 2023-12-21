<?php
use App\Models\Product;
$products = Product::paginate(10);
?>

<table>
    <thead>
    <tr class="titulos">
        <th>ID</th>
        <th>Nome do Produto</th>
        <th>Preço</th>
        <th>Imagem</th>
        <th>Excluir</th>

    </tr>
    </thead>
    <tbody>

    <?php
    $products = \App\Models\Product::all();
    ?>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
                @if($product->image)
                    <img src="{{ asset($product->photo_id) }}" alt="Imagem do Produto" width="50">
                @else
                    Sem imagem
                @endif
            </td>

            <td>
                <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button href="#delete-{{$product->id}}"  type="submit" class="btn_excluir modal-trigger">Excluir</button>
                </form>

            </td>
        </tr>
    @endforeach
    </tbody>

</table>














<style>
    tr:nth-child(even) {
        background:lightgray;
    }

    .titulos, td{
        text-align: center;
    }
    .btn_excluir, .btn_editar{
        width: auto;
        max-height: 40px;
        border: none;
        border-radius: 5px;
        padding: 10px;
        font-size: small;
        margin: auto;
    }

    .btn_excluir{
        background-color: red;
        color: white;
        margin-top: 13px;
    }
    .btn_editar{
        text-decoration: none;
        background-color: #001a3f;
        color: white;
    }
</style>
