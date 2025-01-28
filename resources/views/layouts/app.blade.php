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
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 22V12h6v10"></path>
                    </svg>
                    <span class="text-xs mt-1">Explore</span>
                </a>
                <a href="{{ route('cart') }}"
                    class="flex flex-col items-center {{ request()->routeIs('cart') ? 'text-[#F1772A]' : 'text-gray-500' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <circle cx="8" cy="21" r="1" />
                        <circle cx="19" cy="21" r="1" />
                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                    </svg>
                    <span class="text-xs mt-1">Keranjang</span>
                </a>
                <a href="{{ route('booking') }}"
                    class="flex flex-col items-center {{ request()->routeIs('booking') ? 'text-[#F1772A]' : 'text-gray-500' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list-ordered">
                        <path d="M10 12h11" />
                        <path d="M10 18h11" />
                        <path d="M10 6h11" />
                        <path d="M4 10h2" />
                        <path d="M4 6h1v4" />
                        <path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1" />
                    </svg>
                    <span class="text-xs mt-1">Booking</span>
                </a>
                <a href="{{ route('profile') }}"
                    class="flex flex-col items-center {{ request()->routeIs('profile') ? 'text-[#F1772A]' : 'text-gray-500' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-user-cog">
                        <circle cx="18" cy="15" r="3" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M10 15H6a4 4 0 0 0-4 4v2" />
                        <path d="m21.7 16.4-.9-.3" />
                        <path d="m15.2 13.9-.9-.3" />
                        <path d="m16.6 18.7.3-.9" />
                        <path d="m19.1 12.2.3-.9" />
                        <path d="m19.6 18.7-.4-1" />
                        <path d="m16.8 12.3-.4-1" />
                        <path d="m14.3 16.6 1-.4" />
                        <path d="m20.7 13.8 1-.4" />
                    </svg>
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
