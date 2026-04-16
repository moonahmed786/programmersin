@extends('layouts.backend')

@section('content')

<!-- Project Catalog Header -->
<div class="mb-14">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h1 class="text-3xl font-black tracking-tighter text-slate-900 uppercase italic">
                <span class="text-gradient">Project Catalog</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-extrabold uppercase tracking-[0.3em] mt-2 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                Comprehensive registry of all active and historical engineering engagements
            </p>
        </div>
        @if(auth()->user()->isSuperAdmin())
        <div class="flex gap-4">
            <a href="{{ route('admin.projects.create') }}" class="btn-stellar">
                <span class="material-symbols-outlined text-sm">rocket_launch</span>
                Initialize Engagement
            </a>
        </div>
        @endif
    </div>
</div>

<!-- Ledger Table -->
<div class="glass-surface rounded-stellar overflow-hidden border border-white/80">
    <div class="px-10 py-6 bg-slate-50/30 border-b border-slate-100 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Registry Filter</span>
            <div class="h-4 w-px bg-slate-200 mx-2"></div>
            <div class="flex gap-6">
                <button class="text-[11px] font-black uppercase tracking-widest text-primary border-b-2 border-primary pb-px">Active Lifecycle</button>
                <button class="text-[11px] font-black uppercase tracking-widest text-slate-300 hover:text-slate-500 transition-colors">Archived Nodes</button>
            </div>
        </div>
    </div>
    
    <table class="ledger-table">
        <thead>
            <tr>
                <th>Project Identity</th>
                <th>Stakeholder Cluster</th>
                <th>Service Module</th>
                <th>Timeline Entry</th>
                <th>Status Node</th>
                <th class="text-right">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr class="group">
                    <td>
                        <div class="flex flex-col">
                            <span class="font-black text-slate-900 tracking-tight leading-none mb-1">{{ $project->title }}</span>
                            <span class="text-[10px] text-slate-400 font-extrabold uppercase tracking-widest">ID: #RE-{{ str_pad($project->id, 4, '0', STR_PAD_LEFT) }}</span>
                        </div>
                    </td>
                    <td>
                        <span class="text-sm font-semibold text-slate-500 italic">{{ $project->customer->name ?? 'VOID_ENTITY' }}</span>
                    </td>
                    <td>
                        <span class="badge-stellar bg-primary/5 text-primary border-primary/10">
                            {{ strtoupper($project->service->title ?? 'GENERAL') }}
                        </span>
                    </td>
                    <td>
                        <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest">{{ $project->due_date ? $project->due_date->format('d M Y') : 'NOT_ENTERED' }}</span>
                    </td>
                    <td>
                        <span class="badge-stellar {{ $project->status == 'completed' ? 'badge-live' : ($project->status == 'cancelled' ? 'badge-warning' : 'badge-live opacity-80') }}">
                            {{ strtoupper($project->status) }}
                        </span>
                    </td>
                    <td class="text-right">
                        <div class="flex items-center justify-end gap-3">
                            @php
                                $rolePrefix = auth()->user()->isSuperAdmin() ? 'admin' : (auth()->user()->isEmployee() ? 'employee' : 'customer');
                            @endphp
                            <a href="{{ route($rolePrefix.'.projects.show', $project->id) }}" class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-slate-50 text-slate-300 hover:text-primary hover:bg-primary/5 transition-all">
                                <span class="material-symbols-outlined text-lg">visibility</span>
                            </a>
                            @if(auth()->user()->isSuperAdmin())
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-slate-50 text-slate-300 hover:text-amber-500 hover:bg-amber-50 transition-all">
                                <span class="material-symbols-outlined text-lg">edit</span>
                            </a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            @if($projects->isEmpty())
                <tr>
                    <td colspan="6" class="px-6 py-32 text-center">
                        <div class="w-16 h-16 rounded-3xl bg-slate-50 flex items-center justify-center mx-auto mb-6">
                            <span class="material-symbols-outlined text-3xl text-slate-200">inventory_2</span>
                        </div>
                        <p class="text-[10px] font-extrabold uppercase tracking-[0.3em] text-slate-300 italic">No active engagements found in the registry.</p>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

@if($projects->hasPages())
    <div class="mt-12">
        {{ $projects->links() }}
    </div>
@endif

@endsection
