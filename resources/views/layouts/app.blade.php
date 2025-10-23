<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'KitchenTales') }}</title>
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <!-- Default Statcounter code for KitchenTales
            https://kitchentales.webserve.xyz -->
            <script type="text/javascript">
            var sc_project="{{ config('services.statcounter.project_id') }}"; 
            var sc_invisible="{{ config('services.statcounter.invisible') }}"; 
            var sc_security="{{ config('services.statcounter.security') }}"; 
            </script>
            <script type="text/javascript"
            src="https://www.statcounter.com/counter/counter.js"
            async></script>
            <noscript><div class="statcounter"><a title="Web Analytics"
            href="https://statcounter.com/" target="_blank"><img
            class="statcounter"
            src="https://c.statcounter.com/{{ config('services.statcounter.project_id') }}/0/{{ config('services.statcounter.security') }}/{{ config('services.statcounter.invisible') }}/"
            alt="Web Analytics"
            referrerPolicy="no-referrer-when-downgrade"></a></div></noscript>
            <!-- End of Statcounter Code -->
    </body>
</html>
