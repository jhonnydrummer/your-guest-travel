

<div class="container">
    <h1>Checkout Concluído!</h1>
    <p>O seu pagamento foi processado com sucesso.</p>
    <a href="/home" class="btn">Voltar à Página Inicial</a>
</div>

<?php

$stripeSecretKey = config('stripe.stripe.secret');
\Stripe\Stripe::setApiKey($stripeSecretKey);


$invoiceId = \Stripe\Invoice::all();
?>
@foreach($invoiceId as $invoice)
    <td>
        <form method="GET" action="{{ route('invoice.download', ['invoice' => $invoice->id]) }}">
            @csrf
            <button type="submit" name="download_pdf">Baixar Fatura</button>
        </form>
    </td>
@endforeach



<style>

    body {
        font-family: "Montserrat Bold", sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        text-align: center;
    }

    h1 {
        color: #333;
        margin-bottom: 20px;
    }

    p {
        color: #666;
        margin-bottom: 30px;
    }

    .btn {
        padding: 10px 20px;
        background-color: #001A3F;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #023b8c;
    }
</style>
