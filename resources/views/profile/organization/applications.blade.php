<x-app>
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Applications for "{{ $opportunity->title }}"</h1>

        @if($applications->count() < 0)
            <p>No applications found for this opportunity.</p>
        @else
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Volunteer Name</th>
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Motivation</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $application)
                        <tr>
                            <td class="border border-gray-300  px-4 py-2">{{ $application->user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $application->user->email }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $application->status }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $application->motivation }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="#" class="text-indigo-600 hover:text-indigo-800">Accept</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app>