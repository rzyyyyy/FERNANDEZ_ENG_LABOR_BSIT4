<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'], // change as needed
            [
                'name' => 'Admin',
                'password' => Hash::make('password'), // change as needed
                'role' => 'admin',
            ]
        );
    }
}