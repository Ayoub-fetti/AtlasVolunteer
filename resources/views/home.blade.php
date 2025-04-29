{{-- filepath: c:\laragon\www\Volunteer-Connect-Platform\resources\views\home.blade.php --}}
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

        <!-- Title -->
        
        <!-- Opportunities List -->
        @if(isset($opportunities) && $opportunities->count() > 0)
        <div class="flex justify-center">
            <input type="text" id="homeSearch" placeholder="Rechercher les opportunités disponible..." class="w-75 p-2 mb-4 border rounded-4xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Liste des opportunités</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($opportunities as $opportunity)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img 
                            src="{{ asset('storage/' . $opportunity->cover )}}" 
                            alt="{{ $opportunity->title }}" 
                            class="w-full h-48 object-cover"
                        >
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $opportunity->title }}</h3>
                            <p class="mt-2 text-gray-600">{{ $opportunity->description }}</p>
                            
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-200 text-green-800">
                                    @php
                                        $category = App\Models\Category::find($opportunity->category);
                                    @endphp
                                    {{ $category ? $category->name : 'Uncategorized' }}
                                </span>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    <svg class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $opportunity->location->place_name }}
                                </span>
                            </div>
                            
                            <div class="mt-5">
                                <a 
                                    href="{{ route('opportunities.show', $opportunity->id) }}" 
                                    class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-4xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Afficher les détails
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $opportunities->links() }}
            </div>
        @elseif(isset($opportunities))
            <div class="bg-white shadow rounded-lg p-6 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">Aucune opportunité disponible</h3>
                <p class="mt-1 text-gray-500">Revenez plus tard pour de nouvelles opportunités. </p>
            </div>
        @endif
    </div>
    <x-footer />
</x-app>