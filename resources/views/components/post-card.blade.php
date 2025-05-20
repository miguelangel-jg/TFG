@props(['post'])

<!-- Iconos y fuentes -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" />
{{-- CSS --}}
<link rel="stylesheet" href="{{ asset('css/post-card.css') }}">

<div class="card post-card">
    <div class="card-body">
        <!-- Usuario -->
        <div class="user-info">
            <img src="{{ asset('storage/' . $post->user->image) }}" alt="Avatar" class="avatar">
            <span class="name">{{ $post->user->name ?? 'Usuario' }}</span>

            @if (auth()->id() === $post->user_id || (auth()->user() && auth()->user()->role == 1))
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline ms-auto"
                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar este post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link text-danger p-0" title="Eliminar post">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            @endif
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
            <p class="post-meta m-0">{{ $post->created_at->translatedFormat('d M Y H:i') }}</p>
        </div>

        <div class="comments-section d-none mt-3">
            <div class="comments d-flex gap-3 flex-wrap">
                @foreach ($post->comments as $comment)
                    <div class="comment mb-2">
                        <div class="comment-bubble">
                            <strong>{{ $comment->user->name }}:</strong>
                            <span>{{ $comment->content }}</span>

                            <div class="d-flex justify-content-between align-items-center mt-1 gap-2">
                                @if (auth()->id() === $comment->user_id || (auth()->user() && auth()->user()->role == 1))
                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                        class="delete-comment-form">
                                        @csrf
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
                        <input type="text" name="content" class="form-control" placeholder="Escribe un comentario..."
                            required>
                        <button type="submit" class="btn comment-btn">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            @endauth
        </div>

    </div>
</div>