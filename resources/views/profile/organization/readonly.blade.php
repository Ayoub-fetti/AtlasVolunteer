<x-app>
    <div class="container mx-auto mt-10 px-4 sm:px-6 lg:px-8 mb-16">
        <!-- Profile Header -->
        <div class="relative">
            <!-- Cover Image -->
            <div class="h-64 w-full rounded-lg overflow-hidden bg-gradient-to-r from-blue-400 to-indigo-500 shadow-lg">
                @if($organization->cover)
                    <img src="{{ asset('storage/' . $organization->cover) }}" alt="{{ $organization->organization_name }}" class="w-full h-full object-cover">
                @endif
            </div>
            
            <!-- Profile Picture/Logo -->
            <div class="absolute -bottom-16 left-8">
                <div class="h-32 w-32 rounded-full overflow-hidden border-4 border-white shadow-lg bg-white">
                    @if($organization->logo)
                        <img src="{{ asset('storage/' . $organization->logo) }}" alt="Logo" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-500">
                            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Profile Info -->
        <div class="mt-20 mb-8 flex flex-col md:flex-row md:items-end justify-between">
            <div class="ml-12">
                <h1 class="text-3xl font-bold text-gray-900">{{ ucfirst($organization->organization_name) }}</h1>
                <p class="text-gray-600 mt-1">{{ $organization->bio }}</p>
            </div>
        </div>

        <!-- Opportunities Section -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-gray-900">Opportunités</h2>
            <ul class="mt-4 space-y-2">
                @foreach($opportunities as $opportunity)
                <li class="mb-3">
                    <a 
                        href="{{ route('opportunities.show', $opportunity->id) }}" 
                        class="group block px-5 py-4 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300"
                    >
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-700 transition-colors duration-200">
                            {{ $opportunity->title }}
                        </h3>
                    </a>
                </li>
                
                
                @endforeach
            </ul>
        </div>
    </div>
</x-app>