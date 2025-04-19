<footer class="bg-white dark:bg-gray-900 shadow-inner mt-auto">
    <div class="container mx-auto px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="mb-6 md:mb-0">
                <h2 class="text-xl font-bold text-indigo-600 mb-4">Volunteer Connect</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Connecting volunteers with organizations to make a positive impact in our communities.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Quick Links</h3>
                <ul class="text-gray-600 dark:text-gray-400">
                    <li class="mb-2">
                        <a href="/" class="hover:text-indigo-600">Home</a>
                    </li>
                    <li class="mb-2">
                        <a href="#about" class="hover:text-indigo-600">About Us</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="hover:text-indigo-600">Opportunities</a>
                    </li>
                    <li class="mb-2">
                        <a href="#contact" class="hover:text-indigo-600">Contact</a>
                    </li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">For Volunteers</h3>
                <ul class="text-gray-600 dark:text-gray-400">
                    <li class="mb-2">
                        <a href="{{ route('register.form', ['role' => 'volunteer']) }}" class="hover:text-indigo-600">Sign Up</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="hover:text-indigo-600">Browse Opportunities</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="hover:text-indigo-600">How It Works</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="hover:text-indigo-600">FAQ</a>
                    </li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">For Organizations</h3>
                <ul class="text-gray-600 dark:text-gray-400">
                    <li class="mb-2">
                        <a href="{{ route('register.form', ['role' => 'organization']) }}" class="hover:text-indigo-600">Register Organization</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="hover:text-indigo-600">Post Opportunities</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="hover:text-indigo-600">Resources</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="hover:text-indigo-600">Support</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-gray-200 dark:border-gray-700 mt-8 pt-8 text-center">
            <p class="text-gray-600 dark:text-gray-400">
                &copy; {{ date('Y') }} Volunteer Connect Platform. All rights reserved.
            </p>
        </div>
    </div>
</footer>