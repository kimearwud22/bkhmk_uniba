@extends('layouts.app')

@section('content')
    
    {{-- Konten Pembungkus Dashboard --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- Header Halaman (Meniru Tampilan Gambar) --}}
        <div class="w-full bg-white shadow-md rounded-lg mb-8 border-t-4 border-indigo-600">
            <div class="p-4">
                <p class="text-2xl font-bold text-gray-800 text-left">Profil</p>
            </div>
        </div>
        
        {{-- Kartu Formulir Profil --}}
        <div class="bg-white p-6 sm:p-8 shadow-xl rounded-lg border border-gray-100">
            
            <h3 class="text-xl font-bold text-indigo-700 mb-6 border-b pb-2">
                Detail Data Diri
            </h3>

            {{-- Status Pesan (Jika ada redirect dengan session('status')) --}}
            @if (session('status'))
                <div class="p-3 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{-- FORM UPDATE DIMULAI DI SINI --}}
            <form method="POST" action="{{ route('profile.user.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') 

                {{-- Baris 1: NIM & Prodi --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                    
                    {{-- NIM (Bisa diedit sekarang) --}}
                    <div>
                        <x-input-label for="nim" :value="__('NIM')" />
                        <x-text-input 
                            id="nim" 
                            class="block mt-1 w-full p-3" {{-- Padding dibesarkan --}}
                            type="text" 
                            name="nim" 
                            value="{{ $user->profile->nim ?? old('nim') }}" {{-- Ambil dari profile, pakai old() saat error --}}
                            required 
                        />
                        <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                    </div>

                    {{-- Prodi (PILIHAN DROPDOWN) --}}
                    <div>
                        <x-input-label for="prodi" :value="__('Prodi')" />
                        <select 
                            id="prodi" 
                            name="prodi" 
                            required
                            class="block mt-1 w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-150 bg-white"
                        >
                            <option value="" disabled {{ !($user->profile->prodi ?? old('prodi')) ? 'selected' : '' }}>Pilih Program Studi</option>
                            
                            {{-- Daftar Prodi yang diminta --}}
                            @php
                                $prodiList = [
                                    'Sejarah', 'Bimbingan Konseling (BK)', 'PPKN', 
                                    'Teknologi Hasil Pertanian', 'Teknologi Hasil Perikanan', 
                                    'Teknik Mesin', 'Teknik Elektro', 'Biologi', 'Fisika', 
                                    'Matematika', 'Bahasa Inggris', 'Kimia'
                                ];
                                $currentProdi = $user->profile->prodi ?? old('prodi');
                            @endphp
                            
                            @foreach ($prodiList as $prodi)
                                <option value="{{ $prodi }}" {{ $currentProdi == $prodi ? 'selected' : '' }}>
                                    {{ $prodi }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('prodi')" class="mt-2" />
                    </div>
                </div>

                {{-- Baris 2: Nama Lengkap (User), Tahun Angkatan, Tahun Lulus (Profile) --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
                    
                    {{-- Nama Lengkap (Tetap dari User) --}}
                    <div class="md:col-span-1">
                        <x-input-label for="name" :value="__('Nama Lengkap')" />
                        <x-text-input 
                            id="name" 
                            class="block mt-1 w-full p-3" {{-- Padding dibesarkan --}}
                            type="text" 
                            name="name" 
                            value="{{ $user->name ?? old('name') }}" 
                            required 
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- Tahun Angkatan (dari Profile) --}}
                    <div>
                        <x-input-label for="tahun_angkatan" :value="__('Tahun Angkatan')" />
                        <x-text-input 
                            id="tahun_angkatan" 
                            class="block mt-1 w-full p-3" {{-- Padding dibesarkan --}}
                            type="number" 
                            name="tahun_angkatan" 
                            value="{{ $user->profile->tahun_angkatan ?? old('tahun_angkatan') }}" 
                            required 
                        />
                        <x-input-error :messages="$errors->get('tahun_angkatan')" class="mt-2" />
                    </div>

                    {{-- Tahun Lulus (dari Profile) --}}
                    <div>
                        <x-input-label for="tahun_lulus" :value="__('Tahun Lulus')" />
                        <x-text-input 
                            id="tahun_lulus" 
                            class="block mt-1 w-full p-3" {{-- Padding dibesarkan --}}
                            type="number" 
                            name="tahun_lulus" 
                            value="{{ $user->profile->tahun_lulus ?? old('tahun_lulus') }}" 
                            required 
                        />
                        <x-input-error :messages="$errors->get('tahun_lulus')" class="mt-2" />
                    </div>
                </div>

                {{-- Baris 3: Jenis Kelamin, No. Telepon, Email --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
                    
                    {{-- Jenis Kelamin --}}
                    <div>
                        <span class="text-sm font-medium text-gray-700 block mb-2">{{ __('Jenis Kelamin') }}</span>
                        <div class="flex space-x-4 mt-1">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio h-5 w-5 text-indigo-600" name="jenis_kelamin" value="Laki-Laki" {{ (old('jenis_kelamin') == 'Laki-Laki' || ($user->profile->jenis_kelamin ?? '') == 'Laki-Laki') ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">Laki-Laki</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio h-5 w-5 text-indigo-600" name="jenis_kelamin" value="Perempuan" {{ (old('jenis_kelamin') == 'Perempuan' || ($user->profile->jenis_kelamin ?? '') == 'Perempuan') ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">Perempuan</span>
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                    </div>

                    {{-- No. Telepon (dari Profile) --}}
                    <div>
                        <x-input-label for="no_telepon" :value="__('No. Telepon')" />
                        <x-text-input 
                            id="no_telepon" 
                            class="block mt-1 w-full p-3" {{-- Padding dibesarkan --}}
                            type="text" 
                            name="no_telepon" 
                            value="{{ $user->profile->no_telepon ?? old('no_telepon') }}" 
                        />
                        <x-input-error :messages="$errors->get('no_telepon')" class="mt-2" />
                    </div>

                    {{-- Email (Tetap dari User, Disabled) --}}
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input 
                            id="email" 
                            class="block mt-1 w-full bg-gray-100" 
                            type="email" 
                            value="{{ $user->email ?? 'N/A' }}" 
                            readonly
                            disabled
                        />
                    </div>
                </div>
                
                {{-- Baris 4: Alamat (dari Profile) & Berkas CV (dari Profile) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    
                    {{-- Alamat (Textarea) --}}
                    <div>
                        <x-input-label for="alamat" :value="__('Alamat')" />
                        <textarea id="alamat" name="alamat" rows="3" class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-3 transition duration-150">
                            {{ $user->profile->alamat ?? old('alamat') }}
                        </textarea>
                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                    </div>

                    {{-- Berkas CV --}}
                    <div>
                        <x-input-label for="berkas_cv" :value="__('Berkas CV')" />
                        <div class="mt-1 flex items-center space-x-3">
                            <input type="file" id="berkas_cv" name="berkas_cv" class="block w-full text-sm text-gray-500
                              file:mr-4 file:py-3 file:px-4 {{-- Padding file input dibesarkan --}}
                              file:rounded-full file:border-0
                              file:text-sm file:font-semibold
                              file:bg-indigo-50 file:text-indigo-700
                              hover:file:bg-indigo-100
                            ">
                        </div>
                        {{-- Tampilkan nama file yang sudah ada --}}
                        @if(isset($user->profile->cv_path) && $user->profile->cv_path)
                            <p class="mt-2 text-xs text-gray-500">CV Saat Ini: {{ basename($user->profile->cv_path) }}</p>
                        @endif
                        <x-input-error :messages="$errors->get('berkas_cv')" class="mt-2" />
                    </div>
                </div>

                {{-- Tombol Simpan --}}
                <div class="flex justify-center pt-4 border-t">
                    <button type="submit" class="flex items-center px-6 py-3 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600 transition duration-150">
                        {{-- Icon Save --}}
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection