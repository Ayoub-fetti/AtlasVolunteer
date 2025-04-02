<x-app>
    @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-5" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    @if (session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-5" role="alert">
        <p>{{ session('error') }}</p>
    </div>
    @endif

    <h1>hello this is home page</h1>
    <a href="{{ auth()->user()->role === 'volunteer' ? route('profile.index') : route('organization.index') }}"> 
        Go to profile
    </a>
    <br>
    <a href="{{route('donation.index')}}"> 
        Go to Donation
    </a>

    @if($opportunities->count() > 0)
    <div class="opportunities-list mt-4">
        <h2>Available Opportunities</h2>
        <ul>
            @foreach($opportunities as $opportunity)
            <li>
                <img src="{{ asset('storage/' . $opportunity->cover )}}" alt="{{ $opportunity->title }}" style="width: 100px; height: 100px;">
                <h3>{{ $opportunity->title }}</h3>
                <p>{{ $opportunity->description }}</p>
                <p>Category: {{ $opportunity->category }}</p>
                <p>Location: {{ $opportunity->location->place_name }}</p>
                <h3>Status: {{$opportunity->status}}</h3>
                <a href="{{ route('opportunities.show', $opportunity->id) }}" class="text-orange-500">View Details</a>
                <form action="{{ route('opportunity.apply', $opportunity->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <textarea name="motivation" placeholder="Enter your motivation" required class="border rounded p-2"></textarea>
                    <button type="submit" class="text-blue-500">Apply</button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>
    @else
    <p>No opportunities available</p>
    @endif
</x-app>