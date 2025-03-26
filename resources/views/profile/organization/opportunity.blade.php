<x-app>
    <div class="mt-10">
        <h2 class="text-xl font-bold mb-5">Créer une Opportunité</h2>
    
        <form action="{{ route('opportunity.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Titre de l'opportunité --}}
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" id="title" name="title" value="{{ old('title')}}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('title')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- categorie de l'ooportunites  --}}
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <select id="category" name="category" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Sélectionnez une catégorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- location --}}
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <select id="location" name="location" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Sélectionnez une localisation</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}" {{ old('location') == $location->id ? 'selected' : '' }}>
                            {{ $location->place_name }}
                        </option>
                    @endforeach
                </select>
                @error('location')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- state  --}}
            <div class="mb-4">
                <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                <input type="text" id="state" name="state" value="{{ old('state') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('state')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- country  --}}
            <div class="mb-4">
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <input type="text" id="country" name="country" value="{{ old('country') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('country')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            {{-- Description --}}
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            {{-- Date de début --}}
            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-700">Date de début</label>
                <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('start_date')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
    
            {{-- Date de fin --}}
            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-700">Date de fin</label>
                <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('end_date')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- heure de début --}}
            <div class="mb-4">
                <label for="start_time" class="block text-sm font-medium text-gray-700">Heure de début</label>
                <input type="time" id="start_time" name="start_time" value="{{ old('start_time') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('start_time')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- heure de fin --}}
            <div class="mb-4">
                <label for="end_time" class="block text-sm font-medium text-gray-700">Heure de fin</label>
                <input type="time" id="end_time" name="end_time" value="{{ old('end_time') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('end_time')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- required volunteers --}}
            <div class="mb-4">
                <label for="required_volunteers" class="block text-sm font-medium text-gray-700">Required_volunteers</label>
                <input type="number" id="required_volunteers" name="required_volunteers" value="{{ old('required_volunteers') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('required_volunteers')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- status --}}
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                <select id="status" name="status" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Sélectionnez un statut</option>
                    <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Ouvert</option>
                    <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Fermé</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Terminé</option>
                    <option value="canceled" {{ old('status') == 'canceled' ? 'selected' : '' }}>Annulé</option>
                </select>
                @error('status')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
    
                {{-- Cover --}}
                <div class="mb-4">
                    <label for="cover" class="block text-sm font-medium text-gray-700">Cover</label>
                    <input type="file" id="cover" name="cover"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @if(optional($opportunity)->cover)
                        <img src="{{ asset('storage/' . $opportunity->cover) }}" alt="Cover" class="mt-2 w-full h-32 object-cover rounded-md">
                    @endif
                        @error('cover')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
    
            {{-- Bouton de soumission --}}
            <div class="mt-6">
                <button type="submit"
                    class="px-4 py-2 bg-indigo-500 text-white rounded-md shadow-sm hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Créer l'opportunité
                </button>
            </div>
        </form>
    </div>
</x-app>