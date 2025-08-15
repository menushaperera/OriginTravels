@extends('layouts.admin')

@section('title', 'Manage Packages -ORIGIN Travels')

@section('content')
@php
    use Illuminate\Support\Str;

    // Safe fallbacks if the controller didn't pass them in
    $destinations = $destinations
        ?? \App\Models\Destination::select('id','name')->orderBy('name')->get();

    // (Optional) if this view gets hit directly; normally controller should pass $packages
    $packages = $packages ?? \App\Models\Package::query()
        ->orderBy('display_order')
        ->orderByDesc('is_bestseller')
        ->orderByDesc('is_featured')
        ->get();
@endphp

<div class="min-h-screen bg-gradient-to-br from-[#F3F4F6] via-white to-[#F3F4F6]">
    <div class="space-y-6 p-6">
        <!-- Page Header with Gradient -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-4xl font-bold bg-gradient-to-r from-[#1E3A8A] to-[#FF6B35] bg-clip-text text-transparent">
                        Travel Packages
                    </h2>
                    <p class="text-gray-600 mt-2">Manage and organize your travel packages</p>
                </div>
                <div class="mt-4 sm:mt-0 flex gap-3">
                    <button class="inline-flex items-center px-4 py-2 bg-white border-2 border-gray-300 text-[#374151] rounded-xl font-semibold hover:border-[#FF6B35] hover:text-[#FF6B35] transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-download mr-2"></i>
                        Export
                    </button>
                    <a href="{{ route('admin.packages.create') }}"
                       class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white rounded-xl font-semibold hover:from-orange-600 hover:to-[#FF6B35] transform hover:scale-105 transition-all duration-300 shadow-lg">
                        <i class="fas fa-plus-circle mr-2"></i>
                        Add New Package
                    </a>
                </div>
            </div>
        </div>

        <!-- Statistics Cards with Enhanced Design -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Total Packages -->
            <div class="group bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-[#1E3A8A]/10 rounded-full blur-2xl"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Total Packages</p>
                        <p class="text-4xl font-bold text-[#374151] mt-2">{{ \App\Models\Package::count() }}</p>
                        <div class="flex items-center mt-2">
                            <span class="text-xs text-gray-500">All time</span>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-[#1E3A8A] to-blue-600 rounded-2xl p-4 text-white group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-box text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Active Packages -->
            <div class="group bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-green-500/10 rounded-full blur-2xl"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Active</p>
                        <p class="text-4xl font-bold text-green-600 mt-2">{{ \App\Models\Package::where('status', 'active')->count() }}</p>
                        <div class="mt-2">
                            <div class="w-full bg-green-100 rounded-full h-2">
                                <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-2 rounded-full" style="width: {{ (\App\Models\Package::where('status', 'active')->count() / max(\App\Models\Package::count(), 1)) * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-4 text-white group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-check-circle text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Bestsellers -->
            <div class="group bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-[#FF6B35]/10 rounded-full blur-2xl"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Bestsellers</p>
                        <p class="text-4xl font-bold text-[#FF6B35] mt-2">{{ \App\Models\Package::where('is_bestseller', true)->count() }}</p>
                        <div class="flex items-center mt-2">
                            <span class="bg-[#FF6B35]/10 text-[#FF6B35] px-2 py-1 rounded-full text-xs font-semibold">
                                <i class="fas fa-arrow-up mr-1 text-xs"></i>Trending
                            </span>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-[#FF6B35] to-orange-600 rounded-2xl p-4 text-white group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-fire text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Featured -->
            <div class="group bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-purple-500/10 rounded-full blur-2xl"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Featured</p>
                        <p class="text-4xl font-bold text-purple-600 mt-2">{{ \App\Models\Package::where('is_featured', true)->count() }}</p>
                        <div class="flex items-center mt-2">
                            <span class="bg-purple-100 text-purple-600 px-2 py-1 rounded-full text-xs font-semibold">
                                Premium
                            </span>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl p-4 text-white group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-star text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Advanced Filters Section -->
        <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold text-[#374151] flex items-center">
                    <i class="fas fa-filter text-[#FF6B35] mr-2"></i>
                    Filter Packages
                </h3>
                <button type="button" class="text-sm text-[#1E3A8A] hover:text-blue-700 font-semibold transition-colors duration-300">
                    <i class="fas fa-redo mr-1"></i>Reset Filters
                </button>
            </div>
            
            <form method="GET" action="{{ route('admin.packages.index') }}" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Search Input -->
                    <div class="md:col-span-2">
                        <div class="relative">
                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Search by title, location, or country..."
                                   class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Destination Filter -->
                    <div>
                        <select name="destination_id"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300 appearance-none cursor-pointer">
                            <option value="all">🌍 All Destinations</option>
                            @foreach(($destinations ?? []) as $destination)
                                <option value="{{ $destination->id }}" {{ request('destination_id') == $destination->id ? 'selected' : '' }}>
                                    {{ $destination->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status Filter -->
                    <div>
                        <select name="status"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300 appearance-none cursor-pointer">
                            <option value="all">📊 All Status</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>✅ Active</option>
                            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>⏸️ Inactive</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>📝 Draft</option>
                        </select>
                    </div>
                </div>

                <!-- Additional Filters Row -->
                <div class="flex flex-wrap gap-3">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="bestseller" class="rounded border-gray-300 text-[#FF6B35] focus:ring-[#FF6B35]">
                        <span class="ml-2 text-sm text-gray-700">Bestsellers Only</span>
                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="featured" class="rounded border-gray-300 text-[#1E3A8A] focus:ring-[#1E3A8A]">
                        <span class="ml-2 text-sm text-gray-700">Featured Only</span>
                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="discounted" class="rounded border-gray-300 text-green-600 focus:ring-green-600">
                        <span class="ml-2 text-sm text-gray-700">Discounted</span>
                    </label>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                    <button type="reset"
                            class="px-6 py-3 bg-white border-2 border-gray-300 text-[#374151] rounded-xl font-semibold hover:border-[#374151] hover:bg-[#F3F4F6] transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-times mr-2"></i>Clear
                    </button>
                    <button type="submit"
                            class="px-8 py-3 bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white rounded-xl font-semibold hover:from-blue-600 hover:to-[#1E3A8A] transform hover:scale-105 transition-all duration-300 shadow-lg">
                        <i class="fas fa-search mr-2"></i>Apply Filters
                    </button>
                </div>
            </form>
        </div>

        <!-- Bulk Actions Bar -->
        <div class="bg-gradient-to-r from-[#374151] to-gray-700 rounded-xl p-4 text-white hidden" id="bulkActionsBar">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <span class="font-semibold"><span id="selectedCount">0</span> packages selected</span>
                    <button class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-lg hover:bg-white/30 transition-colors duration-300">
                        <i class="fas fa-edit mr-2"></i>Bulk Edit
                    </button>
                    <button class="px-4 py-2 bg-red-500/80 backdrop-blur-sm rounded-lg hover:bg-red-600 transition-colors duration-300">
                        <i class="fas fa-trash mr-2"></i>Delete Selected
                    </button>
                </div>
                <button onclick="document.getElementById('bulkActionsBar').classList.add('hidden')" class="text-white/80 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <!-- Packages Grid with Enhanced Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($packages as $package)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 relative group border border-gray-100">
                    <!-- Selection Checkbox -->
                    <div class="absolute top-4 left-4 z-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <input type="checkbox" class="w-5 h-5 rounded border-2 border-white shadow-lg cursor-pointer">
                    </div>

                    <!-- Admin Actions with Glassmorphism -->
                    <div class="absolute top-4 right-4 z-20 flex flex-col space-y-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
                        <a href="{{ route('admin.packages.edit', $package) }}"
                           class="bg-white/90 backdrop-blur-sm text-[#1E3A8A] p-3 rounded-xl hover:bg-white hover:scale-110 shadow-lg transition-all duration-300">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button onclick="showQuickEdit({{ $package->id }})"
                                class="bg-white/90 backdrop-blur-sm text-[#FF6B35] p-3 rounded-xl hover:bg-white hover:scale-110 shadow-lg transition-all duration-300">
                            <i class="fas fa-eye"></i>
                        </button>
                        <form action="{{ route('admin.packages.destroy', $package) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this package?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-white/90 backdrop-blur-sm text-red-600 p-3 rounded-xl hover:bg-white hover:scale-110 shadow-lg transition-all duration-300 w-full">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Badges -->
                    <div class="absolute top-4 left-4 z-10 flex flex-col gap-2">
                        @if(!empty($package->is_bestseller))
                            <span class="bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white px-3 py-1.5 rounded-full text-xs font-bold uppercase shadow-lg flex items-center">
                                <i class="fas fa-fire mr-1"></i> Bestseller
                            </span>
                        @endif
                        @if(!empty($package->is_featured))
                            <span class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-3 py-1.5 rounded-full text-xs font-bold uppercase shadow-lg flex items-center">
                                <i class="fas fa-star mr-1"></i> Featured
                            </span>
                        @endif
                    </div>

                    <!-- Image Section -->
                    <div class="relative h-56 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                        <img src="{{ $package->image_url ?? 'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400&h=300&fit=crop' }}"
                             alt="{{ $package->title }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <!-- Price Badge -->
                        <div class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-sm rounded-xl px-4 py-3 shadow-xl transform group-hover:scale-105 transition-transform duration-300">
                            <p class="text-xs text-gray-500 uppercase font-semibold">From</p>
                            <p class="text-2xl font-bold text-[#374151]">
                                ${{ number_format((float)($package->price ?? 0), 0) }}
                            </p>
                            <p class="text-xs text-gray-600">{{ $package->price_unit ?? 'per person' }}</p>
                        </div>

                        <!-- Status Indicator -->
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1.5 text-xs font-bold rounded-full shadow-lg
                                {{ $package->status === 'active' ? 'bg-green-500 text-white'
                                    : ($package->status === 'draft' ? 'bg-gray-500 text-white'
                                    : 'bg-red-500 text-white') }}">
                                {{ ucfirst((string) $package->status) }}
                            </span>
                        </div>
                    </div>

                    <!-- Details Section -->
                    <div class="p-6">
                        <!-- Location and Duration -->
                        <div class="flex items-center justify-between mb-3">
                            <p class="text-[#FF6B35] text-sm font-bold uppercase tracking-wide flex items-center">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                {{ $package->country }}
                            </p>
                            <div class="flex items-center text-gray-600 text-sm">
                                <i class="fas fa-clock text-[#1E3A8A] mr-1"></i>
                                <span class="font-medium">{{ $package->duration }}</span>
                            </div>
                        </div>

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-[#374151] mb-2 line-clamp-2 group-hover:text-[#1E3A8A] transition-colors duration-300">
                            {{ $package->title }}
                        </h3>

                        <!-- Description -->
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            {{ $package->subtitle ?? Str::limit((string)($package->description ?? 'Experience the beauty and culture of this amazing destination'), 80) }}
                        </p>

                        <!-- Tags -->
                        @php
                            $tags = $package->tags ?? [];
                            if ($tags instanceof \Illuminate\Support\Collection) {
                                $tags = $tags->all();
                            } elseif (is_string($tags)) {
                                $tags = array_filter(array_map('trim', explode(',', $tags)));
                            } elseif (!is_array($tags)) {
                                $tags = [];
                            }
                        @endphp
                        @if(count($tags))
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach(array_slice($tags, 0, 3) as $tag)
                                    <span class="bg-[#F3F4F6] text-[#374151] px-3 py-1 rounded-full text-xs font-medium hover:bg-[#1E3A8A]/10 hover:text-[#1E3A8A] transition-colors duration-300">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                                @if(count($tags) > 3)
                                    <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-xs font-medium">
                                        +{{ count($tags) - 3 }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        <!-- Rating and Reviews -->
                        @php
                            $rating = (int) floor((float)($package->rating ?? 4.5));
                            $totalReviews = (int) ($package->total_reviews ?? rand(10, 200));
                        @endphp
                        <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-100">
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star text-sm {{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                                <span class="ml-2 text-sm font-medium text-gray-600">
                                    {{ number_format((float)($package->rating ?? 4.5), 1) }}
                                </span>
                            </div>
                            <span class="text-xs text-gray-500">
                                {{ $totalReviews }} reviews
                            </span>
                        </div>

                        <!-- Package Stats -->
                        <div class="grid grid-cols-3 gap-2 text-center mb-4">
                            <div class="bg-[#F3F4F6] rounded-lg py-2">
                                <p class="text-xs text-gray-500">Bookings</p>
                                <p class="text-sm font-bold text-[#374151]">{{ rand(50, 500) }}</p>
                            </div>
                            <div class="bg-[#F3F4F6] rounded-lg py-2">
                                <p class="text-xs text-gray-500">Views</p>
                                <p class="text-sm font-bold text-[#374151]">{{ rand(1000, 5000) }}</p>
                            </div>
                            <div class="bg-[#F3F4F6] rounded-lg py-2">
                                <p class="text-xs text-gray-500">Revenue</p>
                                <p class="text-sm font-bold text-green-600">${{ number_format(rand(10000, 100000), 0) }}</p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-2">
                            <a href="{{ route('admin.packages.edit', $package) }}"
                               class="flex-1 text-center px-4 py-2.5 bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white rounded-xl font-semibold hover:from-blue-600 hover:to-[#1E3A8A] transform hover:scale-105 transition-all duration-300">
                                <i class="fas fa-edit mr-2"></i>Edit
                            </a>
                            <button onclick="duplicatePackage({{ $package->id }})"
                                    class="flex-1 px-4 py-2.5 bg-white border-2 border-[#FF6B35] text-[#FF6B35] rounded-xl font-semibold hover:bg-[#FF6B35] hover:text-white transform hover:scale-105 transition-all duration-300">
                                <i class="fas fa-copy mr-2"></i>Duplicate
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-2xl shadow-xl p-16 text-center">
                        <div class="max-w-md mx-auto">
                            <div class="bg-gradient-to-br from-[#F3F4F6] to-white rounded-full w-32 h-32 mx-auto mb-6 flex items-center justify-center">
                                <i class="fas fa-box-open text-5xl text-gray-400"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-[#374151] mb-3">No Packages Found</h3>
                            <p class="text-gray-500 mb-8">Start by creating your first travel package or adjust your search filters.</p>
                            <div class="flex gap-3 justify-center">
                                <a href="{{ route('admin.packages.create') }}"
                                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white rounded-xl font-semibold hover:from-orange-600 hover:to-[#FF6B35] transform hover:scale-105 transition-all duration-300 shadow-lg">
                                    <i class="fas fa-plus-circle mr-2"></i>
                                    Create First Package
                                </a>
                                <button type="button" onclick="location.reload()"
                                        class="inline-flex items-center px-6 py-3 bg-white border-2 border-gray-300 text-[#374151] rounded-xl font-semibold hover:border-[#1E3A8A] hover:text-[#1E3A8A] transform hover:scale-105 transition-all duration-300">
                                    <i class="fas fa-redo mr-2"></i>
                                    Refresh
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination with Enhanced Design -->
        @if($packages instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-gray-600">
                        Showing <span class="font-semibold text-[#374151]">{{ $packages->firstItem() ?? 0 }}</span> 
                        to <span class="font-semibold text-[#374151]">{{ $packages->lastItem() ?? 0 }}</span> 
                        of <span class="font-semibold text-[#374151]">{{ $packages->total() }}</span> packages
                    </div>
                    <div class="flex items-center gap-2">
                        {{ $packages->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Quick Edit Modal (Hidden by default) -->
<div id="quickEditModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-white border-b border-gray-200 p-6 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-[#374151]">Quick Edit Package</h3>
                <button onclick="closeQuickEdit()" class="text-gray-500 hover:text-gray-700 transition-colors duration-300">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
        <div class="p-6">
            <!-- Quick edit form content will be loaded here -->
            <p class="text-gray-500">Loading package details...</p>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Toggle bulk actions bar
    let selectedPackages = [];
    
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const bulkActionsBar = document.getElementById('bulkActionsBar');
            const selectedCount = document.querySelectorAll('input[type="checkbox"]:checked').length;
            
            if (selectedCount > 0) {
                bulkActionsBar.classList.remove('hidden');
                document.getElementById('selectedCount').textContent = selectedCount;
            } else {
                bulkActionsBar.classList.add('hidden');
            }
        });
    });

    // Quick Edit Modal Functions
    function showQuickEdit(packageId) {
        document.getElementById('quickEditModal').classList.remove('hidden');
        // Here you would load the package details via AJAX
        console.log('Loading package:', packageId);
    }

    function closeQuickEdit() {
        document.getElementById('quickEditModal').classList.add('hidden');
    }

    // Duplicate Package Function
    function duplicatePackage(packageId) {
        if (confirm('Are you sure you want to duplicate this package?')) {
            // Here you would send an AJAX request to duplicate the package
            console.log('Duplicating package:', packageId);
            
            // Show success notification
            showNotification('Package duplicated successfully!', 'success');
        }
    }

    // Show Notification Function
    function showNotification(message, type = 'info') {
        const colors = {
            'success': 'from-green-500 to-emerald-600',
            'error': 'from-red-500 to-red-600',
            'info': 'from-blue-500 to-blue-600',
            'warning': 'from-yellow-500 to-orange-600'
        };

        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-6 py-4 bg-gradient-to-r ${colors[type]} text-white rounded-xl shadow-2xl transform translate-x-full transition-transform duration-300`;
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-3 text-xl"></i>
                <span class="font-semibold">${message}</span>
            </div>
        `;

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);

        // Remove after 3 seconds
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }

    // Filter Reset Function
    document.querySelector('button[type="reset"]')?.addEventListener('click', function() {
        document.querySelector('form').reset();
        window.location.href = window.location.pathname;
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

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + N for new package
        if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
            e.preventDefault();
            window.location.href = '{{ route("admin.packages.create") }}';
        }
        
        // Ctrl/Cmd + F for search focus
        if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
            e.preventDefault();
            document.querySelector('input[name="search"]').focus();
        }
        
        // ESC to close modal
        if (e.key === 'Escape') {
            closeQuickEdit();
        }
    });

    // Initialize tooltips
    document.querySelectorAll('[title]').forEach(element => {
        element.addEventListener('mouseenter', function() {
            const tooltip = document.createElement('div');
            tooltip.className = 'absolute z-50 px-3 py-2 bg-gray-800 text-white text-xs rounded-lg shadow-lg -top-10 left-1/2 transform -translate-x-1/2 whitespace-nowrap';
            tooltip.textContent = this.getAttribute('title');
            this.appendChild(tooltip);
        });
        
        element.addEventListener('mouseleave', function() {
            const tooltip = this.querySelector('.absolute');
            if (tooltip) tooltip.remove();
        });
    });

    // Lazy load images
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src || img.src;
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    });

    document.querySelectorAll('img').forEach(img => {
        imageObserver.observe(img);
    });

    // Add loading state to buttons
    document.querySelectorAll('button[type="submit"]').forEach(button => {
        button.addEventListener('click', function() {
            if (this.form && this.form.checkValidity()) {
                this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
                this.disabled = true;
            }
        });
    });

    // Package status toggle
    function togglePackageStatus(packageId, currentStatus) {
        const newStatus = currentStatus === 'active' ? 'inactive' : 'active';
        
        // Here you would send an AJAX request to update the status
        console.log(`Toggling package ${packageId} from ${currentStatus} to ${newStatus}`);
        
        showNotification(`Package status updated to ${newStatus}`, 'success');
    }

    // Drag and drop for reordering (placeholder functionality)
    let draggedElement = null;

    document.querySelectorAll('.group').forEach(card => {
        card.draggable = true;
        
        card.addEventListener('dragstart', function(e) {
            draggedElement = this;
            this.style.opacity = '0.5';
        });
        
        card.addEventListener('dragend', function(e) {
            this.style.opacity = '';
        });
        
        card.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.transform = 'scale(1.05)';
        });
        
        card.addEventListener('dragleave', function(e) {
            this.style.transform = '';
        });
        
        card.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.transform = '';
            
            if (draggedElement !== this) {
                // Here you would handle the reordering logic
                console.log('Reordering packages');
                showNotification('Package order updated', 'success');
            }
        });
    });

    // Search autocomplete (placeholder)
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            if (this.value.length > 2) {
                // Here you would fetch suggestions via AJAX
                console.log('Fetching suggestions for:', this.value);
            }
        });
    }

    // Export functionality
    function exportPackages(format) {
        // Here you would trigger the export
        console.log('Exporting packages as:', format);
        showNotification(`Exporting packages as ${format}...`, 'info');
    }

    // Print functionality
    function printPackages() {
        window.print();
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Add fade-in animation to cards
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '0';
                    entry.target.style.transform = 'translateY(20px)';
                    
                    setTimeout(() => {
                        entry.target.style.transition = 'all 0.6s ease-out';
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, 100);
                    
                    observer.unobserve(entry.target);
                }
            });
        });

        document.querySelectorAll('.group').forEach(el => {
            observer.observe(el);
        });

        // Initialize counters animation
        const counters = document.querySelectorAll('[data-counter]');
        counters.forEach(counter => {
            const target = parseInt(counter.textContent);
            const increment = target / 50;
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.floor(current).toLocaleString();
                }
            }, 20);
        });
    });
</script>

<style>
    /* Custom animations */
    @keyframes slide-in {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

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

    .animate-slide-in {
        animation: slide-in 0.5s ease-out;
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
        background: linear-gradient(180deg, #FF6B35 0%, #FF8A5B 100%);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(180deg, #e55a2b 0%, #FF6B35 100%);
    }

    /* Print styles */
    @media print {
        .no-print {
            display: none !important;
        }
        
        .group {
            page-break-inside: avoid;
        }
    }

    /* Loading animation */
    .skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }

    @keyframes loading {
        0% {
            background-position: 200% 0;
        }
        100% {
            background-position: -200% 0;
        }
    }

    /* Hover effects */
    .group:hover {
        transform: translateY(-4px);
    }

    /* Pulse animation */
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.7;
        }
    }

    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    /* Gradient text animation */
    @keyframes gradient {
        0%, 100% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
    }

    .animate-gradient {
        background-size: 200% 200%;
        animation: gradient 3s ease infinite;
    }
</style>
@endpush
@endsection