<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
        rel="stylesheet" />

    <!-- Styles -->
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/css/site.css'])
</head>

<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-100">
    <x-layouts.site.navigation />

    {{-- The main content with `full-width` --}}
    <x-main with-nav full-width>
        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />

    @livewireScripts
</body>

</html>
