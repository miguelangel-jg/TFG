<x-app-layout>
    <x-slot name="title">Configuracion</x-slot>
    <link rel="stylesheet" href="{{ asset('css/profile-config.css') }}">

    <header class="d-flex justify-content-between align-items-center px-3 shadow-sm bg-white">
        <!-- Título de la sección -->
        <div class="section-title">
            <h5 class="m-0 fw-bold section-heading">Configuración de Usuario</h5>
        </div>

        <!-- Logo y nombre de la app -->
        <div class="app-brand">
            <img src="{{ asset('img/Logo_y_nombre.png') }}" alt="Logo de la app">
        </div>

        {{-- Cerrar sesión --}}
        <div name="content" class="">

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <!-- Icono de perfil de Bootstrap -->
                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                            this.closest('form').submit();"
                    style="color: #5cd178; font-size: 18px;text-decoration: none" class="d-flex align-items-center">
                    {{-- Icono de cerrar sesión --}}
                    <span class="me-2">
                        <i class="bi bi-box-arrow-right" style="font-size: 1.5rem; color: #5cd178;"></i>
                    </span>{{ __('Cerrar Sesión') }}
                </x-dropdown-link>
            </form>
        </div>

    </header>

    <div class="py-12 mb-5">
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


</x-app-layout>
