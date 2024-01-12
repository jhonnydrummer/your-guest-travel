<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Favorited;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = auth()->user();
        $favorites = $user->favoriteProducts()->get();

        return view('favorites.home', compact('favorites'));
    }

    public function toggleFavorite(Product $product): \Illuminate\Http\RedirectResponse
    {
        $user = auth()->user();

        if ($product->isFavoritedByUser($user)) {
            $user->favorites()->detach($product->id);
        } else {
            $user->favorites()->attach($product->id);
        }

        return redirect()->back()->with('status', 'Feito!');
    }
}
