<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\minhaContaController;

Route::get('/', function (){
    return view('welcome');
});


Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')
->middleware('is_admin');


Route::post('save', [PhotoController::class, 'store'])->name('upload.picture')
    ->middleware('is_admin');

Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

Route::get('/minhaConta', [minhaContaController::class, 'minhaConta'])->name('minhaConta');
