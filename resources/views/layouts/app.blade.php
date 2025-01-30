<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OutRent - Explore</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/lucide@latest"></script>
</head>

<body class="bg-gray-100">
    <div class="max-w-md mx-auto min-h-screen flex flex-col relative">
        {{-- Main Content Area --}}
        @yield('content')
        {{-- Bottom Navigation --}}
        @if (empty($hideNavbar))
            <nav class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 p-3 flex justify-around items-center"
                style="max-width: 28rem; margin: 0 auto;">
                <a href="{{ route('home') }}"
                    class="flex flex-col items-center {{ request()->routeIs('home') ? 'text-[#F1772A]' : 'text-gray-500' }}">
                    @include('components.home.explore')
                    <span class="text-xs mt-1">Explore</span>
                </a>
                <a href="{{ route('cart') }}"
                    class="flex flex-col items-center {{ request()->routeIs('cart') ? 'text-[#F1772A]' : 'text-gray-500' }}">
                    @include('components.home.cart')
                    <span class="text-xs mt-1">Keranjang</span>
                </a>
                <a href="{{ route('booking') }}"
                    class="flex flex-col items-center {{ request()->routeIs('booking') ? 'text-[#F1772A]' : 'text-gray-500' }}">
                    @include('components.home.booking')
                    <span class="text-xs mt-1">Booking</span>
                </a>
                <a href="{{ route('profile') }}"
                    class="flex flex-col items-center {{ request()->routeIs('profile') ? 'text-[#F1772A]' : 'text-gray-500' }}">
                    @include('components.home.profile')
                    <span class="text-xs mt-1">Profil</span>
                </a>
            </nav>
        @endif
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>

</html>
