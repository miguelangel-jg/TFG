<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <form method="POST" class="form" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-floating mb-3">
            {{-- <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" /> --}}
            <input type="text" class="form-control" id="name" name="name" placeholder="">
            <label for="name" class="d-flex align-items-center">
                <span class="material-symbols-outlined me-2">person</span>
                Nombre de usuario
            </label>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="form-floating mb-3">
            {{-- <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" /> --}}

            <input type="email" class="form-control" id="email" name="email" placeholder="">
            <label for="email" class="d-flex align-items-center">
                <span class="material-symbols-outlined me-2">email</span>
                Email
            </label>

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-floating mb-3">
            {{-- <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" /> --}}

            <input type="password" class="form-control" id="password" name="password" placeholder="">
            <label for="password" class="d-flex align-items-center">
                <span class="material-symbols-outlined me-2">lock</span>
                Contraseña
            </label>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="form-floating mb-3">
            {{-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" /> --}}
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                placeholder="">
            <label for="password_confirmation" class="d-flex align-items-center">
                <span class="material-symbols-outlined me-2">lock</span>
                Confirmar contraseña
            </label>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit" class="btn">
            Registrarse
            <span class="material-symbols-outlined">how_to_reg</span>
        </button>
        <div class="mt-2 d-flex flex-column">
            <span>¿Ya tienes tu cuenta?</span>
            <a href="{{ route('login') }}">Inicia sesión aquí</a>
        </div>

    </form>
</x-guest-layout>