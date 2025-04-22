<nav class="bg-white shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo/Site Name -->
            <div class="flex items-center">
                <a href="/" class="text-xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">
                    AtlasVolunteer
                </a>
            </div>
            
            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="/" class="{{ request()->is('/') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">Home</a>
                
                <a href="/about" class="{{ request()->is('about') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">About</a>
                
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-indigo-600  border-b-2 border-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">Opportunities</a>
                
                <a href="{{ route('donation.index') }}" class="{{ request()->routeIs('donation.index') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">Donations</a>
                
                <a href="/contact" class="{{ request()->is('contact') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">Contact</a>
                
                @auth
                <a href="{{ auth()->user()->role === 'volunteer' ? route('profile.index') : route('organization.index') }}" 
                   class="{{ request()->routeIs('profile.index') || request()->routeIs('organization.index') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">
                    Profile
                </a>
                
                <a href="{{ route('messages.index') }}" class="{{ request()->routeIs('messages.index') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">
                    Messages
                </a>
                @endauth
            </div>
            
            <!-- Authentication Links -->
            <div class="flex items-center space-x-4">
                @guest
                <a href="{{ route('login.form') }}" class="{{ request()->routeIs('login.form') ? 'text-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">
                    Login
                </a>
                <div class="relative group">
                    <button class="{{ request()->routeIs('register.form') ? 'text-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition flex items-center group-hover:text-indigo-600">
                        Register
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-all duration-300 z-10">
                        <a href="{{ route('register.form', ['role' => 'volunteer']) }}" class="block px-4 py-2 text-sm {{ request()->is('*/register*') && request()->query('role') == 'volunteer' ? 'text-indigo-600 bg-indigo-50' : 'text-gray-700 hover:bg-indigo-50' }}">
                            Register as Volunteer
                        </a>
                        <a href="{{ route('register.form', ['role' => 'organization']) }}" class="block px-4 py-2 text-sm {{ request()->is('*/register*') && request()->query('role') == 'organization' ? 'text-indigo-600 bg-indigo-50' : 'text-gray-700 hover:bg-indigo-50' }}">
                            Register as Organization
                        </a>
                    </div>
                </div>
                @else
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-indigo-600 transition">
                        Logout
                    </button>
                </form>
                @endguest
            </div>
        </div>
    </div>
</nav>