<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <!-- Judul Formulir yang Lebih Jelas -->
    <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">
        {{ __('Welcome Back') }}
    </h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700 block mb-1" />
            <x-text-input
                id="email"
                class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2.5 transition duration-150 ease-in-out"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="you@example.com"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Password -->
        <div class="mt-4 mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-gray-700 block mb-1" />

            <x-text-input
                id="password"
                class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2.5 transition duration-150 ease-in-out"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="••••••••"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Remember Me & Forgot Password (Dikelompokkan) -->
        <div class="flex items-center justify-between mt-4">
            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 h-4 w-4" name="remember">
                <label for="remember_me" class="ms-2 text-sm text-gray-600 select-none">{{ __('Remember me') }}</label>
            </div>

            <!-- Forgot Password Link -->
            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 hover:text-indigo-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <x-primary-button class="w-full justify-center py-2.5 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 transition duration-150">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Tautan Register -->
    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
            {{ __("Don't have an account?") }}
            @if (Route::has('register'))
                <a class="font-medium text-indigo-600 hover:text-indigo-500 ml-1" href="{{ route('register') }}">
                    {{ __('Sign up now') }}
                </a>
            @endif
        </p>
    </div>
</x-guest-layout>