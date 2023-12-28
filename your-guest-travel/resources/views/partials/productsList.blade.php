   <?php
   use App\Models\Product;
   $products = Product::all();
   ?>

    @foreach($products as $product)
        <div class="product">
            <label class="product-info">
                @foreach($product->photos as $photo)
                        <?php
                        $string = $photo->path;
                        $remove = 6;
                        $inicio = 0;

                        $novoPath = substr($string, $inicio + $remove);
                        ?>


                    <div class=".image-item">
                        <img src="{{ url('storage'.$novoPath) }}" alt="{{$photo->name}}">
                       <div class="heart-favorites">
                           @include('partials.favorite')
                       </div>
                    </div>

                @endforeach

                <h4 class="name_product">{{ $product->name }}</h4>
                <a class="price-label">€ {{ $product->price }}</a>
                <p>Disponibilidade: {{ $product->sku }}</p>
            </label>
            <div class="btn-verMais_addCarrinho">
                <button type="button" class="btn_ver_mais" data-toggle="modal" data-target="#staticBackdrop">
                    Ver mais
                </button>
            <form method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="quantity" value="1">
            <button type="submit" class="btn-add-cart" id="btn-add-cart"><img class="icon-cart-white" src="{{ asset('img/icon-cart-white.png') }}" alt="icon"><p>Adicionar</p></button>
            </form>
            </div>
        </div>

    @endforeach
















        <style>
        .heart-favorites{
            display: flex;
            position: relative;
            float: right;
        }


        .name_product{
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

        .btn-verMais_addCarrinho{
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

        .icon-cart-white{
            width: 20px;
        }

        .btn-add-cart{
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
        button p{
            font-size: small;
        }
 </style>
