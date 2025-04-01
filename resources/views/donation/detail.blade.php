<x-app>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $donation->title }}</h1>
        <p class="text-gray-700 mb-2"><strong>Description:</strong> {{ $donation->description }}</p>
        <p class="text-gray-700 mb-2"><strong>Location:</strong> {{ $donation->location->place_name ?? 'N/A' }}</p>
        <p class="text-gray-700 mb-2"><strong>Status:</strong> {{ ucfirst($donation->status) }}</p>
        <p class="text-gray-700 mb-2"><strong>Cover:</strong></p>
        @if($donation->image)
            <img src="{{ asset('storage/' . $donation->image) }}" alt="Opportunity Cover" class="w-full h-auto mt-2">
        @else
            <p>No cover image available.</p>
        @endif
    </div>
</x-app>