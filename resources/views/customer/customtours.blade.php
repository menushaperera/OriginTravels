
<x-app-layout>
@section('title', 'Custom Tours - ORIGIN Travels')
{{-- Add CSRF meta tag --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

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
        0%, 100% { box-shadow: 0 0 5px rgba(255, 107, 53, 0.3); }
        50% { box-shadow: 0 0 30px rgba(255, 107, 53, 0.6), 0 0 40px rgba(255, 107, 53, 0.4); }
    }
    
    @keyframes gradient-shift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    @keyframes step-highlight {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
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
    
    .step-card:hover {
        animation: step-highlight 0.6s ease-in-out;
    }
    
    .form-section {
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.95);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .form-section:hover {
        transform: translateY(-2px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .input-group {
        position: relative;
        overflow: hidden;
    }
    
    .input-group::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, #FF6B35, transparent);
        transition: left 0.5s;
    }
    
    .input-group.focused::before {
        left: 100%;
    }
    
    /* Enhanced form styling */
    .custom-select {
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23374151' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6,9 12,15 18,9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1em;
    }
    
    .radio-card {
        transition: all 0.3s ease;
    }
    
    .radio-card:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.15);
    }
    
    .progress-bar {
        height: 4px;
        background: linear-gradient(90deg, #FF6B35 0%, #1E3A8A 100%);
        border-radius: 2px;
        transform-origin: left;
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }
    
    .section-entered .progress-bar {
        transform: scaleX(1);
    }
</style>

    <section class="relative text-white py-20 overflow-hidden">
        <!-- Background Image -->
        <img src="{{ asset('images/background/customtour.jpg') }}" 
            alt="Custom Tours" 
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
                    Custom 
                    <span class="bg-gradient-to-r from-dark-orange via-orange-400 to-dark-orange bg-clip-text text-transparent animate-gradient">
                        Tours
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto mb-8 opacity-90">
                    Design your dream journey with personalized itineraries, exclusive experiences, and unforgettable moments.
                </p>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-br from-light-gray via-white to-blue-50 min-h-screen relative overflow-hidden">
        <!-- Enhanced Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 right-20 w-80 h-80 bg-dark-orange/8 rounded-full blur-3xl float-animation"></div>
            <div class="absolute bottom-20 left-20 w-96 h-96 bg-dark-blue/6 rounded-full blur-3xl float-animation" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-dark-orange/4 rounded-full blur-3xl float-animation" style="animation-delay: 4s;"></div>
            
            <!-- Floating particles -->
            <div class="absolute top-32 left-32 w-3 h-3 bg-dark-orange/30 rounded-full animate-bounce"></div>
            <div class="absolute top-48 right-48 w-2 h-2 bg-dark-blue/40 rounded-full animate-bounce delay-300"></div>
            <div class="absolute bottom-48 left-1/3 w-2.5 h-2.5 bg-dark-orange/25 rounded-full animate-bounce delay-700"></div>
            <div class="absolute bottom-32 right-32 w-2 h-2 bg-dark-blue/35 rounded-full animate-bounce delay-1000"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Enhanced Header Section -->
            <div class="text-center py-16 px-6 mb-16">
                <div class="mb-12">
                    <h2 class="text-5xl md:text-7xl font-bold mb-8 leading-tight">
                        Enjoy a holiday 
                        <span class="bg-gradient-to-r from-dark-orange to-orange-500 bg-clip-text text-transparent">
                            tailored to you.
                        </span>
                    </h2>
                    <div class="w-32 h-2 gradient-shift mx-auto rounded-full mb-8"></div>
                </div>
                
                <div class="max-w-5xl mx-auto mb-12">
                    <div class="bg-white/90 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-white/30">
                        <p class="text-xl text-gray-700 leading-relaxed mb-6">
                            At <strong class="text-dark-blue font-bold">Origin Travels</strong> we understand you may prefer a private tour created just for you.
                            Whether you want to visit places not covered by our standard tours, travel with your private party alone,
                            or enjoy a special interest vacation for larger groups such as a culinary or religious tour, our experienced
                            travel consultants can create a journey around your interests and needs.
                        </p>
                    </div>
                </div>

                <!-- Enhanced Process Steps -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    <!-- Step 1 -->
                    <div class="relative group">
                        <div class="step-card text-center p-8 bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-white/40 transform hover:-translate-y-4">
                            <!-- Step Circle -->
                            <div class="relative mb-8">
                                <div class="w-24 h-24 bg-gradient-to-br from-dark-blue to-blue-700 rounded-3xl flex items-center justify-center mx-auto shadow-2xl group-hover:scale-110 transition-transform duration-500 group-hover:rotate-3">
                                    <i class="fas fa-paper-plane text-white text-3xl group-hover:animate-pulse"></i>
                                </div>
                                <!-- Step Number -->
                                <div class="absolute -bottom-3 -right-3 w-10 h-10 bg-dark-orange text-white rounded-full flex items-center justify-center text-lg font-bold shadow-lg pulse-glow">
                                    1
                                </div>
                            </div>
                            <h4 class="text-xl font-bold text-dark-gray mb-4 group-hover:text-dark-blue transition-colors">
                                Submit Your Request
                            </h4>
                            <p class="text-gray-600 leading-relaxed">
                                Submit your tailor made tour request with all your preferences and requirements
                            </p>
                            
                            <!-- Progress bar -->
                            <div class="progress-bar mt-6 mx-auto w-3/4"></div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative group">
                        <div class="step-card text-center p-8 bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-white/40 transform hover:-translate-y-4">
                            <!-- Step Circle -->
                            <div class="relative mb-8">
                                <div class="w-24 h-24 bg-gradient-to-br from-dark-orange to-orange-600 rounded-3xl flex items-center justify-center mx-auto shadow-2xl group-hover:scale-110 transition-transform duration-500 group-hover:rotate-3">
                                    <i class="fas fa-headset text-white text-3xl group-hover:animate-pulse"></i>
                                </div>
                                <!-- Step Number -->
                                <div class="absolute -bottom-3 -right-3 w-10 h-10 bg-dark-blue text-white rounded-full flex items-center justify-center text-lg font-bold shadow-lg">
                                    2
                                </div>
                            </div>
                            <h4 class="text-xl font-bold text-dark-gray mb-4 group-hover:text-dark-orange transition-colors">
                                Expert Consultation
                            </h4>
                            <p class="text-gray-600 leading-relaxed">
                                One of our travel consultants will contact you with pricing details and recommendations
                            </p>
                            
                            <!-- Progress bar -->
                            <div class="progress-bar mt-6 mx-auto w-3/4"></div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative group">
                        <div class="step-card text-center p-8 bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-white/40 transform hover:-translate-y-4">
                            <!-- Step Circle -->
                            <div class="relative mb-8">
                                <div class="w-24 h-24 bg-gradient-to-br from-emerald-500 to-green-600 rounded-3xl flex items-center justify-center mx-auto shadow-2xl group-hover:scale-110 transition-transform duration-500 group-hover:rotate-3">
                                    <i class="fas fa-route text-white text-3xl group-hover:animate-pulse"></i>
                                </div>
                                <!-- Step Number -->
                                <div class="absolute -bottom-3 -right-3 w-10 h-10 bg-dark-orange text-white rounded-full flex items-center justify-center text-lg font-bold shadow-lg">
                                    3
                                </div>
                            </div>
                            <h4 class="text-xl font-bold text-dark-gray mb-4 group-hover:text-emerald-600 transition-colors">
                                Custom Itinerary
                            </h4>
                            <p class="text-gray-600 leading-relaxed">
                                We work closely with you to create an itinerary perfectly suited to your needs
                            </p>
                            
                            <!-- Progress bar -->
                            <div class="progress-bar mt-6 mx-auto w-3/4"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Display Success Message if exists --}}
            @if(session('success'))
            <div class="max-w-6xl mx-auto mb-8">
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-3"></i>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            </div>
            @endif

            {{-- Display Error Message if exists --}}
            @if(session('error'))
            <div class="max-w-6xl mx-auto mb-8">
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-3"></i>
                        <p>{{ session('error') }}</p>
                    </div>
                </div>
            </div>
            @endif

            {{-- Display Validation Errors --}}
            @if($errors->any())
            <div class="max-w-6xl mx-auto mb-8">
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg">
                    <p class="font-bold mb-2">Please fix the following errors:</p>
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <!-- Enhanced Form -->
            <div id="custom-tour-form" class="form-section rounded-3xl p-10 md:p-16 shadow-2xl border border-white/30 max-w-6xl mx-auto relative overflow-hidden">
                <!-- Decorative elements -->
                <div class="absolute top-0 left-0 w-full h-2 gradient-shift"></div>
                <div class="absolute -top-32 -right-32 w-64 h-64 bg-dark-orange/5 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-32 -left-32 w-48 h-48 bg-dark-blue/5 rounded-full blur-3xl"></div>

                <!-- Form Header -->
                <div class="text-center mb-12 relative z-10">
                    <div class="w-20 h-20 bg-gradient-to-r from-dark-blue to-dark-orange rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                        <i class="fas fa-map-marked-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-dark-blue mb-4">Design Your Perfect Journey</h3>
                    <p class="text-gray-600 max-w-2xl mx-auto">Tell us about your dream destination and travel preferences</p>
                </div>

                <!-- SIMPLE FORM - NO AJAX -->
                <form id="custom-tour-form-element" action="{{ route('customer.custom.tours.submit') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <!-- Choose Destination -->
                    <div class="form-section-item bg-gradient-to-r from-blue-50/50 to-indigo-50/50 rounded-2xl p-8 border border-blue-100">
                        <div class="flex items-center mb-8">
                            <div class="w-12 h-12 bg-dark-blue rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <i class="fas fa-map-marker-alt text-white text-lg"></i>
                            </div>
                            <div>
                                <h5 class="text-2xl font-bold text-dark-blue">Choose Destination</h5>
                                <p class="text-gray-600">Where would you like to go?</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-globe text-dark-orange mr-2"></i>
                                    Select Region
                                </label>
                                <div class="relative">
                                    <select name="region" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-dark-blue focus:border-dark-blue transition-all duration-300 appearance-none bg-white hover:border-gray-300 shadow-sm hover:shadow-md @error('region') border-red-500 @enderror">
                                        <option value="">Choose a region...</option>
                                        <option value="Asia" {{ old('region') == 'Asia' ? 'selected' : '' }}>Asia</option>
                                        <option value="Middle East" {{ old('region') == 'Middle East' ? 'selected' : '' }}>Middle East</option>
                                        <option value="Europe" {{ old('region') == 'Europe' ? 'selected' : '' }}>Europe</option>
                                    </select>
                                </div>
                                @error('region')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-flag text-dark-orange mr-2"></i>
                                    Select Country
                                </label>
                                <div class="relative">
                                    <select name="country" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-dark-blue focus:border-dark-blue transition-all duration-300 appearance-none bg-white hover:border-gray-300 shadow-sm hover:shadow-md @error('country') border-red-500 @enderror">
                                        <option value="">Choose a country...</option>
                                        <option value="Maldives" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                        <option value="Maldives" {{ old('country') == 'Maldives' ? 'selected' : '' }}>Maldives</option>
                                        <option value="Indonesia" {{ old('country') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                        <option value="United Arab Emirates" {{ old('country') == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
                                        <option value="Singapore" {{ old('country') == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                                    </select>
                                </div>
                                @error('country')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-city text-dark-orange mr-2"></i>
                                    Select City
                                </label>
                                <div class="relative">
                                    <select name="city" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-dark-blue focus:border-dark-blue transition-all duration-300 appearance-none bg-white hover:border-gray-300 shadow-sm hover:shadow-md @error('city') border-red-500 @enderror">
                                        <option value="">Choose a city...</option>
                                        <option value="Male" {{ old('city') == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Bali" {{ old('city') == 'Bali' ? 'selected' : '' }}>Bali</option>
                                        <option value="Dubai" {{ old('city') == 'Dubai' ? 'selected' : '' }}>Dubai</option>
                                        <option value="Singapore" {{ old('city') == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                                    </select>
                                </div>
                                @error('city')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Flights -->
                    <div class="form-section-item bg-gradient-to-r from-orange-50/50 to-red-50/50 rounded-2xl p-8 border border-orange-100">
                        <div class="flex items-center mb-8">
                            <div class="w-12 h-12 bg-dark-orange rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <i class="fas fa-plane text-white text-lg"></i>
                            </div>
                            <div>
                                <h5 class="text-2xl font-bold text-dark-blue">Flight Preferences</h5>
                                <p class="text-gray-600">Let us know about your flight requirements</p>
                            </div>
                        </div>
                        <div class="space-y-8">
                            <div>
                                <label class="block text-sm font-bold text-dark-gray mb-4 flex items-center">
                                    <i class="fas fa-question-circle text-dark-orange mr-2"></i>
                                    Include International Flights?
                                </label>
                                <div class="flex flex-wrap gap-6">
                                    <label class="radio-card flex items-center cursor-pointer group p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-dark-blue transition-all duration-300">
                                        <input type="radio" name="flights" value="yes" {{ old('flights') == 'yes' ? 'checked' : '' }}>
                                        <span class="ml-2 text-dark-gray group-hover:text-dark-blue transition-colors duration-200 font-semibold">Yes, include flights</span>
                                    </label>
                                    <label class="radio-card flex items-center cursor-pointer group p-4 bg-white rounded-xl border-2 border-gray-200 hover:border-dark-blue transition-all duration-300">
                                        <input type="radio" name="flights" value="no" {{ old('flights') == 'no' ? 'checked' : '' }}>
                                        <span class="ml-2 text-dark-gray group-hover:text-dark-blue transition-colors duration-200 font-semibold">No, I'll arrange my own</span>
                                    </label>
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-plane-departure text-dark-orange mr-2"></i>
                                    Departure City
                                </label>
                                <div class="relative max-w-md">
                                    <select name="departure_city" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-dark-orange focus:border-dark-orange transition-all duration-300 appearance-none bg-white hover:border-gray-300 shadow-sm hover:shadow-md">
                                        <option value="">Select departure city...</option>
                                        <option value="Colombo, Sri Lanka" {{ old('departure_city') == 'Colombo, Sri Lanka' ? 'selected' : '' }}>Colombo, Sri Lanka</option>
                                        <option value="Singapore" {{ old('departure_city') == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                                        <option value="Dubai, UAE" {{ old('departure_city') == 'Dubai, UAE' ? 'selected' : '' }}>Dubai, UAE</option>
                                        <option value="Bangkok, Thailand" {{ old('departure_city') == 'Bangkok, Thailand' ? 'selected' : '' }}>Bangkok, Thailand</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Travel Dates -->
                    <div class="form-section-item bg-gradient-to-r from-green-50/50 to-emerald-50/50 rounded-2xl p-8 border border-green-100">
                        <div class="flex items-center mb-8">
                            <div class="w-12 h-12 bg-emerald-500 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <i class="fas fa-calendar-alt text-white text-lg"></i>
                            </div>
                            <div>
                                <h5 class="text-2xl font-bold text-dark-blue">Travel Dates</h5>
                                <p class="text-gray-600">When would you like to travel?</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                            <div class="input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-calendar-day text-emerald-500 mr-2"></i>
                                    Departure Date
                                </label>
                                <input type="date" name="departure_date" value="{{ old('departure_date') }}" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-300 bg-white hover:border-gray-300 shadow-sm hover:shadow-md @error('departure_date') border-red-500 @enderror">
                                @error('departure_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-calendar-check text-emerald-500 mr-2"></i>
                                    Return Date
                                </label>
                                <input type="date" name="return_date" value="{{ old('return_date') }}" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-300 bg-white hover:border-gray-300 shadow-sm hover:shadow-md @error('return_date') border-red-500 @enderror">
                                @error('return_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <label class="flex items-center cursor-pointer group p-4 bg-white/70 rounded-xl hover:bg-white transition-colors duration-200">
                            <input type="checkbox" name="flexible_dates" value="1" id="flexible" {{ old('flexible_dates') ? 'checked' : '' }}>
                            <span class="ml-3 text-dark-gray group-hover:text-emerald-600 transition-colors duration-200 font-semibold">I'm flexible with my travel dates</span>
                        </label>
                    </div>

                    <!-- Passengers -->
                    <div class="form-section-item bg-gradient-to-r from-purple-50/50 to-pink-50/50 rounded-2xl p-8 border border-purple-100">
                        <div class="flex items-center mb-8">
                            <div class="w-12 h-12 bg-purple-500 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <i class="fas fa-users text-white text-lg"></i>
                            </div>
                            <div>
                                <h5 class="text-2xl font-bold text-dark-blue">Travel Party</h5>
                                <p class="text-gray-600">How many people will be traveling?</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-user text-purple-500 mr-2"></i>
                                    Adults
                                </label>
                                <div class="relative">
                                    <select name="adults" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all">
                                        <option value="1 adult" {{ old('adults') == '1 adult' ? 'selected' : '' }}>1 adult</option>
                                        <option value="2 adults" {{ old('adults') == '2 adults' ? 'selected' : '' }}>2 adults</option>
                                        <option value="3 adults" {{ old('adults') == '3 adults' ? 'selected' : '' }}>3 adults</option>
                                        <option value="4 adults" {{ old('adults') == '4 adults' ? 'selected' : '' }}>4 adults</option>
                                        <option value="5+ adults" {{ old('adults') == '5+ adults' ? 'selected' : '' }}>5+ adults</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-child text-purple-500 mr-2"></i>
                                    Children (2–11 yrs)
                                </label>
                                <div class="relative">
                                    <select name="children" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 appearance-none bg-white hover:border-gray-300 shadow-sm hover:shadow-md">
                                        <option value="0 children" {{ old('children') == '0 children' ? 'selected' : '' }}>0 children</option>
                                        <option value="1 child" {{ old('children') == '1 child' ? 'selected' : '' }}>1 child</option>
                                        <option value="2 children" {{ old('children') == '2 children' ? 'selected' : '' }}>2 children</option>
                                        <option value="3 children" {{ old('children') == '3 children' ? 'selected' : '' }}>3 children</option>
                                        <option value="4+ children" {{ old('children') == '4+ children' ? 'selected' : '' }}>4+ children</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-baby text-purple-500 mr-2"></i>
                                    Infants (&lt; 2 yrs)
                                </label>
                                <div class="relative">
                                    <select name="infants" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 appearance-none bg-white hover:border-gray-300 shadow-sm hover:shadow-md">
                                        <option value="0 infants" {{ old('infants') == '0 infants' ? 'selected' : '' }}>0 infants</option>
                                        <option value="1 infant" {{ old('infants') == '1 infant' ? 'selected' : '' }}>1 infant</option>
                                        <option value="2 infants" {{ old('infants') == '2 infants' ? 'selected' : '' }}>2 infants</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Accommodation -->
                    <div class="form-section-item bg-gradient-to-r from-pink-50/50 to-rose-50/50 rounded-2xl p-8 border border-pink-100">
                        <div class="flex items-center mb-8">
                            <div class="w-12 h-12 bg-pink-500 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <i class="fas fa-bed text-white text-lg"></i>
                            </div>
                            <div>
                                <h5 class="text-2xl font-bold text-dark-blue">Accommodation</h5>
                                <p class="text-gray-600">Tell us about your accommodation preferences</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-door-open text-pink-500 mr-2"></i>
                                    Number of Rooms
                                </label>
                                <div class="relative">
                                    <select name="rooms" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-300 appearance-none bg-white hover:border-gray-300 shadow-sm hover:shadow-md">
                                        <option value="1 room" {{ old('rooms') == '1 room' ? 'selected' : '' }}>1 room</option>
                                        <option value="2 rooms" {{ old('rooms') == '2 rooms' ? 'selected' : '' }}>2 rooms</option>
                                        <option value="3 rooms" {{ old('rooms') == '3 rooms' ? 'selected' : '' }}>3 rooms</option>
                                        <option value="4+ rooms" {{ old('rooms') == '4+ rooms' ? 'selected' : '' }}>4+ rooms</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-star text-pink-500 mr-2"></i>
                                    Hotel Category
                                </label>
                                <div class="relative">
                                    <select name="hotel_category" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-300 appearance-none bg-white hover:border-gray-300 shadow-sm hover:shadow-md">
                                        <option value="Budget (2-3 stars)" {{ old('hotel_category') == 'Budget (2-3 stars)' ? 'selected' : '' }}>Budget (2-3 stars)</option>
                                        <option value="Standard (3-4 stars)" {{ old('hotel_category') == 'Standard (3-4 stars)' ? 'selected' : '' }}>Standard (3-4 stars)</option>
                                        <option value="Luxury (4-5 stars)" {{ old('hotel_category') == 'Luxury (4-5 stars)' ? 'selected' : '' }}>Luxury (4-5 stars)</option>
                                        <option value="Ultra-Luxury (5+ stars)" {{ old('hotel_category') == 'Ultra-Luxury (5+ stars)' ? 'selected' : '' }}>Ultra-Luxury (5+ stars)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Budget -->
                    <div class="form-section-item bg-gradient-to-r from-green-50/50 to-teal-50/50 rounded-2xl p-8 border border-green-100">
                        <div class="flex items-center mb-8">
                            <div class="w-12 h-12 bg-green-500 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <i class="fas fa-dollar-sign text-white text-lg"></i>
                            </div>
                            <div>
                                <h5 class="text-2xl font-bold text-dark-blue">Budget Range</h5>
                                <p class="text-gray-600">What's your estimated budget per person?</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <label class="radio-card flex items-center cursor-pointer group p-6 bg-white rounded-2xl border-2 border-gray-200 hover:border-green-400 hover:shadow-lg transition-all duration-300">
                                <input type="radio" name="budget" value="<1499" {{ old('budget') == '<1499' ? 'checked' : '' }}>
                                <div class="ml-3">
                                    <span class="text-dark-gray group-hover:text-green-600 transition-colors duration-200 font-bold text-lg block">Less than $1,499</span>
                                    <span class="text-gray-500 text-sm">Budget-friendly options</span>
                                </div>
                            </label>
                            <label class="radio-card flex items-center cursor-pointer group p-6 bg-white rounded-2xl border-2 border-gray-200 hover:border-green-400 hover:shadow-lg transition-all duration-300">
                                <input type="radio" name="budget" value="1500-1999" {{ old('budget') == '1500-1999' ? 'checked' : '' }}>
                                <div class="ml-3">
                                    <span class="text-dark-gray group-hover:text-green-600 transition-colors duration-200 font-bold text-lg block">$1,500–$1,999</span>
                                    <span class="text-gray-500 text-sm">Comfortable travel</span>
                                </div>
                            </label>
                            <label class="radio-card flex items-center cursor-pointer group p-6 bg-white rounded-2xl border-2 border-gray-200 hover:border-green-400 hover:shadow-lg transition-all duration-300">
                                <input type="radio" name="budget" value="2000-2999" {{ old('budget') == '2000-2999' ? 'checked' : '' }}>
                                <div class="ml-3">
                                    <span class="text-dark-gray group-hover:text-green-600 transition-colors duration-200 font-bold text-lg block">$2,000–$2,999</span>
                                    <span class="text-gray-500 text-sm">Premium experience</span>
                                </div>
                            </label>
                            <label class="radio-card flex items-center cursor-pointer group p-6 bg-white rounded-2xl border-2 border-gray-200 hover:border-green-400 hover:shadow-lg transition-all duration-300">
                                <input type="radio" name="budget" value="3000+" {{ old('budget') == '3000+' ? 'checked' : '' }}>
                                <div class="ml-3">
                                    <span class="text-dark-gray group-hover:text-green-600 transition-colors duration-200 font-bold text-lg block">$3,000+</span>
                                    <span class="text-gray-500 text-sm">Luxury & ultra-luxury</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="form-section-item bg-gradient-to-r from-indigo-50/50 to-blue-50/50 rounded-2xl p-8 border border-indigo-100">
                        <div class="flex items-center mb-8">
                            <div class="w-12 h-12 bg-indigo-500 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <i class="fas fa-user text-white text-lg"></i>
                            </div>
                            <div>
                                <h5 class="text-2xl font-bold text-dark-blue">Your Information</h5>
                                <p class="text-gray-600">Help us get in touch with you</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-user text-indigo-500 mr-2"></i>
                                    Full Name*
                                </label>
                                <input type="text" name="full_name" required value="{{ old('full_name') }}" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 bg-white hover:border-gray-300 shadow-sm hover:shadow-md @error('full_name') border-red-500 @enderror" placeholder="Enter your full name">
                                @error('full_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-phone text-indigo-500 mr-2"></i>
                                    Phone Number*
                                </label>
                                <input type="tel" name="phone" required value="{{ old('phone') }}" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 bg-white hover:border-gray-300 shadow-sm hover:shadow-md @error('phone') border-red-500 @enderror" placeholder="+94 77 123 4567">
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-envelope text-indigo-500 mr-2"></i>
                                    Email Address*
                                </label>
                                <input type="email" name="email" required value="{{ old('email') }}" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 bg-white hover:border-gray-300 shadow-sm hover:shadow-md @error('email') border-red-500 @enderror" placeholder="your.email@example.com">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-envelope-open text-indigo-500 mr-2"></i>
                                    Confirm Email*
                                </label>
                                <input type="email" name="email_confirmation" required value="{{ old('email_confirmation') }}" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 bg-white hover:border-gray-300 shadow-sm hover:shadow-md @error('email_confirmation') border-red-500 @enderror" placeholder="Confirm your email">
                                @error('email_confirmation')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:col-span-2 input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-building text-indigo-500 mr-2"></i>
                                    Travel Agency (Optional)
                                </label>
                                <input type="text" name="travel_agency" value="{{ old('travel_agency') }}" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 bg-white hover:border-gray-300 shadow-sm hover:shadow-md" placeholder="Your travel agency name (if applicable)">
                            </div>
                            <div class="md:col-span-2 input-group">
                                <label class="block text-sm font-bold text-dark-gray mb-3 flex items-center">
                                    <i class="fas fa-comment text-indigo-500 mr-2"></i>
                                    Special Requests & Notes
                                </label>
                                <textarea name="special_requests" class="w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 resize-none bg-white hover:border-gray-300 shadow-sm hover:shadow-md" rows="5" placeholder="Tell us about any special requirements, interests, or preferences for your trip...">{{ old('special_requests') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Submit Section -->
                    <div class="text-center mt-16">
                        <div class="bg-gradient-to-r from-dark-blue/5 to-dark-orange/5 rounded-3xl p-12 border border-white/50">
                            <div class="mb-8">
                                <div class="w-20 h-20 bg-gradient-to-r from-dark-blue to-dark-orange rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                                    <img src="{{ asset('logo/planew.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                                </div>
                                <h4 class="text-2xl font-bold text-dark-blue mb-4">Ready to Create Your Dream Trip?</h4>
                                <p class="text-gray-600 max-w-2xl mx-auto">Our travel experts will review your preferences and create a personalized itinerary just for you</p>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" id="submit-btn" class="group relative px-16 py-5 bg-gradient-to-r from-dark-blue to-blue-700 text-white font-bold text-xl rounded-3xl hover:from-dark-orange hover:to-orange-600 transform hover:scale-105 transition-all duration-500 shadow-2xl hover:shadow-3xl overflow-hidden">
                                <span class="relative z-10 flex items-center justify-center">
                                    <i class="fas fa-rocket mr-4 group-hover:animate-pulse transition-all duration-300"></i>
                                    <span id="btn-text">Build My Custom Tour</span>
                                    <i class="fas fa-arrow-right ml-4 group-hover:translate-x-2 transition-transform duration-300"></i>
                                </span>
                            </button>

                            <!-- Additional Info -->
                            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                                <div class="bg-white/70 rounded-xl p-4 border border-gray-100">
                                    <i class="fas fa-shield-alt text-dark-blue text-lg mb-2"></i>
                                    <p class="text-sm text-gray-600">
                                        <strong>100% Secure</strong><br>
                                        Your information is protected
                                    </p>
                                </div>
                                <div class="bg-white/70 rounded-xl p-4 border border-gray-100">
                                    <i class="fas fa-clock text-dark-orange text-lg mb-2"></i>
                                    <p class="text-sm text-gray-600">
                                        <strong>Quick Response</strong><br>
                                        Proposal within 24 hours
                                    </p>
                                </div>
                                <div class="bg-white/70 rounded-xl p-4 border border-gray-100">
                                    <i class="fas fa-heart text-red-500 text-lg mb-2"></i>
                                    <p class="text-sm text-gray-600">
                                        <strong>No Obligation</strong><br>
                                        Free consultation & quote
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- Enhanced Features Section -->
            <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Feature 1 -->
                <div class="text-center p-8 bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/40 group hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-4">
                    <div class="w-20 h-20 bg-gradient-to-br from-dark-blue to-blue-700 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-500 shadow-xl">
                        <i class="fas fa-clock text-white text-2xl group-hover:animate-pulse"></i>
                    </div>
                    <h6 class="text-xl font-bold text-dark-gray mb-4 group-hover:text-dark-blue transition-colors">Lightning Fast Response</h6>
                    <p class="text-gray-600 leading-relaxed">Get your personalized tour proposal within 24 hours with detailed pricing and recommendations</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="text-center p-8 bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/40 group hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-4">
                    <div class="w-20 h-20 bg-gradient-to-br from-dark-orange to-orange-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-500 shadow-xl">
                        <i class="fas fa-heart text-white text-2xl group-hover:animate-pulse"></i>
                    </div>
                    <h6 class="text-xl font-bold text-dark-gray mb-4 group-hover:text-dark-orange transition-colors">Personalized Care</h6>
                    <p class="text-gray-600 leading-relaxed">Dedicated travel consultant assigned to your journey from planning to return</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="text-center p-8 bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/40 group hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-4">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-green-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-500 shadow-xl">
                        <i class="fas fa-gem text-white text-2xl group-hover:animate-pulse"></i>
                    </div>
                    <h6 class="text-xl font-bold text-dark-gray mb-4 group-hover:text-emerald-600 transition-colors">Premium Quality</h6>
                    <p class="text-gray-600 leading-relaxed">Handpicked accommodations, experiences, and local guides for unforgettable memories</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Simple JavaScript for form validation only (NO AJAX) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('#custom-tour-form-element');
            
            // Simple form validation on submit
            form.addEventListener('submit', function(e) {
                // Get required fields
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                
                // Check each required field
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('border-red-500');
                        isValid = false;
                    } else {
                        field.classList.remove('border-red-500');
                    }
                });

                // Email confirmation validation
                const email = form.querySelector('input[name="email"]').value;
                const emailConfirmation = form.querySelector('input[name="email_confirmation"]').value;
                
                if (email && emailConfirmation && email !== emailConfirmation) {
                    alert('Email addresses do not match. Please check and try again.');
                    e.preventDefault();
                    return false;
                }

                if (!isValid) {
                    alert('Please fill in all required fields.');
                    e.preventDefault();
                    return false;
                }
                
                // Form will submit normally to the server
                // No AJAX, just regular form submission
            });
            
            // Add visual feedback for inputs
            const inputs = form.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.classList.remove('border-red-500');
                });
            });
        });
    </script>
</x-app-layout>