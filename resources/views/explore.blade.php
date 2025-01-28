@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section with Search -->
    <div class="relative bg-[#F1772A] pt-6 pb-11">
        <div class="absolute inset-0 bg-black/5">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='2' cy='2' r='0.5' fill='%23ffffff20'/%3E%3C/svg%3E'); background-size: 20px 20px;"></div>
        </div>

        <!-- Logo & Tagline -->
        <div class="relative text-center mb-5">
            <h1 class="text-3xl font-bold">
                <span class="text-white">OutRent</span>
            </h1>
            <p class="text-white/80 text-sm mt-1">Solusi Sewa Peralatan Outdoor</p>
        </div>

        <!-- Search Bar -->
        <div class="relative px-2">
            <form action="{{ route('home') }}" method="GET">
                <div class="relative flex items-center">
                    <!-- Input Field -->
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari peralatan outdoor..."
                        class="w-full pl-4 pr-12 py-2.5 rounded-xl bg-white/95 backdrop-blur-sm border-0 text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-[#F1772A] shadow-lg">
                    <!-- Search Button -->
                    <button type="submit"
                        class="absolute inset-y-0 right-0 flex items-center justify-center w-10 h-full rounded-r-xl bg-[#F1772A] hover:bg-[#F1772A]/90 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="white" <!-- Warna ikon putih untuk kontras -->
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-search">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.3-4.3" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Category Scroll (Optional) -->
    <div class="px-2 -mt-5 relative z-10 mb-6">
        <div class="flex space-x-2 overflow-x-auto hide-scrollbar">
            @foreach(['Tenda', 'Carrier', 'Sleeping Bag', 'Kompor', 'Headlamp'] as $category)
                <button class="flex-none px-4 py-2 rounded-lg bg-white shadow-sm text-sm font-medium text-[#F1772A] hover:bg-gray-50 transition-colors">
                    {{ $category }}
                </button>
            @endforeach
        </div>
    </div>

    <!-- Products Grid -->
    <div class="px-2 pb-24">
        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">
            @forelse ($products as $product)
                <div class="group bg-white rounded-xl shadow-sm overflow-hidden transition-all duration-200 hover:shadow-md">
                    <a href="{{ route('product.detail', $product->id) }}" class="block">
                        <!-- Image Container -->
                        <div class="relative pt-[100%] overflow-hidden">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : '/api/placeholder/300/200' }}"
                                 alt="{{ $product->name }}"
                                 class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-200">
                        </div>

                        <!-- Product Info -->
                        <div class="p-3">
                            <h3 class="font-medium text-gray-900 line-clamp-1">{{ $product->name }}</h3>

                            <div class="mt-2 flex items-center justify-between">
                                <span class="text-sm font-semibold text-[#F1772A]">
                                    {{ $product->formatted_price }}
                                    <span class="text-xs text-gray-500 font-normal">/hari</span>
                                </span>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-4 h-4 text-yellow-400"
                                         fill="currentColor"
                                         viewBox="0 0 24 24">
                                        <path d="M12 .587l3.668 7.429 8.214 1.179-5.941 5.784 1.402 8.162L12 18.896l-7.343 3.868 1.402-8.162L.118 9.195l8.214-1.179L12 .587z"/>
                                    </svg>
                                    <span class="ml-1 text-xs text-gray-600">{{ number_format($product->average_rating, 1) }}</span>
                                </div>
                            </div>

                            <!-- Stock Info -->
                            <div class="mt-2 flex items-center justify-between">
                                <span class="text-xs text-gray-500">Stok: {{ $product->stock }}</span>
                                <div class="flex-grow ml-2">
                                    <div class="h-1.5 rounded-full bg-gray-100">
                                        <div class="h-full rounded-full bg-[#F1772A]"
                                             style="width: {{ min(($product->stock / 10) * 100, 100) }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Rent Button -->
                    <div class="px-3 pb-3">
                        <button class="w-full bg-[#F1772A]/10 text-[#F1772A] text-xs font-medium py-2 rounded-lg hover:bg-[#F1772A]/15 transition-colors truncate">
                            Sewa Sekarang
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                    <p class="mt-4 text-gray-500 text-center">Tidak ada produk yang ditemukan.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
</div>

<style>
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
@endsection
