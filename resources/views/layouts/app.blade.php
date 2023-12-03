<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @if( str_contains( url()->current(), '/dashboard' ) || str_contains( url()->current(), '/login' ) || str_contains( url()->current(), '/register' ) || str_contains( url()->current(), '/forgot-password' ) )
            @vite(['resources/css/dashboard.css', 'resources/js/dashboard.js'])
        @endif
    </head>
    <body>
        @if( str_contains( url()->current(), '/dashboard' ) || str_contains( url()->current(), '/login' ) || str_contains( url()->current(), '/register' ) || str_contains( url()->current(), '/forgot-password' ) )

            @include('dashboard.parts.navigation')

            <main id="main-content">
                @yield('dashboard')
            </main>

        @endif

    </body>
</html>
