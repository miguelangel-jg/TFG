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
            <div class="card post-card">
                <div class="card-body">
                    <!-- Usuario -->



                    <div class="user-info">
                        <img src="{{ asset($post->user->profile_photo_path ?? 'img/user.png') }}" alt="Avatar"
                            class="avatar">
                        <span class="name">{{ $post->user->name ?? 'Usuario' }}</span>
                    </div>

                    <!-- Contenido -->
                    <p class="card-text">{{ $post->content }}</p>

                    <!-- Imágenes -->
                    @if ($post->images)
                        <div class="post-gallery">
                            @foreach ($post->images as $img)
                                <img src="{{ asset('storage/' . $img->path) }}" alt="Post Img" loading="lazy">
                            @endforeach
                        </div>
                    @endif

                    <!-- Footer del post -->
                    <div class="post-footer d-flex justify-content-between align-items-center mt-3">

                        <div class="post-icons d-flex justify-content-between align-items-center">
                            {{-- Like --}}
                            <button class="btn-like" data-post-id="{{ $post->id }}">
                                <i
                                    class="like-icon {{ $post->likes()->where('user_id', auth()->id())->exists() ? 'fas' : 'far' }} fa-heart"></i>
                                <span class="like-count">{{ $post->likes()->count() }}</span>
                            </button>

                            {{-- Separador --}}
                            <span class="separator mx-3 text-secondary">|</span>

                            {{-- Comentarios --}}
                            <button class="btn-comment-toggle toggle-comments" title="Comentarios">
                                <i class="fas fa-comment"></i>
                            </button>
                        </div>

                        {{-- Fecha --}}
                        <p class="post-meta m-0">{{ $post->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="comments-section d-none mt-3">

                        <div class="comments d-flex gap-3 flex-wrap">
                            @foreach ($post->comments as $comment)

                                <div class="comment mb-2">
                                    <div class="comment-bubble">
                                        <strong>{{ $comment->user->name }}:</strong>
                                        <span>{{ $comment->content }}</span>

                                        <div class="d-flex justify-content-between align-items-center mt-1 gap-2">
                                            @if (auth()->id() === $comment->user_id)
                                                <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                                    class="delete-comment-form">
                                                    @csrf
                                                    <input type="hidden" name="_form_token" value="{{ \Str::uuid() }}">
                                                    @method('DELETE')
                                                    <button type="submit" class="delete-comment-btn" title="Eliminar">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            <p class="post-meta-comment m-0 mt-1 text-end">
                                                {{ $comment->created_at->format('d/m/Y H:i') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>

                        @auth
                            <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-3">
                                @csrf
                                <input type="hidden" name="_form_token" value="{{ \Str::uuid() }}">

                                <div class="input-group comment-form">
                                    <input type="text" name="content" class="form-control"
                                        placeholder="Escribe un comentario..." required>
                                    <button type="submit" class="btn comment-btn">
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        @endauth
                    </div>

                </div>
            </div>
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