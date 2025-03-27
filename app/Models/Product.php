<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasSlug;

class Product extends Model
{
    use HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'discount_price',
        'quantity',
        'category',
        'image'
    ];
}
