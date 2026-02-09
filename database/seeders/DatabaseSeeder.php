<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Roles
        $roles = [
            ['id' => 1, 'name' => 'Superadmin', 'slug' => 'superadmin'],
            ['id' => 2, 'name' => 'Owner', 'slug' => 'owner'],
            ['id' => 3, 'name' => 'Admin', 'slug' => 'admin'],
            ['id' => 4, 'name' => 'User', 'slug' => 'user'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(['id' => $role['id']], $role);
        }

        // Create Superadmin
        User::updateOrCreate(
            ['email' => 'superadmin@gmail.com'],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('superadmin'),
                'role_id' => 1,
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );
        
        // Create Owner
        User::updateOrCreate(
            ['email' => 'owner@gmail.com'],
            [
                'name' => 'Business Owner',
                'password' => Hash::make('owner'),
                'role_id' => 2,
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // Create Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Staff Admin',
                'password' => Hash::make('admin'),
                'role_id' => 3,
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // Create Pengguna (User)
        User::updateOrCreate(
            ['email' => 'pengguna@gmail.com'],
            [
                'name' => 'Regular User',
                'password' => Hash::make('pengguna'),
                'role_id' => 4,
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
