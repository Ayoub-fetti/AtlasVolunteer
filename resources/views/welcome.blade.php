<x-app>
  <div class="flex flex-col min-h-screen">
    <div class="relative flex-grow">
      <video class="w-full h-full object-cover absolute top-0 left-0" autoplay muted loop playsinline>
          <source src="{{ asset('videos/video1.mp4') }}" type="video/mp4">
          Votre navigateur ne prend pas en charge la balise vidéo.
      </video>
    
      <div class="absolute inset-0" style="background-color: rgba(0, 0, 0, 0.5);"></div>
    
      <div class="min-h-screen flex flex-col justify-center items-center text-center px-4 relative text-white">
          <h1 class="text-5xl font-bold mb-4">Bienvenue à Atlasvolunteer</h1>
          <p class="text-xl mb-8">Connecter des bénévoles passionnés avec des organisations pour créer un changement positif dans nos communautés.</p>
          <div class="flex flex-col sm:flex-row gap-4">
            <a href="/about"
            class="bg-white/10 backdrop-blur-sm text-white border border-white font-semibold px-4 sm:px-5 md:px-6 py-2 sm:py-2 md:py-3 text-sm sm:text-base rounded transition hover:bg-white/20">
            À propos de nous <Page></Page>
         </a>
         
         <a href="/contact"
            class="bg-white/10 backdrop-blur-md text-white border border-white font-semibold px-4 sm:px-5 md:px-6 py-2 sm:py-2 md:py-3 text-sm sm:text-base rounded transition hover:bg-white/20">
            Contactez-nous
         </a>
          </div>
      </div>
    </div>
    <x-footer />
  </div>
</x-app>