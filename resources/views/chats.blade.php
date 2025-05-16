<x-app-layout>
    <x-slot name="title">Chat con {{ $otherUser->name }}</x-slot>

    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">

    <div class="chat-container">
        <div class="chat-header">
            <h2>Chat con {{ $otherUser->name }}</h2>
        </div>

        <div class="chat-messages" id="chat-messages">
            @foreach ($messages as $message)
                <div class="chat-message {{ $message->sender_id === auth()->id() ? 'sent' : 'received' }}">
                    @if ($message->image)
                        <img src="{{ asset('storage/' . $message->image) }}" alt="Imagen enviada">
                    @endif
                    @if ($message->content)
                        <p>{{ $message->content }}</p>
                    @endif
                    <span class="timestamp">{{ $message->created_at->format('H:i') }}</span>
                </div>
            @endforeach
        </div>

        <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data" class="chat-form">
            @csrf
            <input type="hidden" name="receiver_id" value="{{ $otherUser->id }}">

            <textarea name="content" rows="1" placeholder="Escribe tu mensaje..."></textarea>

            <input type="file" name="image" accept="image/*">

            <button type="submit">Enviar</button>
        </form>
    </div>

    <script>
        // Scroll automático hacia abajo
        const chatMessages = document.getElementById('chat-messages');
        chatMessages.scrollTop = chatMessages.scrollHeight;
    </script>
</x-app-layout>
