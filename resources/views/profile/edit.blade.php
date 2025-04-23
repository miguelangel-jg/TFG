<x-app-layout>
    {{-- Title --}}
    <x-slot name="title">Perfil</x-slot>

    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

    <header class="d-flex justify-content-between align-items-center px-3 shadow-sm bg-white">
        <!-- Título de la sección -->
        <div class="section-title">
            <h5 class="m-0 fw-bold section-heading">Perfil de Usuario</h5>
        </div>

        <!-- Logo y nombre de la app -->
        <div class="app-brand">
            <img src="{{ asset('img/Logo_y_nombre.png') }}" alt="Logo de la app">
        </div>
    </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    {{-- Cerrar sesión --}}
    <div name="content" class="flex items-center justify-center mb-5 p-5">
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                this.closest('form').submit();" style="color: #5cd178; font-size: 18px;">
                {{ __('Cerrar Sesion') }}
            </x-dropdown-link>
        </form>
    </div>
</x-app-layout>