<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Photo extends Model
{
    protected $table = 'photos';
    protected $fillable = ['product_id','name', 'path'];

    protected string $name = '';

    protected string $path = '';




    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->name = '';
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
