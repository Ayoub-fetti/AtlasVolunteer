<x-app>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6">Login</h1>
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">
                    Login
                </button>
            </form>
            <hr>

            <!-- Add Google Login Button -->
            <a href="{{ url('/auth/google') }}" class="btn btn-danger">
                Login with Google
            </a>
        </div>
    </div>
</x-app>
