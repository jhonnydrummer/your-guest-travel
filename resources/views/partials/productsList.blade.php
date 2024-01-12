

@foreach($products as $product)
    <div class="product">
        <label class="product-info">
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
                    <div class="heart-favorites">
                        @include('partials.favorite')
                    </div>
                </div>
            @endif

            <h4 class="name_product">{{ $product->name }}</h4>
            <a class="price-label">€ {{ $product->price }}</a>
            <p>SKU: {{ $product->sku }}</p>
        </label>

        <div class="rating">
            @php
                $mediaRating = $product->mediaRating->media_rating ?? 0;
                $fullStars = floor($mediaRating);
                $halfStar = ceil($mediaRating - $fullStars);
            @endphp

            <div class="rating">
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < $fullStars)
                        <i class="fas fa-star text-warning"></i>
                    @elseif ($halfStar > 0)
                        <i class="fas fa-star-half-alt text-warning"></i>
                        @php $halfStar = 0; @endphp
                    @else
                        <i class="far fa-star text-warning"></i>
                    @endif
                @endfor
            </div>

        </div>


        <!-- Botão "Ver mais" do modal -->
        <div class="btn-verMais_addCarrinho">
            <button type="button" class="btn_ver_mais" data-toggle="modal" data-target="#modal{{$product->id}}">
                Ver mais
            </button>

            <!-- Modal produto -->
            <div class="modal fade bd-example-modal-xl" id="modal{{$product->id}}" tabindex="-1" role="dialog"
                 aria-labelledby="modalTitle{{$product->id}}" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content" id="container-fluid">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle">{{$product->name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('partials.productListModal')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn-add-cart" id="btn-add-cart"><img class="icon-cart-white"
                                                                                  src="{{ asset('img/icon-cart-white.png') }}"
                                                                                  alt="icon">
                    <p>Adicionar</p></button>
            </form>
        </div>
    </div>

@endforeach






<style>
    .rating {
        margin: 0 auto;
        margin-bottom: 10px;
    }

    #container-fluid {
        margin: 0 auto;
        background-color: white;
        width: 35vw;
        height: auto;
    }

    .btn-comments {
        width: 80px;
        height: 25px;
        font-size: small;
        border-radius: 5px;
        border: none;
        background-color: #ffd500;
        margin: 0 auto;
        margin-bottom: 15px;
    }

    .heart-favorites {
        display: flex;
        position: relative;
        float: right;
    }


    .name_product {
        background-color: black;
        color: white;
        padding: 5px;
        font-size: medium;
    }


    .image-item img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    img {
        width: 100%;
    }


    .product {
        display: inline-grid;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        padding: 15px;
        width: 250px;
        min-height: 350px;
        margin: 10px;
        background-color: white;
    }

    .product-info a {
        font-size: x-large;
        text-decoration: none;
        font-weight: bold;
    }

    .product-info {
        text-align: center;
    }

    .price-label {
        width: 200px;
    }

    .btn-verMais_addCarrinho {
        display: flex;
        justify-content: space-between;
    }

    .btn_ver_mais {
        width: 100px;
        height: 40px;
        background-color: #0B5ED7;
        color: #fff;
        border: none;
        padding: 8px;
        border-radius: 100px;
        cursor: pointer;
    }

    .btn_ver_mais:hover {
        background-color: #2980b9;
    }

    .icon-cart-white {
        width: 20px;
    }

    .btn-add-cart {
        display: flex;
        justify-content: space-around;
        width: 100px;
        height: 40px;
        background-color: #001a3f;
        color: #fff;
        border: none;
        padding: 8px;
        border-radius: 100px;
        cursor: pointer;
    }

    button p {
        font-size: small;
    }
</style>
