@section('title', 'About Us - ORIGIN Travels')

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

<style>
    body { font-family: 'Inter', sans-serif; }
    
    /* Enhanced animations */
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }
    
    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 10px rgba(255, 107, 53, 0.3); }
        50% { box-shadow: 0 0 30px rgba(255, 107, 53, 0.7), 0 0 40px rgba(255, 107, 53, 0.4); }
    }
    
    @keyframes gradient-shift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    @keyframes slide-in-left {
        0% { transform: translateX(-100px); opacity: 0; }
        100% { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes slide-in-right {
        0% { transform: translateX(100px); opacity: 0; }
        100% { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes fade-in-up {
        0% { transform: translateY(50px); opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
    }
    
    @keyframes scale-in {
        0% { transform: scale(0.8); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }
    
    .float-animation {
        animation: float 8s ease-in-out infinite;
    }
    
    .pulse-glow {
        animation: pulse-glow 3s ease-in-out infinite;
    }
    
    .gradient-shift {
        background: linear-gradient(45deg, #FF6B35, #1E3A8A, #FF6B35, #1E3A8A);
        background-size: 400% 400%;
        animation: gradient-shift 4s ease infinite;
    }
    
    .animate-slide-in-left {
        animation: slide-in-left 0.8s ease-out;
    }
    
    .animate-slide-in-right {
        animation: slide-in-right 0.8s ease-out;
    }
    
    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out;
    }
    
    .animate-scale-in {
        animation: scale-in 0.6s ease-out;
    }
    
    .feature-card {
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.8);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .feature-card:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }
    
    .story-image {
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .story-image:hover {
        transform: scale(1.05) rotate(1deg);
    }
    
    /* Parallax scrolling effect */
    .parallax {
        transform: translate3d(0, 0, 0);
        will-change: transform;
    }
    
    /* Counter animation */
    .counter {
        font-variant-numeric: tabular-nums;
    }
</style>

<x-app-layout>
    <section class="relative text-white py-20 overflow-hidden">
        <!-- Background Image -->
        <img src="{{ asset('images/background/tangalle.jpg') }}" 
            alt="Travel Destinations" 
            class="absolute inset-0 w-full h-full object-cover">

        <!-- Black Transparent Overlay -->
        <div class="absolute inset-0 bg-black/60"></div>

        <!-- Optional floating blur circles for decoration -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-dark-orange/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-white/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        <!-- Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in">
                    About
                    <span class="bg-gradient-to-r from-dark-orange via-orange-400 to-dark-orange bg-clip-text text-transparent animate-gradient">
                        ORIGIN Travels
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto mb-8 opacity-90">
                    Your trusted partner in creating extraordinary travel experiences across Asia and beyond.
                </p>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-br from-light-gray via-white to-blue-50 min-h-screen relative overflow-hidden">
        <!-- Enhanced Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-32 right-32 w-80 h-80 bg-dark-orange/8 rounded-full blur-3xl float-animation"></div>
            <div class="absolute bottom-32 left-32 w-96 h-96 bg-dark-blue/6 rounded-full blur-3xl float-animation" style="animation-delay: 3s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-dark-orange/4 rounded-full blur-3xl float-animation" style="animation-delay: 6s;"></div>
            
            <!-- Floating particles -->
            <div class="absolute top-40 left-40 w-3 h-3 bg-dark-orange/30 rounded-full animate-bounce"></div>
            <div class="absolute top-60 right-60 w-2 h-2 bg-dark-blue/40 rounded-full animate-bounce delay-300"></div>
            <div class="absolute bottom-60 left-1/3 w-2.5 h-2.5 bg-dark-orange/25 rounded-full animate-bounce delay-700"></div>
            <div class="absolute bottom-40 right-40 w-2 h-2 bg-dark-blue/35 rounded-full animate-bounce delay-1000"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Enhanced Our Story Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-32">
                <!-- Enhanced Image -->
                <div class="order-2 lg:order-1">
                    <div class="relative group">
                        <div class="absolute -inset-6 bg-gradient-to-r from-dark-blue to-dark-orange rounded-3xl blur-lg opacity-20 group-hover:opacity-40 transition duration-700"></div>
                        <div class="story-image relative overflow-hidden rounded-3xl shadow-2xl">
                            <img src="{{ asset('images/background/bg.jpg') }}" 
                                 class="w-full h-96 object-cover" 
                                 alt="About ORIGIN Travels">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        </div>
                        
                        <!-- Enhanced Floating Elements -->
                        <div class="absolute -top-6 -right-6 w-24 h-24 bg-gradient-to-r from-dark-orange to-orange-400 rounded-full opacity-90 pulse-glow"></div>
                        <div class="absolute -bottom-8 -left-8 w-20 h-20 bg-gradient-to-r from-dark-blue to-blue-500 rounded-full opacity-70 animate-pulse delay-1000"></div>
                        
                        <!-- Company Badge -->
                        <div class="absolute top-6 left-6 bg-white/95 backdrop-blur-sm rounded-2xl p-4 shadow-xl">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-dark-orange rounded-lg flex items-center justify-center">
                                    <i class="fas fa-award text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-dark-blue">Licensed Agency</p>
                                    <p class="text-xs text-gray-600">Since 2010</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Enhanced Content -->
                <div class="order-1 lg:order-2">
                    <div class="animate-fade-in-up">
                        <div class="mb-8">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-gradient-to-r from-dark-blue to-blue-600 rounded-2xl flex items-center justify-center mr-4">
                                    <i class="fas fa-book-open text-white text-lg"></i>
                                </div>
                                <h2 class="text-4xl md:text-5xl font-bold text-dark-gray">
                                    Our 
                                    <span class="bg-gradient-to-r from-dark-blue to-blue-600 bg-clip-text text-transparent">
                                        Story
                                    </span>
                                </h2>
                            </div>
                            <div class="w-24 h-1 bg-gradient-to-r from-dark-orange to-orange-400 rounded-full mb-8"></div>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 border-l-4 border-dark-orange">
                                <p class="text-xl text-dark-gray font-semibold leading-relaxed">
                                    <i class="fas fa-quote-left text-dark-orange mr-2"></i>
                                    Founded in 2010, ORIGIN Travels has been turning travel dreams into reality for over a decade.
                                </p>
                            </div>
                            
                            <div class="space-y-4 text-gray-600 leading-relaxed">
                                <p>
                                    We started with a simple yet powerful mission: to make world-class travel experiences accessible to everyone. What began as a small team of passionate travelers has grown into Sri Lanka's most trusted travel agency, serving thousands of happy customers worldwide.
                                </p>
                                <p>
                                    Our expertise in crafting personalized travel experiences, combined with our deep knowledge of destinations across Asia and the Middle East, makes us your ideal travel partner for any adventure.
                                </p>
                                <p>
                                    Every journey we create is infused with local insights, cultural authenticity, and the highest standards of service that have become our trademark.
                                </p>
                            </div>
                        </div>
                        
                        <!-- Enhanced Stats -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-10">
                            <div class="text-center p-6 bg-white/80 backdrop-blur-sm rounded-2xl border border-white/30 shadow-lg hover:shadow-xl transition-all duration-300 group">
                                <div class="counter text-3xl font-bold text-dark-blue mb-2 group-hover:scale-110 transition-transform">15+</div>
                                <div class="text-sm text-gray-600 font-medium">Years Experience</div>
                            </div>
                            <div class="text-center p-6 bg-white/80 backdrop-blur-sm rounded-2xl border border-white/30 shadow-lg hover:shadow-xl transition-all duration-300 group">
                                <div class="counter text-3xl font-bold text-dark-orange mb-2 group-hover:scale-110 transition-transform">25k+</div>
                                <div class="text-sm text-gray-600 font-medium">Happy Travelers</div>
                            </div>
                            <div class="text-center p-6 bg-white/80 backdrop-blur-sm rounded-2xl border border-white/30 shadow-lg hover:shadow-xl transition-all duration-300 group">
                                <div class="counter text-3xl font-bold text-emerald-600 mb-2 group-hover:scale-110 transition-transform">50+</div>
                                <div class="text-sm text-gray-600 font-medium">Destinations</div>
                            </div>
                            <div class="text-center p-6 bg-white/80 backdrop-blur-sm rounded-2xl border border-white/30 shadow-lg hover:shadow-xl transition-all duration-300 group">
                                <div class="counter text-3xl font-bold text-purple-600 mb-2 group-hover:scale-110 transition-transform">98%</div>
                                <div class="text-sm text-gray-600 font-medium">Satisfaction Rate</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Mission & Vision -->
            <div class="mb-32">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-dark-gray mb-6">
                        Our 
                        <span class="bg-gradient-to-r from-dark-orange to-orange-500 bg-clip-text text-transparent">
                            Purpose
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Driven by passion, guided by purpose
                    </p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Enhanced Mission Card -->
                    <div class="feature-card rounded-3xl p-10 shadow-2xl border border-white/30 group relative overflow-hidden">
                        <!-- Background gradient -->
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-50/50 to-red-50/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10">
                            <div class="flex items-start space-x-6">
                                <div class="flex-shrink-0">
                                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-dark-orange to-orange-500 rounded-3xl group-hover:scale-110 group-hover:rotate-3 transition-transform duration-500 shadow-xl">
                                        <i class="fas fa-bullseye text-white text-2xl group-hover:animate-pulse"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-3xl font-bold text-dark-gray mb-6 group-hover:text-dark-orange transition-colors">
                                        Our Mission
                                    </h4>
                                    <p class="text-gray-600 leading-relaxed text-lg mb-6">
                                        To provide exceptional travel experiences that create lasting memories while ensuring comfort, safety, and value for our customers. We strive to make every journey with ORIGIN Travels an unforgettable adventure.
                                    </p>
                                    <div class="flex items-center text-sm text-dark-orange font-semibold">
                                        <i class="fas fa-heart mr-2"></i>
                                        Creating memories since 2010
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Enhanced Vision Card -->
                    <div class="feature-card rounded-3xl p-10 shadow-2xl border border-white/30 group relative overflow-hidden">
                        <!-- Background gradient -->
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 to-indigo-50/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10">
                            <div class="flex items-start space-x-6">
                                <div class="flex-shrink-0">
                                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-dark-blue to-blue-600 rounded-3xl group-hover:scale-110 group-hover:rotate-3 transition-transform duration-500 shadow-xl">
                                        <i class="fas fa-eye text-white text-2xl group-hover:animate-pulse"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-3xl font-bold text-dark-gray mb-6 group-hover:text-dark-blue transition-colors">
                                        Our Vision
                                    </h4>
                                    <p class="text-gray-600 leading-relaxed text-lg mb-6">
                                        To be the leading travel agency in the region, recognized for our commitment to excellence, innovation in travel services, and dedication to customer satisfaction. We aim to inspire and enable people to explore the world.
                                    </p>
                                    <div class="flex items-center text-sm text-dark-blue font-semibold">
                                        <i class="fas fa-globe mr-2"></i>
                                        Leading the way to tomorrow
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Why Choose Us -->
            <div class="mb-20">
                <div class="text-center mb-20">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-dark-blue to-dark-orange rounded-3xl mb-8 shadow-xl">
                        <img src="{{ asset('logo/planew.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                    </div>
                    <h2 class="text-4xl md:text-6xl font-bold text-dark-gray mb-8">
                        Why Travel with 
                        <span class="bg-gradient-to-r from-dark-orange to-orange-500 bg-clip-text text-transparent">
                            ORIGIN?
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                        We go above and beyond to ensure your travel experience is perfect in every way. 
                        Here's what sets us apart from the rest.
                    </p>
                </div>
                
                <!-- Enhanced Features Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <!-- Feature 1 - Expert Team -->
                    <div class="feature-card text-center rounded-3xl p-10 shadow-xl border border-white/30 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-50/30 to-indigo-50/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10">
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-dark-blue to-blue-600 rounded-3xl mb-8 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500 shadow-2xl">
                                <i class="fas fa-users text-white text-3xl group-hover:animate-pulse"></i>
                            </div>
                            <h5 class="text-2xl font-bold text-dark-gray mb-6 group-hover:text-dark-blue transition-colors">
                                Expert Team
                            </h5>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                Our travel consultants have extensive knowledge and firsthand experience of all our destinations, ensuring authentic recommendations.
                            </p>
                            <div class="flex items-center justify-center text-sm text-dark-blue font-semibold">
                                <i class="fas fa-certificate mr-2"></i>
                                Certified professionals
                            </div>
                        </div>
                    </div>
                    
                    <!-- Feature 2 - Personalized Service -->
                    <div class="feature-card text-center rounded-3xl p-10 shadow-xl border border-white/30 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/30 to-green-50/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10">
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-emerald-500 to-green-500 rounded-3xl mb-8 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500 shadow-2xl">
                                <i class="fas fa-hand-holding-heart text-white text-3xl group-hover:animate-pulse"></i>
                            </div>
                            <h5 class="text-2xl font-bold text-dark-gray mb-6 group-hover:text-emerald-600 transition-colors">
                                Personalized Service
                            </h5>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                We tailor each trip to your unique preferences, ensuring a completely personalized experience that matches your dreams and budget.
                            </p>
                            <div class="flex items-center justify-center text-sm text-emerald-600 font-semibold">
                                <i class="fas fa-magic mr-2"></i>
                                Custom-crafted journeys
                            </div>
                        </div>
                    </div>
                    
                    <!-- Feature 3 - Trust & Safety -->
                    <div class="feature-card text-center rounded-3xl p-10 shadow-xl border border-white/30 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-50/30 to-indigo-50/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10">
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-3xl mb-8 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500 shadow-2xl">
                                <i class="fas fa-shield-alt text-white text-3xl group-hover:animate-pulse"></i>
                            </div>
                            <h5 class="text-2xl font-bold text-dark-gray mb-6 group-hover:text-purple-600 transition-colors">
                                Trust & Safety
                            </h5>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                Licensed and insured, we prioritize your safety and peace of mind throughout your journey with comprehensive travel protection.
                            </p>
                            <div class="flex items-center justify-center text-sm text-purple-600 font-semibold">
                                <i class="fas fa-lock mr-2"></i>
                                Fully licensed & insured
                            </div>
                        </div>
                    </div>
                    
                    <!-- Feature 4 - Best Value -->
                    <div class="feature-card text-center rounded-3xl p-10 shadow-xl border border-white/30 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-50/30 to-red-50/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10">
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-dark-orange to-orange-500 rounded-3xl mb-8 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500 shadow-2xl">
                                <i class="fas fa-dollar-sign text-white text-3xl group-hover:animate-pulse"></i>
                            </div>
                            <h5 class="text-2xl font-bold text-dark-gray mb-6 group-hover:text-dark-orange transition-colors">
                                Best Value
                            </h5>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                Competitive pricing without compromising on quality, with exclusive deals and packages that deliver exceptional value for money.
                            </p>
                            <div class="flex items-center justify-center text-sm text-dark-orange font-semibold">
                                <i class="fas fa-tags mr-2"></i>
                                Exclusive deals & packages
                            </div>
                        </div>
                    </div>
                    
                    <!-- Feature 5 - 24/7 Support -->
                    <div class="feature-card text-center rounded-3xl p-10 shadow-xl border border-white/30 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-50/30 to-blue-50/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10">
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-3xl mb-8 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500 shadow-2xl">
                                <i class="fas fa-headset text-white text-3xl group-hover:animate-pulse"></i>
                            </div>
                            <h5 class="text-2xl font-bold text-dark-gray mb-6 group-hover:text-cyan-600 transition-colors">
                                24/7 Support
                            </h5>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                Round-the-clock assistance before, during, and after your trip for complete peace of mind and immediate problem resolution.
                            </p>
                            <div class="flex items-center justify-center text-sm text-cyan-600 font-semibold">
                                <i class="fas fa-clock mr-2"></i>
                                Always here for you
                            </div>
                        </div>
                    </div>
                    
                    <!-- Feature 6 - Local Expertise -->
                    <div class="feature-card text-center rounded-3xl p-10 shadow-xl border border-white/30 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-red-50/30 to-pink-50/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <div class="relative z-10">
                            <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-red-500 to-pink-500 rounded-3xl mb-8 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500 shadow-2xl">
                                <i class="fas fa-globe-asia text-white text-3xl group-hover:animate-pulse"></i>
                            </div>
                            <h5 class="text-2xl font-bold text-dark-gray mb-6 group-hover:text-red-600 transition-colors">
                                Local Expertise
                            </h5>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                Strong partnerships with local suppliers ensure authentic experiences, insider access, and genuine cultural immersion opportunities.
                            </p>
                            <div class="flex items-center justify-center text-sm text-red-600 font-semibold">
                                <i class="fas fa-handshake mr-2"></i>
                                Local partnerships
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Call to Action -->
            <div class="text-center mt-16 bg-gradient-to-r from-dark-blue to-blue-600 rounded-3xl p-12 relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 bg-white/5 opacity-50">
                    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 50px 50px;"></div>
                </div>
                
                <div class="relative z-10">
                    <h3 class="text-3xl md:text-4xl font-bold text-white mb-6">
                        Ready to Start Your Adventure?
                    </h3>
                    <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                        Let our expert team craft the perfect travel experience just for you
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#contact" class="inline-flex items-center px-8 py-4 bg-white text-dark-blue font-semibold rounded-xl hover:bg-light-gray transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <i class="fas fa-phone mr-2"></i>
                            Contact Us Today
                        </a>
                        <a href="#packages" class="inline-flex items-center px-8 py-4 border-2 border-white text-white font-semibold rounded-xl hover:bg-white hover:text-dark-blue transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-compass mr-2"></i>
                            View Our Packages
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>