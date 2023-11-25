<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function (){
    return view('welcome');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')
->middleware('is_admin');
