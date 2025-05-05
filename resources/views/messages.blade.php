<x-app-layout>
    <x-slot name="title">Mensajes</x-slot>

    <link rel="stylesheet" href="{{ asset('css/messages.css') }}">
    {{-- Header --}}
    <header class="d-flex justify-content-between align-items-center px-3 shadow-sm bg-white">
        <div class="section-title">
            <h5 class="m-0 fw-bold section-heading">Mensajes</h5>
        </div>
        <div class="app-brand d-flex align-items-center">
            <img src="{{ asset('img/Logo_y_nombre.png') }}" alt="Logo de la app">
        </div>
    </header>
</x-app-layout>