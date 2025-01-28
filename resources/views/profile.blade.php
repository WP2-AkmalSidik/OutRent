@extends('layouts.app')

@section('content')
<div class="h-[calc(100vh-4rem)] overflow-y-auto bg-gray-50">
    <!-- Profile Header Section -->
    <div class="relative bg-[#F1772A] pt-6 pb-32">
        <div class="absolute inset-0 bg-black/5">
            <div class="absolute inset-0"
                style="background-image: url('data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='2' cy='2' r='0.5' fill='%23ffffff20'/%3E%3C/svg%3E'); background-size: 20px 20px;">
            </div>
        </div>

        <div class="relative px-4">
            <div class="flex items-center">
                <div class="relative">
                    <img src="{{ $customer->image ? asset('storage/' . $customer->image) : '/api/placeholder/100/100' }}"
                        alt="{{ $customer->name }}"
                        class="w-20 h-20 rounded-full border-4 border-white/20 object-cover">
                    <button class="absolute bottom-0 right-0 bg-white rounded-full p-1.5 shadow-md hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
                <div class="ml-4">
                    <h1 class="text-2xl font-bold text-white">{{ $customer->name }}</h1>
                    <p class="text-white/80 text-sm">Bergabung {{ $customer->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="px-4 -mt-24 relative z-10 pb-6 max-w-3xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <!-- Profile Navigation -->
            <div class="border-b border-gray-200">
                <nav class="flex -mb-px">
                    <a href="#" class="py-4 px-6 border-b-2 border-[#F1772A] text-[#F1772A] font-medium text-sm">
                        Profil
                    </a>
                    <a href="#"
                        class="py-4 px-6 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm">
                        Riwayat
                    </a>
                    <a href="#"
                        class="py-4 px-6 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm">
                        Pengaturan
                    </a>
                </nav>
            </div>

            <!-- Profile Form -->
            <form class="p-6">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" value="{{ $customer->name }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#F1772A] focus:ring-[#F1772A]">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" value="{{ $customer->email }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#F1772A] focus:ring-[#F1772A]">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="tel" value="{{ $customer->phone }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#F1772A] focus:ring-[#F1772A]">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#F1772A] focus:ring-[#F1772A]"
                            rows="3">{{ $customer->address }}</textarea>
                    </div>

                    <div class="flex items-center justify-end space-x-3">
                        <button type="button"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-[#F1772A] rounded-lg hover:bg-[#E16A24]">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
