<x-app>
    <!-- Admin Dashboard Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="px-4 py-6 sm:px-0 mb-8">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg shadow-lg overflow-hidden">
                <div class="px-6 py-8 md:p-10">
                    <h2 class="text-2xl font-bold text-white mb-2">Bienvenue sur le tableau de bord administrateur</h2>
                    <p class="text-blue-100">Gérer votre plateforme de volontariat et suivre son évolution.</p>
                </div>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="mt-8 px-4 sm:px-0">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Vue d'ensemble</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Volunteers Stat -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div class="ml-5">
                                <p class="text-gray-500 text-sm">Volontaires</p>
                                <h3 class="text-3xl font-bold text-gray-900">{{ $totalVolunteers }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Organizations Stat -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="ml-5">
                                <p class="text-gray-500 text-sm">Organisations</p>
                                <h3 class="text-3xl font-bold text-gray-900">{{ $totalOrganization }}</h3>
                            </div>
                        </div>
 
                    </div>
                </div>

                <!-- Opportunities Stat -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-5">
                                <p class="text-gray-500 text-sm">Opportunités</p>
                                <h3 class="text-3xl font-bold text-gray-900">{{ $totalOpportunities }}</h3>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="text-sm text-green-500 hover:underline">Voir toutes les opportunités →</a>
                        </div>
                    </div>
                </div>

                <!-- Donations Stat -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-5">
                                <p class="text-gray-500 text-sm">Donations</p>
                                <h3 class="text-3xl font-bold text-gray-900">{{ $totalDonation }}</h3>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="text-sm text-purple-500 hover:underline">Voir toutes les donations →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>