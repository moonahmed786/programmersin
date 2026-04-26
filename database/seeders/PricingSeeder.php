<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'id'          => 'starter',
                'name'        => 'Starter Sprint',
                'badge'       => null,
                'monthly'     => 2999,
                'annual'      => 2399,
                'description' => 'Perfect for startups building their first product fast.',
                'color'       => 'blue',
                'features'    => [
                    ['text' => '1 Concurrent Project',      'included' => true],
                    ['text' => '2 Senior Developers',       'included' => true],
                    ['text' => '14-Day Delivery Guarantee', 'included' => true],
                    ['text' => '3 Revision Rounds',         'included' => true],
                    ['text' => 'Basic CI/CD Pipeline',      'included' => true],
                    ['text' => '48hr Support Response',     'included' => true],
                    ['text' => 'AI Feature Integration',    'included' => false],
                    ['text' => 'Dedicated Architect',       'included' => false],
                ],
                'cta' => 'Start Building',
            ],
            [
                'id'          => 'growth',
                'name'        => 'Growth Engine',
                'badge'       => 'Most Popular',
                'monthly'     => 7999,
                'annual'      => 6399,
                'description' => 'For scaling companies that need sustained velocity.',
                'color'       => 'green',
                'features'    => [
                    ['text' => '3 Concurrent Projects',         'included' => true],
                    ['text' => '5 Senior Developers',           'included' => true],
                    ['text' => '14-Day Sprint Cycles',          'included' => true],
                    ['text' => 'Unlimited Revisions',           'included' => true],
                    ['text' => 'Advanced CI/CD + DevOps',       'included' => true],
                    ['text' => 'Priority Support (4hr SLA)',    'included' => true],
                    ['text' => 'AI Feature Integration',        'included' => true],
                    ['text' => 'Dedicated Architect',           'included' => false],
                ],
                'cta' => 'Ignite Growth',
            ],
            [
                'id'          => 'enterprise',
                'name'        => 'Enterprise Command',
                'badge'       => null,
                'monthly'     => null,
                'annual'      => null,
                'description' => 'Dedicated engineering command for global-scale operations.',
                'color'       => 'purple',
                'features'    => [
                    ['text' => 'Unlimited Projects',          'included' => true],
                    ['text' => 'Dedicated Team (10+)',        'included' => true],
                    ['text' => 'Custom Timelines & SLAs',     'included' => true],
                    ['text' => 'White-Glove Onboarding',      'included' => true],
                    ['text' => 'Enterprise Security Audit',   'included' => true],
                    ['text' => '24/7 Dedicated Support',      'included' => true],
                    ['text' => 'Full AI/ML Engineering',      'included' => true],
                    ['text' => 'CTO-as-a-Service',            'included' => true],
                ],
                'cta' => 'Contact Sales',
            ],
        ];

        Setting::updateOrCreate(
            ['key' => 'pricing_plans'],
            [
                'key'   => 'pricing_plans',
                'value' => json_encode($plans),
                'group' => 'general',
                'label' => 'Pricing Plans (JSON)',
                'type'  => 'textarea',
            ]
        );
    }
}
