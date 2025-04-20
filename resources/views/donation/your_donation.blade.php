<x-app>
    @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-5" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif
    
    <div class="mb-5">
        <a href="{{route('donation.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2.5">
            Create Donation
        </a>
    </div>
    
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-2xl font-bold mb-4">Your Donations</h2>
        
        @if($donations->isEmpty())
            <p class="text-gray-500">You haven't made any donations yet.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">Title</th>
                            <th class="py-2 px-4 border-b text-left">Location</th>
                            <th class="py-2 px-4 border-b text-left">Status</th>
                            <th class="py-2 px-4 border-b text-left">Date</th>
                            <th class="py-2 px-4 border-b text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donations as $donation)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $donation->title }}</td>
                            <td class="py-2 px-4 border-b">{{ $donation->description }}</td>
                            <td class="py-2 px-4 border-b">{{ $donation->status }}</td>
                            <td class="py-2 px-4 border-b">{{ $donation->created_at->format('d/m/Y') }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('donation.show', $donation->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">View</a>
                                <a href="{{ route('donation.edit', $donation->id) }}" class="text-yellow-500 hover:text-yellow-700 mr-2">Edit</a>
                                <form action="{{ route('donation.destroy', $donation->id) }}" method="POST"             onsubmit="return confirm('Are you sure you want to delete this Donation?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 mr-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <x-footer />
</x-app>
