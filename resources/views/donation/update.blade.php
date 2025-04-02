<x-app>
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Modifier une Donation') }}
        </h2>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <form action="{{ route('donation.update', $donation->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" name="title" id="title" value="{{ old('title', $donation->title) }}" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('title')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $donation->description) }}</textarea>
                @error('description')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Location -->
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <select id="location" name="location_id" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Sélectionnez une localisation</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}" {{ old('location', $donation->location_id) == $location->id ? 'selected' : '' }}>
                            {{ $location->place_name }}
                        </option>
                    @endforeach
                </select>
                @error('location')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                <select name="status" id="status" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="available" {{ old('status', $donation->status) == 'available' ? 'selected' : '' }}>Disponible</option>
                    <option value="reserved" {{ old('status',$donation->status) == 'reserved' ? 'selected' : '' }}>Réservé</option>
                    <option value="completed" {{ old('status',$donation->status) == 'completed' ? 'selected' : '' }}>Complété</option>
                </select>
                @error('status')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="image" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('image')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="px-4 py-2 bg-indigo-500 text-white rounded-md shadow-sm hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Edit Donation
                </button>
            </div>
        </form>
    </div>

</x-app>