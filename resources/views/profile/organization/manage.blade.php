<x-app>
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="px-6 py-8">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Gérer la Candidature</h1>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full 
                            {{ $application->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $application->status == 'approved' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $application->status == 'rejected' ? 'bg-red-100 text-red-800' : '' }}
                            {{ $application->status == 'completed' ? 'bg-blue-100 text-blue-800' : '' }}">
                            {{ ucfirst($application->status) }}
                        </span>
                    </div>

                    <!-- Volunteer Information Card -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-8 border border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="h-6 w-6 text-indigo-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Informations du Volontaire
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Nom</p>
                                <p class="font-medium">
                                    <a href="{{ route('user.profile', $application->user->id) }}" class="text-indigo-600 hover:text-indigo-800">
                                        {{ ucfirst($application->user->name) }} (voir le profile)
                                    </a>
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Email</p>
                                <p class="font-medium">{{ $application->user->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Téléphone</p>
                                <p class="font-medium">{{ $application->user->phone ?? 'Non spécifié' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Date d'approbation</p>
                                <p class="font-medium">{{ $application->approved_at ?? 'Non définie' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Heures servies</p>
                                <p class="font-medium">{{ $application->hours_served ?? '0' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Date de fin</p>
                                <p class="font-medium">{{ $application->completed_at ?? 'Non définie' }}</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <p class="text-sm text-gray-500">Motivation</p>
                            <div class="mt-1 p-3 bg-white border border-gray-200 rounded-md">
                                <p class="font-medium">{{ $application->motivation }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Update Form -->
                    <form action="{{ route('opportunity.management', $application->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="h-6 w-6 text-indigo-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Mettre à jour le statut
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                                <select id="status" name="status" 
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                    <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>En attente</option>
                                    <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>Approuvé</option>
                                    <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejeté</option>
                                    <option value="completed" {{ $application->status == 'completed' ? 'selected' : '' }}>Terminé</option>
                                </select>
                                @error('status')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Approved Date -->
                            <div>
                                <label for="approved_at" class="block text-sm font-medium text-gray-700">Date d'approbation</label>
                                <input type="date" id="approved_at" name="approved_at" value="{{ old('approved_at', $application->approved_at) }}"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                @error('approved_at')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Hours Served -->
                            <div>
                                <label for="hours_served" class="block text-sm font-medium text-gray-700">Heures servies</label>
                                <input type="number" id="hours_served" name="hours_served" value="{{ old('hours_served', $application->hours_served) }}"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                @error('hours_served')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Completion Date -->
                            <div>
                                <label for="completed_at" class="block text-sm font-medium text-gray-700">Date de fin</label>
                                <input type="date" id="completed_at" name="completed_at" value="{{ old('completed_at', $application->completed_at) }}"
                                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                                @error('completed_at')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end space-x-3 mt-8 pt-5 border-t border-gray-200">
                            <a href="{{ route('opportunity.applications', $application->opportunity_id) }}" class="px-4 py-2 bg-gray-100 text-gray-800 rounded-lg shadow-sm hover:bg-gray-200 transition">
                                Retour aux candidatures
                            </a>
                            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-lg shadow-sm hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                Mettre à jour l'application
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>