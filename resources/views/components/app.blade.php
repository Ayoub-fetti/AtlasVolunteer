<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{ $head ?? '' }}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 min-h-screen flex flex-col">
        <div class="relative z-20">
            <x-navbar />
        </div>
        <main class="flex-grow">
            {{ $slot }}
        </main>
        {{-- <x-footer /> --}}
    </body>
</html>