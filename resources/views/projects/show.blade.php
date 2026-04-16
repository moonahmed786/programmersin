@extends('layouts.backend')

@section('content')
<!-- Header Section -->
<header class="mb-12 flex items-end justify-between">
    <div class="space-y-4">
        <div class="flex items-center gap-4">
            <a href="{{ url()->previous() }}" class="w-10 h-10 rounded bg-surface-container flex items-center justify-center text-on-surface-variant hover:text-primary transition-all border border-outline-variant/10 shadow-sm">
                <span class="material-symbols-outlined text-base">arrow_back</span>
            </a>
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest rounded border border-primary/20">
                    ID: #PROJ-{{ str_pad($project->id, 5, '0', STR_PAD_LEFT) }}
                </span>
                <span class="px-3 py-1 bg-surface-container text-on-surface-variant text-[10px] font-black uppercase tracking-widest rounded border border-outline-variant/10">
                    {{ $project->status }}
                </span>
            </div>
        </div>
        <div>
            <h1 class="text-4xl font-black tracking-tighter text-on-surface leading-none mb-2">{{ $project->title }}</h1>
            <p class="text-on-surface-variant font-medium italic max-w-2xl leading-relaxed text-sm">{{ $project->description }}</p>
        </div>
    </div>

    @if(auth()->user()->isSuperAdmin())
    <div class="flex gap-4">
        <button class="px-3 py-3 bg-surface-container-lowest text-on-surface rounded border border-outline-variant/20 hover:bg-surface-container transition-all group">
            <span class="material-symbols-outlined text-sm group-hover:scale-110 transition-transform">edit</span>
        </button>
        <button class="px-6 py-3 bg-on-surface text-surface rounded font-black text-sm uppercase tracking-widest shadow-2xl shadow-on-surface/30 transition-all hover:-translate-y-1">Archive</button>
    </div>
    @endif
</header>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Main Content -->
    <div class="lg:col-span-2 space-y-10 text-sm">
        <!-- Milestone Progress -->
        <section class="bg-surface-container-lowest rounded p-10 border border-outline-variant/10 shadow-2xl shadow-slate-200/40 space-y-8">
            <div class="flex items-center justify-between font-black tracking-tighter">
                <h3 class="text-xl">Infrastructure Roadmap</h3>
                <span class="text-primary font-black text-2xl">45%</span>
            </div>
            <div class="w-full h-3 bg-surface-container rounded overflow-hidden shadow-inner relative">
                <div class="h-full bg-primary rounded shadow-[0_0_12px_rgba(0,86,210,0.3)] transition-all duration-1000 ease-out" style="width: 45%;"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">
                <div class="space-y-2">
                    <span class="text-[10px] text-slate-400 font-black uppercase tracking-widest block">Initiation</span>
                    <p class="font-bold text-on-surface">Strategy Locked</p>
                </div>
                <div class="space-y-2">
                    <span class="text-[10px] text-slate-400 font-black uppercase tracking-widest block">Deployment</span>
                    <p class="font-bold text-slate-300 italic">In Queue</p>
                </div>
                <div class="space-y-2">
                    <span class="text-[10px] text-slate-400 font-black uppercase tracking-widest block">Review</span>
                    <p class="font-bold text-slate-300 italic">Pending</p>
                </div>
            </div>
        </section>

        <!-- Personnel (Pivot Data) -->
        <section class="space-y-6">
            <h3 class="text-xl font-black text-on-surface tracking-tight">Assigned Specialists</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($project->employees as $employee)
                <div class="bg-surface-container-lowest p-6 rounded border border-outline-variant/10 flex items-center gap-4 group hover:shadow-lg transition-all">
                    <div class="w-12 h-12 rounded bg-surface-container flex items-center justify-center overflow-hidden border border-outline-variant/10 shadow-inner">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $employee->name }}" alt="Expert">
                    </div>
                    <div class="flex flex-col">
                        <span class="font-black text-on-surface tracking-tight">{{ $employee->name }}</span>
                        <span class="text-[10px] text-primary font-bold uppercase tracking-widest mt-1">{{ $employee->pivot->role ?? 'Assigned' }}</span>
                    </div>
                </div>
                @endforeach
                @if($project->employees->isEmpty())
                <div class="col-span-full py-10 bg-surface-container-low/30 rounded border-2 border-dashed border-outline-variant/20 flex flex-col items-center gap-3">
                    <span class="material-symbols-outlined text-4xl text-slate-200">person_add</span>
                    <p class="text-on-surface-variant font-bold italic">No specialists assigned to this build yet.</p>
                </div>
                @endif
            </div>
        </section>
    </div>

    <!-- Info Column -->
    <div class="space-y-8">
        <!-- Account Details -->
        <div class="bg-surface-container-lowest rounded p-8 border border-outline-variant/10 shadow-2xl shadow-slate-200/40">
            <h3 class="text-lg font-black text-on-surface tracking-tight mb-8">Engagement Insight</h3>
            <div class="space-y-8">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded bg-blue-50 flex items-center justify-center text-blue-600 shadow-sm">
                        <span class="material-symbols-outlined text-xl">account_balance_wallet</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Financial Scope</span>
                        <span class="font-black font-mono tracking-tighter text-on-surface text-lg text-secondary">${{ number_format($project->budget, 2) }}</span>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded bg-orange-50 flex items-center justify-center text-orange-600 shadow-sm">
                        <span class="material-symbols-outlined text-xl">corporate_fare</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Customer Entity</span>
                        <span class="font-black tracking-tight text-on-surface text-sm uppercase">{{ $project->customer->name }}</span>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded bg-indigo-50 flex items-center justify-center text-indigo-600 shadow-sm">
                        <span class="material-symbols-outlined text-xl">event_upcoming</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Launch Deadline</span>
                        <span class="font-black font-mono tracking-tighter text-on-surface text-sm uppercase">{{ $project->due_date ? $project->due_date->format('D, M d, Y') : 'PENDING' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Badge -->
        <div class="bg-primary p-8 rounded text-on-primary shadow-2xl shadow-primary/20 group relative overflow-hidden">
            <div class="relative z-10 space-y-4">
                <span class="text-[10px] bg-white/20 px-3 py-1 rounded font-black uppercase tracking-widest inline-block border border-white/20">Core Service Offering</span>
                <h4 class="text-2xl font-black tracking-tighter leading-none">{{ $project->service->title ?? 'Full Stack Development' }}</h4>
                <p class="text-on-primary/70 text-xs leading-relaxed italic line-clamp-3">{{ $project->service->description ?? 'Custom agency delivery across elite technology frameworks.' }}</p>
                <div class="pt-4">
                    <button class="w-full py-4 bg-white/10 hover:bg-white/20 border border-white/20 rounded text-[10px] font-black uppercase tracking-widest transition-all">Service Details</button>
                </div>
            </div>
            <span class="material-symbols-outlined absolute -right-6 -bottom-6 text-9xl text-white/5 pointer-events-none group-hover:scale-125 transition-transform duration-700">settings</span>
        </div>
    </div>
</div>
@endsection
