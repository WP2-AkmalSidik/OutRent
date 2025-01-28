<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking');
    }



    // public function index()
    // {
    //     $bookings = Booking::with('details.product')
    //         ->where('customer_id', auth()->id())
    //         ->latest()
    //         ->paginate(10);

    //     return view('customer.bookings', compact('bookings'));
    // }

    // public function checkout(Request $request)
    // {
    //     $request->validate([
    //         'start_date' => 'required|date|after:today',
    //         'end_date' => 'required|date|after:start_date',
    //     ]);

    //     $cartItems = Cart::with('product')
    //         ->where('customer_id', auth()->id())
    //         ->get();

    //     if ($cartItems->isEmpty()) {
    //         return redirect()->back()->with('error', 'Your cart is empty');
    //     }

    //     DB::beginTransaction();
    //     try {
    //         $days = Carbon::parse($request->start_date)->diffInDays(Carbon::parse($request->end_date));

    //         $totalPrice = $cartItems->sum(function ($item) use ($days) {
    //             return $item->product->price_per_day * $item->quantity * $days;
    //         });

    //         $booking = Booking::create([
    //             'customer_id' => auth()->id(),
    //             'start_date' => $request->start_date,
    //             'end_date' => $request->end_date,
    //             'status' => 'pending',
    //             'total_price' => $totalPrice
    //         ]);

    //         foreach ($cartItems as $item) {
    //             BookingDetail::create([
    //                 'booking_id' => $booking->id,
    //                 'product_id' => $item->product_id,
    //                 'quantity' => $item->quantity,
    //                 'price_per_day' => $item->product->price_per_day,
    //                 'total_price' => $item->product->price_per_day * $item->quantity * $days
    //             ]);

    //             // Update product stock
    //             $item->product->decrement('stock', $item->quantity);
    //         }

    //         // Clear cart
    //         Cart::where('customer_id', auth()->id())->delete();

    //         DB::commit();
    //         return redirect()->route('customer.bookings')->with('success', 'Booking created successfully');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect()->back()->with('error', 'Something went wrong');
    //     }
    // }
}
