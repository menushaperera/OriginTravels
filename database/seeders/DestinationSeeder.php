<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destinations = [
            [
                'name' => 'India',
                'country' => 'India',
                'slug' => 'india',
                'description' => 'Discover the incredible diversity of India, from the majestic Himalayas to tropical beaches, ancient temples to modern cities.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maldives',
                'country' => 'Maldives',
                'slug' => 'maldives',
                'description' => 'Experience paradise in the Maldives with crystal-clear waters, pristine beaches, and luxurious overwater bungalows.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bali',
                'country' => 'Indonesia',
                'slug' => 'bali',
                'description' => 'Explore the Island of Gods with its stunning beaches, ancient temples, terraced rice paddies, and vibrant culture.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dubai',
                'country' => 'United Arab Emirates',
                'slug' => 'dubai',
                'description' => 'Experience the perfect blend of modern luxury and Arabian tradition in this dazzling desert metropolis.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Singapore',
                'country' => 'Singapore',
                'slug' => 'singapore',
                'description' => 'Discover the Lion City where futuristic architecture meets lush gardens and diverse cultural heritage.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('destinations')->insert($destinations);
    }
}