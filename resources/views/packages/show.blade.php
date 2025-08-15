
@section('title', $package->title . ' - ORIGIN Travels')

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
    {{-- HERO --}}
    <section class="relative h-[80vh] md:h-screen bg-cover bg-center bg-no-repeat overflow-hidden"
             style="background-image: linear-gradient(rgba(30, 58, 138, 0.55), rgba(30, 58, 138, 0.45)), url('{{ $hero }}');">

        <div class="absolute inset-0">
            <div class="absolute top-20 right-20 w-64 h-64 bg-dark-orange/30 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-40 left-20 w-96 h-96 bg-white/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-dark-orange/5 to-transparent"></div>
        </div>

        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="text-center text-white max-w-5xl mx-auto px-4">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 leading-tight animate-fade-in">
                    {{ $package->title }}
                </h1>
                <p class="text-lg md:text-2xl text-blue-100 mb-6 animate-fade-in-delay">
                    {{ $package->subtitle ?? ($package->location ?: $package->country) }}
                </p>

                {{-- Quick cards --}}
                <div class="bg-white/95 backdrop-blur-md rounded-3xl p-6 shadow-2xl border border-white/50 max-w-3xl mx-auto mt-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="flex items-center justify-center mb-2">
                                <i class="fas fa-calendar-alt text-dark-orange text-2xl mr-2"></i>
                                <span class="text-2xl font-bold text-dark-gray">{{ $package->duration ?: '—' }}</span>
                            </div>
                            <p class="text-gray-600">Duration</p>
                        </div>

                        <div class="text-center">
                            <div class="flex items-center justify-center mb-2">
                                <span class="text-sm text-gray-600 mr-1">From</span>
                                <span class="text-2xl font-bold text-dark-blue">
                                    {{ $package->formatted_price ?? (is_numeric($package->price) ? '$'.number_format($package->price, 0) : 'Contact') }}
                                </span>
                            </div>
                            <p class="text-gray-600">{{ $package->price_unit ?: 'per person' }}</p>
                        </div>

                        <div class="text-center flex items-center justify-center">
                            <a href="{{ route('customer.custom.tours') }}?package_id={{ $package->id }}&title={{ urlencode($package->title) }}"
                               class="px-6 py-3 bg-gradient-to-r from-dark-orange to-orange-600 text-white font-bold rounded-xl hover:from-orange-600 hover:to-dark-orange transform hover:scale-105 transition-all duration-300 shadow-lg w-full text-center">
                                CHECK AVAILABILITY
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Tags --}}
                @if(!empty($tags))
                <div class="flex flex-wrap justify-center gap-3 mt-6">
                    @foreach($tags as $tag)
                        <span class="bg-white/15 backdrop-blur-sm px-4 py-2 rounded-full border border-white/30 text-sm">
                            <i class="fas fa-tag text-dark-orange mr-2"></i>{{ $tag }}
                        </span>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Sticky tabs --}}
    <section class="bg-white shadow-xl sticky top-0 z-40 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center space-x-6 overflow-x-auto scrollbar-hide">
                <button class="tab-button active py-4 px-5 text-gray-600 hover:text-dark-orange transition-all duration-300 border-b-4 border-transparent whitespace-nowrap font-semibold" data-tab="overview">
                    <i class="fas fa-info-circle mr-2"></i>Overview
                </button>
                <button class="tab-button py-4 px-5 text-gray-600 hover:text-dark-orange transition-all duration-300 border-b-4 border-transparent whitespace-nowrap font-semibold" data-tab="itinerary">
                    <i class="fas fa-route mr-2"></i>Itinerary
                </button>
                <button class="tab-button py-4 px-5 text-gray-600 hover:text-dark-orange transition-all duration-300 border-b-4 border-transparent whitespace-nowrap font-semibold" data-tab="inclusions">
                    <i class="fas fa-check-double mr-2"></i>Inclusions
                </button>
                <button class="tab-button py-4 px-5 text-gray-600 hover:text-dark-orange transition-all duration-300 border-b-4 border-transparent whitespace-nowrap font-semibold" data-tab="gallery">
                    <i class="fas fa-images mr-2"></i>Gallery
                </button>
            </div>
        </div>
    </section>

    {{-- Main content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        {{-- OVERVIEW --}}
        <div id="overview" class="tab-content active">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl shadow-lg p-8 mb-8">
                        <h2 class="text-3xl font-bold text-dark-blue mb-4">{{ $package->title }}</h2>
                        <p class="text-gray-700 leading-relaxed">{{ $package->description }}</p>

                        {{-- quick stats --}}
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                            <div class="text-center p-4 bg-light-gray rounded-xl">
                                <i class="fas fa-clock text-dark-orange text-2xl mb-1"></i>
                                <p class="text-sm text-gray-600">Duration</p>
                                <p class="font-semibold text-dark-gray">{{ $package->duration ?: '—' }}</p>
                            </div>
                            <div class="text-center p-4 bg-light-gray rounded-xl">
                                <i class="fas fa-map-marker-alt text-dark-blue text-2xl mb-1"></i>
                                <p class="text-sm text-gray-600">Location</p>
                                <p class="font-semibold text-dark-gray">{{ $package->location ?: $package->country }}</p>
                            </div>
                            <div class="text-center p-4 bg-light-gray rounded-xl">
                                <i class="fas fa-star text-yellow-500 text-2xl mb-1"></i>
                                <p class="text-sm text-gray-600">Rating</p>
                                <p class="font-semibold text-dark-gray">
                                    {{ $package->formatted_rating ?? (is_numeric($package->rating) ? number_format($package->rating, 1) : '—') }}
                                </p>
                            </div>
                            <div class="text-center p-4 bg-light-gray rounded-xl">
                                <i class="fas fa-tag text-emerald-600 text-2xl mb-1"></i>
                                <p class="text-sm text-gray-600">Status</p>
                                <p class="font-semibold text-dark-gray">{{ ucfirst($package->status) }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- BUY strip --}}
                    <div class="bg-gradient-to-r from-dark-blue to-blue-800 rounded-3xl p-6 text-white mb-8">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                            <div>
                                <p class="text-blue-100 text-sm">Starting from</p>
                                <div class="text-3xl font-bold">
                                    {{ $package->formatted_price ?? (is_numeric($package->price) ? '$'.number_format($package->price, 0) : 'Contact us') }}
                                    <span class="text-base font-normal"> {{ $package->price_unit ?: 'per person' }}</span>
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('checkout.show', $package->id) }}"
                                    class="px-6 py-3 bg-dark-orange text-white rounded-xl hover:opacity-90 font-semibold">
                                    BOOK YOUR TRIP NOW
                                </a>

                                <a href="{{ route('customer.contact-us') }}?package={{ urlencode($package->title) }}"
                                   class="px-6 py-3 border-2 border-white text-white rounded-xl hover:bg-white hover:text-dark-blue font-semibold">
                                    SPEAK TO AN EXPERT
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SIDEBAR --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-3xl shadow-xl p-6 sticky top-24 border border-gray-100">
                        <div class="text-center mb-6">
                            <p class="text-gray-600 mb-1">Starting from</p>
                            <div class="text-4xl font-bold text-dark-blue mb-1">
                                {{ $package->formatted_price ?? (is_numeric($package->price) ? '$'.number_format($package->price, 0) : 'Contact') }}
                            </div>
                            <p class="text-sm text-gray-500">{{ $package->price_unit ?: 'per person' }}</p>
                        </div>

                        <a href="{{ route('customer.custom.tours') }}?package_id={{ $package->id }}&title={{ urlencode($package->title) }}"
                           class="w-full block text-center py-4 bg-gradient-to-r from-dark-orange to-orange-600 text-white font-bold rounded-xl hover:from-orange-600 hover:to-dark-orange transition-all duration-300 shadow-lg mb-3">
                            CHECK AVAILABILITY
                        </a>

                        <a href="{{ route('customer.contact-us') }}?package={{ urlencode($package->title) }}"
                           class="w-full block text-center py-3 border-2 border-dark-blue text-dark-blue font-bold rounded-xl hover:bg-dark-blue hover:text-white transition-all duration-300">
                            <i class="fas fa-phone mr-2"></i>CONTACT US
                        </a>

                        <div class="mt-6 pt-6 border-t border-gray-200 space-y-3 text-sm text-gray-600">
                            <div class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-3"></i>Free cancellation (24h)</div>
                            <div class="flex items-center"><i class="fas fa-shield-alt text-blue-500 mr-3"></i>Secure booking</div>
                            <div class="flex items-center"><i class="fas fa-headset text-dark-orange mr-3"></i>24/7 support</div>
                        </div>
                    </div>

                    {{-- Gallery preview (first image) --}}
                    @if(count($gallery))
                    <div class="mt-6 rounded-2xl overflow-hidden shadow-lg">
                        <img src="{{ $gallery[0] }}" alt="{{ $package->title }}" class="w-full h-56 object-cover">
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ITINERARY --}}
        <div id="itinerary" class="tab-content">
            <div class="mb-10">
                <h3 class="text-3xl font-bold text-dark-blue">Your Adventure Plan</h3>
                <p class="text-gray-600">Day-by-day breakdown</p>
            </div>

            <div class="space-y-6">
                @foreach($itinerary as $idx => $line)
                    <div class="bg-white rounded-2xl shadow p-6 border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-dark-orange text-white rounded-xl flex items-center justify-center font-bold mr-4">
                                    D{{ $idx + 1 }}
                                </div>
                                <h4 class="text-lg font-bold text-dark-gray">{{ $line }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- INCLUSIONS --}}
        <div id="inclusions" class="tab-content">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl shadow p-6 border border-gray-100">
                    <h4 class="text-2xl font-bold text-emerald-700 mb-4"><i class="fas fa-check mr-2"></i>Included</h4>
                    <ul class="space-y-2 text-gray-700">
                        @foreach($inclusions as $inc)
                            <li class="flex"><i class="fas fa-check text-green-500 mr-3 mt-1"></i><span>{{ $inc }}</span></li>
                        @endforeach
                    </ul>
                </div>

                <div class="bg-white rounded-2xl shadow p-6 border border-gray-100">
                    <h4 class="text-2xl font-bold text-rose-700 mb-4"><i class="fas fa-times mr-2"></i>Not Included</h4>
                    <ul class="space-y-2 text-gray-700">
                        @foreach($exclusions as $exc)
                            <li class="flex"><i class="fas fa-times text-red-500 mr-3 mt-1"></i><span>{{ $exc }}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        {{-- GALLERY --}}
        <div id="gallery" class="tab-content">
            @if(count($gallery))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($gallery as $url)
                    <div class="group relative rounded-2xl overflow-hidden shadow-lg">
                        <img src="{{ $url }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700" alt="Gallery">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                @endforeach
            </div>
            @else
                <p class="text-gray-500">Gallery coming soon.</p>
            @endif
        </div>
    </div>

    {{-- Styles + Tabs JS (same feel as your mock) --}}
    <style>
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-14px)}}
        @keyframes fade-in { from {opacity:0; transform:translateY(20px);} to {opacity:1; transform:translateY(0);} }
        @keyframes fade-in-delay { 0%{opacity:0;transform:translateY(20px)}50%{opacity:0}100%{opacity:1;transform:translateY(0)}}
        .animate-float{animation:float 6s ease-in-out infinite}
        .animate-fade-in{animation:fade-in 1s ease-out}
        .animate-fade-in-delay{animation:fade-in-delay 1.5s ease-out}
        .scrollbar-hide{-ms-overflow-style:none;scrollbar-width:none}
        .scrollbar-hide::-webkit-scrollbar{display:none}
        .tab-button.active{color:#FF6B35;border-bottom-color:#FF6B35}
        .tab-content{display:none}
        .tab-content.active{display:block}
    </style>
    <script>
        document.querySelectorAll('.tab-button').forEach(btn=>{
            btn.addEventListener('click',()=>{
                const tab = btn.dataset.tab;
                document.querySelectorAll('.tab-button').forEach(b=>b.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c=>c.classList.remove('active'));
                btn.classList.add('active');
                document.getElementById(tab).classList.add('active');
                window.scrollTo({ top: document.querySelector('.sticky.top-0').offsetTop, behavior: 'smooth' });
            });
        });
    </script>
</x-app-layout>
