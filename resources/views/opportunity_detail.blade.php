<x-app>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $opportunity->title }}</h1>
        <p class="text-gray-700 mb-2"><strong>Description:</strong> {{ $opportunity->description }}</p>
        <p class="text-gray-700 mb-2"><strong>Category:</strong> {{ $opportunity->categories->category_name ?? 'N/A' }}</p>
        <p class="text-gray-700 mb-2"><strong>Location:</strong> {{ $opportunity->location->place_name ?? 'N/A' }}</p>
        <p class="text-gray-700 mb-2"><strong>Start Date:</strong> {{ $opportunity->start_date }}</p>
        <p class="text-gray-700 mb-2"><strong>End Date:</strong> {{ $opportunity->end_date }}</p>
        <p class="text-gray-700 mb-2"><strong>Status:</strong> {{ ucfirst($opportunity->status) }}</p>
        <p class="text-gray-700 mb-2"><strong>Required Volunteers:</strong> {{ $opportunity->required_volunteers }}</p>
        <p class="text-gray-700 mb-2"><strong>Registered Volunteers:</strong> {{ $opportunity->registered_volunteers ?? 0 }}</p>
        <p class="text-gray-700 mb-2"><strong>Organization:</strong> {{ $opportunity->organization->name ?? 'N/A' }}</p>
        <p class="text-gray-700 mb-2"><strong>Country:</strong> {{ $opportunity->country }}</p>
        <p class="text-gray-700 mb-2"><strong>State:</strong> {{ $opportunity->state ?? 'N/A' }}</p>
        <p class="text-gray-700 mb-2"><strong>Cover:</strong></p>
        @if($opportunity->cover)
            <img src="{{ asset('storage/' . $opportunity->cover) }}" alt="Opportunity Cover" class="w-full h-auto mt-2">
        @else
            <p>No cover image available.</p>
        @endif
    </div>
    <x-footer />
</x-app>