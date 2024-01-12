<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\generateInvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\reviewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\minhaContaController;
use App\Http\Controllers\userController;


Route::get('/', function (){
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')
    ->middleware('is_admin');

Route::get('minhaConta', [minhaContaController::class, 'minhaConta'])->name('minhaConta');

Route::post('admin/home', [ProductController::class, 'store'])->name('products.store');

Route::get('adminHome', [ProductController::class, 'listProducts'])->name('products.listTable')
    ->middleware('is_admin');
Route::delete('adminHome/{product}', [ProductController::class, 'destroy'])->name('products.destroy')
    ->middleware('is_admin');
Route::put('adminHome/{product}',  [ProductController::class, 'update'])->name('products.update')
    ->middleware('is_admin');
Route::get('category/{category_id?}', [ProductController::class, 'showCategory'])->name('category.show');


Route::post('home', [PhotoController::class, 'store'])->name('photos.store');

Route::delete('adminHome{photo}', [PhotoController::class, 'destroy'])->name('photo.destroy')
    ->middleware('is_admin');

Route::get('adminHome', [userController::class, 'users'])->name('users.list')
    ->middleware('is_admin');

Route::post('promoteAdmin/{id}', [userController::class, 'promoteAdmin'])->name('users.promoteAdmin')
    ->middleware('is_admin');

Route::delete('admin/home/{user}', [userController::class, 'destroy'])->name('users.destroy')
    ->middleware('is_admin');

Route::get('/perfil', [UserController::class, 'showProfile'])->name('perfil.show');
Route::put('/perfil', [UserController::class, 'updateProfile'])->name('perfil.update');
Route::delete('home/{user}', [userController::class, 'autoDestroy'])->name('users.autoDestroy');

Route::post('/favorites/toggle/{product}', [FavoriteController::class, 'toggleFavorite'])
    ->name('favorites.toggle');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::get('/cart/remove/{itemId}', [CartController::class, 'removeCartItem'])->name('cart.remove');

Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::get('/checkout/success', [PaymentController::class, 'success'])->name('checkout.success');
Route::get('/cancel', [PaymentController::class, 'cancel'])->name('checkout.cancel');

Route::post('/reviews/{productId}', [ReviewController::class, 'store'])->name('reviews.store');

