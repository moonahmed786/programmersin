<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'AI Engineering Unit',
                'description' => 'Architecting LLM-powered workflows, RAG systems, and custom agentic AI solutions for enterprise automation.',
                'price' => 4999,
                'icon' => 'smart_toy',
                'is_active' => true,
            ],
            [
                'title' => 'SaaS Product Studio',
                'description' => 'Turning complex operational requirements into high-velocity multi-tenant web platforms built for global scale.',
                'price' => 2999,
                'icon' => 'cloud_sync',
                'is_active' => true,
            ],
            [
                'title' => 'Cloud & Infrastructure',
                'description' => 'Zero-downtime AWS/Azure migrations, Kubernetes orchestration, and performance optimization for heavy traffic systems.',
                'price' => 1999,
                'icon' => 'terminal',
                'is_active' => true,
            ],
            [
                'title' => 'UI/UX Design Systems',
                'description' => 'Premium, Material-inspired design systems and high-fidelity interfaces focused on accessibility and user delight.',
                'price' => 1499,
                'icon' => 'palette',
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            $service['slug'] = Str::slug($service['title']);
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
