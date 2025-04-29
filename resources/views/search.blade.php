<x-app-layout>
    <x-slot name="title">Buscar usuarios</x-slot>

    <link rel="stylesheet" href="{{ asset('css/search.css') }}">

    <div class="search-page">
        <h1 class="search-title">Buscar personas</h1>

        <div class="search-box">
            <input type="text" id="user-search" placeholder="Escribe un nombre o usuario..." autocomplete="off">
            <ul id="search-results" class="results-list"></ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/search.js') }}"></script>
</x-app-layout>
