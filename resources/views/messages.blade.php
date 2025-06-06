<x-app-layout>
    <x-slot name="title">Mensajes</x-slot>

    <link rel="stylesheet" href="{{ asset('css/messages.css') }}">

    <header class="d-flex justify-content-between align-items-center px-3 shadow-sm bg-white">
        <div class="section-title">
            <h5 class="m-0 fw-bold section-heading">Mensajes</h5>
        </div>
        <div class="app-brand d-flex align-items-center">
            <img src="{{ asset('img/Logo_y_nombre.png') }}" alt="Logo de la app">
        </div>
    </header>

    <div class="container py-4">
        @forelse ($chats as $chat)
            <a href="{{ route('messages.index', ['name' => $chat['user']->name]) }}" class="chat-preview d-flex align-items-center gap-3 p-3 mb-3 rounded chat-card text-decoration-none">
                <img src="{{ Storage::exists('public/' . $chat['user']->image) ? asset('storage/' . $chat['user']->image) : asset('img/user.png') }}" alt="{{ $chat['user']->name }}" class="chat-avatar">
                <div class="flex-grow-1">
                    <strong class="chat-name">{{ $chat['user']->name }}</strong><br>
                    <small class="chat-last-message">
                        {{ $chat['message']->content ?? '📷 Imagen' }}
                    </small>
                </div>
            </a>
        @empty
            <p class="text-center text-muted mt-4">Aún no tienes conversaciones.</p>
        @endforelse
    </div>
</x-app-layout>
