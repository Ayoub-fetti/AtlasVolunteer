<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name', 'Atlas Volunteer') }}</title>
        
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">
        <!-- Pour une meilleure compatibilité entre navigateurs -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/icon.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/icon.png') }}">
        {{-- <link rel="manifest" href="{{ asset('site.webmanifest') }}"> --}}
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
    </body>
</html>