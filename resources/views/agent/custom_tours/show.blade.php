@extends('layouts.agent')
@section('title', 'Review Custom Tour - ORIGIN Travels')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#F3F4F6] via-white to-[#F3F4F6] py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <!-- Enhanced Header -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between">
                <div>
                    <h2 class="text-4xl font-bold bg-gradient-to-r from-[#1E3A8A] to-[#FF6B35] bg-clip-text text-transparent">
                        Custom Tour Request
                    </h2>
                    <p class="text-gray-600 mt-2">Review and manage customer's tour request</p>
                </div>
                <div class="mt-4 sm:mt-0 flex gap-3">
                    <button onclick="window.print()" 
                            class="px-4 py-2 bg-white border-2 border-gray-300 text-[#374151] rounded-xl font-semibold hover:border-[#FF6B35] hover:text-[#FF6B35] transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-print mr-2"></i>Print
                    </button>
                    <a href="{{ route('agent.custom_tours.index') }}" 
                       class="px-4 py-2 bg-gradient-to-r from-[#374151] to-gray-700 text-white rounded-xl font-semibold hover:from-gray-700 hover:to-[#374151] transform hover:scale-105 transition-all duration-300 shadow-lg">
                        <i class="fas fa-arrow-left mr-2"></i>Back to List
                    </a>
                </div>
            </div>
        </div>

        <!-- Status Bar -->
        <div class="bg-gradient-to-r from-[#1E3A8A] to-blue-600 rounded-2xl shadow-lg p-6 text-white">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl p-3">
                        <i class="fas fa-info-circle text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-blue-100 text-sm">Request ID</p>
                        <p class="text-2xl font-bold">#{{ str_pad($customTour->id, 5, '0', STR_PAD_LEFT) }}</p>
                    </div>
                </div>
                <div class="mt-4 md:mt-0 flex items-center space-x-6">
                    <div class="text-center">
                        <p class="text-blue-100 text-sm">Submitted</p>
                        <p class="font-semibold">{{ $customTour->created_at->format('M d, Y') }}</p>
                    </div>
                    <div class="text-center">
                        <p class="text-blue-100 text-sm">Current Status</p>
                        <span class="inline-block mt-1 px-4 py-2 text-sm font-bold rounded-full
                            {{ $customTour->status === 'pending' ? 'bg-[#FF6B35] text-white' :
                               ($customTour->status === 'processing' ? 'bg-blue-500 text-white' :
                               ($customTour->status === 'completed' ? 'bg-green-500 text-white' : 'bg-gray-500 text-white')) }}">
                            <i class="fas fa-circle text-[6px] mr-2 animate-pulse"></i>
                            {{ ucfirst($customTour->status ?? 'pending') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column - Customer & Trip Details -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Customer Information -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white rounded-xl p-3 mr-4">
                            <i class="fas fa-user text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-[#374151]">Customer Information</h3>
                            <p class="text-gray-500 text-sm">Contact details and preferences</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label class="text-xs text-gray-500 uppercase tracking-wide">Full Name</label>
                                <p class="text-lg font-semibold text-[#374151] mt-1">{{ $customTour->name }}</p>
                            </div>
                            <div>
                                <label class="text-xs text-gray-500 uppercase tracking-wide">Email Address</label>
                                <p class="text-[#1E3A8A] mt-1 flex items-center">
                                    <i class="fas fa-envelope text-[#FF6B35] mr-2"></i>
                                    <a href="mailto:{{ $customTour->email }}" class="hover:underline">{{ $customTour->email }}</a>
                                </p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="text-xs text-gray-500 uppercase tracking-wide">Phone Number</label>
                                <p class="text-[#374151] mt-1 flex items-center">
                                    <i class="fas fa-phone text-green-500 mr-2"></i>
                                    {{ $customTour->phone ?? 'Not provided' }}
                                </p>
                            </div>
                            <div>
                                <label class="text-xs text-gray-500 uppercase tracking-wide">Preferred Contact</label>
                                <p class="text-[#374151] mt-1">
                                    <span class="px-3 py-1 bg-[#F3F4F6] rounded-full text-sm">
                                        <i class="fas fa-clock text-[#FF6B35] mr-1"></i>
                                        {{ $customTour->preferred_contact_time ?? 'Any time' }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trip Details -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white rounded-xl p-3 mr-4">
                            <i class="fas fa-plane text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-[#374151]">Trip Details</h3>
                            <p class="text-gray-500 text-sm">Travel requirements and preferences</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label class="text-xs text-gray-500 uppercase tracking-wide flex items-center">
                                    <i class="fas fa-map-marker-alt text-[#FF6B35] mr-2"></i>Destination
                                </label>
                                <p class="text-lg font-semibold text-[#374151] mt-1">{{ $customTour->destination ?? 'Not specified' }}</p>
                            </div>
                            <div>
                                <label class="text-xs text-gray-500 uppercase tracking-wide flex items-center">
                                    <i class="fas fa-calendar text-[#1E3A8A] mr-2"></i>Travel Dates
                                </label>
                                <p class="text-[#374151] mt-1 font-medium">{{ $customTour->travel_dates ?? 'Flexible' }}</p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="text-xs text-gray-500 uppercase tracking-wide flex items-center">
                                    <i class="fas fa-users text-purple-500 mr-2"></i>Number of Travelers
                                </label>
                                <p class="text-lg font-semibold text-[#374151] mt-1">{{ $customTour->travelers_count ?? '0' }} person(s)</p>
                            </div>
                            <div>
                                <label class="text-xs text-gray-500 uppercase tracking-wide flex items-center">
                                    <i class="fas fa-dollar-sign text-green-500 mr-2"></i>Budget Range
                                </label>
                                <p class="text-lg font-semibold text-green-600 mt-1">{{ $customTour->budget ?? 'Not specified' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Message -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-xl p-3 mr-4">
                            <i class="fas fa-comment-dots text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-[#374151]">Customer Message</h3>
                            <p class="text-gray-500 text-sm">Special requests and additional information</p>
                        </div>
                    </div>
                    
                    <div class="p-6 bg-gradient-to-br from-[#F3F4F6] to-white rounded-xl border-l-4 border-[#FF6B35]">
                        <i class="fas fa-quote-left text-[#FF6B35]/20 text-2xl mb-3"></i>
                        <p class="text-[#374151] leading-relaxed whitespace-pre-wrap">{{ $customTour->message ?? 'No additional message provided.' }}</p>
                        <i class="fas fa-quote-right text-[#FF6B35]/20 text-2xl mt-3 float-right"></i>
                    </div>
                </div>
            </div>

            <!-- Right Column - Actions -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-gradient-to-br from-[#374151] to-gray-700 rounded-2xl shadow-xl p-6 text-white">
                    <h4 class="font-bold text-lg mb-4 flex items-center">
                        <i class="fas fa-bolt text-yellow-400 mr-2"></i>
                        Quick Actions
                    </h4>
                    <div class="space-y-3">
                        <button onclick="callCustomer('{{ $customTour->phone }}')" 
                                class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white/20 transition-all duration-300 text-left flex items-center justify-between group">
                            <span><i class="fas fa-phone mr-2"></i>Call Customer</span>
                            <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        </button>
                    </div>
                </div>

                <!-- Update Status -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white rounded-lg p-2 mr-3">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <h4 class="font-bold text-[#374151] text-lg">Update Status</h4>
                    </div>
                    
                    <form method="POST" action="{{ route('agent.custom_tours.status', $customTour) }}">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-4">
                            <select name="status" 
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                                @foreach(['pending','processing','completed','cancelled'] as $st)
                                    <option value="{{ $st }}" 
                                            {{ (old('status', $customTour->status) === $st) ? 'selected' : '' }}
                                            class="py-2">
                                        @if($st === 'pending')
                                             {{ ucfirst($st) }}
                                        @elseif($st === 'processing')
                                             {{ ucfirst($st) }}
                                        @elseif($st === 'completed')
                                             {{ ucfirst($st) }}
                                        @else
                                             {{ ucfirst($st) }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                            
                            <div>
                                <label class="text-xs text-gray-500 uppercase tracking-wide">Internal Note (Optional)</label>
                                <textarea name="status_note" 
                                          rows="2" 
                                          class="w-full mt-1 px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] text-sm"
                                          placeholder="Add a note about this status change..."></textarea>
                            </div>
                            
                            <button type="submit" 
                                    class="w-full px-6 py-3 bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white rounded-xl font-semibold hover:from-blue-600 hover:to-[#1E3A8A] transform hover:scale-105 transition-all duration-300 shadow-lg">
                                <i class="fas fa-save mr-2"></i>Update Status
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Send Email -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white rounded-lg p-2 mr-3">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4 class="font-bold text-[#374151] text-lg">Email Customer</h4>
                    </div>
                    
                    <form method="POST" action="{{ route('agent.custom_tours.email', $customTour) }}">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="text-xs text-gray-500 uppercase tracking-wide">Email Template</label>
                                <select onchange="updateEmailTemplate(this.value)" 
                                        class="w-full mt-1 px-4 py-2 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] text-sm">
                                    <option value="">Custom Message</option>
                                    <option value="processing">Processing Notification</option>
                                    <option value="quote">Quote Ready</option>
                                    <option value="followup">Follow Up</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="text-xs text-gray-500 uppercase tracking-wide">Subject</label>
                                <input name="subject" 
                                       id="email-subject"
                                       class="w-full mt-1 px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35]"
                                       value="{{ old('subject', 'Update on Your Custom Tour Request') }}"
                                       required>
                            </div>

                            <div>
                                <label class="text-xs text-gray-500 uppercase tracking-wide">Message</label>
                                <textarea name="message" 
                                          id="email-message"
                                          rows="6" 
                                          class="w-full mt-1 px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35]"
                                          placeholder="Dear {{ $customTour->name }}..."
                                          required>{{ old('message', "Dear {$customTour->name},\n\nThank you for your custom tour request to {$customTour->destination}. We're excited to help you plan your perfect trip!\n\nOur travel specialist is reviewing your requirements and will contact you shortly with personalized recommendations.\n\nBest regards,\nORIGIN Travels Team") }}</textarea>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="checkbox" name="send_copy" id="send_copy" class="mr-2 rounded text-[#FF6B35] focus:ring-[#FF6B35]">
                                <label for="send_copy" class="text-sm text-gray-600">Send me a copy</label>
                            </div>

                            <button type="submit" 
                                    class="w-full px-6 py-3 bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white rounded-xl font-semibold hover:from-orange-600 hover:to-[#FF6B35] transform hover:scale-105 transition-all duration-300 shadow-lg">
                                <i class="fas fa-paper-plane mr-2"></i>Send Email
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Activity Log -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-lg p-2 mr-3">
                            <i class="fas fa-history"></i>
                        </div>
                        <h4 class="font-bold text-[#374151] text-lg">Activity Log</h4>
                    </div>
                    
                    <div class="space-y-3 max-h-64 overflow-y-auto">
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-600">Request submitted</p>
                                <p class="text-xs text-gray-400">{{ $customTour->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @if($customTour->status === 'processing')
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-600">Status changed to processing</p>
                                    <p class="text-xs text-gray-400">{{ $customTour->updated_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @endif
                        @if($customTour->status === 'completed')
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-600">Request completed</p>
                                    <p class="text-xs text-gray-400">{{ $customTour->updated_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function updateEmailTemplate(template) {
        const subjectInput = document.getElementById('email-subject');
        const messageInput = document.getElementById('email-message');
        const customerName = "{{ $customTour->name }}";
        const destination = "{{ $customTour->destination }}";
        
        switch(template) {
            case 'processing':
                subjectInput.value = 'We\'re Processing Your Custom Tour Request';
                messageInput.value = `Dear ${customerName},\n\nGreat news! We've started processing your custom tour request to ${destination}.\n\nOur travel specialists are working on creating the perfect itinerary based on your preferences. You can expect to hear from us within 24-48 hours with a detailed proposal.\n\nBest regards,\nORIGIN Travels Team`;
                break;
            case 'quote':
                subjectInput.value = 'Your Custom Tour Quote is Ready!';
                messageInput.value = `Dear ${customerName},\n\nYour personalized tour package to ${destination} is ready!\n\nWe've carefully crafted an itinerary that matches your preferences and budget. Please find the detailed quote attached.\n\nWe're excited to make your travel dreams come true!\n\nBest regards,\nORIGIN Travels Team`;
                break;
            case 'followup':
                subjectInput.value = 'Following Up on Your Tour Request';
                messageInput.value = `Dear ${customerName},\n\nWe wanted to follow up on your custom tour request to ${destination}.\n\nIf you have any questions or would like to make any changes to your requirements, please don't hesitate to let us know.\n\nWe're here to help!\n\nBest regards,\nORIGIN Travels Team`;
                break;
        }
    }

    function callCustomer(phone) {
        if(phone) {
            window.location.href = 'tel:' + phone;
        } else {
            alert('No phone number provided');
        }
    }

    function createQuote() {
        // Implement quote creation logic
        alert('Opening quote creation form...');
    }

    function addNote() {
        // Implement note addition logic
        alert('Opening note form...');
    }

    // Show success/error messages
    @if(session('success'))
        showNotification('{{ session('success') }}', 'success');
    @endif
    
    @if(session('error'))
        showNotification('{{ session('error') }}', 'error');
    @endif

    function showNotification(message, type = 'info') {
        const colors = {
            'success': 'from-green-500 to-emerald-600',
            'error': 'from-red-500 to-red-600',
            'info': 'from-blue-500 to-blue-600'
        };

        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-6 py-4 bg-gradient-to-r ${colors[type]} text-white rounded-xl shadow-2xl transform translate-x-full transition-transform duration-300`;
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-${type === 'success' ? 'check' : 'exclamation'}-circle mr-3 text-xl"></i>
                <span class="font-semibold">${message}</span>
            </div>
        `;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);

        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }
</script>

<style>
    @media print {
        .no-print {
            display: none !important;
        }
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }
    
    ::-webkit-scrollbar-track {
        background: #F3F4F6;
        border-radius: 3px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #FF6B35;
        border-radius: 3px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: #e55a2b;
    }
</style>
@endpush
@endsection