<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'slug', 'details', 'price', 'stock', 'shipping_cost', 'categoria_id', 'image_path',
    ];
}
