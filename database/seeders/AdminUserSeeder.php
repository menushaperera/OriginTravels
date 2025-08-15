<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure the Admin role exists
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);

        // Hardcoded list of admin users
        $admins = [
            [
                'name' => 'Menusha Perera',
                'email' => 'origin.admin1@gmail.com',
                'password' => 'Origin1@321',
            ],
            [
                'name' => 'Chamodi Perera',
                'email' => 'origin.admin2@gmail.com',
                'password' => 'Origin2@321',
            ],
            
        ];

        foreach ($admins as $adminData) {
            $user = User::updateOrCreate(
                ['email' => $adminData['email']], // match by email
                [
                    'name' => $adminData['name'],
                    'password' => Hash::make($adminData['password']),
                ]
            );

            // Assign the Admin role (if not already assigned)
            if (!$user->hasRole('Admin')) {
                $user->assignRole($adminRole);
            }
        }
    }
}
