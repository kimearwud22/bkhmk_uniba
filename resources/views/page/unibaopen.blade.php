@extends('layouts.bkhmk')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Pendaftaran Uniba Open - Universitas PGRI Banyuwangi
    </h2>
@endsection

@section('content')
    <div class="bg-[#1a2b3c] py-10 px-4 w-full shadow-inner">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-3xl font-bold text-white mb-3">Pendaftaran Uniba Open</h1>

            {{-- Breadcrumb --}}
            <nav class="flex justify-center items-center text-sm text-gray-300 space-x-2">
                <a href="#" class="hover:text-white transition">Beranda</a>
                <span class="text-gray-500 font-bold">&rsaquo;</span>
                <a href="#" class="hover:text-white transition">Uniba Open 2024</a>
                <span class="text-gray-500 font-bold">&rsaquo;</span>
                <span class="text-white font-medium">Pendaftaran Uniba Open</span>
            </nav>
        </div>
    </div>
    <section class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Mekanisme Title dengan garis di samping -->
            <div class="flex items-center justify-center mb-12">
                <div class="h-px bg-gray-300 flex-grow max-w-xs"></div>
                <h2 class="text-2xl font-semibold text-gray-800 px-6 text-center">Mekanisme, Syarat dan Biaya Pendaftaran
                </h2>
                <div class="h-px bg-gray-300 flex-grow max-w-xs"></div>
            </div>

            <!-- Alur Pendaftaran (3 Langkah) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Langkah 1 -->
                <div class="flex flex-col items-center text-center">
                    <div class="relative mb-6">
                        <div
                            class="w-36 h-36 bg-white rounded-full flex items-center justify-center shadow-lg border border-gray-100">
                            {{-- Icon Placeholder --}}
                            <svg class="w-16 h-16 text-[#003366]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                            </svg>
                        </div>
                        <span
                            class="absolute bottom-1 right-1 bg-[#001f3f] text-white w-8 h-8 rounded-full flex items-center justify-center font-bold text-lg">1</span>
                    </div>
                    <p class="text-sm font-medium text-gray-700 leading-relaxed px-4">Peserta mencermati dan memilih jenis
                        kejuaraan yang diikuti</p>
                </div>

                <!-- Langkah 2 -->
                <div class="flex flex-col items-center text-center">
                    <div class="relative mb-6">
                        <div
                            class="w-36 h-36 bg-white rounded-full flex items-center justify-center shadow-lg border border-gray-100">
                            <svg class="w-16 h-16 text-[#003366]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </div>
                        <span
                            class="absolute bottom-1 right-1 bg-[#001f3f] text-white w-8 h-8 rounded-full flex items-center justify-center font-bold text-lg">2</span>
                    </div>
                    <p class="text-sm font-medium text-gray-700 leading-relaxed px-4">Melakukan pembayaran sesuai tagihan
                        biaya pendaftaran (tambahkan keterangan transfer)</p>
                </div>

                <!-- Langkah 3 -->
                <div class="flex flex-col items-center text-center">
                    <div class="relative mb-6">
                        <div
                            class="w-36 h-36 bg-white rounded-full flex items-center justify-center shadow-lg border border-gray-100">
                            <svg class="w-16 h-16 text-[#003366]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="absolute bottom-1 right-1 bg-[#001f3f] text-white w-8 h-8 rounded-full flex items-center justify-center font-bold text-lg">3</span>
                    </div>
                    <p class="text-sm font-medium text-gray-700 leading-relaxed px-4">Melakukan pendaftaran peserta dan
                        konfirmasi pembayaran pada form yang telah disediakan</p>
                </div>
            </div>

            <!-- Banner Pengumuman Merah -->
            <div class="bg-[#c0392b] text-white p-4 mb-8 text-center text-sm font-bold shadow-md rounded-sm">
                Pendaftaran dibuka sejak edaran ini dikeluarkan dan ditutup Selasa 17 Oktober 2024, Pukul 23.59 WITA.
                Pendaftaran dapat di tutup sebelum batas akhir pendaftaran apabila sudah mencapai kuota.
            </div>

            <!-- Bagian Accordion (Gunakan Alpine.js) -->
            <div class="space-y-4" x-data="{ active: 1 }">

                <!-- 1. Biaya Pendaftaran -->
                <div class="border border-gray-200 rounded overflow-hidden shadow-sm bg-white">
                    <button @click="active = (active === 1 ? 0 : 1)"
                        class="w-full flex items-center p-3 bg-[#1e88e5] text-white font-bold text-sm uppercase transition-colors hover:bg-blue-700">
                        <span class="w-6 text-xl" x-text="active === 1 ? '-' : '+'"></span>
                        <span>Biaya Pendaftaran</span>
                    </button>
                    <div x-show="active === 1" x-collapse class="p-6 overflow-x-auto">
                        <h3 class="text-center font-bold text-lg mb-6 text-gray-800">BIAYA PENDAFTARAN</h3>
                        <table class="w-full border-collapse border border-gray-200 text-sm">
                            <thead class="bg-[#a29b00] text-white">
                                <tr>
                                    <th class="border border-gray-300 p-3 text-center w-12">No</th>
                                    <th class="border border-gray-300 p-3 text-left">Nomor Pertandingan</th>
                                    <th class="border border-gray-300 p-3 text-center">Tunggal Putra/Putri</th>
                                    <th class="border border-gray-300 p-3 text-center">Ganda Putra</th>
                                    <th class="border border-gray-300 p-3 text-center">Ganda Putri</th>
                                    <th class="border border-gray-300 p-3 text-center">Ganda Campuran</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                {{-- Baris tabel dinamis atau manual --}}
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="border border-gray-300 p-2 text-center">1</td>
                                    <td class="border border-gray-300 p-2">Pra Usia Dini</td>
                                    <td class="border border-gray-300 p-2 text-center">Rp. 200.000</td>
                                    <td class="border border-gray-300 p-2 text-center">-</td>
                                    <td class="border border-gray-300 p-2 text-center">-</td>
                                    <td class="border border-gray-300 p-2 text-center">-</td>
                                </tr>
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="border border-gray-300 p-2 text-center">2</td>
                                    <td class="border border-gray-300 p-2">Usia Dini</td>
                                    <td class="border border-gray-300 p-2 text-center">Rp. 200.000</td>
                                    <td class="border border-gray-300 p-2 text-center">-</td>
                                    <td class="border border-gray-300 p-2 text-center">-</td>
                                    <td class="border border-gray-300 p-2 text-center">-</td>
                                </tr>
                                {{-- ... tambahkan baris lainnya sesuai gambar ... --}}
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="border border-gray-300 p-2 text-center">7</td>
                                    <td class="border border-gray-300 p-2">Mahasiswa</td>
                                    <td class="border border-gray-300 p-2 text-center">Rp. 350.000</td>
                                    <td class="border border-gray-300 p-2 text-center">Rp. 400.000</td>
                                    <td class="border border-gray-300 p-2 text-center">-</td>
                                    <td class="border border-gray-300 p-2 text-center">Rp. 400.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 2. Tata Cara Pembayaran -->
                <div class="border border-gray-200 rounded overflow-hidden shadow-sm bg-white">
                    <button @click="active = (active === 2 ? 0 : 2)"
                        class="w-full flex items-center p-3 bg-[#1e88e5] text-white font-bold text-sm uppercase hover:bg-blue-700">
                        <span class="w-6 text-xl" x-text="active === 2 ? '-' : '+'"></span>
                        <span>Tata Cara Pembayaran</span>
                    </button>
                    <div x-show="active === 2" x-collapse class="p-6">
                        <p class="text-gray-700 text-sm mb-4">Pembayaran biaya pendaftaran dapat ditransfer melalui
                            rekening
                            :</p>
                        <table class="w-full md:w-2/3 border border-gray-200 text-sm mb-6">
                            <tbody>
                                <tr>
                                    <td class="border border-gray-200 p-3 bg-gray-50 font-semibold w-1/3 text-gray-600">
                                        Nama
                                        Bank</td>
                                    <td class="border border-gray-200 p-3">Bank Rakyat Indonesia (BRI)</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-200 p-3 bg-gray-50 font-semibold text-gray-600">Nomor
                                        Rekening</td>
                                    <td class="border border-gray-200 p-3 font-mono">008801001366304</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-200 p-3 bg-gray-50 font-semibold text-gray-600">Pemilik
                                        Rekening</td>
                                    <td class="border border-gray-200 p-3">Penerimaan Undiksha</td>
                                </tr>
                                <tr>
                                    <td class="border border-gray-200 p-3 bg-gray-50 font-semibold text-gray-600">Pesan
                                        Transaksi</td>
                                    <td class="border border-gray-200 p-3 text-blue-600 italic">email-aktif-peserta</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-xs text-gray-600 leading-relaxed">
                            <p class="font-bold mb-1">Sebagai catatan:</p>
                            <ol class="list-decimal pl-5 space-y-1">
                                <li>Bukti transfer wajib dikirim ke panitia pendaftaran.</li>
                                <li>Pembayaran biaya pendaftaran tidak dapat dilakukan terpisah dalam 1 (satu)
                                    Perkumpulan/Klub <span class="font-bold">(dibayarkan secara bersamaan)</span>.</li>
                                <li><span class="font-bold">Peserta otomatis dicoret</span> apabila belum melakukan
                                    pelunasan administrasi sebelum penutupan.</li>
                                <li>Uang pendaftaran tidak dapat dikembalikan.</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- 3. Ketentuan Peserta -->
                <div class="border border-gray-200 rounded overflow-hidden shadow-sm bg-white">
                    <button @click="active = (active === 3 ? 0 : 3)"
                        class="w-full flex items-center p-3 bg-[#1e88e5] text-white font-bold text-sm uppercase hover:bg-blue-700">
                        <span class="w-6 text-xl" x-text="active === 3 ? '-' : '+'"></span>
                        <span>Ketentuan Peserta</span>
                    </button>
                    <div x-show="active === 3" x-collapse class="p-6 text-sm text-gray-700">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <h4 class="font-bold text-[#003366] mb-2">Kategori Kelompok Umur</h4>
                                <ul class="list-decimal pl-5 space-y-1">
                                    <li>Perkumpulan/Klub yang ada di Indonesia</li>
                                    <li>Pelatprov/Pelatkab/SKO/PPOP</li>
                                    <li>Atlet Pelatnas tidak diperbolehkan ikut serta</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#003366] mb-2">Kategori Mahasiswa</h4>
                                <ul class="list-decimal pl-5 space-y-1">
                                    <li>Mahasiswa aktif D3/D4 atau S1 terdaftar di PDDikti</li>
                                    <li>Usia maksimal 23 Tahun per Oktober 2024</li>
                                    <li>Melampirkan KTM, KRS/KHS terakhir</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Footer Notice Merah -->
            <div class="mt-12 bg-[#c0392b] text-white p-6 text-center text-xs leading-relaxed rounded shadow-md">
                Pendaftaran kategori kelompok umur dilakukan oleh perkumpulan/klub secara Online pada sistem informasi PBSI
                melalui website: <br>
                <a href="https://unibabwi.ac.id"
                    class="underline font-bold hover:text-gray-200 block mt-2 text-sm">https://unibabwi.ac.id</a>
                <p class="mt-2">Khusus calon peserta yang belum memiliki akun SI PBSI dapat mendaftar melalui form di
                    bawah.</p>
            </div>

        </div>
    </section>

    {{-- Pastikan Alpine.js terpasang --}}
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
