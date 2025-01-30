@extends('auth.layouts.app-auth')
@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col">
    <div class="flex-1 flex flex-col justify-center p-4 sm:px-6 lg:px-20">
        <div class="w-full max-w-sm mx-auto">
            <!-- Logo -->
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold">
                    <span class="text-[#192C3D]">OUT</span>
                    <span class="text-[#F1772A]">R</span>
                    <span class="text-[#192C3D]">ENT</span>
                </h1>
                <p class="mt-2 text-sm text-gray-600">Daftar untuk mulai menyewa</p>
            </div>

            <!-- Registration Form -->
            <form action="#" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-[#F1772A] focus:border-[#F1772A]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-[#F1772A] focus:border-[#F1772A]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">No. Handphone</label>
                    <input type="tel" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-[#F1772A] focus:border-[#F1772A]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-[#F1772A] focus:border-[#F1772A]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                    <input type="password" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-[#F1772A] focus:border-[#F1772A]">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" required
                        class="h-4 w-4 text-[#F1772A] focus:ring-[#F1772A] border-gray-300 rounded">
                    <label class="ml-2 block text-sm text-gray-700">
                        Saya setuju dengan <a href="#" class="text-[#F1772A]">Syarat & Ketentuan</a>
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-[#F1772A] text-white py-3 rounded-xl font-medium hover:bg-[#F1772A]/90 transition-colors">
                    Daftar
                </button>
            </form>

            <p class="mt-4 text-center text-sm text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-medium text-[#F1772A] hover:text-[#F1772A]/80">
                    Masuk
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
