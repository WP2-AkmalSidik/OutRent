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
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Verifikasi Email</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Kami telah mengirimkan kode verifikasi ke email Anda
                </p>
            </div>

            <form action="#" method="POST" class="mt-8">
                <div class="flex gap-2 mb-6 justify-center">
                    @for($i = 1; $i <= 4; $i++)
                        <input type="text" maxlength="1"
                            class="w-12 h-12 text-center text-xl font-bold rounded-xl border border-gray-200 focus:ring-[#F1772A] focus:border-[#F1772A]">
                    @endfor
                </div>

                <button type="submit"
                    class="w-full bg-[#F1772A] text-white py-3 rounded-xl font-medium hover:bg-[#F1772A]/90 transition-colors">
                    Verifikasi
                </button>
            </form>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">
                    Tidak menerima kode?
                    <button class="font-medium text-[#F1772A] hover:text-[#F1772A]/80">
                        Kirim ulang
                    </button>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
