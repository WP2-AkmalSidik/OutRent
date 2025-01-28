<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['shop', 'reviews'])
            ->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', "%{$request->search}%");
            });

        $products = $query->paginate(12);

        // Calculate average rating for each product
        $products->each(function ($product) {
            $product->average_rating = $product->reviews->avg('rating') ?? 0;
        });

        return view('explore', ['products' => $products]);
    }
    public function show($id)
    {
        // Ambil produk berdasarkan ID dengan relasi shop dan reviews
        $product = Product::with(['shop', 'reviews'])->findOrFail($id);

        return view('details/detail_product', ['product' => $product]);
    }
}
