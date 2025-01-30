@extends('auth.layouts.app-auth')
@section('content')
<div class="min-h-screen bg-gray-50 flex flex-col">
    <div class="flex-1 flex flex-col justify-center p-4 sm:px-6 lg:px-20">
        <div class="w-full max-w-sm mx-auto">
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-[#F1772A]/10 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#F1772A]" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Verifikasi OTP</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Masukkan kode OTP yang telah dikirim ke email Anda
                </p>
            </div>
            <form action="#" method="POST" class="mt-8 space-y-4">
                <div class="flex gap-2 justify-between">
                    <input type="text" maxlength="1"
                        class="w-12 h-12 text-center text-xl rounded-md border-gray-300 shadow-sm focus:border-[#F1772A] focus:ring focus:ring-[#F1772A] focus:ring-opacity-50"
                        required>
                    <input type="text" maxlength="1"
                        class="w-12 h-12 text-center text-xl rounded-md border-gray-300 shadow-sm focus:border-[#F1772A] focus:ring focus:ring-[#F1772A] focus:ring-opacity-50"
                        required>
                    <input type="text" maxlength="1"
                        class="w-12 h-12 text-center text-xl rounded-md border-gray-300 shadow-sm focus:border-[#F1772A] focus:ring focus:ring-[#F1772A] focus:ring-opacity-50"
                        required>
                    <input type="text" maxlength="1"
                        class="w-12 h-12 text-center text-xl rounded-md border-gray-300 shadow-sm focus:border-[#F1772A] focus:ring focus:ring-[#F1772A] focus:ring-opacity-50"
                        required>
                    <input type="text" maxlength="1"
                        class="w-12 h-12 text-center text-xl rounded-md border-gray-300 shadow-sm focus:border-[#F1772A] focus:ring focus:ring-[#F1772A] focus:ring-opacity-50"
                        required>
                    <input type="text" maxlength="1"
                        class="w-12 h-12 text-center text-xl rounded-md border-gray-300 shadow-sm focus:border-[#F1772A] focus:ring focus:ring-[#F1772A] focus:ring-opacity-50"
                        required>
                </div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#F1772A] hover:bg-[#F1772A]/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#F1772A]">
                    Verifikasi
                </button>
            </form>
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">
                    Tidak menerima kode?
                    <button type="button" class="text-[#F1772A] hover:text-[#F1772A]/90">Kirim ulang</button>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
