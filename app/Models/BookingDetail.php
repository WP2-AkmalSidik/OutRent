<?php

namespace App\Models;

use App\Models\Booking;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $fillable = [
        'booking_id',
        'product_id',
        'quantity',
        'price_per_day',
        'total_price'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
