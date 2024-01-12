<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\PurchaseHistory;
use Illuminate\Support\Facades\Auth;


class generateInvoiceController extends Controller
{



    public function generateFatura(Request $request): \Illuminate\Http\Response
    {

        $user = auth()->user();

        $purchaseHistories = $user->purchaseHistory()->with('product')->get();

        foreach ($purchaseHistories as $purchaseHistory) {
            $product = $purchaseHistory->product;


            $data = [
                'id' => $purchaseHistory->id,
                'title' => 'Your Guest Travel',
                'invoiceNumber' => $purchaseHistory->invoice,
                'user' => $user->name,
                'productName' => $product->name,
                'productPrice' => $product->price,
                'dateCompra' => $purchaseHistory->created_at->format('d/m/Y H:i:s'),
                'date' => date('m/d/Y'),
            ];

        }

        $pdf = PDF::loadView('partials.users.invoice', ['data' => $data]);

        return $pdf->download('invoice.pdf');
    }



}

