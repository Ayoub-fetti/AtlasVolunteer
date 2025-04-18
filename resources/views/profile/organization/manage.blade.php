<x-app>
            @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-5" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Gérer l'Application</h1>

        <div class="mb-6">
            <h2 class="text-xl font-semibold">Informations du Volontaire</h2>
            <p><strong>Nom :</strong> {{ $application->user->name }}</p>
            <p><strong>Email :</strong> {{ $application->user->email }}</p>
            <p><strong>Téléphone :</strong> {{ $application->user->phone ?? 'Non spécifié' }}</p>
            <p><strong>Motivation :</strong> {{ $application->motivation }}</p>
            <p><strong>Statut Actuel :</strong> {{ ucfirst($application->status) }}</p>
            <p><strong>Date d'approbation :</strong> {{($application->approved_at ?? 'Not yet') }}</p>
            <p><strong>Heures servies :</strong> {{($application->hours_served ?? 'Not yet') }}</p>
            <p><strong>Date de fin :</strong> {{($application->completed_at ?? 'Not yet') }}</p>
        </div>

        <form action="{{ route('opportunity.management', $application->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            
            {{-- Statut --}}
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                <select id="status" name="status" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>pending</option>
                    <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>approved</option>
                    <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>rejected</option>
                    <option value="completed" {{ $application->status == 'completed' ? 'selected' : '' }}>completed</option>
                </select>
                @error('status')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- Date d'approbation --}}
            <div class="mb-4">
                <label for="approved_at" class="block text-sm font-medium text-gray-700">Date d'approbation</label>
                <input type="date" id="approved_at" name="approved_at" value="{{ old('approved_at', $application->approved_at) }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('approved_at')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- Heures servies --}}
            <div class="mb-4">
                <label for="hours_served" class="block text-sm font-medium text-gray-700">Heures servies</label>
                <input type="number" id="hours_served" name="hours_served" value="{{ old('hours_served', $application->hours_served) }}"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('hours_served')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- Date de fin --}}
            <div class="mb-4">
                <label for="completed_at" class="block text-sm font-medium text-gray-700">Date de fin</label>
                <input type="date" id="completed_at" name="completed_at" value="{{ old('completed_at', $application->completed_at) }}"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('completed_at')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- Bouton de soumission --}}
            <div class="mt-6">
                <button type="submit"
                class="px-4 py-2 bg-indigo-500 text-white rounded-md shadow-sm hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Mettre à jour l'application
            </button>
            </div>
        </form>
    </div>
</x-app>