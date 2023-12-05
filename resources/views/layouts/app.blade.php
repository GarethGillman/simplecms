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
        @php
        $dashboard_pages = array(
            'dashboard/home',
            'login',
            'register',
            'forgot-password',
            '/dashboard/profile',
            'setup'
        );
        @endphp

        @foreach( $dashboard_pages as $page )
            @if( str_contains( url()->current(), $page ) )
                @vite(['resources/css/dashboard.css', 'resources/js/dashboard.js'])
            @endif
        @endforeach
    </head>
    <body>
        @foreach( $dashboard_pages as $page )
            @if( str_contains( url()->current(), $page ) )
                @include('dashboard.parts.navigation')

                <main id="main-content">
                    @yield('dashboard')
                </main>

            @endif
        @endforeach

    </body>
</html>
