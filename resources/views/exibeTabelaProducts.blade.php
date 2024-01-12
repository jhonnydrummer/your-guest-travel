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
        <th>Imagens</th>
        <th>Editar</th>

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

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong{{$product->id}}">
                    Editar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">{{$product->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @include('partials.editarProduct')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>

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
    .modal-content{
        overflow-x: auto;
    }
    .modal-header .close{
        width: 20px;
    }

    img {
        width: 50px;
    }
    tr:nth-child(even) {
        background:lightgray;
    }

    .titulos, td{
        text-align: center;
    }
    .btn_excluir{
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
        width: auto;
        max-height: 40px;
        border: none;
        border-radius: 5px;
        padding: 10px;
        font-size: small;
        margin: auto;
    }

    .btn_editar{
        background-color: #0033ff;
        color: white;
        margin-top: 13px;
    }
    .modal-footer{
        background-color: white;
        margin-top: -50px;
    }

</style>
