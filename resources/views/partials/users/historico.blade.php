
<?php

use App\Models\PurchaseHistory;

$purchaseHistory = PurchaseHistory::all();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="container">
    <h2>Histórico de Compras</h2>
    <table>
        <thead class="cabecalho-tabela">
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Review</th>
            <th>Emitir Fatura</th>

        </tr>
        </thead>
        <tbody>
        @if(auth()->user())
            @foreach ($purchaseHistory as $purchase)

            <tr>
                <td>{{ $purchase->id }}</td>
                <td>{{ $purchase->product->name }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Review
                    </button>

                    <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Review</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('reviews.store', ['productId' => $purchase->product->id]) }}" method="POST">

                                    @csrf
                                        <div class="rating">
                                        <div class="rating">
                                            <input type="radio" id="star5" name="rating" value="5"/>
                                            <label for="star5"><i class="fas fa-star"></i></label>
                                            <input type="radio" id="star4" name="rating" value="4"/>
                                            <label for="star4"><i class="fas fa-star"></i></label>
                                            <input type="radio" id="star3" name="rating" value="3"/>
                                            <label for="star3"><i class="fas fa-star"></i></label>
                                            <input type="radio" id="star2" name="rating" value="2"/>
                                            <label for="star2"><i class="fas fa-star"></i></label>
                                            <input type="radio" id="star1" name="rating" value="1"/>
                                            <label for="star1"><i class="fas fa-star"></i></label>
                                        </div>
                                    </div>

                                    <div class="comment">
                                            <label for="comment">Comentários:</label><br>
                                            <textarea id="comment" name="comment" rows="4" cols="50"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </form>
                                </div>
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif

                                @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    @include('partials.botaoEmitirFatura')
                </td>

            </tr>

        @endforeach
        @endif
        </tbody>
    </table>
</div>


<style>
    #comment{
        width: 80%;
        height: 40%;
        resize: none;
    }

    .rating {
        margin-top: 3vh;
    }

    .cabecalho-tabela tr th{
        text-align: center;
    }

    .cabecalho-tabela tr th:last-child{
        text-align: end;
    }


    tr th, td {
        text-align: center;
    }

    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
    }

    .rating input {
        display: none;
    }

    .rating label {
        cursor: pointer;
        color: #ddd;
        background-color: #001A3F;
        padding: 5px;
    }

    .rating input:checked ~ label {
        color: #f7d825;
    }

</style>
