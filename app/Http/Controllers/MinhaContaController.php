<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MinhaContaController extends Controller
{
    public function minhaConta()
    {
        if(auth()->check())
        return view('partials.minhaConta.configConta');
    }
}

