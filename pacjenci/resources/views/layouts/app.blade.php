<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Custom style -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @if(request()->routeIs('operations'))

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

            <!-- Scripts  -->
            @vite(['resources/css/app.css'])
        @else
            <!-- Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased h-full min-h-screen bg-white">

        @include('components.templates.navigation')

        <div class="p-4 sm:ml-64">
            <div class="p-4 mt-14">
                {{ $slot }}
            </div>
        </div>


        @stack('modals')

        @livewireScripts

        <script src="{{asset('js/datepicker.min.js')}}"></script>

        <!-- Custom style -->
        <script src="{{asset('js/custom.js')}}"></script>
    </body>
</html>
