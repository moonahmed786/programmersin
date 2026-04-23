<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ServiceSeeder::class,
            ProjectSeeder::class,
            MenuSeeder::class,
            PageSeeder::class,
        ]);
    }
}
