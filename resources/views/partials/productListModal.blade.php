
<?php

use App\Models\Product;

$products = Product::all();
?>


<div id="carouselThumbnails" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($product->photos as $index => $photo)
                <?php
                $string = $photo->path;
                $remove = 6;
                $inicio = 0;

                $novoPath = substr($string, $inicio + $remove);
                ?>
            <div class="carousel-item @if($index === 0) active @endif">
                <img id="mainImage" class="d-block w-100" src="{{ url('storage'.$novoPath) }}" alt="{{$photo->name}}">
            </div>
        @endforeach
    </div>

    <a class="carousel-control-prev" href="#carouselThumbnails" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselThumbnails" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="imagens-mini-principal">
    @foreach($product->photos as $index => $photo)
            <?php
            $string = $photo->path;
            $remove = 6;
            $inicio = 0;

            $novoPath = substr($string, $inicio + $remove);
            ?>
        <div class="container-photos">
            <img id="imagens-miniaturas" class="img-thumbnail thumbnail" src="{{ url('storage'.$novoPath) }}" alt="{{$photo->name}}"
                 onclick="changeMainImage(this)">
        </div>

    @endforeach
</div>
        <div class="informacoes-produto">
            <p>{{$product->description}}</p>
        </div>
        <p>
            <button class="btn-ver-review" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Ver reviews
            </button>
        </p>

        <div class="collapse" id="collapseExample">
            <div class="card card-body">

                <div class="table-comments">
                    <table id="tabela">
                        <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Comentário</th>
                            <th>Data</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($product->reviews as $review)
                            <tr class="linha">
                                <td>******</td>
                                <td>{{ $review->comment }}</td>
                                <td>{{$review->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>






<style>

    #tabela{
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #a2a2a2;
        padding: 8px;
    }
    thead tr th{
        padding: 10px;

    }
    .btn-ver-review{
        background-color: #ffc400;
        border: none;
        border-radius: 5px;
    }
    #imagens-miniaturas{
        cursor: pointer;
        min-width: 150px;
        width: 150px;
        height: auto;

    }
    #imagens-miniaturas:hover{
        border: solid 2px darkblue;
    }
    .informacoes-produto{
        border-top: 1px solid #a19f9f;
    }

    .imagens-mini-principal{
        display: flex;
        width: 100%;
        white-space: nowrap;
        overflow-x: auto;
    }


</style>



















<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function changeMainImage(element) {
        var newSrc = $(element).attr('src');
        $('.carousel-inner .carousel-item.active img').attr('src', newSrc); //acessa o valor attr atributo src
    }

    $('#modal{{$product->id}}').on('hidden.bs.modal', function (e) { //usando jQuery
        $('#mainImage').attr('src', ''); //seleciona id e atribui src como vazio
    });

    $('#modal{{$product->id}}').on('show.bs.modal', function (e) {
        var firstImage = "{{ $product->photos->first() }}"; // Obter a primeira imagem do produto

        // Verificar se a primeira imagem existe antes de definir como imagem principal do modal
        if (firstImage) {
            var firstImageSrc = firstImage.path;
            var firstImageAlt = firstImage.name;
            $('#mainImage{{$product->id}}').attr('src', firstImageSrc).attr('alt', firstImageAlt);
        }
    });
</script>







