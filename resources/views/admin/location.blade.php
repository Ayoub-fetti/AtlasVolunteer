<x-app>
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Gestion des emplacements</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Messages de notification -->
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


        
        <!-- Section d'ajout de catégorie -->
        <div class="mb-8 bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-xl font-semibold mb-4">Ajouter un nouvelle emplacement</h2>
                
                <form action="{{ route('admin.add.location') }}" method="POST" class="flex items-end space-x-4">
                    @csrf
                    <div class="flex-grow">
                        <label for="place_name" class="block text-sm font-medium text-gray-700 mb-1">Nom de l'emplacement</label>
                        <input type="text" name="place_name" id="place_name" required
                            class="block w-full border-gray-300 rounded-md p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Entrez le nom de l'emplacement">
                        @error('place_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" 
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex justify-center">
            <input type="text" id="searchLocations" placeholder="Rechercher des emplacements..." class="w-full p-2 mb-4 border rounded-4xl">
        </div>

        <!-- Liste des catégories -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-xl font-semibold mb-4">Liste des emplaements</h2>
                
                @if(count($locations) > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom de l'emplacement</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($locations as $location)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $location->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $location->place_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <!-- Formulaire de suppression -->
                                            <form action="{{ route('admin.delete.location', $location->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 ml-6"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet emplacement? Cette action est irréversible.')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>

                                            <!-- Bouton pour afficher le formulaire de modification -->
                                            <button onclick="toggleEditForm({{ $location->id }})" class="text-blue-600 hover:text-blue-900 ml-6">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <!-- Formulaire de modification caché -->
                                            <form id="editForm-{{ $location->id }}" action="{{ route('admin.update.location', $location->id) }}" method="POST" class="mt-4 hidden">
                                                @csrf
                                                @method('PUT')
                                                <div class="flex items-center space-x-4">
                                                    <input type="text" name="place_name" value="{{ $location->place_name }}" required
                                                        class="block w-full border-gray-300 rounded-md p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <button type="submit" 
                                                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                                        Mettre à jour
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $locations->links() }}
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900">Aucun emplacement</h3>
                        <p class="mt-1 text-gray-500">Commencez par ajouter votre première emplacement.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app>

<script>
    function toggleEditForm(id) {
        const form = document.getElementById(`editForm-${id}`);
        form.classList.toggle('hidden');
    }
</script>
