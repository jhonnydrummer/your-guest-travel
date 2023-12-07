<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'name', 'path'
    ];

    // Inicialização da propriedade
    protected string $path = '';

    // Restante do código da classe...
}
