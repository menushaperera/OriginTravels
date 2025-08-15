@section('title', 'Privacy Policy - ORIGIN Travels')

<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'dark-orange': '#FF6B35',
                    'dark-blue': '#1E3A8A',
                    'light-gray': '#F3F4F6',
                    'dark-gray': '#374151',
                },
                animation: {
                    'fade-in': 'fadeIn 1s ease-out',
                    'slide-up': 'slideUp 0.8s ease-out',
                },
                keyframes: {
                    fadeIn: {
                        '0%': { opacity: '0' },
                        '100%': { opacity: '1' },
                    },
                    slideUp: {
                        '0%': { transform: 'translateY(20px)', opacity: '0' },
                        '100%': { transform: 'translateY(0)', opacity: '1' },
                    }
                }
            }
        }
    }
</script>

<x-app-layout>
<!-- Hero Section with Parallax Effect -->
<section class="relative h-[60vh] min-h-[500px] overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1540339832862-474599807836?q=80&w=2000" 
             alt="Luxury Travel Experience" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-/60 to-black/60"></div>
    </div>
   <!-- Black Transparent Overlay -->
    <div class="absolute inset-0 bg-black/30"></div>

    <!-- Optional floating blur circles for decoration -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-dark-orange/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-white/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
    </div>
    
    <!-- Content -->
    <div class="relative z-10 h-full flex items-center justify-center text-center px-4">
        <div class="max-w-4xl mx-auto animate-fade-in">
            <h1 class="text-white text-5xl md:text-7xl font-bold mb-6 animate-fade-in">
                Privacy 
                <span class="bg-gradient-to-r from-dark-orange via-orange-400 to-dark-orange bg-clip-text text-transparent animate-gradient">
                    Policy
                </span>
            </h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                Your trust is our priority. Learn how we protect and manage your personal information.
            </p>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-gradient-to-b from-white to-light-gray">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Introduction Card -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 mb-12 border border-gray-100 animate-slide-up">
            <div class="flex items-start mb-6">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 bg-gradient-to-br from-dark-orange to-orange-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-6">
                    <h2 class="text-3xl font-bold text-dark-gray mb-4">Privacy Policy</h2>
                    <div class="prose prose-lg text-gray-600 leading-relaxed">
                        <p class="mb-4">
                            Origin Travels allows you to be in full control of your travel arrangements abroad. We want you to also be in control of the information you provide to us. Our privacy policy will detail how we collect, use, and protect the personal information (name, address, telephone numbers, credit card numbers, etc) you give to us through our website.
                        </p>
                        <p class="mb-4">
                            Please review our privacy policy carefully and remember that Origin Travels will never sell or rent your personal information to third parties.
                        </p>
                        <div class="bg-blue-50 border-l-4 border-dark-blue p-4 rounded-r-lg">
                            <p class="text-dark-blue font-medium">
                                <svg class="inline w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Please review our privacy policy carefully and remember that Origin Travels will never sell or rent your personal information to third parties.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Information Collection Section -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 mb-12 border border-gray-100 animate-slide-up" style="animation-delay: 0.1s;">
            <div class="flex items-center mb-8">
                <div class="w-14 h-14 bg-gradient-to-br from-dark-blue to-blue-700 rounded-xl flex items-center justify-center mr-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-dark-gray">Types of Personal Information We Collect From You</h2>
            </div>
            
            <div class="prose prose-lg text-gray-600 max-w-none">
                <p class="mb-6">
                    In order to complete a purchase on our website, we will need your legal name, billing and mailing address, contact telephone numbers, email address, credit card number and expiration date. If there are other people in your party for whom you are making payment, we will require their legal names as well. If you are making a reservation for traveler(s) other than yourself, please ensure that they agree to you providing us with their personal information.
                </p>
                
                <div class="bg-light-gray rounded-2xl p-6 mb-6">
                    <p class="mb-4">
                        Origin Travels website uses cookies, tracking pixels and related technologies. Cookies are small data files that are served by our platform and stored on your device. Our site uses cookies dropped by third parties or us for a variety of purposes including to operate and personalize the website. Also, cookies may be used to track how you use the site to target ads to you on other websites. You may also opt out of receiving targeted advertising by following links below:
                    </p>
                    <div class="flex flex-wrap gap-3 mt-4">
                        <a href="http://www.aboutads.info" target="_blank" class="inline-flex items-center px-4 py-2 bg-dark-blue text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            www.aboutads.info
                        </a>
                        <span class="text-gray-500 self-center">or</span>
                        <a href="http://www.networkadvertising.org/choices" target="_blank" class="inline-flex items-center px-4 py-2 bg-dark-blue text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002 2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            www.networkadvertising.org/choices
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- How We Use Information Section -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 mb-12 border border-gray-100 animate-slide-up" style="animation-delay: 0.2s;">
            <div class="flex items-center mb-8">
                <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mr-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-dark-gray">How We Use The Personal Information We Collect From You</h2>
            </div>
            
            <div class="prose prose-lg text-gray-600 max-w-none">
                <p>
                    When you complete a purchase for travel or travel services through OriginTravels.com, we provide your personal information to the hotel, land operator, or other involved third party. We only provide the portion of your personal information that is required for the successful fulfillment of your travel arrangements. For example, we book most of our airline tickets through Sabre Global Distribution System, a leading processor of travel booking worldwide. Accordingly, we will provide your personal information to them in order to complete the air portion of your travel arrangements. Another example is if you book the Sheraton Hotel in Beijing, we will provide them your personal information in order to secure the room accommodations.
                </p>
            </div>
        </div>

        <!-- Email Communications Section -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 mb-12 border border-gray-100 animate-slide-up" style="animation-delay: 0.3s;">
            <div class="flex items-center mb-8">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mr-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-dark-gray">Promotional Emails and Opting Out</h2>
            </div>
            
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6">
                <p class="text-gray-700 mb-4">
                    From time to time, OriginTravels.com will send you special offers and promotions to the email address you provided to us. If you should wish to unsubscribe, simply click the "unsubscribe" link in the email.
                </p>
                <button class="px-6 py-3 bg-gradient-to-r from-dark-orange to-orange-600 text-white font-semibold rounded-xl hover:from-orange-600 hover:to-dark-orange transition-all duration-300 shadow-lg">
                    Manage Email Preferences
                </button>
            </div>
        </div>

        <!-- Security Section -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 mb-12 border border-gray-100 animate-slide-up" style="animation-delay: 0.4s;">
            <div class="flex items-center mb-8">
                <div class="w-14 h-14 bg-gradient-to-br from-dark-orange to-orange-600 rounded-xl flex items-center justify-center mr-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-dark-gray">Safeguards To Protect Your Personal Information</h2>
            </div>
            
            <div class="bg-gradient-to-r from-orange-50 to-red-50 rounded-2xl p-6 mb-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-green-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-700">
                            All personal information you provide to OriginTravels.com is transmitted using SSL (Secure Socket Layer) encryption, a proven system that lets your browser encrypt/scramble data before you send it to us. Our 128bit encryption is provided by Comodo (<a href="http://www.instantssl.com" target="_blank" class="text-dark-orange hover:underline">www.instantssl.com</a>).
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="grid md:grid-cols-3 gap-4">
                <div class="bg-light-gray rounded-xl p-4 text-center">
                    <svg class="w-8 h-8 text-dark-blue mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <h4 class="font-semibold text-dark-gray">SSL Encryption</h4>
                    <p class="text-sm text-gray-600 mt-1">128-bit secure</p>
                </div>
                <div class="bg-light-gray rounded-xl p-4 text-center">
                    <svg class="w-8 h-8 text-dark-blue mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <h4 class="font-semibold text-dark-gray">Data Protection</h4>
                    <p class="text-sm text-gray-600 mt-1">Always secure</p>
                </div>
                <div class="bg-light-gray rounded-xl p-4 text-center">
                    <svg class="w-8 h-8 text-dark-blue mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                    </svg>
                    <h4 class="font-semibold text-dark-gray">Private & Secure</h4>
                    <p class="text-sm text-gray-600 mt-1">Never shared</p>
                </div>
            </div>
        </div>

        <!-- Our Promise Section -->
        <div class="bg-gradient-to-br from-dark-blue to-blue-800 rounded-3xl shadow-2xl p-8 md:p-12 text-white animate-slide-up" style="animation-delay: 0.5s;">
            <div class="flex items-center mb-8">
                <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mr-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold">What OriginTravels.com Will Never Do</h2>
            </div>
            
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                <p class="text-lg leading-relaxed">
                    OriginTravels.com will never sell your personal information to third parties. We will never, at any time, ask for your credit card information, login name or password, in an unsolicited email or via telephone.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-6 mt-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-dark-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold mb-1">No Selling</h4>
                    <p class="text-sm text-blue-100">Your data is never sold</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-dark-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold mb-1">No Spam</h4>
                    <p class="text-sm text-blue-100">No unsolicited emails</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-dark-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold mb-1">Always Secure</h4>
                    <p class="text-sm text-blue-100">Your data is protected</p>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="mt-12 text-center animate-slide-up" style="animation-delay: 0.6s;">
            <h3 class="text-2xl font-bold text-dark-gray mb-4">Have Questions About Our Privacy Policy?</h3>
            <p class="text-gray-600 mb-8">We're here to help. Contact our privacy team for any concerns or questions.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact-us') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-dark-orange to-orange-600 text-white font-semibold rounded-xl hover:from-orange-600 hover:to-dark-orange transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Contact Us
                </a>
                <a href="tel:+1234567890" class="inline-flex items-center justify-center px-8 py-4 bg-white border-2 border-dark-blue text-dark-blue font-semibold rounded-xl hover:bg-dark-blue hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    Call Us
                </a>
            </div>
        </div>

        <!-- Last Updated -->
        <div class="mt-16 text-center text-sm text-gray-500">
            <p>Last updated: {{ date('F d, Y') }}</p>
        </div>
    </div>
</section>

<!-- Back to Top Button -->
<button id="back-to-top" class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-r from-dark-orange to-orange-600 text-white rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 opacity-0 invisible flex items-center justify-center">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
    </svg>
</button>

<script>
    // Back to top button functionality
    const backToTopButton = document.getElementById('back-to-top');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopButton.classList.remove('opacity-0', 'invisible');
            backToTopButton.classList.add('opacity-100', 'visible');
        } else {
            backToTopButton.classList.add('opacity-0', 'invisible');
            backToTopButton.classList.remove('opacity-100', 'visible');
        }
    });
    
    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Add parallax effect to hero section
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallax = document.querySelector('.parallax-bg');
        if (parallax) {
            parallax.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });

    // Animate elements on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-slide-up');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all cards
    document.querySelectorAll('.animate-slide-up').forEach(el => {
        observer.observe(el);
    });
</script>

<style>
    /* Custom animations */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    
    /* Smooth scroll for the entire page */
    html {
        scroll-behavior: smooth;
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f3f4f6;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #FF6B35;
        border-radius: 5px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: #e55a2b;
    }
    
    /* Hover effects for cards */
    .bg-white:hover {
        transform: translateY(-2px);
        transition: transform 0.3s ease;
    }
    
    /* Link hover underline animation */
    a {
        position: relative;
    }
    
    a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -2px;
        left: 0;
        background-color: #FF6B35;
        transition: width 0.3s ease;
    }
    
    a:hover::after {
        width: 100%;
    }
</style>

</x-app-layout>