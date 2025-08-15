@section('title', 'Terms & Conditions - ORIGIN Travels')

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
                    'float': 'float 6s ease-in-out infinite',
                },
                keyframes: {
                    fadeIn: {
                        '0%': { opacity: '0' },
                        '100%': { opacity: '1' },
                    },
                    slideUp: {
                        '0%': { transform: 'translateY(20px)', opacity: '0' },
                        '100%': { transform: 'translateY(0)', opacity: '1' },
                    },
                    float: {
                        '0%, 100%': { transform: 'translateY(0px)' },
                        '50%': { transform: 'translateY(-20px)' },
                    }
                }
            }
        }
    }
</script>

<x-app-layout>
<!-- Hero Section -->
<section class="relative h-[50vh] min-h-[400px] overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1488085061387-422e29b40080?q=80&w=2000" 
             alt="London Bridge at Night" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-dark-blue/70 via-dark-blue/50 to-dark-blue/80"></div>
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
                General Information And<br/> 
                <span class="bg-gradient-to-r from-dark-orange via-orange-400 to-dark-orange bg-clip-text text-transparent animate-gradient">
                    Terms & Conditions
                </span>
            </h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                Please read our terms carefully before booking your travel experience.
            </p>
        </div>
    </div>
</section>

<!-- Navigation Tabs -->
<section class="bg-white shadow-lg sticky top-0 z-40 border-b border-gray-200">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-center">
            <button class="tab-btn px-6 py-4 text-white bg-gradient-to-r from-dark-blue to-blue-700 font-semibold border-b-4 border-dark-orange transition-all duration-300" data-tab="general">
                GENERAL INFORMATION AND TERMS & CONDITIONS
            </button>
            <button class="tab-btn px-6 py-4 text-dark-gray hover:text-dark-blue font-semibold border-b-4 border-transparent hover:border-gray-300 transition-all duration-300" data-tab="airfare">
                ORIGIN TOURS' AIRFARE POLICY
            </button>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-gradient-to-b from-white to-light-gray">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- General Information Tab -->
        <div id="general-tab" class="tab-content">
            
            <!-- Terms & Conditions Header -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-dark-gray mb-4">Terms & Conditions</h2>
                <div class="w-24 h-1 bg-dark-orange mx-auto"></div>
            </div>

            <!-- Your Guided Tour Booking Section -->
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-10 mb-8 border border-gray-100 animate-slide-up">
                <h3 class="text-2xl font-bold text-dark-blue mb-6 flex items-center">
                    <span class="w-1 h-8 bg-dark-orange mr-3"></span>
                    Your Guided Tour Booking
                </h3>
                <div class="prose prose-lg text-gray-600 max-w-none space-y-4">
                    <p>
                        Your agreement is with ("Origin Tours, Inc") referred to as Origin Tours and a contract is formed when you make a reservation with us and we accept it. By making or being named on a booking reservation with us and paying a deposit or having a deposit paid for you, you have entered into a travel contract with us. You agree that you have carefully read and you agree to be bound by the terms and conditions in this brochure, consent to our use of information about you in accordance with our Privacy Policy. We reserve the right under the Terms and Conditions below to cancel your booking reservation, return your pre-confirmation deposit, decline to issue, or cancel a confirmation.
                    </p>
                </div>
            </div>

            <!-- Disclaimer Section -->
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-10 mb-8 border border-gray-100 animate-slide-up">
                <h3 class="text-2xl font-bold text-dark-blue mb-6 flex items-center">
                    <span class="w-1 h-8 bg-dark-orange mr-3"></span>
                    Disclaimer
                </h3>
                <div class="prose prose-lg text-gray-600 max-w-none space-y-4">
                    <p>
                        Travel is personal and each individual's wishes and experience may differ; Origin Tours will not be bound by, or liable for any description, photograph, representation or warranty made by or provided by any third party sales representative, Travel Agent, or any other person or entity relating to any guided tour offered by Origin Tours.
                    </p>
                    <p class="font-medium text-dark-gray">
                        Please review our privacy policy carefully and remember that Origin Tours will never sell or rent your personal information to third parties.
                    </p>
                </div>
            </div>

            <!-- Security Section -->
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-10 mb-8 border border-gray-100 animate-slide-up">
                <h3 class="text-2xl font-bold text-dark-blue mb-6 flex items-center">
                    <span class="w-1 h-8 bg-dark-orange mr-3"></span>
                    Security
                </h3>
                <div class="prose prose-lg text-gray-600 max-w-none">
                    <p>
                        Safety and security is a significant concern to all of us and the global situation is subject to constant change. Events around the world, combined with the "Travel Advisories" issued by various governments, may in some circumstances necessitate changes to the accommodation, the itinerary or even trip cancellation. You must accept these risks involved in travel to any country that may experience security difficulties and accept responsibility for your own travel decisions.
                    </p>
                </div>
            </div>

            <!-- Reservation Section -->
            <div class="bg-gradient-to-br from-dark-blue to-blue-800 text-white rounded-3xl shadow-2xl p-8 md:p-10 mb-8 animate-slide-up">
                <h3 class="text-3xl font-bold mb-8 text-center">Reservation</h3>
                
                <!-- Deposit -->
                <div class="mb-8">
                    <h4 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-dollar-sign mr-3 text-dark-orange"></i>
                        Deposit
                    </h4>
                    <p class="text-blue-100 leading-relaxed">
                        A deposit of $300 per person is required at the time of booking of the reservation. Reservation will automatically be canceled if your deposit is not received by Origin Tours within 7 days after booking of the reservation. Airfare deposits (if applicable) may apply at the time of booking.
                    </p>
                </div>

                <!-- Final Payment -->
                <div>
                    <h4 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-calendar-check mr-3 text-dark-orange"></i>
                        Final Payment
                    </h4>
                    <div class="space-y-4">
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                            <p class="font-semibold mb-2">Land & Air Package:</p>
                            <p class="text-sm">
                                The balance of the price must be paid at least 60 days prior to the departure date. Origin Tours may require earlier payment of the airfare portion of your tour. If you book less than 60 days prior to the departure date, the final payment is due upon booking. If the balance is not paid by the due date, then Origin Tours has the right to cancel your booking and retain any deposit, cancel any airfare from your Land & Air Package, and change your reservation to a Land Only Package. You will be charged a late payment fee of $50 per person for each late payment we receive.
                            </p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                            <p class="font-semibold mb-2">Land Only Package:</p>
                            <p class="text-sm">
                                The final balance of the price must be paid at least 60 days prior to the departure date. If you book less than 60 days prior to the departure date, the final payment will be due upon booking. Origin Tours has the right to cancel your booking and retain any deposit if the balance is not paid by the due date.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cancellation Policy -->
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-10 mb-8 border border-gray-100 animate-slide-up">
                <h3 class="text-2xl font-bold text-dark-blue mb-6 flex items-center">
                    <span class="w-1 h-8 bg-dark-orange mr-3"></span>
                    Cancellation Policy
                </h3>
                <p class="text-gray-600 mb-6">
                    If you cancel your booking, a per person fee will be charged according to the date Origin Tours receives and acknowledges your cancellation as follows:
                </p>
                
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gradient-to-r from-dark-blue to-blue-700 text-white">
                                <th class="px-6 py-4 text-left font-semibold">Days Before Departure</th>
                                <th class="px-6 py-4 text-right font-semibold">Cancellation Fee</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-200 hover:bg-light-gray transition-colors">
                                <td class="px-6 py-4">60 or more days prior to departure date</td>
                                <td class="px-6 py-4 text-right font-semibold text-dark-orange">$300</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-light-gray transition-colors">
                                <td class="px-6 py-4">30-59 days prior to departure date</td>
                                <td class="px-6 py-4 text-right font-semibold text-dark-orange">$500</td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-light-gray transition-colors">
                                <td class="px-6 py-4">3-29 days prior to departure date</td>
                                <td class="px-6 py-4 text-right font-semibold text-dark-orange">$1000</td>
                            </tr>
                            <tr class="hover:bg-light-gray transition-colors">
                                <td class="px-6 py-4">Within 48 hours prior to departure including no show on the day of departure</td>
                                <td class="px-6 py-4 text-right font-semibold text-red-600">100% of Tour Fare</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 bg-orange-50 border-l-4 border-dark-orange p-4 rounded-r-lg">
                    <p class="text-sm text-gray-700">
                        <strong>Cancellation Notice:</strong> Written notice of cancellation must be received by Origin Tours by e-mail. Your notice of cancellation will only be effective when it is received in writing by us and acknowledged.
                    </p>
                </div>
            </div>

            <!-- Additional Sections -->
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <!-- Third-party Suppliers -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-exclamation-triangle mr-3 text-dark-orange"></i>
                        Third-party Suppliers' Penalties and Charges
                    </h4>
                    <p class="text-gray-600 text-sm">
                        In addition to the above stated cancellation charges, if tickets or vouchers for airlines, hotels, cruises, trains or any relevant third-party suppliers have already been issued or confirmation of service has been received at the time of cancellation (regardless the number of days prior to departure), the traveler will be wholly liable for any additional airline, hotel, cruise line, train or other relevant third-party supplier's cancellation penalties and service charges pursuant to suppliers' rules and regulations.
                    </p>
                </div>

                <!-- Single Room Supplement -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-bed mr-3 text-dark-orange"></i>
                        Single Room Supplement Charge
                    </h4>
                    <p class="text-gray-600 text-sm">
                        In the event of cancellation by your travel companion or roommate, you will be responsible for the additional resultant single room supplement charge.
                    </p>
                </div>
            </div>

            <!-- Tour Fare Includes Section -->
            <div class="bg-gradient-to-br from-light-gray to-white rounded-3xl shadow-xl p-8 md:p-10 mb-8 border border-gray-100 animate-slide-up">
                <h3 class="text-2xl font-bold text-dark-blue mb-6 flex items-center">
                    <span class="w-1 h-8 bg-dark-orange mr-3"></span>
                    TOUR FARE INCLUDES : (All Prices Are In U.S. Dollars On Per Person Basis)
                </h3>
                
                <div class="space-y-6">
                    <!-- Air Section -->
                    <div>
                        <h4 class="text-xl font-semibold text-dark-gray mb-4">Air:</h4>
                        
                        <div class="bg-white rounded-xl p-6 shadow-md space-y-4">
                            <h5 class="font-semibold text-dark-blue flex items-center">
                                <i class="fas fa-plane mr-2 text-dark-orange"></i>
                                Land & Air Packages
                            </h5>
                            <ul class="space-y-3 text-gray-600">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                    <p>For travelers who elect to purchase an Air Package along with the Land Package, a round-trip international economy class air ticket from the gateway city and all intra-tour air tickets (if applicable) are included with the tour as per itinerary (except city packages). Gateway cities are specified in the itineraries.</p>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                                    <p>For departure gateway cities other than specified, please consult your travel agent or Origin Tours regarding the U.S. domestic add-on airfare.</p>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Land Only Packages -->
                    <div>
                        <div class="bg-white rounded-xl p-6 shadow-md space-y-4">
                            <h5 class="font-semibold text-dark-blue flex items-center">
                                <i class="fas fa-suitcase mr-2 text-dark-orange"></i>
                                Land Only Packages
                            </h5>
                            <ul class="space-y-3 text-gray-600">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                    <p>Travelers that purchase Land Only Packages are responsible for ALL their air segments (unless otherwise specified). Please review the tour itinerary and features carefully, paying special attention to the dates, time, and cities of arrival and departure, and plan your own air itinerary accordingly.</p>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-dollar-sign text-yellow-500 mt-1 mr-3"></i>
                                    <p>US domestic flights departing from your hometown are available with the purchase of our tour series. Please check our website for up-to-date offers. Offered airfare prices are good only with the concurrent purchase of our tour series. A 60-day advance purchase is required at the offered prices.</p>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-exchange-alt text-purple-500 mt-1 mr-3"></i>
                                    <p>Travelers that purchase a Land Only / Land & Cruise Package are permitted to change to Land & Air Package 100 days prior to departure without incurring an air surcharge. Travelers who wish to change from a Land Only / Land & Cruise Package to Land & Air Package within 60 - 99 days prior to departure will incur an air surcharge. Do not purchase any airline tickets until we have confirmed your departure date with you.</p>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-bus text-indigo-500 mt-1 mr-3"></i>
                                    <p>Land Only Package travelers are responsible for arrival airport transfer (to hotel) and departure airport transfer (from hotel).</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hotel Accommodations -->
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-10 mb-8 border border-gray-100 animate-slide-up">
                <h3 class="text-2xl font-bold text-dark-blue mb-6 flex items-center">
                    <span class="w-1 h-8 bg-dark-orange mr-3"></span>
                    Hotel Accommodations
                </h3>
                <div class="space-y-4 text-gray-600">
                    <p>
                        Hotel accommodations are based on two adults sharing one twin bedded room (2 twin beds). Some hotels may have a maximum room occupancy limit. Triple rooms are subject to availability at the time of check-in and are on request only.
                    </p>
                    <p>
                        A customer occupying a single room is required to pay a single supplement fee.
                    </p>
                    <p>
                        When the hotel listed in the brochure or website is unavailable, a similar category hotel will be substituted without prior notice.
                    </p>
                    
                    <div class="bg-light-gray rounded-xl p-4 mt-6">
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <i class="fas fa-clock text-dark-orange mr-3"></i>
                                <span>Hotel check-in time is 2:00 pm - 4:00 pm</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-clock text-dark-orange mr-3"></i>
                                <span>Hotel check-out time is 10:00 am - 11:00 am</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-info-circle text-blue-500 mr-3"></i>
                                <span>Hotel check-in and check-out times vary from hotel to hotel</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Additional Terms Grid -->
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <!-- Meals -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-utensils mr-3 text-dark-orange"></i>
                        Meals
                    </h4>
                    <p class="text-gray-600">
                        Meals will be provided in hotels, local restaurants, or on the cruise ship as specified in the itinerary. Drinks are not included unless otherwise specified.
                    </p>
                </div>

                <!-- Itinerary Variations -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-route mr-3 text-dark-orange"></i>
                        Itinerary Variations
                    </h4>
                    <p class="text-gray-600">
                        Origin Tours strives to offer all sightseeing excursions specified in the itinerary; however all final arrangements will be determined by the local tour escort or tour manager. In rare circumstances which may be beyond our control, such as weather conditions, acts of God or other hazardous conditions, we may be forced to vary itineraries or substitute sightseeing excursions. Where possible we will endeavor to notify you or your travel agent of any changes.
                    </p>
                </div>

                <!-- Admissions -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-ticket-alt mr-3 text-dark-orange"></i>
                        Admissions / Entrance Fees
                    </h4>
                    <p class="text-gray-600">
                        All necessary main entrance fees for the sightseeing excursions will be included as specified in the itinerary. Certain entrance tickets to the attraction might not be available. In this unlikely event, the entrance fee will be refunded to the clients.
                    </p>
                </div>

                <!-- Tour Manager -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-user-tie mr-3 text-dark-orange"></i>
                        Tour Manager
                    </h4>
                    <p class="text-gray-600">
                        The service of a professional tour manager is included as specified in the itinerary; however all city packages, customized packages, extensions, and some destinations such as Africa (but not limited to) will be locally hosted unless otherwise specified. Tours which include the service of local guides in each city will be specified in the tour details/inclusions.
                    </p>
                </div>
            </div>

            <!-- Tour Fare Does Not Include -->
            <div class="bg-gradient-to-br from-red-50 to-orange-50 rounded-3xl shadow-xl p-8 md:p-10 mb-8 border border-red-100 animate-slide-up">
                <h3 class="text-2xl font-bold text-red-800 mb-6 flex items-center">
                    <span class="w-1 h-8 bg-red-600 mr-3"></span>
                    TOUR FARE DOES NOT INCLUDE:
                </h3>
                <p class="text-gray-700 leading-relaxed">
                    Round-trip airfare from your hometown (for Land Only / Land & Cruise Packages) or round-trip airfare from your hometown to the gateway city (for Land & Air Packages); meals not mentioned in the itinerary; insurance premiums; charges arising from deviations; any expenses due to delay or changes of schedule, overbooking of accommodations, default of any third parties, sickness, weather, strike, acts of God, acts of terrorism, force majeure, acts of government's civil disturbances, war, quarantine, customs regulations, epidemics, criminal activity or for any other cause beyond Origin Tours' control; any personal charges including but not limited to passport and visa fees, any baggage charges, phone bills, postage, laundry, drinks and beverages; any airline imposed ancillary charges that may change from time to time if any, and may be without prior notice, including but not limited to hand luggage fee, check-in luggage fee, seating assignment fee, Wi-Fi charges, in-flight entertainment fees and any other fees.
                </p>
            </div>

            <!-- General Conditions -->
            <div class="bg-gradient-to-br from-dark-blue to-blue-800 text-white rounded-3xl shadow-2xl p-8 md:p-10 mb-8 animate-slide-up">
                <h3 class="text-3xl font-bold mb-8 text-center">GENERAL CONDITIONS:</h3>
                
                <div class="space-y-8">
                    <!-- Unused Tour Features -->
                    <div>
                        <h4 class="text-xl font-bold mb-4 flex items-center">
                            <i class="fas fa-ban mr-3 text-dark-orange"></i>
                            Unused Tour Features
                        </h4>
                        <p class="text-blue-100">
                            Any unused tour features either on air transportation or for land arrangements are strictly non refundable, exchangeable or transferable.
                        </p>
                        <div class="bg-red-900/30 border border-red-400/50 rounded-xl p-4 mt-4">
                            <p class="text-sm">
                                <strong>*Important note:</strong> If you or any of your travel companions tests positive for Covid-19 and are unable to continue on your tour or return to your home country as scheduled, you will be responsible for any expenses you may incur (ie. flight expenses, hotel accommodation, transportation, meals, sundry expenses and more). Please note, Origin Tours cannot and will not be responsible for any related expenses.
                            </p>
                        </div>
                    </div>

                    <!-- Tour Price Guarantee -->
                    <div>
                        <h4 class="text-xl font-bold mb-4 flex items-center">
                            <i class="fas fa-shield-alt mr-3 text-dark-orange"></i>
                            Tour Price Guarantee
                        </h4>
                        <p class="text-blue-100">
                            All prices in our brochure and website are quoted in U.S. dollars and are based on rates and costs in effect at the time of printing the brochure or posting on the website. Your tour price is guaranteed once we have received your full payment. Prior to full payment, it is important to note that there may be price changes due to fluctuations in any of the cost factors, such as exchange rate and government imposed surcharges that you will be responsible for. For the most up-to-date prices please check our website.
                        </p>
                    </div>

                    <!-- Departure Guarantee -->
                    <div>
                        <h4 class="text-xl font-bold mb-4 flex items-center">
                            <i class="fas fa-users mr-3 text-dark-orange"></i>
                            Departure Guarantee
                        </h4>
                        <p class="text-blue-100">
                            Departures are guaranteed with a minimum number of passengers as specified in the itinerary. Should the total number of passengers fall below the requirement numbers listed below, we reserve the right to cancel the tour, change the hotels, or change to locally hosted services.
                        </p>
                    </div>

                    <!-- Guided Tour Participation -->
                    <div>
                        <h4 class="text-xl font-bold mb-4 flex items-center">
                            <i class="fas fa-user-check mr-3 text-dark-orange"></i>
                            Guided Tour Participation and Conduct During the Tour:
                        </h4>
                        <div class="space-y-4 text-blue-100">
                            <p>
                                Children under 18 years of age must be accompanied by an adult, who will be responsible for their welfare and supervision. Origin Tours strives to offer a safe, enjoyable and unforgettable travel experience for all our guests. Origin Tours welcomes guests with special needs and disabilities. Please note the following:
                            </p>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <i class="fas fa-chevron-right text-dark-orange mt-1 mr-3"></i>
                                        <p>Guests must advise Origin Tours prior to departure of any physical medical or other special needs that require accommodating. We will make reasonable efforts to accommodate your needs, but you must notify us at the time of booking for a determination of what assistance we can reasonably provide.</p>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-chevron-right text-dark-orange mt-1 mr-3"></i>
                                    <p>Conduct During The Tour: You are responsible for following the directions of the Tour Guide and the laws of the countries visited while on Tour. Origin Tours reserves the right to decline to accept, or retain any person as tour participant, should such person's health, mental condition, physical infirmity or general deportment impede the operation of the tour or the rights, welfare or enjoyment of other tour participants. Should you decide for any reason not to participate in certain parts of the Tour or use certain goods included in the Tour, no refunds will be made for those unused parts of the Tour or goods. You agree to indemnify and hold us harmless from and against any costs, damages, losses or liabilities arising out of (a) the actions or omissions of any minors traveling with you and (b) if you are signing on behalf of yourself and your traveling companions, your companions' claims that you were not authorized to agree to this Participant Agreement on their behalf.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Conditions Grid -->
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <!-- Baggage -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-suitcase-rolling mr-3 text-dark-orange"></i>
                        Baggage
                    </h4>
                    <div class="text-gray-600 space-y-3">
                        <p>
                            Origin Tours assumes no liability for loss, delay and/or damage to baggage in transit to or from a Tour or while on Tour. All baggage and personal effects are, at all times and in all obtain baggage insurance. Baggage allowance varies by airline and is subject to change at any time; for up-to-date baggage allowance restrictions please check with the airline for the latest baggage policies prior to departure.
                        </p>
                        <p class="text-sm">
                            Please note that some airlines may impose additional charges for check-in baggage, hand baggage or excess baggage.
                        </p>
                        <div class="bg-orange-50 border-l-4 border-dark-orange p-4 rounded-r-lg mt-4">
                            <p class="text-sm font-medium text-gray-700">
                                Baggage allowance on overseas internal flights may vary from baggage allowance on international flights. Please be advised that you are responsible for paying for any checked baggage, hand baggage and/or excess baggage charges. Please ask us if you would like a list of your confirmed carriers for overseas internal flights prior to departure in order to check baggage restrictions. Every passenger is limited to one suitcase and one carry-on bag while on Tour. Additional charges will apply for excess luggage.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Deviation Charge -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-random mr-3 text-dark-orange"></i>
                        Deviation Charge
                    </h4>
                    <p class="text-gray-600">
                        Any deviation to your itinerary (early departure or late return) is subject to availability. In addition to any airline(s), hotel(s), relevant supplier's or transfer surcharge(s), you will be charged a fee of US$100 per person for any deviation from the tour.
                    </p>
                </div>

                <!-- Change and Name Correction -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-edit mr-3 text-dark-orange"></i>
                        Change and Name Correction Fees
                    </h4>
                    <div class="text-gray-600 space-y-3">
                        <p>
                            One change to your itinerary is allowed free of charge after your reservation is confirmed, subject to availability. Please note that the Classic Spain & Portugal tour is excluded; a change fee of $50 per person will be charged for the first change. $50 will be charged per person for each subsequent change. Once documents and/or tickets have been issued, changes are not permitted.
                        </p>
                        <p>
                            Name corrections may only be made to an existing traveler's name on a reservation. Name corrections are only applicable towards spelling corrections, name sequence corrections, or a legal name change. A name correction can not be used to change the name from one traveler to another.
                        </p>
                    </div>
                </div>

                <!-- Travel Documents -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-passport mr-3 text-dark-orange"></i>
                        Travel Documents / E-Tickets
                    </h4>
                    <p class="text-gray-600">
                        In general, all travel documents will be sent to you approximately 21 days prior to departure. Overnight delivery can be arranged at an additional cost. If we obtained an entry visa for you, the passport will be sent with the travel documents.
                    </p>
                </div>
            </div>

            <!-- Travel Insurance Section -->
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl shadow-xl p-8 md:p-10 mb-8 border border-green-200 animate-slide-up">
                <h3 class="text-2xl font-bold text-dark-blue mb-6 flex items-center">
                    <span class="w-1 h-8 bg-green-600 mr-3"></span>
                    Travel Insurance
                </h3>
                <div class="text-gray-700 space-y-4">
                    <p>
                        Travel insurance premiums cannot be refunded if your booking is canceled with any penalties or if you have made a travel insurance claim. If we have canceled the tour, the travel insurance premium cannot be refunded in full if it is outside of the "free look" period (10 days for the Nationwide Post Departure plan and 14 days for the STARR Cancellation Plan); however you may move the plan to a future travel date or you may be entitled to a pro rata refund of your premium.
                    </p>
                    <p>
                        Please refer to our <a href="#" class="text-dark-orange underline hover:text-orange-700">Post Departure Travel Protection Plan</a> page and our <a href="#" class="text-dark-orange underline hover:text-orange-700">Trip Cancellation Protection Plan</a> page for more information.
                    </p>
                </div>
            </div>

            <!-- Passport & Visa Requirements -->
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <!-- Passport -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-id-card mr-3 text-dark-orange"></i>
                        Passport
                    </h4>
                    <p class="text-gray-600">
                        All customers' passports must be valid for at least 6 months from the return date of your trip. Please consult your travel agent or Origin Tours if you have a non-US passport.
                    </p>
                </div>

                <!-- Entry Visas -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-stamp mr-3 text-dark-orange"></i>
                        Entry Visas
                    </h4>
                    <div class="text-gray-600 space-y-3">
                        <p>
                            It is the traveler's responsibility to obtain proper visas in a timely manner. For non-U.S. passport holders, please consult your travel agent or Origin Tours at least 2 months prior to your departure date. Please visit our <a href="#" class="text-dark-orange underline hover:text-orange-700">Visas & Passports</a> page to view visa requirements by country.
                        </p>
                        <p class="text-sm">
                            Visa fees are non-refundable and are subject to change at any time. Origin Tours is not responsible if you are denied entrance for any reason at any foreign country, even if you hold a valid passport and entry visa. Visa requirements may change at any time. Please check with the Embassy or Consulate of the country which you will be traveling to.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Late Booking & Children -->
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <!-- Late Booking -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-clock mr-3 text-dark-orange"></i>
                        Late Booking
                    </h4>
                    <p class="text-gray-600">
                        Bookings made less than 60 days prior to the departure are subject to availability and a surcharge of $50 per person. Full payment is required at the time of booking.
                    </p>
                </div>

                <!-- Charge for Children -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-child mr-3 text-dark-orange"></i>
                        Charge for Children
                    </h4>
                    <div class="text-gray-600 space-y-3">
                        <p>
                            Applicable for children 11 years old and under at time of travel. Children 12 years old and older at time of travel will be charged the regular adult price. Due to health and safety reasons, children under 12 years are not allowed on the tour RAF.
                        </p>
                        <div class="bg-light-gray rounded-xl p-4 space-y-3">
                            <div>
                                <h5 class="font-semibold text-dark-gray mb-2">International Airfare:</h5>
                                <p>100% of the regular adult airfare</p>
                            </div>
                            <div>
                                <h5 class="font-semibold text-dark-gray mb-2">Land Only Package Price:</h5>
                                <ul class="space-y-2 text-sm">
                                    <li>a) If the child shares the same room with two adults and does not require an extra bed, the cost is 80% (China / Europe / RAK) or 90% (RSA) of the regular adult price.</li>
                                    <li>b) If the child shares the same room with two adults but requires an extra bed, the cost is 90% (China) of the regular adult price.</li>
                                    <li>c) If the child shares the same room with one adult, the cost is 90% (China), or 100% (All other tours) of the regular adult price.</li>
                                </ul>
                            </div>
                            <p class="text-sm italic">
                                Exception: RIJ, RGE (No child fares are available).
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shopping & Privacy -->
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <!-- Shopping -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-shopping-bag mr-3 text-dark-orange"></i>
                        Shopping
                    </h4>
                    <p class="text-gray-600">
                        Origin Tours' tour managers and representatives are happy to assist you with any shopping requirements while on tour. Origin Tours does not take any responsibility for any items purchased at shops on the tour. You are strongly advised to observe U.S. customs restrictions when bringing home any goods from tour (for more information please visit <a href="https://www.cbp.gov/" target="_blank" class="text-dark-orange underline hover:text-orange-700">https://www.cbp.gov/</a>).
                    </p>
                </div>

                <!-- Privacy Policy -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                    <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                        <i class="fas fa-user-shield mr-3 text-dark-orange"></i>
                        Privacy Policy
                    </h4>
                    <p class="text-gray-600">
                        Origin Tours will not discuss or disclose any details of our client's personal or trip details with any third party other than the client's authorized agent, the airlines, hotels, land, cruise operators and any relevant third party suppliers.
                    </p>
                </div>
            </div>

            <!-- Errors and Omissions -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-3xl shadow-xl p-8 mb-8 animate-slide-up">
                <h4 class="text-xl font-bold text-dark-blue mb-4 flex items-center">
                    <i class="fas fa-exclamation-circle mr-3 text-yellow-600"></i>
                    Errors and Omissions:
                </h4>
                <p class="text-gray-700">
                    Although Origin Tours makes a concerted attempt to verify the accuracy of statements made herein, we are not responsible for any typographical or printing errors, omissions or unintentional misrepresentations made in this brochure or on the website.
                </p>
            </div>

            <!-- Chargeback Disputes -->
            <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-3xl shadow-xl p-8 md:p-10 mb-8 border border-red-200 animate-slide-up">
                <h3 class="text-2xl font-bold text-red-800 mb-6 flex items-center">
                    <span class="w-1 h-8 bg-red-600 mr-3"></span>
                    Chargeback Disputes
                </h3>
                <div class="text-gray-700 space-y-4">
                    <p>
                        While we do accept major credit cards including Visa and Mastercard, travelers must provide to us a click authorization for every transaction for your trip. Your authorization is an agreement for us to charge your card and an acknowledgment and agreement to these terms and conditions including the cancellation terms. As such you agree not to make any improper chargebacks.
                    </p>
                    <p>
                        In certain cases, you can dispute charges with credit card companies ("chargebacks"). Before initiating a chargeback, we ask you first to call us to discuss any questions or concerns about our charges. We will work with you in attempting to resolve your concerns. By using our service to make a reservation, you accept and agree to our cancellation policy. Origin Tours retains the right to dispute any chargeback that is improper and recover any costs, including attorney's fees related to improper chargebacks. Additionally, in the event of an improper chargeback, we retain the right to cancel any travel reservation related to that improper chargeback. The following chargeback scenarios are improper, and we retain the right to investigate and rebut any such chargeback claims:
                    </p>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-start">
                            <i class="fas fa-times text-red-500 mt-1 mr-3"></i>
                            <span>Chargebacks resulting from non-cancellable reservations, whether or not the reservation is used.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-times text-red-500 mt-1 mr-3"></i>
                            <span>Chargebacks resulting from charges authorized by family, friends, associates or other third parties with direct access to your credit card. This does not include credit card fraud.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-times text-red-500 mt-1 mr-3"></i>
                            <span>Chargebacks arising from inconsistency or inaccuracy with regard to the supplier's product description.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-times text-red-500 mt-1 mr-3"></i>
                            <span>Chargebacks resulting from force majeure or other circumstances that are beyond the control of Origin Tours.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-times text-red-500 mt-1 mr-3"></i>
                            <span>Chargebacks because you do not agree with the cancellation policy.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-times text-red-500 mt-1 mr-3"></i>
                            <span>Chargebacks resulting from dissatisfaction with any part of your tour and/or services received.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-times text-red-500 mt-1 mr-3"></i>
                            <span>Chargebacks resulting from confusion about a split charge payment.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Responsibility Section -->
            <div class="bg-gradient-to-br from-dark-blue to-blue-800 text-white rounded-3xl shadow-2xl p-8 md:p-10 mb-8 animate-slide-up">
                <h3 class="text-3xl font-bold mb-8 text-center">Responsibility</h3>
                
                <div class="space-y-6">
                    <!-- Complete Agreement -->
                    <div>
                        <h4 class="text-xl font-bold mb-4">Complete Agreement</h4>
                        <p class="text-blue-100">
                            These booking conditions, together with other terms incorporated into this contract referred to below, represent the entire agreement between the parties.
                        </p>
                    </div>

                    <!-- Changes -->
                    <div>
                        <h4 class="text-xl font-bold mb-4">Changes</h4>
                        <p class="text-blue-100">
                            Origin Tours shall be responsible to the guest for providing the services and accommodations described on this website, except where they are prevented from doing so by circumstances beyond its control e.g., Force Majeure, or other causes of whatever kind or nature including but not limited to acts or omissions of third parties such as airlines, cruise lines, railroads, hotels, shore excursion operators, or sightseeing operators, suppliers or any person rendering any of the services or accommodations being offered in connection with the tour; or any acts of God, acts of war or civil unrest; strikes; governmental restrictions; weather; construction; or any other reason beyond the control of Origin Tours.
                        </p>
                    </div>

                    <!-- Disclaimer of Liability -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <h4 class="text-xl font-bold mb-4 flex items-center">
                            <i class="fas fa-shield-alt mr-3 text-dark-orange"></i>
                            Disclaimer of Liability
                        </h4>
                        <p class="text-sm">
                            Neither Origin Tours, nor its operator, nor its agents, employees or affiliated entities, ("released parties") shall be responsible or liable for cancellations, acts of other service providers, diversions or substitutions of equipment or any act, variation or postponement, omission or default by air carriers, land carriers, hoteliers, or hotels, transportation companies, or any other persons providing services, accommodations to guests including any results thereof, such as changes in services, accommodations or facilities. Nor shall they be liable for loss or damage to baggage or property, or for injury, illness or death, or for any damages or claims whatsoever arising from loss, negligence or delay, from the act, error, omission, default, or negligence of any person not its direct employee or under its exclusive control, including any act, error or omission, default, or negligence, of any country, government, or governmental authority, officer or employee. The released parties shall not be liable for indirect, special or consequential damages.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Additional Risks -->
            <div class="bg-gradient-to-br from-yellow-50 to-amber-50 rounded-3xl shadow-xl p-8 md:p-10 mb-8 border border-yellow-200 animate-slide-up">
                <h3 class="text-2xl font-bold text-dark-blue mb-6 flex items-center">
                    <span class="w-1 h-8 bg-yellow-600 mr-3"></span>
                    Additional Risks
                </h3>
                <div class="text-gray-700 space-y-4">
                    <p>
                        Additional risks and dangers may arise including, but not limited to, hazards of traveling in undeveloped areas, hazards of travel by boat, train, automobile, aircraft and other means of conveyance, animal interactions, forces of nature, civil unrest, hazardous local customs and practices, differing levels of sanitation, differing health and safety standards, risks associated with water, food, plants, insects and differing wildlife regulation, accident and illness in areas lacking means of rapid evacuation or medical facilities. These risks do not form an exhaustive list but are examples of some of the many kinds of risk.
                    </p>
                    <div class="bg-yellow-100 border-l-4 border-yellow-600 p-4 rounded-r-lg">
                        <p class="font-medium">
                            You are voluntarily participating in these activities with the knowledge that there are significant dangers involved, and you hereby agree to accept any and all risks. As lawful consideration for the agreement with Origin Tours to participate in such guided tours and associated activities you agree you will not make a claim against Origin Tours, its related companies or personnel, or sue for bodily injury, emotional trauma, death, property loss or damage, or other loss, cost or expense, however caused, as a result of, or relating to your contracting for, traveling to or from, or in any and every other way participating in a guided tour. You release Origin Tours, its related companies and its personnel from any and all claims, known and unknown, arising from contracting for, traveling to and from and in any and every way participating in a guided tour. This release of liability and assumption of risk agreement is entered into on behalf of you and all members of your family and party, also including minors accompanying you. This agreement also binds your heirs, legal representatives and assigns.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Airfare Policy Tab -->
        <div id="airfare-tab" class="tab-content hidden">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-dark-gray mb-4">Origin Tours' Airfare Policy</h2>
                <div class="w-24 h-1 bg-dark-orange mx-auto"></div>
            </div>

            <!-- Important Notice -->
            <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-3xl shadow-xl p-8 mb-8 border border-red-200 animate-slide-up">
                <h3 class="text-2xl font-bold text-red-800 mb-4 flex items-center">
                    <i class="fas fa-exclamation-triangle mr-3"></i>
                    Important Airfare Information
                </h3>
                <ul class="space-y-4 text-gray-700">
                    <li class="flex items-start">
                        <i class="fas fa-plane text-dark-orange mt-1 mr-3"></i>
                        <p>All flights purchased through Origin Tours for travel originating in the United States are provided by air carriers who are independent operators and are not owned, managed or operated by Origin Tours. Your airline ticket is a contract between you and the air carrier only. By purchasing your air services through Origin Tours you agree to waive all liability to Origin Tours for such air services.</p>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-times-circle text-red-500 mt-1 mr-3"></i>
                        <p>Origin Tours is in no way responsible for airline cancellations, reschedules, or delays to a flight for any reason whatsoever. If you purchase air through Origin Tours, we will try to assist you in making new arrangements, providing you have not already checked in with your airline carrier for your first flight segment.</p>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                        <p>If you have already checked in you must liaise directly with your airline to reach your destination or to make any alternate arrangements including amendments to return services. Please be advised that airline fees will usually apply for modifications to air schedules not related to airline imposed flight cancellations, reschedules or delays. These fees will be payable to the airline directly at time of request. If you miss your departure flight or connection, it is your responsibility to work with the airline on which you are ticketed to reach your destination. No refunds will be provided by Origin Tours for portions of trips missed due to canceled, rescheduled or delayed flights after airport check-in, nor is Origin Tours responsible for any additional expenses you may incur prior to joining your trip if you miss your departure flight or flight connection</p>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-hotel text-purple-500 mt-1 mr-3"></i>
                        <p>For airline tickets purchased through Origin Tours, if any flight schedule requires an overnight stay in a gateway city, Origin Tours can assist you with hotel reservations; notwithstanding this, the cost of the overnight stay (including but not limited to hotel and meals) is at your expense. Air routings are subject to availability. Routings are not guaranteed and are subject to change at any time. If you make your own flight arrangements, Origin Tours will not be responsible for any loss resulting from cancellation or changes in international gateways, itineraries or travel dates. We strongly advise that you check the airline's terms & conditions regarding penalties for changes prior to purchasing airline tickets.</p>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-lock text-green-500 mt-1 mr-3"></i>
                        <p>Under the Secure Flight Program enacted by the U.S. Department of Homeland Security, the Transportation Security Administration (TSA) requires airlines to collect information from you for the purposes of watch list matching. TSA may share information you provide with law enforcement or intelligence agencies or others under its published system of records notice. At time of booking a vacation with air reservations, Origin Tours will collect the required information and add to your air booking to pass to the airline(s) for the Secure Flight Program. The information includes your full name (as it appears on photo ID used for travel), date of birth, gender and redress number (if available). Failure to provide the required TSA information at time of booking will result in the loss of confirmed flights and airfare price as this information is required for ticketing. Rebooking lost airfare is subject to schedule availability at time of rebooking and may result in alternate flight schedules and/or significant airfare price increases. You will be responsible for any airfare increases.</p>
                    </li>
                </ul>
            </div>

            <!-- Airline Tickets Section -->
            <div class="bg-white rounded-3xl shadow-xl p-8 mb-8 border border-gray-100 animate-slide-up">
                <h3 class="text-2xl font-bold text-dark-blue mb-6 flex items-center">
                    <span class="w-1 h-8 bg-dark-orange mr-3"></span>
                    Airline Tickets
                </h3>
                <p class="text-gray-600 text-lg">
                    Origin Tours reserves the right to issue airline tickets immediately upon receipt of your tour deposit.
                </p>
            </div>

            <!-- Certain Arrangements -->
            <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 animate-slide-up">
                <h3 class="text-2xl font-bold text-dark-blue mb-6 flex items-center">
                    <span class="w-1 h-8 bg-dark-orange mr-3"></span>
                    Certain Arrangements
                </h3>
                <p class="text-gray-600">
                    Please be aware that certain arrangements with third-party suppliers cannot be amended after they have been confirmed and any alteration may incur a cancellation charge to you of up to 100% of that part of the arrangements.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA Section -->
<section class="bg-gradient-to-r from-dark-blue to-blue-800 text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-dark-orange/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-white/10 rounded-full blur-3xl animate-float delay-1000"></div>
    </div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h3 class="text-4xl font-bold mb-4">Have Questions About Our Terms?</h3>
        <p class="text-xl text-blue-100 mb-8">Our team is here to help clarify any concerns</p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact-us') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-dark-orange to-orange-600 text-white font-semibold rounded-xl hover:from-orange-600 hover:to-dark-orange transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                <i class="fas fa-envelope mr-2"></i>
                Contact Support
            </a>
            <a href="{{ route('faq') }}" class="inline-flex items-center justify-center px-8 py-4 bg-white/10 backdrop-blur-sm border-2 border-white text-white font-semibold rounded-xl hover:bg-white hover:text-dark-blue transition-all duration-300 shadow-lg hover:shadow-xl">
                <i class="fas fa-question-circle mr-2"></i>
                View FAQ
            </a>
        </div>
    </div>
</section>

<!-- Back to Top Button -->
<button id="back-to-top" class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-r from-dark-orange to-orange-600 text-white rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 opacity-0 invisible flex items-center justify-center z-50">
    <i class="fas fa-chevron-up"></i>
</button>

<!-- Scripts -->
<script>
    // Tab functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetTab = this.getAttribute('data-tab');
                
                // Update active button
                tabButtons.forEach(btn => {
                    btn.classList.remove('bg-gradient-to-r', 'from-dark-blue', 'to-blue-700', 'text-white', 'border-dark-orange');
                    btn.classList.add('text-dark-gray', 'hover:text-dark-blue', 'border-transparent');
                });
                
                this.classList.remove('text-dark-gray', 'hover:text-dark-blue', 'border-transparent');
                this.classList.add('bg-gradient-to-r', 'from-dark-blue', 'to-blue-700', 'text-white', 'border-dark-orange');
                
                // Show/hide content
                tabContents.forEach(content => {
                    if (content.id === targetTab + '-tab') {
                        content.classList.remove('hidden');
                    } else {
                        content.classList.add('hidden');
                    }
                });
            });
        });
    });

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

    // Add smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
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
    
    /* Table hover effects */
    table tbody tr:hover {
        transform: translateX(5px);
        transition: transform 0.3s ease;
    }
    
    /* Sticky navigation */
    .sticky {
        position: sticky;
        top: 0;
        z-index: 40;
    }
    
    /* Tab button transitions */
    .tab-btn {
        position: relative;
        transition: all 0.3s ease;
    }
    
    .tab-btn::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 4px;
        background: #FF6B35;
        transition: width 0.3s ease;
    }
    
    .tab-btn:hover::after {
        width: 100%;
    }
    
    /* Card hover effects */
    .bg-white:hover {
        transform: translateY(-2px);
        transition: transform 0.3s ease;
    }
    
    /* Pulse animation */
    @keyframes pulse {
        0% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
        100% {
            opacity: 1;
        }
    }
    
    .animate-pulse {
        animation: pulse 2s infinite;
    }
</style>

</x-app-layout>
