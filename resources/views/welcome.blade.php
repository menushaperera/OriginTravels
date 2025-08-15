<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ORIGIN Tourism</title>
        <link rel="logo" href="{{ asset('logo/logo.png') }}">

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            'inter': ['Inter', 'sans-serif'],
                        },
                        colors: {
                            'dark-orange': '#FF6B35',
                            'dark-blue': '#1E3A8A',
                            'light-gray': '#F3F4F6',
                            'dark-gray': '#374151',
                        }
                    }
                }
            }
        </script>

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/custom.css','resources/css/app.css', 'resources/js/app.js'])
        @else
        
        @endif
    </head>
    <body class="font-inter antialiased">
        <!-- Enhanced Navigation -->
        <nav class="fixed top-0 w-full bg-white/95 backdrop-blur-md shadow-lg z-50 border-b border-gray-100">
            <!-- Decorative top border -->
            <div class="h-1 bg-gradient-to-r from-dark-blue via-dark-orange to-dark-blue"></div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Enhanced Logo -->
                    <div class="flex-shrink-0">
                        <a href="#" class="flex items-center space-x-3" 
                        style="padding: 8px 12px; border-radius: 12px; transition: all 0.3s ease;"
                        onmouseover="this.style.backgroundColor='rgba(243, 244, 246, 0.5)'"
                        onmouseout="this.style.backgroundColor='transparent'">
                            <div>
                                <picture>
                                    <source media="(max-width: 768px)" srcset="{{ asset('logo/logo.png') }}">
                                    <img src="{{ asset('logo/logo.png') }}" alt="ORIGIN Travels Logo" class="h-10 w-auto">
                                </picture>
                            </div>
                            <span style="font-size: 1.25rem; font-weight: bold; color: #1E3A8A; letter-spacing: 0.025em;">
                                ORIGIN <span style="color: #FF6B35;">TRAVELS</span>
                            </span>
                        </a>
                    </div>

                    @if (Route::has('login'))
                    <nav class="flex items-center justify-between w-full">
                        <!-- Desktop Navigation - Hidden on mobile -->
                        <div class="hidden md:flex items-center justify-end gap-4 ml-auto">
                            @auth
                                @php
                                    $dashboardUrl = '#';
                                    if (auth()->user()->hasRole('Admin')) {
                                        $dashboardUrl = url('/admin/dashboard');
                                    } elseif (auth()->user()->hasRole('Travel Agent')) {
                                        $dashboardUrl = url('/agent/dashboard');
                                    } elseif (auth()->user()->hasRole('Customer')) {
                                        $dashboardUrl = url('/customer/dashboard');
                                    }
                                @endphp
                                <a href="{{ $dashboardUrl }}" 
                                class="px-6 py-2.5 border border-dark-blue text-dark-blue rounded-xl hover:bg-dark-orange hover:text-white hover:border-dark-orange transition-all duration-300 font-medium shadow-sm hover:shadow-md transform hover:scale-105">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" 
                                class="px-6 py-2.5 text-dark-blue hover:text-dark-orange transition-colors duration-300 font-medium relative group">
                                    Log in
                                    <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-dark-orange group-hover:w-full transition-all duration-300"></div>
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" 
                                    class="px-6 py-2.5 border border-dark-blue text-dark-blue rounded-xl hover:bg-dark-orange hover:text-white hover:border-dark-orange transition-all duration-300 font-medium shadow-sm hover:shadow-md transform hover:scale-105">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>

                        <!-- Mobile Hamburger Button - Visible only on mobile -->
                        <div class="md:hidden ml-auto">
                            <button id="mobile-menu-button" 
                                    class="p-2 text-dark-blue hover:text-dark-orange focus:outline-none focus:ring-2 focus:ring-dark-orange focus:ring-offset-2 rounded-md transition-colors duration-300">
                                <!-- Hamburger Icon -->
                                <div id="hamburger-icon" class="w-6 h-6 flex flex-col justify-center items-center space-y-1">
                                    <span class="block w-6 h-0.5 bg-current transform transition-all duration-300 ease-in-out"></span>
                                    <span class="block w-6 h-0.5 bg-current transform transition-all duration-300 ease-in-out"></span>
                                    <span class="block w-6 h-0.5 bg-current transform transition-all duration-300 ease-in-out"></span>
                                </div>
                            </button>
                        </div>

                        <!-- Mobile Menu - Hidden by default -->
                        <div id="mobile-menu" 
                            class="absolute top-full left-0 right-0 bg-white shadow-lg border-t border-gray-200 md:hidden hidden z-50">
                            <div class="px-4 py-2 space-y-1">
                                @auth
                                    @php
                                        $dashboardUrl = '#';
                                        if (auth()->user()->hasRole('Admin')) {
                                            $dashboardUrl = url('/admin/dashboard');
                                        } elseif (auth()->user()->hasRole('Travel Agent')) {
                                            $dashboardUrl = url('/agent/dashboard');
                                        } elseif (auth()->user()->hasRole('Customer')) {
                                            $dashboardUrl = url('/customer/dashboard');
                                        }
                                    @endphp
                                    <a href="{{ $dashboardUrl }}" 
                                    class="block w-full text-center px-4 py-3 text-dark-blue border border-dark-blue rounded-xl hover:bg-dark-orange hover:text-white hover:border-dark-orange transition-all duration-300 font-medium">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" 
                                    class="block w-full text-center px-4 py-3 text-dark-blue hover:bg-gray-50 hover:text-dark-orange transition-all duration-300 font-medium rounded-xl">
                                        Log in
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" 
                                        class="block w-full text-center px-4 py-3 text-dark-blue border border-dark-blue rounded-xl hover:bg-dark-orange hover:text-white hover:border-dark-orange transition-all duration-300 font-medium mt-2">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </nav>

                    <!-- JavaScript for Mobile Menu Toggle -->
                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const mobileMenuButton = document.getElementById('mobile-menu-button');
                        const mobileMenu = document.getElementById('mobile-menu');
                        const hamburgerIcon = document.getElementById('hamburger-icon');
                        
                        if (mobileMenuButton && mobileMenu) {
                            mobileMenuButton.addEventListener('click', function() {
                                // Toggle mobile menu visibility
                                mobileMenu.classList.toggle('hidden');
                                
                                // Animate hamburger to X
                                const spans = hamburgerIcon.querySelectorAll('span');
                                if (mobileMenu.classList.contains('hidden')) {
                                    // Menu is closed - show hamburger
                                    spans[0].style.transform = 'rotate(0deg) translateY(0px)';
                                    spans[1].style.opacity = '1';
                                    spans[2].style.transform = 'rotate(0deg) translateY(0px)';
                                } else {
                                    // Menu is open - show X
                                    spans[0].style.transform = 'rotate(45deg) translateY(6px)';
                                    spans[1].style.opacity = '0';
                                    spans[2].style.transform = 'rotate(-45deg) translateY(-6px)';
                                }
                            });
                            
                            // Close menu when clicking outside
                            document.addEventListener('click', function(event) {
                                if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                                    mobileMenu.classList.add('hidden');
                                    // Reset hamburger icon
                                    const spans = hamburgerIcon.querySelectorAll('span');
                                    spans[0].style.transform = 'rotate(0deg) translateY(0px)';
                                    spans[1].style.opacity = '1';
                                    spans[2].style.transform = 'rotate(0deg) translateY(0px)';
                                }
                            });
                            
                            // Close menu when window is resized to desktop size
                            window.addEventListener('resize', function() {
                                if (window.innerWidth >= 768) { // md breakpoint
                                    mobileMenu.classList.add('hidden');
                                    // Reset hamburger icon
                                    const spans = hamburgerIcon.querySelectorAll('span');
                                    spans[0].style.transform = 'rotate(0deg) translateY(0px)';
                                    spans[1].style.opacity = '1';
                                    spans[2].style.transform = 'rotate(0deg) translateY(0px)';
                                }
                            });
                        }
                    });
                    </script>
                    @endif
                </div>
            </div>
        </nav>
        
        <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
            <!-- Background Image -->
            <img src="{{ asset('images/background/kallebokka.jpg') }}" 
                alt="Travel Destinations" 
                class="absolute inset-0 w-full h-full object-cover">

            <!-- Black Transparent Overlay -->
            <div class="absolute inset-0 bg-black/60"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center">
                    <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                        Welcome to 
                        <span class="bg-gradient-to-r from-dark-orange to-orange-400 bg-clip-text text-transparent">
                            ORIGIN TRAVELS
                        </span>
                    </h1>
                    <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-3xl mx-auto leading-relaxed">
                        Experience Sri Lanka's most trusted travel partner with over a decade of excellence, connecting travelers with unforgettable destinations and creating memories that last a lifetime.
                    </p>

                    <!-- Added floating stats -->
                    <div class="flex justify-center space-x-8 mb-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-dark-orange">10+</div>
                            <div class="text-sm text-blue-200">Years Experience</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">1000+</div>
                            <div class="text-sm text-blue-200">Happy Travelers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-dark-orange">8+</div>
                            <div class="text-sm text-blue-200">Destinations</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
