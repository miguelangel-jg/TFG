<x-app-layout>
    <x-slot name="title">Chat con {{ $otherUser->name }}</x-slot>

    <link rel="stylesheet" href="{{ asset('css/chats.css') }}">

    <div class="chat-container">
        <!-- HEADER del chat con avatar y nombre -->
        <div class="chat-header">
            <a href="{{ route('search.perfil', $otherUser->name) }}" class="username">
                <img src="{{ asset('storage/' . $otherUser->image) }}" alt="{{ $otherUser->name }}" class="avatar">
                <span>{{ $otherUser->name }}</span>
            </a>
        </div>

        <!-- MENSAJES -->
        <div class="messages" id="chat-messages">
            @foreach ($messages as $message)
                @php
                    $isSender = $message->sender_id === auth()->id();
                    $user = $isSender ? auth()->user() : $otherUser;
                @endphp
                <div class="message-wrapper {{ $isSender ? 'sent' : 'received' }}">
                    <!-- Avatar del emisor del mensaje -->
                    <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}" class="avatar">

                    <div class="message {{ $isSender ? 'sent' : 'received' }}">
                        @if ($message->image)
                            <img src="{{ asset('storage/' . $message->image) }}" alt="Imagen enviada" style="max-width: 100%; border-radius: 10px;">
                        @endif

                        @if ($message->content)
                            <p>{{ $message->content }}</p>
                        @endif

                        <div class="timestamp">{{ $message->created_at->format('d/m/y H:i') }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- FORMULARIO DE ENVÍO -->
        <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data" class="message-input-container">
            @csrf
            <input type="hidden" name="_form_token" value="{{ \Str::uuid() }}">
            <input type="hidden" name="receiver_id" value="{{ $otherUser->id }}">

            <!-- Botón de imagen -->
            <label for="image-upload" class="icon-button attach-button">
                <i class="bi bi-plus-lg"></i>
            </label>
            <input type="file" name="image" id="image-upload" accept="image/*" style="display: none;">

            <!-- Input de mensaje -->
            <input type="text" name="content" class="message-input" placeholder="Escribe un mensaje...">

            <!-- Botón de enviar -->
            <button type="submit" class="icon-button send-button">
                <i class="bi bi-send-fill"></i>
            </button>
        </form>
    </div>
</x-app-layout>
