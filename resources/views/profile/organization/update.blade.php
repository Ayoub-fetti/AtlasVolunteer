<x-app>
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-indigo-800">
                    {{ ('Modifier une Opportunité') }}
                </h2>
                <p class="mt-2 text-gray-600">Mettez à jour les informations de cette opportunité</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 sm:p-8">
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-5" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    
                    <form action="{{ route('opportunity.update', $opportunity->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="col-span-2">
                                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                                <input type="text" id="title" name="title" value="{{ old('title', $opportunity->title) }}" 
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                @error('title')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                                <select id="category" name="category" 
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                    <option value="">Sélectionnez une catégorie</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ (int) old('category', $opportunity->category) === (int) $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Location -->
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">Localisation</label>
                                <select id="location" name="location" 
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                    <option value="">Sélectionnez une localisation</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}" {{ old('location', $opportunity->location_id) == $location->id ? 'selected' : '' }}>
                                            {{ $location->place_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('location')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Country & State -->
                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700">Pays</label>
                                <input type="text" id="country" name="country" value="{{ old('country', $opportunity->country) }}"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                @error('country')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="state" class="block text-sm font-medium text-gray-700">Région/État</label>
                                <input type="text" id="state" name="state" value="{{ old('state', $opportunity->state) }}"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                @error('state')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea id="description" name="description" rows="4"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">{{ old('description', $opportunity->description) }}</textarea>
                                @error('description')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Start/End Dates -->
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Date de début</label>
                                <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $opportunity->start_date) }}"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                @error('start_date')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700">Date de fin</label>
                                <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $opportunity->end_date) }}"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                @error('end_date')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Start/End Times -->
                            <div>
                                <label for="start_time" class="block text-sm font-medium text-gray-700">Heure de début</label>
                                <input type="time" id="start_time" name="start_time" value="{{ old('start_time', $opportunity->start_time) }}"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                @error('start_time')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="end_time" class="block text-sm font-medium text-gray-700">Heure de fin</label>
                                <input type="time" id="end_time" name="end_time" value="{{ old('end_time', $opportunity->end_time) }}"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                @error('end_time')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Required Volunteers -->
                            <div>
                                <label for="required_volunteers" class="block text-sm font-medium text-gray-700">Nombre de bénévoles requis</label>
                                <input type="number" id="required_volunteers" name="required_volunteers" value="{{ old('required_volunteers', $opportunity->required_volunteers) }}"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                @error('required_volunteers')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                                <select id="status" name="status" 
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                    <option value="">Sélectionnez un statut</option>
                                    <option value="open" {{ old('status', $opportunity->status) == 'open' ? 'selected' : '' }}>Ouvert</option>
                                    <option value="closed" {{ old('status', $opportunity->status) == 'closed' ? 'selected' : '' }}>Fermé</option>
                                    <option value="completed" {{ old('status', $opportunity->status) == 'completed' ? 'selected' : '' }}>Terminé</option>
                                    <option value="canceled" {{ old('status', $opportunity->status) == 'canceled' ? 'selected' : '' }}>Annulé</option>
                                </select>
                                @error('status')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Cover Image -->
                            <div class="col-span-2">
                                <label for="cover" class="block text-sm font-medium text-gray-700 mb-2">Image de couverture</label>
                                
                                <div id="image-preview-container" class="mb-4 {{ $opportunity->cover ? '' : 'hidden' }}">
                                    @if($opportunity->cover)
                                        <img id="image-preview" src="{{ asset('storage/' . $opportunity->cover) }}" 
                                            alt="Cover" class="w-full h-40 object-cover rounded-md">
                                    @endif
                                </div>

                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="cover" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                                <span>Télécharger une image</span>
                                                <input id="cover" name="cover" type="file" class="sr-only" accept="image/*" onchange="previewImage(this)">
                                            </label>
                                            <p class="pl-1">ou glisser-déposer</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF jusqu'à 2MB
                                        </p>
                                    </div>
                                </div>
                                @error('cover')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end space-x-3 pt-5 border-t border-gray-200">
                            <a href="{{ route('opportunity.index') }}" class="px-4 py-2 bg-gray-100 text-gray-800 rounded-lg shadow-sm hover:bg-gray-200 transition">
                                Annuler
                            </a>
                            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-lg shadow-sm hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                Mettre à jour l'opportunité
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>