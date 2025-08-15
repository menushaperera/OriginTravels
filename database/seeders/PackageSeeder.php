<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'destination_id' => 1, // India
                'title' => 'Golden Triangle Tour',
                'subtitle' => 'Delhi - Agra - Jaipur',
                'description' => 'Experience the magic of India\'s most famous tourist circuit covering Delhi, Agra, and Jaipur. Visit the iconic Taj Mahal, explore majestic forts, and immerse yourself in rich culture.',
                'price' => 1299.00,
                'price_unit' => 'per person',
                'duration' => '8 Days 7 Nights',
                'location' => 'Delhi - Agra - Jaipur',
                'country' => 'INDIA',
                'image_url' => '/images/packages/golden-triangle.jpg',
                'thumbnail_url' => '/images/packages/golden-triangle-thumb.jpg',
                'features' => json_encode(['Hotel accommodation', 'Breakfast included', 'Airport transfer', 'Professional guide', 'Entry tickets']),
                'tags' => json_encode(['Cultural', 'Heritage', 'Sightseeing']),
                'rating' => 4.9,
                'total_reviews' => 245,
                'is_bestseller' => true,
                'is_featured' => true,
                'status' => 'active',
                'display_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'destination_id' => 1, // India
                'title' => 'Himalayan Adventure',
                'subtitle' => 'Shimla - Manali - Dharamshala - Rishikesh',
                'description' => 'Journey through the breathtaking Himalayas with mountain peaks, spiritual retreats, and adventure activities.',
                'price' => 1599.00,
                'price_unit' => 'per person',
                'duration' => '10 Days 9 Nights',
                'location' => 'Shimla - Manali - Dharamshala - Rishikesh',
                'country' => 'INDIA',
                'image_url' => '/images/packages/himalayan.jpg',
                'thumbnail_url' => '/images/packages/himalayan-thumb.jpg',
                'features' => json_encode(['Hotel accommodation', 'All meals', 'Trekking equipment', 'Professional guide', 'Yoga sessions']),
                'tags' => json_encode(['Trekking', 'Yoga Retreat', 'Adventure']),
                'rating' => 4.8,
                'total_reviews' => 189,
                'is_bestseller' => false,
                'is_featured' => true,
                'status' => 'active',
                'display_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'destination_id' => 2, // Maldives
                'title' => 'Maldives Paradise Escape',
                'subtitle' => 'Overwater Villa Experience',
                'description' => 'Indulge in luxury at pristine beaches with crystal-clear waters, world-class diving, and overwater bungalows.',
                'price' => 2499.00,
                'price_unit' => 'per couple',
                'duration' => '5 Days 4 Nights',
                'location' => 'Male - Resort Island',
                'country' => 'MALDIVES',
                'image_url' => '/images/packages/maldives.jpg',
                'thumbnail_url' => '/images/packages/maldives-thumb.jpg',
                'features' => json_encode(['Overwater villa', 'All inclusive', 'Spa treatments', 'Water sports', 'Snorkeling gear']),
                'tags' => json_encode(['Beach', 'Luxury', 'Honeymoon']),
                'rating' => 4.9,
                'total_reviews' => 567,
                'is_bestseller' => true,
                'is_featured' => true,
                'status' => 'active',
                'display_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'destination_id' => 3, // Bali
                'title' => 'Bali Cultural Journey',
                'subtitle' => 'Ubud - Seminyak - Nusa Dua',
                'description' => 'Discover Bali\'s rich culture, stunning temples, terraced rice fields, and beautiful beaches.',
                'price' => 999.00,
                'price_unit' => 'per person',
                'duration' => '7 Days 6 Nights',
                'location' => 'Ubud - Seminyak - Nusa Dua',
                'country' => 'INDONESIA',
                'image_url' => '/images/packages/bali.jpg',
                'thumbnail_url' => '/images/packages/bali-thumb.jpg',
                'features' => json_encode(['Villa accommodation', 'Daily breakfast', 'Temple tours', 'Cooking class', 'Beach club access']),
                'tags' => json_encode(['Cultural', 'Beach', 'Wellness']),
                'rating' => 4.7,
                'total_reviews' => 432,
                'is_bestseller' => true,
                'is_featured' => false,
                'status' => 'active',
                'display_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'destination_id' => 4, // Dubai
                'title' => 'Dubai Luxury Experience',
                'subtitle' => 'City Tour & Desert Safari',
                'description' => 'Experience the opulence of Dubai with city tours, desert safaris, and world-class shopping.',
                'price' => 1799.00,
                'price_unit' => 'per person',
                'duration' => '6 Days 5 Nights',
                'location' => 'Dubai City - Desert',
                'country' => 'UAE',
                'image_url' => '/images/packages/dubai.jpg',
                'thumbnail_url' => '/images/packages/dubai-thumb.jpg',
                'features' => json_encode(['5-star hotel', 'Desert safari', 'Burj Khalifa tickets', 'Dubai Mall tour', 'Airport transfers']),
                'tags' => json_encode(['Luxury', 'Shopping', 'Adventure']),
                'rating' => 4.8,
                'total_reviews' => 312,
                'is_bestseller' => false,
                'is_featured' => true,
                'status' => 'active',
                'display_order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'destination_id' => 5, // Singapore
                'title' => 'Singapore City Explorer',
                'subtitle' => 'Gardens by the Bay - Sentosa - Marina Bay',
                'description' => 'Explore the Lion City with its futuristic architecture, lush gardens, and diverse culinary scene.',
                'price' => 1199.00,
                'price_unit' => 'per person',
                'duration' => '5 Days 4 Nights',
                'location' => 'Singapore City - Sentosa Island',
                'country' => 'SINGAPORE',
                'image_url' => '/images/packages/singapore.jpg',
                'thumbnail_url' => '/images/packages/singapore-thumb.jpg',
                'features' => json_encode(['Hotel accommodation', 'Universal Studios tickets', 'Gardens by the Bay', 'Night Safari', 'City tour']),
                'tags' => json_encode(['City Break', 'Family', 'Entertainment']),
                'rating' => 4.6,
                'total_reviews' => 278,
                'is_bestseller' => false,
                'is_featured' => false,
                'status' => 'active',
                'display_order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('packages')->insert($packages);
    }
}