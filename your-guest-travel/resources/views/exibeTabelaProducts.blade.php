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
    $photos = \App\Models\Photo::all();
    ?>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
                @foreach($product->photos as $photo)
                        <?php
                        $string = $photo->path;
                        $remove = 6;
                        $inicio = 0;
                        $novoPath = substr($string, $inicio + $remove);
                        ?>
                    <img src="{{ url('storage'.$novoPath) }}" alt="{{$photo->name}}">
                @endforeach
            </td>

            <td>
                <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Deseja realmente excluir {{$product->name}}?')" href="#delete-{{$product->id}}"  type="submit" class="btn_excluir modal-trigger">Excluir</button>
                </form>

            </td>
        </tr>
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

</style>
