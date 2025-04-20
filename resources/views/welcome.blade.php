<x-app>
  <div class="flex flex-col min-h-screen">
    <!-- Background Video Section -->
    <div class="relative flex-grow">
      <video class="w-full h-full object-cover absolute top-0 left-0" autoplay muted loop playsinline>
          <source src="{{ asset('videos/video1.mp4') }}" type="video/mp4">
          Your browser does not support the video tag.
      </video>
    
      <!-- Overlay d'opacité sur la vidéo -->
      <div class="absolute inset-0" style="background-color: rgba(0, 0, 0, 0.5);"></div>
    
      <!-- Content Overlay -->
      <div class="min-h-screen flex flex-col justify-center items-center text-center px-4 relative text-white">
          <h1 class="text-5xl font-bold mb-4">Welcome to Our Website</h1>
          <p class="text-xl mb-8">Beautiful video background with Tailwind CSS</p>
          <div class="flex gap-4">
              <a href="{{ route('home') }}" class="bg-blue-600 text-white font-semibold px-6 py-3 rounded hover:bg-blue-700 transition">
                  Home Page
              </a>
              <a href="#about-us" class="bg-white text-black font-semibold px-6 py-3 rounded hover:bg-gray-200 transition">
                  Learn More
              </a>
          </div>
      </div>
    </div>

    <!-- Footer Component -->
    <x-footer />
  </div>
</x-app>