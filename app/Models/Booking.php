<?php

namespace App\Models;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];
    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    public function bookingDetails()
    {
        return $this->hasMany(BookingDetail::class);
    }
}
