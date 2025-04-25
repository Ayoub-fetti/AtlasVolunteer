<x-app>
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-indigo-800">
                    {{ ('Modifier une Donation') }}
                </h2>
                <p class="mt-2 text-gray-600">Mettez à jour les informations de votre donation</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 sm:p-8">
                    <form action="{{ route('donation.update', $donation->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="col-span-2">
                                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                                <input type="text" name="title" id="title" value="{{ old('title', $donation->title) }}" 
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                @error('title')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" rows="4"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">{{ old('description', $donation->description) }}</textarea>
                                @error('description')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Location -->
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">Localisation</label>
                                <select id="location" name="location_id" 
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
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
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                    <option value="available" {{ old('status', $donation->status) == 'available' ? 'selected' : '' }}>Disponible</option>
                                    <option value="reserved" {{ old('status',$donation->status) == 'reserved' ? 'selected' : '' }}>Réservé</option>
                                </select>
                                @error('status')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                           <!-- Image -->
                            <div class="col-span-2">
                                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                                
                                <div id="image-preview-container" class="mb-4 {{ $donation->image ? '' : 'hidden' }}">
                                    <p class="text-sm text-gray-500 mb-2">Image :</p>
                                    <div class="w-40 h-40 relative rounded-md overflow-hidden bg-gray-100">
                                        <img id="image-preview" src="{{ $donation->image ? asset('storage/' . $donation->image) : '' }}" 
                                            alt="{{ $donation->title }}" class="w-full h-full object-cover">
                                    </div>
                                </div>
                                
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="image-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500">
                                                <span>Télécharger une image</span>
                                                <input id="image-upload" name="image" type="file" class="sr-only" accept="image/*" onchange="previewImage(this)">
                                            </label>
                                            <p class="pl-1">ou glisser-déposer</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF jusqu'à 10MB
                                        </p>
                                    </div>
                                </div>
                                @error('image')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end space-x-3 pt-5 border-t border-gray-200">
                            <a href="{{ route('donation.index') }}" class="px-4 py-2 bg-gray-100 text-gray-800 rounded-lg shadow-sm hover:bg-gray-200 transition">
                                Annuler
                            </a>
                            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-lg shadow-sm hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                Mettre à jour la donation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>