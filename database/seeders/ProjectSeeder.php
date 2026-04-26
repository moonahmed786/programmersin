<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $customer = User::updateOrCreate(
            ['email' => 'customer@programmersin.com'],
            ['name' => 'Demo Customer', 'password' => bcrypt('password'), 'role' => 'customer']
        );

        $aiService     = Service::where('slug', 'ai-engineering')->first();
        $saasService   = Service::where('slug', 'saas-product-studio')->first();
        $cloudService  = Service::where('slug', 'cloud-devops')->first();
        $dataService   = Service::where('slug', 'data-engineering')->first();
        $secService    = Service::where('slug', 'security-compliance')->first();
        $mobileService = Service::where('slug', 'mobile-development')->first();

        $projects = [
            [
                'title'                => 'Nexus CRM AI',
                'description'         => 'A unified customer intelligence platform powered by GPT-4 for enterprise teams.',
                'status'              => 'completed',
                'is_public'           => true,
                'slug'                => 'nexus-crm-ai',
                'showcase_description'=> 'We unified 12 fragmented data streams into a single agentic interface with real-time lead scoring, automated follow-ups, and a custom RAG retrieval engine that reduced sales cycle time by 38%.',
                'service_id'          => $aiService?->id,
                'customer_id'         => $customer->id,
                'budget'              => 45000,
            ],
            [
                'title'                => 'SecureTrack Pro',
                'description'         => 'Enterprise-grade security monitoring and threat intelligence for fintech.',
                'status'              => 'completed',
                'is_public'           => true,
                'slug'                => 'securetrack-pro',
                'showcase_description'=> 'Built zero-latency anomaly detection with a custom Rust-based middleware for high-speed packet inspection. The React threat dashboard processes 2M events/sec with sub-20ms visual updates.',
                'service_id'          => $secService?->id ?? $saasService?->id,
                'customer_id'         => $customer->id,
                'budget'              => 67000,
            ],
            [
                'title'                => 'SkyNet ERP',
                'description'         => 'Cloud-native enterprise resource planning for large-scale manufacturing.',
                'status'              => 'completed',
                'is_public'           => true,
                'slug'                => 'skynet-erp',
                'showcase_description'=> 'Multi-tenant database architecture supporting 100k+ concurrent transactions on AWS Lambda. Auto-scaling reduced infrastructure costs by 60% while improving P99 latency by 4x.',
                'service_id'          => $saasService?->id,
                'customer_id'         => $customer->id,
                'budget'              => 89000,
            ],
            [
                'title'                => 'DataPulse Analytics',
                'description'         => 'Real-time streaming analytics platform for e-commerce decision intelligence.',
                'status'              => 'completed',
                'is_public'           => true,
                'slug'                => 'datapulse-analytics',
                'showcase_description'=> 'End-to-end Kafka + Spark pipeline processing 50GB/day of clickstream data with a live BI dashboard. Reduced reporting lag from 24 hours to under 30 seconds.',
                'service_id'          => $dataService?->id ?? $cloudService?->id,
                'customer_id'         => $customer->id,
                'budget'              => 52000,
            ],
            [
                'title'                => 'FleetOS Mobile',
                'description'         => 'Cross-platform logistics fleet management app for 500+ vehicle operations.',
                'status'              => 'completed',
                'is_public'           => true,
                'slug'                => 'fleetos-mobile',
                'showcase_description'=> 'React Native app with offline-first architecture, live GPS tracking, and AI-powered route optimization. Deployed simultaneously on iOS and Android with 99.2% crash-free sessions.',
                'service_id'          => $mobileService?->id ?? $saasService?->id,
                'customer_id'         => $customer->id,
                'budget'              => 38000,
            ],
            [
                'title'                => 'CloudVault Platform',
                'description'         => 'Zero-trust cloud storage and compliance platform for regulated industries.',
                'status'              => 'completed',
                'is_public'           => true,
                'slug'                => 'cloudvault-platform',
                'showcase_description'=> 'AES-256 encrypted multi-region object storage with full SOC 2 Type II compliance. Automated audit trails and GDPR-ready data residency controls deployed on AWS GovCloud.',
                'service_id'          => $cloudService?->id ?? $secService?->id,
                'customer_id'         => $customer->id,
                'budget'              => 74000,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }
    }
}
