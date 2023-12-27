<?php

$stripeSecretKey = config('stripe.stripe.secret');
\Stripe\Stripe::setApiKey($stripeSecretKey);


$invoices = \Stripe\Invoice::all();
?>
<div>

    <div>
        <h4>Your Guest House</h4>
        @foreach($invoices as $invoice)
            <h3>Invoice ID: {{ $invoice->id }}</h3>
            <p>Valor: {{ $invoice->amount_due }}</p>
        @endforeach
    </div>


</div>
