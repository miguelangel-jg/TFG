<x-app-layout>
    <x-slot name="title">Inicio</x-slot>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

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
            <div class="card post-card">
                <div class="card-body">
                    <!-- Usuario -->
                    <div class="user-info">
                        <img src="{{ asset('storage/' . $post->user->image) }}" alt="Avatar" class="avatar">
                        <span class="name">{{ $post->user->name ?? 'Usuario' }}</span>
                    </div>

                    <!-- Contenido -->
                    <p class="card-text">{{ $post->content }}</p>

                    <!-- Imágenes -->
                    @if ($post->images)
                    <div class="post-gallery">
                        @foreach ($post->images as $img)
                            <img src="{{ asset('storage/' . $img->path) }}" alt="Imagen del post">
                        @endforeach
                    </div>
                    @endif

                    <!-- Footer del post: botones e info -->
                    <div class="post-footer d-flex justify-content-between align-items-center mt-3">
                        <div class="post-actions d-flex align-items-center gap-3">
                            <i class="bi bi-heart post-icon"></i>
                        </div>
                        <p class="post-meta m-0">
                            {{ $post->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted text-center">No hay publicaciones todavía.</p>
        @endforelse
    </div>

    <!-- Modal para mostrar la imagen -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <!-- Imagen dentro del modal -->
            <div class="modal-body d-flex justify-content-center align-items-center p-0" style="min-height: 80vh;">
            <img id="modalImage" src="" class="img-fluid rounded shadow" alt="Imagen ampliada" style="max-height: 90vh; object-fit: contain;">
            </div>
        </div>
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>
</x-app-layout>
