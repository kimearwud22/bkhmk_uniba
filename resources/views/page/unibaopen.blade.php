@extends('layouts.bkhmk')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Pendaftaran Uniba Open - Universitas PGRI Banyuwangi
    </h2>
@endsection

@section('content')
    <div class="bg-[#1a2b3c] py-10 px-4 w-full shadow-inner">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-3xl font-bold text-white mb-3">PENDAFTARAN KEJUARAAN BULUTANGKIS UNIBA BADMINTON CHAMPIONSHIP I
                2026</h1>

            {{-- Breadcrumb --}}
            <nav class="flex justify-center items-center text-sm text-gray-300 space-x-2">
                <a href="#" class="hover:text-white transition">Beranda</a>
                <span class="text-gray-500 font-bold">&rsaquo;</span>
                <a href="#" class="hover:text-white transition">Uniba </a>
                <span class="text-gray-500 font-bold">&rsaquo;</span>
                <span class="text-white font-medium">PENDAFTARAN KEJUARAAN BULUTANGKIS UNIBA BADMINTON CHAMPIONSHIP I
                    2026</span>
            </nav>
        </div>
    </div>

    <section class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Mekanisme Title -->
            <div class="flex items-center justify-center mb-12">
                <div class="h-px bg-gray-300 flex-grow max-w-xs"></div>
                <h2 class="text-2xl font-semibold text-gray-800 px-6 text-center">Mekanisme, Syarat dan Peraturan</h2>
                <div class="h-px bg-gray-300 flex-grow max-w-xs"></div>
            </div>

            <!-- Alur Pendaftaran (3 Langkah) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="flex flex-col items-center text-center">
                    <div class="relative mb-6">
                        <div
                            class="w-36 h-36 bg-white rounded-full flex items-center justify-center shadow-lg border border-gray-100">
                            <svg class="w-16 h-16 text-[#003366]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                            </svg>
                        </div>
                        <span
                            class="absolute bottom-1 right-1 bg-[#001f3f] text-white w-8 h-8 rounded-full flex items-center justify-center font-bold text-lg">1</span>
                    </div>
                    <p class="text-sm font-medium text-gray-700 px-4">Peserta mencermati dan memilih jenis kejuaraan yang
                        diikuti</p>
                </div>

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
                    <p class="text-sm font-medium text-gray-700 px-4">Melakukan pembayaran sesuai tagihan biaya pendaftaran
                    </p>
                </div>

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
                    <p class="text-sm font-medium text-gray-700 px-4">Melakukan pendaftaran peserta dan konfirmasi
                        pembayaran</p>
                </div>
            </div>

            <!-- Bagian Accordion -->
            <div class="space-y-4" x-data="{ active: 1 }">

                <!-- 1. Biaya Pendaftaran -->
                <div class="border border-gray-200 rounded overflow-hidden shadow-sm bg-white">
                    <button @click="active = (active === 1 ? 0 : 1)"
                        class="w-full flex items-center p-3 bg-[#1e88e5] text-white font-bold text-sm uppercase hover:bg-blue-700">
                        <span class="w-6 text-xl" x-text="active === 1 ? '-' : '+'"></span>
                        <span>Biaya Pendaftaran</span>
                    </button>
                    <div x-show="active === 1" x-collapse class="p-6 overflow-x-auto">

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
                                    <td class="border border-gray-300 p-2 text-center">Rp. 150.000</td>
                                    <td class="border border-gray-300 p-2 text-center">-</td>
                                    <td class="border border-gray-300 p-2 text-center">-</td>
                                    <td class="border border-gray-300 p-2 text-center">-</td>
                                </tr>
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="border border-gray-300 p-2 text-center">2</td>
                                    <td class="border border-gray-300 p-2">Usia Dini</td>
                                    <td class="border border-gray-300 p-2 text-center">Rp. 150.000</td>
                                    <td class="border border-gray-300 p-2 text-center">-</td>
                                    <td class="border border-gray-300 p-2 text-center">-</td>
                                    <td class="border border-gray-300 p-2 text-center">-</td>
                                </tr>
                                {{-- ... tambahkan baris lainnya sesuai gambar ... --}}
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="border border-gray-300 p-2 text-center">3</td>
                                    <td class="border border-gray-300 p-2">Anak-Anak</td>
                                    <td class="border border-gray-300 p-2 text-center">Rp. 150.000</td>
                                    <td class="border border-gray-300 p-2 text-center">Rp. 200.000</td>
                                    <td class="border border-gray-300 p-2 text-center">Rp. 200.000</td>
                                    <td class="border border-gray-300 p-2 text-center">-</td>
                                </tr>
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="border border-gray-300 p-2 text-center">4</td>
                                    <td class="border border-gray-300 p-2">Pemula</td>
                                    <td class="border border-gray-300 p-2 text-center">Rp. 150.000</td>
                                    <td class="border border-gray-300 p-2 text-center">Rp. 200.000</td>
                                    <td class="border border-gray-300 p-2 text-center">Rp. 200.000</td>
                                    <td class="border border-gray-300 p-2 text-center">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 3. Waktu Pelaksanaan -->
                <div class="border border-gray-200 rounded overflow-hidden shadow-sm bg-white">
                    <button @click="active = (active === 2 ? 0 : 2)"
                        class="w-full flex items-center p-3 bg-[#1e88e5] text-white font-bold text-sm uppercase hover:bg-blue-700">
                        <span class="w-6 text-xl" x-text="active === 2 ? '-' : '+'"></span>
                        <span>Waktu dan Tempat Pelaksanaan</span>
                    </button>
                    <div x-show="active === 2" x-collapse class="p-6 text-sm text-gray-700 leading-relaxed">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-bold text-[#003366] mb-2 uppercase">Pendaftaran Peserta (Dengan mengisi
                                    formulir pendaftaran) </h4>
                                <ul class="list-disc pl-5 space-y-1">
                                    <li>Pendaftaran : 1 Februari – 14 April 2026</li>
                                    <li>Link Pendaftaran: </li>
                                    <li>Via Wa : 0819 9782 1084 (Rian)</li>
                                    <li>Rekening pendaftaran : Bank Jatim ( 00281123199 An Muhamad Dava Purnomo)</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#003366] mb-2 uppercase">Tehnical Metting</h4>
                                <p>Hari / Tanggal : 15 April 2026 <strong>Pukul : 08.00 WIB – selesai</strong> Tempat :
                                    Ruang B 8 & 9 Gedung B, Kampus UNIBA.</p>
                                <h4 class="font-bold text-[#003366] mt-4 mb-2 uppercase">Pelaksanaan Kejuaraan</h4>
                                <p>Hari / Tanggal : Sabtu – Rabu, 18-22 April 2026 <strong>Pukul : 08.00 WIB –
                                        selesai</strong>Tempat : AULA UNIBA, Jl. Ikan Tongkol, No 22, Kertosari, Banyuwangi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 2. Peraturan dan Sistem Pertandingan -->
                <div class="border border-gray-200 rounded overflow-hidden shadow-sm bg-white">
                    <button @click="active = (active === 3 ? 0 : 3)"
                        class="w-full flex items-center p-3 bg-[#1e88e5] text-white font-bold text-sm uppercase hover:bg-blue-700">
                        <span class="w-6 text-xl" x-text="active === 3 ? '-' : '+'"></span>
                        <span>Peraturan dan Sistem Pertandingan</span>
                    </button>
                    <div x-show="active === 3" x-collapse class="p-6 text-sm text-gray-700 leading-relaxed">
                        <ul class="list-disc pl-5 space-y-2">
                            <li>Peraturan pertandingan yang dipergunakan adalah peraturan PBSI/BWF.</li>
                            <li>Pemain yang harus bermain berturut-turut berhak mendapatkan istirahat 30 menit diantara dua
                                pertandingan.</li>
                            <li>Pemain yang dipanggil 3 (tiga) kali dalam waktu 10 (sepuluh) menit tidak memasuki lapangan
                                dinyatakan <strong>kalah/WO</strong>.</li>
                            <li>Jadwal dapat dimajukan atau mundur karena terjadi WO atau hal teknis lainnya.</li>
                            <li>Peserta wajib mengetahui jadwal dan tempat pertandingannya sendiri.</li>
                        </ul>
                    </div>
                </div>

                <!-- 3. Ketentuan Umum -->
                <div class="border border-gray-200 rounded overflow-hidden shadow-sm bg-white">
                    <button @click="active = (active === 4 ? 0 : 4)"
                        class="w-full flex items-center p-3 bg-[#1e88e5] text-white font-bold text-sm uppercase hover:bg-blue-700">
                        <span class="w-6 text-xl" x-text="active === 4 ? '-' : '+'"></span>
                        <span>Ketentuan Umum</span>
                    </button>
                    <div x-show="active === 4" x-collapse class="p-6 text-sm text-gray-700 leading-relaxed">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-bold text-[#003366] mb-2 uppercase">Peserta pertandingan</h4>
                                <p>- Peserta kejuaraan harus memenuhi persyaratan sebagai berikut :</p>
                                <ul class="list-disc pl-5 space-y-1">
                                    <li>Perkumpulan/klub yang ada di Indonesia.</li>
                                    <li>Atlet Pelatnas tidak diperbolehkan ikut serta.</li>
                                    <li>Membayar biaya pendaftaran.</li>
                                    <li>Pemain nomor ganda boleh berasal dari klub yang berbeda.</li>
                                    <li>Tiap peserta wajib membawa perlengkapan pertandingan sendiri.</li>
                                </ul>
                                <p class="mt-2">- Tiap peserta wajib membawa perlengkapan pertandingan sendiri.</p>
                                <p class="mt-2">- Panitia menyediakan 2 sutllecock pada tiap pertadingan,
                                    <strong>jika peserta menggunakan lebih dari dari 2 akan dikenakan biaya Rp. 14.000,
                                        -/</strong>cock.
                                </p>
                                <p class="mt-2">- Pelatih dan Tim Manager yang akan mendampingi Atlet dilapangan wajib
                                    mengikuti <strong>Technical Meeting</strong>.</p>
                            </div>
                            <div>
                                <p>- Pelatih & Tim Manager yang akan mendampingi atlet di lapangan
                                    <strong>wajib</strong> menggunakan celana panjang (bukan jeans) dan bersepatu.
                                </p>
                                <p>-Pelatih dan Tim Manager wajib mengikuti Technical Meeting. Saat mendampingi atlet di
                                    lapangan, wajib menggunakan <strong>celana panjang (bukan jeans) dan bersepatu</strong>.
                                </p>
                                <p class="mt-2">- Peserta dapat<strong> didiskualifikasi</strong> apabila:</p>
                                <ul class="list-disc pl-5 space-y-1">
                                    <li>Tidak terdaftar dalam formulir pendaftaran tim peserta.</li>
                                    <li>Melanggar peraturan/ketentuan yang telah ditetapkan oleh panitia sesuai hasil
                                        technical meeting.</li>
                                </ul>
                                <p>-Panitia hanya menyediakan pelayanan medis sebatas <strong>P3K pada saat
                                        pertandingan.</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. Ketentuan Pertandingan -->
                <div class="border border-gray-200 rounded overflow-hidden shadow-sm bg-white">
                    <button @click="active = (active === 5 ? 0 : 5)"
                        class="w-full flex items-center p-3 bg-[#1e88e5] text-white font-bold text-sm uppercase hover:bg-blue-700">
                        <span class="w-6 text-xl" x-text="active === 5 ? '-' : '+'"></span>
                        <span>Ketentuan Pertandingan</span>
                    </button>
                    <div x-show="active === 5" x-collapse class="p-6 text-sm text-gray-700 leading-relaxed">
                        <ol class="list-decimal pl-5 space-y-2">
                            <li>Setiap partai pertandingan berlaku The Best Of Three Games dan menggunanakan sistem rally
                                point.
                            </li>
                            <li>Pemanasan harus sudah dilakukan sebelum masuk lapangan supaya pertandingan sesuai dengan
                                alokasi waktu yang tersedia.</li>
                            <li>Waktu bertanding dalam jadwal menjadi dasar/pegangan dimulainya suatu pertandingan. Pada
                                kenyataan dalam pelaksanaannya kemungkinan pertandingan dipercepat/ditangguhkan karena
                                terjadi WO dan sebagainya, maka harus ada persetujuan kedua pihak yang akan bertanding
                                selanjutnya.</li>
                            <li>Pimpinan pertandingan berwenang memanfaatkan lapangan kosong untuk digunakan tempat
                                pertandingan pada partai lain yang perlu dipindahkan.</li>
                            <li>Para pemain yang akan bertanding menurut jadwalnya diwajibkan hadir ditempat pertandingan 30
                                (tiga puluh) menit sebelum pertandingan dimulai dan diwajibkan melapor kehadirannya kepada
                                pimpinan pertandingan.</li>
                            <li>Selama melakukan pertandingan, pemain tidak diperkenankan untuk:
                                <br>
                                a) Merusak/mengubah bentuk shuttlecocok sehingga dapat mempengaruhi keseimbangan jalannya
                                shuttlecock tersebut.
                                <br>
                                b) Mengulur-ulur waktu dengan berbagai cara. Jika peringatan pimpinan pertandingan (wasit)
                                terhadap ulah ini tidak diindahkan, pemain bersangkutan dapat dikenakan diskualifikasi dan
                                bersangkutan dinyatakan kalah. <br>
                                c) Pemain tidak diperkenankan meninggalkan lapangan tanpa seijin wasit/pimpinan
                                pertandingan.
                            </li>
                            <li>Selama pertandingan berlangsung diperkenankan mengadakan dialog dengan Pelatih saat
                                shuttlecock tidak dalam permainan dan tidak boleh keluar lapangan pertandingan. Waktu
                                setelah game pertama/kedua selesai diperbolehkan berdialog dengan pelatih selama 2 (dua)
                                menit dan pada interval setiap babak selama 40 detik.</li>
                            <li>Pemain yang mendapatkan cidera pada saat bertanding hanya diberikan tidak diperkenankan
                                melakukan treatment di lapangan. Jika tidak dapat menyelesaikan pertandingan, maka
                                dinyatakan kalah.</li>
                            <li>Peserta bertanggung jawab untuk mengetahui sendiri jadwal/tempat pertandingan, termasuk
                                adanya perubahan jadwal/tempat pertandingan.</li>
                            <li>Jika terjadi halangan/gangguan pada lapangan/gedung tempat pertandingan, maka keputusannya
                                berada pada Pimpinan Pertandingan.</li>
                            <li>Jika terjadi halangan/gangguan yang memerlukan waktu penanganan lebih dari 1 jam, Pimpinan
                                Pertandingan berhak menunda/ memindahkan pertandingan ke lapangan lain/ke hari lain dengan
                                ketentuan game yang telah sah, sedang game yang belum selesai akan diteruskan dari keadaan
                                dan skor yang terhenti..</li>
                        </ol>
                    </div>
                </div>

                <!-- 5. Wasit dan Ketentuan Wasit -->
                <div class="border border-gray-200 rounded overflow-hidden shadow-sm bg-white">
                    <button @click="active = (active === 6 ? 0 : 6)"
                        class="w-full flex items-center p-3 bg-[#1e88e5] text-white font-bold text-sm uppercase hover:bg-blue-700">
                        <span class="w-6 text-xl" x-text="active === 6 ? '-' : '+'"></span>
                        <span>Wasit dan Ketentuan Wasit</span>
                    </button>
                    <div x-show="active === 6" x-collapse class="p-6 text-sm text-gray-700 leading-relaxed">
                        <ul class="list-disc pl-5 space-y-2">
                            <li>Wasit / Hakim Garis yang memimpin pertandingan ditunjuk oleh Panitia
                                Pelaksana.
                            </li>
                            <li>Keputusan Wasit utama yang memimpin pertandingan bersifat mutlak dan tidak bisa di ubah oleh
                                siapapun, termasuk pengawas pertandingan dan panitia.</li>
                            <li>Wasit dapat menganulir keputusan Hakim Garis.</li>
                            <li>Wasit berhak memutuskan segala sesuatu yang menyangkut pertandingan dan keputusanya bersifat
                                final.</li>
                            <li>Pengawas pertandingan wajib mengusahakan wasit tidak boleh memihak kepada salah satu tim
                                yang bertanding.</li>
                            <li>Apabila terjadi sesuatu hal diluar kemampuan panitia sehingga pertandingan tidak dapat
                                dilanjutkan, maka pertandingan selanjutnya waktu akan ditentukan oleh panitia.</li>
                            <li>Ketentuan yang belum tercatat, dapat diselesaikan secara musyawarah dan mufakat.</li>
                        </ul>
                    </div>
                </div>

                <!-- 6. Ketentuan Protes -->
                <div class="border border-gray-200 rounded overflow-hidden shadow-sm bg-white">
                    <button @click="active = (active === 7 ? 0 : 7)"
                        class="w-full flex items-center p-3 bg-[#1e88e5] text-white font-bold text-sm uppercase hover:bg-blue-700">
                        <span class="w-6 text-xl" x-text="active === 7 ? '-' : '+'"></span>
                        <span>Ketentuan Protes</span>
                    </button>
                    <div x-show="active === 7" x-collapse class="p-6 text-sm text-gray-700 leading-relaxed">
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4">
                            <p class="font-bold text-yellow-800">Biaya Protes: Rp. 1.000.000,- (Satu Juta Rupiah) Tunai.
                            </p>
                        </div>
                        <ul class="list-disc pl-5 space-y-2">
                            <li>Protes diajukan secara tertulis oleh Manager/Pelatih kepada wasit.</li>
                            <li>Pihak pemprotes wajib memiliki data pembanding yang valid.</li>
                            <li>Protes dapat dilakukan paling lambat diajukan ke pimpinan pertandingan 15 menit sebelum pertandingan yang bersangkutan dimulai.</li>
                            <li>Jika pihak yang diprotes tidak dapat menunjukkan data bukti dalam waktu yang ditentukan,
                                akan dikenakan sanksi <strong>DISKUALIFIKASI</strong>.</li>
                                <li>Uang protes menjadi milik Panitia Pelaksana.</li>
                        </ul>
                    </div>
                </div>

                <!-- 7. Hadiah -->
                <div class="border border-gray-200 rounded overflow-hidden shadow-sm bg-white">
                    <button @click="active = (active === 8 ? 0 : 8)"
                        class="w-full flex items-center p-3 bg-[#1e88e5] text-white font-bold text-sm uppercase hover:bg-blue-700">
                        <span class="w-6 text-xl" x-text="active === 8 ? '-' : '+'"></span>
                        <span>Hadiah</span>
                    </button>
                    <div x-show="active === 8" x-collapse class="p-6 text-sm text-gray-700 font-medium">
                        Juara I, II dan III bersama (Tunggal Putra, Putri, Ganda Putra, Ganda Putri, dan Ganda Campuran)
                        akan mendapatkan:
                        <div class="flex flex-wrap gap-4 mt-3">
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full border border-green-200">Piagam
                                Penghargaan</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full border border-blue-200">Uang
                                Pembinaan</span>
                            <span
                                class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full border border-yellow-200">Piala
                                / Trophy</span>
                        </div>
                    </div>
                </div>

                <!-- 8. Lain-lain -->
                <div class="border border-gray-200 rounded overflow-hidden shadow-sm bg-white">
                    <button @click="active = (active === 9 ? 0 : 9)"
                        class="w-full flex items-center p-3 bg-[#1e88e5] text-white font-bold text-sm uppercase hover:bg-blue-700">
                        <span class="w-6 text-xl" x-text="active === 9 ? '-' : '+'"></span>
                        <span>Lain-Lain & Kontak</span>
                    </button>
                    <div x-show="active === 9" x-collapse class="p-6 text-sm text-gray-700">
                        <p class="mb-4">Hal-hal yang belum tercantum dalam teknis pertandingan akan dibahas pada saat
                            <strong>Technical Meeting</strong>.
                        </p>
                        <div class="bg-gray-50 p-4 rounded border border-gray-200">
                            <h4 class="font-bold mb-2">Contact Person:</h4>
                            <a href="https://wa.me/6281997821084"
                                class="text-blue-600 font-bold text-lg hover:underline">0819 9782 1084 (Rian)</a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Footer Notice Merah -->
            <div class="mt-12 bg-[#c0392b] text-white p-6 text-center text-xs leading-relaxed rounded shadow-md">
                Pendaftaran dapat dilakukan pada form yang telah disediakan :
                <a href="https://bit.ly/PendaftaranUBC2026"
                    class="underline font-bold hover:text-gray-200 block mt-2 text-sm text-lg">https://bit.ly/PendaftaranUBC2026</a>
            </div>

        </div>
    </section>

    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
