@extends('layouts.backend')

@section('content')
<div class="flex flex-col gap-8">
    <!-- Welcome -->
    <div>
        <h1 class="text-2xl font-bold text-slate-900">
            Good {{ now()->hour < 12 ? 'morning' : (now()->hour < 17 ? 'afternoon' : 'evening') }}, {{ Auth::user()->name }} 👋
        </h1>
        <p class="text-sm text-slate-500 mt-1">Here's what's happening with your projects today.</p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <x-admin.stat-card 
            label="Total Projects" 
            :value="$stats['total_projects']" 
            icon="folder_open" 
            trend="+12%" 
        />
        <x-admin.stat-card 
            label="New Inquiries" 
            :value="$stats['recent_inquiries']->count()" 
            icon="inbox" 
            :trendUp="true"
            trend="Active" 
        />
        <x-admin.stat-card 
            label="Services" 
            :value="$stats['total_services']" 
            icon="widgets" 
        />
        <x-admin.stat-card 
            label="Team Members" 
            :value="$stats['total_employees']" 
            icon="people" 
        />
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
        <!-- Recent Inquiries -->
        <div class="lg:col-span-2">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-slate-900">Recent Inquiries</h2>
                <a href="{{ route('admin.inquiries.index') }}" class="text-sm font-medium text-primary hover:text-primary-dark transition-colors flex items-center gap-1">
                    View all
                    <span class="material-symbols-outlined text-base">arrow_forward</span>
                </a>
            </div>

            <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-slate-100">
                            <th class="px-6 py-3.5 text-xs font-semibold text-slate-500">Name</th>
                            <th class="px-6 py-3.5 text-xs font-semibold text-slate-500">Type</th>
                            <th class="px-6 py-3.5 text-xs font-semibold text-slate-500">Status</th>
                            <th class="px-6 py-3.5 text-xs font-semibold text-slate-500 text-right">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($stats['recent_inquiries'] as $inquiry)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <span class="text-sm font-medium text-slate-900">{{ $inquiry->name }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-xs font-medium text-primary bg-primary/5 px-2.5 py-1 rounded-md">
                                        {{ $inquiry->service_type ?? 'General' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                        {{ $inquiry->status === 'new' ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700' }}">
                                        {{ ucfirst($inquiry->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-xs text-slate-400 text-right">{{ $inquiry->created_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-16 text-center">
                                    <span class="material-symbols-outlined text-slate-300 text-3xl block mb-2">inbox</span>
                                    <p class="text-sm text-slate-400">No inquiries yet</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Active Projects -->
        <div>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-slate-900">Active Projects</h2>
            </div>

            <div class="flex flex-col gap-3">
                @forelse($stats['ongoing_projects'] as $project)
                    <div class="bg-white p-5 rounded-2xl border border-slate-100 hover:border-slate-200 transition-all group">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <span class="text-sm font-semibold text-slate-900 group-hover:text-primary transition-colors">{{ $project->title }}</span>
                                <p class="text-xs text-slate-400 mt-0.5">{{ $project->service->name ?? 'No service' }}</p>
                            </div>
                            <span class="px-2 py-0.5 rounded-md text-[10px] font-semibold uppercase
                                {{ $project->status === 'in_progress' ? 'bg-blue-50 text-blue-600' : 'bg-amber-50 text-amber-600' }}">
                                {{ str_replace('_', ' ', $project->status) }}
                            </span>
                        </div>
                        
                        <div class="space-y-2">
                            <div class="flex justify-between text-xs text-slate-500">
                                <span>Progress</span>
                                <span class="font-medium">{{ $project->status === 'completed' ? '100' : ($project->status === 'in_progress' ? '65' : '10') }}%</span>
                            </div>
                            <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-primary rounded-full transition-all duration-1000" 
                                     style="width: {{ $project->status === 'completed' ? '100%' : ($project->status === 'in_progress' ? '65%' : '10%') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-8 rounded-2xl border border-dashed border-slate-200 text-center">
                        <span class="material-symbols-outlined text-slate-300 text-2xl block mb-2">folder_off</span>
                        <p class="text-sm text-slate-400">No active projects</p>
                    </div>
                @endforelse

                <a href="{{ route('admin.projects.create') }}" class="flex items-center justify-center gap-2 px-4 py-3 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors">
                    <span class="material-symbols-outlined text-lg">add</span>
                    New Project
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
