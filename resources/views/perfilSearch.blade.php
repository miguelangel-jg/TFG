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

            {{-- Publicaciones --}}
            <div class="tab-content" id="posts">
                @forelse ($user->posts as $post)
                    <x-post-card :post="$post" />
                @empty
                    <p>No hay publicaciones que le hayan gustado.</p>
                @endforelse
            </div>

            {{-- Likes --}}
            <div class="tab-content hidden" id="likes">
                @forelse ($user->likedPosts as $post)
                    <x-post-card :post="$post" />
                @empty
                    <p>No hay publicaciones que le hayan gustado.</p>
                @endforelse
            </div>
        </div>
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/perfilSearch.js') }}"></script>
</x-app-layout>
