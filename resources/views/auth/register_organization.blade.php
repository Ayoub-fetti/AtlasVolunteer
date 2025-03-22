<x-app>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6">Register as Organization</h1>
            <form action="{{ route('register.organization') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="organization_name" class="block text-sm font-medium text-gray-700">Organization Name</label>
                    <input type="text" id="organization_name" name="organization_name" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" id="phone" name="phone" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="3"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                </div>


                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">
                    Register as Organization
                </button>
            </form>
        </div>
    </div>
</x-app>
