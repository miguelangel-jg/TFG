<x-app-layout>
    <x-slot name="title">Perfil de {{ $user->name }}</x-slot>

    <link rel="stylesheet" href="{{ asset('css/perfilSearch.css') }}">

    <div class="perfil-container">
        <!-- Cabecera -->
        <div class="perfil-header">
            <div class="perfil-left">
                <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/default-avatar.png') }}"
                    class="perfil-avatar" alt="Avatar">
            </div>
            <div class="perfil-right">
                <h1>{{ $user->name }}</h1>
                <div class="perfil-stats">
                    <span><strong>{{ $user->posts->count() }}</strong> publicaciones</span>
                    <span><strong>{{ $user->likedPosts->count() }}</strong> me gusta</span>
                </div>
                @auth
                    @if(auth()->id() !== $user->id)
                        <div class="mt-4 d-flex">
                            <a href="{{ route('messages.index', $user->name) }}" class="btn-enviar-mensaje">
                                Enviar mensaje
                            </a>
                        </div>
                    @endif
                @endauth
            </div>

            @auth
                @if (auth()->user()->role == 1)
                    <!-- Botón que abre el modal -->
                    <button type="button" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                        data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $user->id }}">
                        Eliminar perfil
                    </button>

                    <!-- Modal de confirmación -->
                    <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1"
                        aria-labelledby="deleteUserModalLabel{{ $user->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="deleteUserModalLabel{{ $user->id }}">Confirmar eliminación</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body text-dark">
                                    ¿Estás seguro de que deseas eliminar el perfil del usuario
                                    <strong>{{ $user->name }}</strong>? Esta acción no se puede deshacer.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @endauth

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
                    <p>No hay publicado nada todavía.</p>
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