@extends('layouts.backend')

@section('content')
<div class="flex flex-col gap-8 md:gap-10">
    <!-- Welcome Header -->
    <div class="flex flex-col gap-2">
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-primary shadow-[0_0_10px_rgba(0,118,255,0.5)]"></span>
            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">System Intelligence Console</p>
        </div>
        <h1 class="text-3xl md:text-5xl font-black text-white tracking-tighter">
            Dashboard <span class="text-primary opacity-80">Overview</span>
        </h1>
        <p class="text-sm text-slate-500 font-bold max-w-2xl mt-2">
            Welcome back. Monitor your project performance and recent inquiries through the central architectural nodes.
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
                <h2 class="text-xl font-black text-white tracking-tighter uppercase">Recent Inquiries</h2>
                <a href="{{ route('admin.inquiries.index') }}" class="text-[11px] font-black text-primary uppercase tracking-widest hover:text-white transition-colors">
                    View Registry
                </a>
            </div>

            <div class="bg-node-dark/40 backdrop-blur-sm rounded-node border border-white/5 shadow-2xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-white/5 border-b border-white/5">
                                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Name</th>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Service</th>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Status</th>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em] text-right">Time</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @forelse($stats['recent_inquiries'] as $inquiry)
                                <tr class="hover:bg-white/[0.03] transition-colors group">
                                    <td class="px-8 py-5 text-sm font-bold text-white tracking-tight">{{ $inquiry->name }}</td>
                                    <td class="px-8 py-5">
                                        <span class="text-[11px] font-bold text-slate-400 bg-white/5 px-3 py-1 rounded-lg border border-white/5 uppercase tracking-widest">
                                            {{ $inquiry->service_type ?? 'Development' }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-5 text-sm">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest {{ $inquiry->status === 'new' ? 'bg-emerald-500/10 text-emerald-500 border border-emerald-500/20' : 'bg-amber-500/10 text-amber-500 border border-amber-500/20' }}">
                                            {{ $inquiry->status }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-5 text-[11px] font-bold text-slate-500 text-right uppercase tracking-widest">{{ $inquiry->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-20 text-center">
                                        <p class="text-sm font-bold text-slate-600 italic">Registry is clear. No active inquiries.</p>
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
            <h2 class="text-xl font-black text-white tracking-tighter uppercase">Ongoing Projects</h2>

            <div class="flex flex-col gap-4">
                @forelse($stats['ongoing_projects'] as $project)
                    <div class="bg-node-dark/40 backdrop-blur-sm p-6 rounded-node border border-white/5 shadow-2xl transition-all duration-500 hover:border-primary/30 group">
                        <div class="flex items-start justify-between mb-5">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-white tracking-tight">{{ $project->title }}</span>
                                <span class="text-[10px] text-slate-500 font-black uppercase tracking-widest mt-1.5">{{ $project->service->name ?? 'Service' }}</span>
                            </div>
                            <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest bg-emerald-500/10 text-emerald-500 border border-emerald-500/20">Active</span>
                        </div>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-[10px] font-black text-slate-500 uppercase tracking-[.15em]">
                                <span>Deployment Progress</span>
                                <span class="text-primary">{{ $project->status === 'completed' ? '100%' : ($project->status === 'in_progress' ? '65%' : '15%') }}</span>
                            </div>
                            <div class="w-full h-1.5 bg-white/5 rounded-full overflow-hidden border border-white/5">
                                <div class="h-full bg-primary transition-all duration-1000 shadow-[0_0_10px_rgba(0,118,255,0.4)]" 
                                     style="width: {{ $project->status === 'completed' ? '100%' : ($project->status === 'in_progress' ? '65%' : '15%') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-node-dark/40 backdrop-blur-sm p-10 rounded-node border border-white/5 text-center">
                        <p class="text-sm font-bold text-slate-600 italic tracking-tight">No active deployment nodes identified.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
