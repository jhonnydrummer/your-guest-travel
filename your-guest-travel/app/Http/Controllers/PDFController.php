<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class PDFController extends Controller
{
    public function generatePDF(): \Illuminate\Http\Response
    {
        \Stripe\Stripe::setApiKey('sk_test_QUXcoU3BnbZXp6IMVi7BkW8s');

        $invoice = \Stripe\Invoice::create([
            'customer' => '{{CUSTOMER_ID}}',
        ], ['stripe_account' => '{{CONNECTED_ACCOUNT_ID}}']);


        $data = [ //Dados da fatura
            'title' => 'Your Guest Travel',
            'date' => date('d/m/Y')
        ];

        $pdf = PDF::loadView('myPDF', $data); //gera o PDF para a view

        return $pdf->download('fatura.pdf');

    }

}
