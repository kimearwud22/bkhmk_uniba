{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> --}}

<nav class="bg-white shadow-md border-b border-gray-100">
    <!-- Kontainer Utama Navigasi -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Bagian Kiri: Logo dan Nav Link Utama -->
            <div class="flex items-center">
                <!-- Logo Aplikasi -->
                <a href="#" class="text-2xl font-extrabold text-indigo-800 mr-10">
                    <img class="h-10 w-auto" src="/logo.png" alt="BKHMK Logo">
                </a>

                <!-- Navigasi Desktop Link -->
                <div class="hidden sm:flex sm:space-x-8">

                    {{-- Link Dashboard (Umum untuk semua yang login) --}}


                    {{-- LINK KHUSUS ADMIN DI NAVIGASI ATAS --}}
                    @if (Auth::check() && Auth::user()->role === 'user')
                    <x-nav-link :href="route('dashboard.user')" :active="request()->routeIs('dashboard.user')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('profile.user.edit')" :active="request()->routeIs('profile.user.edit')">
                            {{ __('Data Diri') }}
                        </x-nav-link>
                        <x-nav-link :href="route('questionnaire.show1')" :active="request()->routeIs('questionnaire.show1')">
                            {{ __('Form Quisoner') }}
                        </x-nav-link>
                    @endif
                    @if (Auth::check() && Auth::user()->role === 'user-admin')
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('gallery.index')" :active="request()->routeIs('gallery.index')">
                            {{ __('Manajemen Galeri') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.alumni.reports')" :active="request()->routeIs('admin.alumni.reports')">
                            {{ __('Report Alumni') }}
                        </x-nav-link>
                    @endif

                </div>
            </div>

            <!-- Bagian Kanan: User Info & Logout -->
            <div class="flex items-center space-x-4">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                @auth

                    <!-- Link Profile (Untuk Semua) -->
                    {{-- <a href="{{ route('profile.edit') }}"
                        class="text-sm font-medium text-gray-600 hover:text-indigo-600 transition duration-150 hidden sm:inline-block">
                        Profile
                    </a> --}}

                    <!-- Form Logout -->
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit"
                            class="text-sm font-medium text-gray-600 hover:text-red-600 transition duration-150 hidden sm:inline-block">
                            Log Out
                        </button>
                    </form>
                @else
                    {{-- Jika belum login (opsional, biasanya ada link Login/Register di sini) --}}
                @endauth

                <!-- Tombol Hamburger (Untuk Mobile) -->
                <div class="-mr-2 flex items-center sm:hidden" x-data="{ open: false }">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 transition duration-150 ease-in-out">
                        <!-- Icon Menu -->
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Navigasi Responsif (Mobile) -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1 border-t border-gray-200">

            {{-- Link Dashboard Mobile (Umum) --}}
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            {{-- LINK ADMIN MOBILE DI NAVIGASI UTAMA --}}
            @if (Auth::check() && Auth::user()->role === 'user-admin')
                <x-responsive-nav-link :href="route('gallery.index')" :active="request()->routeIs('gallery.index')">
                    {{ __('Manajemen Galeri') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                    {{ __('Admin Panel') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options (Profile & Logout) -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    {{-- LINK ADMIN DI MOBILE SETTINGS --}}
                    @if (Auth::user()->role === 'user-admin')
                        <x-responsive-nav-link :href="route('admin.index')">
                            {{ __('Admin Panel') }}
                        </x-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>
