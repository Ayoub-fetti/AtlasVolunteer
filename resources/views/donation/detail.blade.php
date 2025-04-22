<x-app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Image Header and Info Side by Side -->
            <div class="flex flex-col md:flex-row">
                @if($donation->image)
                    <div class="relative h-64 w-full md:w-1/3 md:h-auto flex-shrink-0 p-4">
                        <img src="{{ asset('storage/' . $donation->image) }}" alt="{{ $donation->title }}" class="w-full h-full object-cover rounded-lg shadow-md">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-white text-gray-800 shadow-sm mb-2">
                                {{ ucfirst($donation->status) }}
                            </span>
                        </div>
                    </div>
                    <div class="md:w-2/3 p-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $donation->title }}</h1>
                        <div class="mb-6">
                            <h2 class="text-xl font-semibold text-gray-900 mb-3">Description</h2>
                            <p class="text-gray-700 leading-relaxed">{{ $donation->description }}</p>
                        </div>
                        
                        <!-- Moved Details section here -->
                        <div class="mb-6">
                            <h2 class="text-xl font-semibold text-gray-900 mb-3">Détails</h2>
                            <div class="bg-gray-50 rounded-lg p-4">
                                @if($donation->location)
                                    <div class="flex items-start mb-3 last:mb-0">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Emplacement</p>
                                            <p class="text-sm text-gray-500">{{ $donation->location->place_name }}</p>
                                        </div>
                                    </div>
                                @endif

                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Date d'ajout</p>
                                        <p class="text-sm text-gray-500">{{ $donation->created_at->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-gray-100 p-6 w-full">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                            {{ $donation->status === 'active' ? 'bg-green-100 text-green-800' : 
                            ($donation->status === 'claimed' ? 'bg-blue-100 text-blue-800' : 
                            'bg-yellow-100 text-yellow-800') }}">
                            {{ ucfirst($donation->status) }}
                        </span>
                        <h1 class="text-3xl font-bold text-gray-900 mt-2">{{ $donation->title }}</h1>
                        <div class="mt-4">
                            <p class="text-gray-700 leading-relaxed">{{ $donation->description }}</p>
                        </div>
                        
                        <!-- Details for when no image is present -->
                        <div class="mt-6">
                            <h2 class="text-xl font-semibold text-gray-900 mb-3">Détails</h2>
                            <div class="bg-gray-50 rounded-lg p-4">
                                @if($donation->location)
                                    <div class="flex items-start mb-3 last:mb-0">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Emplacement</p>
                                            <p class="text-sm text-gray-500">{{ $donation->location->place_name }}</p>
                                        </div>
                                    </div>
                                @endif

                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Date d'ajout</p>
                                        <p class="text-sm text-gray-500">{{ $donation->created_at->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Actions section (moved from the removed Content section) -->
            <div class="p-6">
                <div class="mt-4 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('donation.index') }}" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Retour aux donations
                    </a>
                    
                    @auth
                        @if($donation->status === 'active')
                            <form action="{{ route('donations.apply', $donation->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Réclamer cette donation
                                </button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('login.form') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Se connecter pour réclamer
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <x-footer />
</x-app>