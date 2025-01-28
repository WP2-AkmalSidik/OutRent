<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // CartController.php
    public function index()
    {
        // Data dummy untuk cart
        $carts = collect([
            (object) [
                'id' => 1,
                'quantity' => 2,
                'product' => (object) [
                    'id' => 1,
                    'name' => 'Tenda Camping 4 Orang',
                    'formatted_price' => 'Rp 75.000',
                    'price' => 75000,
                    'image' => null
                ]
            ],
            (object) [
                'id' => 2,
                'quantity' => 1,
                'product' => (object) [
                    'id' => 2,
                    'name' => 'Carrier 60L',
                    'formatted_price' => 'Rp 50.000',
                    'price' => 50000,
                    'image' => null
                ]
            ],
            (object) [
                'id' => 3,
                'quantity' => 1,
                'product' => (object) [
                    'id' => 3,
                    'name' => 'Sleeping Bag',
                    'formatted_price' => 'Rp 25.000',
                    'price' => 25000,
                    'image' => null
                ]
            ]
        ]);

        // Hitung total harga
        $total_price = $carts->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });

        return view('cart', compact('carts', 'total_price'));
    }
}
