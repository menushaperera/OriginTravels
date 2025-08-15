{{-- resources/views/layouts/navigation.blade.php --}}

<script>
    /* Tip: move this to <head> ideally */
    tailwind.config = {
        theme: {
            extend: {
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

<nav
    x-data="{ open: false }"
    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(12px); box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); border-bottom: 1px solid #E5E7EB; position: sticky; top: 0; z-index: 50;"
>
    <!-- Decorative top border -->
    <div style="height: 4px; background: linear-gradient(90deg, #1E3A8A, #FF6B35, #1E3A8A);"></div>

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Left side: Logo and Navigation Links -->
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('welcome') }}" class="flex items-center space-x-3"
                       style="padding: 8px 12px; border-radius: 12px; transition: all 0.3s ease;"
                       onmouseover="this.style.backgroundColor='rgba(243, 244, 246, 0.5)'"
                       onmouseout="this.style.backgroundColor='transparent'">
                        <div>
                            <picture>
                                <source media="(max-width: 768px)" srcset="{{ asset('logo/logo-small.png') }}">
                                <img src="{{ asset('logo/logo.png') }}" alt="ORIGIN Travels Logo" class="h-10 w-auto">
                            </picture>
                        </div>
                        <span style="font-size: 1.25rem; font-weight: bold; color: #1E3A8A; letter-spacing: 0.025em;">
                            ORIGIN <span style="color: #FF6B35;">TRAVELS</span>
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                @role('Admin')
                    <div class="hidden lg:flex items-center space-x-8">
                        {{-- Home --}}
                        <x-nav-link :href="route('admin.dashboard')"
                                    :active="request()->routeIs('admin.dashboard')"
                                    class="relative px-4 py-2 text-gray-700 hover:text-dark-blue transition-colors duration-300 font-medium group">
                            {{ __('Home') }}
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-dark-orange group-hover:w-full {{ request()->routeIs('admin.dashboard') ? 'w-full' : '' }} transition-all duration-300"></span>
                        </x-nav-link>

                        {{-- Packages (index + create highlight) --}}
                        <x-nav-link :href="route('admin.packages.index')"
                                    :active="request()->routeIs('admin.packages.*')"
                                    class="relative px-4 py-2 text-gray-700 hover:text-dark-blue transition-colors duration-300 font-medium group">
                            {{ __('Packages') }}
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-dark-orange group-hover:w-full {{ request()->routeIs('admin.packages.*') ? 'w-full' : '' }} transition-all duration-300"></span>
                        </x-nav-link>

                        {{-- All Bookings --}}
                        <x-nav-link :href="route('admin.bookings.index')"
                                    :active="request()->routeIs('admin.bookings.*')"
                                    class="relative px-4 py-2 text-gray-700 hover:text-dark-blue transition-colors duration-300 font-medium group">
                            {{ __('All Bookings') }}
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-dark-orange group-hover:w-full {{ request()->routeIs('admin.bookings.*') ? 'w-full' : '' }} transition-all duration-300"></span>
                        </x-nav-link>
                    </div>
                @endrole

                @role('Travel Agent')
                    <div class="hidden lg:flex items-center space-x-8">
                        <x-nav-link :href="route('agent.dashboard')" :active="request()->routeIs('agent.dashboard')"
                                    class="relative px-4 py-2 text-gray-700 hover:text-dark-blue transition-colors duration-300 font-medium group">
                            {{ __('Dashboard') }}
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-dark-orange group-hover:w-full {{ request()->routeIs('agent.dashboard') ? 'w-full' : '' }} transition-all duration-300"></span>
                        </x-nav-link>

                        <x-nav-link :href="route('agent.bookings.index')" :active="request()->routeIs('agent.bookings.*')"
                                    class="relative px-4 py-2 text-gray-700 hover:text-dark-blue transition-colors duration-300 font-medium group">
                            {{ __('Assigned Bookings') }}
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-dark-orange group-hover:w-full {{ request()->routeIs('agent.bookings.*') ? 'w-full' : '' }} transition-all duration-300"></span>
                        </x-nav-link>
                    </div>
                @endrole

                @role('Customer')
                    <div class="hidden lg:flex items-center space-x-8">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                    class="relative px-4 py-2 text-gray-700 hover:text-dark-blue transition-colors duration-300 font-medium group">
                            {{ __('Home') }}
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-dark-orange group-hover:w-full {{ request()->routeIs('dashboard') ? 'w-full' : '' }} transition-all duration-300"></span>
                        </x-nav-link>

                        <x-nav-link :href="route('customer.destination')" :active="request()->routeIs('customer.destination')"
                                    class="relative px-4 py-2 text-gray-700 hover:text-dark-blue transition-colors duration-300 font-medium group">
                            {{ __('Destination') }}
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-dark-orange group-hover:w-full {{ request()->routeIs('customer.destination') ? 'w-full' : '' }} transition-all duration-300"></span>
                        </x-nav-link>

                        <x-nav-link :href="route('customer.custom.tours')" :active="request()->routeIs('customer.custom.tours')"
                                    class="relative px-4 py-2 text-gray-700 hover:text-dark-blue transition-colors duration-300 font-medium group">
                            {{ __('Custom Tours') }}
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-dark-orange group-hover:w-full {{ request()->routeIs('customer.custom.tours') ? 'w-full' : '' }} transition-all duration-300"></span>
                        </x-nav-link>

                        <x-nav-link :href="route('customer.aboutus')" :active="request()->routeIs('customer.aboutus')"
                                    class="relative px-4 py-2 text-gray-700 hover:text-dark-blue transition-colors duration-300 font-medium group">
                            {{ __('About Us') }}
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-dark-orange group-hover:w-full {{ request()->routeIs('customer.aboutus') ? 'w-full' : '' }} transition-all duration-300"></span>
                        </x-nav-link>

                        <x-nav-link :href="route('customer.contact-us')" :active="request()->routeIs('customer.contact-us')"
                                    class="relative px-4 py-2 text-gray-700 hover:text-dark-blue transition-colors duration-300 font-medium group">
                            {{ __('Contact Us') }}
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-dark-orange group-hover:w-full {{ request()->routeIs('customer.contact-us') ? 'w-full' : '' }} transition-all duration-300"></span>
                        </x-nav-link>
                    </div>
                @endrole
            </div>

            <!-- Right side: Settings / Auth -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

                @guest
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-dark-blue">
                            {{ __('Log in') }}
                        </a>
                        <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 rounded-md text-sm font-semibold text-white"
                           style="background: linear-gradient(90deg, #FF6B35, #ff7f4f); box-shadow: 0 6px 18px rgba(255, 107, 53, 0.25);">
                            {{ __('Register') }}
                        </a>
                    </div>
                @endguest
            </div>

            <!-- Hamburger (mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button
                    @click="open = !open"
                    :aria-expanded="open.toString()"
                    aria-controls="primary-mobile-menu"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                >
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div id="primary-mobile-menu" :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        @role('Admin')
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('admin.packages.index')" :active="request()->routeIs('admin.packages.*')">
                    {{ __('Packages') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('admin.packages.create')" :active="request()->routeIs('admin.packages.create')">
                    {{ __('Create Package') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('admin.bookings.index')" :active="request()->routeIs('admin.bookings.*')">
                    {{ __('All Bookings') }}
                </x-responsive-nav-link>
            </div>
        @endrole

        @role('Travel Agent')
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('agent.dashboard')" :active="request()->routeIs('agent.dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('agent.bookings.index')" :active="request()->routeIs('agent.bookings.*')">
                    {{ __('Assigned Bookings') }}
                </x-responsive-nav-link>
            </div>
        @endrole

        @role('Customer')
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Home') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('customer.destination')" :active="request()->routeIs('customer.destination')">
                    {{ __('Destination') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('customer.custom.tours')" :active="request()->routeIs('customer.custom.tours')">
                    {{ __('Custom Tours') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('customer.aboutus')" :active="request()->routeIs('customer.aboutus')">
                    {{ __('About Us') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('customer.contact-us')" :active="request()->routeIs('customer.contact-us')">
                    {{ __('Contact Us') }}
                </x-responsive-nav-link>
            </div>
        @endrole

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth

        @guest
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="mt-3 space-y-1 px-4">
                    <x-responsive-nav-link :href="route('login')">
                        {{ __('Log in') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')">
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        @endguest
    </div>
</nav>
