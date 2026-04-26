<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $employees = [
            ['name' => 'Alex Rivera',    'email' => 'alex@programmersin.com',    'position' => 'Lead AI Engineer',        'bio' => 'Specializes in LLM pipelines and RAG architectures.'],
            ['name' => 'Layla Hassan',   'email' => 'layla@programmersin.com',   'position' => 'Senior Full-Stack Dev',    'bio' => 'Expert in Next.js, Laravel, and cloud-native systems.'],
            ['name' => 'Marcus Chen',    'email' => 'marcus@programmersin.com',  'position' => 'DevOps Architect',        'bio' => 'Kubernetes, AWS, and zero-downtime deployment specialist.'],
            ['name' => 'Priya Patel',    'email' => 'priya@programmersin.com',   'position' => 'UI/UX Design Lead',       'bio' => 'Crafts premium design systems and high-fidelity interfaces.'],
            ['name' => 'James Okafor',   'email' => 'james@programmersin.com',   'position' => 'Backend Engineer',        'bio' => 'API design, database optimization, and microservices.'],
            ['name' => 'Sofia Mendez',   'email' => 'sofia@programmersin.com',   'position' => 'Mobile Engineer',         'bio' => 'React Native and Flutter development for enterprise apps.'],
            ['name' => 'Tom Nguyen',     'email' => 'tom@programmersin.com',     'position' => 'Security Engineer',       'bio' => 'Penetration testing, compliance, and hardened DevSecOps.'],
            ['name' => 'Amara Diallo',   'email' => 'amara@programmersin.com',   'position' => 'Data Engineer',           'bio' => 'ETL pipelines, data warehouses, and real-time analytics.'],
        ];

        foreach ($employees as $data) {
            User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name'      => $data['name'],
                    'password'  => bcrypt('password'),
                    'role'      => 'employee',
                    'position'  => $data['position'],
                    'bio'       => $data['bio'],
                    'is_active' => true,
                ]
            );
        }
    }
}
