<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{
    public function registo()
    {
        return view('layouts.registo');
    }

    public function index()
    {
        return view('index');
    }

}
