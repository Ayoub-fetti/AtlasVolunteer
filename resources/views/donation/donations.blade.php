<x-app>
    <a href="{{route('donation.list')}}"> 
        Your Donation List 
    </a>
    <ul>
        @foreach ($donations as $donation)
        <img src="{{ asset('storage/' . $donation->image )}}" alt="{{ $donation->title }}" style="width: 100px; height: 100px;">
            <li>{{ $donation->title }}</li>
            <li>{{ $donation->description }}</li>
            <li>{{ $donation->location->place_name}}</li>
            <li>{{ $donation->status }}</li>
        @endforeach
    </ul>
</x-app>