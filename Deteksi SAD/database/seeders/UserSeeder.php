<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel users.
     */
    public function run(): void
    {
        // Admin default
        User::create([
            'name' => 'Admin',
            'password' => Hash::make('password'), // password: password
            'role' => 'admin',
        ]);

        // User contoh
        User::create([
            'name' => 'User',
            'password' => Hash::make('password'), // password: password
            'role' => 'user',
        ]);
    }
}
