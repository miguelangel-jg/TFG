<x-app-layout>
    <x-slot name="title">Buscar</x-slot>

    <link rel="stylesheet" href="{{ asset('css/search.css') }}">

    {{-- Header --}}
    <header class="d-flex justify-content-between align-items-center px-3 shadow-sm bg-white">
        <div class="section-title">
            <h5 class="m-0 fw-bold section-heading">Buscar usuarios</h5>
        </div>
        <div class="app-brand d-flex align-items-center">
            <img src="{{ asset('img/Logo_y_nombre.png') }}" alt="Logo de la app">
        </div>
    </header>

    <div class="search-wrapper">
        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="user-search" placeholder="Buscar usuarios..." autocomplete="off">
            <ul id="search-results" class="results-list"></ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/search.js') }}"></script>
</x-app-layout>
