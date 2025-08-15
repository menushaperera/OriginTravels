{{-- resources/views/customer/destination.blade.php --}}
<x-app-layout>
    <style>
        .package-card { transition: all 0.3s ease; }
        .package-card:hover { transform: translateY(-5px); }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes float-reverse {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(20px); }
        }
        
        @keyframes gradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-float-reverse {
            animation: float-reverse 6s ease-in-out infinite;
        }
        
        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 3s ease infinite;
        }
        
        .slider::-webkit-slider-thumb {
            appearance: none;
            width: 20px;
            height: 20px;
            background: #FF6B35;
            cursor: pointer;
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .slider::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background: #FF6B35;
            cursor: pointer;
            border-radius: 50%;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #F3F4F6;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #FF6B35;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #e55a2b;
        }
    </style>

    @php
        // Safe fallbacks if controller didn't pass data in
        $destinations = $destinations
            ?? \App\Models\Destination::select('id','name')->orderBy('name')->get();

        $packages = $packages
            ?? \App\Models\Package::where('status', 'active')
                ->orderBy('display_order')
                ->orderByDesc('is_bestseller')
                ->orderByDesc('is_featured')
                ->get();
    @endphp

    @section('title', 'Destination - ORIGIN Travels')

    <!-- Enhanced Header Section -->
    <section class="relative text-white py-20 overflow-hidden">
        <!-- Background Image -->
        <img src="{{ asset('images/background/destination.jpg') }}" 
            alt="Custom Tours" 
            class="absolute inset-0 w-full h-full object-cover">

        <!-- Black Transparent Overlay -->
        <div class="absolute inset-0 bg-black/60"></div>

        <!-- Optional floating blur circles for decoration -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-[#FF6B35]/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-white/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1000ms;"></div>
            <div class="absolute top-1/2 left-1/3 w-64 h-64 bg-[#FF6B35]/10 rounded-full blur-2xl animate-float"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in">
                    Discover Amazing 
                    <span class="bg-gradient-to-r from-[#FF6B35] via-orange-400 to-[#FF6B35] bg-clip-text text-transparent animate-gradient">
                        Destinations
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto mb-8 opacity-90">
                    Explore handpicked travel experiences across Asia and the Middle East
                </p>
                <div class="flex flex-wrap justify-center gap-4 mt-8">
                    <div class="bg-white/10 backdrop-blur-sm px-6 py-3 rounded-full border border-white/20 hover:bg-white/20 transition-all duration-300 cursor-pointer">
                        <span class="text-[#FF6B35] font-bold text-2xl">8</span>
                        <span class="ml-2 text-white">Countries</span>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm px-6 py-3 rounded-full border border-white/20 hover:bg-white/20 transition-all duration-300 cursor-pointer">
                        <span class="text-[#FF6B35] font-bold text-2xl">50+</span>
                        <span class="ml-2 text-white">Tours</span>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm px-6 py-3 rounded-full border border-white/20 hover:bg-white/20 transition-all duration-300 cursor-pointer">
                        <span class="text-[#FF6B35] font-bold text-2xl">1000+</span>
                        <span class="ml-2 text-white">Happy Travelers</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section id="packages" class="py-16 bg-gradient-to-b from-[#F3F4F6] to-white">
        <div class="container mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-[#FF6B35]/10 text-[#FF6B35] rounded-full text-sm font-semibold mb-4">
                    EXPLORE OUR TOURS
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-[#374151] mb-4">
                    Popular Travel <span class="text-[#FF6B35]">Packages</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Handpicked experiences designed to create unforgettable memories
                </p>
            </div>

            <!-- Filters -->
            <div class="mb-8 bg-white rounded-2xl shadow-lg p-6">
                <div class="flex flex-wrap gap-4 items-center justify-between">
                    <div class="flex flex-wrap gap-4">
                        <select class="px-6 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                            <option>All Destinations</option>
                            @foreach(($destinations ?? []) as $destination)
                                <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                            @endforeach
                        </select>

                        <select class="px-6 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                            <option>All Prices</option>
                            <option>Under $500</option>
                            <option>$500 - $1000</option>
                            <option>$1000 - $2000</option>
                            <option>Above $2000</option>
                        </select>

                        <select class="px-6 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                            <option>Duration</option>
                            <option>1-3 Days</option>
                            <option>4-7 Days</option>
                            <option>8-14 Days</option>
                            <option>15+ Days</option>
                        </select>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-gray-600 font-medium">Sort by:</span>
                        <select class="px-6 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                            <option>Recommended</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Best Rating</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Package Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3xl:grid-cols-4 gap-6">
                @forelse($packages as $package)
                    <div class="package-card bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl relative group">
                        {{-- Bestseller Badge --}}
                        @if(!empty($package->is_bestseller))
                            <div class="absolute top-4 left-4 z-10">
                                <span class="bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white px-4 py-2 rounded-full text-xs font-bold uppercase shadow-lg flex items-center">
                                    <i class="fas fa-fire mr-1"></i> Bestseller
                                </span>
                            </div>
                        @endif

                        {{-- Featured Badge --}}
                        @if(!empty($package->is_featured))
                            <div class="absolute top-4 right-4 z-10">
                                <span class="bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white px-4 py-2 rounded-full text-xs font-bold uppercase shadow-lg flex items-center">
                                    <i class="fas fa-star mr-1"></i> Featured
                                </span>
                            </div>
                        @endif

                        {{-- Image --}}
                        <div class="relative h-56 overflow-hidden">
                            <img
                                src="{{ $package->image_url ?? 'https://images.unsplash.com/photo-1488646953014-85cb44e25828' }}"
                                alt="{{ $package->title }}" 
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <!-- Price Badge -->
                            <div class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-sm rounded-xl px-4 py-3 shadow-xl transform group-hover:scale-105 transition-transform duration-300">
                                <p class="text-xs text-gray-500 uppercase font-semibold">From</p>
                                <p class="text-2xl font-bold text-[#374151]">
                                    ${{ $package->formatted_price ?? number_format((float)($package->price ?? 0), 0) }}
                                </p>
                                <p class="text-xs text-gray-600">{{ $package->price_unit ?? 'per person' }}</p>
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-[#FF6B35] text-sm font-bold uppercase tracking-wide">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    {{ $package->country }}
                                </p>
                                <div class="flex items-center text-gray-600 text-sm">
                                    <i class="fas fa-clock text-[#FF6B35] mr-1"></i>
                                    <span class="font-medium">{{ $package->duration }}</span>
                                </div>
                            </div>

                            <h3 class="text-xl font-bold text-[#374151] mb-2 line-clamp-2 group-hover:text-[#FF6B35] transition-colors duration-300">
                                {{ $package->title }}
                            </h3>

                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                {{ $package->subtitle ?? $package->location ?? 'Experience the beauty and culture of this amazing destination' }}
                            </p>

                            {{-- Tags --}}
                            @php
                                $tags = $package->tags ?? [];
                                if ($tags instanceof \Illuminate\Support\Collection) {
                                    $tags = $tags->all();
                                } elseif (is_string($tags)) {
                                    $tags = array_filter(array_map('trim', explode(',', $tags)));
                                }
                                if (!is_array($tags)) {
                                    $tags = [];
                                }
                            @endphp
                            @if(count($tags))
                                <div class="flex flex-wrap gap-2 mb-4">
                                    @foreach(array_slice($tags, 0, 3) as $tag)
                                        <span class="bg-[#F3F4F6] text-[#374151] px-3 py-1 rounded-full text-xs font-medium hover:bg-[#FF6B35]/10 hover:text-[#FF6B35] transition-colors duration-300">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            {{-- Rating --}}
                            @php $rating = (int) floor((float)($package->rating ?? 4.5)); @endphp
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star text-sm {{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                    @endfor
                                    <span class="ml-2 text-sm text-gray-600 font-medium">
                                        {{ $package->formatted_rating ?? number_format((float)($package->rating ?? 4.5), 1) }}
                                    </span>
                                </div>
                                @if($package->reviews_count ?? rand(10, 150))
                                    <span class="text-xs text-gray-500">
                                        ({{ $package->reviews_count ?? rand(10, 150) }} reviews)
                                    </span>
                                @endif
                            </div>

                            {{-- Features --}}
                            <div class="flex items-center justify-between text-xs text-gray-600 mb-4 pb-4 border-b border-gray-100">
                                <span class="flex items-center">
                                    <i class="fas fa-users text-[#FF6B35] mr-1"></i>
                                    Max {{ $package->max_people ?? '15' }}
                                </span>
                                <span class="flex items-center">
                                    <i class="fas fa-calendar text-[#FF6B35] mr-1"></i>
                                    {{ $package->availability ?? 'Daily' }}
                                </span>
                                <span class="flex items-center">
                                    <i class="fas fa-language text-[#FF6B35] mr-1"></i>
                                    {{ $package->languages ?? 'EN' }}
                                </span>
                            </div>

                            <a href="{{ route('packages.show', $package) }}"
                                class="w-full text-center bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white py-3 rounded-xl hover:from-blue-600 hover:to-[#1E3A8A] transform hover:scale-105 transition-all duration-300 flex items-center justify-center font-semibold shadow-lg">
                                View Details
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20">
                        <i class="fas fa-compass text-6xl text-gray-300 mb-4"></i>
                        <p class="text-xl text-gray-500">No packages found matching your criteria.</p>
                        <p class="text-gray-400 mt-2">Try adjusting your filters or check back later for new tours!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Featured Destinations -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-2 bg-[#1E3A8A]/10 text-[#1E3A8A] rounded-full text-sm font-semibold mb-4">
                    TOP DESTINATIONS
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-[#374151] mb-4">
                    Popular <span class="text-[#1E3A8A]">Destinations</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Explore our most sought-after locations
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @php
                    $popularDestinations = [
                        ['name' => 'Dubai', 'country' => 'UAE', 'tours' => 12, 'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c'],
                        ['name' => 'Bali', 'country' => 'Indonesia', 'tours' => 8, 'image' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4'],
                        ['name' => 'Bangkok', 'country' => 'Thailand', 'tours' => 10, 'image' => 'https://images.unsplash.com/photo-1508009603885-50cf7c579365'],
                        ['name' => 'Singapore', 'country' => 'Singapore', 'tours' => 6, 'image' => 'https://images.unsplash.com/photo-1525625293386-3f8f99389edd'],
                        ['name' => 'Kuala Lumpur', 'country' => 'Malaysia', 'tours' => 7, 'image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07'],
                        ['name' => 'Cairo', 'country' => 'Egypt', 'tours' => 9, 'image' => 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a'],
                    ];
                @endphp

                @foreach($popularDestinations as $dest)
                    <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 cursor-pointer">
                        <div class="aspect-square overflow-hidden">
                            <img src="{{ $dest['image'] }}" 
                                 alt="{{ $dest['name'] }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4">
                            <h3 class="text-white font-bold text-xl mb-1">{{ $dest['name'] }}</h3>
                            <p class="text-white/80 text-sm">{{ $dest['country'] }}</p>
                            <p class="text-[#FF6B35] text-sm font-semibold mt-2">{{ $dest['tours'] }} Tours</p>
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <i class="fas fa-arrow-right text-[#374151]"></i>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20 bg-gradient-to-b from-white to-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-[#FF6B35]/10 text-[#FF6B35] rounded-full text-sm font-semibold mb-4">
                    WHY CHOOSE US
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-[#374151] mb-4">
                    Why Travel with <span class="text-[#FF6B35]">ORIGIN</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Your trusted partner for unforgettable journeys around the world
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div class="relative mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-[#FF6B35] to-orange-600 rounded-2xl flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300 shadow-xl">
                            <i class="fas fa-award text-3xl text-white"></i>
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-16 h-1 bg-gradient-to-r from-[#FF6B35] to-orange-600 rounded-full opacity-50"></div>
                    </div>
                    <h3 class="text-xl font-bold text-[#374151] mb-3">Best Price Guarantee</h3>
                    <p class="text-gray-600 leading-relaxed">Find a lower price? We'll match it and give you 5% off your booking</p>
                </div>
                
                <div class="text-center group">
                    <div class="relative mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-[#1E3A8A] to-blue-600 rounded-2xl flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300 shadow-xl">
                            <i class="fas fa-headset text-3xl text-white"></i>
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-16 h-1 bg-gradient-to-r from-[#1E3A8A] to-blue-600 rounded-full opacity-50"></div>
                    </div>
                    <h3 class="text-xl font-bold text-[#374151] mb-3">24/7 Support</h3>
                    <p class="text-gray-600 leading-relaxed">Round-the-clock assistance for all your travel needs and emergencies</p>
                </div>
                
                <div class="text-center group">
                    <div class="relative mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-[#FF6B35] to-orange-600 rounded-2xl flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300 shadow-xl">
                            <i class="fas fa-shield-alt text-3xl text-white"></i>
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-16 h-1 bg-gradient-to-r from-[#FF6B35] to-orange-600 rounded-full opacity-50"></div>
                    </div>
                    <h3 class="text-xl font-bold text-[#374151] mb-3">Secure Booking</h3>
                    <p class="text-gray-600 leading-relaxed">Your payments and personal data are always protected with SSL encryption</p>
                </div>
                
                <div class="text-center group">
                    <div class="relative mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-[#1E3A8A] to-blue-600 rounded-2xl flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300 shadow-xl">
                            <i class="fas fa-star text-3xl text-white"></i>
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-16 h-1 bg-gradient-to-r from-[#1E3A8A] to-blue-600 rounded-full opacity-50"></div>
                    </div>
                    <h3 class="text-xl font-bold text-[#374151] mb-3">Handpicked Tours</h3>
                    <p class="text-gray-600 leading-relaxed">Carefully curated experiences by travel experts who know every destination</p>
                </div>
            </div>

            <!-- Additional Features -->
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-[#FF6B35]/10 rounded-xl flex items-center justify-center">
                                <i class="fas fa-plane-departure text-[#FF6B35] text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-[#374151] mb-2">Flexible Booking</h4>
                            <p class="text-gray-600 text-sm">Free cancellation up to 24 hours before your tour starts</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-[#1E3A8A]/10 rounded-xl flex items-center justify-center">
                                <i class="fas fa-users text-[#1E3A8A] text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-[#374151] mb-2">Expert Guides</h4>
                            <p class="text-gray-600 text-sm">Local experts who bring destinations to life with their knowledge</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-[#FF6B35]/10 rounded-xl flex items-center justify-center">
                                <i class="fas fa-gift text-[#FF6B35] text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-[#374151] mb-2">Loyalty Rewards</h4>
                            <p class="text-gray-600 text-sm">Earn points with every booking and get exclusive discounts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-[#1E3A8A]/10 text-[#1E3A8A] rounded-full text-sm font-semibold mb-4">
                    TESTIMONIALS
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-[#374151] mb-4">
                    What Our <span class="text-[#1E3A8A]">Travelers Say</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Real experiences from our valued customers
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $testimonials = [
                        [
                            'name' => 'Sarah Johnson',
                            'location' => 'New York, USA',
                            'rating' => 5,
                            'comment' => 'Amazing experience! The tour was well-organized and our guide was incredibly knowledgeable. Would definitely book again.',
                            'tour' => 'Dubai Desert Safari',
                            'avatar' => 'https://i.pravatar.cc/150?img=1'
                        ],
                        [
                            'name' => 'Michael Chen',
                            'location' => 'Singapore',
                            'rating' => 5,
                            'comment' => 'ORIGIN Travels exceeded all expectations. The attention to detail and customer service was outstanding.',
                            'tour' => 'Bali Temple Tour',
                            'avatar' => 'https://i.pravatar.cc/150?img=3'
                        ],
                        [
                            'name' => 'Emma Williams',
                            'location' => 'London, UK',
                            'rating' => 5,
                            'comment' => 'Best travel agency I\'ve ever used. They took care of everything and made our honeymoon perfect!',
                            'tour' => 'Istanbul City Tour',
                            'avatar' => 'https://i.pravatar.cc/150?img=5'
                        ]
                    ];
                @endphp

                @foreach($testimonials as $testimonial)
                    <div class="bg-gradient-to-br from-[#F3F4F6] to-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 relative">
                        <div class="absolute -top-4 -right-4 w-12 h-12 bg-gradient-to-br from-[#FF6B35] to-orange-600 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-quote-right text-white text-lg"></i>
                        </div>
                        
                        <div class="flex items-center mb-6">
                            <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}" class="w-16 h-16 rounded-full object-cover border-4 border-white shadow-md">
                            <div class="ml-4">
                                <h4 class="font-bold text-[#374151] text-lg">{{ $testimonial['name'] }}</h4>
                                <p class="text-gray-500 text-sm">{{ $testimonial['location'] }}</p>
                            </div>
                        </div>

                        <div class="flex mb-4">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                            @endfor
                        </div>

                        <p class="text-gray-600 mb-4 italic">"{{ $testimonial['comment'] }}"</p>
                        
                        <div class="pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-500">
                                <i class="fas fa-map-marker-alt text-[#FF6B35] mr-2"></i>
                                {{ $testimonial['tour'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-br from-[#374151] to-gray-800 relative overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828" 
                 alt="Travel" 
                 class="w-full h-full object-cover opacity-20">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-black/30"></div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Ready for Your Next Adventure?
            </h2>
            <p class="text-xl text-gray-200 mb-8">
                Join thousands of happy travelers who've discovered the world with us
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('customer.contact-us') }}"
                class="px-8 py-4 bg-white/10 backdrop-blur-sm border-2 border-white text-white font-bold rounded-xl hover:bg-white hover:text-[#374151] transform hover:scale-105 transition-all duration-300 flex items-center justify-center">
                <i class="fas fa-phone mr-2"></i>
                Contact Us
            </a>
            </div>
        </div>
    </section>

    <!-- Floating Contact Button -->
    <div class="fixed bottom-8 right-8 z-50 group">
        <button class="w-16 h-16 bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white rounded-full shadow-2xl hover:shadow-3xl transform hover:scale-110 transition-all duration-300 flex items-center justify-center animate-bounce">
            <i class="fas fa-comment-dots text-xl"></i>
        </button>
        <div class="absolute bottom-20 right-0 bg-white rounded-lg shadow-xl p-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 whitespace-nowrap">
            <p class="text-sm font-semibold text-[#374151]">Need help? Chat with us!</p>
        </div>
    </div>

    <!-- Back to Top Button -->
    <div class="fixed bottom-8 left-8 z-50 opacity-0 invisible transition-all duration-300" id="back-to-top">
        <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
                class="w-12 h-12 bg-white/90 backdrop-blur-sm border-2 border-gray-200 text-[#374151] rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 flex items-center justify-center hover:bg-gradient-to-r hover:from-[#FF6B35] hover:to-orange-600 hover:text-white hover:border-[#FF6B35]">
            <i class="fas fa-chevron-up text-sm"></i>
        </button>
    </div>

    <!-- JavaScript -->
    <script>
        // Back to top button visibility
        window.addEventListener('scroll', () => {
            const backToTopButton = document.getElementById('back-to-top');
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.add('opacity-0', 'invisible');
                backToTopButton.classList.remove('opacity-100', 'visible');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Filter functionality (if needed)
        function filterPackages() {
            // Add your filter logic here
            console.log('Filtering packages...');
        }

        // Initialize AOS or similar animation library if needed
        document.addEventListener('DOMContentLoaded', function() {
            // Add any initialization code here
        });
    </script>
</x-app-layout>