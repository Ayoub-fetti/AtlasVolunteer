<x-app>
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Mes Applications</h1>

        @if($applications->isEmpty())
            <p class="text-gray-500">Vous n'avez postulé à aucune opportunité pour le moment.</p>
        @else
            <ul class="space-y-4">
                @foreach($applications as $application)
                    <li class="border p-4 rounded-md shadow-sm">
                        <h3 class="text-lg font-semibold">Opportunité : {{ $application->opportunity->title }}</h3>
                        <p class="text-sm text-gray-600">Motivation : {{ $application->motivation }}</p>
                        <p class="text-sm text-gray-600">Statut : {{ ucfirst($application->status) }}</p>
                        <p class="text-sm text-gray-600">Heures servies : {{ $application->hours_served ?? 'Non spécifié' }}</p>
                        <p class="text-sm text-gray-600">Date de soumission : {{ $application->created_at->format('d/m/Y') }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-app>