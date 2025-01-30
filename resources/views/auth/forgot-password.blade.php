{{-- resources/views/auth/forgot-password.blade.php --}}
@extends('auth.layouts.app-auth')
@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col">
    <div class="flex-1 flex flex-col justify-center p-4 sm:px-6 lg:px-20">
        <div class="w-full max-w-sm mx-auto">
            <!-- Back Button -->
            <a href="{{ route('login') }}"
                class="inline-flex items-center text-sm text-gray-600 hover:text-gray-900 mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Login
            </a>

            <div class="text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-[#F1772A]/10 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#F1772A]" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Lupa Password</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Masukkan email Anda untuk mendapatkan instruksi reset password
                </p>
            </div>
            <form action="#" method="POST" class="mt-8 space-y-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#F1772A] focus:ring focus:ring-[#F1772A] focus:ring-opacity-50">
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#F1772A] hover:bg-[#F1772A]/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#F1772A]">
                    Kirim Link Reset Password
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
