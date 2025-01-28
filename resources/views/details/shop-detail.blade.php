@php
    $hideNavbar = true;
@endphp
@extends('layouts.app')
@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="relative h-72 bg-[#F1772A]">
        <!-- Back Button -->
        <a href="{{ route('home') }}"
            class="fixed top-4 left-4 z-50 p-2.5 bg-white/80 backdrop-blur-sm rounded-full shadow-lg transition-transform hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>

        <!-- Shop Banner Image -->
        <div class="absolute inset-0 opacity-10">
            <img src="{{ asset('storage/' . $shop->image) }}" class="w-full h-full object-cover">
        </div>

        <!-- Shop Info -->
        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
            <div class="flex items-end space-x-4">
                <img src="{{ asset('storage/' . $shop->image) }}" alt="{{ $shop->name }}"
                    class="w-20 h-20 rounded-2xl border-4 border-white shadow-xl">
                <div class="mb-1">
                    <h1 class="text-2xl font-bold">{{ $shop->name }}</h1>
                    <p class="text-white/90">{{ $shop->user->name }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Shop Info Section -->
    <div class="px-4 py-6">
        <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
            <div class="flex items-center space-x-2 text-gray-600 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <p class="text-sm">{{ $shop->address }}</p>
            </div>
            <p class="text-gray-600 leading-relaxed">{{ $shop->description }}</p>
        </div>

        <!-- Products Grid -->
        <div class="mb-8">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Produk Tersedia</h2>
            <div class="grid grid-cols-2 gap-3">
                @foreach ($products as $product)
                    <a href="{{ route('product.detail', $product->id) }}"
                        class="group bg-white rounded-xl overflow-hidden shadow-sm transition-all duration-200 hover:shadow-md">
                        <div class="relative pt-[100%]">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-200">
                        </div>
                        <div class="p-3">
                            <h3 class="font-medium text-sm text-gray-900 line-clamp-1">{{ $product->name }}</h3>
                            <div class="mt-2 flex items-center justify-between">
                                <span class="text-sm font-semibold text-[#F1772A]">
                                    Rp {{ number_format($product->price_per_day, 0, ',', '.') }}
                                    <span class="text-xs text-gray-500 font-normal">/hari</span>
                                </span>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#F1772A]"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 .587l3.668 7.429 8.214 1.179-5.941 5.784 1.402 8.162L12 18.896l-7.343 3.868 1.402-8.162L.118 9.195l8.214-1.179L12 .587z" />
                                    </svg>
                                    <span class="ml-1 text-xs text-gray-600">{{ number_format($product->rating, 1) }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
