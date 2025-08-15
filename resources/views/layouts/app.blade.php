<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"sizes="32x42">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="stripe-key" content="{{ config('services.stripe.key') }}">
        <script src="https://js.stripe.com/v3/"></script>


        <title>@yield('title', 'ORIGIN Travels - Your Journey Begins Here')</title>
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

        <footer class="bg-gradient-to-br from-dark-gray to-gray-800 text-white relative overflow-hidden">
            <!-- Decorative elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-dark-blue via-dark-orange to-dark-blue"></div>
                <div class="absolute -top-40 -right-40 w-80 h-80 bg-dark-orange/5 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-dark-blue/5 rounded-full blur-3xl"></div>
            </div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-10">
                <!-- Logo and Description -->
                <div class="text-center mb-12">
                    <picture class="block mx-auto mb-4">
                        <source media="(max-width: 768px)" srcset="{{ asset('logo/logo-small.gif') }}">
                        <img src="{{ asset('logo/logo.png') }}" alt="ORIGIN Travels Logo" class="h-12 mx-auto">
                    </picture>
                    <div class="text-2xl font-bold text-white">
                        ORIGIN <span class="text-dark-orange">TRAVELS</span>
                    </div>
                </div>

                <div class="text-center mb-12 max-w-4xl mx-auto">
                    <p class="text-gray-300 leading-relaxed">
                        Welcome to ORIGIN Travels! We are a travel management company that provide you with local travel experts to plan customised travel itineraries for you. We have offices in Australia, Sri Lanka, and India, however we cater to anybody anywhere in the world! Our aim is to make your travel dreams come true.
                    </p>
                </div>

                <!-- Enhanced Footer Links Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                    <!-- Main Links -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold mb-4 text-dark-orange border-b border-dark-orange/30 pb-2">Quick Links</h3>
                        <div class="space-y-3">
                            <a href="{{ route('customer.destination') }}" class="block text-gray-300 hover:text-white hover:text-dark-orange transition-colors duration-200 group">
                                <span class="border-b border-transparent group-hover:border-dark-orange transition-all duration-200">Destination</span>
                            </a>
                            <a href="{{ route('customer.custom.tours') }}" class="block text-gray-300 hover:text-white hover:text-dark-orange transition-colors duration-200 group">
                                <span class="border-b border-transparent group-hover:border-dark-orange transition-all duration-200">Custom Tours</span>
                            </a>
                            <a href="{{ route('customer.aboutus') }}" class="block text-gray-300 hover:text-white hover:text-dark-orange transition-colors duration-200 group">
                                <span class="border-b border-transparent group-hover:border-dark-orange transition-all duration-200">About Us</span>
                            </a>
                            <a href="{{ route('customer.contact-us') }}" class="block text-gray-300 hover:text-white hover:text-dark-orange transition-colors duration-200 group">
                                <span class="border-b border-transparent group-hover:border-dark-orange transition-all duration-200">Contact Us</span>
                            </a>
                        </div>
                    </div>

                    <!-- Secondary Links -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold mb-4 text-dark-orange border-b border-dark-orange/30 pb-2">Legal</h3>
                        <div class="space-y-3">
                            <a href="{{ route('privacy.policy') }}" class="block text-gray-300 hover:text-white hover:text-dark-orange transition-colors duration-200 group">
                                <span class="border-b border-transparent group-hover:border-dark-orange transition-all duration-200">Privacy Policy</span>
                            </a>

                            <a href="{{ route('terms.conditions') }}" class="block text-gray-300 hover:text-white hover:text-dark-orange transition-colors duration-200 group">
                                <span class="border-b border-transparent group-hover:border-dark-orange transition-all duration-200">Terms and Conditions</span>
                            </a>
                        </div>
                    </div>


                    <!-- Destinations -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold mb-4 text-dark-orange border-b border-dark-orange/30 pb-2">Destinations</h3>
                        <div class="space-y-3">
                            <a href="#sri-lanka" class="block text-gray-300 hover:text-white hover:text-dark-orange transition-colors duration-200 group">
                                <span class="border-b border-transparent group-hover:border-dark-orange transition-all duration-200">India</span>
                            </a>
                            <a href="#maldives" class="block text-gray-300 hover:text-white hover:text-dark-orange transition-colors duration-200 group">
                                <span class="border-b border-transparent group-hover:border-dark-orange transition-all duration-200">Maldives</span>
                            </a>
                            <a href="#indonesia" class="block text-gray-300 hover:text-white hover:text-dark-orange transition-colors duration-200 group">
                                <span class="border-b border-transparent group-hover:border-dark-orange transition-all duration-200">Bali</span>
                            </a>
                            <a href="#dubai" class="block text-gray-300 hover:text-white hover:text-dark-orange transition-colors duration-200 group">
                                <span class="border-b border-transparent group-hover:border-dark-orange transition-all duration-200">Dubai</span>
                            </a>
                            <a href="#singapore" class="block text-gray-300 hover:text-white hover:text-dark-orange transition-colors duration-200 group">
                                <span class="border-b border-transparent group-hover:border-dark-orange transition-all duration-200">Singapore</span>
                            </a>
                        </div>
                    </div>

                    <!-- Social Media & Payment -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold mb-4 text-dark-orange border-b border-dark-orange/30 pb-2">Connect With Us</h3>
                            <div class="flex flex-wrap gap-3">
                                <a href="#instagram" class="w-10 h-10 bg-dark-blue/20 hover:bg-dark-orange rounded-lg flex items-center justify-center text-gray-300 hover:text-white transition-all duration-200 group">
                                    <i class="fab fa-instagram group-hover:scale-110 transition-transform duration-200"></i>
                                </a>
                                <a href="#facebook" class="w-10 h-10 bg-dark-blue/20 hover:bg-dark-orange rounded-lg flex items-center justify-center text-gray-300 hover:text-white transition-all duration-200 group">
                                    <i class="fab fa-facebook group-hover:scale-110 transition-transform duration-200"></i>
                                </a>
                                <a href="#youtube" class="w-10 h-10 bg-dark-blue/20 hover:bg-dark-orange rounded-lg flex items-center justify-center text-gray-300 hover:text-white transition-all duration-200 group">
                                    <i class="fab fa-youtube group-hover:scale-110 transition-transform duration-200"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-medium text-gray-400 mb-3">Accepted Payments</h4>
                            <div class="flex flex-wrap gap-3">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-2 hover:bg-white/20 transition-colors duration-200">
                                    <img src="{{ asset('images/payments/visa.png') }}" alt="Visa" class="h-6 opacity-70 hover:opacity-100 transition-opacity">
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-2 hover:bg-white/20 transition-colors duration-200">
                                    <img src="{{ asset('images/payments/mastercard.png') }}" alt="MasterCard" class="h-6 opacity-70 hover:opacity-100 transition-opacity">
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-2 hover:bg-white/20 transition-colors duration-200">
                                    <img src="{{ asset('images/payments/amex.png') }}" alt="American Express" class="h-6 opacity-70 hover:opacity-100 transition-opacity">
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-2 hover:bg-white/20 transition-colors duration-200">
                                    <img src="{{ asset('images/payments/unionpay.png') }}" alt="UnionPay" class="h-6 opacity-70 hover:opacity-100 transition-opacity">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Footer Bottom -->
                <div class="border-t border-gray-600 pt-8">
                    <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                        <div class="text-center lg:text-left text-sm text-gray-400">
                            <div class="mb-1">© 2025 ORIGIN Travels (Pvt) LTD Sri Lanka (Reg: PV72476)</div>
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