<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have a customer user to own these projects
        $customer = User::updateOrCreate(
            ['email' => 'customer@programmersin.com'],
            [
                'name' => 'Demo Customer',
                'password' => bcrypt('password'),
                'role' => 'customer'
            ]
        );

        $aiService = Service::where('title', 'AI Engineering Unit')->first();
        $saasService = Service::where('title', 'SaaS Product Studio')->first();

        $projects = [
            [
                'title' => 'Nexus CRM AI',
                'description' => 'A unified customer platform for modern enterprises.',
                'status' => 'completed',
                'is_public' => true,
                'slug' => 'nexus-crm-ai',
                'showcase_description' => 'The challenge was unifying 12 fragmented data streams into a single agentic interface. We built Nexus using a headless architecture, integrating multiple LLMs for real-time lead scoring and automated follow-ups.',
                'service_id' => $aiService?->id,
                'customer_id' => $customer->id,
            ],
            [
                'title' => 'SecureTrack Pro',
                'description' => 'Enterprise-grade security monitoring for fintech.',
                'status' => 'completed',
                'is_public' => true,
                'slug' => 'securetrack-pro',
                'showcase_description' => 'SecureTrack required zero-latency anomaly detection. We implemented a custom Rust-based middleware for high-speed packet inspection and a React Dashboard for visual threat intelligence.',
                'service_id' => $saasService?->id,
                'customer_id' => $customer->id,
            ],
            [
                'title' => 'SkyNet ERP',
                'description' => 'Cloud-native resource planning for manufacturing.',
                'status' => 'completed',
                'is_public' => true,
                'slug' => 'skynet-erp',
                'showcase_description' => 'Scaling SkyNet involved architecting a multi-tenant database structure that supports 100k+ concurrent transactions without performance degradation on AWS Lambda.',
                'service_id' => $saasService?->id,
                'customer_id' => $customer->id,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }
    }
}
