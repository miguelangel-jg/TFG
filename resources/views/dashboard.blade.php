<x-app-layout>
    {{-- Title --}}
    <x-slot name="title">Inicio</x-slot>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <header class="d-flex justify-content-between align-items-center px-3 shadow-sm bg-white">
        <!-- Título de la sección -->
        <div class="section-title">
            <h5 class="m-0 fw-bold section-heading">Últimos posts</h5>
        </div>

        <!-- Logo y nombre de la app -->
        <div class="app-brand d-flex align-items-center">
            <img src="{{ asset('img/Logo_y_nombre.png') }}" alt="Logo de la app">
        </div>
    </header>

    <div class="container mt-4 mb-5 pb-5">
        @forelse ($posts as $post)
            <div class="card post-card mb-4">
                <div class="card-body d-flex flex-column">
                    <!-- Usuario -->
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ asset('storage/' . $post->user->image) }}" alt="Avatar" class="avatar me-2">
                        <h5 class="card-title m-0">{{ $post->user->name ?? 'Usuario' }}</h5>
                    </div>

                    <!-- Contenido -->
                    <p class="card-text">{{ $post->content }}</p>

                    <!-- Imagen de la publicación -->
                    @if ($post->images)
                    <div class="d-flex flex-wrap gap-3 mt-2">
                        @foreach ($post->images as $img)
                            <img src="{{ asset('storage/' . $img->path) }}" class="img-fluid rounded post-image" style="max-width: 250px;" alt="Img post">
                        @endforeach
                    </div>
                    @endif


                    <!-- Fecha -->
                    <p class="post-meta text-end">
                        Publicado el {{ $post->created_at->format('d/m/Y H:i') }}
                    </p>
                </div>
            </div>
        @empty
            <p class="text-muted">No hay publicaciones todavía.</p>
        @endforelse
    </div>
</x-app-layout>
