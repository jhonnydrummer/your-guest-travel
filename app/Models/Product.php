<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;



class Product extends Model {

    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'sku', 'category_id'];



    public function photos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Photo::class);
    }



    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'product_id', 'user_id')
            ->withTimestamps();
    }

    public function isFavoritedByUser($user): bool
    {
        return $this->users()->where('user_id', $user->id)->exists();
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function reviews(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function mediaRating(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(MediaRatings::class, 'product_id');
    }

    public function purchaseHistory(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PurchaseHistory::class);
    }


}



