<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{ $head ?? '' }}
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>


    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        {{ $slot }}
    </body>
</html>