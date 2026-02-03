@extends('layouts.app')

@section('content')
    
    <!-- Konten Halaman Utama Dashboard -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- 1. Header Navigasi/Breadcrumb (Meniru tampilan gambar: Kotak Putih di atas) --}}
        <div class="w-full bg-white shadow-md rounded-lg mb-10 border-t-4 border-indigo-600">
            <div class="p-4">
                <p class="text-xl font-bold text-gray-800 text-left">Beranda</p>
            </div>
        </div>
        
        {{-- 2. Konten Selamat Datang Dinamis (Sesuai tampilan gambar) --}}
        <div class="text-center">
            <div class="p-4">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-2 leading-tight">
                    Selamat Datang...!!!
                </h1>
                
                {{-- Mengambil Nama Pengguna Secara Dinamis --}}
                @auth
                    <p class="text-xl text-gray-600">
                        Anda login sebagai <span class="font-semibold text-indigo-600">{{ Auth::user()->name }}</span>
                    </p>
                @else
                    {{-- Fallback --}}
                    <p class="text-xl text-gray-500">
                        Anda belum login.
                    </p>
                @endauth
            </div>
        </div>

        
        {{-- SEMUA KARTU STATISTIK DAN WIDGET LAINNYA TELAH DIHILANGKAN --}}
        
    </div>
@endsection