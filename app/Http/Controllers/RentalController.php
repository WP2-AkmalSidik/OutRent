<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RentalItem;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function home()
    {
        $rentalItems = Product::all();
        return view('home', compact('rentalItems'));
    }

    // public function cart()
    // {
    //     $cartItems = auth()->user()->cartItems;
    //     return view('cart', compact('cartItems'));
    // }

    // public function addToCart(Request $request)
    // {
    //     $item = Product::findOrFail($request->input('item_id'));
    //     auth()->user()->cartItems()->create([
    //         'rental_item_id' => $item->id
    //     ]);

    //     return redirect()->route('cart')->with('success', 'Item added to cart');
    // }
}
