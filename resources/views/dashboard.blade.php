<x-app-layout>
    <x-slot name="title">Inicio</x-slot>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    {{-- Header --}}
    <header class="d-flex justify-content-between align-items-center px-3 shadow-sm bg-white">
        <div class="section-title">
            <h5 class="m-0 fw-bold section-heading">Últimos posts</h5>
        </div>
        <div class="app-brand d-flex align-items-center">
            <img src="{{ asset('img/Logo_y_nombre.png') }}" alt="Logo de la app">
        </div>
    </header>

    <div class="posts-container mt-4 mb-5 pb-5">
        @forelse ($posts as $post)
            <x-post-card :post="$post" />
        @empty
            <p class="text-muted text-center">No hay publicaciones todavía.</p>
        @endforelse
    </div>

    <!-- Modal de imagen -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-body d-flex justify-content-center align-items-center p-0" style="min-height: 80vh;">
                <img id="modalImage" src="" class="img-fluid rounded shadow" alt="Img ampliada"
                    style="max-height: 90vh; object-fit: contain;">
            </div>
        </div>
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>
</x-app-layout>
