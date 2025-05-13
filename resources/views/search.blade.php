<x-app-layout>
    <x-slot name="title">Buscar</x-slot>

    {{-- CSS personalizado --}}
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">

    {{-- Encabezado de la sección de búsqueda --}}
    <header class="d-flex justify-content-between align-items-center px-3 shadow-sm bg-white">
        <div class="section-title">
            <h5 class="m-0 fw-bold section-heading">Buscar usuarios</h5>
        </div>
        <div class="app-brand d-flex align-items-center">
            <img src="{{ asset('img/Logo_y_nombre.png') }}" alt="Logo de la app">
        </div>
    </header>

    {{-- Caja de búsqueda centrada --}}
    <div class="search-wrapper">
        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="user-search" placeholder="Buscar usuarios..." autocomplete="off">
            <ul id="search-results" class="results-list"></ul>
        </div>
    </div>

    {{-- Historial de búsqueda (si existe) --}}
    @if (count($historial) > 0)
        <div class="search-history mt-3 px-3">
            <h6 class="fw-bold">Búsquedas recientes</h6>
            <ul class="list-unstyled">
                @foreach ($historial as $h)
                    <li class="d-flex align-items-center justify-content-between mb-2 history-item">
                        <a href="{{ route('search.perfil', $h->searchedUser->name) }}"
                           class="d-flex align-items-center text-decoration-none text-dark">
                            <img src="{{ asset('storage/' . $h->searchedUser->image) }}"
                                 alt="Avatar"
                                 width="30"
                                 height="30"
                                 class="rounded-circle me-2 history-avatar">
                            <span>{{ $h->searchedUser->name }}</span>
                        </a>
                        <form action="{{ route('search-history.destroy', $h->id) }}" method="POST" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-link p-0" title="Eliminar">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/search.js') }}"></script>
</x-app-layout>
