<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    protected $fillable = ['name', 'id', 'price', 'quantity' ];
    public function cartItems(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'cart')->withTimestamps();
    }


}
