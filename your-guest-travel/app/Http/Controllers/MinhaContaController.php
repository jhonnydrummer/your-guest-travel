<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MinhaContaController extends Controller
{
    public function minhaConta()
    {
        // Lógica para a página "Minha Conta"
        return view('layouts/minhaConta'); // O nome 'minha_conta' deve ser o nome do arquivo da view correspondente
    }
}

