<x-app-layout>
    <x-slot name="title">Perfil de {{ $user->name }}</x-slot>

    <link rel="stylesheet" href="{{ asset('css/perfilSearch.css') }}">

    <div class="perfil-container">
        <!-- Cabecera -->
        <div class="perfil-header">
            <div class="perfil-left">
                <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/default-avatar.png') }}" class="perfil-avatar" alt="Avatar">
            </div>
            <div class="perfil-right">
                <h1>{{ $user->name }}</h1>
                <p>{{ $user->email }}</p>
                <div class="perfil-stats">
                    <span><strong>{{ $user->posts->count() }}</strong> publicaciones</span>
                    <span><strong>{{ $user->likedPosts->count() }}</strong> me gusta</span>
                </div>
            </div>
        </div>

        <!-- Cuerpo -->
        <div class="perfil-body">
            <div class="tabs">
                <button class="tab-button active" onclick="showTab('posts')">Publicaciones</button>
                <button class="tab-button" onclick="showTab('likes')">Me gusta</button>
            </div>

            <div class="tab-content" id="posts">
                @forelse ($user->posts as $post)
                    <div class="post-card">
                        <div class="post-user">
                            <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/default-avatar.png') }}" class="avatar" alt="avatar">
                            <div>
                                <h4>{{ $user->name }}</h4>
                                <small>{{ $post->created_at->translatedFormat('d M Y H:i') }}</small>
                            </div>
                        </div>
                        <p class="post-content">{{ $post->content }}</p>
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="post-image" alt="Post">
                        @endif
                    </div>
                @empty
                    <p>Este usuario no ha publicado nada aún.</p>
                @endforelse
            </div>

            <div class="tab-content hidden" id="likes">
                @forelse ($user->likedPosts as $post)
                    <div class="post-card">
                        <div class="post-user">
                            <img src="{{ $post->user->image ? asset('storage/' . $post->user->image) : asset('images/default-avatar.png') }}" class="avatar" alt="avatar">
                            <div>
                                <h4>{{ $post->user->name }}</h4>
                                <small>{{ $post->created_at->translatedFormat('d M Y H:i') }}</small>
                            </div>
                        </div>
                        <p class="post-content">{{ $post->content }}</p>
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="post-image" alt="Post">
                        @endif
                    </div>
                @empty
                    <p>No hay publicaciones que le hayan gustado.</p>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        function showTab(id) {
            document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
            document.getElementById(id).classList.remove('hidden');
            event.target.classList.add('active');
        }
    </script>
</x-app-layout>
