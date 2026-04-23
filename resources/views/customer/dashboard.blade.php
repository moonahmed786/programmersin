@extends('layouts.backend')

@section('content')

<!-- Client Header -->
<div class="mb-12">
    <div class="flex justify-between items-end mb-8">
        <div>
            <h1 class="text-2xl font-black tracking-tighter text-on-surface">Your Portfolio</h1>
            <p class="text-xs text-on-surface-variant font-medium opacity-60 mt-1">Track progress, milestones, and your digital investments.</p>
        </div>
        <div class="flex gap-4">
            <button class="bg-primary text-white px-6 py-2.5 rounded font-black text-xs tracking-tight hover:brightness-110 shadow-lg shadow-primary/20 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">add</span>
                Request Service
            </button>
        </div>
    </div>

    <!-- Portfolio Impact Card -->
    <div class="bg-node-dark text-white rounded p-12 shadow-2xl relative overflow-hidden group border border-outline-variant/10 mb-12">
        <div class="absolute inset-0 opacity-10 pointer-events-none bg-[radial-gradient(circle_at_top_right,var(--primary),transparent)]"></div>
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-12">
            <div class="space-y-6 flex-1">
                <h2 class="text-4xl font-black tracking-tighter leading-none text-white">Your journey is <span class="text-primary italic animate-pulse-node inline-block">live</span>.</h2>
                <p class="text-slate-400 max-w-sm text-sm leading-relaxed font-medium">Real-time oversight of your infrastructure, development sprints, and agency communications.</p>
                <div class="flex gap-6 pt-4">
                    <div class="bg-white/5 px-6 py-4 rounded border border-white/10 shadow-inner backdrop-blur-sm">
                        <span class="text-[10px] block text-primary font-bold uppercase tracking-[0.2em] mb-1">Impact</span>
                        <span class="text-2xl font-black tracking-tighter leading-none text-white">{{ $stats['total_projects'] }} Nodes</span>
                    </div>
                    <div class="bg-white/5 px-6 py-4 rounded border border-white/10 shadow-inner backdrop-blur-sm">
                        <span class="text-[10px] block text-secondary font-bold uppercase tracking-[0.2em] mb-1">Active</span>
                        <span class="text-2xl font-black tracking-tighter leading-none text-white">{{ $stats['ongoing_projects'] }} Ongoing</span>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block">
                <span class="material-symbols-outlined text-[120px] text-primary opacity-20 group-hover:scale-110 group-hover:rotate-6 transition-all duration-700 pointer-events-none" style="font-variation-settings: 'FILL' 1;">rocket_launch</span>
            </div>
        </div>
    </div>
</div>

<!-- Active Deliverables Grid -->
<div class="space-y-8">
    <div class="flex items-center justify-between mb-8">
        <h3 class="text-xl font-black tracking-tighter text-on-surface">Active Deliverables</h3>
        <button class="text-[10px] font-bold uppercase tracking-widest text-primary hover:underline">Download Invoices</button>
    </div>

    @if($projects->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($projects as $project)
        <div class="card-metric group min-h-[260px] flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-start mb-8">
                    <div class="w-12 h-12 bg-primary/5 text-primary rounded flex items-center justify-center font-black border border-primary/10 text-xl transition-transform group-hover:scale-110">
                        {{ $project->service->title[0] ?? 'P' }}
                    </div>
                    <span class="badge-node badge-live">
                        {{ $project->status }}
                    </span>
                </div>
                <h4 class="text-lg font-black text-on-surface mb-2 tracking-tight">{{ $project->title }}</h4>
                <p class="text-[11px] text-on-surface-variant font-medium opacity-60 leading-relaxed line-clamp-2 italic">{{ $project->description }}</p>
            </div>
            
            <div class="pt-8 border-t border-outline-variant/10 space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-[9px] font-bold text-on-surface-variant/40 uppercase tracking-[0.2em]">Global Progress</span>
                    <span class="label-mono text-primary text-[10px]">45%</span>
                </div>
                <div class="w-full h-1 bg-surface-container-low rounded overflow-hidden">
                    <div class="h-full bg-primary rounded transition-all duration-1000 ease-out shadow-[0_0_8px_rgba(2,131,197,0.3)]" style="width: 45%;"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-white p-20 rounded-node border border-dashed border-outline-variant/20 text-center space-y-6 shadow-sm">
        <div class="w-16 h-16 bg-surface-container-low rounded flex items-center justify-center mx-auto shadow-sm">
            <span class="material-symbols-outlined text-3xl text-primary opacity-30">folder_open</span>
        </div>
        <div>
            <p class="text-on-surface font-black text-xl tracking-tighter">Your Portfolio is ready.</p>
            <p class="text-on-surface-variant text-xs font-medium opacity-50 italic">Launch your first engineering sprint with our elite architect units.</p>
        </div>
    </div>
    @endif
</div>

@endsection
