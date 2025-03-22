<!-- filepath: c:\laragon\www\Volunteer-Connect-Platform\resources\views\welcome.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Volunteer Connect Platform</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* Add your custom styles here */
        </style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center bg-gray-50 dark:bg-black">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-black dark:text-white mb-6">Welcome to Volunteer Connect Platform</h1>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-8">
                    Join us today and make a difference in your community!
                </p>
                <div class="flex gap-4">
                    <!-- Button for Volunteer Registration -->
                    <a href="{{ route('register.form', ['role' => 'volunteer']) }}"
                       class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition">
                        Join Us as Volunteer
                    </a>
                    <!-- Button for Organization Registration -->
                    <a href="{{ route('register.form', ['role' => 'organization']) }}"
                       class="px-6 py-3 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition">
                        Join Us as Organization
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>