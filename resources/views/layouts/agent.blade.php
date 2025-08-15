<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'ORIGIN Travels - Travel Agent')</title>
        <link rel="logo" href="{{ asset('logo/logo.png') }}">

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        
        <style>
            body { font-family: 'Inter', sans-serif; }
        </style>

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/custom.css','resources/css/app.css', 'resources/js/app.js'])
        @else
        
        @endif
    </head>
    <body class="bg-gray-100 font-sans leading-normal tracking-wide">

        <!-- Include Navigation -->
        @include('layouts.navigation')

        <!-- Main Content Area -->
        <main class="p-6">
            @yield('content')
        </main>

        <footer class="bg-gradient-to-br from-dark-gray to-gray-800 text-white relative overflow-hidden">
            <!-- Decorative elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-dark-blue via-dark-orange to-dark-blue"></div>
                <div class="absolute -top-20 -right-20 w-40 h-40 bg-dark-orange/5 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-20 -left-20 w-48 h-48 bg-dark-blue/5 rounded-full blur-3xl"></div>
            </div>
            
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6 relative z-10">
                <!-- Enhanced Footer Bottom -->
                <div class="border-t border-gray-600 pt-4">
                    <div class="flex flex-col lg:flex-row justify-between items-center space-y-2 lg:space-y-0">
                        <div class="text-center lg:text-left text-sm text-gray-400">
                            <div>© 2025 ORIGIN Travels (Pvt) LTD Sri Lanka (Reg: PV72476)</div>
                        </div>
                        <div class="text-center lg:text-right text-sm text-gray-400">
                            <div class="mb-1">Tourist Board License No: TS/TA/1387</div>
                            <div>Civil Aviation License No: A-922</div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
