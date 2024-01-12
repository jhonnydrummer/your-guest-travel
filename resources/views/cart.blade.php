@php

    $cartItems = Cart::getContent();
@endphp

<div>

    <div class="row container">
        <h5>
            @if($cartItems->count() == 0)
                O carrinho está vazio
            @elseif($cartItems->count() == 1)
                Há {{ $cartItems->count() }} produto no carrinho.
            @else
                Há {{ $cartItems->count() }} produtos no carrinho.
            @endif
        </h5>
        <table class="table-striped">
            <thead>
            <tr>
                <th></th>
                <th>COD</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
            </tr>
            </thead>

            <tbody>
            @foreach($cartItems as $item)
                <tr>
                    <td>
                        <form action="{{ route('cart.remove', ['itemId' => $item->id]) }}" method="GET"
                              class="form-remove">
                            @csrf
                            <button class="btn-remover" type="submit">Remover</button>
                        </form>
                    </td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>€{{ $item->price }}</td>
                    <td>1</td>

                </tr>
            @endforeach
            </tbody>

        </table>

    </div>

    <div>
        @if($cartItems->count() > 0)
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button class="btn-checkout" type="submit">Checkout</button>
        </form>
        @endif
    </div>

</div>

<style>

    th {
        background-color: #0B5ED7;
        color: white;
    }

    .btn-remover {
        width: 100px;
        height: 30px;
        background-color: #F73F3F;
        color: #fff;
        border: none;
        padding: 8px;
        border-radius: 100px;
        cursor: pointer;
    }

    .btn-remover:hover {
        background-color: #b43232;
    }

    .form-remove {
        display: inline;
    }



    .btn-checkout {
        width: auto;
        height: 40px;
        border: none;
        border-radius: 100px;
        padding: 10px;
        font-size: small;
        margin: 10px;
        float: right;
        background-color: #001a3f;
        color: white;
    }




</style>
