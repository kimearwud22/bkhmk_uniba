@extends('layouts.app')

@section('content')
    
    <!-- Konten Halaman Utama Dashboard -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- 1. Pesan Selamat Datang --}}
        <div class="bg-white p-6 rounded-lg shadow-xl mb-10 border-l-4 border-indigo-500">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Selamat Datang di Halaman Admin!</h1>
            <p class="text-gray-600">Pantau ringkasan aktivitas dan statistik terbaru sistem Anda di sini.</p>
        </div>

        {{-- 2. Kartu Statistik Kategori --}}
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-5">Statistik Unggahan Foto Berdasarkan Kategori</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                
                @foreach ($categoryStats as $stat)
                    {{-- Card Komponen --}}
                    <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-200 transition duration-300 hover:shadow-2xl transform hover:scale-[1.02]">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-indigo-100 p-3 rounded-full">
                                    {{-- Icon placeholder (Anda bisa ganti dengan icon library seperti Heroicons) --}}
                                    <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <p class="text-sm font-medium text-gray-500 truncate">
                                        {{ $stat['name'] }}
                                    </p>
                                    <p class="text-3xl font-extrabold text-gray-900 mt-1">
                                        {{ $stat['count'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-indigo-50 px-5 py-3 text-xs font-semibold text-indigo-700 uppercase tracking-wider text-center">
                            Total Foto Diunggah
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Opsional: Tambahkan Widget Lain di Dashboard di sini --}}
        
    </div>
@endsection