@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Header Formulir --}}
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6 border-b pb-2">Form Kuisioner</h1>

        {{-- PESAN SUKSES --}}
        @if (session('success'))
            <div class="p-3 mb-6 text-sm text-green-700 bg-green-100 rounded-lg shadow-md" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- PESAN PERINGATAN (Jika user sudah pernah mengisi tapi tetap mencoba akses) --}}
        @if (session('status_warning'))
            <div class="p-4 mb-6 text-sm text-red-800 bg-red-100 rounded-lg flex items-start space-x-3 shadow-md"
                role="alert">
                <svg class="w-6 h-6 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M8.257 3.099c.765-1.364 2.586-1.364 3.351 0l4.538 8.06c.765 1.364-.11 3.03-1.675 3.03H5.392c-1.565 0-2.44-1.666-1.675-3.03l4.538-8.06zM10 10a1 1 0 100 2 1 1 0 000-2zm1 3a1 1 0 10-2 0v1a1 1 0 102 0v-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-bold">Kuisioner:</span>
                    {{ session('status_warning') }}
                </div>
            </div>
        @endif

        {{-- SECTION 1: PROFIL ALUMNI (Read Only) --}}
        <div class="bg-white p-6 shadow-lg rounded-lg mb-8 border-l-4 border-indigo-500">
            <h2 class="text-xl font-bold text-indigo-700 mb-4">Profil Alumni</h2>

            <div class="space-y-3">
                {{-- Data profil diambil langsung dari $user->profile (read only) --}}
                <div class="flex border-b pb-2">
                    <div class="w-1/3 font-medium text-gray-600">NIM</div>
                    <div class="w-2/3 font-semibold text-gray-800">: {{ $user->profile->nim ?? 'N/A' }}</div>
                </div>
                <div class="flex border-b pb-2">
                    <div class="w-1/3 font-medium text-gray-600">Nama Lengkap</div>
                    <div class="w-2/3 font-semibold text-gray-800">: {{ $user->name }}</div>
                </div>
                <div class="flex border-b pb-2">
                    <div class="w-1/3 font-medium text-gray-600">Prodi</div>
                    <div class="w-2/3 font-semibold text-gray-800">: {{ $user->profile->prodi ?? 'N/A' }}</div>
                </div>
                <div class="flex border-b pb-2">
                    <div class="w-1/3 font-medium text-gray-600">Tahun Lulus</div>
                    <div class="w-2/3 font-semibold text-gray-800">: {{ $user->profile->tahun_lulus ?? 'N/A' }}</div>
                </div>
                <div class="flex border-b pb-2">
                    <div class="w-1/3 font-medium text-gray-600">No. Telepon/HP</div>
                    <div class="w-2/3 font-semibold text-gray-800">: {{ $user->profile->no_telepon ?? 'N/A' }}</div>
                </div>
                <div class="flex">
                    <div class="w-1/3 font-medium text-gray-600">Email</div>
                    <div class="w-2/3 font-semibold text-gray-800">: {{ $user->email }}</div>
                </div>
            </div>
        </div>

        {{-- SECTION 2: KUISNER WAJIB (FORM UPDATE) --}}
        {{-- Menggunakan method POST dan @method('PUT') untuk update --}}
        <form method="POST" action="{{ route('questionnaire.submit') }}">
            @csrf
            @method('PUT')

            <h2 class="text-2xl font-bold text-indigo-700 mb-6 border-b pb-2">Kuisioner Wajib</h2>

            {{-- Item 1: MASA KERJA (Input dibesarkan) --}}
            <div class="bg-white p-5 shadow-md rounded-lg mb-4 border border-gray-200">
                <label for="masa_kerja" class="block text-lg font-bold text-gray-800 mb-1">MASA KERJA</label>
                <p class="text-sm text-gray-500 mb-3">Your answer</p>
                <x-text-input id="masa_kerja" name="masa_kerja" class="block mt-1 w-full p-3"
                    placeholder="Isi Masa Kerja dalam Bulan" {{-- Mengambil nilai dari $questionnaireData jika ada --}}
                    value="{{ old('masa_kerja', $questionnaireData['masa_kerja'] ?? '') }}" />
                <x-input-error :messages="$errors->get('masa_kerja')" class="mt-2" />
            </div>

            {{-- Item 2: MASA TUNGGU MENDAPATKAN PEKERJAAN (BULAN) --}}
            <div class="bg-white p-5 shadow-md rounded-lg mb-4 border border-gray-200">
                <label for="masa_tunggu" class="block text-lg font-bold text-gray-800 mb-1">MASA TUNGGU MENDAPATKAN
                    PEKERJAAN (BULAN)</label>
                <p class="text-sm text-gray-500 mb-3">Your answer</p>
                <x-text-input id="masa_tunggu" name="masa_tunggu" class="block mt-1 w-full p-3"
                    placeholder="Isi Masa Tunggu"
                    value="{{ old('masa_tunggu', $questionnaireData['masa_tunggu'] ?? '') }}" />
                <x-input-error :messages="$errors->get('masa_tunggu')" class="mt-2" />
            </div>

            {{-- Item 3: PROVINSI TEMPAT KERJA --}}
            <div class="bg-white p-5 shadow-md rounded-lg mb-4 border border-gray-200">
                <label for="provinsi_kerja" class="block text-lg font-bold text-gray-800 mb-1">PROVINSI TEMPAT KERJA</label>
                <p class="text-sm text-gray-500 mb-3">Your answer</p>
                <x-text-input id="provinsi_kerja" name="provinsi_kerja" class="block mt-1 w-full p-3"
                    placeholder="Contoh: Jawa Timur"
                    value="{{ old('provinsi_kerja', $questionnaireData['provinsi_kerja'] ?? '') }}" />
                <x-input-error :messages="$errors->get('provinsi_kerja')" class="mt-2" />
            </div>

            {{-- Item 4: KABUPATEN TEMPAT KERJA --}}
            <div class="bg-white p-5 shadow-md rounded-lg mb-4 border border-gray-200">
                <label for="kabupaten_kerja" class="block text-lg font-bold text-gray-800 mb-1">KABUPATEN TEMPAT
                    KERJA</label>
                <p class="text-sm text-gray-500 mb-3">Your answer</p>
                <x-text-input id="kabupaten_kerja" name="kabupaten_kerja" class="block mt-1 w-full p-3"
                    placeholder="Contoh: Banyuwangi"
                    value="{{ old('kabupaten_kerja', $questionnaireData['kabupaten_kerja'] ?? '') }}" />
                <x-input-error :messages="$errors->get('kabupaten_kerja')" class="mt-2" />
            </div>

            {{-- Item 5: INSTANSI TEMPAT KERJA --}}
            <div class="bg-white p-5 shadow-md rounded-lg mb-4 border border-gray-200">
                <label for="instansi_kerja" class="block text-lg font-bold text-gray-800 mb-1">INSTANSI TEMPAT KERJA</label>
                <p class="text-sm text-gray-500 mb-3">Your answer</p>
                <x-text-input id="instansi_kerja" name="instansi_kerja" class="block mt-1 w-full p-3"
                    placeholder="Nama Perusahaan/Institusi"
                    value="{{ old('instansi_kerja', $questionnaireData['instansi_kerja'] ?? '') }}" />
                <x-input-error :messages="$errors->get('instansi_kerja')" class="mt-2" />
            </div>

            {{-- Item 6: GAJI PER BULAN --}}
            <div class="bg-white p-5 shadow-md rounded-lg mb-6 border border-gray-200">
                <label class="block text-lg font-bold text-gray-800 mb-3">GAJI PER BULAN (Isi dengan Angka saja)</label>

                <div class="flex items-center mb-3">
                    <label for="gaji_utama" class="w-1/3 text-gray-700">Dari Pekerjaan Utama Rp.</label>
                    <x-text-input id="gaji_utama" name="gaji_utama" type="number" min="0"
                        value="{{ old('gaji_utama', $questionnaireData['gaji_utama'] ?? 400000) }}"
                        class="block w-2/3 p-3" />
                </div>
                <x-input-error :messages="$errors->get('gaji_utama')" class="mt-2" />

                <div class="flex items-center mb-3">
                    <label for="gaji_lembur" class="w-1/3 text-gray-700">Dari Lembur dan Tips Rp.</label>
                    <x-text-input id="gaji_lembur" name="gaji_lembur" type="number" min="0"
                        value="{{ old('gaji_lembur', $questionnaireData['gaji_lembur'] ?? 0) }}"
                        class="block w-2/3 p-3" />
                </div>
                <x-input-error :messages="$errors->get('gaji_lembur')" class="mt-2" />

                <div class="flex items-center">
                    <label for="gaji_lainnya" class="w-1/3 text-gray-700">Dari Pekerjaan Lainnya Rp.</label>
                    <x-text-input id="gaji_lainnya" name="gaji_lainnya" type="number" min="0"
                        value="{{ old('gaji_lainnya', $questionnaireData['gaji_lainnya'] ?? 0) }}"
                        class="block w-2/3 p-3" />
                </div>
                <x-input-error :messages="$errors->get('gaji_lainnya')" class="mt-2" />
            </div>

            {{-- Item 7: Berapa bulan waktu yang dihabiskan (Radio + Input Terpisah) --}}
            <div class="bg-white p-5 shadow-md rounded-lg mb-4 border border-gray-200">
                <label class="block text-lg font-bold text-gray-800 mb-3">Berapa bulan waktu yang dihabiskan (sebelum dan
                    sesudah kelulusan) untuk memperoleh pekerjaan pertama?</label>

                {{-- Gunakan nilai dari $questionnaireData jika ada, atau old() jika validasi gagal --}}
                @php
                    $periodeLama = old('waktu_kerja_periode', $questionnaireData['waktu_kerja_periode'] ?? '');
                    $sebelumLama = old('waktu_kerja_sebelum', $questionnaireData['waktu_kerja_sebelum'] ?? 1);
                    $sesudahLama = old('waktu_kerja_sesudah', $questionnaireData['waktu_kerja_sesudah'] ?? 0);
                @endphp

                <div class="space-y-3">
                    {{-- Opsi Sebelum Lulus --}}
                    <label class="flex items-start space-x-3">
                        <input type="radio" name="waktu_kerja_periode" value="Sebelum"
                            class="h-5 w-5 text-indigo-600 mt-1" {{ $periodeLama == 'Sebelum' ? 'checked' : '' }}>
                        <span>Kira-Kira
                            <x-text-input name="waktu_kerja_sebelum" type="number" min="0"
                                value="{{ $sebelumLama }}" class="inline w-20 p-2 text-sm" />
                            bulan sebelum lulus ujian
                        </span>
                    </label>

                    {{-- Opsi Sesudah Lulus --}}
                    <label class="flex items-start space-x-3">
                        <input type="radio" name="waktu_kerja_periode" value="Sesudah"
                            class="h-5 w-5 text-indigo-600 mt-1" {{ $periodeLama == 'Sesudah' ? 'checked' : '' }}>
                        <span>Kira-Kira
                            <x-text-input name="waktu_kerja_sesudah" type="number" min="0"
                                value="{{ $sesudahLama }}" class="inline w-20 p-2 text-sm" />
                            bulan setelah lulus ujian
                        </span>
                    </label>
                </div>
                <x-input-error :messages="$errors->get('waktu_kerja_periode')" class="mt-2" />
            </div>

            {{-- Item 8: Sumber Dana Pembayaran Kuliah (Radio Group) --}}
            <div class="bg-white p-5 shadow-md rounded-lg mb-4 border border-gray-200">
                <label class="block text-lg font-bold text-gray-800 mb-3">Sebutkan sumber pendanaan dalam pembiayaan
                    kuliah?</label>

                <div class="space-y-2">
                    {{-- Anda harus cek value lama di sini --}}
                    @php
                        $currentSumberDana = old('sumber_dana', $questionnaireData['sumber_dana'] ?? null);
                        $isLainnya = $currentSumberDana == 'Lainnya' || str_contains($currentSumberDana, 'Lainnya:');
                        $lainnyaText = $isLainnya ? str_replace('Lainnya: ', '', $currentSumberDana) : '';
                    @endphp

                    <label class="flex items-center"><input type="radio" name="sumber_dana"
                            value="Biaya Sendiri/Keluarga" class="h-5 w-5 text-indigo-600"
                            {{ $currentSumberDana == 'Biaya Sendiri/Keluarga' ? 'checked' : '' }}>
                        <span class="ml-2">Biaya Sendiri / Keluarga</span></label>
                    <label class="flex items-center"><input type="radio" name="sumber_dana" value="Beasiswa ADIK"
                            class="h-5 w-5 text-indigo-600" {{ $currentSumberDana == 'Beasiswa ADIK' ? 'checked' : '' }}>
                        <span class="ml-2">Beasiswa ADIK</span></label>
                    <label class="flex items-center"><input type="radio" name="sumber_dana" value="Beasiswa BIDIKMISI"
                            class="h-5 w-5 text-indigo-600"
                            {{ $currentSumberDana == 'Beasiswa BIDIKMISI' ? 'checked' : '' }}>
                        <span class="ml-2">Beasiswa BIDIKMISI</span></label>
                    <label class="flex items-center"><input type="radio" name="sumber_dana" value="Beasiswa PPA"
                            class="h-5 w-5 text-indigo-600" {{ $currentSumberDana == 'Beasiswa PPA' ? 'checked' : '' }}>
                        <span class="ml-2">Beasiswa PPA</span></label>
                    <label class="flex items-center"><input type="radio" name="sumber_dana" value="Beasiswa AFIRMASI"
                            class="h-5 w-5 text-indigo-600"
                            {{ $currentSumberDana == 'Beasiswa AFIRMASI' ? 'checked' : '' }}>
                        <span class="ml-2">Beasiswa AFIRMASI</span></label>
                    <label class="flex items-center"><input type="radio" name="sumber_dana"
                            value="Beasiswa Perusahaan/Swasta" class="h-5 w-5 text-indigo-600"
                            {{ $currentSumberDana == 'Beasiswa Perusahaan/Swasta' ? 'checked' : '' }}> <span
                            class="ml-2">Beasiswa Perusahaan/Swasta</span></label>

                    <label class="flex items-start">
                        <input type="radio" name="sumber_dana" value="Lainnya" class="h-5 w-5 text-indigo-600 mt-1"
                            {{ $isLainnya ? 'checked' : '' }}
                            onclick="document.getElementById('sumber_dana_lainnya_input').style.display='block'">
                        <span class="ml-2 flex-1">Lainnya, tuliskan:
                            <x-text-input name="sumber_dana_lainnya"
                                value="{{ old('sumber_dana_lainnya', $lainnyaText ?? '') }}"
                                class="inline w-[70%] p-2 text-sm ml-2" />
                        </span>
                    </label>
                </div>
                <x-input-error :messages="$errors->get('sumber_dana')" class="mt-2" />
            </div>


            {{-- Item 9: Apakah Anda bekerja saat ini? --}}
            <div class="bg-white p-5 shadow-md rounded-lg mb-4 border border-gray-200">
                <label class="block text-lg font-bold text-gray-800 mb-3">Apakah Anda bekerja saat ini (termasuk kerja
                    sambilan dan
                    wirausaha)?</label>

                <div class="space-y-2">
                    <label class="flex items-center"><input type="radio" name="status_bekerja" value="Ya"
                            class="h-5 w-5 text-indigo-600"
                            {{ old('status_bekerja') == 'Ya' || ($questionnaireData['status_bekerja'] ?? '') == 'Ya' ? 'checked' : '' }}>
                        <span class="ml-2">Ya</span></label>
                    <label class="flex items-center"><input type="radio" name="status_bekerja" value="Tidak"
                            class="h-5 w-5 text-indigo-600"
                            {{ old('status_bekerja') == 'Tidak' || ($questionnaireData['status_bekerja'] ?? '') == 'Tidak' ? 'checked' : '' }}>
                        <span class="ml-2">Tidak</span></label>
                </div>

                <div class="mt-3">
                    <label for="keterangan_pekerjaan" class="block text-sm font-medium text-gray-700">Jika Ya, sebutkan
                        pekerjaan
                        Anda:</label>
                    <x-text-input id="keterangan_pekerjaan" name="keterangan_pekerjaan"
                        value="{{ old('keterangan_pekerjaan', $questionnaireData['keterangan_pekerjaan'] ?? '') }}"
                        class="block mt-1 w-full p-3" placeholder="Contoh: Bengkel Servis Motor" />
                    <x-input-error :messages="$errors->get('keterangan_pekerjaan')" class="mt-2" />
                </div>
                <x-input-error :messages="$errors->get('status_bekerja')" class="mt-2" />
            </div>


            {{-- Item 10: Hubungan Bidang Studi dengan Pekerjaan (Radio Group) --}}
            <div class="bg-white p-5 shadow-md rounded-lg mb-4 border border-gray-200">
                <label class="block text-lg font-bold text-gray-800 mb-3">Seberapa erat hubungan antara bidang studi dengan
                    pekerjaan Anda saat ini?</label>

                <div class="space-y-2">
                    <label class="flex items-center"><input type="radio" name="hubungan_studi" value="Sangat Erat"
                            class="h-5 w-5 text-indigo-600"
                            {{ old('hubungan_studi') == 'Sangat Erat' || ($questionnaireData['hubungan_studi'] ?? '') == 'Sangat Erat' ? 'checked' : '' }}>
                        <span class="ml-2">Sangat Erat</span></label>
                    <label class="flex items-center"><input type="radio" name="hubungan_studi" value="Erat"
                            class="h-5 w-5 text-indigo-600" {{ old('hubungan_studi') == 'Erat' ? 'checked' : '' }}> <span
                            class="ml-2">Erat</span></label>
                    <label class="flex items-center"><input type="radio" name="hubungan_studi" value="Cukup Erat"
                            class="h-5 w-5 text-indigo-600" {{ old('hubungan_studi') == 'Cukup Erat' ? 'checked' : '' }}>
                        <span class="ml-2">Cukup Erat</span></label>
                    <label class="flex items-center"><input type="radio" name="hubungan_studi" value="Kurang Erat"
                            class="h-5 w-5 text-indigo-600" {{ old('hubungan_studi') == 'Kurang Erat' ? 'checked' : '' }}>
                        <span class="ml-2">Kurang Erat</span></label>
                    <label class="flex items-center"><input type="radio" name="hubungan_studi"
                            value="Tidak Sama Sekali" class="h-5 w-5 text-indigo-600"
                            {{ old('hubungan_studi') == 'Tidak Sama Sekali' ? 'checked' : '' }}>
                        <span class="ml-2">Tidak Sama Sekali</span></label>
                </div>
                <x-input-error :messages="$errors->get('hubungan_studi')" class="mt-2" />
            </div>

            {{-- Item 11: Tingkat Pendidikan yang Paling Tepat/Sesuai --}}
            <div class="bg-white p-5 shadow-md rounded-lg mb-4 border border-gray-200">
                <label class="block text-lg font-bold text-gray-800 mb-3">Tingkat pendidikan apa yang paling tepat/sesuai
                    untuk
                    pekerjaan saat ini?</label>

                <div class="space-y-2">
                    <label class="flex items-center"><input type="radio" name="tingkat_pendidikan_sesuai"
                            value="Setingkat Lebih Tinggi" class="h-5 w-5 text-indigo-600"
                            {{ old('tingkat_pendidikan_sesuai') == 'Setingkat Lebih Tinggi' || ($questionnaireData['tingkat_pendidikan_sesuai'] ?? '') == 'Setingkat Lebih Tinggi' ? 'checked' : '' }}>
                        <span class="ml-2">Setingkat Lebih Tinggi</span></label>
                    <label class="flex items-center"><input type="radio" name="tingkat_pendidikan_sesuai"
                            value="Tingkat Yang Sama" class="h-5 w-5 text-indigo-600"
                            {{ old('tingkat_pendidikan_sesuai') == 'Tingkat Yang Sama' || ($questionnaireData['tingkat_pendidikan_sesuai'] ?? '') == 'Tingkat Yang Sama' ? 'checked' : '' }}>
                        <span class="ml-2">Tingkat Yang Sama</span></label>
                    <label class="flex items-center"><input type="radio" name="tingkat_pendidikan_sesuai"
                            value="Setingkat Lebih Rendah" class="h-5 w-5 text-indigo-600"
                            {{ old('tingkat_pendidikan_sesuai') == 'Setingkat Lebih Rendah' || ($questionnaireData['tingkat_pendidikan_sesuai'] ?? '') == 'Setingkat Lebih Rendah' ? 'checked' : '' }}>
                        <span class="ml-2">Setingkat Lebih Rendah</span></label>
                    <label class="flex items-center"><input type="radio" name="tingkat_pendidikan_sesuai"
                            value="Tidak Perlu Pendidikan Tinggi" class="h-5 w-5 text-indigo-600"
                            {{ old('tingkat_pendidikan_sesuai') == 'Tidak Perlu Pendidikan Tinggi' || ($questionnaireData['tingkat_pendidikan_sesuai'] ?? '') == 'Tidak Perlu Pendidikan Tinggi' ? 'checked' : '' }}>
                        <span class="ml-2">Tidak Perlu Pendidikan Tinggi</span></label>
                </div>
                <x-input-error :messages="$errors->get('tingkat_pendidikan_sesuai')" class="mt-2" />
            </div>

            {{-- Item 12: Kira-kira pendapatan (Input Numerik dengan Catatan) --}}
            <div class="bg-white p-5 shadow-md rounded-lg mb-6 border border-gray-200">
                <label class="block text-lg font-bold text-gray-800 mb-3">Kira-kira berapa pendapatan anda setiap
                    bulannya?</label>

                <p class="text-sm text-red-500 mb-3">(Isilah dengan ANGKA saja, tanpa tanda titik atau koma)</p>

                <div class="flex items-center mb-3">
                    <label for="pendapatan_utama" class="w-1/3 text-gray-700">Dari Pekerjaan Utama Rp.</label>
                    <x-text-input id="pendapatan_utama" name="pendapatan_utama" type="number" min="0"
                        value="{{ old('pendapatan_utama', $questionnaireData['pendapatan_utama'] ?? 400000) }}"
                        class="block w-2/3 p-3" />
                </div>
                <x-input-error :messages="$errors->get('pendapatan_utama')" class="mt-2" />

                <div class="flex items-center mb-3">
                    <label for="pendapatan_lembur" class="w-1/3 text-gray-700">Dari Lembur dan Tips Rp.</label>
                    <x-text-input id="pendapatan_lembur" name="pendapatan_lembur" type="number" min="0"
                        value="{{ old('pendapatan_lembur', $questionnaireData['pendapatan_lembur'] ?? 0) }}"
                        class="block w-2/3 p-3" />
                </div>
                <x-input-error :messages="$errors->get('pendapatan_lembur')" class="mt-2" />

                <div class="flex items-center">
                    <label for="pendapatan_lainnya" class="w-1/3 text-gray-700">Dari Pekerjaan Lainnya Rp.</label>
                    <x-text-input id="pendapatan_lainnya" name="pendapatan_lainnya" type="number" min="0"
                        value="{{ old('pendapatan_lainnya', $questionnaireData['pendapatan_lainnya'] ?? 0) }}"
                        class="block w-2/3 p-3" />
                </div>
                <x-input-error :messages="$errors->get('pendapatan_lainnya')" class="mt-2" />
            </div>

            {{-- Tombol Submit/Update --}}
            <div class="flex justify-center pt-4 border-t">
                <button type="submit"
                    class="flex items-center px-8 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-lg hover:bg-indigo-700 transition duration-150">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                        </path>
                    </svg>
                    {{ $isEditing ? 'Update Jawaban Kuisioner' : 'Kirim Jawaban Kuisioner' }}
                </button>
            </div>
        </form>

    </div>
@endsection

{{-- Tambahkan script untuk handle visibilitas field Lainnya (jika Anda ingin fungsi JS yang lebih canggih) --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle visibility untuk Sumber Dana Lainnya saat page load
        const radioLainnya = document.querySelector('input[name="sumber_dana"][value="Lainnya"]');
        const inputLainnyaDiv = document.getElementById('sumber_dana_lainnya_input');

        if (radioLainnya && radioLainnya.checked) {
            inputLainnyaDiv.style.display = 'block';
        } else if (inputLainnyaDiv) {
            // Jika tidak ada yang dicentang 'Lainnya', sembunyikan input teks
            inputLainnyaDiv.style.display = 'none';
        }
    });
</script>
