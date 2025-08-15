@extends('layouts.admin')

@section('title', 'Edit Package')

@section('content')
@php
    /**
     * Normalize possibly-array values (from JSON casts or validation errors)
     * into strings suitable for text inputs / textareas.
     */
    $normalize = function ($value, $sep) {
        if (is_array($value)) return implode($sep, $value);
        return (string)($value ?? '');
    };

    // Prefer old() when present; otherwise use model value.
    $tagsValue        = $normalize(old('tags',        $package->tags        ?? ''), ',');
    $inclusionsValue  = $normalize(old('inclusions',  $package->inclusions  ?? ''), "\n");
    $exclusionsValue  = $normalize(old('exclusions',  $package->exclusions  ?? ''), "\n");
    $itineraryValue   = $normalize(old('itinerary',   $package->itinerary   ?? ''), "\n");
    $galleryUrlsValue = $normalize(old('gallery_urls',$package->gallery_urls?? ''), ',');
@endphp

<div class="min-h-screen bg-gradient-to-br from-[#F3F4F6] via-white to-[#F3F4F6] py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <!-- Enhanced Header -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between">
                <div>
                    <h2 class="text-4xl font-bold bg-gradient-to-r from-[#1E3A8A] to-[#FF6B35] bg-clip-text text-transparent">
                        Edit Package
                    </h2>
                    <p class="text-gray-600 mt-2">Update package details and settings</p>
                </div>
                <div class="mt-4 sm:mt-0 flex gap-3">
                    <a href="{{ route('admin.packages.index', $package) }}" 
                       target="_blank"
                       class="inline-flex items-center px-4 py-2 bg-white border-2 border-gray-300 text-[#374151] rounded-xl font-semibold hover:border-[#FF6B35] hover:text-[#FF6B35] transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-eye mr-2"></i>
                        Preview
                    </a>
                    <a href="{{ route('admin.packages.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-[#374151] to-gray-700 text-white rounded-xl font-semibold hover:from-gray-700 hover:to-[#374151] transform hover:scale-105 transition-all duration-300 shadow-lg">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Packages
                    </a>
                </div>
            </div>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-50 border-2 border-red-200 text-red-700 px-6 py-4 rounded-2xl shadow-lg">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-red-500 text-xl mt-1"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-semibold text-red-800">Please fix the following errors:</h3>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Main Form -->
        <form method="POST" action="{{ route('admin.packages.update', $package) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Basic Information Section -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="bg-gradient-to-r from-[#1E3A8A] to-blue-600 text-white rounded-xl p-3 mr-4">
                        <i class="fas fa-info-circle text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-[#374151]">Basic Information</h3>
                        <p class="text-gray-500 text-sm mt-1">Core package details and identification</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-[#374151] mb-2">
                            Package Title <span class="text-red-500">*</span>
                        </label>
                        <input name="title" type="text" 
                               value="{{ old('title', $package->title) }}" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300"
                               placeholder="Enter an attractive package title"
                               required>
                    </div>

                    <!-- Subtitle -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Subtitle</label>
                        <input name="subtitle" type="text" 
                               value="{{ old('subtitle', $package->subtitle) }}" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300"
                               placeholder="Brief catchy description">
                    </div>

                    <!-- Destination -->
                    <div>
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Destination</label>
                        <select name="destination_id" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                            <option value="">— Select Destination —</option>
                            @foreach(($destinations ?? []) as $d)
                                <option value="{{ $d->id }}" {{ (string)old('destination_id', $package->destination_id) === (string)$d->id ? 'selected' : '' }}>
                                    {{ $d->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Country -->
                    <div>
                        <label class="block text.sm font-semibold text-[#374151] mb-2">Country</label>
                        <input name="country" type="text" 
                               value="{{ old('country', $package->country) }}" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Location</label>
                        <input name="location" type="text" 
                               value="{{ old('location', $package->location) }}" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                    </div>

                    <!-- Duration -->
                    <div>
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Duration</label>
                        <input name="duration" type="text" 
                               value="{{ old('duration', $package->duration) }}" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Description</label>
                        <textarea name="description" rows="5" 
                                  class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">{{ old('description', $package->description) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Pricing Section -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl p-3 mr-4">
                        <i class="fas fa-dollar-sign text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-[#374151]">Pricing Information</h3>
                        <p class="text-gray-500 text-sm mt-1">Set package pricing</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Price</label>
                        <input name="price" type="number" step="0.01" 
                               value="{{ old('price', $package->price) }}" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Price Unit</label>
                        <input name="price_unit" type="text" 
                               value="{{ old('price_unit', $package->price_unit) }}" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Display Order</label>
                        <input name="display_order" type="number" 
                               value="{{ old('display_order', $package->display_order) }}" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                    </div>
                </div>
            </div>

            <!-- Detailed Content Section -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-xl p-3 mr-4">
                        <i class="fas fa-list-ul text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-[#374151]">Package Content</h3>
                        <p class="text-gray-500 text-sm mt-1">Inclusions, exclusions, and itinerary</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Inclusions (one per line)</label>
                        <textarea name="inclusions" rows="6"
                                  class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">{{ $inclusionsValue }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Exclusions (one per line)</label>
                        <textarea name="exclusions" rows="6"
                                  class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">{{ $exclusionsValue }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Itinerary (one day per line)</label>
                        <textarea name="itinerary" rows="6"
                                  class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">{{ $itineraryValue }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Gallery URLs (comma separated)</label>
                        <input type="text" name="gallery_urls"
                               value="{{ $galleryUrlsValue }}"
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                    </div>
                </div>
            </div>

            <!-- Settings Section -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="bg-gradient-to-r from-[#374151] to-gray-700 text-white rounded-xl p-3 mr-4">
                        <i class="fas fa-cog text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-[#374151]">Settings</h3>
                        <p class="text-gray-500 text-sm mt-1">Status and visibility options</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Status *</label>
                        <select name="status" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                            @foreach(['active','inactive','draft'] as $st)
                                <option value="{{ $st }}" {{ old('status', $package->status) === $st ? 'selected' : '' }}>
                                    {{ ucfirst($st) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Image URL</label>
                        <input name="image_url" type="url" 
                               value="{{ old('image_url', $package->image_url) }}" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Rating (0–5)</label>
                        <input name="rating" type="number" step="0.1" min="0" max="5" 
                               value="{{ old('rating', $package->rating) }}" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Total Reviews</label>
                        <input name="total_reviews" type="number" min="0" 
                               value="{{ old('total_reviews', $package->total_reviews) }}" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-[#374151] mb-2">Tags (comma separated)</label>
                        <input name="tags" type="text" 
                               value="{{ $tagsValue }}" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FF6B35] focus:border-[#FF6B35] bg-white hover:border-[#FF6B35]/50 transition-all duration-300" 
                               placeholder="beach,luxury,family">
                    </div>
                </div>

                <!-- Feature Toggles -->
                <div class="mt-6 pt-6 border-t border-gray-200 flex items-center justify-between">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_bestseller" value="1" 
                               class="mr-3 w-5 h-5 text-[#FF6B35] border-gray-300 rounded focus:ring-[#FF6B35]" 
                               {{ old('is_bestseller', $package->is_bestseller) ? 'checked' : '' }}>
                        <span class="text-[#374151] font-semibold">Mark as Bestseller</span>
                    </label>

                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" 
                               class="mr-3 w-5 h-5 text-[#1E3A8A] border-gray-300 rounded focus:ring-[#1E3A8A]" 
                               {{ old('is_featured', $package->is_featured) ? 'checked' : '' }}>
                        <span class="text-[#374151] font-semibold">Featured Package</span>
                    </label>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.packages.index') }}" 
                       class="px-6 py-3 bg-white border-2 border-gray-300 text-[#374151] rounded-xl font-semibold hover:border-[#374151] hover:bg-[#F3F4F6] transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-times mr-2"></i>Cancel
                    </a>
                    <button type="submit" 
                            class="px-8 py-3 bg-gradient-to-r from-[#FF6B35] to-orange-600 text-white rounded-xl font-semibold hover:from-orange-600 hover:to-[#FF6B35] transform hover:scale-105 transition-all duration-300 shadow-lg">
                        <i class="fas fa-check mr-2"></i>Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
