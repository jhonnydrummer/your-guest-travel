<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;


Route::get('/home', [authController::class, 'index']);
Route::get('/registo', [authController::class, 'registo']);
Route::get('/', [authController::class, 'login']);
