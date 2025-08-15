@extends('layouts.agent')
@section('title', 'Dashboard - ORIGIN Travels')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#F3F4F6] via-white to-[#F3F4F6]">
    <div class="p-6 space-y-6">
        <!-- Enhanced Header Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4">
                <div>
                    <h2 class="text-4xl font-bold bg-gradient-to-r from-[#1E3A8A] to-[#FF6B35] bg-clip-text text-transparent">
                        Agent Dashboard
                    </h2>
                    <p class="text-gray-600 mt-2">Welcome back! Manage your custom tour requests and track performance.</p>
                    <div class="flex items-center gap-4 mt-3">
                        <span class="text-sm text-gray-500">
                            <i class="fas fa-calendar-alt text-[#FF6B35] mr-2"></i>
                            {{ now()->format('l, F j, Y') }}
                        </span>
                        <span class="text-sm text-gray-500">
                            <i class="fas fa-clock text-[#1E3A8A] mr-2"></i>
                            {{ now()->format('g:i A') }}
                        </span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-3">
                    <button class="px-5 py-3 bg-white border-2 border-gray-300 text-[#374151] rounded-xl font-semibold hover:border-[#FF6B35] hover:text-[#FF6B35] transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-download mr-2"></i>
                        Export Report
                    </button>
                    <a href="#" 
                       class="px-5 py-3 bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white rounded-xl font-semibold hover:from-blue-600 hover:to-[#1E3A8A] transform hover:scale-105 transition-all duration-300 shadow-lg">
                        <i class="fas fa-plus-circle mr-2"></i>
                        New Tour Request
                    </a>
                    <a href="{{ route('agent.custom_tours.index') }}" 
                       class="px-5 py-3 bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white rounded-xl font-semibold hover:from-orange-600 hover:to-[#FF6B35] transform hover:scale-105 transition-all duration-300 shadow-lg">
                        <i class="fas fa-list mr-2"></i>
                        View All Requests
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Custom Tours Card -->
            <div class="group bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-[#1E3A8A]/10 rounded-full blur-2xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-gradient-to-br from-[#1E3A8A] to-blue-600 rounded-xl p-3 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-suitcase text-white text-xl"></i>
                        </div>
                        <span class="text-xs font-semibold text-green-600 bg-green-100 px-2 py-1 rounded-full">
                            <i class="fas fa-arrow-up text-xs mr-1"></i>12%
                        </span>
                    </div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Total Custom Tours</p>
                    <p class="text-4xl font-bold text-[#374151] mt-2">{{ number_format($stats['total_custom_tours'] ?? 0) }}</p>
                    <div class="mt-3 pt-3 border-t border-gray-100">
                        <p class="text-xs text-gray-500">All time requests</p>
                    </div>
                </div>
            </div>

            <!-- Pending Card -->
            <div class="group bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-[#FF6B35]/10 rounded-full blur-2xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-gradient-to-br from-[#FF6B35] to-orange-600 rounded-xl p-3 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-clock text-white text-xl"></i>
                        </div>
                        @if(($stats['pending'] ?? 0) > 0)
                            <span class="animate-pulse">
                                <span class="relative flex h-3 w-3">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#FF6B35] opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-[#FF6B35]"></span>
                                </span>
                            </span>
                        @endif
                    </div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Pending Review</p>
                    <p class="text-4xl font-bold text-[#FF6B35] mt-2">{{ number_format($stats['pending'] ?? 0) }}</p>
                    <div class="mt-3 pt-3 border-t border-gray-100">
                        <p class="text-xs text-gray-500">Awaiting response</p>
                    </div>
                </div>
            </div>

            <!-- In Progress Card -->
            <div class="group bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-500/10 rounded-full blur-2xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl p-3 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-spinner text-white text-xl"></i>
                        </div>
                        <div class="flex -space-x-1">
                            <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                            <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse delay-75"></div>
                            <div class="w-2 h-2 bg-blue-300 rounded-full animate-pulse delay-150"></div>
                        </div>
                    </div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">In Progress</p>
                    <p class="text-4xl font-bold text-blue-600 mt-2">{{ number_format($stats['in_progress'] ?? 0) }}</p>
                    <div class="mt-3 pt-3 border-t border-gray-100">
                        <p class="text-xs text-gray-500">Currently processing</p>
                    </div>
                </div>
            </div>

            <!-- Completed Card -->
            <div class="group bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-green-500/10 rounded-full blur-2xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl p-3 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-check-circle text-white text-xl"></i>
                        </div>
                        <span class="text-xs font-semibold text-green-600 bg-green-100 px-2 py-1 rounded-full">
                            <i class="fas fa-trophy text-xs mr-1"></i>Goal
                        </span>
                    </div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Completed</p>
                    <p class="text-4xl font-bold text-green-600 mt-2">{{ number_format($stats['completed'] ?? 0) }}</p>
                    <div class="mt-3 pt-3 border-t border-gray-100">
                        <p class="text-xs text-gray-500">Successfully closed</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Metrics Row -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Response Time -->
            <div class="bg-gradient-to-r from-[#1E3A8A] to-blue-600 rounded-2xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm">Avg. Response Time</p>
                        <p class="text-3xl font-bold mt-2">2.4 hrs</p>
                        <div class="flex items-center mt-3">
                            <div class="w-full bg-white/20 rounded-full h-2">
                                <div class="bg-white rounded-full h-2" style="width: 85%"></div>
                            </div>
                            <span class="ml-2 text-xs">85%</span>
                        </div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-full p-4">
                        <i class="fas fa-tachometer-alt text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Conversion Rate -->
            <div class="bg-gradient-to-r from-[#FF6B35] to-orange-600 rounded-2xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-orange-100 text-sm">Conversion Rate</p>
                        <p class="text-3xl font-bold mt-2">68%</p>
                        <div class="flex items-center mt-3">
                            <div class="w-full bg-white/20 rounded-full h-2">
                                <div class="bg-white rounded-full h-2" style="width: 68%"></div>
                            </div>
                            <span class="ml-2 text-xs">68%</span>
                        </div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-full p-4">
                        <i class="fas fa-chart-line text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Customer Satisfaction -->
            <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl shadow-lg p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm">Satisfaction Score</p>
                        <p class="text-3xl font-bold mt-2">4.8/5</p>
                        <div class="flex items-center mt-3">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star text-yellow-300 {{ $i <= 4 ? '' : 'opacity-50' }}"></i>
                            @endfor
                        </div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-full p-4">
                        <i class="fas fa-smile text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Latest Requests Section (2 columns wide) -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-xl border border-gray-100">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white rounded-xl p-3 mr-3">
                                <i class="fas fa-inbox text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-[#374151]">Latest Custom Tour Requests</h3>
                                <p class="text-sm text-gray-500 mt-1">Recent inquiries from customers</p>
                            </div>
                        </div>
                        <a href="{{ route('agent.custom_tours.index') }}" 
                           class="text-[#FF6B35] hover:text-orange-600 font-semibold text-sm transition-colors duration-300">
                            View All <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>

                <div class="divide-y divide-gray-100 max-h-96 overflow-y-auto">
                    @forelse($latest as $t)
                        <a href="{{ route('agent.custom_tours.show', $t) }}" 
                           class="flex items-center justify-between p-6 hover:bg-gradient-to-r hover:from-[#F3F4F6] hover:to-white transition-all duration-300 group">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-gradient-to-br from-[#1E3A8A] to-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                                        {{ strtoupper(substr($t->name, 0, 1)) }}
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2">
                                        <p class="font-semibold text-[#374151] group-hover:text-[#1E3A8A] transition-colors duration-300">
                                            {{ $t->name }}
                                        </p>
                                        <span class="px-2 py-1 text-xs rounded-full font-semibold
                                            {{ $t->status === 'pending' ? 'bg-[#FF6B35]/10 text-[#FF6B35]' :
                                               ($t->status === 'processing' ? 'bg-blue-100 text-blue-600' :
                                               ($t->status === 'completed' ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-600')) }}">
                                            <i class="fas fa-circle text-[6px] mr-1"></i>
                                            {{ ucfirst($t->status ?? 'pending') }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">
                                        <i class="fas fa-envelope text-xs mr-1"></i>{{ $t->email }}
                                    </p>
                                    <div class="flex items-center gap-4 mt-2 text-xs text-gray-600">
                                        <span>
                                            <i class="fas fa-map-marker-alt text-[#FF6B35] mr-1"></i>
                                            {{ $t->destination ?? 'Not specified' }}
                                        </span>
                                        <span>
                                            <i class="fas fa-users text-[#1E3A8A] mr-1"></i>
                                            {{ $t->travelers_count ?? 0 }} travelers
                                        </span>
                                        <span>
                                            <i class="fas fa-calendar text-green-500 mr-1"></i>
                                            {{ $t->created_at->format('M d') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-[#FF6B35] group-hover:translate-x-1 transition-all duration-300"></i>
                            </div>
                        </a>
                    @empty
                        <div class="p-12 text-center">
                            <div class="bg-[#F3F4F6] rounded-full w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                                <i class="fas fa-inbox text-3xl text-gray-400"></i>
                            </div>
                            <p class="text-gray-500 font-medium">No tour requests yet</p>
                            <p class="text-gray-400 text-sm mt-2">New requests will appear here</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Quick Actions & Activity Feed -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-gradient-to-br from-[#374151] to-gray-700 rounded-2xl shadow-xl p-6 text-white">
                    <h4 class="font-bold text-lg mb-4">Quick Actions</h4>
                    <div class="space-y-3">
                        <button class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white/20 transition-all duration-300 text-left flex items-center justify-between group">
                            <span><i class="fas fa-plus mr-2"></i>Create New Tour</span>
                            <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                        </button>
                        <button class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white/20 transition-all duration-300 text-left flex items-center justify-between group">
                            <span><i class="fas fa-file-export mr-2"></i>Export Reports</span>
                            <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                        </button>
                        <button class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm rounded-xl hover:bg-white/20 transition-all duration-300 text-left flex items-center justify-between group">
                            <span><i class="fas fa-cog mr-2"></i>Settings</span>
                            <i class="fas fa-arrow-right opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                        </button>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <h4 class="font-bold text-[#374151] text-lg mb-4">Recent Activity</h4>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-600">Tour #245 completed</p>
                                <p class="text-xs text-gray-400">2 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-[#FF6B35] rounded-full mt-2"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-600">New request received</p>
                                <p class="text-xs text-gray-400">3 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-[#1E3A8A] rounded-full mt-2"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-600">Quote sent to client</p>
                                <p class="text-xs text-gray-400">5 hours ago</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Revenue Summary -->
                <div class="bg-gradient-to-br from-[#FF6B35] to-orange-600 rounded-2xl shadow-xl p-6 text-white">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="font-bold text-lg">This Month</h4>
                        <i class="fas fa-chart-line text-2xl opacity-50"></i>
                    </div>
                    <p class="text-3xl font-bold">$12,450</p>
                    <p class="text-orange-100 text-sm mt-2">Total Revenue</p>
                    <div class="mt-4 pt-4 border-t border-white/20">
                        <div class="flex justify-between text-sm">
                            <span class="text-orange-100">vs Last Month</span>
                            <span class="font-semibold">+18%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Auto refresh dashboard every 30 seconds
    setTimeout(function() {
        location.reload();
    }, 30000);

    // Add animation to numbers on load
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('.text-4xl');
        counters.forEach(counter => {
            const target = parseInt(counter.innerText);
            const increment = target / 50;
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.innerText = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    counter.innerText = Math.floor(current).toLocaleString();
                }
            }, 20);
        });
    });
</script>
@endpush
@endsection