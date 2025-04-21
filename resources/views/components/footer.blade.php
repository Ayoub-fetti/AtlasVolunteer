<footer class="bg-white border-t border-gray-200 shadow-inner dark:bg-gray-900 dark:border-gray-800 mt-auto w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Brand section -->
            <div class="col-span-1 md:col-span-1">
                <a href="{{ route('home') }}" class="flex items-center mb-4 space-x-3">
                    <img src="{{ asset('images/icon.png') }}" class="h-10 w-auto" alt="Volunteer Connect Logo" onerror="this.onerror=null; this.src='https://via.placeholder.com/40x40?text=VC'">
                    <span class="self-center text-xl font-semibold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent dark:text-white">AtlasVolunteer</span>
                </a>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                    Connecting volunteers with organizations to make a positive impact in our communities.
                </p>
                <div class="flex space-x-4">
                    <a href="htpps://www.facebook.com" class="text-gray-500 hover:text-indigo-600 transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.linkedin.com" class="text-gray-500 hover:text-indigo-600 transition-colors">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://www.instagram.com" class="text-gray-500 hover:text-indigo-600 transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Quick links -->
            <div class="col-span-1">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider mb-4">Resources</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400">How It Works</a></li>
                    <li><a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400">Volunteering Tips</a></li>
                    <li><a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400">Organizations</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div class="col-span-1">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider mb-4">Company</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400">About Us</a></li>
                    <li><a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400">Blog</a></li>
                    <li><a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400">Careers</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div class="col-span-1">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider mb-4">Legal</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400">Privacy Policy</a></li>
                    <li><a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400">Terms of Service</a></li>
                    <li><a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400">Cookie Policy</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom section with copyright -->
        <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-700">
            <p class="text-center text-base text-gray-500 dark:text-gray-400">
                © {{ date('Y') }} Volunteer Connect. All rights reserved.
            </p>
        </div>
    </div>
</footer>