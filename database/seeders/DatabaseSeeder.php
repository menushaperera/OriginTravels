<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call your custom seeder for Admins
        $this->call(AdminUserSeeder::class);

        // Optionally create one test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            DestinationSeeder::class,
            PackageSeeder::class, // Optional - only if you want sample packages
        ]);
    }
}
