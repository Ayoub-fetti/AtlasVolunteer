<nav class="bg-white shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo/Site Name -->
            <div class="flex items-center">
                <a href="/" class="text-xl font-bold text-indigo-600">
                    Volunteer Connect
                </a>
            </div>
            
            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="/" class="text-gray-600 hover:text-indigo-600 transition">Home</a>
                <a href="#about" class="text-gray-600 hover:text-indigo-600 transition">About</a>
                <a href="#contact" class="text-gray-600 hover:text-indigo-600 transition">Contact</a>
            </div>
            
            <!-- Authentication Links -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('login.form') }}" class="text-gray-600 hover:text-indigo-600 transition">
                    Login
                </a>
                <div class="relative group">
                    <button class="text-gray-600 hover:text-indigo-600 transition flex items-center group-hover:text-indigo-600">
                        Register
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-all duration-300 z-10">
                        <a href="{{ route('register.form', ['role' => 'volunteer']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">
                            Register as Volunteer
                        </a>
                        <a href="{{ route('register.form', ['role' => 'organization']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">
                            Register as Organization
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</nav>