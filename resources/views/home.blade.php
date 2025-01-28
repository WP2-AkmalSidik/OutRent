@extends('layouts.app')

@section('content')
<div class="p-4">
    <h1 class="text-2xl font-bold text-brand-orange mb-4">Outdoor Gear Rental</h1>
    <div class="grid grid-cols-2 gap-4">
        @foreach($rentalItems as $item)
            <div class="bg-white rounded-lg shadow-md p-3 text-center">
                <img src="{{ $item->image ? asset('storage/' . $item->image) : '/placeholder.jpg' }}"
                    alt="{{ $item->name }}" class="mx-auto mb-2 rounded-lg h-40 object-cover">
                <h3 class="font-semibold">{{ $item->name }}</h3>
                <p class="text-gray-600">{{ Str::limit($item->description, 50) }}</p>
                <p class="text-brand-orange">${{ number_format($item->price_per_day, 2) }}/day</p>
                <p class="text-sm text-gray-500">Stock: {{ $item->stock }}</p>
                <!-- <form action="{{ route('cart.add') }}" method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                    <button type="submit" {{ $item->stock <= 0 ? 'disabled' : '' }} class="w-full bg-brand-orange text-white py-2 rounded-lg
                               {{ $item->stock <= 0 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-orange-600' }}">
                        {{ $item->stock <= 0 ? 'Out of Stock' : 'Rent Now' }}
                    </button>
                </form> -->
            </div>
        @endforeach
    </div>
</div>
@endsection
