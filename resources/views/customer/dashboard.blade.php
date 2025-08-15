@section('title', 'Home - ORIGIN Travels')

<script>
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

<x-app-layout>
    <!-- Enhanced Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image -->
        <img src="{{ asset('images/background/Beach.jpg') }}" 
            alt="Travel Destinations" 
            class="absolute inset-0 w-full h-full object-cover">

        <!-- Black Transparent Overlay -->
        <div class="absolute inset-0 bg-black/60"></div>

        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-dark-orange/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-white/5 rounded-full blur-3xl animate-pulse delay-1000"></div>
            <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-dark-orange/5 rounded-full blur-2xl animate-pulse delay-500"></div>
            <div class="absolute bottom-1/3 right-1/3 w-48 h-48 bg-white/3 rounded-full blur-2xl animate-pulse delay-700"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                    Explore the World with 
                    <span class="bg-gradient-to-r from-dark-orange to-orange-400 bg-clip-text text-transparent">
                        ORIGIN Travels
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Discover amazing destinations and create unforgettable memories with our carefully curated travel packages.
                </p>
                
                <!-- Enhanced CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('customer.destination') }}" 
                    class="group px-8 py-4 bg-gradient-to-r from-dark-orange to-orange-600 text-white font-semibold rounded-xl hover:from-orange-600 hover:to-dark-orange transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl relative overflow-hidden">
                        <span class="relative z-10 flex items-center justify-center">
                            <i class="fas fa-compass mr-2 group-hover:animate-spin"></i>
                            Explore Packages
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                        </span>
                        <!-- Shine effect -->
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 translate-x-full group-hover:-translate-x-full transition-transform duration-1000"></div>
                        </div>
                    </a>
                    
                    <a href="{{ route('customer.contact-us') }}" 
                    class="group px-8 py-4 border-2 border-white text-white font-semibold rounded-xl hover:bg-white hover:text-dark-blue transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <i class="fas fa-phone mr-2 group-hover:animate-pulse"></i>
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Featured Packages -->
    <section class="py-20 bg-white relative overflow-hidden">
        <!-- Background pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #1E3A8A 1px, transparent 1px); background-size: 50px 50px;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-dark-blue mb-6">
                    Featured 
                    <span class="bg-gradient-to-r from-dark-orange to-orange-500 bg-clip-text text-transparent">
                        Packages
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Handpicked destinations for your perfect vacation
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- INDIA PACKAGES -->
                <!-- 1. India Golden Triangle -->
                <div class="destination-card group bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-transparent hover:border-dark-orange/30 transform hover:-translate-y-2"
                        data-country="india" data-price="1299" data-duration="7" data-type="group">
                    <div class="relative overflow-hidden h-64">
                        <img src="https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=500&h=300&fit=crop" 
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" 
                                alt="Taj Mahal India">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                        
                        <!-- Badge -->
                        <div class="absolute top-4 left-4">
                            <div class="bg-gradient-to-r from-dark-orange to-orange-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                BESTSELLER
                            </div>
                        </div>

                        <!-- Price Tag -->
                        <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-lg">
                            <div class="text-2xl font-bold text-dark-blue">$1,299</div>
                            <div class="text-xs text-gray-600">per person</div>
                        </div>
                    </div>
                    
                    <div class="p-6 bg-gradient-to-b from-white to-light-gray/30">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm text-dark-orange font-semibold">INDIA</span>
                            <div class="flex items-center text-yellow-500">
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <span class="text-gray-600 text-xs ml-1">(4.9)</span>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-dark-gray mb-3 group-hover:text-dark-orange transition-colors">Golden Triangle Tour</h3>
                        <div class="flex items-center text-gray-600 mb-2">
                            <i class="fas fa-clock text-dark-orange mr-2"></i>
                            <span>8 Days 7 Nights</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Shimla - Manali - Dharamshala - Rishikesh | Mountain peaks and spiritual retreats</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs bg-dark-blue/10 text-dark-blue px-3 py-1 rounded-full">Trekking</span>
                            <span class="text-xs bg-dark-orange/10 text-dark-orange px-3 py-1 rounded-full">Yoga Retreat</span>
                        </div>
                        <a href="#">
                            <button class="w-full py-3 bg-gradient-to-r from-dark-blue to-blue-700 text-white font-semibold rounded-xl hover:from-dark-orange hover:to-orange-600 transform hover:scale-105 transition-all duration-300">
                                <span>View Tour</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </a>
                    </div>
                </div>
                
                <!-- Maldives Package -->
                <div class="destination-card group bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-transparent hover:border-dark-orange/30 transform hover:-translate-y-2"
                        data-country="maldives" data-price="2499" data-duration="6" data-type="group">
                    <div class="relative overflow-hidden h-64">
                        <img src="https://images.unsplash.com/photo-1540202404-a2f29016b523?w=500&h=300&fit=crop" 
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" 
                                alt="Maldives Family">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                        
                        <!-- Badge -->
                        <div class="absolute top-4 left-4">
                            <div class="bg-gradient-to-r from-yellow-600 to-amber-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                FAMILY
                            </div>
                        </div>

                        <!-- Price Tag -->
                        <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-lg">
                            <div class="text-2xl font-bold text-dark-blue">$2,499</div>
                            <div class="text-xs text-gray-600">per person</div>
                        </div>
                    </div>
                    
                    <div class="p-6 bg-gradient-to-b from-white to-light-gray/30">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm text-dark-orange font-semibold">MALDIVES</span>
                            <div class="flex items-center text-yellow-500">
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star-half-alt text-xs"></i>
                                <span class="text-gray-600 text-xs ml-1">(4.8)</span>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-dark-gray mb-3 group-hover:text-dark-orange transition-colors">Maldives Family Fun</h3>
                        <div class="flex items-center text-gray-600 mb-2">
                            <i class="fas fa-clock text-dark-orange mr-2"></i>
                            <span>6 Days 5 Nights</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Family resort - Kids club - Dolphin watching - Beach activities</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs bg-dark-blue/10 text-dark-blue px-3 py-1 rounded-full">Kids Club</span>
                            <span class="text-xs bg-dark-orange/10 text-dark-orange px-3 py-1 rounded-full">Family Suite</span>
                        </div>
                        <a href="#">
                            <button class="w-full py-3 bg-gradient-to-r from-dark-blue to-blue-700 text-white font-semibold rounded-xl hover:from-dark-orange hover:to-orange-600 transform hover:scale-105 transition-all duration-300">
                                <span>View Tour</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </a>
                    </div>
                </div>
                
                <!-- Bali Package -->
                <div class="destination-card group bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-transparent hover:border-dark-orange/30 transform hover:-translate-y-2"
                        data-country="bali" data-price="1099" data-duration="7" data-type="group">
                    <div class="relative overflow-hidden h-64">
                        <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=500&h=300&fit=crop" 
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" 
                                alt="Bali Temple">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                        
                        <!-- Badge -->
                        <div class="absolute top-4 left-4">
                            <div class="bg-gradient-to-r from-pink-600 to-pink-800 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                POPULAR
                            </div>
                        </div>

                        <!-- Price Tag -->
                        <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-lg">
                            <div class="text-2xl font-bold text-dark-blue">$1,099</div>
                            <div class="text-xs text-gray-600">per person</div>
                        </div>
                    </div>
                    
                    <div class="p-6 bg-gradient-to-b from-white to-light-gray/30">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm text-dark-orange font-semibold">BALI</span>
                            <div class="flex items-center text-yellow-500">
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star text-xs"></i>
                                <i class="fas fa-star-half-alt text-xs"></i>
                                <span class="text-gray-600 text-xs ml-1">(4.8)</span>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-dark-gray mb-3 group-hover:text-dark-orange transition-colors">Bali Beach & Culture</h3>
                        <div class="flex items-center text-gray-600 mb-2">
                            <i class="fas fa-clock text-dark-orange mr-2"></i>
                            <span>7 Days 6 Nights</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Ubud - Seminyak - Uluwatu - Nusa Dua | Temples, beaches & rice terraces</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs bg-dark-blue/10 text-dark-blue px-3 py-1 rounded-full">Beach Resort</span>
                            <span class="text-xs bg-dark-orange/10 text-dark-orange px-3 py-1 rounded-full">Cultural Tours</span>
                        </div>
                        <a href="#">
                            <button class="w-full py-3 bg-gradient-to-r from-dark-blue to-blue-700 text-white font-semibold rounded-xl hover:from-dark-orange hover:to-orange-600 transform hover:scale-105 transition-all duration-300">
                                <span>View Tour</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="#" 
                   class="inline-flex items-center px-8 py-4 border-2 border-dark-blue text-dark-blue font-semibold rounded-xl hover:bg-dark-blue hover:text-white transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                    View All Packages
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Enhanced Why Choose Us -->
    <section class="py-20 bg-gradient-to-br from-light-gray to-blue-50 relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute top-10 right-10 w-64 h-64 bg-dark-orange/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-80 h-80 bg-dark-blue/5 rounded-full blur-3xl"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-dark-blue mb-6">
                    Why Choose 
                    <span class="bg-gradient-to-r from-dark-orange to-orange-500 bg-clip-text text-transparent">
                        ORIGIN Travels?
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    We make your travel dreams come true
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="group text-center bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-white/50 hover:border-dark-orange/20 transform hover:-translate-y-2">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-dark-orange to-orange-500 rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="fas fa-award text-white text-2xl"></i>
                    </div>
                    <h5 class="text-xl font-bold text-dark-gray mb-4 group-hover:text-dark-orange transition-colors">Best Price Guarantee</h5>
                    <p class="text-gray-600 leading-relaxed">Get the best value for your money with our competitive pricing</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="group text-center bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-white/50 hover:border-blue-200 transform hover:-translate-y-2">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-dark-blue to-blue-700 rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="fas fa-headset text-white text-2xl"></i>
                    </div>
                    <h5 class="text-xl font-bold text-dark-gray mb-4 group-hover:text-dark-blue transition-colors">24/7 Support</h5>
                    <p class="text-gray-600 leading-relaxed">Our dedicated team is available round the clock to assist you</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="group text-center bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-white/50 hover:border-emerald-200 transform hover:-translate-y-2">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-emerald-500 to-green-600 rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h5 class="text-xl font-bold text-dark-gray mb-4 group-hover:text-emerald-600 transition-colors">Safe & Secure</h5>
                    <p class="text-gray-600 leading-relaxed">Your safety is our priority with verified accommodations and services</p>
                </div>
                
                <!-- Feature 4 -->
                <div class="group text-center bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-white/50 hover:border-yellow-200 transform hover:-translate-y-2">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="fas fa-star text-white text-2xl"></i>
                    </div>
                    <h5 class="text-xl font-bold text-dark-gray mb-4 group-hover:text-yellow-600 transition-colors">Handpicked Hotels</h5>
                    <p class="text-gray-600 leading-relaxed">Stay at carefully selected hotels for the best experience</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Testimonials -->
    <section class="py-20 bg-white relative overflow-hidden">
        <!-- Background pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 75% 75%, #FF6B35 1px, transparent 1px); background-size: 60px 60px;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-dark-blue mb-6">
                    What Our 
                    <span class="bg-gradient-to-r from-dark-orange to-orange-500 bg-clip-text text-transparent">
                        Customers Say
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Read about experiences from our happy travelers
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="group bg-white/90 backdrop-blur-sm rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-dark-orange/20 transform hover:-translate-y-2">
                    <!-- Star Rating -->
                    <div class="flex mb-6 space-x-1">
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-6 italic">
                        "Amazing experience! The Maldives package was perfectly organized. Every detail was taken care of."
                    </p>
                    <div class="flex items-center">
                        <img src="https://ui-avatars.com/api/?name=Sarah+Johnson&background=FF6B35&color=fff" 
                             class="w-12 h-12 rounded-full mr-4 ring-2 ring-dark-orange/20" 
                             alt="Sarah Johnson">
                        <div>
                            <h6 class="font-bold text-dark-gray group-hover:text-dark-orange transition-colors">Sarah Johnson</h6>
                            <small class="text-gray-500">Maldives Package</small>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="group bg-white/90 backdrop-blur-sm rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-dark-blue/20 transform hover:-translate-y-2">
                    <!-- Star Rating -->
                    <div class="flex mb-6 space-x-1">
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-6 italic">
                        "Sri Lanka tour exceeded all expectations. The guides were knowledgeable and friendly. Highly recommend!"
                    </p>
                    <div class="flex items-center">
                        <img src="https://ui-avatars.com/api/?name=Michael+Chen&background=1E3A8A&color=fff" 
                             class="w-12 h-12 rounded-full mr-4 ring-2 ring-dark-blue/20" 
                             alt="Michael Chen">
                        <div>
                            <h6 class="font-bold text-dark-gray group-hover:text-dark-blue transition-colors">Michael Chen</h6>
                            <small class="text-gray-500">Sri Lanka Package</small>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="group bg-white/90 backdrop-blur-sm rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-emerald-200 transform hover:-translate-y-2">
                    <!-- Star Rating -->
                    <div class="flex mb-6 space-x-1">
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-6 italic">
                        "Bali was magical! ORIGIN Travels made everything so easy. From airport pickup to hotel, everything was smooth."
                    </p>
                    <div class="flex items-center">
                        <img src="https://ui-avatars.com/api/?name=Emma+Wilson&background=10B981&color=fff" 
                             class="w-12 h-12 rounded-full mr-4 ring-2 ring-emerald-500/20" 
                             alt="Emma Wilson">
                        <div>
                            <h6 class="font-bold text-dark-gray group-hover:text-emerald-600 transition-colors">Emma Wilson</h6>
                            <small class="text-gray-500">Bali Package</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Newsletter -->
    <section class="py-16 bg-gradient-to-r from-dark-blue to-blue-800 text-white relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-20 -right-20 w-40 h-40 bg-dark-orange/10 rounded-full blur-2xl"></div>
            <div class="absolute -bottom-20 -left-20 w-32 h-32 bg-white/5 rounded-full blur-2xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="text-center lg:text-left">
                    <h3 class="text-3xl md:text-4xl font-bold mb-4">
                        Subscribe to Our Newsletter
                    </h3>
                    <p class="text-xl text-blue-100">
                        Get exclusive deals and travel tips delivered to your inbox
                    </p>
                </div>
                <div class="w-full lg:w-auto">
                    <form class="flex flex-col sm:flex-row gap-4 min-w-0 lg:min-w-96">
                        <input type="email" 
                               class="flex-1 px-6 py-4 border border-white/20 rounded-xl bg-white/10 backdrop-blur-sm text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-dark-orange focus:border-transparent transition-all duration-200" 
                               placeholder="Enter your email">
                        <button type="submit" 
                                class="px-8 py-4 bg-gradient-to-r from-dark-orange to-orange-600 text-white font-semibold rounded-xl hover:from-orange-600 hover:to-dark-orange transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl whitespace-nowrap">
                            <i class="fas fa-paper-plane mr-2"></i>Subscribe
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Additional Newsletter Benefits -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12 pt-8 border-t border-white/20">
                <div class="text-center">
                    <div class="w-12 h-12 bg-white/10 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-percent text-dark-orange text-xl"></i>
                    </div>
                    <h6 class="font-semibold text-white mb-2">Exclusive Deals</h6>
                    <p class="text-blue-200 text-sm">Get up to 30% off on selected packages</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-white/10 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-map-marked-alt text-dark-orange text-xl"></i>
                    </div>
                    <h6 class="font-semibold text-white mb-2">Travel Tips</h6>
                    <p class="text-blue-200 text-sm">Expert advice for your perfect vacation</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-white/10 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-bell text-dark-orange text-xl"></i>
                    </div>
                    <h6 class="font-semibold text-white mb-2">Early Access</h6>
                    <p class="text-blue-200 text-sm">Be first to know about new destinations</p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>