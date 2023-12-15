
    @foreach($products as $product)
        <div class="product">
            <label class="product-info">
                @foreach($product->photos as $photo)
                    <div class="col-md-4">
                        <img src="{{ asset('storage/images/' . $photo->path) }}" alt="{{$photo->name}}">
                    </div>
                @endforeach

                <h4>{{ $product->name }}</h4>
                {{ $product->description }}
                <a class="price-label">€ {{ $product->price }}</a>
                <p>Disponibilidade: {{ $product->sku }}</p>
            </label>
            <button type="submit" class="btn btn-primary">Ver mais</button>

        </div>
    @endforeach


        <style>

        .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .image-item {
            border: 1px solid #ccc;
            padding: 10px;
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
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            width: 250px;
            margin: 15px;
            display: block;
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


        .product button {
            width: 100%;
            background-color: #0B5ED7;
            color: #fff;
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
        }


        .product button:hover {
            background-color: #2980b9;
        }

 </style>
