@extends('layouts.admin')

@section('title', 'Booking Details #'.$booking->id.' - ORIGIN Travels Admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#F3F4F6] via-white to-[#F3F4F6]">
    <div class="max-w-5xl mx-auto p-6 space-y-6">
        
        <!-- Header Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-[#1E3A8A] to-[#FF6B35] bg-clip-text text-transparent">
                        Booking #{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}
                    </h1>
                    <p class="text-gray-600 mt-2">View and manage booking details</p>
                </div>
                <div class="mt-4 sm:mt-0 flex gap-3">
                    <a href="{{ route('admin.bookings.index') }}" 
                       class="px-5 py-3 bg-white border-2 border-gray-300 text-[#374151] rounded-xl font-semibold hover:border-[#374151] hover:bg-[#F3F4F6] transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>Back to List
                    </a>
                    <button onclick="window.print()" 
                            class="px-5 py-3 bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white rounded-xl font-semibold hover:from-blue-600 hover:to-[#1E3A8A] transform hover:scale-105 transition-all duration-300 shadow-lg">
                        <i class="fas fa-print mr-2"></i>Print
                    </button>
                </div>
            </div>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="bg-green-50 border-2 border-green-200 rounded-xl p-4 shadow-lg animate-fade-in">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-green-800 font-semibold">Success!</p>
                        <p class="text-green-700 text-sm mt-1">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border-2 border-red-200 rounded-xl p-4 shadow-lg animate-fade-in">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-red-800 font-semibold">Error!</p>
                        <p class="text-red-700 text-sm mt-1">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-amber-50 border-2 border-amber-200 rounded-xl p-4 shadow-lg animate-fade-in">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-amber-500 text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-amber-800 font-semibold">Please fix the following errors:</p>
                        <ul class="list-disc ml-5 mt-2 text-amber-700 text-sm space-y-1">
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column - Booking Details -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Package Information -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white rounded-xl p-3 mr-4">
                            <i class="fas fa-suitcase text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-[#374151]">Package Details</h2>
                    </div>
                    
                    <div class="bg-gradient-to-br from-[#F3F4F6] to-white rounded-xl p-5 border border-gray-200">
                        <div class="flex items-start gap-4">
                            @if($booking->package->image_url)
                                <img src="{{ $booking->package->image_url }}" 
                                     alt="{{ $booking->package->title }}" 
                                     class="w-24 h-24 rounded-xl object-cover shadow-lg">
                            @else
                                <div class="w-24 h-24 bg-gradient-to-br from-[#1E3A8A] to-[#FF6B35] rounded-xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-map-marked-alt text-white text-2xl"></i>
                                </div>
                            @endif
                            
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-[#1E3A8A] mb-2">{{ $booking->package->title ?? '—' }}</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                                    <div>
                                        <span class="text-gray-500">Location:</span>
                                        <span class="font-semibold text-[#374151] ml-2">{{ $booking->package->location ?? $booking->package->country }}</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-500">Duration:</span>
                                        <span class="font-semibold text-[#374151] ml-2">{{ $booking->package->duration ?? 'N/A' }}</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-500">Price/Person:</span>
                                        <span class="font-semibold text-[#FF6B35] ml-2">${{ number_format($booking->package->price, 2) }}</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-500">Package Type:</span>
                                        <span class="font-semibold text-[#374151] ml-2">{{ $booking->pricing_mode === 'land_air' ? 'Land + Air' : 'Land Only' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Information -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white rounded-xl p-3 mr-4">
                            <i class="fas fa-user text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-[#374151]">Customer Information</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-xs text-gray-500 uppercase tracking-wide">Full Name</label>
                            <p class="text-lg font-semibold text-[#374151] mt-1">{{ $booking->customer_name }}</p>
                        </div>
                        <div>
                            <label class="text-xs text-gray-500 uppercase tracking-wide">Email Address</label>
                            <p class="text-[#1E3A8A] mt-1">
                                <i class="fas fa-envelope text-[#FF6B35] mr-2"></i>
                                <a href="mailto:{{ $booking->customer_email }}" class="hover:underline">{{ $booking->customer_email }}</a>
                            </p>
                        </div>
                        <div>
                            <label class="text-xs text-gray-500 uppercase tracking-wide">Phone Number</label>
                            <p class="text-[#374151] mt-1">
                                @if(!empty($booking->customer_phone))
                                    <i class="fas fa-phone text-green-500 mr-2"></i>
                                    <a href="tel:{{ $booking->customer_phone }}" class="hover:underline">{{ $booking->customer_phone }}</a>
                                @else
                                    <span class="text-gray-400">Not provided</span>
                                @endif
                            </p>
                        </div>
                        <div>
                            <label class="text-xs text-gray-500 uppercase tracking-wide">Booking Date</label>
                            <p class="text-[#374151] mt-1">
                                <i class="fas fa-calendar text-purple-500 mr-2"></i>
                                {{ $booking->created_at->format('M d, Y H:i A') }}
                            </p>
                        </div>
                        <div>
                            <label class="text-xs text-gray-500 uppercase tracking-wide">Number of Travelers</label>
                            <p class="text-lg font-bold text-[#FF6B35] mt-1">{{ $booking->travelers }} {{ Str::plural('Person', $booking->travelers) }}</p>
                        </div>
                        <div>
                            <label class="text-xs text-gray-500 uppercase tracking-wide">Number of Rooms</label>
                            <p class="text-lg font-bold text-[#374151] mt-1">{{ $booking->rooms ?? 1 }} {{ Str::plural('Room', $booking->rooms ?? 1) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Agent Assignment (if admin_status is not approved) -->
                @if($booking->admin_status !== \App\Models\Booking::ADMIN_APPROVED)
                    <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                        <form action="{{ route('admin.bookings.approve', $booking) }}" method="POST">
                            @csrf
                            <div class="flex items-center mb-6">
                                <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl p-3 mr-4">
                                    <i class="fas fa-check-circle text-xl"></i>
                                </div>
                                <h2 class="text-2xl font-bold text-[#374151]">Approve & Assign</h2>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-[#374151] mb-2">
                                        <i class="fas fa-user-tie text-[#1E3A8A] mr-2"></i>Assign to Agent (Optional)
                                    </label>
                                    <select name="agent_id" 
                                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                                        <option value="">— No assignment —</option>
                                        @foreach($agents as $agent)
                                            <option value="{{ $agent->id }}" @selected($booking->agent_id == $agent->id)>
                                                {{ $agent->name }} ({{ $agent->email }}{{ !empty($agent->phone) ? ' • '.$agent->phone : '' }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-[#374151] mb-2">
                                        <i class="fas fa-sticky-note text-[#FF6B35] mr-2"></i>Admin Notes (Optional)
                                    </label>
                                    <textarea name="admin_notes" 
                                              rows="4" 
                                              class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300"
                                              placeholder="Add any notes or instructions for this booking...">{{ old('admin_notes', $booking->admin_notes) }}</textarea>
                                </div>

                                <div class="flex gap-3">
                                    <button type="submit" 
                                            class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl font-semibold hover:from-emerald-600 hover:to-green-500 transform hover:scale-105 transition-all duration-300 shadow-lg">
                                        <i class="fas fa-check mr-2"></i>Approve Booking
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>

            <!-- Right Column - Status & Actions -->
            <div class="space-y-6">
                <!-- Status Card -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <h3 class="text-lg font-bold text-[#374151] mb-4">Booking Status</h3>
                    
                    <div class="space-y-4">
                        <!-- Payment Status -->
                        <div>
                            <label class="text-xs text-gray-500 uppercase tracking-wide">Payment Status</label>
                            <div class="mt-2">
                                @if($booking->payment_status === 'succeeded')
                                    <span class="px-4 py-2 inline-flex text-sm font-bold rounded-full bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-2"></i>Paid
                                    </span>
                                @elseif($booking->payment_status === 'pending')
                                    <span class="px-4 py-2 inline-flex text-sm font-bold rounded-full bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-clock mr-2"></i>Pending
                                    </span>
                                @else
                                    <span class="px-4 py-2 inline-flex text-sm font-bold rounded-full bg-red-100 text-red-800">
                                        <i class="fas fa-times-circle mr-2"></i>Failed
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Admin Status -->
                        <div>
                            <label class="text-xs text-gray-500 uppercase tracking-wide">Admin Status</label>
                            <div class="mt-2">
                                @if($booking->admin_status === 'approved')
                                    <span class="px-4 py-2 inline-flex text-sm font-bold rounded-full bg-gradient-to-r from-green-500 to-emerald-600 text-white">
                                        Approved
                                    </span>
                                @elseif($booking->admin_status === 'new')
                                    <span class="px-4 py-2 inline-flex text-sm font-bold rounded-full bg-gradient-to-r from-yellow-500 to-amber-600 text-white">
                                        New
                                    </span>
                                @elseif($booking->admin_status === 'rejected')
                                    <span class="px-4 py-2 inline-flex text-sm font-bold rounded-full bg-gradient-to-r from-red-500 to-rose-600 text-white">
                                        Rejected
                                    </span>
                                @else
                                    <span class="px-4 py-2 inline-flex text-sm font-bold rounded-full bg-gray-100 text-gray-800">
                                        {{ ucfirst($booking->admin_status) }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Total Amount -->
                        <div>
                            <label class="text-xs text-gray-500 uppercase tracking-wide">Total Amount</label>
                            <p class="text-3xl font-bold text-[#FF6B35] mt-2">{{ $booking->total_formatted }}</p>
                        </div>
                    </div>
                </div>

                <!-- Agent Information -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <h3 class="text-lg font-bold text-[#374151] mb-4">Agent Information</h3>
                    
                    @if($booking->agent)
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-br from-[#1E3A8A] to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    {{ strtoupper(substr($booking->agent->name, 0, 1)) }}
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="font-semibold text-[#374151]">{{ $booking->agent->name }}</p>
                                <p class="text-sm text-gray-500">{{ $booking->agent->email }}</p>
                                @if($booking->agent->phone)
                                    <p class="text-sm text-gray-500">{{ $booking->agent->phone }}</p>
                                @endif
                            </div>
                        </div>
                    @else
                        <p class="text-gray-400">No agent assigned</p>
                    @endif
                </div>

                <!-- Quick Actions -->
                <div class="bg-gradient-to-br from-[#374151] to-gray-700 rounded-2xl shadow-xl p-6 text-white">
                    <h3 class="text-lg font-bold mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        @if($booking->admin_status !== \App\Models\Booking::ADMIN_REJECTED)
                            <form action="{{ route('admin.bookings.reject', $booking) }}" method="POST">
                                @csrf
                                <button type="submit" 
                                        onclick="return confirm('Are you sure you want to reject this booking?')"
                                        class="w-full px-4 py-3 bg-red-500/20 backdrop-blur-sm rounded-xl hover:bg-red-500/30 transition-all duration-300 text-left flex items-center justify-between group">
                                    <span><i class="fas fa-times-circle mr-2"></i>Reject Booking</span>
                                    <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                </button>
                            </form>
                        @endif
                        
                        <button class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white/20 transition-all duration-300 text-left flex items-center justify-between group">
                            <span><i class="fas fa-envelope mr-2"></i>Send Email</span>
                            <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        </button>
                        
                        <button class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white/20 transition-all duration-300 text-left flex items-center justify-between group">
                            <span><i class="fas fa-file-invoice mr-2"></i>View Invoice</span>
                            <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in {
        animation: fade-in 0.3s ease-out;
    }
</style>
@endpush
@endsection