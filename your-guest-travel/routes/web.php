<?php


use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\minhaContaController;
use \App\Http\Controllers\userController;


Route::get('/', function (){
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')
    ->middleware('is_admin');

Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

Route::get('/minhaConta', [minhaContaController::class, 'minhaConta'])->name('minhaConta');


Route::post('adminHome', [ProductController::class, 'store'])->name('products.store');

Route::post('home', [PhotoController::class, 'store'])->name('photos.store');

Route::get('/admin/home', [userController::class, 'users'])->name('users')
    ->middleware('is_admin');
