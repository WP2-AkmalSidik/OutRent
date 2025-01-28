@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-[#F1772A] pt-6 pb-16 relative">
        <div class="absolute inset-0 bg-black/5">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='2' cy='2' r='0.5' fill='%23ffffff20'/%3E%3C/svg%3E'); background-size: 20px 20px;"></div>
        </div>

        <div class="relative px-4">
            <h1 class="text-2xl font-bold text-white">Riwayat Booking</h1>
            <p class="text-white/80 text-sm mt-1">Lihat status pemesanan Anda</p>
        </div>
    </div>

    <!-- Status Filters -->
    <div class="px-4 -mt-8 relative z-10 mb-6">
        <div class="flex space-x-2 overflow-x-auto hide-scrollbar">
            @foreach(['Semua', 'Menunggu', 'Dikonfirmasi', 'Selesai', 'Dibatalkan'] as $filter)
                <button class="flex-none px-4 py-2 rounded-lg {{ $filter === 'Semua' ? 'bg-[#F1772A] text-white' : 'bg-white text-gray-700' }} shadow-sm text-sm font-medium hover:bg-gray-50 transition-colors">
                    {{ $filter }}
                </button>
            @endforeach
        </div>
    </div>

    <!-- Booking List -->
    <div class="px-4 pb-24">
        @php
            $dummyBookings = [
                [
                    'id' => 'BOOK-001',
                    'product' => [
                        'name' => 'Tenda Camping 4 Orang',
                        'image' => '/api/placeholder/300/200'
                    ],
                    'start_date' => '2025-02-01',
                    'end_date' => '2025-02-03',
                    'total_price' => 450000,
                    'status' => 'confirmed'
                ],
                [
                    'id' => 'BOOK-002',
                    'product' => [
                        'name' => 'Carrier 60L',
                        'image' => '/api/placeholder/300/200'
                    ],
                    'start_date' => '2025-01-28',
                    'end_date' => '2025-01-30',
                    'total_price' => 300000,
                    'status' => 'completed'
                ],
                [
                    'id' => 'BOOK-003',
                    'product' => [
                        'name' => 'Sleeping Bag',
                        'image' => '/api/placeholder/300/200'
                    ],
                    'start_date' => '2025-02-05',
                    'end_date' => '2025-02-07',
                    'total_price' => 150000,
                    'status' => 'pending'
                ],
                [
                    'id' => 'BOOK-004',
                    'product' => [
                        'name' => 'Kompor Portable',
                        'image' => '/api/placeholder/300/200'
                    ],
                    'start_date' => '2025-01-25',
                    'end_date' => '2025-01-26',
                    'total_price' => 100000,
                    'status' => 'canceled'
                ]
            ];
        @endphp

        <div class="space-y-4">
            @foreach($dummyBookings as $booking)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <!-- Status Badge -->
                    <div class="px-4 py-2 border-b border-gray-100 flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $booking['id'] }}</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            @if($booking['status'] === 'confirmed') bg-blue-50 text-blue-600
                            @elseif($booking['status'] === 'completed') bg-green-50 text-green-600
                            @elseif($booking['status'] === 'canceled') bg-red-50 text-red-600
                            @else bg-yellow-50 text-yellow-600
                            @endif">
                            @if($booking['status'] === 'confirmed') Dikonfirmasi
                            @elseif($booking['status'] === 'completed') Selesai
                            @elseif($booking['status'] === 'canceled') Dibatalkan
                            @else Menunggu
                            @endif
                        </span>
                    </div>

                    <!-- Booking Content -->
                    <div class="p-4">
                        <div class="flex space-x-4">
                            <!-- Product Image -->
                            <div class="flex-none w-20 h-20 rounded-lg overflow-hidden">
                                <img src="{{ $booking['product']['image'] }}"
                                     alt="{{ $booking['product']['name'] }}"
                                     class="w-full h-full object-cover">
                            </div>

                            <!-- Booking Details -->
                            <div class="flex-grow">
                                <h3 class="font-medium text-gray-900">{{ $booking['product']['name'] }}</h3>

                                <div class="mt-2 space-y-1">
                                    <!-- Rental Period -->
                                    <div class="flex items-center text-sm text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ \Carbon\Carbon::parse($booking['start_date'])->format('d M Y') }} -
                                        {{ \Carbon\Carbon::parse($booking['end_date'])->format('d M Y') }}
                                    </div>

                                    <!-- Price -->
                                    <div class="flex items-center text-sm font-medium text-[#F1772A]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Rp {{ number_format($booking['total_price'], 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-4 flex space-x-2">
                            @if($booking['status'] === 'pending')
                                <button class="flex-1 bg-[#F1772A] text-white text-sm font-medium py-2 rounded-lg hover:bg-[#F1772A]/90 transition-colors">
                                    Bayar Sekarang
                                </button>
                                <button class="flex-1 bg-gray-100 text-gray-700 text-sm font-medium py-2 rounded-lg hover:bg-gray-200 transition-colors">
                                    Batalkan
                                </button>
                            @elseif($booking['status'] === 'confirmed')
                                <button class="flex-1 bg-blue-500 text-white text-sm font-medium py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                    Lihat E-Ticket
                                </button>
                            @elseif($booking['status'] === 'completed')
                                <button class="flex-1 bg-[#F1772A]/10 text-[#F1772A] text-sm font-medium py-2 rounded-lg hover:bg-[#F1772A]/15 transition-colors">
                                    Beri Ulasan
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
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
