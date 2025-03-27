<x-app>
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-5" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Organization Profile</h1>

        <form action="{{ route('organization.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Organization Name --}}
            <div class="mb-4">
                <label for="organization_name" class="block text-sm font-medium text-gray-700">Organization Name</label>
                <input type="text" id="organization_name" name="organization_name" value="{{ old('organization_name', optional($organization)->organization_name) }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('organization_name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Organization Type --}}
            <div class="mb-4">
                <label for="organization_type" class="block text-sm font-medium text-gray-700">Organization Type</label>
                <input type="text" id="organization_type" name="organization_type" value="{{ old('organization_type', optional($organization)->organization_type) }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('organization_type')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
                {{-- Phone --}}
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', optional($user)->phone) }}" 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('phone')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                {{-- {{ address }} --}}
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" id="address" name="address" value="{{ old('address', optional($user)->address) }}" 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('address')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                {{-- City --}}
                <div class="mb-4">
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" id="city" name="city" value="{{ old('city', optional($user)->city) }}" 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('city')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                {{-- zip --}}
                <div class="mb-4">
                    <label for="zip" class="block text-sm font-medium text-gray-700">Zip Code</label>
                    <input type="text" id="zip" name="zip" value="{{ old('zip', optional($user)->zip) }}" 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('zip')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                    
                {{-- State --}}
                <div class="mb-4">
                    <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                    <input type="text" id="state" name="state" value="{{ old('state', optional($user)->state) }}" 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('state')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                    
            {{-- Country --}}
            <div class="mb-4">
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <input type="text" id="country" name="country" value="{{ old('country', optional($user)->country) }}" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('country')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Bio --}}
            <div class="mb-4">
                <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                <textarea id="bio" name="bio" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('bio', optional($organization)->bio) }}</textarea>
                @error('bio')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- Website --}}
            <div class="mb-4">
                <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                <input type="url" id="website" name="website" value="{{ old('website', optional($organization)->website) }}" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('website')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- Social Media Links --}}
            <div class="grid grid-cols-2 gap-4">
                @foreach (['facebook', 'twitter', 'instagram', 'linkedin'] as $social)
                    <div class="mb-4">
                        <label for="{{ $social }}" class="block text-sm font-medium text-gray-700">{{ ucfirst($social) }}</label>
                        <input type="url" id="{{ $social }}" name="{{ $social }}" value="{{ old($social, optional($user)->$social) }}" 
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error($social)
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>

            {{-- Logo --}}
            <div class="mb-4">
                <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
                <input type="file" id="logo" name="logo"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @if(optional($organization)->logo)
                    <img src="{{ asset('storage/' . $organization->logo) }}" alt="logo" class="mt-2 w-32 h-32 object-cover rounded-md">
                @endif
                @error('logo')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Cover --}}
            <div class="mb-4">
                <label for="cover" class="block text-sm font-medium text-gray-700">Cover</label>
                <input type="file" id="cover" name="cover"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @if(optional($organization)->cover)
                    <img src="{{ asset('storage/' . $organization->cover) }}" alt="Cover" class="mt-2 w-full h-32 object-cover rounded-md">
                @endif
                    @error('cover')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="mt-6">
                <button type="submit"
                    class="px-4 py-2 bg-indigo-500 text-white rounded-md shadow-sm hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </form>
    </div>

    <div>
        <a href="{{route('opportunity.create') }}" class="mt-4 block text-indigo-500 hover:text-indigo-600"> 
            Create opportunity
        </a>
    </div>

    <div class="mt-10">
    <h2 class="text-xl font-bold mb-5">Vos Opportunités</h2>
    @if($opportunities->isEmpty())
        <p class="text-gray-500">Aucune opportunité créée pour le moment.</p>
    @else
        <ul class="space-y-4">
            @foreach($opportunities as $opportunity)
                <li class="border p-4 rounded-md shadow-sm">
                    <h3 class="text-lg font-semibold">{{ $opportunity->title }}</h3>
                    <p class="text-sm text-gray-600">{{ $opportunity->description }}</p>
                    <a href="{{ route('opportunities.show', $opportunity->id) }}" class="text-indigo-500 hover:underline">Voir les détails</a>
                <!-- Delete Button -->
                <form action="{{ route('opportunities.destroy', $opportunity->id) }}" method="POST"             onsubmit="return confirm('Are you sure you want to delete this opportunity?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>

</x-app>