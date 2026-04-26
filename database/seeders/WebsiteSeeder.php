<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ServiceSeeder::class,
            ProjectSeeder::class,
            EmployeeSeeder::class,
            MenuSeeder::class,
            PageSeeder::class,
            PricingSeeder::class,
        ]);
    }
}
