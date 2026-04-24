<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Header Menus
        $headerItems = [
            ['title' => 'Home', 'url' => '/', 'order' => 1, 'location' => 'header'],
            ['title' => 'Services', 'url' => '/services', 'order' => 2, 'location' => 'header'],
            ['title' => 'Products', 'url' => '/products', 'order' => 3, 'location' => 'header'],
            ['title' => 'Portfolio', 'url' => '/portfolio', 'order' => 4, 'location' => 'header'],
            ['title' => 'Pricing', 'url' => '/pricing', 'order' => 5, 'location' => 'header'],
        ];

        foreach ($headerItems as $item) {
            Menu::updateOrCreate(
                ['title' => $item['title'], 'location' => 'header', 'parent_id' => null],
                $item
            );
        }

        // Footer Services Categories
        $company = Menu::updateOrCreate(
            ['title' => 'Company', 'location' => 'footer', 'parent_id' => null],
            ['url' => '#', 'order' => 1, 'is_active' => true]
        );

        $companyItems = [
            ['title' => 'About Us', 'url' => '/about-us', 'order' => 1, 'parent_id' => $company->id, 'location' => 'footer'],
            ['title' => 'Careers', 'url' => '#', 'order' => 2, 'parent_id' => $company->id, 'location' => 'footer'],
        ];

        foreach ($companyItems as $item) {
            Menu::updateOrCreate(
                ['title' => $item['title'], 'location' => 'footer', 'parent_id' => $company->id],
                $item
            );
        }

        $legal = Menu::updateOrCreate(
            ['title' => 'Legal', 'location' => 'footer', 'parent_id' => null],
            ['url' => '#', 'order' => 2, 'is_active' => true]
        );

        $legalItems = [
            ['title' => 'Privacy Policy', 'url' => '/privacy-policy', 'order' => 1, 'parent_id' => $legal->id, 'location' => 'footer'],
            ['title' => 'Terms of Service', 'url' => '/terms-of-service', 'order' => 2, 'parent_id' => $legal->id, 'location' => 'footer'],
        ];

        foreach ($legalItems as $item) {
            Menu::updateOrCreate(
                ['title' => $item['title'], 'location' => 'footer', 'parent_id' => $legal->id],
                $item
            );
        }
    }
}
