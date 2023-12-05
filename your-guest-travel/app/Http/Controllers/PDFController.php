<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class PDFController extends Controller
{
    public function generatePDF(): \Illuminate\Http\Response
    {
        $data = [ //Dados da fatura
            'title' => 'Your Guest Travel',
            'date' => date('d/m/Y')
        ];

        $pdf = PDF::loadView('myPDF', $data); //gera o PDF para a view

        return $pdf->download('fatura.pdf');
    }
}
