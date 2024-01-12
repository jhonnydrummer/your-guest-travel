<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Http\Controllers\FavoriteController;

class Favorited extends Model
{
    public function isFavoritedByUser($user): bool
    {
        return $this->favorites()->where('user_id', $user->id)->exists();
    }

    public function favorites(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'product_id', 'user_id')->withTimestamps();
    }
}
