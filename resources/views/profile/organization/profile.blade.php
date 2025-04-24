<x-app>
    
    <div class="container mx-auto mt-10 px-4 sm:px-6 lg:px-8 mb-16">
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
        <!-- Profile Header -->
        <div class="relative">
            <!-- Cover Image -->
            <div class="h-64 w-full rounded-lg overflow-hidden bg-gradient-to-r from-blue-400 to-indigo-500 shadow-lg">
                @if(optional($organization)->cover)
                    <img src="{{ asset('storage/' . $organization->cover) }}" alt="Cover" class="w-full h-full object-cover">
                @endif
            </div>
            
            <!-- Profile Picture/Logo -->
            <div class="absolute -bottom-16 left-8">
                <div class="h-32 w-32 rounded-full overflow-hidden border-4 border-white shadow-lg bg-white">
                    @if(optional($organization)->logo)
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
            
            <!-- Edit Cover Button -->
            <button id="edit-cover-btn" class="absolute top-4 right-4 bg-white/50 backdrop-blur-sm hover:bg-white/80 p-2 rounded-full shadow transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </button>
        </div>
        
        <!-- Profile Info -->
        <div class="mt-20 mb-8 flex flex-col md:flex-row md:items-end justify-between">
            <div class="ml-12">
                <h1 class="text-3xl font-bold text-gray-900">{{ ucfirst(optional($organization)->organization_name) }}</h1>
            </div>
            <button id="edit-profile-btn" class="mt-4 md:mt-0 px-4 py-2 bg-gradient-to-r from-blue-800 to-blue-400 text-white rounded-4xl hover:bg-indigo-700 transition flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Modifier le profil
            </button>
        </div>
        
        <!-- Profile Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Bio and Stats -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h2 class="text-xl font-semibold mb-4">About</h2>
                    <p class="text-gray-700">{{ optional($organization)->bio ?? 'No bio information added yet.' }}</p>
                </div>
                
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h2 class="text-xl font-semibold mb-4">Contact Information</h2>
                    <div class="space-y-3">
                        @if(optional($user)->phone)
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>{{ $user->phone }}</span>
                            </div>
                        @endif
                        @if(optional($user)->email)
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $user->email }}</span>
                            </div>
                        @endif
                        @if(optional($organization)->website)
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                                <a href="{{ $organization->website }}" target="_blank" class="text-indigo-600 hover:text-indigo-800">{{ $organization->website }}</a>
                            </div>
                        @endif
                        @if(optional($user)->address)
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ $user->address }}, {{ $user->city }}, {{ $user->state }} {{ $user->zip }}, {{ $user->country }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Contact Info and Social Media -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h2 class="text-xl font-semibold mb-4">Social Media</h2>
                    <div class="flex flex-wrap gap-4">
                        @if(optional($user)->facebook)
                            <a href="{{ $user->facebook }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                                </svg>
                            </a>
                        @endif
                        
                        @if(optional($user)->twitter)
                            <a href="{{ $user->twitter }}" target="_blank" class="text-blue-400 hover:text-blue-600">
                                <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>
                        @endif
                        
                        @if(optional($user)->instagram)
                            <a href="{{ $user->instagram }}" target="_blank" class="text-pink-600 hover:text-pink-800">
                                <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif
                        
                        @if(optional($user)->linkedin)
                            <a href="{{ $user->linkedin }}" target="_blank" class="text-blue-700 hover:text-blue-900">
                                <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                </svg>
                            </a>
                        @endif
                        
                        @if(!optional($user)->facebook && !optional($user)->twitter && !optional($user)->instagram && !optional($user)->linkedin)
                            <p class="text-gray-500">No social media profiles added yet.</p>
                        @endif
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">Opportunities</h2>
                        <a href="{{ route('opportunity.create') }}" class="text-indigo-600 hover:text-indigo-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span>Create opportunity</span>
                        </a>
                    </div>
                    
                    @if($opportunities->isEmpty())
                        <div class="flex flex-col items-center justify-center p-6 text-center">
                            <svg class="h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mb-1">No opportunities created</h3>
                            <p class="text-gray-500 mb-4">Create your first volunteer opportunity to attract volunteers</p>
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach($opportunities as $opportunity)
                                <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
                                    <div class="p-4">
                                        <h3 class="text-lg font-medium text-gray-900">{{ $opportunity->title }}</h3>
                                        <p class="text-gray-500 mt-1 line-clamp-2">{{ $opportunity->description }}</p>
                                        <div class="mt-3 flex flex-wrap gap-2">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                {{ ucfirst($opportunity->status) }}
                                            </span>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $opportunity->required_volunteers }} volunteers needed
                                            </span>
                                        </div>
                                        <div class="mt-4 flex flex-wrap gap-2">
                                            <a href="{{ route('opportunities.show', $opportunity->id) }}" class="text-sm mt-0.5 text-green-600 hover:text-green-800">
                                                View details
                                            </a>
                                            <a href="{{ route('opportunity.applications', $opportunity->id) }}" class="text-sm mt-0.5 text-indigo-600 hover:text-indigo-800">
                                                View applications
                                            </a>
                                            <a href="{{ route('opportunity.edit', $opportunity->id) }}" class="text-sm text-blue-600 mt-0.5 hover:text-blue-800">
                                                Edit
                                            </a>
                                            <form action="{{ route('opportunities.destroy', $opportunity->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this opportunity?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm mb-4 text-red-600 hover:text-red-800">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Edit Profile Form (Hidden by Default) -->
        <div id="profile-form" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto p-6 m-4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Edit Profile</h2>
                    <button id="close-form-btn" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <form action="{{ route('organization.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <!-- Collapsible Sections -->
                    <div class="space-y-4">
                        <!-- Media Section -->
                        <div class="border border-gray-200 rounded-lg overflow-hidden">
                            <button type="button" class="collapsible-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 transition">
                                <span class="text-lg font-medium text-gray-900">Profile Media</span>
                                <svg class="chevron-down h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="collapsible-content hidden p-4 border-t border-gray-200">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="file" id="logo" name="logo" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            @if(optional($organization)->logo)
                                                <span class="text-xs text-green-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Image actuelle
                                                </span>
                                            @endif
                                        </div>
                                        @if(optional($organization)->logo)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $organization->logo) }}" alt="Current Logo" class="w-32 h-32 object-cover rounded-md">
                                            </div>
                                        @endif
                                        @error('logo')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div>
                                        <label for="cover" class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="file" id="cover" name="cover" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            @if(optional($organization)->cover)
                                                <span class="text-xs text-green-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Image actuelle
                                                </span>
                                            @endif
                                        </div>
                                        @if(optional($organization)->cover)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $organization->cover) }}" alt="Current Cover" class="w-full h-24 object-cover rounded-md">
                                            </div>
                                        @endif
                                        @error('cover')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Organization Info Section -->
                        <div class="border border-gray-200 rounded-lg overflow-hidden">
                            <button type="button" class="collapsible-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 transition">
                                <span class="text-lg font-medium text-gray-900">Organization Information</span>
                                <svg class="chevron-down h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="collapsible-content hidden p-4 border-t border-gray-200">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="organization_name" class="block text-sm font-medium text-gray-700 mb-1">Organization Name</label>
                                        <input type="text" id="organization_name" name="organization_name" value="{{ old('organization_name', optional($organization)->organization_name) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        @error('organization_name')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="organization_type" class="block text-sm font-medium text-gray-700 mb-1">Organization Type</label>
                                        <input type="text" id="organization_type" name="organization_type" value="{{ old('organization_type', optional($organization)->organization_type) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        @error('organization_type')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                                    <textarea id="bio" name="bio" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('bio', optional($organization)->bio) }}</textarea>
                                    @error('bio')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <label for="website" class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                                    <input type="url" id="website" name="website" value="{{ old('website', optional($organization)->website) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="https://...">
                                    @error('website')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Address Section -->
                        <div class="border border-gray-200 rounded-lg overflow-hidden">
                            <button type="button" class="collapsible-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 transition">
                                <span class="text-lg font-medium text-gray-900">Address</span>
                                <svg class="chevron-down h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="collapsible-content hidden p-4 border-t border-gray-200">
                                <div class="space-y-4">
                                    <div>
                                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Street Address</label>
                                        <input type="text" id="address" name="address" value="{{ old('address', optional($user)->address) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        @error('address')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
                                            <input type="text" id="city" name="city" value="{{ old('city', optional($user)->city) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            @error('city')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="state" class="block text-sm font-medium text-gray-700 mb-1">State/Province</label>
                                            <input type="text" id="state" name="state" value="{{ old('state', optional($user)->state) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            @error('state')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="zip" class="block text-sm font-medium text-gray-700 mb-1">ZIP/Postal Code</label>
                                            <input type="text" id="zip" name="zip" value="{{ old('zip', optional($user)->zip) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            @error('zip')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                                            <input type="text" id="country" name="country" value="{{ old('country', optional($user)->country) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            @error('country')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contact Section -->
                        <div class="border border-gray-200 rounded-lg overflow-hidden">
                            <button type="button" class="collapsible-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 transition">
                                <span class="text-lg font-medium text-gray-900">Contact Information</span>
                                <svg class="chevron-down h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="collapsible-content hidden p-4 border-t border-gray-200">
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" value="{{ old('phone', optional($user)->phone) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    @error('phone')
                                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Social Media Section -->
                        <div class="border border-gray-200 rounded-lg overflow-hidden">
                            <button type="button" class="collapsible-header w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 transition">
                                <span class="text-lg font-medium text-gray-900">Social Media</span>
                                <svg class="chevron-down h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="collapsible-content hidden p-4 border-t border-gray-200">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach (['facebook', 'twitter', 'instagram', 'linkedin'] as $social)
                                        <div>
                                            <label for="{{ $social }}" class="block text-sm font-medium text-gray-700 mb-1">{{ ucfirst($social) }}</label>
                                            <input type="url" id="{{ $social }}" name="{{ $social }}" value="{{ old($social, optional($user)->$social) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="https://...">
                                            @error($social)
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-end pt-4 border-t border-gray-200">
                        <button type="submit" class="px-6 py-2 bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white font-medium rounded-md transition duration-300 shadow-md">
                            Save Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Show/Hide the Edit Profile Form
        const editProfileBtn = document.getElementById('edit-profile-btn');
        const editCoverBtn = document.getElementById('edit-cover-btn');
        const profileForm = document.getElementById('profile-form');
        const closeFormBtn = document.getElementById('close-form-btn');

        editProfileBtn.addEventListener('click', () => {
            profileForm.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        });

        editCoverBtn.addEventListener('click', () => {
            profileForm.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            // Automatically open the media section
            const mediaHeader = document.querySelector('.collapsible-header');
            const mediaContent = mediaHeader.nextElementSibling;
            mediaHeader.classList.add('active');
            mediaContent.classList.remove('hidden');
        });

        closeFormBtn.addEventListener('click', () => {
            profileForm.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Allow scrolling
        });

        // Handle collapsible sections
        document.addEventListener('DOMContentLoaded', function() {
            const collapsibles = document.querySelectorAll('.collapsible-header');
            
            collapsibles.forEach(header => {
                header.addEventListener('click', function() {
                    // Toggle active class
                    this.classList.toggle('active');
                    
                    // Toggle content visibility
                    const content = this.nextElementSibling;
                    content.classList.toggle('hidden');
                    
                    // Rotate chevron
                    const chevron = this.querySelector('.chevron-down');
                    if (this.classList.contains('active')) {
                        chevron.style.transform = 'rotate(180deg)';
                    } else {
                        chevron.style.transform = 'rotate(0)';
                    }
                });
            });
        });
    </script>
</x-app>