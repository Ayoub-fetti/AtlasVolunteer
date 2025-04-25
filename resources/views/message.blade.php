<x-app>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Conversation Header with Photo -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-5">
            <div class="flex items-center">
                <div class="flex-shrink-0 mr-4">
                    @if($receiver->role == 'organization')
                        <img class="h-14 w-14 rounded-full object-cover border-2 border-indigo-100" 
                            src="{{ optional($receiver->organizations->first())->logo ? asset('storage/' . $receiver->organizations->first()->logo) : asset('images/avatar.png') }}" 
                            alt="{{ $receiver->name }}">
                    @else
                        <img class="h-14 w-14 rounded-full object-cover border-2 border-indigo-100" 
                            src="{{ optional($receiver->volunteer)->profile_picture ? asset('storage/' . $receiver->volunteer->profile_picture) : asset('images/avatar.png') }}" 
                            alt="{{ $receiver->name }}">
                    @endif
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-800">{{ $receiver->name }}</h1>
                    <span class="text-sm text-gray-500">
                        @if($receiver->role == 'organization')
                            Organisation
                        @else
                            Volontaire
                        @endif
                    </span>
                </div>
            </div>
        </div>
        
        <!-- Messages Container -->
        <div id="messages" class="bg-white rounded-lg shadow-md p-6 mb-5 h-96 overflow-y-auto">
            @foreach($messages as $message)
                <div class="mb-4 {{ $message->sender_id === auth()->id() ? 'flex justify-end' : 'flex justify-start' }}">
                    @if($message->sender_id !== auth()->id())
                        <div class="flex-shrink-0 mr-2 self-end mb-1">
                            @if($message->sender->role == 'organization')
                                <img class="h-8 w-8 rounded-full object-cover" 
                                    src="{{ optional($message->sender->organizations->first())->logo ? asset('storage/' . $message->sender->organizations->first()->logo) : asset('images/avatar.png') }}" 
                                    alt="{{ $message->sender->name }}">
                            @else
                                <img class="h-8 w-8 rounded-full object-cover" 
                                    src="{{ optional($message->sender->volunteer)->profile_picture ? asset('storage/' . $message->sender->volunteer->profile_picture) : asset('images/avatar.png') }}" 
                                    alt="{{ $message->sender->name }}">
                            @endif
                        </div>
                    @endif
                    <div class="{{ $message->sender_id === auth()->id() 
                        ? 'bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-lg py-2 px-4 max-w-md shadow-sm' 
                        : 'bg-gray-100 text-gray-800 rounded-lg py-2 px-4 max-w-md shadow-sm' }}">
                        <p>{{ $message->content }}</p>
                        <span class="text-xs {{ $message->sender_id === auth()->id() ? 'text-indigo-200' : 'text-gray-500' }} block text-right mt-1">
                            {{ $message->created_at->format('H:i') }}
                        </span>
                    </div>
                    @if($message->sender_id === auth()->id())
                        <div class="flex-shrink-0 ml-2 self-end mb-1">
                            @if(auth()->user()->role == 'organization')
                                <img class="h-8 w-8 rounded-full object-cover" 
                                    src="{{ optional(auth()->user()->organizations->first())->logo ? asset('storage/' . auth()->user()->organizations->first()->logo) : asset('images/avatar.png') }}" 
                                    alt="{{ auth()->user()->name }}">
                            @else
                                <img class="h-8 w-8 rounded-full object-cover" 
                                    src="{{ optional(auth()->user()->volunteer)->profile_picture ? asset('storage/' . auth()->user()->volunteer->profile_picture) : asset('images/avatar.png') }}" 
                                    alt="{{ auth()->user()->name }}">
                            @endif
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        
        <!-- Message Form -->
        <div class="bg-white rounded-lg shadow-md p-4">
            <form id="send-message-form" action="{{ route('messages.send', $conversationId) }}" method="POST" class="flex flex-col space-y-3">
                @csrf
                <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
                <textarea 
                    name="content" 
                    placeholder="Écrivez votre message..." 
                    required 
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500 resize-none"
                    rows="3"
                ></textarea>
                <div class="flex justify-end">
                    <button type="submit" class="bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-blue-800 hover:to-blue-400 text-white font-medium px-6 py-2 rounded-4xl shadow-sm transition duration-300 flex items-center">
                        <span>Envoyer</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
    
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
                const messageContainer = document.createElement('div');
                messageContainer.className = 'mb-4 flex justify-end';
                
                const messageDiv = document.createElement('div');
                messageDiv.className = 'bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-lg py-2 px-4 max-w-md shadow-sm';
                
                const time = new Date().toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
                
                messageDiv.innerHTML = `
                    <p>${data.content}</p>
                    <span class="text-xs text-indigo-200 block text-right mt-1">${time}</span>
                `;
                
                // Ajouter la photo de profil pour les messages envoyés
                const imageContainer = document.createElement('div');
                imageContainer.className = 'flex-shrink-0 ml-2 self-end mb-1';
                
                const profileSrc = '{{ auth()->user()->role == "organization" 
                    ? (optional(auth()->user()->organizations->first())->logo 
                        ? asset("storage/" . auth()->user()->organizations->first()->logo) 
                        : asset("images/default-avatar.png")) 
                    : (optional(auth()->user()->volunteer)->profile_picture 
                        ? asset("storage/" . auth()->user()->volunteer->profile_picture) 
                        : asset("images/default-avatar.png")) }}';
                
                imageContainer.innerHTML = `<img class="h-8 w-8 rounded-full object-cover" src="${profileSrc}" alt="Profile">`;
                
                messageContainer.appendChild(messageDiv);
                messageContainer.appendChild(imageContainer);
                messagesDiv.appendChild(messageContainer);
                messagesDiv.scrollTop = messagesDiv.scrollHeight;
                this.reset();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</x-app>