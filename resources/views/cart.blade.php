@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-[#F1772A] pt-3 pb-3">
        <div class="px-4">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-bold text-white">Keranjang</h1>
                <div class="w-8"></div> <!-- Spacer for alignment -->
            </div>
        </div>
    </div>
    <!-- Cart Content -->
    <div class="px-4 py-6">
        @if(count($carts) > 0)
            <div class="space-y-4 mb-12">
                @foreach($carts as $cart)
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="flex items-start space-x-4 p-4">
                            <!-- Product Image -->
                            <div class="w-20 h-20 flex-shrink-0 rounded-lg overflow-hidden bg-gray-200">
                                <img src="/api/placeholder/80/80" alt="Product"
                                     class="w-full h-full object-cover">
                            </div>

                            <!-- Product Info -->
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-medium text-gray-900 truncate">{{ $cart->product->name }}</h4>
                                <p class="mt-1 text-sm text-gray-500">{{ $cart->product->formatted_price }} / hari</p>

                                <!-- Quantity Controls -->
                                <div class="mt-2 flex items-center space-x-2">
                                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                        </svg>
                                    </button>
                                    <span class="text-sm font-medium text-gray-900">{{ $cart->quantity }}</span>
                                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Delete Button -->
                            <button class="text-red-500 hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach

                <!-- Order Summary -->
                <div class="mt-6 bg-white rounded-2xl shadow-sm p-5">
                    <h3 class="text-lg font-semibold text-gray-900">Ringkasan Pesanan</h3>
                    <div class="mt-4 space-y-3">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-600">Total Items</span>
                            <span class="font-medium text-gray-900">{{ $carts->sum('quantity') }} items</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-600">Durasi Sewa</span>
                            <div class="flex items-center gap-2">
                                <select
                                    class="text-sm rounded-lg border-gray-200 focus:border-[#F1772A] focus:ring focus:ring-[#F1772A] focus:ring-opacity-50">
                                    @foreach(range(1, 7) as $day)
                                        <option value="{{ $day }}">{{ $day }} Hari</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="pt-3 border-t border-gray-100">
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-gray-900">Total Pembayaran</span>
                                <span class="text-lg font-semibold text-[#F1772A]">
                                    Rp {{ number_format($total_price, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Checkout Button -->
                <div class="mt-6">
                    <button class="w-full bg-[#F1772A] text-white font-medium py-3 rounded-lg hover:bg-[#F1772A]/90 transition-colors">
                        Checkout
                    </button>
                </div>
            </div>
        @else
            <div class="bg-white rounded-xl shadow-sm p-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <p class="mt-4 text-gray-500">Keranjang Anda masih kosong</p>
                <a href="{{ route('products.index') }}" class="mt-4 inline-block text-[#F1772A] hover:underline">
                    Mulai Belanja
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
