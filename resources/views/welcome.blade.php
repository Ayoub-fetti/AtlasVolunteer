<x-app>
    <!-- Navbar avec z-index élevé -->
    <div class="relative z-20">
        <x-navbar />
    </div>

    <!-- Vidéo en arrière-plan qui couvre toute la page -->
    <div class="fixed inset-0 w-full h-full z-0">
        <video class="w-full h-full object-cover" autoplay muted loop playsinline>
            <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Contenu principal avec z-index supérieur à la vidéo -->
    <div class="container mx-auto px-4 py-12 relative z-10">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-3xl font-bold mb-8 text-center text-white shadow-text">
                Welcome to Volunteer Connect Platform
            </h1>
            
            <!-- Bouton transparent au-dessus de la vidéo -->
            <a href="{{ route('home') }}" 
               class="px-6 py-3 bg-transparent border-2 border-white text-white font-medium rounded-md hover:bg-white/20 transition duration-150 ease-in-out backdrop-blur-sm">
                Go to Home Page
            </a>
        </div>
    </div>

    <style>
        .shadow-text {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
    </style>
</x-app>
