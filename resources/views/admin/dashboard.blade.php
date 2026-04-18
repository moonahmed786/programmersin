@extends('layouts.backend')

@section('content')
<div class="flex flex-col gap-10 md:gap-14">
    <!-- Welcome Header -->
    <div class="flex flex-col gap-3">
        <div class="flex items-center gap-3">
            <span class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_12px_rgba(0,118,255,0.4)] animate-pulse"></span>
            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400">System Command Node</p>
        </div>
        <h1 class="text-4xl md:text-5xl font-black text-on-surface tracking-tighter">
            Executive <span class="text-primary opacity-90 italic">Dashboard</span>
        </h1>
        <p class="text-sm text-on-surface-variant font-bold max-w-2xl mt-2 leading-relaxed">
            Welcome back, Administrator. Your high-fidelity engineering mission status and project intelligence are synchronized.
        </p>
    </div>

    <!-- Stats Matrix -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <x-admin.stat-card 
            label="Mission Count" 
            :value="$stats['total_projects']" 
            icon="rocket_launch" 
            trend="+14.2%" 
        />
        <x-admin.stat-card 
            label="Inquiry Flow" 
            :value="$stats['recent_inquiries']->count()" 
            icon="mail" 
            :trendUp="true"
            trend="Accelerating" 
        />
        <x-admin.stat-card 
            label="Architectural Units" 
            :value="$stats['total_services']" 
            icon="layers" 
        />
        <x-admin.stat-card 
            label="Roster Personnel" 
            :value="$stats['total_employees']" 
            icon="group" 
        />
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 md:gap-14 items-start">
        <!-- Recent Intelligence Ledger -->
        <div class="lg:col-span-8 flex flex-col gap-8">
            <div class="flex items-center justify-between px-2">
                <div class="flex flex-col">
                    <h2 class="text-2xl font-black text-on-surface tracking-tighter uppercase">Recent Intelligence</h2>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">Personnel and inquiry registry incoming</p>
                </div>
                <a href="{{ route('admin.inquiries.index') }}" class="flex items-center gap-2 text-[10px] font-black text-primary uppercase tracking-widest hover:text-on-surface transition-colors bg-primary/5 px-5 py-2.5 rounded-xl border border-primary/10">
                    Explore Registry
                    <span class="material-symbols-outlined text-base">arrow_forward</span>
                </a>
            </div>

            <div class="bg-white rounded-stellar border border-slate-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left ledger-table">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-slate-100">
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Source Identity</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Deployment Type</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Validation</th>
                                <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($stats['recent_inquiries'] as $inquiry)
                                <tr class="hover:bg-slate-50/50 transition-all group cursor-default">
                                    <td class="px-8 py-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-black text-on-surface tracking-tight">{{ $inquiry->name }}</span>
                                            <span class="text-[9px] font-bold text-slate-400 tracking-widest uppercase">Contact Entry</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="text-[10px] font-black text-primary bg-primary/5 px-3 py-1.5 rounded-lg border border-primary/10 uppercase tracking-widest">
                                            {{ $inquiry->service_type ?? 'Development' }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="badge-node {{ $inquiry->status === 'new' ? 'badge-live' : 'badge-warning' }} font-black text-[9px] tracking-widest uppercase">
                                            {{ strtoupper($inquiry->status) }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 text-[10px] font-black text-slate-400 text-right uppercase tracking-widest tabular-nums">{{ $inquiry->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-24 text-center">
                                        <div class="w-16 h-16 rounded-full bg-slate-50 flex items-center justify-center mx-auto mb-4 border border-slate-100">
                                            <span class="material-symbols-outlined text-slate-300 text-3xl">inbox</span>
                                        </div>
                                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic">Registry is clear. No active inquiries.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Ongoing Deployments -->
        <div class="lg:col-span-4 flex flex-col gap-8">
            <div class="flex items-center justify-between px-2">
                <h2 class="text-2xl font-black text-on-surface tracking-tighter uppercase">Operations</h2>
                <span class="w-2 h-2 rounded-full bg-primary shadow-[0_0_8px_rgba(0,118,255,0.4)] animate-pulse"></span>
            </div>

            <div class="flex flex-col gap-6">
                @forelse($stats['ongoing_projects'] as $project)
                    <div class="bg-white p-8 rounded-stellar border border-slate-100 shadow-sm transition-all duration-500 hover:shadow-md hover:border-primary/20 group relative overflow-hidden">
                        <div class="flex items-start justify-between mb-8 relative z-10">
                            <div class="flex flex-col">
                                <span class="text-sm font-black text-on-surface tracking-tight group-hover:text-primary transition-colors">{{ $project->title }}</span>
                                <span class="text-[9px] text-slate-400 font-black uppercase tracking-widest mt-2">{{ $project->service->name ?? 'Service Hub' }}</span>
                            </div>
                            <span class="px-3 py-1.5 rounded-lg text-[8px] font-black uppercase tracking-[0.2em] bg-blue-50 text-blue-600 border border-blue-100">Synchronizing</span>
                        </div>
                        
                        <div class="space-y-4 relative z-10">
                            <div class="flex justify-between items-center text-[10px] font-black text-slate-500 uppercase tracking-widest">
                                <span>Convergence Integrity</span>
                                <span class="text-primary font-mono">{{ $project->status === 'completed' ? '100' : ($project->status === 'in_progress' ? '64' : '12') }}%</span>
                            </div>
                            <div class="w-full h-2 bg-slate-50 rounded-full overflow-hidden border border-slate-100">
                                <div class="h-full bg-primary transition-all duration-1000" 
                                     style="width: {{ $project->status === 'completed' ? '100%' : ($project->status === 'in_progress' ? '64%' : '12%') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Decor -->
                        <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-primary/5 rounded-full blur-2xl group-hover:bg-primary/10 transition-all duration-500"></div>
                    </div>
                @empty
                    <div class="bg-white p-12 rounded-stellar border border-slate-100 text-center border-dashed">
                        <span class="material-symbols-outlined text-slate-200 text-4xl block mb-4">architecture</span>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest italic leading-loose">No active architectural deployments identified.</p>
                    </div>
                @endforelse
            </div>
            
            <!-- Quick Command Button -->
            <a href="{{ route('admin.projects.create') }}" class="btn-stellar w-full justify-center group overflow-hidden">
                <span class="relative z-10 flex items-center gap-3">
                    <span class="material-symbols-outlined text-lg">add_circle</span>
                    Initialize New Mission
                </span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
            </a>
        </div>
    </div>
</div>
@endsection
