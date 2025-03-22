<x-app>
    <div class="relative min-h-screen flex flex-col items-center justify-center bg-gray-50 dark:bg-black">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-black dark:text-white mb-6">Welcome to Volunteer Connect Platform</h1>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-8">
                    Join us today and make a difference in your community!
                </p>
                <div class="flex gap-4">
                    <!-- Button for Volunteer Registration -->
                    <x-button href="{{ route('register.form', ['role' => 'volunteer']) }}" class="bg-blue-500 hover:bg-blue-600 text-white">
                        Join Us as Volunteer
                    </x-button>
                    <!-- Button for Organization Registration -->
                    <x-button href="{{ route('register.form', ['role' => 'organization']) }}" class="bg-green-500 hover:bg-green-600 text-white">
                        Join Us as Organization
                    </x-button>
                    <x-button href="{{ route('login.form') }}" class="bg-green-500 hover:bg-green-600 text-white">
                        Login
                    </x-button>
                </div>
            </div>
        </div>
</x-app>