<?php

namespace App\Models;

use App\Models\Shop;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    /**
     * Relasi ke model Shop.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    // Helper method to get formatted price
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price_per_day, 0, ',', '.');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    protected static function booted()
    {
        static::creating(function ($product) {
            if (!$product->shop_id) {
                $product->shop_id = Auth::user()->shop?->id;
            }

            if (!$product->shop_id) {
                throw new \Exception('Anda harus memiliki toko untuk menambahkan produk.');
            }
        });
    }

}
