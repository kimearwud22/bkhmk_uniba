<x-guest-layout>
    <!-- Area Pembungkus Utama (Memastikan konten berada di tengah dan memiliki lebar terbatas) -->
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- KONTEN SAMBUTAN (Sesuai permintaan teks) -->
        <div class="text-center mb-8">
            <p class="text-lg text-indigo-600 font-semibold mb-1">Selamat Datang!</p>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                Alumni Universitas PGRI Banyuwangi
            </h1>
            <p class="text-gray-600">
                Silakan daftarkan akun Anda untuk mengakses portal alumni. Jaga silaturahmi dan manfaatkan jaringan alumni.
            </p>
        </div>

        <!-- Kartu Formulir Registrasi (Mengambil gaya visual dari gambar Anda) -->
        <div class="bg-white p-6 sm:p-8 shadow-xl rounded-lg border border-gray-100">
            
            <h3 class="text-xl font-bold text-gray-900 mb-6 text-center">
                Buat Akun Baru
            </h3>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" class="text-sm font-medium text-gray-700 block mb-1"/>
                    <x-text-input 
                        id="name" 
                        class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2.5 transition duration-150" 
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required 
                        autofocus 
                        autocomplete="name" 
                        placeholder="Nama Lengkap Anda"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600"/>
                </div>

                <!-- Email Address -->
                <div class="mt-4 mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700 block mb-1"/>
                    <x-text-input 
                        id="email" 
                        class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2.5 transition duration-150" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autocomplete="username" 
                        placeholder="email@upb.ac.id"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600"/>
                </div>

                <!-- Password & Confirm Password (Tetap dalam satu kolom untuk kerapian seperti gambar) -->
                <div class="grid grid-cols-1 gap-4">
                    <!-- Password -->
                    <div class="mt-0">
                        <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-gray-700 block mb-1"/>
                        <x-text-input 
                            id="password" 
                            class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2.5 transition duration-150"
                            type="password"
                            name="password"
                            required 
                            autocomplete="new-password" 
                            placeholder="Minimal 8 Karakter"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600"/>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-0">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm font-medium text-gray-700 block mb-1"/>
                        <x-text-input 
                            id="password_confirmation" 
                            class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2.5 transition duration-150"
                            type="password"
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password" 
                            placeholder="Ulangi Kata Sandi"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600"/>
                    </div>
                </div>

                <!-- Aksi Tombol -->
                <div class="flex items-center justify-end mt-6">
                    <!-- Link Login -->
                    <a class="text-sm text-gray-600 hover:text-indigo-600 rounded-md focus:outline-none mr-auto" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <!-- Tombol Register -->
                    <x-primary-button class="ms-4 py-2.5 bg-indigo-600 hover:bg-indigo-700">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

    </div>
</x-guest-layout>