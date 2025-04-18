
<x-app>
    <h1>Conversation with {{ $receiver->name }}</h1>

    <div id="messages" style="height: 300px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px;">
        @foreach($messages as $message)
        <div style="text-align: {{ $message->sender_id === auth()->id() ? 'right' : 'left' }};">
            <p><strong>{{ $message->sender->name }}:</strong> {{ $message->content }}</p>
        </div>
        @endforeach
    </div>

    <form id="send-message-form" action="{{ route('messages.send', $conversationId) }}" method="POST">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
        <textarea name="content" placeholder="Type your message..." required class="border rounded p-2 w-full"></textarea>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Send</button>
    </form>

    <script>
        const messagesDiv = document.getElementById('messages');
        messagesDiv.scrollTop = messagesDiv.scrollHeight;

        document.getElementById('send-message-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                const messageDiv = document.createElement('div');
                messageDiv.style.textAlign = 'right';
                messageDiv.innerHTML = `<p><strong>You:</strong> ${data.content}</p>`;
                messagesDiv.appendChild(messageDiv);
                messagesDiv.scrollTop = messagesDiv.scrollHeight;
                this.reset();
            });
        });
    </script>
</x-app>