<x-app>
    <a href="{{route('donation.list')}}"> 
        Your Donation List 
    </a>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ ('Liste des Donations') }}
    </h2>
    <ul>
        @foreach ($donations as $donation)
        <img src="{{ asset('storage/' . $donation->image )}}" alt="{{ $donation->title }}" style="width: 100px; height: 100px;">
            <li>{{ $donation->title }}</li>
            <li>{{ $donation->description }}</li>
            <li>{{ $donation->location->place_name}}</li>
            <li>{{ $donation->status }}</li>
            <a href="{{ route('donation.show', $donation->id) }}" class="text-orange-500">View Details</a>
            <a href="#" class="text-blue-500">Apply</a>
        @endforeach
    </ul>
</x-app>