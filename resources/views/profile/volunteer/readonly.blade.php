<x-app>
    <div class="container mx-auto mt-10 px-4 sm:px-6 lg:px-8 mb-16">
        <!-- Profile Header -->
        <div class="relative">
            <!-- Cover Image -->
            <div class="h-64 w-full rounded-lg overflow-hidden bg-gradient-to-r from-blue-400 to-indigo-500 shadow-lg">
                @if(optional($user->volunteer)->cover)
                    <img src="{{ asset('storage/' . $user->volunteer->cover) }}" alt="Cover" class="w-full h-full object-cover">
                @endif
            </div>
            
            <!-- Profile Picture -->
            <div class="absolute -bottom-16 left-8">
                <div class="h-32 w-32 rounded-full overflow-hidden border-4 border-white shadow-lg bg-white">
                    @if(optional($user->volunteer)->profile_picture)
                        <img src="{{ asset('storage/' . $user->volunteer->profile_picture) }}" alt="Profile Picture" class="w-full h-full object-cover">
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
                <h1 class="text-3xl font-bold text-gray-900">{{ ucfirst($user->name) }}</h1>
                <p class="text-gray-600 mt-1">" {{ optional($user->volunteer)->function ?? 'Volunteer' }} "</p>
                <h1 class="text-gray-900 mt-1 text-2xl"> Total d'heures de bénévolat : <span class="font-bold">{{ optional($user->volunteer)->total_hours }}</span></h1>
            </div>
        </div>

        <!-- Additional Info -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Bio and Stats -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h2 class="text-xl font-semibold mb-4">About</h2>
                    <p class="text-gray-700">{{ optional($user->volunteer)->bio ?? 'No bio information added yet.' }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app>