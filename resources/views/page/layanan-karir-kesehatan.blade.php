@extends('layouts.bkhmk')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Galeri BKHMK - Layanan Karir & Kesehatan
    </h2>
@endsection

@section('content')
    
    <!-- Konten Galeri Gabungan -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Judul Utama --}}
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold mb-2 text-gray-900 dark:text-white">{{ $headerTitle }}</h1>
                <div class="section-divider w-24 mx-auto mb-4"></div>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">{{ $subheaderTitle }}</p>
            </div>

            {{-- ------------------------------------ --}}
            {{-- 1. BAGIAN GALERI HUMAS --}}
            {{-- ------------------------------------ --}}
            <div class="mb-16">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                        Dokumentasi Layanan (<span class="text-indigo-600">{{ $prestasiCount }} Foto</span>)
                    </h2>
                    {{-- Tombol Lihat Semua Humas --}}
                    @if($prestasiCount > 6)
                    <button id="btn-humas-view-all" data-target="gallery-humas-full" class="text-primary-600 hover:text-primary-700 font-semibold flex items-center cursor-pointer view-all-btn">
                        Lihat Semua
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                    @endif
                </div>

                {{-- PRATINJAU HUMAS (Selalu Tampil) --}}
                <div id="gallery-humas-preview" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @forelse ($prestasiPhotos->take(6) as $photo)
                        <a href="{{ asset('storage/' . $photo->image_path) }}" 
                           data-lightbox="humas-gallery" 
                           data-title="{{ basename($photo->image_path) }}"
                           class="block group bg-white dark:bg-gray-900 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 hover-lift p-2">
                            <div class="w-full aspect-square">
                                <img src="{{ asset('storage/' . $photo->image_path) }}" 
                                     alt="Humas" 
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <div class="p-3 text-center">
                                <p class="text-sm font-medium truncate text-gray-800 dark:text-gray-200">{{ basename($photo->activity_name) }}</p>
                            </div>
                        </a>
                    @empty
                        <div class="lg:col-span-4 text-center py-6 bg-white dark:bg-gray-900 rounded-lg">
                            <p class="text-gray-500 italic">Belum ada foto Humas.</p>
                        </div>
                    @endforelse
                </div>

                {{-- GALERI PENUH HUMAS (Awalnya Hidden) --}}
                <div id="gallery-humas-full" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6 hidden">
                     @forelse ($prestasiPhotos as $photo)
                        <a href="{{ asset('storage/' . $photo->image_path) }}" 
                           data-lightbox="humas-gallery-full" 
                           data-title="{{ basename($photo->image_path) }}"
                           class="block group bg-white dark:bg-gray-900 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 hover-lift p-2">
                            <div class="w-full aspect-square">
                                <img src="{{ asset('storage/' . $photo->image_path) }}" 
                                     alt="Humas" 
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <div class="p-3 text-center">
                                <p class="text-sm font-medium truncate text-gray-800 dark:text-gray-200">{{ basename($photo->activity_name) }}</p>
                            </div>
                        </a>
                    @empty
                    @endforelse
                </div>
            </div>


        </div>
    </section>

    {{-- @include('partials.contact-section') --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi untuk menangani klik "Lihat Semua"
            const viewAllButtons = document.querySelectorAll('.view-all-btn');

            viewAllButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const targetGallery = document.getElementById(targetId);
                    const previewGallery = document.getElementById(targetId.replace('-full', '-preview'));
                    
                    // 1. Sembunyikan tombol
                    this.style.display = 'none';
                    
                    // 2. Tampilkan galeri penuh
                    if (targetGallery) {
                        targetGallery.classList.remove('hidden');
                    }
                    
                    // 3. Opsional: Gulir ke bagian galeri yang baru dibuka (agar terlihat)
                    if (previewGallery) {
                        targetGallery.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });
        });
    </script>
@endsection