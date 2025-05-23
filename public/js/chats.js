setInterval(function () {
        fetch("{{ route('messages.index', ['name' => $otherUser->name]) }}")
            .then(response => response.text())
            .then(html => {
                document.querySelector('#chat-container').innerHTML = html;
            });
    }, 5000); // cada 5 segundos
