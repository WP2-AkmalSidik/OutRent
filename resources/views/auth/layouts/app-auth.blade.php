<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OutRent Auth</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/lucide@latest"></script>
</head>

<body class="bg-gray-100">
    <div class="max-w-md mx-auto min-h-screen flex flex-col relative">
        {{-- Main Content Area --}}
        @yield('content')
        {{-- Bottom Navigation --}}
    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>

</html>
