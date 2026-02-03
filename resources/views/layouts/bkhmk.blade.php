<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BKHMK</title>
    <link rel="shortcut icon" href="/logo.png" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Icon Boxicons (Jika digunakan di tempat lain) --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f5f5fe',
                            100: '#ebebfd',
                            200: '#d6d6fb',
                            300: '#b5b4f8',
                            400: '#8f8df3',
                            500: '#5D5CDE',
                            600: '#4a49c5',
                            700: '#3a39a4',
                            800: '#2e2d82',
                            900: '#252465',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Styling khusus yang tidak bisa ditangani Tailwind (misalnya float animation) */
        #loadingScreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        #loadingScreen.hidden-loader {
            opacity: 0;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #5D5CDE 0%, #8f8df3 100%);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .submenu-level2 {
            left: 100%;
            /* Posisi awal di kanan elemen induknya */
            top: 0;
            /* Z-index sudah diatur di HTML, pastikan ini lebih tinggi dari menu utama */
        }

        /* Memastikan submenu Level 3 tetap terlihat saat kursor berada di Level 2 (parent-hover) */
        .group-hover\/ukm:hover>.submenu-level2,
        .group-hover\/hima:hover>.submenu-level2 {
            opacity: 1 !important;
            visibility: visible !important;
            display: block;
            /* Penting: Override display: none/invisible */
        }
    </style>
</head>

<body class="font-sans antialiased">
    <!-- Loading Screen -->
    <div id="loadingScreen">
        <div class="text-center">
            <svg class="animate-spin h-12 w-12 text-primary-500 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
            </svg>
            <p class="text-gray-700">Loading...</p>
        </div>
    </div>
    <div id="contentContainer" class="min-h-screen bg-gray-100 hidden">


        <!-- Navigation Bar (Perbaikan Responsif di sini) -->
        <nav class="bg-white shadow-md sticky top-0 z-50 transition-colors duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">

                    {{-- BAGIAN KIRI: Logo dan Menu Utama --}}
                    <div class="flex items-center">

                        {{-- Logo/Brand --}}
                        <div class="flex-shrink-0 mr-4 md:mr-8">
                            <a href="/">
                                <img class="h-10 w-auto" src="/logo.png" alt="BKHMK Logo">
                            </a>
                        </div>

                        {{-- Menu Utama (Desktop) --}}
                        <div class="hidden md:flex items-center space-x-2 lg:space-x-6 h-full">

                            <!-- 1. Humas & Kerja Sama -->
                            <a href="/humas-kerjasama"
                                class="text-gray-700 hover:text-primary-500 px-2 py-5 border-b-2 border-transparent hover:border-primary-500 text-sm font-medium transition">
                                Humas & Kerja Sama
                            </a>

                            <!-- 2. Ormawa & Prestasi (Tautan Langsung) -->
                            <a href="/galeri-organisasi"
                                class="text-gray-700 hover:text-primary-500 px-2 py-5 border-b-2 border-transparent hover:border-primary-500 text-sm font-medium transition">
                                Ormawa
                            </a>
                            <a href="/prestasi-mahasiswa"
                                class="text-gray-700 hover:text-primary-500 px-2 py-5 border-b-2 border-transparent hover:border-primary-500 text-sm font-medium transition">
                                Prestasi Mahasiswa
                            </a>
                            <a href="/dashboard-mahasiswa"
                                class="text-gray-700 hover:text-primary-500 px-2 py-5 border-b-2 border-transparent hover:border-primary-500 text-sm font-medium transition hidden lg:block">
                                Alumni (Tracer Study)
                            </a>

                            {{-- 3. Kemahasiswaan & Alumni (Dropdown Level 1) --}}
                            <div class="relative group h-full flex items-center">
                                <button
                                    class="text-gray-700 hover:text-primary-500 px-2 py-5 border-b-2 border-transparent hover:border-primary-500 text-sm font-medium transition flex items-center">
                                    UKM & Himpunan
                                    <!-- SVG Arrow -->
                                </button>

                                <!-- Dropdown Content (LEVEL 1: UKM & HIMA) -->
                                <div
                                    class="absolute left-0 mt-0 w-64 origin-top-left bg-white border border-gray-200 shadow-xl rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300 z-50 mt-9">
                                    <div class="py-1">

                                        <!-- UKM Submenu (LEVEL 2 - Menu Hover) -->
                                        <div class="relative group/ukm">
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex justify-between items-center">
                                                UKM
                                                <!-- SVG Arrow -->
                                            </a>
                                            <!-- SUBMENU LEVEL 3 (Di samping) -->
                                            <div
                                                class="absolute left-full top-0 ml-2 mt-0 w-48 bg-white border border-gray-200 shadow-xl rounded-md opacity-0 invisible group-hover/ukm:opacity-100 group-hover/ukm:visible transition duration-200 z-50 submenu-level2">
                                                <div class="py-1">
                                                    @foreach (['Pramuka', 'Musik', 'Teater', 'Mapala', 'PSHT', 'Bola Voli', 'Bulu Tangkis', 'Futsal Massage', 'Ristek', 'Kerohanian'] as $ukm)
                                                        <a href="galeri-organisasi#ukm"
                                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ $ukm }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <!-- HIMPUNAN MAHASISWA (LEVEL 2 - Menu Hover) -->
                                        <div class="relative group/hima mt-1">
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex justify-between items-center">
                                                HIMPUNAN MAHASISWA
                                                <!-- SVG Arrow -->
                                            </a>
                                            {{-- LEVEL 3 (Side Menu) --}}
                                            <div
                                                class="absolute left-full top-0 ml-2 mt-0 w-48 bg-white border border-gray-200 shadow-xl rounded-md opacity-0 invisible group-hover/hima:opacity-100 group-hover/hima:visible transition duration-200 z-50 submenu-level2">
                                                <div class="py-1">
                                                    @foreach (['Himapora', 'ESA', 'Himatika', 'Himabikon', 'Himapijar', 'Himabioevergreen', 'HMM', 'HM Elektro', 'Himagihasta', 'Himariestech', 'Hima PPKN', 'HimaKi'] as $hima)
                                                        <a href="galeri-organisasi#himpunan"
                                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ $hima }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 4. Layanan Karir & Kesehatan -->

                            <a href="/layanan-karir-kesehatan"
                                class="text-gray-700 hover:text-primary-500 px-2 py-5 border-b-2 border-transparent hover:border-primary-500 text-sm font-medium transition">
                                Layanan karir dan layanan kesehatan
                            </a>
                        </div>
                    </div>

                    {{-- BAGIAN KANAN: Aksi (Ikon & PMB) --}}
                    <div class="flex items-center space-x-3">

                        <!-- Ikon Mobile/Device (Placeholder) -->
                        <button class="p-2 rounded-lg text-gray-500 hover:text-primary-500 hidden sm:block">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </button>

                        <a href="https://pmb.unibabwi.ac.id"
                            class="px-3 py-2 bg-green-500 text-white font-bold text-sm rounded-lg hover:bg-green-600 transition duration-200 shadow-md">
                            PMB
                        </a>

                        <!-- Mobile Menu Button -->
                        <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Dropdown (Diperbaiki agar lebih rapi) -->
            <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="/humas-kerjasama"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">Humas
                        & Kerja Sama</a>

                    <a href="/galeri-organisasi"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">Ormawa</a>

                    <a href="/prestasi-mahasiswa"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">Prestasi
                        Mahasiswa</a>

                    <a href="/dashboard-mahasiswa"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">Alumni
                        (Tracer Study)</a>

                    {{-- Dropdown Mobile untuk UKM & HIMA --}}
                    <div class="pt-2 border-t border-gray-200 mt-2">
                        <button id="mobile-ukm-btn"
                            class="w-full text-left px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 flex justify-between items-center">
                            <span>UKM & Himpunan</span>
                            <svg class="w-4 h-4 transition-transform duration-200 transform" id="mobile-ukm-arrow"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="mobile-ukm-submenu"
                            class="hidden pl-3 pt-1 space-y-1 border-l-2 border-primary-300 ml-2">
                            <p class="px-3 py-1 text-sm font-semibold text-gray-500">UKM</p>
                            @foreach (['Pramuka', 'Musik', 'Teater', 'Mapala', 'PSHT', 'Bola Voli', 'Bulu Tangkis', 'Futsal Massage', 'Ristek', 'Kerohanian'] as $ukm)
                                <a href="galeri-organisasi#ukm"
                                    class="block px-3 py-1 text-sm text-gray-600 hover:bg-gray-100">{{ $ukm }}</a>
                            @endforeach
                            <p class="px-3 py-1 text-sm font-semibold text-gray-500 mt-2">HIMPUNAN</p>
                            @foreach (['Himapora', 'ESA', 'Himatika', 'Himabikon', 'Himapijar', 'Himabioevergreen', 'HMM', 'HM Elektro', 'Himagihasta', 'Himariestech', 'Hima PPKN', 'HimaKi'] as $hima)
                                <a href="galeri-organisasi#himpunan"
                                    class="block px-3 py-1 text-sm text-gray-600 hover:bg-gray-100">{{ $hima }}</a>
                            @endforeach
                        </div>
                    </div>

                    <a href="/layanan-karir-kesehatan"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-100">Layanan
                        karir dan layanan kesehatan</a>

                    <a href="https://pmb.unibabwi.ac.id"
                        class="block px-3 py-2 rounded-md text-base font-medium text-white bg-green-500 hover:bg-green-600 text-center mt-2">PMB</a>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content (Gunakan kembali kode galeri yang sudah diperbaiki) -->
        <main>
            <div class="pt-4">
                {{-- CONTENT DARI HALAMAN GALERI ANDA DI SINI --}}
                @yield('content')
            </div>
        </main>

        <!-- Footer (Tetap sama, tapi pastikan menggunakan Tailwind) -->
        <footer class="bg-gray-900 text-gray-300 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18c1.747 0 3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white font-bold">BKHMK</h3>
                                <p class="text-xs text-gray-400">Universitas PGRI Banyuwangi</p>
                            </div>
                        </div>
                        <p class="text-sm">Membangun masa depan melalui kerjasama, komunikasi, dan pemberdayaan.</p>
                    </div>

                    <div>
                        <h4 class="text-white font-bold mb-4">Link Cepat</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#tentang" class="hover:text-primary-400 transition-colors">Tentang Kami</a>
                            </li>
                            <li><a href="#layanan" class="hover:text-primary-400 transition-colors">Layanan</a></li>
                            <li><a href="#program" class="hover:text-primary-400 transition-colors">Program</a></li>
                            <li><a href="#berita" class="hover:text-primary-400 transition-colors">Berita</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-white font-bold mb-4">Layanan</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="hover:text-primary-400 transition-colors">Kerjasama
                                    Institusi</a>
                            </li>
                            <li><a href="#" class="hover:text-primary-400 transition-colors">Pembinaan
                                    Mahasiswa</a>
                            </li>
                            <li><a href="#" class="hover:text-primary-400 transition-colors">Jaringan Alumni</a>
                            </li>
                            <li><a href="#" class="hover:text-primary-400 transition-colors">Career
                                    Development</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-white font-bold mb-4">Newsletter</h4>
                        <p class="text-sm mb-4">Dapatkan update terbaru langsung ke email Anda.</p>
                        <form class="flex" id="newsletterForm">
                            <input type="email" placeholder="Email Anda"
                                class="flex-1 px-4 py-2 text-base bg-gray-800 border border-gray-700 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-white">
                            <button type="submit"
                                class="px-4 py-2 gradient-bg text-white rounded-r-lg hover:opacity-90 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                    <p class="text-sm text-gray-400 mb-4 md:mb-0">
                        &copy; 2024 Biro Kerjasama, Humas, dan Kemahasiswaan. All rights reserved.
                    </p>
                    <div class="flex space-x-6 text-sm">
                        <a href="#" class="hover:text-primary-400 transition-colors">Kebijakan Privasi</a>
                        <a href="#" class="hover:text-primary-400 transition-colors">Syarat & Ketentuan</a>
                        <a href="#" class="hover:text-primary-400 transition-colors">Sitemap</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Back to Top Button -->
        <button id="backToTop"
            class="fixed bottom-8 right-8 w-12 h-12 gradient-bg text-white rounded-full shadow-lg opacity-0 pointer-events-none transition-all hover:scale-110 z-40">
            <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
        </button>

    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // 1. Loading Screen
            setTimeout(function() {
                const loadingScreen = document.getElementById('loadingScreen');
                const contentContainer = document.getElementById('contentContainer');
                loadingScreen.classList.add('hidden-loader');
                setTimeout(function() {
                    loadingScreen.style.display = 'none';
                    contentContainer.classList.remove('hidden');
                }, 500);
            }, 1500);

            // 2. Mobile Menu Toggle (Diperbaiki)
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileUkmBtn = document.getElementById('mobile-ukm-btn');
            const mobileUkmSubmenu = document.getElementById('mobile-ukm-submenu');
            const mobileUkmArrow = document.getElementById('mobile-ukm-arrow');

            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Toggle submenu UKM/HIMA di mobile
            if (mobileUkmBtn) {
                mobileUkmBtn.addEventListener('click', () => {
                    mobileUkmSubmenu.classList.toggle('hidden');
                    mobileUkmArrow.classList.toggle('rotate-180');
                });
            }

            // 3. Smooth Scrolling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        const offset = 64; // Height of fixed navbar
                        const targetPosition = target.offsetTop - offset;
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // 4. Back to top button
            const backToTopBtn = document.getElementById('backToTop');
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 300) {
                    backToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
                    backToTopBtn.classList.add('opacity-100');
                } else {
                    backToTopBtn.classList.add('opacity-0', 'pointer-events-none');
                }
            });

            backToTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // 5. Form Submissions (Placeholder)
            // (Form submission JS tetap dipertahankan seperti sebelumnya)
            const newsletterForm = document.getElementById('newsletterForm');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    // Logika sukses popup (dibuat sangat sederhana di sini)
                    alert("Berlangganan berhasil (simulasi)!");
                    newsletterForm.reset();
                });
            }
        });
    </script>
</body>

</html>
