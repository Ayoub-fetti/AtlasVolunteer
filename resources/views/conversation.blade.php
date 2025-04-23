
<x-app>
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-green-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">Vos conversations</h1>
            </div>

            <div class="p-6">
                <!-- Conversations List -->
                @if($conversations->isEmpty())
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                        </svg>
                        <p class="mt-2 text-sm font-medium text-gray-500">Vous n'avez pas encore de conversations</p>
                    </div>
                @else
                    <ul class="divide-y divide-gray-200">
                        @foreach($conversations as $conversation)
                        <li class="py-4 hover:bg-gray-50 transition duration-150 rounded-md">
                            <a href="{{ route('messages.show', $conversation->id) }}" class="flex items-center px-4">
                                <div class="flex-shrink-0">
                                    @if($conversation->user_id == auth()->id())
                                        @if($conversation->receiver->role == 'organization')
                                            <img class="h-12 w-12 rounded-full object-cover border-2 border-gray-200" 
                                                src="{{ optional($conversation->receiver->organizations->first())->logo ? asset('storage/' . $conversation->receiver->organizations->first()->logo) : asset('images/avatar.png') }}" 
                                                alt="{{ $conversation->receiver->name }}">
                                        @else
                                            <img class="h-12 w-12 rounded-full object-cover border-2 border-gray-200" 
                                                src="{{ optional($conversation->receiver->volunteer)->profile_picture ? asset('storage/' . $conversation->receiver->volunteer->profile_picture) : asset('images/avatar.png') }}" 
                                                alt="{{ $conversation->receiver->name }}">
                                        @endif
                                    @else
                                        @if($conversation->user->role == 'organization')
                                            <img class="h-12 w-12 rounded-full object-cover border-2 border-gray-200" 
                                                src="{{ optional($conversation->user->organizations->first())->logo ? asset('storage/' . $conversation->user->organizations->first()->logo) : asset('images/avatar.png') }}" 
                                                alt="{{ $conversation->user->name }}">
                                        @else
                                            <img class="h-12 w-12 rounded-full object-cover border-2 border-gray-200" 
                                                src="{{ optional($conversation->user->volunteer)->profile_picture ? asset('storage/' . $conversation->user->volunteer->profile_picture) : asset('images/avatar.png') }}" 
                                                alt="{{ $conversation->user->name }}">
                                        @endif
                                    @endif
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-lg font-medium text-gray-900">
                                            @if($conversation->user_id == auth()->id())
                                                {{ $conversation->receiver->name }}
                                            @else
                                                {{ $conversation->user->name }}
                                            @endif
                                        </p>
                                        <p class="text-sm text-gray-500">{{ $conversation->updated_at->diffForHumans() }}</p>
                                    </div>
                                    @if($conversation->latest_message)
                                        <p class="mt-1 text-sm text-gray-600 truncate">
                                            {{ Str::limit($conversation->latest_message->content, 50) }}
                                        </p>
                                    @endif
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                @endif

                <!-- Start New Conversation -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900 mb-4">Démarrer une nouvelle conversation</h2>
                    <form action="{{ route('conversations.create') }}" method="POST">
                        @csrf
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="flex-grow">
                                <label for="receiver_id" class="sr-only">Sélectionnez le contact</label>
                                <select name="receiver_id" id="receiver_id" required
                                    class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 rounded-md">
                                    <option value="">Sélectionnez une personne avec qui discuter</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" 
                                class="inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-4xl shadow-sm text-white bg-gradient-to-r from-blue-800 to-blue-500 hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                <svg class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Commencer la conversation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>