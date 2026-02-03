@extends('layouts.bkhmk')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Galeri Kegiatan Mahasiswa (Organisasi)
    </h2>
@endsection

@section('content')
    
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Judul Utama --}}
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold mb-2 text-gray-900 dark:text-white">{{ $headerTitle }}</h1>
                <div class="section-divider w-24 mx-auto mb-4"></div>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">{{ $subheaderTitle }}</p>
            </div>

            {{-- ------------------------------------ --}}
            {{-- 1. BAGIAN GALERI ORMAWA --}}
            {{-- ------------------------------------ --}}
            <div class="mb-16" id="ormawa">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                        Kategori ORMAWA (<span class="text-indigo-600">{{ $ormawaCount }} Foto</span>)
                    </h2>
                    @if($ormawaCount > 6)
                    <button data-target="gallery-ormawa-full" class="text-primary-600 hover:text-primary-700 font-semibold flex items-center cursor-pointer view-all-btn">
                        Lihat Semua
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                    @endif
                </div>
                <div id="gallery-ormawa-preview" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @forelse ($ormawaPhotos->take(6) as $photo)
                        <a href="{{ asset('storage/' . $photo->image_path) }}" data-lightbox="ormawa-gallery" data-title="{{ $photo->activity_name ?? basename($photo->image_path) }}" class="block group bg-white dark:bg-gray-900 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 hover-lift p-2">
                            <div class="w-full aspect-square">
                                <img src="{{ asset('storage/' . $photo->image_path) }}" alt="Ormawa" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <div class="p-3 text-center">
                                <p class="text-sm font-medium truncate text-gray-800 dark:text-gray-200">{{ $photo->activity_name ?? basename($photo->image_path) }}</p>
                            </div>
                        </a>
                    @empty
                        <div class="lg:col-span-4 text-center py-6 bg-white dark:bg-gray-900 rounded-lg"><p class="text-gray-500 italic">Belum ada foto Ormawa.</p></div>
                    @endforelse
                </div>
                <div id="gallery-ormawa-full" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6 hidden">
                     @forelse ($ormawaPhotos as $photo)
                        <a href="{{ asset('storage/' . $photo->image_path) }}" data-lightbox="ormawa-gallery-full" data-title="{{ $photo->activity_name ?? basename($photo->image_path) }}" class="block group bg-white dark:bg-gray-900 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 hover-lift p-2">
                            <div class="w-full aspect-square">
                                <img src="{{ asset('storage/' . $photo->image_path) }}" alt="Ormawa" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <div class="p-3 text-center">
                                <p class="text-sm font-medium truncate text-gray-800 dark:text-gray-200">{{ $photo->activity_name ?? basename($photo->image_path) }}</p>
                            </div>
                        </a>
                    @empty @endforelse
                </div>
            </div>

            {{-- ------------------------------------ --}}
            {{-- 2. BAGIAN GALERI UKM --}}
            {{-- ------------------------------------ --}}
            <div class="mb-16" id="ukm">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                        Kategori UKM (<span class="text-indigo-600">{{ $ukmCount }} Foto</span>)
                    </h2>
                    @if($ukmCount > 6)
                    <button data-target="gallery-ukm-full" class="text-primary-600 hover:text-primary-700 font-semibold flex items-center cursor-pointer view-all-btn">
                        Lihat Semua
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                    @endif
                </div>
                
                {{-- Menampilkan UKM dan foto-fotonya --}}
                @foreach ($ukmList as $ukm)
                    <div class="ukm-category mb-10">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">{{ $ukm }}</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @forelse ($ukmPhotosByCategory[$ukm] as $photo)
                                <a href="{{ asset('storage/' . $photo->image_path) }}" data-lightbox="ukm-gallery" data-title="{{ $photo->activity_name ?? basename($photo->image_path) }}" class="block group bg-white dark:bg-gray-900 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 hover-lift p-2">
                                    <div class="w-full aspect-square">
                                        <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $ukm }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                    </div>
                                    <div class="p-3 text-center">
                                        <p class="text-sm font-medium truncate text-gray-800 dark:text-gray-200">{{ $photo->activity_name ?? basename($photo->image_path) }}</p>
                                    </div>
                                </a>
                            @empty
                                <div class="lg:col-span-4 text-center py-6 bg-white dark:bg-gray-900 rounded-lg"><p class="text-gray-500 italic">Belum ada foto untuk kategori {{ $ukm }}.</p></div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- ------------------------------------ --}}
            {{-- 3. BAGIAN GALERI HIMPUNAN --}}
            {{-- ------------------------------------ --}}
            <div class="mb-16" id="himpunan">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                        Kategori HIMPUNAN MAHASISWA (<span class="text-indigo-600">{{ $himpunanCount }} Foto</span>)
                    </h2>
                    @if($himpunanCount > 6)
                    <button data-target="gallery-himpunan-full" class="text-primary-600 hover:text-primary-700 font-semibold flex items-center cursor-pointer view-all-btn">
                        Lihat Semua
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                    @endif
                </div>

                {{-- Menampilkan Himpunan dan foto-fotonya --}}
                @foreach ($himpunanList as $himpunan)
                    <div class="himpunan-category mb-10">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">{{ $himpunan }}</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @forelse ($himpunanPhotosByCategory[$himpunan] as $photo)
                                <a href="{{ asset('storage/' . $photo->image_path) }}" data-lightbox="himpunan-gallery" data-title="{{ $photo->activity_name ?? basename($photo->image_path) }}" class="block group bg-white dark:bg-gray-900 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 hover-lift p-2">
                                    <div class="w-full aspect-square">
                                        <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $himpunan }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                    </div>
                                    <div class="p-3 text-center">
                                        <p class="text-sm font-medium truncate text-gray-800 dark:text-gray-200">{{ $photo->activity_name ?? basename($photo->image_path) }}</p>
                                    </div>
                                </a>
                            @empty
                                <div class="lg:col-span-4 text-center py-6 bg-white dark:bg-gray-900 rounded-lg"><p class="text-gray-500 italic">Belum ada foto untuk kategori {{ $himpunan }}.</p></div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- JAVASCRIPT (Sama seperti sebelumnya) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewAllButtons = document.querySelectorAll('.view-all-btn');

            viewAllButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const targetGallery = document.getElementById(targetId);
                    
                    this.style.display = 'none';
                    
                    if (targetGallery) {
                        targetGallery.classList.remove('hidden');
                        targetGallery.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });
        });
    </script>
@endsection
