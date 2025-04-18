<x-app>
    <div class="relative z-20">
        <x-navbar />
    </div>

    <div class="fixed inset-0 w-full h-full z-0">
        <video class="w-full h-full object-cover" autoplay muted loop playsinline>
            <source src="{{ asset('videos/video1.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <!-- Couche d’opacité -->
        <div class="absolute inset-0" style="background-color: rgba(0, 0, 0, 0.5);"></div>
    </div>

    <!-- Contenu centré avec z-index supérieur -->
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center z-10 px-4">
        <h1 class="text-3xl font-bold mb-8 text-white shadow-text">
            Welcome to Volunteer Connect Platform
        </h1>

        <a href="{{ route('home') }}" 
           class="px-6 py-3 bg-transparent border-2 border-white text-white font-medium rounded-md hover:bg-white/20 transition duration-150 ease-in-out backdrop-blur-sm">
            Go to Home Page
        </a>
    </div>

    <style>
        .shadow-text {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
    </style>
</x-app>
