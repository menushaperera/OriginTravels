<!-- resources/views/contact.blade.php -->
<x-app-layout>
@section('title', 'Contact - ORIGIN Travels')

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
    
    /* Custom animations */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
    }
    
    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 5px rgba(255, 107, 53, 0.3); }
        50% { box-shadow: 0 0 20px rgba(255, 107, 53, 0.6), 0 0 30px rgba(255, 107, 53, 0.4); }
    }
    
    @keyframes gradient-shift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    .float-animation {
        animation: float 6s ease-in-out infinite;
    }
    
    .pulse-glow {
        animation: pulse-glow 2s ease-in-out infinite;
    }
    
    .gradient-shift {
        background: linear-gradient(45deg, #FF6B35, #1E3A8A, #FF6B35);
        background-size: 300% 300%;
        animation: gradient-shift 3s ease infinite;
    }
    
    .form-input:focus {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(255, 107, 53, 0.15);
    }
    
    .contact-card {
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.95);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .contact-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }
    
    .input-container {
        position: relative;
        overflow: hidden;
    }
    
    .input-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, #FF6B35, transparent);
        transition: left 0.5s;
    }
    
    .input-container.focused::before {
        left: 100%;
    }
    
    /* Fix for email card */
    .email-card {
        backdrop-filter: blur(20px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .email-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
    }
    
    .email-item {
        transition: all 0.3s ease;
    }
    
    .email-item:hover {
        transform: translateX(5px);
    }
</style>

    <section class="relative text-white py-20 overflow-hidden">
        <!-- Background Image -->
        <img src="{{ asset('images/background/rannabeach.jpg') }}" 
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
                    Contact
                    <span class="bg-gradient-to-r from-dark-orange via-orange-400 to-dark-orange bg-clip-text text-transparent animate-gradient">
                        Us
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto mb-8 opacity-90">
                    Get in touch with Sri Lanka's premier travel experts. We're here to make your dream vacation a reality.
                </p>
            </div>
        </div>
    </section>

    <div class="min-h-screen bg-gradient-to-br from-light-gray via-white to-blue-50 relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-dark-orange/10 rounded-full blur-3xl float-animation"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-dark-blue/10 rounded-full blur-3xl float-animation" style="animation-delay: 3s;"></div>
            <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-dark-orange/5 rounded-full blur-2xl float-animation" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-1/3 right-1/3 w-48 h-48 bg-dark-blue/5 rounded-full blur-2xl float-animation" style="animation-delay: 4s;"></div>
            
            <!-- Floating particles -->
            <div class="absolute top-20 left-20 w-2 h-2 bg-dark-orange/30 rounded-full animate-bounce"></div>
            <div class="absolute top-40 right-32 w-1 h-1 bg-dark-blue/40 rounded-full animate-bounce delay-300"></div>
            <div class="absolute bottom-32 left-1/3 w-1.5 h-1.5 bg-dark-orange/20 rounded-full animate-bounce delay-700"></div>
            <div class="absolute bottom-40 right-20 w-1 h-1 bg-dark-blue/30 rounded-full animate-bounce delay-1000"></div>
        </div>

        <div class="container mx-auto px-4 py-16 relative z-10">
            <div class="max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-16 items-start">
                    
                    <!-- Enhanced Left Column - Contact Form -->
                    <div class="contact-card rounded-3xl shadow-2xl p-10 lg:p-12 border border-white/30 relative overflow-hidden">
                        <!-- Decorative top border -->
                        <div class="absolute top-0 left-0 w-full h-1 gradient-shift"></div>
                        
                        <div class="mb-10">
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 bg-gradient-to-r from-dark-orange to-orange-400 rounded-2xl flex items-center justify-center mr-4">
                                    <i class="fas fa-paper-plane text-white text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-3xl lg:text-4xl font-bold text-dark-blue leading-tight">Get In Touch</h3>
                                    <p class="text-dark-orange font-semibold">Send us a message</p>
                                </div>
                            </div>
                        </div>

                        <!-- ✅ SUCCESS AND ERROR MESSAGES -->
                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
                                <i class="fas fa-check-circle mr-3"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 flex items-center">
                                <i class="fas fa-exclamation-circle mr-3"></i>
                                <span>{{ session('error') }}</span>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                                <p class="font-bold mb-2">Please fix the following errors:</p>
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                       <form action="{{ route('contact.submit') }}" method="POST" class="space-y-8" id="contact-form">
                            @csrf                           
                            <!-- Enhanced Name Field -->
                            <div class="input-container relative">
                                <label class="block text-sm font-bold text-dark-gray mb-2 flex items-center">
                                    <i class="fas fa-user text-dark-orange mr-2"></i>
                                    Full Name*
                                </label>
                                <input type="text" 
                                       name="name" 
                                       placeholder="Enter your full name" 
                                       value="{{ old('name') }}"
                                       required
                                       class="form-input w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-dark-orange focus:border-dark-orange transition-all duration-300 text-dark-gray placeholder-gray-400 bg-white hover:border-gray-300 hover:shadow-md @error('name') border-red-500 @enderror">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Enhanced Phone Field -->
                            <div class="input-container relative">
                                <label class="block text-sm font-bold text-dark-gray mb-2 flex items-center">
                                    <i class="fas fa-phone text-dark-orange mr-2"></i>
                                    Phone Number
                                </label>
                                <input type="tel" 
                                       name="phone" 
                                       placeholder="+94 77 123 4567" 
                                       value="{{ old('phone') }}"
                                       class="form-input w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-dark-orange focus:border-dark-orange transition-all duration-300 text-dark-gray placeholder-gray-400 bg-white hover:border-gray-300 hover:shadow-md @error('phone') border-red-500 @enderror">
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Enhanced Email Field -->
                            <div class="input-container relative">
                                <label class="block text-sm font-bold text-dark-gray mb-2 flex items-center">
                                    <i class="fas fa-envelope text-dark-orange mr-2"></i>
                                    Email Address*
                                </label>
                                <input type="email" 
                                       name="email" 
                                       placeholder="your.email@example.com" 
                                       value="{{ old('email') }}"
                                       required
                                       class="form-input w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-dark-orange focus:border-dark-orange transition-all duration-300 text-dark-gray placeholder-gray-400 bg-white hover:border-gray-300 hover:shadow-md @error('email') border-red-500 @enderror">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Enhanced Confirm Email Field -->
                            <div class="input-container relative">
                                <label class="block text-sm font-bold text-dark-gray mb-2 flex items-center">
                                    <i class="fas fa-envelope-open text-dark-orange mr-2"></i>
                                    Confirm Email Address*
                                </label>
                                <input type="email" 
                                       name="email_confirmation" 
                                       placeholder="Confirm your email address" 
                                       value="{{ old('email_confirmation') }}"
                                       required
                                       class="form-input w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-dark-orange focus:border-dark-orange transition-all duration-300 text-dark-gray placeholder-gray-400 bg-white hover:border-gray-300 hover:shadow-md @error('email_confirmation') border-red-500 @enderror">
                                @error('email_confirmation')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Enhanced Inquiry Type Dropdown -->
                            <div class="input-container relative">
                                <label class="block text-sm font-bold text-dark-gray mb-2 flex items-center">
                                    <i class="fas fa-list text-dark-orange mr-2"></i>
                                    Type of Inquiry
                                </label>
                                <div class="relative">
                                    <select name="inquiry_type" 
                                            class="form-input w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-dark-orange focus:border-dark-orange transition-all duration-300 text-dark-gray bg-white hover:border-gray-300 hover:shadow-md appearance-none cursor-pointer @error('inquiry_type') border-red-500 @enderror">
                                        <option value="">Select inquiry type...</option>
                                        <option value="new_booking" {{ old('inquiry_type') == 'new_booking' ? 'selected' : '' }}>New Booking</option>
                                        <option value="existing_booking" {{ old('inquiry_type') == 'existing_booking' ? 'selected' : '' }}>Existing Booking</option>
                                        <option value="visa_inquiry" {{ old('inquiry_type') == 'visa_inquiry' ? 'selected' : '' }}>Visa Inquiry</option>
                                        <option value="travel_insurance" {{ old('inquiry_type') == 'travel_insurance' ? 'selected' : '' }}>Travel Insurance</option>
                                        <option value="flight_booking" {{ old('inquiry_type') == 'flight_booking' ? 'selected' : '' }}>Flight Booking</option>
                                        <option value="hotel_booking" {{ old('inquiry_type') == 'hotel_booking' ? 'selected' : '' }}>Hotel Booking</option>
                                        <option value="tour_packages" {{ old('inquiry_type') == 'tour_packages' ? 'selected' : '' }}>Tour Packages</option>
                                        <option value="general" {{ old('inquiry_type') == 'general' ? 'selected' : '' }}>General Question</option>
                                        <option value="complaint" {{ old('inquiry_type') == 'complaint' ? 'selected' : '' }}>Complaint</option>
                                    </select>
                                </div>
                                @error('inquiry_type')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Enhanced Message Field -->
                            <div class="input-container relative">
                                <label class="block text-sm font-bold text-dark-gray mb-2 flex items-center">
                                    <i class="fas fa-comment text-dark-orange mr-2"></i>
                                    Your Message
                                </label>
                                <textarea name="message" 
                                          rows="6" 
                                          placeholder="Tell us about your travel plans or questions..."
                                          class="form-input w-full px-6 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-dark-orange focus:border-dark-orange transition-all duration-300 text-dark-gray placeholder-gray-400 resize-vertical bg-white hover:border-gray-300 hover:shadow-md @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Enhanced Submit Button -->
                            <div class="pt-6">
                                <button type="submit" 
                                        id="submit-btn"
                                        class="w-full bg-gradient-to-r from-dark-orange to-orange-600 hover:from-orange-600 hover:to-dark-orange text-white font-bold py-4 px-12 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-orange-200 uppercase tracking-wide text-lg relative overflow-hidden group">
                                    <span class="relative z-10 flex items-center justify-center">
                                        <i class="fas fa-paper-plane mr-3 group-hover:animate-pulse"></i>
                                        <span id="btn-text">Send Message</span>
                                        <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                                    </span>
                                    <!-- Button shine effect -->
                                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 translate-x-full group-hover:-translate-x-full transition-transform duration-1000"></div>
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Enhanced Right Column - Contact Information -->
                    <div class="space-y-8">
                        
                        <!-- Enhanced Sri Lanka Office -->
                        <div class="contact-card rounded-3xl shadow-2xl p-10 lg:p-12 border border-white/30 relative overflow-hidden">
                            <!-- Decorative top border -->
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-dark-blue to-blue-500"></div>
                            
                            <div class="flex items-center mb-8">
                                <div class="w-20 h-20 bg-gradient-to-r from-dark-blue to-blue-600 rounded-2xl flex items-center justify-center mr-6 shadow-lg">
                                    <i class="fas fa-building text-white text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-3xl lg:text-4xl font-bold text-dark-blue">Sri Lanka Office</h3>
                                    <p class="text-lg text-dark-orange font-semibold flex items-center mt-1">
                                        <span class="text-2xl mr-2">🇱🇰</span>
                                        Colombo Headquarters
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Enhanced Phone Numbers -->
                            <div class="mb-8">
                                <h4 class="text-xl font-bold text-dark-orange mb-4 flex items-center">
                                    <div class="w-10 h-10 bg-dark-orange/10 rounded-xl flex items-center justify-center mr-3">
                                        <i class="fas fa-phone text-dark-orange"></i>
                                    </div>
                                    Phone Numbers
                                </h4>
                                <div class="space-y-3 ml-13">
                                    <div class="flex items-center group">
                                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-200 transition-colors">
                                            <i class="fas fa-phone text-green-600 text-sm"></i>
                                        </div>
                                        <a href="tel:+94312234567" class="text-dark-gray font-semibold text-lg hover:text-dark-orange transition-colors duration-200 hover:underline">
                                            +94 31 223 4567
                                        </a>
                                        <span class="ml-2 text-sm text-gray-500">(Main Line)</span>
                                    </div>
                                    <div class="flex items-center group">
                                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors">
                                            <i class="fas fa-mobile text-blue-600 text-sm"></i>
                                        </div>
                                        <a href="tel:+94771234567" class="text-dark-gray font-semibold text-lg hover:text-dark-orange transition-colors duration-200 hover:underline">
                                            +94 77 123 4567
                                        </a>
                                        <span class="ml-2 text-sm text-gray-500">(Mobile)</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Enhanced Opening Hours -->
                            <div class="mb-8">
                                <h4 class="text-xl font-bold text-dark-orange mb-4 flex items-center">
                                    <div class="w-10 h-10 bg-dark-orange/10 rounded-xl flex items-center justify-center mr-3">
                                        <i class="fas fa-clock text-dark-orange"></i>
                                    </div>
                                    Business Hours
                                </h4>
                                <div class="ml-13 space-y-3">
                                    <div class="bg-green-50 border border-green-200 rounded-xl p-4">
                                        <div class="flex items-center justify-between">
                                            <span class="font-bold text-dark-gray">Monday - Saturday</span>
                                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">OPEN</span>
                                        </div>
                                        <p class="text-green-700 font-medium mt-1">09:00 AM - 06:00 PM (IST)</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Enhanced Address -->
                            <div>
                                <h4 class="text-xl font-bold text-dark-orange mb-4 flex items-center">
                                    <div class="w-10 h-10 bg-dark-orange/10 rounded-xl flex items-center justify-center mr-3">
                                        <i class="fas fa-map-marker-alt text-dark-orange"></i>
                                    </div>
                                    Visit Our Office
                                </h4>
                                <div class="ml-13">
                                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                                        <div class="space-y-2">
                                            <p class="font-semibold text-dark-gray">ORIGIN Travels (Pvt) Ltd</p>
                                            <p class="text-dark-gray">No. 123, Galle Road</p>
                                            <p class="text-dark-gray">Colombo 03, Western Province</p>
                                            <p class="text-dark-gray font-medium">Sri Lanka 00300</p>
                                        </div>
                                        <button class="mt-3 inline-flex items-center text-dark-blue hover:text-dark-orange font-semibold transition-colors duration-200">
                                            <i class="fas fa-directions mr-2"></i>
                                            Get Directions
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FIXED Enhanced Email Contact -->
                        <div class="email-card bg-gradient-to-r from-blue-900 to-blue-700 rounded-3xl shadow-2xl p-10 text-white relative overflow-hidden">
                            <!-- Background decorative elements -->
                            <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-5 rounded-full blur-2xl"></div>
                            <div class="absolute bottom-0 left-0 w-24 h-24 bg-orange-600 opacity-20 rounded-full blur-xl"></div>
                            
                            <div class="relative z-10">
                                <div class="flex items-center mb-6">
                                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center mr-4">
                                        <i class="fas fa-envelope text-white text-2xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-bold">Email Support</h3>
                                        <p class="text-blue-100">Multiple ways to reach us</p>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <!-- General Inquiries Email -->
                                    <div class="email-item bg-white bg-opacity-10 rounded-xl p-4 hover:bg-opacity-20 transition-all duration-200">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-orange-500 bg-opacity-30 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                                <i class="fas fa-info-circle text-orange-300 text-lg"></i>
                                            </div>
                                            <div class="flex-grow">
                                                <a href="mailto:info@origintravels.com" class="text-white hover:text-orange-300 transition-colors duration-200 text-lg font-semibold block">
                                                    info@origintravels.com
                                                </a>
                                                <p class="text-blue-200 text-sm mt-1">General inquiries & information</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Bookings Email -->
                                    <div class="email-item bg-white bg-opacity-10 rounded-xl p-4 hover:bg-opacity-20 transition-all duration-200">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-green-500 bg-opacity-30 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                                <i class="fas fa-calendar-check text-green-300 text-lg"></i>
                                            </div>
                                            <div class="flex-grow">
                                                <a href="mailto:bookings@origintravels.com" class="text-white hover:text-orange-300 transition-colors duration-200 text-lg font-semibold block">
                                                    bookings@origintravels.com
                                                </a>
                                                <p class="text-blue-200 text-sm mt-1">New bookings & reservations</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Support Email -->
                                    <div class="email-item bg-white bg-opacity-10 rounded-xl p-4 hover:bg-opacity-20 transition-all duration-200">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-purple-500 bg-opacity-30 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                                <i class="fas fa-headset text-purple-300 text-lg"></i>
                                            </div>
                                            <div class="flex-grow">
                                                <a href="mailto:support@origintravels.com" class="text-white hover:text-orange-300 transition-colors duration-200 text-lg font-semibold block">
                                                    support@origintravels.com
                                                </a>
                                                <p class="text-blue-200 text-sm mt-1">Customer support & assistance</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Features Section -->
                <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center p-8 bg-white/60 backdrop-blur-sm rounded-2xl shadow-lg border border-white/30 hover:shadow-xl transition-all duration-300 group">
                        <div class="w-16 h-16 bg-gradient-to-r from-dark-blue/10 to-dark-blue/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:from-dark-blue/20 group-hover:to-dark-blue/30 transition-all duration-300">
                            <i class="fas fa-clock text-dark-blue text-2xl"></i>
                        </div>
                        <h6 class="text-xl font-bold text-dark-gray mb-3">Quick Response</h6>
                        <p class="text-gray-600">We respond to all inquiries within 2 hours during business days</p>
                    </div>
                    
                    <div class="text-center p-8 bg-white/60 backdrop-blur-sm rounded-2xl shadow-lg border border-white/30 hover:shadow-xl transition-all duration-300 group">
                        <div class="w-16 h-16 bg-gradient-to-r from-dark-orange/10 to-dark-orange/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:from-dark-orange/20 group-hover:to-dark-orange/30 transition-all duration-300">
                            <i class="fas fa-user-tie text-dark-orange text-2xl"></i>
                        </div>
                        <h6 class="text-xl font-bold text-dark-gray mb-3">Expert Consultation</h6>
                        <p class="text-gray-600">Free consultation with our experienced travel specialists</p>
                    </div>
                    
                    <div class="text-center p-8 bg-white/60 backdrop-blur-sm rounded-2xl shadow-lg border border-white/30 hover:shadow-xl transition-all duration-300 group">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500/10 to-green-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:from-green-500/20 group-hover:to-green-500/30 transition-all duration-300">
                            <i class="fas fa-shield-alt text-green-600 text-2xl"></i>
                        </div>
                        <h6 class="text-xl font-bold text-dark-gray mb-3">Secure & Trusted</h6>
                        <p class="text-gray-600">Licensed travel agency with full customer protection</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced JavaScript (Fixed for actual form submission) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contact-form');
            const inputs = form.querySelectorAll('input, textarea, select');
            const submitBtn = document.getElementById('submit-btn');
            const btnText = document.getElementById('btn-text');
            
            // Enhanced form interaction effects
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.closest('.input-container').classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    this.closest('.input-container').classList.remove('focused');
                });

                // Real-time validation
                input.addEventListener('input', function() {
                    validateField(this);
                });
            });

            // Real-time validation function
            function validateField(field) {
                const value = field.value.trim();
                const fieldType = field.type;
                const fieldName = field.name;

                // Remove existing validation classes
                field.classList.remove('border-green-400', 'border-red-400');

                if (fieldName === 'email' || fieldName === 'email_confirmation') {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (value && emailRegex.test(value)) {
                        field.classList.add('border-green-400');
                        showValidationIcon(field, 'success');
                    } else if (value) {
                        field.classList.add('border-red-400');
                        showValidationIcon(field, 'error');
                    } else {
                        removeValidationIcon(field);
                    }
                } else if (fieldName === 'name') {
                    if (value.length >= 2) {
                        field.classList.add('border-green-400');
                        showValidationIcon(field, 'success');
                    } else if (value) {
                        field.classList.add('border-red-400');
                        showValidationIcon(field, 'error');
                    } else {
                        removeValidationIcon(field);
                    }
                }

                // Email confirmation matching
                if (fieldName === 'email_confirmation') {
                    const emailField = form.querySelector('input[name="email"]');
                    if (value && value === emailField.value) {
                        field.classList.remove('border-red-400');
                        field.classList.add('border-green-400');
                        showValidationIcon(field, 'success');
                    } else if (value) {
                        field.classList.remove('border-green-400');
                        field.classList.add('border-red-400');
                        showValidationIcon(field, 'error');
                    }
                }
            }

            function showValidationIcon(field, type) {
                removeValidationIcon(field);
                
                const icon = document.createElement('div');
                icon.className = 'validation-icon absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none';
                
                if (type === 'success') {
                    icon.innerHTML = '<i class="fas fa-check-circle text-green-500"></i>';
                } else {
                    icon.innerHTML = '<i class="fas fa-exclamation-circle text-red-500"></i>';
                }
                
                field.parentNode.appendChild(icon);
            }

            function removeValidationIcon(field) {
                const existingIcon = field.parentNode.querySelector('.validation-icon');
                if (existingIcon) {
                    existingIcon.remove();
                }
            }

            // Enhanced form submission (removed e.preventDefault for actual submission)
            form.addEventListener('submit', function(e) {
                // Validate all required fields
                let isValid = true;
                const requiredFields = form.querySelectorAll('[required]');
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('border-red-400');
                    }
                });

                // Check email confirmation
                const email = form.querySelector('input[name="email"]').value;
                const emailConfirm = form.querySelector('input[name="email_confirmation"]').value;
                
                if (email !== emailConfirm) {
                    isValid = false;
                    form.querySelector('input[name="email_confirmation"]').classList.add('border-red-400');
                    alert('Email addresses do not match!');
                    e.preventDefault();
                    return;
                }

                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields.');
                    return;
                }
                
                // Show loading state
                submitBtn.disabled = true;
                btnText.textContent = 'Sending...';
                submitBtn.classList.add('opacity-75');
                
                // Add spinner to button
                const spinner = document.createElement('i');
                spinner.className = 'fas fa-spinner fa-spin mr-3';
                btnText.parentNode.insertBefore(spinner, btnText);
            });

            // Phone number formatting
            const phoneInput = form.querySelector('input[name="phone"]');
            if (phoneInput) {
                phoneInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.startsWith('94')) {
                        value = '+' + value;
                    } else if (value.startsWith('0')) {
                        value = '+94' + value.slice(1);
                    } else if (value && !value.startsWith('+')) {
                        value = '+94' + value;
                    }
                    e.target.value = value;
                });
            }

            // Add smooth scroll for better UX
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

            // Add loading animation to contact cards
            const contactCards = document.querySelectorAll('.contact-card, .email-card');
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            contactCards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.6s ease-out';
                observer.observe(card);
            });

            // Email card hover effects
            const emailItems = document.querySelectorAll('.email-item');
            emailItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(5px)';
                });
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });
        });
    </script>
</x-app-layout>