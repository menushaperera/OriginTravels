@section('title', 'Book: '.$package->title)

<x-app-layout>
<div class="min-h-screen bg-gradient-to-br from-[#F3F4F6] via-white to-[#F3F4F6]">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-[#1E3A8A] to-[#FF6B35] py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-white">Complete Your Booking</h1>
                    <p class="text-blue-100 mt-2">You're just a few steps away from your dream vacation</p>
                </div>
                <div class="hidden md:flex items-center space-x-6 text-white">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center text-sm font-bold">1</div>
                        <span class="ml-2 text-sm">Select Options</span>
                    </div>
                    <div class="w-12 h-0.5 bg-white/30"></div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center text-sm font-bold">2</div>
                        <span class="ml-2 text-sm">Enter Details</span>
                    </div>
                    <div class="w-12 h-0.5 bg-white/30"></div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center text-sm font-bold">3</div>
                        <span class="ml-2 text-sm">Payment</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- LEFT: Trip options + passenger -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Trip Configuration Section -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white rounded-xl p-3 mr-4">
                            <i class="fas fa-calendar-alt text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-[#374151]">Trip Configuration</h3>
                            <p class="text-gray-500 text-sm mt-1">Customize your travel preferences</p>
                        </div>
                    </div>

                    <!-- Departure Date -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-[#374151] mb-3">
                            <i class="fas fa-calendar text-[#FF6B35] mr-2"></i>Select Your Departure Date
                        </label>
                        <div class="relative max-w-sm">
                            <input type="date" 
                                   id="departure_date"
                                   class="w-full px-5 py-4 pr-12 rounded-xl border-2 border-gray-200 focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300"
                                   value="{{ $defaults['departure_date'] }}">
                        </div>
                    </div>

                    <!-- Airline Mode -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-[#374151] mb-3">
                            <i class="fas fa-plane text-[#1E3A8A] mr-2"></i>Choose Your Travel Package
                        </label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <label class="relative cursor-pointer">
                                <input type="radio" name="pricing_mode" value="land_only" class="sr-only peer"
                                       {{ $defaults['pricing_mode'] === 'land_only' ? 'checked' : '' }}>
                                <div class="border-2 border-gray-200 rounded-xl p-6 hover:border-[#FF6B35] transition-all duration-300 peer-checked:border-[#FF6B35] peer-checked:bg-[#FF6B35]/5">
                                    <span class="text-lg font-bold text-[#374151]">Land Only</span>
                                    <div class="text-sm text-gray-600 mt-1">Ground arrangements only</div>
                                    <div class="mt-3 text-2xl font-bold text-[#FF6B35]">From ${{ number_format($package->price, 0) }}</div>
                                </div>
                            </label>
                            
                            <label class="relative cursor-pointer">
                                <input type="radio" name="pricing_mode" value="land_air" class="sr-only peer"
                                       {{ $defaults['pricing_mode'] === 'land_air' ? 'checked' : '' }}>
                                <div class="border-2 border-gray-200 rounded-xl p-6 hover:border-[#1E3A8A] transition-all duration-300 peer-checked:border-[#1E3A8A] peer-checked:bg-[#1E3A8A]/5">
                                    <span class="text-lg font-bold text-[#374151]">Land + Air</span>
                                    <div class="text-sm text-gray-600 mt-1">Including round-trip flights</div>
                                    <div class="mt-3 text-2xl font-bold text-[#1E3A8A]">+$1,000</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Gateway Selection -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-[#374151] mb-3">
                            <i class="fas fa-map-marker-alt text-green-500 mr-2"></i>Select Departure Gateway
                        </label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
                            @foreach(['LAX'=>'Los Angeles','JFK'=>'New York','SFO'=>'San Francisco','SEA'=>'Seattle','ORD'=>"Chicago O'Hare"] as $code => $city)
                                <button type="button"
                                        data-gateway="{{ $code }}"
                                        class="gateway group relative px-4 py-4 rounded-xl border-2 transition-all duration-300 hover:shadow-lg {{ $defaults['gateway']===$code ? 'border-[#FF6B35] bg-[#FF6B35]/5' : 'border-gray-200 hover:border-[#FF6B35]/50' }}">
                                    <div class="font-bold text-[#374151]">{{ $code }}</div>
                                    <div class="text-xs text-gray-500 mt-1">{{ $city }}</div>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Travelers & Rooms -->
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-[#374151] mb-3">
                                <i class="fas fa-users text-purple-500 mr-2"></i>Number of Travelers
                            </label>
                            <input id="travelers" 
                                   type="number" 
                                   min="1" 
                                   max="20" 
                                   value="{{ $defaults['travelers'] }}"
                                   class="w-full px-4 py-3 text-center text-lg font-semibold rounded-xl border-2 border-gray-200 focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35]">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-[#374151] mb-3">
                                <i class="fas fa-bed text-indigo-500 mr-2"></i>Number of Rooms
                            </label>
                            <input id="rooms" 
                                   type="number" 
                                   min="1" 
                                   max="10" 
                                   value="{{ $defaults['rooms'] }}"
                                   class="w-full px-4 py-3 text-center text-lg font-semibold rounded-xl border-2 border-gray-200 focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35]">
                        </div>
                    </div>
                </div>

                <!-- Lead Passenger Information -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white rounded-xl p-3 mr-4">
                            <i class="fas fa-user text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-[#374151]">Lead Passenger Information</h3>
                            <p class="text-gray-500 text-sm mt-1">Primary contact for this booking</p>
                        </div>
                    </div>
                    
                    <div class="grid md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">Full Name *</label>
                            <input id="customer_name" 
                                   type="text" 
                                   placeholder="John Doe"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35]">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">Email Address *</label>
                            <input id="customer_email" 
                                   type="email" 
                                   placeholder="john@example.com"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35]">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-2">Phone Number</label>
                            <input id="customer_phone" 
                                   type="text" 
                                   placeholder="+1 (555) 123-4567"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35]">
                        </div>
                    </div>
                </div>

                <!-- Payment Section -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl p-3 mr-4">
                            <i class="fas fa-credit-card text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-[#374151]">Secure Payment</h3>
                            <p class="text-gray-500 text-sm mt-1">Your payment information is encrypted and secure</p>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wide mb-3">Card Details</label>
                        <div id="card-element" class="p-4 border-2 border-gray-200 rounded-xl"></div>
                        <p id="card-errors" class="text-sm text-red-600 mt-2"></p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('packages.show', $package) }}" 
                       class="px-6 py-3 bg-white border-2 border-gray-300 text-[#374151] rounded-xl font-semibold hover:border-[#374151]">
                        <i class="fas fa-arrow-left mr-2"></i>Back
                    </a>
                    
                    <button id="payBtn"
                            class="px-8 py-4 bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white rounded-xl font-bold text-lg hover:from-orange-600 hover:to-[#FF6B35] shadow-xl">
                        <i class="fas fa-lock mr-3"></i>Complete Booking
                    </button>
                </div>

                <p id="statusMsg" class="text-center text-sm text-gray-600 mt-4"></p>
            </div>

            <!-- RIGHT: Summary -->
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 sticky top-24 p-6">
                    <!-- Package Info -->
                    <div class="pb-6 border-b border-gray-100">
                        <img src="{{ $package->image_url ?? 'https://images.unsplash.com/photo-1488646953014-85cb44e25828' }}" 
                             class="w-full h-32 rounded-xl object-cover mb-4">
                        <div class="text-lg font-bold text-[#374151]">{{ $package->title }}</div>
                        <div class="text-sm text-gray-500 mt-1">{{ $package->location ?? $package->country }}</div>
                    </div>

                    <!-- Summary -->
                    <div class="py-6 space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Travelers</span>
                            <span class="font-semibold" id="sumTravelers">2</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Package</span>
                            <span class="font-semibold" id="sumMode">Land + Air</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Gateway</span>
                            <span class="font-semibold" id="sumGateway">{{ $defaults['gateway'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Rooms</span>
                            <span class="font-semibold" id="sumRooms">1</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="pt-6 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Total Amount</span>
                            <span class="text-2xl font-bold text-[#FF6B35]" id="grandTotal">$0</span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>


<script src="https://js.stripe.com/v3/"></script>
<script>
const STRIPE_KEY = "{{ $stripeKey }}";
const stripe = Stripe(STRIPE_KEY);
const elements = stripe.elements();
const card = elements.create('card');
card.mount('#card-element');

const airAddonPerTraveler = 1000;
const basePrice = Number({{ (float)$package->price }});

const els = {
    travelers: document.getElementById('travelers'),
    rooms: document.getElementById('rooms'),
    departure: document.getElementById('departure_date'),
    name: document.getElementById('customer_name'),
    email: document.getElementById('customer_email'),
    phone: document.getElementById('customer_phone'),
    payBtn: document.getElementById('payBtn'),
    status: document.getElementById('statusMsg'),
    sumTravelers: document.getElementById('sumTravelers'),
    sumRooms: document.getElementById('sumRooms'),
    sumMode: document.getElementById('sumMode'),
    sumGateway: document.getElementById('sumGateway'),
    grandTotal: document.getElementById('grandTotal'),
};

let pricingMode = '{{ $defaults['pricing_mode'] }}';
let gateway = '{{ $defaults['gateway'] }}';

document.querySelectorAll('input[name=pricing_mode]').forEach(r => {
    r.addEventListener('change', () => {
        pricingMode = r.value;
        els.sumMode.textContent = (pricingMode === 'land_air') ? 'Land + Air' : 'Land Only';
        renderTotal();
    });
});

document.querySelectorAll('.gateway').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.gateway').forEach(b => {
            b.classList.remove('border-[#FF6B35]', 'bg-[#FF6B35]/5');
            b.classList.add('border-gray-200');
        });
        btn.classList.remove('border-gray-200');
        btn.classList.add('border-[#FF6B35]', 'bg-[#FF6B35]/5');
        gateway = btn.dataset.gateway;
        els.sumGateway.textContent = gateway;
    });
});

[els.travelers, els.rooms].forEach(i => i.addEventListener('input', renderTotal));

function renderTotal() {
    const t = Math.max(1, Number(els.travelers.value || 1));
    const r = Math.max(1, Number(els.rooms.value || 1));
    
    els.sumTravelers.textContent = t;
    els.sumRooms.textContent = r;

    const perTraveler = basePrice + (pricingMode === 'land_air' ? airAddonPerTraveler : 0);
    const total = perTraveler * t;
    els.grandTotal.textContent = new Intl.NumberFormat('en-US', {style:'currency', currency:'USD'}).format(total);
}

renderTotal();

function csrf() { 
    return document.querySelector('meta[name=csrf-token]').content; 
}

els.payBtn.addEventListener('click', async () => {
    if (!els.name.value || !els.email.value) {
        els.status.textContent = 'Please enter your name and email.';
        return;
    }
    
    els.status.textContent = 'Processing...';
    els.payBtn.disabled = true;

    try {
        const res = await fetch(`{{ route('checkout.intent') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf(),
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                package_id: {{ $package->id }},
                customer_name: els.name.value,
                customer_email: els.email.value,
                customer_phone: els.phone.value,
                departure_date: els.departure.value,
                pricing_mode: pricingMode,
                gateway,
                travelers: Number(els.travelers.value || 1),
                rooms: Number(els.rooms.value || 1),
            })
        });
        
        const data = await res.json();
        if (!res.ok) throw new Error(data.message || 'Failed to create intent');

        const result = await stripe.confirmCardPayment(data.clientSecret, {
            payment_method: {
                card: card,
                billing_details: {
                    name: els.name.value,
                    email: els.email.value,
                    phone: els.phone.value
                }
            }
        });

        if (result.error) {
            els.status.textContent = result.error.message || 'Payment failed.';
            els.payBtn.disabled = false;
            return;
        }

        if (result.paymentIntent && result.paymentIntent.status === 'succeeded') {
            const v = await fetch(`{{ route('checkout.verify') }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf(),
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    booking_id: data.bookingId,
                    payment_intent_id: result.paymentIntent.id
                })
            });
            
            const vr = await v.json();
            if (!v.ok || !vr.ok) throw new Error(vr.message || 'Verification failed');
            
            window.location.href = vr.redirect;
        } else {
            els.status.textContent = 'Payment did not complete.';
            els.payBtn.disabled = false;
        }
    } catch (e) {
        console.error(e);
        els.status.textContent = e.message || 'Something went wrong.';
        els.payBtn.disabled = false;
    }
});
</script>
</x-app-layout>
