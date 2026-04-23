<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'is_published' => true,
                'content' => [
                    [
                        'type' => 'text_image',
                        'data' => [
                            'title' => 'The Velocity First Philosophy',
                            'text' => 'ProgrammersIn was founded on a simple premise: established enterprises shouldn\'t move slower than startups. We provide the architecture and talent to ship high-impact software in record time.',
                            'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=2070',
                            'image_position' => 'right',
                        ],
                    ],
                    [
                        'type' => 'cta',
                        'data' => [
                            'title' => 'Ready to accelerate your roadmap?',
                            'text' => 'Join 150+ global companies scaling with ProgrammersIn.',
                            'button_text' => 'Join the Waitlist',
                            'button_url' => '#contact',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'is_published' => true,
                'content' => [
                    [
                        'type' => 'text_image',
                        'data' => [
                            'title' => 'Your Data, Secured.',
                            'text' => 'At ProgrammersIn, we handle your proprietary data with enterprise-grade security. This policy outlines how we protect and manage your information.',
                            'image' => null,
                            'image_position' => 'left',
                        ],
                    ],
                ],
            ],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
