@extends('layouts.agent')

@section('title', 'My Bookings - ORIGIN Travels')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#F3F4F6] via-white to-[#F3F4F6]">
    <div class="max-w-7xl mx-auto p-6">
        <!-- Header Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 mb-6">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                <div>
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-[#1E3A8A] to-[#FF6B35] bg-clip-text text-transparent">
                        My Assigned Bookings
                    </h1>
                    <p class="text-gray-600 mt-2">Manage and track your assigned customer bookings</p>
                    <div class="flex items-center gap-4 mt-3">
                        <span class="text-sm text-gray-500">
                            <i class="fas fa-calendar-alt text-[#FF6B35] mr-2"></i>
                            {{ now()->format('l, F j, Y') }}
                        </span>
                        <span class="text-sm text-gray-500">
                            <i class="fas fa-user-tie text-[#1E3A8A] mr-2"></i>
                            Agent: {{ auth()->user()->name }}
                        </span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-3">
                    <button class="px-5 py-3 bg-white border-2 border-gray-300 text-[#374151] rounded-xl font-semibold hover:border-[#FF6B35] hover:text-[#FF6B35] transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-filter mr-2"></i>Filter
                    </button>
                    <button class="px-5 py-3 bg-white border-2 border-gray-300 text-[#374151] rounded-xl font-semibold hover:border-[#1E3A8A] hover:text-[#1E3A8A] transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-download mr-2"></i>Export
                    </button>
                    <button class="px-5 py-3 bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white rounded-xl font-semibold hover:from-orange-600 hover:to-[#FF6B35] transform hover:scale-105 transition-all duration-300 shadow-lg">
                        <i class="fas fa-sync-alt mr-2"></i>Refresh
                    </button>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-6">
            <!-- Total Bookings -->
            <div class="bg-white rounded-xl shadow-lg p-5 border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide">Total Bookings</p>
                        <p class="text-2xl font-bold text-[#374151] mt-1">{{ $bookings->total() }}</p>
                        <p class="text-xs text-gray-400 mt-1">All time</p>
                    </div>
                    <div class="bg-gradient-to-br from-[#1E3A8A] to-blue-600 rounded-xl p-3 text-white group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-clipboard-list text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Pending Payment -->
            <div class="bg-white rounded-xl shadow-lg p-5 border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide">Pending</p>
                        <p class="text-2xl font-bold text-yellow-600 mt-1">
                            {{ $bookings->where('payment_status', 'pending')->count() }}
                        </p>
                        <p class="text-xs text-gray-400 mt-1">Payment pending</p>
                    </div>
                    <div class="bg-gradient-to-br from-yellow-500 to-amber-600 rounded-xl p-3 text-white group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-clock text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Paid -->
            <div class="bg-white rounded-xl shadow-lg p-5 border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide">Paid</p>
                        <p class="text-2xl font-bold text-green-600 mt-1">
                            {{ $bookings->where('payment_status', 'paid')->count() }}
                        </p>
                        <p class="text-xs text-gray-400 mt-1">Confirmed</p>
                    </div>
                    <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl p-3 text-white group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- This Month -->
            <div class="bg-white rounded-xl shadow-lg p-5 border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide">This Month</p>
                        <p class="text-2xl font-bold text-[#FF6B35] mt-1">
                            {{ $bookings->filter(function($b) {
                                return $b->created_at->isCurrentMonth();
                            })->count() }}
                        </p>
                        <p class="text-xs text-gray-400 mt-1">New bookings</p>
                    </div>
                    <div class="bg-gradient-to-br from-[#FF6B35] to-orange-600 rounded-xl p-3 text-white group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-calendar-check text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filter Bar -->
        <div class="bg-white rounded-2xl shadow-lg p-4 mb-6 border border-gray-100">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" 
                               placeholder="Search by customer name, email, or package..." 
                               class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
                <select class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300 cursor-pointer">
                    <option>All Status</option>
                    <option>Paid</option>
                    <option>Pending</option>
                    <option>Failed</option>
                </select>
                <input type="date" 
                       class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                <button class="px-6 py-3 bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white rounded-xl font-semibold hover:from-blue-600 hover:to-[#1E3A8A] transform hover:scale-105 transition-all duration-300 shadow-lg">
                    <i class="fas fa-search mr-2"></i>Search
                </button>
            </div>
        </div>

        <!-- Bookings Table -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-[#1E3A8A] to-[#FF6B35]">
                            <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                                <input type="checkbox" class="rounded text-white focus:ring-white">
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Booking ID</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Package</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Customer</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">Departure</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">Travelers</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">Total</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">Payment</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($bookings as $b)
                            <tr class="hover:bg-gradient-to-r hover:from-[#F3F4F6] hover:to-white transition-all duration-300 group">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="checkbox" class="rounded text-[#FF6B35] focus:ring-[#FF6B35]">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm font-bold text-[#1E3A8A]">#{{ str_pad($b->id, 6, '0', STR_PAD_LEFT) }}</span>
                                    <div class="text-xs text-gray-500 mt-1">
                                        {{ $b->created_at->format('M d, Y') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-12 w-12">
                                            @if($b->package->image_url)
                                                <img class="h-12 w-12 rounded-lg object-cover shadow-md" 
                                                     src="{{ $b->package->image_url }}" 
                                                     alt="{{ $b->package->title }}">
                                            @else
                                                <div class="h-12 w-12 rounded-lg bg-gradient-to-br from-[#1E3A8A] to-[#FF6B35] flex items-center justify-center text-white shadow-md">
                                                    <i class="fas fa-map-marked-alt"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-[#374151] group-hover:text-[#FF6B35] transition-colors duration-300">
                                                {{ Str::limit($b->package->title ?? '—', 35) }}
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                <i class="fas fa-map-marker-alt text-[#FF6B35] mr-1"></i>
                                                {{ $b->package->location ?? $b->package->country }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-[#374151]">{{ $b->customer_name }}</div>
                                    <div class="text-xs text-gray-500 mt-1">
                                        <i class="fas fa-envelope text-[#1E3A8A] mr-1"></i>
                                        {{ $b->customer_email }}
                                    </div>
                                    @if(!empty($b->customer_phone))
                                        <div class="text-xs text-gray-500 mt-1">
                                            <i class="fas fa-phone text-green-500 mr-1"></i>
                                            {{ $b->customer_phone }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    @if($b->departure_date)
                                        <div class="text-sm font-semibold text-[#374151]">
                                            {{ $b->departure_date->format('M d, Y') }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $b->departure_date->format('l') }}
                                        </div>
                                    @else
                                        <span class="px-3 py-1 inline-flex text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                            TBD
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <span class="text-lg font-bold text-[#FF6B35]">{{ $b->travelers ?? 1 }}</span>
                                    <div class="text-xs text-gray-500">
                                        {{ Str::plural('person', $b->travelers ?? 1) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <span class="text-lg font-bold text-[#1E3A8A]">{{ $b->total_formatted }}</span>
                                    <div class="text-xs text-gray-500">
                                        {{ $b->pricing_mode === 'land_air' ? 'Land + Air' : 'Land Only' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    @if($b->payment_status === 'succeeded')
                                        <span class="px-3 py-1.5 inline-flex items-center text-xs font-bold rounded-full bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-1"></i>Paid
                                        </span>
                                    @elseif($b->payment_status === 'pending')
                                        <span class="px-3 py-1.5 inline-flex items-center text-xs font-bold rounded-full bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-clock mr-1"></i>Pending
                                        </span>
                                    @else
                                        <span class="px-3 py-1.5 inline-flex items-center text-xs font-bold rounded-full bg-red-100 text-red-800">
                                            <i class="fas fa-times-circle mr-1"></i>Failed
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="px-3 py-1.5 bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white rounded-lg text-xs font-semibold hover:from-blue-600 hover:to-[#1E3A8A] transform hover:scale-105 transition-all duration-300 shadow-md">
                                            <i class="fas fa-eye mr-1"></i>View
                                        </button>
                                        <button class="p-1.5 text-gray-600 hover:text-[#FF6B35] transition-colors duration-300">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <button class="p-1.5 text-gray-600 hover:text-green-600 transition-colors duration-300">
                                            <i class="fas fa-phone"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="bg-gradient-to-br from-[#F3F4F6] to-white rounded-full p-8 mb-4">
                                            <i class="fas fa-inbox text-5xl text-gray-400"></i>
                                        </div>
                                        <p class="text-xl font-semibold text-gray-500 mb-2">No Bookings Yet</p>
                                        <p class="text-gray-400 text-sm">You haven't been assigned any bookings.</p>
                                        <p class="text-gray-400 text-sm">New bookings will appear here once assigned to you.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6 bg-white rounded-2xl shadow-lg p-4 border border-gray-100">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-sm text-gray-600">
                    Showing 
                    <span class="font-bold text-[#374151]">{{ $bookings->firstItem() ?? 0 }}</span> 
                    to 
                    <span class="font-bold text-[#374151]">{{ $bookings->lastItem() ?? 0 }}</span> 
                    of 
                    <span class="font-bold text-[#374151]">{{ $bookings->total() }}</span> 
                    bookings
                </div>
                <div>
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Select all checkboxes functionality
    document.querySelector('thead input[type="checkbox"]')?.addEventListener('change', function(e) {
        const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = e.target.checked;
        });
    });

    // Add click to row functionality
    document.querySelectorAll('tbody tr').forEach(row => {
        row.style.cursor = 'pointer';
        row.addEventListener('click', function(e) {
            if (!e.target.closest('input, button, a')) {
                const viewBtn = this.querySelector('button');
                if (viewBtn) {
                    viewBtn.click();
                }
            }
        });
    });

    // Auto-refresh every 30 seconds
    setTimeout(function() {
        location.reload();
    }, 30000);
</script>
@endpush
@endsection