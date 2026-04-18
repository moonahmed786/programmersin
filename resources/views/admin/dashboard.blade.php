@extends('layouts.backend')

@section('content')
<div class="flex flex-col gap-8 md:gap-10">
    <!-- Welcome Header -->
    <div class="flex flex-col gap-2">
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-primary"></span>
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">System Overview</p>
        </div>
        <h1 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight">
            Dashboard <span class="text-primary opacity-50 font-medium">Overview</span>
        </h1>
        <p class="text-sm text-slate-500 font-medium max-w-2xl">
            Welcome back. Monitor your project performance and recent inquiries through the central dashboard.
        </p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <x-admin.stat-card 
            label="Total Projects" 
            :value="$stats['total_projects']" 
            icon="rocket_launch" 
            trend="+12%" 
        />
        <x-admin.stat-card 
            label="New Inquiries" 
            :value="$stats['recent_inquiries']->count()" 
            icon="mail" 
            :trendUp="true"
            trend="Active" 
        />
        <x-admin.stat-card 
            label="Our Services" 
            :value="$stats['total_services']" 
            icon="layers" 
        />
        <x-admin.stat-card 
            label="Team Members" 
            :value="$stats['total_employees']" 
            icon="group" 
        />
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-10">
        <!-- Recent Inquiries -->
        <div class="lg:col-span-2 flex flex-col gap-6">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-slate-900 tracking-tight">Recent Inquiries</h2>
                <a href="{{ route('admin.inquiries.index') }}" class="text-[11px] font-bold text-primary uppercase tracking-wider hover:underline">
                    View All
                </a>
            </div>

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-slate-100">
                                <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Name</th>
                                <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Service</th>
                                <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Status</th>
                                <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-right">Time</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($stats['recent_inquiries'] as $inquiry)
                                <tr class="hover:bg-slate-50/30 transition-colors">
                                    <td class="px-6 py-5 text-sm font-semibold text-slate-700">{{ $inquiry->name }}</td>
                                    <td class="px-6 py-5">
                                        <span class="text-xs font-medium text-slate-500 bg-slate-100 px-2 py-1 rounded-md">
                                            {{ $inquiry->service_type ?? 'Development' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-5 text-sm">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $inquiry->status === 'new' ? 'bg-emerald-50 text-emerald-600' : 'bg-amber-50 text-amber-600' }}">
                                            {{ $inquiry->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-5 text-[11px] font-medium text-slate-400 text-right">{{ $inquiry->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-20 text-center">
                                        <p class="text-sm font-medium text-slate-400 italic">No recent inquiries to display.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Ongoing Projects -->
        <div class="flex flex-col gap-6">
            <h2 class="text-xl font-bold text-slate-900 tracking-tight">Ongoing Projects</h2>

            <div class="flex flex-col gap-4">
                @forelse($stats['ongoing_projects'] as $project)
                    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm transition-all duration-300 hover:shadow-md">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-slate-800">{{ $project->title }}</span>
                                <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-1">{{ $project->service->name ?? 'Service' }}</span>
                            </div>
                            <span class="px-2 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-600">{{ $project->status }}</span>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                <span>Progress</span>
                                <span class="text-slate-900">{{ $project->status === 'completed' ? '100%' : ($project->status === 'in_progress' ? '65%' : '15%') }}</span>
                            </div>
                            <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-primary transition-all duration-1000" 
                                     style="width: {{ $project->status === 'completed' ? '100%' : ($project->status === 'in_progress' ? '65%' : '15%') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-10 rounded-2xl border border-slate-100 shadow-sm text-center">
                        <p class="text-sm font-medium text-slate-400 italic">No active projects found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
