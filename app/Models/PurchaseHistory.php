<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    public mixed $created_at;
    protected $table = 'purchase_history';
    protected $fillable = ['user_id', 'product_id', 'invoice'];




    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }



}
