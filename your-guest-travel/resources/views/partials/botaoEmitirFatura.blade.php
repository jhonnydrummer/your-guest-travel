<?php
use Illuminate\Support\Facades\Auth;
$stripeSecretKey = config('stripe.stripe.secret');
\Stripe\Stripe::setApiKey($stripeSecretKey);

$user = Auth::user();


$userId = $user->id;

$invoiceId = \Stripe\Invoice::all();
?>
@foreach($invoiceId as $invoice)
<td>
    <form method="GET" action="{{ route('invoice.download', ['invoice' => $invoiceId]) }}">
        @csrf
        <button class="btn-baixar-fatura" type="submit" name="download_pdf">Baixar Fatura</button>
    </form>
</td>
@endforeach


<style>
    .btn-baixar-fatura{
        width: 150px;
        height: 40px;
        background-color: #013886;
        color: white;
        border: none;
        border-radius: 5px;
        float: right;
    }

    .btn-baixar-fatura:hover{
        background-color: #0249ad;
    }
</style>
