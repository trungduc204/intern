<?php

namespace App\Domains\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    
    protected $fillable=[
        'name',
        'price',
        'description',
        'stock',
        'image',
    ];
}
