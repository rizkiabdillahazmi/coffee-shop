<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            // 'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Karyawan',
            'username' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'role' => 'karyawan',
            'email_verified_at' => now(),
            'password' => bcrypt('karyawan'),
            // 'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'email_verified_at' => now(),
            'password' => bcrypt('user'),
            // 'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(5)->create();
    }
}
