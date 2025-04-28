<x-app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Notifications -->
        @if (session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 rounded-md p-4 mb-6 shadow-sm" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-50 border-l-4 border-red-500 rounded-md p-4 mb-6 shadow-sm" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Cover Image Header -->
            @if($opportunity->cover)
                <div class="relative h-64 w-full">
                    <img src="{{ asset('storage/' . $opportunity->cover) }}" alt="{{ $opportunity->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h1 class="text-3xl font-bold text-white mb-2">{{ $opportunity->title }}</h1>
                        <div class="flex items-center">
                            <span class="px-3 py-1 text-sm font-medium rounded-full 
                                {{ $opportunity->status === 'open' ? 'bg-green-100 text-green-800' : 
                                ($opportunity->status === 'closed' ? 'bg-red-100 text-red-800' : 
                                'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($opportunity->status) }}
                            </span>
                            @if($opportunity->organization)
                                <span class="ml-3 text-white flex items-center">
                                    <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    {{ $opportunity->organization->organization_name }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-gray-100 px-6 py-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $opportunity->title }}</h1>
                    <div class="flex items-center">
                        <span class="px-3 py-1 text-sm font-medium rounded-full 
                            {{ $opportunity->status === 'open' ? 'bg-green-100 text-green-800' : 
                            ($opportunity->status === 'closed' ? 'bg-red-100 text-red-800' : 
                            'bg-yellow-100 text-yellow-800') }}">
                            {{ ucfirst($opportunity->status) }}
                        </span>
                        @if($opportunity->organization)
                            <span class="ml-3 text-gray-700 flex items-center">
                                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                {{ $opportunity->organization }}
                            </span>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Main Content -->
            <div class="p-6">
                <!-- Description -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">description</h2>
                    <p class="text-gray-700">{{ $opportunity->description }}</p>
                </div>

                <!-- Details -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Détails</h2>
                    <div class="bg-gray-50 rounded-lg p-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Catégorie</p>
                                @php
                                $category = App\Models\Category::find($opportunity->category);
                                @endphp
                                <p class="text-sm text-gray-500">{{ $category ? $category->name : 'Uncategorized' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Emplacement</p>
                                <p class="text-sm text-gray-500">{{ $opportunity->location->place_name ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Status</p>
                                <p class="text-sm text-gray-500">{{ucfirst($opportunity->status)}}</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Date de début</p>
                                <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($opportunity->start_date)->format('l jS F Y') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Bénévoles</p>
                                <p class="text-sm text-gray-500">{{ $opportunity->registered_volunteers ?? 0 }} / {{ $opportunity->required_volunteers }}</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>

                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Date de fin</p>
                                <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($opportunity->end_date)->format('l jS F Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Actions -->
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Retour aux opportunités
                    </a>
                </div>

                <!-- Apply Section -->
                @if($opportunity->status === 'open' && Auth::id() !== $opportunity->user_id)
                <div class="mt-8 p-6 bg-gray-50 rounded-lg" id="apply">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Postuler pour cette opportunité</h2>
                    
                    @auth
                        <form action="{{ route('opportunity.apply', $opportunity->id) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="motivation" class="block text-sm font-medium text-gray-700 mb-2">Votre Motivation</label>
                                <textarea 
                                    id="motivation"
                                    name="motivation" 
                                    rows="4"
                                    placeholder="Parlez-nous de vous et pourquoi vous souhaitez postuler pour cette opportunité..." 
                                    required 
                                    class="block w-full bg-white rounded-md border-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                ></textarea>
                            </div>
                            <button 
                                type="submit" 
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                </svg>
                                Envoyer l'application
                            </button>
                        </form>
                    @else
                        <div class="bg-white p-4 rounded-md shadow-sm border border-gray-200">
                            <p class="text-gray-700">Veuillez <a href="{{ route('login.form') }}" class="text-indigo-600 hover:text-indigo-900 font-medium">vous connecter</a> pour postuler à cette opportunité.</p>
                        </div>
                    @endauth
                </div>
            @endif
            </div>
        </div>
    </div>
    <x-footer />
</x-app>