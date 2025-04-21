{{-- <x-app>
    @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-5" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    @if (session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-5" role="alert">
        <p>{{ session('error') }}</p>
    </div>
    @endif
    

    @if(isset($opportunities) && $opportunities->count() > 0)
    <div class="opportunities-list mt-4">
        <h2>Available Opportunities</h2>
        <ul>
            @foreach($opportunities as $opportunity)
            <li>
                <img src="{{ asset('storage/' . $opportunity->cover )}}" alt="{{ $opportunity->title }}" style="width: 100px; height: 100px;">
                <h3>{{ $opportunity->title }}</h3>
                <p>{{ $opportunity->description }}</p>
                <p>Category: {{ $opportunity->category }}</p>
                <p>Location: {{ $opportunity->location->place_name }}</p>
                <h3>Status: {{$opportunity->status}}</h3>
                <a href="{{ route('opportunities.show', $opportunity->id) }}" class="text-orange-500">View Details</a>
                
                @auth
                <form action="{{ route('opportunity.apply', $opportunity->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <textarea name="motivation" placeholder="Enter your motivation" required class="border rounded p-2"></textarea>
                    <button type="submit" class="text-blue-500">Apply</button>
                </form>
                @else
                <p class="text-gray-500 mt-2">Please <a href="{{ route('login.form') }}" class="text-blue-500">login</a> to apply for this opportunity</p>
                @endauth
            </li>
            @endforeach
        </ul>
    </div>
    @elseif(isset($opportunities))
    <p>No opportunities available</p>
    @endif
    {{ $opportunities->links("pagination::bootstrap-4") }}
    <x-footer />
</x-app> --}}
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

        <!-- Opportunities List -->
        @if(isset($opportunities) && $opportunities->count() > 0)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800">Available Opportunities</h2>
                </div>
                
                <ul class="divide-y divide-gray-200">
                    @foreach($opportunities as $opportunity)
                        <li class="p-6 hover:bg-gray-50 transition duration-150">
                            <div class="flex flex-col md:flex-row">
                                <div class="md:w-32 flex-shrink-0 mb-4 md:mb-0">
                                    <img 
                                        src="{{ asset('storage/' . $opportunity->cover )}}" 
                                        alt="{{ $opportunity->title }}" 
                                        class="w-24 h-24 object-cover rounded-lg shadow-sm"
                                    >
                                </div>
                                
                                <div class="flex-1 md:ml-6">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-xl font-semibold text-gray-900">{{ $opportunity->title }}</h3>
                                        <span class="px-3 py-1 text-xs font-medium rounded-full 
                                            {{ $opportunity->status === 'Open' ? 'bg-green-100 text-green-800' : 
                                              ($opportunity->status === 'Closed' ? 'bg-red-100 text-red-800' : 
                                              'bg-yellow-100 text-yellow-800') }}">
                                            {{ $opportunity->status }}
                                        </span>
                                    </div>
                                    
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
                                    
                                    <div class="mt-5 flex flex-col sm:flex-row gap-4">
                                        <a 
                                            href="{{ route('opportunities.show', $opportunity->id) }}" 
                                            class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        >
                                            View Details
                                        </a>

                                        @auth
                                            <form action="{{ route('opportunity.apply', $opportunity->id) }}" method="POST" class="mt-3 sm:mt-0 flex-grow">
                                                @csrf
                                                <div class="flex flex-col sm:flex-row gap-2">
                                                    <textarea 
                                                        name="motivation" 
                                                        placeholder="Enter your motivation" 
                                                        required 
                                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm h-10"
                                                    ></textarea>
                                                    <button 
                                                        type="submit" 
                                                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                    >
                                                        Apply
                                                    </button>
                                                </div>
                                            </form>
                                        @else
                                            <div class="mt-3 sm:mt-0 text-gray-500 text-sm">
                                                Please <a href="{{ route('login.form') }}" class="text-indigo-600 hover:text-indigo-900 font-medium">login</a> to apply for this opportunity
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
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
                <h3 class="mt-2 text-lg font-medium text-gray-900">No opportunities available</h3>
                <p class="mt-1 text-gray-500">Check back later for new opportunities.</p>
            </div>
        @endif
    </div>

    <x-footer />
</x-app>