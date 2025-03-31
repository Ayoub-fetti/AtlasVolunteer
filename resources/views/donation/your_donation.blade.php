<x-app>
    @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-5" role="alert">
        <p>{{ session('success') }}</p>
    </div>
@endif
    <a href="{{route('donation.create')}}"> 
        Create Donation
    </a>
</x-app>