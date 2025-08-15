<x-app-layout>
@section('title', 'Payment Successful - ORIGIN Travels')

<div class="min-h-screen bg-gradient-to-br from-[#F3F4F6] via-white to-[#F3F4F6]">
    <!-- Confetti Background Effect -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-green-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-20 right-10 w-60 h-60 bg-[#FF6B35]/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute bottom-10 left-1/2 w-80 h-80 bg-[#1E3A8A]/10 rounded-full blur-3xl animate-pulse delay-2000"></div>
    </div>

    <div class="relative max-w-4xl mx-auto py-12 px-4">
        <!-- Success Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <!-- Header Gradient -->
            <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-8 text-white text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full mb-4 animate-bounce">
                    <i class="fas fa-check text-4xl"></i>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold mb-2">Payment Successful!</h1>
                <p class="text-green-100 text-lg">Your booking has been confirmed</p>
            </div>

            <!-- Content -->
            <div class="p-8 md:p-10">
                <!-- Customer Greeting -->
                <div class="text-center mb-8">
                    <p class="text-[#374151] text-lg">
                        Thank you, <span class="font-bold text-[#1E3A8A]">{{ $booking->customer_name }}</span>!
                    </p>
                    <p class="text-gray-600 mt-2">
                        Your adventure awaits with our amazing package
                    </p>
                </div>

                <!-- Booking Details Card -->
                <div class="bg-gradient-to-br from-[#F3F4F6] to-white rounded-2xl p-6 mb-8 border border-gray-200">
                    <div class="flex items-start gap-4">
                        @if($booking->package->image_url)
                            <img src="{{ $booking->package->image_url }}" 
                                 alt="{{ $booking->package->title }}" 
                                 class="w-24 h-24 md:w-32 md:h-32 rounded-xl object-cover shadow-lg">
                        @else
                            <div class="w-24 h-24 md:w-32 md:h-32 bg-gradient-to-br from-[#1E3A8A] to-[#FF6B35] rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-map-marked-alt text-white text-3xl"></i>
                            </div>
                        @endif
                        
                        <div class="flex-1">
                            <h2 class="text-xl md:text-2xl font-bold text-[#374151] mb-2">
                                {{ $booking->package->title }}
                            </h2>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-map-marker-alt text-[#FF6B35] mr-3 w-4"></i>
                                    <span>{{ $booking->package->location ?? $booking->package->country }}</span>
                                </div>
                                @if($booking->departure_date)
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-calendar text-[#1E3A8A] mr-3 w-4"></i>
                                        <span>Departure: {{ $booking->departure_date->format('F d, Y') }}</span>
                                    </div>
                                @endif
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-users text-purple-500 mr-3 w-4"></i>
                                    <span>{{ $booking->travelers }} {{ Str::plural('Traveler', $booking->travelers) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Reference -->
                <div class="bg-[#1E3A8A]/5 border-2 border-[#1E3A8A]/20 rounded-xl p-6 mb-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-600 uppercase tracking-wide mb-1">Booking Reference</p>
                            <p class="text-2xl font-bold text-[#1E3A8A]">#{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-600 uppercase tracking-wide mb-1">Total Amount</p>
                            <p class="text-2xl font-bold text-[#FF6B35]">{{ $booking->total_formatted }}</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="grid sm:grid-cols-2 gap-4 mb-8">
                    <a href="{{ route('checkout.invoice', $booking->id) }}"
                       class="group relative px-6 py-4 bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white rounded-xl text-center font-semibold hover:from-blue-600 hover:to-[#1E3A8A] transform hover:scale-105 transition-all duration-300 shadow-lg overflow-hidden">
                        <span class="relative z-10 flex items-center justify-center">
                            <i class="fas fa-file-pdf mr-3 text-xl"></i>
                            Download Invoice (PDF)
                        </span>
                        <div class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                    </a>

                    @if($booking->receipt_url)
                        <a target="_blank" href="{{ $booking->receipt_url }}"
                           class="group relative px-6 py-4 bg-white border-2 border-[#FF6B35] text-[#FF6B35] rounded-xl text-center font-semibold hover:bg-[#FF6B35] hover:text-white transform hover:scale-105 transition-all duration-300 shadow-lg overflow-hidden">
                            <span class="relative z-10 flex items-center justify-center">
                                <i class="fab fa-stripe mr-3 text-xl"></i>
                                View Stripe Receipt
                            </span>
                        </a>
                    @else
                        <a href="{{ route('home') }}"
                           class="group relative px-6 py-4 bg-white border-2 border-gray-300 text-[#374151] rounded-xl text-center font-semibold hover:border-[#374151] hover:bg-[#F3F4F6] transform hover:scale-105 transition-all duration-300 shadow-lg">
                            <span class="relative z-10 flex items-center justify-center">
                                <i class="fas fa-home mr-3 text-xl"></i>
                                Back to Home
                            </span>
                        </a>
                    @endif
                </div>

                <!-- Email Confirmation -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-200">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <i class="fas fa-envelope text-[#1E3A8A] text-xl mt-1"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-[#374151]">
                                We've sent a confirmation email to:
                            </p>
                            <p class="font-semibold text-[#1E3A8A]">{{ $booking->customer_email }}</p>
                            <p class="text-xs text-gray-600 mt-2">
                                Please check your inbox (and spam folder) for your booking details and invoice.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Next Steps -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h3 class="text-lg font-bold text-[#374151] mb-4">What's Next?</h3>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="text-center p-4">
                            <div class="w-12 h-12 bg-[#FF6B35]/10 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-check text-[#FF6B35] text-xl"></i>
                            </div>
                            <p class="text-sm font-semibold text-[#374151]">Booking Confirmed</p>
                            <p class="text-xs text-gray-600 mt-1">Your reservation is secured</p>
                        </div>
                        <div class="text-center p-4">
                            <div class="w-12 h-12 bg-[#1E3A8A]/10 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-envelope-open text-[#1E3A8A] text-xl"></i>
                            </div>
                            <p class="text-sm font-semibold text-[#374151]">Check Email</p>
                            <p class="text-xs text-gray-600 mt-1">Details sent to your inbox</p>
                        </div>
                        <div class="text-center p-4">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-plane text-green-600 text-xl"></i>
                            </div>
                            <p class="text-sm font-semibold text-[#374151]">Prepare for Travel</p>
                            <p class="text-xs text-gray-600 mt-1">Get ready for your adventure</p>
                        </div>
                    </div>
                </div>

                <!-- Support Section -->
                <div class="mt-8 text-center p-6 bg-[#F3F4F6] rounded-xl">
                    <p class="text-sm text-gray-600 mb-3">Need assistance with your booking?</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="tel:+15551234567" class="inline-flex items-center justify-center text-[#1E3A8A] hover:text-blue-700 font-semibold">
                            <i class="fas fa-phone mr-2"></i>
                            +1 (555) 123-4567
                        </a>
                        <a href="mailto:support@origintravels.com" class="inline-flex items-center justify-center text-[#FF6B35] hover:text-orange-700 font-semibold">
                            <i class="fas fa-envelope mr-2"></i>
                            support@origintravels.com
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-gradient-to-r from-[#F3F4F6] to-white px-8 py-6 text-center border-t border-gray-200">
                <div class="flex items-center justify-center mb-3">
                    <img src="{{ asset('logo/logo.png') }}" alt="ORIGIN Travels" class="h-10 mr-3">
                    <span class="text-xl font-bold text-[#374151]">ORIGIN Travels</span>
                </div>
                <p class="text-xs text-gray-600">
                    Thank you for choosing us for your travel needs. We look forward to making your journey unforgettable!
                </p>
                <div class="flex justify-center gap-4 mt-4">
                    <a href="#" class="text-gray-400 hover:text-[#1E3A8A] transition-colors">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-[#FF6B35] transition-colors">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-[#1E3A8A] transition-colors">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Confetti animation on load
document.addEventListener('DOMContentLoaded', function() {
    // Create confetti effect
    for(let i = 0; i < 50; i++) {
        createConfetti();
    }
    
    function createConfetti() {
        const confetti = document.createElement('div');
        confetti.style.position = 'fixed';
        confetti.style.width = '10px';
        confetti.style.height = '10px';
        confetti.style.backgroundColor = ['#FF6B35', '#1E3A8A', '#10B981', '#8B5CF6'][Math.floor(Math.random() * 4)];
        confetti.style.left = Math.random() * 100 + '%';
        confetti.style.top = '-10px';
        confetti.style.opacity = Math.random();
        confetti.style.transform = 'rotate(' + Math.random() * 360 + 'deg)';
        confetti.style.pointerEvents = 'none';
        confetti.style.zIndex = '9999';
        document.body.appendChild(confetti);
        
        // Animate falling
        let pos = -10;
        const fall = setInterval(() => {
            if(pos >= window.innerHeight) {
                clearInterval(fall);
                confetti.remove();
            } else {
                pos += 3;
                confetti.style.top = pos + 'px';
                confetti.style.transform = 'rotate(' + (pos * 2) + 'deg)';
            }
        }, 20);
        
        // Remove after 3 seconds
        setTimeout(() => {
            confetti.remove();
        }, 3000);
    }
});
</script>
@endpush

<style>
@keyframes pulse {
    0%, 100% {
        opacity: 0.3;
    }
    50% {
        opacity: 0.5;
    }
}

.animate-pulse {
    animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

.delay-1000 {
    animation-delay: 1s;
}

.delay-2000 {
    animation-delay: 2s;
}

@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

.animate-bounce {
    animation: bounce 2s ease-in-out infinite;
}
</style>
</x-app-layout>
