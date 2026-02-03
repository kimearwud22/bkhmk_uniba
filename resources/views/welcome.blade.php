@extends('layouts.bkhmk')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Beranda - Biro Kerjasama, Humas, Mahasiswa & Alumni
    </h2>
@endsection

@section('content')
    <!-- Hero Section -->
    <section id="beranda" class="pt-20 min-h-screen flex items-center gradient-bg relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 w-64 h-64 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10 w-full">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="text-white">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                        Biro Kerjasama, Humas dan Kemahasiswaan
                    </h1>
                    <p class="text-lg md:text-xl mb-8 text-white/90">
                        Membangun jembatan kerjasama, menjalin komunikasi, dan memberdayakan mahasiswa serta alumni untuk
                        masa depan yang lebih cerah.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#layanan"
                            class="px-8 py-3 bg-white text-primary-600 font-semibold rounded-lg hover:bg-gray-100 transition-all transform hover:scale-105">
                            Layanan Kami
                        </a>
                        <a href="#kontak"
                            class="px-8 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white/10 transition-all">
                            Hubungi Kami
                        </a>
                    </div>
                </div>

                <div class="hidden md:block relative">
                    <div class="float-animation">
                        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 border border-white/20">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="text-center">
                                    <div class="text-4xl font-bold mb-2">100+</div>
                                    <div class="text-sm text-white/80">Mitra Kerjasama</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-4xl font-bold mb-2">10K+</div>
                                    <div class="text-sm text-white/80">Alumni Aktif</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-4xl font-bold mb-2">50+</div>
                                    <div class="text-sm text-white/80">Program Tahunan</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-4xl font-bold mb-2">15+</div>
                                    <div class="text-sm text-white/80">Tahun Pengalaman</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Tentang BKHMK</h2>
                <div class="section-divider w-24 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                    Biro Kerjasama, Humas, dan Kemahasiswaan merupakan unit yang menghubungkan universitas dengan dunia
                    luar melalui kerjasama strategis dan pemberdayaan mahasiswa.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-900 rounded-xl p-8 shadow-lg hover-lift">
                    <div class="w-16 h-16 gradient-bg rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Visi</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Menjadi biro yang profesional, inovatif, dan berdaya saing dalam memperkuat citra, kemitraan, serta
                        kontribusi sivitas akademika dan alumni untuk mewujudkan Universitas yang Unggul di Jawa Timur tahun
                        2028.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-900 rounded-xl p-8 shadow-lg hover-lift">
                    <div class="w-16 h-16 gradient-bg rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Misi Bidang Kerjasama dan Humas</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        * Membangun dan memperluas jejaring kemitraan strategis dengan lembaga pemerintah, dunia industri,
                        dan institusi pendidikan di tingkat nasional maupun internasional. <br>
                        * Mengembangkan program kolaboratif yang mendukung pelaksanaan Tri Dharma Perguruan Tinggi secara
                        efektif dan berkelanjutan. <br>
                        * Meningkatkan citra positif dan reputasi universitas melalui strategi komunikasi publik yang
                        informatif, kreatif, dan berbasis digital. <br>
                        * Membangun sistem informasi dan publikasi yang transparan dan terintegrasi sebagai wujud tata
                        kelola universitas berbasis budaya mutu.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-900 rounded-xl p-8 shadow-lg hover-lift">
                    <div class="w-16 h-16 gradient-bg rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Misi Kemahasiswaan </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        * Mengembangkan potensi, prestasi, dan karakter mahasiswa melalui kegiatan yang inovatif, inklusif,
                        dan berorientasi pada keunggulan. <br>
                        * Menyelenggarakan pembinaan kemahasiswaan yang mendukung terciptanya lulusan yang unggul, berdaya
                        saing, dan berjiwa kepemimpinan. <br>
                        * Memperkuat jejaring dan kontribusi alumni dalam pengembangan universitas dan peningkatan daya
                        saing lulusan. <br>
                        * Mendorong kolaborasi alumni dengan mahasiswa dan stakeholder untuk mendukung kegiatan akademik,
                        penelitian, dan pengabdian masyarakat.

                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="layanan" class="py-20 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Layanan Kami</h2>
                <div class="section-divider w-24 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                    Kami menyediakan berbagai layanan untuk mendukung pengembangan mahasiswa, alumni, dan kerjasama
                    institusi.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="group bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover-lift cursor-pointer border-2 border-transparent hover:border-primary-500">
                    <div
                        class="w-14 h-14 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Kerjasama Institusi</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Fasilitasi kerjasama dengan institusi dalam dan luar
                        negeri</p>
                </div>

                <div
                    class="group bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover-lift cursor-pointer border-2 border-transparent hover:border-primary-500">
                    <div
                        class="w-14 h-14 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Publikasi & Media</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Pengelolaan publikasi dan hubungan media
                        universitas</p>
                </div>

                <div
                    class="group bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover-lift cursor-pointer border-2 border-transparent hover:border-primary-500">
                    <div
                        class="w-14 h-14 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Pembinaan Mahasiswa</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Program pengembangan soft skill dan leadership</p>
                </div>

                <div
                    class="group bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover-lift cursor-pointer border-2 border-transparent hover:border-primary-500">
                    <div
                        class="w-14 h-14 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Jaringan Alumni</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Membangun dan mengelola komunitas alumni</p>
                </div>

                <div
                    class="group bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover-lift cursor-pointer border-2 border-transparent hover:border-primary-500">
                    <div
                        class="w-14 h-14 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Inovasi & Riset</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Mendorong kolaborasi riset dan inovasi</p>
                </div>

                <div
                    class="group bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover-lift cursor-pointer border-2 border-transparent hover:border-primary-500">
                    <div
                        class="w-14 h-14 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Program Internasional</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Student exchange dan program mobilitas</p>
                </div>

                <div
                    class="group bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover-lift cursor-pointer border-2 border-transparent hover:border-primary-500">
                    <div
                        class="w-14 h-14 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Event & Seminar</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Penyelenggaraan acara dan kegiatan kampus</p>
                </div>

                <div
                    class="group bg-gray-50 dark:bg-gray-800 rounded-xl p-6 hover-lift cursor-pointer border-2 border-transparent hover:border-primary-500">
                    <div
                        class="w-14 h-14 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Career Development</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Bimbingan karir dan job placement</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="program" class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Program Unggulan</h2>
                <div class="section-divider w-24 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                    Program-program strategis yang dirancang untuk mengembangkan potensi mahasiswa dan memperkuat jaringan
                    alumni.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-900 rounded-xl overflow-hidden shadow-lg hover-lift">
                    <div class="h-48 gradient-bg flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3">Magang Industri</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Program magang di perusahaan mitra untuk memberikan pengalaman kerja nyata kepada mahasiswa.
                        </p>
                        <div class="flex items-center text-primary-600 dark:text-primary-400 font-semibold text-sm">
                            Pelajari lebih lanjut
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-900 rounded-xl overflow-hidden shadow-lg hover-lift">
                    <div class="h-48 bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3">Mentoring Alumni</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Bimbingan dari alumni sukses untuk membantu mahasiswa merencanakan karir dan pengembangan diri.
                        </p>
                        <div class="flex items-center text-primary-600 dark:text-primary-400 font-semibold text-sm">
                            Pelajari lebih lanjut
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-900 rounded-xl overflow-hidden shadow-lg hover-lift">
                    <div class="h-48 bg-gradient-to-br from-green-500 to-teal-500 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3">Student Exchange</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Kesempatan belajar di universitas mitra luar negeri untuk memperluas wawasan global.
                        </p>
                        <div class="flex items-center text-primary-600 dark:text-primary-400 font-semibold text-sm">
                            Pelajari lebih lanjut
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-900 rounded-xl overflow-hidden shadow-lg hover-lift">
                    <div class="h-48 bg-gradient-to-br from-orange-500 to-red-500 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3">Alumni Networking</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Acara rutin untuk mempertemukan alumni dari berbagai angkatan dan membangun jejaring
                            profesional.
                        </p>
                        <div class="flex items-center text-primary-600 dark:text-primary-400 font-semibold text-sm">
                            Pelajari lebih lanjut
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-900 rounded-xl overflow-hidden shadow-lg hover-lift">
                    <div class="h-48 bg-gradient-to-br from-blue-500 to-indigo-500 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3">Workshop & Pelatihan</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Serangkaian workshop untuk meningkatkan kompetensi mahasiswa dalam berbagai bidang.
                        </p>
                        <div class="flex items-center text-primary-600 dark:text-primary-400 font-semibold text-sm">
                            Pelajari lebih lanjut
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-900 rounded-xl overflow-hidden shadow-lg hover-lift">
                    <div class="h-48 bg-gradient-to-br from-yellow-500 to-orange-500 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3">Job Fair</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Bursa kerja yang menghadirkan perusahaan-perusahaan terkemuka untuk merekrut lulusan terbaik.
                        </p>
                        <div class="flex items-center text-primary-600 dark:text-primary-400 font-semibold text-sm">
                            Pelajari lebih lanjut
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    {{-- <section id="berita" class="py-20 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Berita & Kegiatan</h2>
                <div class="section-divider w-24 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                    Informasi terkini seputar kegiatan, prestasi, dan kerjasama yang dilakukan oleh BKHMK.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <article class="bg-gray-50 dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg hover-lift">
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                        <div class="text-center text-white">
                            <div class="text-4xl font-bold">15</div>
                            <div class="text-sm">DES 2024</div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-xs text-primary-600 dark:text-primary-400 font-semibold mb-2">KERJASAMA</div>
                        <h3 class="text-lg font-bold mb-3">MoU dengan Universitas Terkemuka di Jepang</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Penandatanganan MoU dengan Tokyo University untuk program pertukaran mahasiswa dan penelitian
                            kolaboratif.
                        </p>
                        <a href="#"
                            class="text-primary-600 dark:text-primary-400 font-semibold text-sm inline-flex items-center">
                            Baca selengkapnya
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </article>

                <article class="bg-gray-50 dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg hover-lift">
                    <div class="h-48 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                        <div class="text-center text-white">
                            <div class="text-4xl font-bold">10</div>
                            <div class="text-sm">DES 2024</div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-xs text-primary-600 dark:text-primary-400 font-semibold mb-2">ALUMNI</div>
                        <h3 class="text-lg font-bold mb-3">Reuni Akbar Alumni 2024 Sukses Digelar</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Lebih dari 500 alumni dari berbagai angkatan hadir dalam acara reuni yang penuh kehangatan dan
                            nostalgia.
                        </p>
                        <a href="#"
                            class="text-primary-600 dark:text-primary-400 font-semibold text-sm inline-flex items-center">
                            Baca selengkapnya
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </article>

                <article class="bg-gray-50 dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg hover-lift">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                        <div class="text-center text-white">
                            <div class="text-4xl font-bold">5</div>
                            <div class="text-sm">DES 2024</div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-xs text-primary-600 dark:text-primary-400 font-semibold mb-2">MAHASISWA</div>
                        <h3 class="text-lg font-bold mb-3">Workshop Leadership untuk Ketua Organisasi</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Pelatihan kepemimpinan diikuti 100 ketua organisasi mahasiswa untuk meningkatkan kapasitas
                            organisasi.
                        </p>
                        <a href="#"
                            class="text-primary-600 dark:text-primary-400 font-semibold text-sm inline-flex items-center">
                            Baca selengkapnya
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </article>
            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="inline-flex items-center px-8 py-3 bg-primary-600 text-white font-semibold rounded-lg hover:bg-primary-700 transition-colors">
                    Lihat Semua Berita
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section> --}}

    <!-- Contact Section -->
    <section id="kontak" class="py-20 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Hubungi Kami</h2>
                <div class="section-divider w-24 mx-auto mb-6"></div>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                    Kami siap membantu Anda. Jangan ragu untuk menghubungi kami melalui berbagai saluran komunikasi.
                </p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8 mb-12">
                <div class="bg-white dark:bg-gray-900 rounded-xl p-8 text-center shadow-lg hover-lift">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Email</h3>
                    <p class="text-gray-600 dark:text-gray-400">unibahumas@gmail.com </p>
                </div>

                <div class="bg-white dark:bg-gray-900 rounded-xl p-8 text-center shadow-lg hover-lift">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Telepon Kerjasama dan Humas</h3>
                    <p class="text-gray-600 dark:text-gray-400">0897-0503-772</p>
                    <h3 class="text-lg font-bold mb-2">Telepon Kemahasiswaan dan Alumni</h3>
                    <p class="text-gray-600 dark:text-gray-400">0813-3982-5567</p>
                </div>

                <div class="bg-white dark:bg-gray-900 rounded-xl p-8 text-center shadow-lg hover-lift">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Alamat</h3>
                    <p class="text-gray-600 dark:text-gray-400">Jl. Ikan Tongkol No.22, Kertosari, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68416</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg overflow-hidden">
                <div class="grid lg:grid-cols-2">
                    <div class="p-8 lg:p-12">
                        <h3 class="text-2xl font-bold mb-6">Kirim Pesan</h3>
                        <form class="space-y-6" id="contactForm">
                            <div>
                                <label class="block text-sm font-semibold mb-2">Nama Lengkap</label>
                                <input type="text"
                                    class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800 focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all"
                                    placeholder="Masukkan nama Anda">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2">Email</label>
                                <input type="email"
                                    class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800 focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all"
                                    placeholder="nama@email.com">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2">Subjek</label>
                                <input type="text"
                                    class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800 focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all"
                                    placeholder="Topik pesan Anda">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2">Pesan</label>
                                <textarea rows="4"
                                    class="w-full px-4 py-3 text-base border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800 focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all resize-none"
                                    placeholder="Tulis pesan Anda di sini..."></textarea>
                            </div>
                            <button type="submit"
                                class="w-full px-8 py-3 gradient-bg text-white font-semibold rounded-lg hover:opacity-90 transition-all transform hover:scale-105">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>

                    <div class="gradient-bg p-8 lg:p-12 text-white flex items-center">
                        <div>
                            <h3 class="text-2xl font-bold mb-6">Jam Operasional</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <svg class="w-6 h-6 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <p class="font-semibold">Senin - Jumat</p>
                                        <p class="text-white/80">08:00 - 16:00 WIB</p>
                                    </div>
                                </div>
                                {{-- <div class="flex items-start">
                                    <svg class="w-6 h-6 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <p class="font-semibold">Sabtu</p>
                                        <p class="text-white/80">08:00 - 12:00 WIB</p>
                                    </div>
                                </div> --}}
                                <div class="flex items-start">
                                    <svg class="w-6 h-6 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <div>
                                        <p class="font-semibold">Sabtu, Minggu & Libur Nasional</p>
                                        <p class="text-white/80">Tutup</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8 pt-8 border-t border-white/20">
                                <h4 class="font-semibold mb-4">Ikuti Kami</h4>
                                <div class="flex space-x-4">
                                    <a href="#"
                                        class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                        </svg>
                                    </a>
                                    <a href="#"
                                        class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                        </svg>
                                    </a>
                                    <a href="#"
                                        class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                                        </svg>
                                    </a>
                                    </li>
                                    <a href="#"
                                        class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                        </svg>
                                    </a>
                                    <a href="#"
                                        class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                                        </svg>
                                    </a>
                                    </li>
                                    <a href="#"
                                        class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-all">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                                        </svg>
                                    </a>
                                    </li>
                                    
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
