<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $table = "products";
    
    protected $fillable = [
        'name', // Add 'name' to the fillable attributes
        'price',
        'image',
        'description',
        'type',
        // Add other fillable attributes as necessary
    ];

    public $timestamps = true;
}
