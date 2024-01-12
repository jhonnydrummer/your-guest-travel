<?php
namespace App\Http\Controllers;



use Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function addToCart(Request $request): \Illuminate\Http\RedirectResponse
    {
        $product = Product::find($request->product_id);

        Cart::add([
            'name' => $product->name,
            'id' => $product->id,
            'price' => $product->price,
            'quantity' => $request->quantity,
        ]);


        return redirect()->back()->with('status', 'Produto adicionado ao carrinho');
    }

    public function showCart(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $cartItems = Cart::getContent();

        return view('cart', compact('cartItems'));
    }

    public function removeCartItem($itemId): \Illuminate\Http\RedirectResponse
    {
        Cart::remove($itemId);

        return redirect()->back()->with('status', 'Item removido do carrinho');
    }




}
