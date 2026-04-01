<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@programmersin.com',
            'role' => 'superadmin',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'John Employee',
            'email' => 'employee@programmersin.com',
            'role' => 'employee',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Jane Customer',
            'email' => 'customer@programmersin.com',
            'role' => 'customer',
            'password' => bcrypt('password'),
        ]);
    }
}
