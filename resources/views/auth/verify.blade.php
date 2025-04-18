<x-app>
    <div class="bg-gradient-to-br from-blue-50 to-green-100 min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-lg bg-white rounded-xl shadow-xl overflow-hidden my-8">
            <!-- Decorative top bar -->
            <div class="h-2 bg-gradient-to-r from-green-500 to-blue-600"></div>
            
            <div class="p-8">
                <!-- Icon/Logo Area -->
                <div class="flex justify-center mb-6">
                    <div class="h-16 w-16 rounded-full bg-green-100 flex items-center justify-center">
                        <svg class="h-8 w-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-2">Verify Your Email</h1>
                <p class="text-center text-gray-500 mb-6">Please check your email for a verification link</p>
                
                @if (session('resent'))
                    <div class="mb-4 p-2 bg-green-50 text-green-700 border border-green-100 rounded">
                        A fresh verification link has been sent to your email address.
                    </div>
                @endif

                <p class="text-sm text-gray-600 mb-4">
                    Before proceeding, please check your email for a verification link.
                    If you did not receive the email, click the button below to request another.
                </p>
                
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <div class="flex justify-center">
                        <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm transition duration-150 ease-in-out">
                            Resend Verification Email
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>