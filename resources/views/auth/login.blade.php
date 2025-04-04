<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="form" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->

        {{-- <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
            autofocus autocomplete="username" /> --}}
        <div class="form-floating mb-1">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
            <label for="email" class="d-flex align-items-center">
                <span class="material-symbols-outlined me-2">person</span>
                Email
            </label>
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />



        <!-- Password -->
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required
                autocomplete="current-password" />
            <label for="password" class="d-flex align-items-center">
                <span class="material-symbols-outlined me-2">lock</span>
                Contraseña
            </label>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <button type="submit" class="btn">
            Entrar
            <span class="material-symbols-outlined">login</span>
        </button>
        <div class="mt-2 d-flex flex-column">
            <span>¿Todavía no tienes una cuenta?</span>
            <a href="{{ route('register') }}">Crea tu cuenta aquí</a>
        </div>
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Olvidaste tu contraseña?') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>