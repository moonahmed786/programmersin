@extends('layouts.backend')

@section('content')
<!-- Header Section -->
<header class="mb-10 flex items-end justify-between">
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight text-on-surface mb-1">Your Portfolio</h1>
        <p class="text-on-surface-variant font-medium italic">Track progress, milestones, and your digital investments.</p>
    </div>
    <div class="flex gap-3">
        <button class="px-5 py-2.5 bg-on-surface text-surface rounded-xl font-bold text-sm hover:opacity-90 shadow-xl shadow-on-surface/20 transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add</span>
            Request Service
        </button>
    </div>
</header>

<!-- Hero Card -->
<section class="mb-10">
    <div class="bg-gradient-to-br from-primary to-primary-container rounded-3xl p-10 text-on-primary shadow-2xl shadow-primary/30 relative overflow-hidden group">
        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div class="space-y-4">
                <h2 class="text-4xl font-black tracking-tighter leading-none">Your journey is live.</h2>
                <p class="text-on-primary/80 max-w-sm text-sm leading-relaxed font-medium">Real-time oversight of your infrastructure, development sprints, and agency communications.</p>
                <div class="flex gap-4 pt-4">
                    <div class="bg-white/10 px-4 py-3 rounded-2xl backdrop-blur-xl border border-white/10 shadow-inner">
                        <span class="text-[10px] block text-on-primary/60 font-black uppercase tracking-widest mb-1">Impact</span>
                        <span class="text-xl font-black tracking-tight leading-none">{{ $stats['total_projects'] }} Projects</span>
                    </div>
                    <div class="bg-white/10 px-4 py-3 rounded-2xl backdrop-blur-xl border border-white/10 shadow-inner">
                        <span class="text-[10px] block text-on-primary/60 font-black uppercase tracking-widest mb-1">Active</span>
                        <span class="text-xl font-black tracking-tight leading-none">{{ $stats['ongoing_projects'] }} Ongoing</span>
                    </div>
                </div>
            </div>
            <div class="hidden lg:flex justify-end pr-8">
                <span class="material-symbols-outlined text-[160px] opacity-20 group-hover:scale-110 transition-transform duration-700 pointer-events-none" style="font-variation-settings: 'FILL' 1;">rocket_launch</span>
            </div>
        </div>
    </div>
</section>

<!-- Projects Grid -->
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h3 class="text-xl font-black text-on-surface tracking-tight">Active Deliverables</h3>
        <button class="text-primary font-bold text-sm hover:underline">Download Invoices</button>
    </div>

    @if($projects->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($projects as $project)
        <div class="bg-surface-container-lowest p-7 rounded-3xl border border-outline-variant/10 shadow-lg shadow-slate-200/50 transition-all hover:shadow-2xl group flex flex-col justify-between min-h-[200px]">
            <div>
                <div class="flex justify-between items-start mb-6">
                    <div class="w-12 h-12 bg-surface-container text-primary rounded-2xl flex items-center justify-center font-black shadow-inner border border-outline-variant/5">
                        {{ $project->service->title[0] ?? 'P' }}
                    </div>
                    <span class="inline-flex px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest border border-outline-variant/10 bg-surface-container-low text-on-surface-variant">
                        {{ $project->status }}
                    </span>
                </div>
                <h4 class="text-lg font-black text-on-surface mb-1 tracking-tight">{{ $project->title }}</h4>
                <p class="text-xs text-on-surface-variant line-clamp-2 leading-relaxed font-medium italic">{{ $project->description }}</p>
            </div>
            <div class="pt-6 mt-6 border-t border-outline-variant/5 space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Global Progress</span>
                    <span class="text-xs font-black text-on-surface tracking-tighter">45%</span>
                </div>
                <div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden shadow-inner">
                    <div class="h-full bg-primary rounded-full transition-all duration-1000 ease-out shadow-[0_0_8px_rgba(0,86,210,0.4)]" style="width: 45%;"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-surface-container-low/50 p-20 rounded-3xl border-2 border-dashed border-outline-variant/20 text-center space-y-4">
        <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-lg border border-outline-variant/10 mx-auto transition-transform hover:rotate-12">
            <span class="material-symbols-outlined text-3xl text-primary">folder_open</span>
        </div>
        <div>
            <p class="text-on-surface font-black text-lg tracking-tight">Your Portfolio is ready.</p>
            <p class="text-on-surface-variant text-sm italic font-medium">Ready to start your first project with our agency elite?</p>
        </div>
        <button class="px-8 py-3 bg-on-surface text-surface rounded-xl font-black text-sm shadow-2xl shadow-on-surface/30 transition-all hover:-translate-y-1">Initialize Engagement</button>
    </div>
    @endif
</div>
@endsection
