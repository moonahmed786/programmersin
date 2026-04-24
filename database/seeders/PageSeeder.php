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
                ],
            ],
            [
                'title' => 'Services',
                'slug' => 'services',
                'is_published' => true,
                'content' => [
                    [
                        'type' => 'text_image',
                        'data' => [
                            'title' => 'Our Core Capabilities',
                            'text' => 'We specialize in high-precision engineering across AI integration, custom software architecture, and enterprise-grade infrastructure. Our 14-day delivery blueprint ensures you move from concept to deployment with unparalleled velocity.',
                            'image' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&q=80&w=2070',
                            'image_position' => 'left',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Products',
                'slug' => 'products',
                'is_published' => true,
                'content' => [
                    [
                        'type' => 'text_image',
                        'data' => [
                            'title' => 'Engineered Solutions',
                            'text' => 'Explore our range of proprietary internal tools and accelerators designed to give your enterprise a competitive edge in the digital monarchy.',
                            'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80&w=2070',
                            'image_position' => 'right',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Pricing',
                'slug' => 'pricing',
                'is_published' => true,
                'content' => [
                    [
                        'type' => 'text_image',
                        'data' => [
                            'title' => 'Transparent Value',
                            'text' => 'Our pricing is structured for maximum impact. We offer fixed-fee 14-day sprints and ongoing architectural support tailored to your scale.',
                            'image' => null,
                            'image_position' => 'left',
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
            [
                'title' => 'Terms of Service',
                'slug' => 'terms-of-service',
                'is_published' => true,
                'content' => [
                    [
                        'type' => 'text_image',
                        'data' => [
                            'title' => 'Legal Framework',
                            'text' => 'By leveraging our velocity engineering services, you agree to our standard terms of engagement focused on mutual excellence and structural integrity.',
                            'image' => null,
                            'image_position' => 'left',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact-us',
                'is_published' => true,
                'content' => [
                    [
                        'type' => 'text_image',
                        'data' => [
                            'title' => 'Initiate Transmission',
                            'text' => 'Ready to accelerate your technical roadmap? Reach out to our architectural team to begin your 14-day sprint.',
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
