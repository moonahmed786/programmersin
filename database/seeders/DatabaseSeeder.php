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
        User::updateOrCreate(
            ['email' => 'admin@programmersin.com'],
            [
                'name' => 'Super Admin',
                'role' => 'superadmin',
                'password' => bcrypt('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'employee@programmersin.com'],
            [
                'name' => 'John Employee',
                'role' => 'employee',
                'password' => bcrypt('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'customer@programmersin.com'],
            [
                'name' => 'Jane Customer',
                'role' => 'customer',
                'password' => bcrypt('password'),
            ]
        );

        $this->call([
            SettingSeeder::class,
            WebsiteSeeder::class,
        ]);
    }
}
