<?php

namespace App\Models;

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
