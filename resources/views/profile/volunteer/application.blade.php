<x-app>
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-indigo-800">
                    Mes Applications de Bénévolat
                </h1>
                <p class="mt-2 text-gray-600">Suivez le statut de vos candidatures pour les opportunités de bénévolat.</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                @if($applications->isEmpty())
                    <div class="flex flex-col items-center justify-center p-12">
                        <svg class="h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-1">Aucune candidature trouvée</h3>
                        <p class="text-gray-500 mb-6">Vous n'avez pas encore postulé à des opportunités de bénévolat.</p>
                        <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Découvrir des opportunités
                        </a>
                    </div>
                @else
                    <div class="overflow-hidden">
                        <ul class="divide-y divide-gray-200">
                            @foreach($applications as $application)
                                <li class="p-6 hover:bg-gray-50 transition duration-150">
                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center mb-2">
                                                <h3 class="text-xl font-semibold text-gray-900">{{ $application->opportunity->title }}</h3>
                                                <span class="ml-3 px-3 py-1 text-xs font-medium rounded-full 
                                                    @if($application->status == 'pending') bg-yellow-100 text-yellow-800
                                                    @elseif($application->status == 'approved') bg-green-100 text-green-800
                                                    @elseif($application->status == 'rejected') bg-red-100 text-red-800
                                                    @elseif($application->status == 'completed') bg-blue-100 text-blue-800
                                                    @endif">
                                                    {{ ucfirst($application->status) }}
                                                </span>
                                            </div>
                                            
                                            <div class="mt-1 grid grid-cols-1 gap-y-3 sm:grid-cols-2 gap-x-4">
                                                <div class="flex items-center text-sm text-gray-600">
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-500 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    Soumis le {{ $application->created_at->format('d/m/Y') }}
                                                </div>
                                                
                                                <div class="flex items-center text-sm text-gray-600">
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-500 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    Heures servies: {{ $application->hours_served ?? 'Non spécifié' }}
                                                </div>
                                            </div>
                                            
                                            <div class="mt-3">
                                                <div class="flex items-start">
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <div class="ml-2">
                                                        <p class="text-sm text-gray-600 leading-relaxed">{{ $application->motivation }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-4 md:mt-0 flex md:flex-col items-center space-x-2 md:space-x-0 md:space-y-2">
                                            <a href="{{ route('opportunities.show', $application->opportunity->id) }}" class="flex items-center px-3 py-1.5 text-sm font-medium text-indigo-600 hover:text-indigo-800">
                                                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Voir l'opportunité
                                            </a>
                                            
                                            @if($application->status == 'completed')
                                                <a href="#" class="flex items-center px-3 py-1.5 text-sm font-medium text-green-600 hover:text-green-800">
                                                    <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    Télécharger le certificat
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            
            <div class="mt-8 flex justify-center">
                <a href="{{ route('profile.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="h-5 w-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Retour aux Profile
                </a>
            </div>
        </div>
    </div>
</x-app>