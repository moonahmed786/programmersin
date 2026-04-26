<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title'       => 'AI Engineering',
                'description' => 'LLM-powered pipelines, RAG systems, custom agentic AI, and intelligent automation for enterprise workflows.',
                'price'       => 4999,
                'icon'        => 'smart_toy',
                'order'       => 1,
                'is_active'   => true,
            ],
            [
                'title'       => 'SaaS Product Studio',
                'description' => 'Multi-tenant web platforms built for global scale. From MVP to production in 14 days with battle-tested architecture.',
                'price'       => 2999,
                'icon'        => 'cloud_sync',
                'order'       => 2,
                'is_active'   => true,
            ],
            [
                'title'       => 'Cloud & DevOps',
                'description' => 'Zero-downtime AWS/Azure migrations, Kubernetes orchestration, CI/CD pipelines, and infrastructure as code.',
                'price'       => 1999,
                'icon'        => 'terminal',
                'order'       => 3,
                'is_active'   => true,
            ],
            [
                'title'       => 'UI/UX Design Systems',
                'description' => 'Premium design systems, high-fidelity interfaces, and accessible component libraries built for user delight.',
                'price'       => 1499,
                'icon'        => 'palette',
                'order'       => 4,
                'is_active'   => true,
            ],
            [
                'title'       => 'Mobile Development',
                'description' => 'Native iOS & Android apps and cross-platform React Native / Flutter solutions for global audiences.',
                'price'       => 2499,
                'icon'        => 'smartphone',
                'order'       => 5,
                'is_active'   => true,
            ],
            [
                'title'       => 'Security & Compliance',
                'description' => 'Penetration testing, SOC 2 / ISO 27001 readiness, OWASP hardening, and enterprise security audits.',
                'price'       => 3499,
                'icon'        => 'security',
                'order'       => 6,
                'is_active'   => true,
            ],
            [
                'title'       => 'Data Engineering',
                'description' => 'End-to-end ETL pipelines, data warehouses, real-time streaming, and business intelligence dashboards.',
                'price'       => 2799,
                'icon'        => 'analytics',
                'order'       => 7,
                'is_active'   => true,
            ],
            [
                'title'       => 'Legacy Modernization',
                'description' => 'Systematically migrate monoliths to microservices and modernize tech stacks with zero business disruption.',
                'price'       => 3999,
                'icon'        => 'autorenew',
                'order'       => 8,
                'is_active'   => true,
            ],
        ];

        foreach ($services as $service) {
            $service['slug'] = Str::slug($service['title']);
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
