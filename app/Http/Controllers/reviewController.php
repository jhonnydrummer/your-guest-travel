<?php

namespace App\Http\Controllers;

use App\Models\MediaRatings;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class reviewController extends Controller
{
    public function store(Request $request, $productId): \Illuminate\Http\RedirectResponse
    {
        $product = Product::find($productId);

        $userId = auth()->user()->id;
        $rating = $request->input('rating');
        $comment = $request->input('comment');




        $review = Review::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'rating' => $rating,
            'comment' => $comment,
        ]);

        $product->reviews()->save($review);


        $mediaRating = Review::where('product_id', $productId)->avg('rating') ?? 0;


        $product->mediaRating()->updateOrCreate(
            ['product_id' => $productId],
            ['media_rating' => $mediaRating]
        );


        if ($review) {
            Session::flash('success', 'Review criado com sucesso!');
        } else {
            Session::flash('error', 'Houve um problema ao criar o review. Tente novamente.');
        }

        return redirect()->back();
    }



}
