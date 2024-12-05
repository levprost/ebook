<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'user_1',
            'password' => Hash::make('user2024!'),
            'email' => 'user1@truc.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => 'user'
        ]);

        User::create([
            'name' => 'user_2',
            'password' => Hash::make('user2024!'),
            'email' => 'user2@truc.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => 'admin'

        ]);

        User::factory(8)->create();
    }
}
