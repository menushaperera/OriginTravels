@extends('layouts.admin')

@section('title', 'Admin Dashboard - ORIGIN Travels')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#F3F4F6] via-white to-[#F3F4F6]">
    <div class="space-y-6 p-6">
        <!-- Page Header with Animation -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h2 class="text-4xl font-bold bg-gradient-to-r from-[#1E3A8A] to-[#FF6B35] bg-clip-text text-transparent">
                        Dashboard Overview
                    </h2>
                    <p class="text-gray-600 mt-2">Welcome back! Here's what's happening with your business today.</p>
                </div>
                <div class="flex flex-col items-end">
                    <span class="text-sm font-semibold text-[#FF6B35] bg-[#FF6B35]/10 px-4 py-2 rounded-full">
                        <i class="far fa-calendar-alt mr-2"></i>{{ now()->format('l, F j, Y') }}
                    </span>
                    <span class="text-xs text-gray-500 mt-2">
                        <i class="far fa-clock mr-1"></i>Last updated: {{ now()->format('g:i A') }}
                    </span>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions Bar -->
        <div class="flex flex-wrap gap-3 mb-6">
            <a href="{{ route('admin.packages.create') }}"
            class="px-6 py-3 bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white rounded-xl font-semibold hover:from-orange-600 hover:to-[#FF6B35] transform hover:scale-105 transition-all duration-300 shadow-lg inline-flex items-center">
                <i class="fas fa-plus-circle mr-2"></i>Add New Package
            </a>
            <button class="px-6 py-3 bg-white border-2 border-[#1E3A8A] text-[#1E3A8A] rounded-xl font-semibold hover:bg-[#1E3A8A] hover:text-white transform hover:scale-105 transition-all duration-300">
                <i class="fas fa-download mr-2"></i>Export Report
            </button>
            <button class="px-6 py-3 bg-white border-2 border-gray-300 text-[#374151] rounded-xl font-semibold hover:border-[#FF6B35] hover:text-[#FF6B35] transform hover:scale-105 transition-all duration-300">
                <i class="fas fa-cog mr-2"></i>Settings
            </button>
        </div>
        
        <!-- Statistics Cards with Enhanced Design -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Customers Card -->
            <div class="group relative bg-gradient-to-br from-[#1E3A8A] to-blue-600 rounded-2xl shadow-xl p-6 text-white overflow-hidden transform hover:scale-105 transition-all duration-300 cursor-pointer">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-users text-3xl"></i>
                        </div>
                        <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold">
                            <i class="fas fa-arrow-up mr-1"></i>12%
                        </span>
                    </div>
                    <div>
                        <p class="text-blue-100 text-sm font-medium uppercase tracking-wide">Total Customers</p>
                        <p class="text-4xl font-bold mt-2">{{ number_format($stats['total_customers']) }}</p>
                        <div class="mt-4 pt-4 border-t border-white/20">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-blue-100">Active</span>
                                <span class="text-lg font-bold">{{ number_format($stats['active_customers']) }}</span>
                            </div>
                            <div class="w-full bg-white/20 rounded-full h-2 mt-2">
                                <div class="bg-white rounded-full h-2" style="width: {{ ($stats['active_customers'] / max($stats['total_customers'], 1)) * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Travel Agents Card -->
            <div class="group relative bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-xl p-6 text-white overflow-hidden transform hover:scale-105 transition-all duration-300 cursor-pointer">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-user-tie text-3xl"></i>
                        </div>
                        <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold">
                            <i class="fas fa-arrow-up mr-1"></i>8%
                        </span>
                    </div>
                    <div>
                        <p class="text-green-100 text-sm font-medium uppercase tracking-wide">Travel Agents</p>
                        <p class="text-4xl font-bold mt-2">{{ number_format($stats['total_agents']) }}</p>
                        <div class="mt-4 pt-4 border-t border-white/20">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-green-100">Active</span>
                                <span class="text-lg font-bold">{{ number_format($stats['active_agents']) }}</span>
                            </div>
                            <div class="w-full bg-white/20 rounded-full h-2 mt-2">
                                <div class="bg-white rounded-full h-2" style="width: {{ ($stats['active_agents'] / max($stats['total_agents'], 1)) * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Packages Card -->
            <div class="group relative bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl shadow-xl p-6 text-white overflow-hidden transform hover:scale-105 transition-all duration-300 cursor-pointer">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-box text-3xl"></i>
                        </div>
                        <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold">
                            <i class="fas fa-arrow-up mr-1"></i>15%
                        </span>
                    </div>
                    <div>
                        <p class="text-purple-100 text-sm font-medium uppercase tracking-wide">Total Packages</p>
                        <p class="text-4xl font-bold mt-2">{{ number_format($stats['total_packages']) }}</p>
                        <div class="mt-4 pt-4 border-t border-white/20">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-purple-100">Featured</span>
                                <span class="text-lg font-bold">{{ number_format($stats['featured_packages']) }}</span>
                            </div>
                            <div class="w-full bg-white/20 rounded-full h-2 mt-2">
                                <div class="bg-white rounded-full h-2" style="width: {{ ($stats['featured_packages'] / max($stats['total_packages'], 1)) * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Destinations Card -->
            <div class="group relative bg-gradient-to-br from-[#FF6B35] to-orange-600 rounded-2xl shadow-xl p-6 text-white overflow-hidden transform hover:scale-105 transition-all duration-300 cursor-pointer">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-map-marked-alt text-3xl"></i>
                        </div>
                        <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold">
                            <i class="fas fa-arrow-up mr-1"></i>5%
                        </span>
                    </div>
                    <div>
                        <p class="text-orange-100 text-sm font-medium uppercase tracking-wide">Destinations</p>
                        <p class="text-4xl font-bold mt-2">{{ number_format($stats['total_destinations']) }}</p>
                        <div class="mt-4 pt-4 border-t border-white/20">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-orange-100">Countries</span>
                                <span class="text-lg font-bold">8</span>
                            </div>
                            <div class="flex gap-1 mt-2">
                                @for($i = 0; $i < 8; $i++)
                                    <div class="flex-1 h-2 bg-white/{{ $i < 5 ? '100' : '30' }} rounded-full"></div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mini Stats Row -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-xl shadow-md p-4 border-l-4 border-[#1E3A8A] hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 uppercase font-semibold">Today's Sales</p>
                        <p class="text-2xl font-bold text-[#374151] mt-1">$12,426</p>
                    </div>
                    <div class="bg-[#1E3A8A]/10 rounded-lg p-2">
                        <i class="fas fa-dollar-sign text-[#1E3A8A]"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-4 border-l-4 border-[#FF6B35] hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 uppercase font-semibold">New Bookings</p>
                        <p class="text-2xl font-bold text-[#374151] mt-1">48</p>
                    </div>
                    <div class="bg-[#FF6B35]/10 rounded-lg p-2">
                        <i class="fas fa-shopping-cart text-[#FF6B35]"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-4 border-l-4 border-green-500 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 uppercase font-semibold">Conversion Rate</p>
                        <p class="text-2xl font-bold text-[#374151] mt-1">3.8%</p>
                    </div>
                    <div class="bg-green-500/10 rounded-lg p-2">
                        <i class="fas fa-chart-line text-green-500"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-4 border-l-4 border-purple-500 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-600 uppercase font-semibold">Avg. Order Value</p>
                        <p class="text-2xl font-bold text-[#374151] mt-1">$259</p>
                    </div>
                    <div class="bg-purple-500/10 rounded-lg p-2">
                        <i class="fas fa-tag text-purple-500"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Charts Section with Enhanced Design -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Monthly Customers Chart -->
            <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-[#374151]">Customer Registration</h3>
                        <p class="text-sm text-gray-500 mt-1">Monthly overview</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="px-3 py-1 text-xs font-semibold text-[#1E3A8A] bg-[#1E3A8A]/10 rounded-lg hover:bg-[#1E3A8A]/20 transition-colors duration-300">
                            This Year
                        </button>
                        <button class="px-3 py-1 text-xs font-semibold text-gray-600 hover:bg-gray-100 rounded-lg transition-colors duration-300">
                            Last Year
                        </button>
                    </div>
                </div>
                <div class="relative">
                    <canvas id="customersChart" height="350"></canvas>
                </div>
                <div class="grid grid-cols-3 gap-4 mt-6 pt-6 border-t border-gray-100">
                    <div class="text-center">
                        <p class="text-xs text-gray-500 uppercase">Total</p>
                        <p class="text-lg font-bold text-[#374151]">2,849</p>
                    </div>
                    <div class="text-center">
                        <p class="text-xs text-gray-500 uppercase">Average</p>
                        <p class="text-lg font-bold text-[#374151]">237</p>
                    </div>
                    <div class="text-center">
                        <p class="text-xs text-gray-500 uppercase">Growth</p>
                        <p class="text-lg font-bold text-green-500">+18%</p>
                    </div>
                </div>
            </div>
            
            <!-- Revenue Chart -->
            <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-[#374151]">Revenue Trend</h3>
                        <p class="text-sm text-gray-500 mt-1">Monthly performance</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-[#FF6B35] rounded-full mr-2"></div>
                            <span class="text-xs text-gray-600">Revenue</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-[#1E3A8A] rounded-full mr-2"></div>
                            <span class="text-xs text-gray-600">Target</span>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <canvas id="revenueChart" height="350"></canvas>
                </div>
                <div class="grid grid-cols-3 gap-4 mt-6 pt-6 border-t border-gray-100">
                    <div class="text-center">
                        <p class="text-xs text-gray-500 uppercase">Total</p>
                        <p class="text-lg font-bold text-[#374151]">$84.2k</p>
                    </div>
                    <div class="text-center">
                        <p class="text-xs text-gray-500 uppercase">Target</p>
                        <p class="text-lg font-bold text-[#374151]">$100k</p>
                    </div>
                    <div class="text-center">
                        <p class="text-xs text-gray-500 uppercase">Achievement</p>
                        <p class="text-lg font-bold text-[#FF6B35]">84.2%</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Activities with Enhanced Design -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Customers -->
            <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <div class="bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white rounded-xl p-3 mr-3">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-[#374151]">Recent Customers</h3>
                            <p class="text-sm text-gray-500">Latest registrations</p>
                        </div>
                    </div>
                    <a href="#" class="text-[#FF6B35] hover:text-orange-600 text-sm font-semibold transition-colors duration-300">
                        View All <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                <div class="space-y-3">
                    @forelse($stats['recent_customers'] as $customer)
                        <div class="group flex items-center justify-between p-4 hover:bg-gradient-to-r hover:from-[#F3F4F6] hover:to-white rounded-xl transition-all duration-300 cursor-pointer">
                            <div class="flex items-center">
                                <div class="relative">
                                    <div class="bg-gradient-to-br from-[#1E3A8A] to-blue-600 rounded-full p-3 text-white">
                                        <i class="fas fa-user text-sm"></i>
                                    </div>
                                    <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-4">
                                    <p class="font-semibold text-[#374151] group-hover:text-[#1E3A8A] transition-colors duration-300">
                                        {{ $customer->name }}
                                    </p>
                                    <p class="text-sm text-gray-500">{{ $customer->email }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-xs text-gray-400 block">{{ $customer->created_at->diffForHumans() }}</span>
                                <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded-full mt-1 inline-block">New</span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-user-slash text-4xl text-gray-300 mb-3"></i>
                            <p class="text-gray-500">No recent customers</p>
                        </div>
                    @endforelse
                </div>
            </div>
            
            <!-- Recent Travel Agents -->
            <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <div class="bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white rounded-xl p-3 mr-3">
                            <i class="fas fa-user-tie text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-[#374151]">Recent Travel Agents</h3>
                            <p class="text-sm text-gray-500">New partnerships</p>
                        </div>
                    </div>
                    <a href="#" class="text-[#FF6B35] hover:text-orange-600 text-sm font-semibold transition-colors duration-300">
                        View All <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                <div class="space-y-3">
                    @forelse($stats['recent_agents'] as $agent)
                        <div class="group flex items-center justify-between p-4 hover:bg-gradient-to-r hover:from-[#F3F4F6] hover:to-white rounded-xl transition-all duration-300 cursor-pointer">
                            <div class="flex items-center">
                                <div class="relative">
                                    <div class="bg-gradient-to-br from-[#FF6B35] to-orange-600 rounded-full p-3 text-white">
                                        <i class="fas fa-user-tie text-sm"></i>
                                    </div>
                                    <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-4">
                                    <p class="font-semibold text-[#374151] group-hover:text-[#FF6B35] transition-colors duration-300">
                                        {{ $agent->name }}
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        <i class="fas fa-building text-xs mr-1"></i>
                                        {{ $agent->company_name ?? 'Independent Agent' }}
                                    </p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-xs text-gray-400 block">{{ $agent->created_at->diffForHumans() }}</span>
                                <span class="text-xs bg-[#FF6B35]/10 text-[#FF6B35] px-2 py-1 rounded-full mt-1 inline-block">Partner</span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-user-slash text-4xl text-gray-300 mb-3"></i>
                            <p class="text-gray-500">No recent agents</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Performance Metrics -->
        <div class="bg-white rounded-2xl shadow-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-[#374151]">Performance Metrics</h3>
                <div class="flex gap-2">
                    <button class="px-4 py-2 text-sm font-semibold text-white bg-gradient-to-r from-[#1E3A8A] to-blue-600 rounded-lg hover:from-blue-600 hover:to-[#1E3A8A] transition-all duration-300">
                        Weekly
                    </button>
                    <button class="px-4 py-2 text-sm font-semibold text-gray-600 hover:bg-gray-100 rounded-lg transition-colors duration-300">
                        Monthly
                    </button>
                    <button class="px-4 py-2 text-sm font-semibold text-gray-600 hover:bg-gray-100 rounded-lg transition-colors duration-300">
                        Yearly
                    </button>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center p-6 bg-gradient-to-br from-[#F3F4F6] to-white rounded-xl">
                    <div class="relative inline-block">
                        <svg class="w-32 h-32">
                            <circle cx="64" cy="64" r="56" stroke="#E5E7EB" stroke-width="12" fill="none"></circle>
                            <circle cx="64" cy="64" r="56" stroke="#FF6B35" stroke-width="12" fill="none" 
                                    stroke-dasharray="351.86" stroke-dashoffset="88" 
                                    transform="rotate(-90 64 64)"
                                    stroke-linecap="round"></circle>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-2xl font-bold text-[#374151]">75%</span>
                        </div>
                    </div>
                    <h4 class="font-semibold text-[#374151] mt-4">Customer Satisfaction</h4>
                    <p class="text-sm text-gray-500 mt-1">Based on 1,234 reviews</p>
                </div>
                
                <div class="text-center p-6 bg-gradient-to-br from-[#F3F4F6] to-white rounded-xl">
                    <div class="relative inline-block">
                        <svg class="w-32 h-32">
                            <circle cx="64" cy="64" r="56" stroke="#E5E7EB" stroke-width="12" fill="none"></circle>
                            <circle cx="64" cy="64" r="56" stroke="#1E3A8A" stroke-width="12" fill="none" 
                                    stroke-dasharray="351.86" stroke-dashoffset="105" 
                                    transform="rotate(-90 64 64)"
                                    stroke-linecap="round"></circle>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-2xl font-bold text-[#374151]">70%</span>
                        </div>
                    </div>
                    <h4 class="font-semibold text-[#374151] mt-4">Revenue Target</h4>
                    <p class="text-sm text-gray-500 mt-1">$70k of $100k goal</p>
                </div>
                
                <div class="text-center p-6 bg-gradient-to-br from-[#F3F4F6] to-white rounded-xl">
                    <div class="relative inline-block">
                        <svg class="w-32 h-32">
                            <circle cx="64" cy="64" r="56" stroke="#E5E7EB" stroke-width="12" fill="none"></circle>
                            <circle cx="64" cy="64" r="56" stroke="#10B981" stroke-width="12" fill="none" 
                                    stroke-dasharray="351.86" stroke-dashoffset="70" 
                                    transform="rotate(-90 64 64)"
                                    stroke-linecap="round"></circle>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-2xl font-bold text-[#374151]">80%</span>
                        </div>
                    </div>
                    <h4 class="font-semibold text-[#374151] mt-4">Booking Completion</h4>
                    <p class="text-sm text-gray-500 mt-1">4 out of 5 complete booking</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart.js default configuration
    Chart.defaults.font.family = "'Inter', sans-serif";
    Chart.defaults.color = '#374151';
    
    // Monthly Customers Chart with gradient
    const customersCtx = document.getElementById('customersChart').getContext('2d');
    const monthlyCustomersData = @json($monthlyCustomers);
    
    // Create gradient for customers chart
    const customersGradient = customersCtx.createLinearGradient(0, 0, 0, 300);
    customersGradient.addColorStop(0, 'rgba(30, 58, 138, 0.3)');
    customersGradient.addColorStop(1, 'rgba(30, 58, 138, 0)');
    
    new Chart(customersCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'New Customers',
                data: Array.from({length: 12}, (_, i) => monthlyCustomersData[i + 1] || Math.floor(Math.random() * 300) + 100),
                borderColor: '#1E3A8A',
                backgroundColor: customersGradient,
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#FFFFFF',
                pointBorderColor: '#1E3A8A',
                pointBorderWidth: 3,
                pointRadius: 5,
                pointHoverRadius: 7,
                pointHoverBorderWidth: 3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                intersect: false,
                mode: 'index'
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#374151',
                    titleColor: '#FFFFFF',
                    bodyColor: '#FFFFFF',
                    borderColor: '#1E3A8A',
                    borderWidth: 1,
                    padding: 12,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return 'Customers: ' + context.parsed.y;
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 12
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#F3F4F6',
                        drawBorder: false
                    },
                    ticks: {
                        stepSize: 50,
                        font: {
                            size: 12
                        }
                    }
                }
            }
        }
    });
    
    // Revenue Chart with gradient and dual dataset
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const monthlyRevenueData = @json($monthlyRevenue);
    
    // Create gradient for revenue chart
    const revenueGradient = revenueCtx.createLinearGradient(0, 0, 0, 300);
    revenueGradient.addColorStop(0, 'rgba(255, 107, 53, 0.3)');
    revenueGradient.addColorStop(1, 'rgba(255, 107, 53, 0)');
    
    new Chart(revenueCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'Revenue',
                    data: Array.from({length: 12}, (_, i) => monthlyRevenueData[i + 1] || Math.floor(Math.random() * 10000) + 5000),
                    backgroundColor: '#FF6B35',
                    borderColor: '#FF6B35',
                    borderWidth: 0,
                    borderRadius: 8,
                    barThickness: 20
                },
                {
                    label: 'Target',
                    data: Array.from({length: 12}, () => 8500),
                    type: 'line',
                    borderColor: '#1E3A8A',
                    borderWidth: 2,
                    borderDash: [5, 5],
                    fill: false,
                    pointRadius: 0,
                    pointHoverRadius: 0,
                    tension: 0
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                intersect: false,
                mode: 'index'
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#374151',
                    titleColor: '#FFFFFF',
                    bodyColor: '#FFFFFF',
                    borderColor: '#FF6B35',
                    borderWidth: 1,
                    padding: 12,
                    displayColors: true,
                    callbacks: {
                        label: function(context) {
                            if (context.dataset.label === 'Revenue') {
                                return 'Revenue:  + context.parsed.y.toLocaleString();
                            }
                            return 'Target:  + context.parsed.y.toLocaleString();
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 12
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#F3F4F6',
                        drawBorder: false
                    },
                    ticks: {
                        callback: function(value) {
                            return ' + (value / 1000) + 'k';
                        },
                        font: {
                            size: 12
                        }
                    }
                }
            }
        }
    });

    // Animate counter numbers on load
    function animateValue(element, start, end, duration) {
        const range = end - start;
        const increment = range / (duration / 16);
        let current = start;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= end) {
                element.textContent = end.toLocaleString();
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current).toLocaleString();
            }
        }, 16);
    }

    // Animate statistics on page load
    document.addEventListener('DOMContentLoaded', function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                }
            });
        });

        document.querySelectorAll('.group').forEach(el => {
            observer.observe(el);
        });
    });

    // Add hover effect to cards
    document.querySelectorAll('.group').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Real-time clock update
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('en-US', { 
            hour: '2-digit', 
            minute: '2-digit',
            hour12: true 
        });
        const clockElement = document.querySelector('.fa-clock').parentElement;
        if (clockElement) {
            clockElement.textContent = 'Last updated: ' + timeString;
            clockElement.insertAdjacentHTML('afterbegin', '<i class="far fa-clock mr-1"></i>');
        }
    }
    
    setInterval(updateClock, 60000); // Update every minute
</script>

<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in {
        animation: fade-in 0.6s ease-out;
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: #F3F4F6;
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #FF6B35;
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: #e55a2b;
    }
    
    /* Smooth transitions for all interactive elements */
    .group {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Pulse animation for status indicators */
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
    }
    
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>
@endpush
@endsection