<x-guest-layout>

    <!-- 🔥 JUDUL -->
    <div class="text-center mb-6">
        <h1 class="text-2xl font-bold text-gray-700">
            Selamat Datang di Aplikasi Manajemen Stok Gudang
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Silakan login untuk melanjutkan
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full"
                type="email" name="email"
                :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember -->
        <div class="block mt-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="remember" class="rounded">
                <span class="ms-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <!-- Button -->
        <div class="flex items-center justify-between mt-4">

            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-gray-900"
                    href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif

            <x-primary-button>
                Login
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>
