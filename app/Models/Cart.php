<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'product_title',
        'quantity',
        'price',
        'image',
        'user_id',
        'product_id',
        'slug'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($cart) {
            $cart->slug = Str::slug($cart->product_title . '-' . time());
        });
    }
}
