<?php

namespace App\Http\Controllers\Customer;

use App\Models\Shop;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    /**
     * Display the details of a shop and its products.
     */
    public function show($id)
    {
        // Cari toko berdasarkan ID
        $shop = Shop::with('user')->findOrFail($id);

        // Ambil semua produk yang dimiliki toko
        $products = Product::where('shop_id', $id)->get();

        return view('details/shop-detail', compact('shop', 'products'));
    }
}

