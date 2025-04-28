<x-app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="flex justify-center">
            <input type="text" id="donationSearch" placeholder="Rechercher les opportunités disponible..." class="w-75 p-2 mb-4 border rounded-4xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="sm:flex sm:items-center sm:justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800 leading-tight">
                Liste des Donations
            </h2>
            
            <div class="mt-4 sm:mt-0">
                @auth
                    <a 
                        href="{{ route('donation.list') }}" 
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-4xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-green-500 to-green-800 hover:bg-green-700  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                    >
                        <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Vos Donations
                    </a>
                @else
                    <div class="bg-gray-50 rounded-md p-4">
                        <p class="text-gray-700">
                            Veuillez <a href="{{ route('login.form') }}" class="text-indigo-600 font-medium hover:text-indigo-500">vous connecter</a> 
                            pour postuler ou créer de nouvelles donations.
                        </p>
                    </div>
                @endauth
            </div>
        </div>
        

        <!-- Donations grid -->
        @if(count($donations) > 0)

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($donations as $donation)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="h-48 overflow-hidden">
                            @if($donation->image)
                                <img 
                                    src="{{ asset('storage/' . $donation->image) }}" 
                                    alt="{{ $donation->title }}" 
                                    class="w-full h-full object-cover"
                                >
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <svg class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <h3 class="text-lg font-medium text-gray-900 mb-1 truncate">{{ $donation->title }}</h3>
                                <span class="px-2 py-1 text-xs font-medium rounded-full 
                                    {{ $donation->status === 'active' ? 'bg-green-100 text-green-800' : 
                                    ($donation->status === 'claimed' ? 'bg-blue-100 text-blue-800' : 
                                    'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($donation->status) }}
                                </span>
                            </div>
                            
                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $donation->description }}</p>
                            
                            @if($donation->location)
                                <div class="flex items-center text-gray-500 text-sm mb-4">
                                    <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="truncate">{{ $donation->location->place_name }}</span>
                                </div>
                            @endif
                            
                            <div class="flex flex-col sm:flex-row sm:items-center gap-2">
                                <a 
                                    href="{{ route('donation.show', $donation->id) }}" 
                                    class="text-sm font-medium text-indigo-600 hover:text-indigo-500 flex items-center"
                                >
                                    <span>Voir détails</span>
                                    <svg class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                                
                                @auth
                                    @if($donation->status === 'available')
                                        <form action="{{ route('donations.apply', $donation->id) }}" method="POST" class="sm:ml-auto">
                                            @csrf
                                            <button 
                                                type="submit" 
                                                class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-4xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-blue-800 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                            >
                                                Réclamer
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-6">
                {{ $donations->links() }}
            </div>
        @else
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">Aucune donation disponible</h3>
                <p class="mt-1 text-gray-500">Les nouvelles donations apparaîtront ici.</p>
            </div>
        @endif
    </div>
    <x-footer />
</x-app>

