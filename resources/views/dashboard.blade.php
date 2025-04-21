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


    <div class="container">

        @forelse ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->user->name ?? 'Usuario' }}</h5>
                    <p class="card-text">{{ $post->content }}</p>

                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded mt-2" alt="Publicación">
                    @endif

                    <p class="card-text">
                        <small class="text-muted">Publicado el {{ $post->created_at->format('d/m/Y H:i') }}</small>
                    </p>
                </div>
            </div>
        @empty
            <p>No hay publicaciones todavía.</p>
        @endforelse
    </div>

</x-app-layout>
