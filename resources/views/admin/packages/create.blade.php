<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Package</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --dark-orange: #FF6B35;
            --dark-blue: #1E3A8A;
            --white: #FFFFFF;
            --light-gray: #F3F4F6;
            --dark-gray: #374151;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .bg-primary {
            background-color: var(--dark-blue);
        }
        
        .bg-secondary {
            background-color: var(--dark-orange);
        }
        
        .text-primary {
            color: var(--dark-blue);
        }
        
        .text-secondary {
            color: var(--dark-orange);
        }
        
        .border-primary {
            border-color: var(--dark-blue);
        }
        
        .ring-primary {
            --tw-ring-color: var(--dark-blue);
        }
        
        .hover\:bg-primary:hover {
            background-color: var(--dark-blue);
        }
        
        .focus\:ring-primary:focus {
            --tw-ring-color: var(--dark-blue);
        }
        
        .custom-checkbox:checked {
            background-color: var(--dark-orange);
            border-color: var(--dark-orange);
        }
        
        .gradient-header {
            background: linear-gradient(135deg, var(--dark-blue) 0%, var(--dark-orange) 100%);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--dark-blue) 0%, var(--dark-orange) 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--dark-blue);
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.1);
        }
        
        .card-shadow {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .section-divider {
            background: linear-gradient(to right, transparent, var(--dark-orange), transparent);
            height: 1px;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-2">Travel Package Management</h1>
                <p class="text-gray-600">Create amazing travel experiences for your customers</p>
            </div>

            <!-- Main Card -->
            <div class="bg-white rounded-2xl card-shadow overflow-hidden">
                <!-- Card Header -->
                <div class="gradient-header p-8 text-white">
                    <h2 class="text-3xl font-bold flex items-center">
                        <i class="fas fa-suitcase-rolling mr-3"></i>
                        Create New Travel Package
                    </h2>
                    <p class="mt-2 text-blue-100">Fill in the details to create a package that will appear on the destination page</p>
                </div>

                <!-- Form -->
                <form action="/admin/packages/store" method="POST" enctype="multipart/form-data" class="p-8">
                    
                    <!-- Basic Information Section -->
                    <div class="mb-10">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-orange-500 flex items-center justify-center text-white font-bold mr-3">1</div>
                            <h3 class="text-xl font-bold text-gray-800">Basic Information</h3>
                        </div>
                        <div class="section-divider mb-6"></div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="group">
                                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-tag text-orange-500 mr-1"></i>
                                    Package Title <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="title" id="title"
                                       placeholder="e.g., Golden Triangle Tour"
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                       required>
                            </div>

                            <div class="group">
                                <label for="subtitle" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-quote-left text-orange-500 mr-1"></i>
                                    Subtitle/Short Description
                                </label>
                                <input type="text" name="subtitle" id="subtitle"
                                       placeholder="e.g., Shimla - Manali - Dharamshala"
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100">
                            </div>

                            <div class="group">
                                <label for="destination_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-map-marker-alt text-orange-500 mr-1"></i>
                                    Destination <span class="text-red-500">*</span>
                                </label>
                                <select name="destination_id" id="destination_id"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                        required>
                                    <option value="">Select Destination</option>
                                    <option value="1">Himachal Pradesh</option>
                                    <option value="2">Rajasthan</option>
                                    <option value="3">Kerala</option>
                                    <option value="4">Goa</option>
                                </select>
                            </div>

                            <div class="group">
                                <label for="country" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-globe text-orange-500 mr-1"></i>
                                    Country <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="country" id="country" value="INDIA"
                                       placeholder="e.g., INDIA"
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                       required>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing and Duration Section -->
                    <div class="mb-10">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-orange-500 flex items-center justify-center text-white font-bold mr-3">2</div>
                            <h3 class="text-xl font-bold text-gray-800">Pricing & Duration</h3>
                        </div>
                        <div class="section-divider mb-6"></div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="group">
                                <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-dollar-sign text-orange-500 mr-1"></i>
                                    Price (USD) <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-3.5 text-gray-500 font-bold">$</span>
                                    <input type="number" name="price" id="price" value="1299" step="0.01" min="0"
                                           class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                           required>
                                </div>
                            </div>

                            <div class="group">
                                <label for="price_unit" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-users text-orange-500 mr-1"></i>
                                    Price Unit <span class="text-red-500">*</span>
                                </label>
                                <select name="price_unit" id="price_unit"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                        required>
                                    <option value="per person">Per Person</option>
                                    <option value="per couple">Per Couple</option>
                                    <option value="per group">Per Group</option>
                                    <option value="total">Total Package</option>
                                </select>
                            </div>

                            <div class="group">
                                <label for="duration" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-clock text-orange-500 mr-1"></i>
                                    Duration <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="duration" id="duration" value="8 Days 7 Nights"
                                       placeholder="e.g., 8 Days 7 Nights"
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                       required>
                            </div>
                        </div>
                    </div>

                    <!-- Location and Description Section -->
                    <div class="mb-10">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-orange-500 flex items-center justify-center text-white font-bold mr-3">3</div>
                            <h3 class="text-xl font-bold text-gray-800">Location & Description</h3>
                        </div>
                        <div class="section-divider mb-6"></div>

                        <div class="grid grid-cols-1 gap-6">
                            <div class="group">
                                <label for="location" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-route text-orange-500 mr-1"></i>
                                    Location/Route <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="location" id="location"
                                       placeholder="e.g., Shimla - Manali - Dharamshala - Rishikesh | Mountain peaks and spiritual retreats"
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                       required>
                            </div>

                            <div class="group">
                                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-align-left text-orange-500 mr-1"></i>
                                    Full Description <span class="text-red-500">*</span>
                                </label>
                                <textarea name="description" id="description" rows="4"
                                          placeholder="Provide a detailed description of the package..."
                                          class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                          required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Features and Tags Section -->
                    <div class="mb-10">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-orange-500 flex items-center justify-center text-white font-bold mr-3">4</div>
                            <h3 class="text-xl font-bold text-gray-800">Features & Tags</h3>
                        </div>
                        <div class="section-divider mb-6"></div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="group">
                                <label for="features" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-check-circle text-orange-500 mr-1"></i>
                                    Features (comma-separated)
                                </label>
                                <textarea name="features" id="features" rows="3"
                                          placeholder="Hotel accommodation, Breakfast included, Airport transfer, Sightseeing tours"
                                          class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"></textarea>
                                <p class="mt-1 text-xs text-gray-500">Enter features separated by commas</p>
                            </div>

                            <div class="group">
                                <label for="tags" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-hashtag text-orange-500 mr-1"></i>
                                    Tags (comma-separated)
                                </label>
                                <textarea name="tags" id="tags" rows="3"
                                          placeholder="Trekking, Yoga Retreat, Adventure, Family, Honeymoon"
                                          class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"></textarea>
                                <p class="mt-1 text-xs text-gray-500">Tags help customers find relevant packages</p>
                            </div>
                        </div>
                    </div>

                    <!-- Image Upload Section -->
                    <div class="mb-10">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-orange-500 flex items-center justify-center text-white font-bold mr-3">5</div>
                            <h3 class="text-xl font-bold text-gray-800">Package Image</h3>
                        </div>
                        <div class="section-divider mb-6"></div>

                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-image text-orange-500 mr-1"></i>
                                Image Source
                            </label>
                            <select name="image_mode" id="image_mode" 
                                    class="w-full max-w-xs px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                    onchange="toggleImageInputs()">
                                <option value="upload">Upload</option>
                                <option value="url">Image URL</option>
                            </select>
                        </div>

                        <!-- Upload input -->
                        <div id="imageUploadWrap">
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-gray-300 rounded-xl hover:border-orange-400 transition-colors bg-gray-50">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-700 px-2 py-1">
                                            <span>Upload a file</span>
                                            <input id="image" name="image" type="file" accept="image/*" class="sr-only" onchange="previewFile(event)">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, WEBP up to 4MB</p>
                                </div>
                            </div>
                        </div>

                        <!-- URL input -->
                        <div id="imageUrlWrap" class="hidden">
                            <input name="image_url" id="image_url" type="url"
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                   oninput="previewUrl(this.value)" 
                                   placeholder="https://example.com/photo.jpg">
                        </div>

                        <!-- Preview -->
                        <div id="imagePreview" class="mt-6 hidden">
                            <img id="preview" src="" alt="Preview" class="w-full max-w-md mx-auto rounded-xl shadow-lg">
                        </div>
                    </div>

                    <!-- Rating and Reviews Section -->
                    <div class="mb-10">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-orange-500 flex items-center justify-center text-white font-bold mr-3">6</div>
                            <h3 class="text-xl font-bold text-gray-800">Rating & Reviews (Optional)</h3>
                        </div>
                        <div class="section-divider mb-6"></div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="group">
                                <label for="rating" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-star text-orange-500 mr-1"></i>
                                    Rating (0-5)
                                </label>
                                <input type="number" name="rating" id="rating" value="4.9" step="0.1" min="0" max="5"
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100">
                            </div>

                            <div class="group">
                                <label for="total_reviews" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-comments text-orange-500 mr-1"></i>
                                    Total Reviews
                                </label>
                                <input type="number" name="total_reviews" id="total_reviews" value="0" min="0"
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100">
                            </div>
                        </div>
                    </div>

                    <!-- Status and Display Options Section -->
                    <div class="mb-10">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-orange-500 flex items-center justify-center text-white font-bold mr-3">7</div>
                            <h3 class="text-xl font-bold text-gray-800">Status & Display Options</h3>
                        </div>
                        <div class="section-divider mb-6"></div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="group">
                                <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-toggle-on text-orange-500 mr-1"></i>
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <select name="status" id="status"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                        required>
                                    <option value="active">Active (Visible to customers)</option>
                                    <option value="draft">Draft (Not visible)</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="group">
                                <label for="display_order" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-sort text-orange-500 mr-1"></i>
                                    Display Order
                                </label>
                                <input type="number" name="display_order" id="display_order" value="0" min="0"
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100">
                                <p class="mt-1 text-xs text-gray-500">Lower numbers appear first</p>
                            </div>
                        </div>

                        <div class="mt-6 space-y-4">
                            <label class="flex items-center space-x-3 cursor-pointer p-4 rounded-xl border-2 border-gray-200 hover:border-orange-300 transition-all">
                                <input type="checkbox" name="is_bestseller" value="1"
                                       class="w-5 h-5 text-orange-500 border-gray-300 rounded focus:ring-orange-500">
                                <span class="text-sm font-medium text-gray-700">
                                    <i class="fas fa-fire text-orange-500 mr-2"></i>
                                    Mark as Bestseller
                                </span>
                            </label>

                            <label class="flex items-center space-x-3 cursor-pointer p-4 rounded-xl border-2 border-gray-200 hover:border-orange-300 transition-all">
                                <input type="checkbox" name="is_featured" value="1"
                                       class="w-5 h-5 text-purple-500 border-gray-300 rounded focus:ring-purple-500">
                                <span class="text-sm font-medium text-gray-700">
                                    <i class="fas fa-star text-purple-500 mr-2"></i>
                                    Mark as Featured
                                </span>
                            </label>
                        </div>
                    </div>

                    <!-- Detailed Content Section -->
                    <div class="mb-10">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-orange-500 flex items-center justify-center text-white font-bold mr-3">8</div>
                            <h3 class="text-xl font-bold text-gray-800">Detailed Content</h3>
                        </div>
                        <div class="section-divider mb-6"></div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-check text-green-500 mr-1"></i>
                                    Inclusions (one per line)
                                </label>
                                <textarea name="inclusions" rows="6"
                                        placeholder="Airport transfers&#10;Breakfast&#10;City tour&#10;Professional guide"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"></textarea>
                            </div>

                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-times text-red-500 mr-1"></i>
                                    Exclusions (one per line)
                                </label>
                                <textarea name="exclusions" rows="6"
                                        placeholder="International flights&#10;Insurance&#10;Personal expenses&#10;Tips"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"></textarea>
                            </div>
                        </div>

                        <div class="mt-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-calendar-alt text-orange-500 mr-1"></i>
                                Itinerary (one day per line)
                            </label>
                            <textarea name="itinerary" rows="6"
                                    placeholder="Day 1: Arrival & transfer to hotel&#10;Day 2: City highlights & Gardens by the Bay&#10;Day 3: Cultural tour & shopping&#10;Day 4: Adventure activities"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"></textarea>
                        </div>

                        <div class="mt-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-images text-orange-500 mr-1"></i>
                                Gallery URLs (comma separated)
                            </label>
                            <input type="text" name="gallery_urls"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl transition-all duration-300 hover:border-orange-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                placeholder="https://image1.jpg, https://image2.jpg, https://image3.jpg">
                            <p class="text-xs text-gray-500 mt-1">Paste public image links, separated by commas.</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center pt-8 border-t-2 border-gray-100">
                        <a href="/admin/packages" 
                           class="px-8 py-3 border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 flex items-center">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Cancel
                        </a>
                        
                        <div class="flex space-x-4">
                            <button type="button" 
                                    class="px-8 py-3 border-2 border-blue-500 text-blue-600 rounded-xl font-semibold hover:bg-blue-50 transition-all duration-300 flex items-center">
                                <i class="fas fa-save mr-2"></i>
                                Save as Draft
                            </button>
                            
                            <button type="submit" 
                                    class="px-8 py-3 btn-primary text-white rounded-xl font-semibold flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                Create Package
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="mt-8 text-center text-gray-600">
                <p class="text-sm">
                    <i class="fas fa-info-circle mr-1"></i>
                    All fields marked with <span class="text-red-500">*</span> are required
                </p>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function toggleImageInputs() {
            var mode = document.getElementById('image_mode').value;
            document.getElementById('imageUploadWrap').classList.toggle('hidden', mode !== 'upload');
            document.getElementById('imageUrlWrap').classList.toggle('hidden', mode !== 'url');
            if (mode === 'upload') {
                var iu = document.getElementById('image_url');
                if (iu) iu.value = '';
                hidePreview();
            }
        }

        function previewFile(ev) {
            var f = ev.target.files && ev.target.files[0];
            if (!f) return;
            var reader = new FileReader();
            reader.onload = function(e) {
                showPreview(e.target.result);
            };
            reader.readAsDataURL(f);
        }

        function previewUrl(url) {
            if (!url) {
                hidePreview();
                return;
            }
            showPreview(url);
        }

        function showPreview(src) {
            var wrap = document.getElementById('imagePreview');
            var img = document.getElementById('preview');
            if (!img) {
                img = document.createElement('img');
                img.id = 'preview';
                img.alt = 'Preview';
                img.className = 'w-full max-w-md mx-auto rounded-xl shadow-lg';
                wrap.appendChild(img);
            }
            img.src = src;
            wrap.classList.remove('hidden');
        }

        function hidePreview() {
            var wrap = document.getElementById('imagePreview');
            var img = document.getElementById('preview');
            if (img) img.removeAttribute('src');
            wrap.classList.add('hidden');
        }

        // Initialize on load
        document.addEventListener('DOMContentLoaded', function() {
            toggleImageInputs();
            
            // Add smooth scroll behavior
            document.querySelectorAll('input, select, textarea').forEach(function(el) {
                el.addEventListener('focus', function() {
                    this.scrollIntoView({ behavior: 'smooth', block: 'center' });
                });
            });
            
            // Add form validation feedback
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show success animation
                const btn = e.target.querySelector('button[type="submit"]');
                btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Creating...';
                btn.disabled = true;
                
                // Simulate form submission
                setTimeout(function() {
                    btn.innerHTML = '<i class="fas fa-check mr-2"></i> Package Created!';
                    btn.classList.add('bg-green-500');
                    
                    setTimeout(function() {
                        // In production, this would submit the form
                        alert('Package created successfully! (Demo mode)');
                        btn.innerHTML = '<i class="fas fa-check-circle mr-2"></i> Create Package';
                        btn.classList.remove('bg-green-500');
                        btn.disabled = false;
                    }, 1500);
                }, 2000);
            });
            
            // Add character counter for textareas
            document.querySelectorAll('textarea').forEach(function(textarea) {
                const counter = document.createElement('div');
                counter.className = 'text-xs text-gray-400 text-right mt-1';
                counter.textContent = '0 characters';
                textarea.parentNode.insertBefore(counter, textarea.nextSibling);
                
                textarea.addEventListener('input', function() {
                    counter.textContent = this.value.length + ' characters';
                });
            });
        });
    </script>
</body>
</html>