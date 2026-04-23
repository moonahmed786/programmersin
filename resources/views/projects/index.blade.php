@extends('layouts.backend')

@section('content')

<!-- Project Catalog Header -->
<div class="mb-14 px-2">
    <div class="flex justify-between items-end mb-10">
        <div class="flex flex-col gap-3">
            <h1 class="text-4xl font-black tracking-tighter text-on-surface uppercase italic">
                Engagement <span class="text-primary opacity-90">Catalog</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-black uppercase tracking-[0.4em] flex items-center gap-3">
                <span class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_rgba(0,118,255,0.4)] animate-pulse"></span>
                Comprehensive registry of all active and historical software engineering nodes
            </p>
        </div>
        @if(auth()->user()->isSuperAdmin())
        <div class="flex gap-4">
            <a href="{{ route('admin.projects.create') }}" class="btn-stellar">
                <span class="material-symbols-outlined text-base">rocket_launch</span>
                Initialize Engagement
            </a>
        </div>
        @endif
    </div>
</div>

<!-- Intelligence Ledger -->
<div class="bg-white rounded-stellar overflow-hidden border border-slate-100 shadow-sm">
    <x-admin.table-filter-bar placeholder="Search engagements by title or description..." />
    
    <div class="overflow-x-auto">
        <table class="ledger-table w-full">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-50">
                    <x-admin.sortable-th column="title" label="Project Identity" />
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] bg-background/50 border-b border-outline-variant">Stakeholder</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] bg-background/50 border-b border-outline-variant">Service Module</th>
                    <x-admin.sortable-th column="created_at" label="Initialization Date" />
                    <x-admin.sortable-th column="status" label="Engagement Status" />
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] bg-background/50 border-b border-outline-variant text-right">Execution</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach($projects as $project)
                    <tr class="hover:bg-slate-50/50 transition-all group">
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="font-black text-on-surface tracking-tight leading-none mb-1.5">{{ $project->title }}</span>
                                <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest tabular-nums italic">RE-{{ str_pad($project->id, 4, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-slate-200"></div>
                                <span class="text-xs font-black text-on-surface-variant italic">{{ $project->customer->name ?? 'VOID_ENTITY' }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-[9px] font-black text-primary uppercase tracking-widest bg-primary/5 px-3 py-1.5 rounded-lg border border-primary/10">
                                {{ strtoupper($project->service->title ?? 'GENERAL') }}
                            </span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest tabular-nums">{{ $project->created_at->format('d M Y') }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="badge-node {{ $project->status == 'completed' ? 'badge-live' : ($project->status == 'cancelled' ? 'badge-warning' : 'badge-live opacity-80') }} font-black text-[9px] tracking-widest">
                                {{ strtoupper($project->status) }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-x-4 group-hover:translate-x-0">
                                @php
                                    $rolePrefix = auth()->user()->isSuperAdmin() ? 'admin' : (auth()->user()->isEmployee() ? 'employee' : 'customer');
                                @endphp
                                <a href="{{ route($rolePrefix.'.projects.show', $project->id) }}" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:text-primary hover:bg-white hover:shadow-sm transition-all border border-slate-100">
                                    <span class="material-symbols-outlined text-lg">visibility</span>
                                </a>
                                @if(auth()->user()->isSuperAdmin())
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:text-amber-600 hover:bg-white hover:shadow-sm transition-all border border-slate-100">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if($projects->isEmpty())
                    <tr>
                        <td colspan="6" class="px-8 py-32 text-center">
                            <div class="w-20 h-20 rounded-full bg-slate-50 flex items-center justify-center mx-auto mb-6 border border-slate-100">
                                <span class="material-symbols-outlined text-4xl text-slate-200">manage_search</span>
                            </div>
                            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 italic">No mission modules found matching your current indexing protocol.</p>
                            <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-2 mt-6 text-[9px] font-black uppercase tracking-widest text-primary hover:bg-primary/5 px-6 py-3 rounded-xl border border-primary/10 transition-all">Reset Engagement Index</a>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@if($projects->hasPages())
    <div class="mt-12">
        {{ $projects->links() }}
    </div>
@endif

@if($projects->hasPages())
    <div class="mt-12">
        {{ $projects->links() }}
    </div>
@endif

@endsection
