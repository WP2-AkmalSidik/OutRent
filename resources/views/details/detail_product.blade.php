@php
$hideNavbar = true;
@endphp
@extends('layouts.app')
@section('content')
<div class="max-w-md mx-auto min-h-screen bg-gray-50">
    <!-- Header Image Section -->
    <div class="relative h-[70vh]">
        <img src="{{ asset('storage/' . $product->image) }}"
             alt="{{ $product->name }}"
             class="w-full h-full object-cover">

        <!-- Floating Back Button -->
        <a href="{{ route('home') }}"
           class="fixed top-4 left-4 z-50 p-2.5 bg-white/80 backdrop-blur-sm rounded-full shadow-lg transition-transform hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>

        <!-- Gradient Overlay -->
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-gray-50 to-transparent"></div>
    </div>

    <!-- Content Section -->
    <div class="px-4 -mt-10 relative">
        <!-- Product Info Card -->
        <div class="bg-white rounded-2xl shadow-sm p-4 mb-4">
            <div class="flex justify-between items-start mb-3">
                <h1 class="text-xl font-bold text-gray-900">{{ $product->name }}</h1>
                <div class="flex items-center bg-orange-50 px-2 py-1 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#F1772A]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 .587l3.668 7.429 8.214 1.179-5.941 5.784 1.402 8.162L12 18.896l-7.343 3.868 1.402-8.162L.118 9.195l8.214-1.179L12 .587z" />
                    </svg>
                    <span class="ml-1 text-sm font-medium text-[#F1772A]">{{ number_format($product->reviews->avg('rating') ?? 0, 1) }}</span>
                </div>
            </div>

            <div class="flex items-baseline mb-4">
                <span class="text-2xl font-bold text-[#F1772A]">Rp {{ number_format($product->price_per_day, 0, ',', '.') }}</span>
                <span class="ml-1 text-sm text-gray-500">/hari</span>
            </div>
        </div>

        <!-- Store Card -->
        <a href="{{ route('shops.show', ['id' => $product->shop->id]) }}"
           class="block bg-white rounded-xl p-3 mb-4 shadow-sm transition-all hover:shadow-md">
            <div class="flex items-center">
                <img src="{{ asset('storage/' . $product->shop->image) }}"
                     alt="{{ $product->shop->name }}"
                     class="w-12 h-12 rounded-full border border-gray-100">
                <div class="ml-3 flex-grow">
                    <p class="font-medium text-gray-900">{{ $product->shop->name }}</p>
                    <p class="text-sm text-gray-500">Kunjungi Toko</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </a>

        <!-- Description Section -->
        <div class="bg-white rounded-xl p-4 mb-4 shadow-sm">
            <h2 class="text-lg font-semibold mb-2">Deskripsi</h2>
            <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
        </div>

        <!-- Reviews Section -->
        <div class="bg-white rounded-xl p-4 mb-24 shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Ulasan Pelanggan</h2>
                <span class="text-sm text-[#F1772A]">Lihat Semua</span>
            </div>

            @foreach ([['name' => 'Ahmad', 'rating' => 5, 'review' => 'Barang sangat memuaskan dan sesuai deskripsi!'], ['name' => 'Budi', 'rating' => 4, 'review' => 'Pengiriman cepat, kualitas bagus.'], ['name' => 'Citra', 'rating' => 4, 'review' => 'Produk oke, hanya saja ada sedikit goresan.'],] as $review)
                <div class="border-b border-gray-100 last:border-0 py-3">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-medium text-gray-900">{{ $review['name'] }}</span>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#F1772A]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 .587l3.668 7.429 8.214 1.179-5.941 5.784 1.402 8.162L12 18.896l-7.343 3.868 1.402-8.162L.118 9.195l8.214-1.179L12 .587z" />
                            </svg>
                            <span class="ml-1 text-sm text-gray-600">{{ $review['rating'] }}.0</span>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm">{{ $review['review'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bottom Action -->
    <div class="fixed bottom-0 left-0 right-0 max-w-md mx-auto bg-white border-t border-gray-100 p-4">
        <form action="#" method="POST">
            @csrf
            <button type="submit"
                class="w-full bg-[#F1772A] text-white py-3.5 rounded-xl font-medium flex items-center justify-center space-x-2 transition-transform hover:scale-[0.99] active:scale-[0.97]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h14l1-7H6.4M7 13l1 7h11.6M10 17h4" />
                </svg>
                <span>Sewa Sekarang</span>
            </button>
        </form>
    </div>
</div>
@endsection
