{{-- resources/views/gallery.blade.php --}}

@extends('layouts.bkhmk')

{{-- Mengisi Slot Header --}}
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Galeri Dokumentasi BKHMK
    </h2>
@endsection

{{-- Konten Utama Halaman Galeri (Hanya menampilkan koleksi) --}}
@section('content')
    
    <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-6 border-b pb-3">
            Koleksi Foto Kegiatan
        </h1>
        
        @if($galleries->isEmpty())
            <p class="text-gray-500 italic p-4 text-center border border-dashed rounded-lg">
                Belum ada gambar yang diunggah untuk ditampilkan.
            </p>
        @else
            {{-- Tampilan Grid Card yang menarik (mengikuti gaya Program Unggulan) --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($galleries as $gallery)
                    <div class="rounded-xl overflow-hidden shadow-lg hover-lift transition duration-300 border border-gray-200 dark:border-gray-700">
                        
                        {{-- Pastikan path storage benar --}}
                        <div class="h-48 flex items-center justify-center bg-gray-100 dark:bg-gray-800">
                             <img 
                                src="{{ asset('storage/' . $gallery->image_path) }}" 
                                alt="Foto Kegiatan {{ $gallery->category }}" 
                                class="w-full h-full object-cover object-center transition duration-300 hover:scale-[1.02]"
                                loading="lazy"
                            >
                        </div>
                       
                        <div class="p-3 bg-white dark:bg-gray-800">
                            <h3 class="text-base font-bold mb-1 text-gray-800 dark:text-white capitalize truncate">
                                {{ str_replace('_', ' ', $gallery->category) }}
                            </h3>
                            <p class="text-xs text-primary-600 dark:text-primary-400 font-medium">
                                Kategori: {{ str_replace('_', ' ', $gallery->category) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Opsional: Anda bisa menambahkan script untuk Filter kategori di sini jika diperlukan --}}

@endsection