<nav class="bg-white shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo/Site Name -->
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-2">
                    <img src="{{ asset('images/icon.png') }}" alt="Atlas Volunteer Logo" class="h-8 w-auto" onerror="this.onerror=null; this.src='https://via.placeholder.com/32x32?text=AV'">
                    <span class="text-xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">
                        AtlasVolunteer
                    </span>
                </a>
            </div>

            <!-- Burger Button (Visible sur petit écran) -->
            <button id="burgerBtn" class="md:hidden text-gray-600 focus:outline-none">
                <!-- Burger icon -->
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- Navigation Links (Desktop) -->
            <div class="hidden md:flex items-center space-x-6">
                {{-- tes liens comme avant --}}
                <a href="/" class="{{ request()->is('/') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">Accueil</a>
                <a href="/about" class="{{ request()->is('about') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">À propos</a>
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">Opportunités</a>
                <a href="{{ route('donation.index') }}" class="{{ request()->routeIs('donation.index') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">Dons</a>
                <a href="/contact" class="{{ request()->is('contact') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">Contact</a>
                @auth
                    <a href="{{ auth()->user()->role === 'volunteer' ? route('profile.index') : route('organization.index') }}" 
                    class="{{ request()->routeIs('profile.index') || request()->routeIs('organization.index') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">
                        Profil
                    </a>
                    <a href="{{ route('messages.index') }}" class="{{ request()->routeIs('messages.index') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">Messages</a>
                @endauth
            </div>

            <!-- Auth Links (Desktop) -->
            <div class="hidden md:flex items-center space-x-4">
                @guest
                    <a href="{{ route('login.form') }}" class="{{ request()->routeIs('login.form') ? 'text-indigo-600' : 'text-gray-600 hover:text-indigo-600' }} transition">Login</a>
                    <div class="relative group">
                        <button class="text-gray-600 hover:text-indigo-600 flex items-center">
                            Registre
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-all duration-300 z-10">
                            <a href="{{ route('register.form', ['role' => 'volunteer']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">S'inscrire comme bénévole</a>
                            <a href="{{ route('register.form', ['role' => 'organization']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">S'inscrire comme organisation</a>
                        </div>
                    </div>
                @else
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-indigo-600 transition">Déconnexion</button>
                    </form>
                @endguest
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden hidden flex-col space-y-4 py-4">
            <a href="/" class="block text-gray-700 hover:text-indigo-600">Accueil</a>
            <a href="/about" class="block text-gray-700 hover:text-indigo-600">À propos</a>
            <a href="{{ route('home') }}" class="block text-gray-700 hover:text-indigo-600">Opportunités</a>
            <a href="{{ route('donation.index') }}" class="block text-gray-700 hover:text-indigo-600">Dons</a>
            <a href="/contact" class="block text-gray-700 hover:text-indigo-600">contact</a>
            @auth
                <a href="{{ auth()->user()->role === 'volunteer' ? route('profile.index') : route('organization.index') }}" class="block text-gray-700 hover:text-indigo-600">Profil</a>
                <a href="{{ route('messages.index') }}" class="block text-gray-700 hover:text-indigo-600">Messages</a>
            @endauth
            @guest
                <a href="{{ route('login.form') }}" class="block text-gray-700 hover:text-indigo-600">Se connecter</a>
                <a href="{{ route('register.form', ['role' => 'volunteer']) }}" class="block text-gray-700 hover:text-indigo-600">S'inscrire comme bénévole</a>
                <a href="{{ route('register.form', ['role' => 'organization']) }}" class="block text-gray-700 hover:text-indigo-600">S'inscrire comme organisation</a>
            @else
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block text-left text-gray-700 hover:text-indigo-600 w-full">Déconnexion</button>
                </form>
            @endguest
        </div>
    </div>
</nav>

<!-- Script -->
<script>
    const burgerBtn = document.getElementById('burgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    burgerBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
