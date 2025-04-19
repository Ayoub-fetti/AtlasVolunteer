<x-app>

    <div class="relative z-20">
        <x-navbar />
    </div>
    
      <!-- Background Video -->
      <div class="relative">
        <video class="w-full h-screen object-cover absolute top-0 left-0" autoplay muted loop playsinline>
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
    
      <!-- About Us Section -->
      <section id="about-us" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
          <h2 class="text-3xl font-bold mb-8 text-center">About Us</h2>
          
          <div class="max-w-4xl mx-auto">
            <p class="text-lg mb-6">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel purus eget nisi tincidunt fermentum. 
              Vivamus sed dignissim ligula, at consectetur ante. Fusce sit amet ornare nisi.
            </p>
            
            <p class="text-lg mb-6">
              Our company has been providing exceptional services for over 10 years. We're dedicated to delivering the highest quality products 
              and services to our clients.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
              <!-- Vision -->
              <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold mb-3">Our Vision</h3>
                <p>To become the leading provider of innovative solutions in our industry.</p>
              </div>
              
              <!-- Mission -->
              <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold mb-3">Our Mission</h3>
                <p>To create value for our clients through reliable and high-quality services.</p>
              </div>
              
              <!-- Values -->
              <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold mb-3">Our Values</h3>
                <p>Integrity, excellence, innovation, and commitment to customer satisfaction.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    
    </x-app>
    <x-footer />