<x-app>
    <h1>hello this is home page</h1>
    <a href="{{ auth()->user()->role === 'volunteer' ? route('profile.index') : route('organization.index') }}"> 
        Go to profile
    </a>

    @if($opportunities->count() > 0)
    <div class="opportunities-list mt-4">
        <h2>Available Opportunities</h2>
        <ul>
            @foreach($opportunities as $opportunity)
            <li>
                <h3>{{ $opportunity->title }}</h3>
                <p>{{ $opportunity->description }}</p>
                <p>Category: {{ $opportunity->category }}</p>
                <p>Location: {{ $opportunity->location->place_name }}</p>
                <a href="{{ route('opportunities.show', $opportunity->id) }}">View Details</a>
            </li>
            @endforeach
        </ul>
    </div>
    @else
    <p>No opportunities available</p>
    @endif
</x-app>