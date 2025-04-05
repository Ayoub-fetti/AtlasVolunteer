<x-app>
    <h1>Your Conversations</h1>
    <ul>
        @foreach($conversations as $conversation)
        <li>
            <a href="{{ route('messages.show', $conversation->id) }}">
                Conversation with {{ $conversation->receiver->name }}
            </a>
        </li>
        @endforeach
    </ul>

    <form action="{{ route('conversations.create') }}" method="POST">
        @csrf
        <label for="receiver_id">Start a new conversation:</label>
        <select name="receiver_id" required>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <button type="submit">Start Conversation</button>
    </form>
</x-app>