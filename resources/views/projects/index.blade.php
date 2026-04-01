@extends('layouts.backend')

@section('content')
<!-- Header Section -->
<header class="mb-10 flex items-end justify-between">
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight text-on-surface mb-1">Project Catalog</h1>
        <p class="text-on-surface-variant font-medium italic">Comprehensive list of all active and historical engagements.</p>
    </div>
    @if(auth()->user()->isSuperAdmin())
    <div class="flex gap-3">
        <a href="{{ route('admin.projects.create') }}" class="px-5 py-2.5 bg-primary text-on-primary rounded-xl font-bold text-sm hover:opacity-90 shadow-xl shadow-primary/20 transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add</span>
            Initialize Project
        </a>
    </div>
    @endif
</header>

<!-- Projects Table -->
<div class="bg-surface-container-lowest rounded-2xl shadow-xl shadow-slate-200/50 overflow-hidden border border-outline-variant/10">
    <div class="px-8 py-6 flex items-center justify-between border-b border-outline-variant/10">
        <div class="flex items-center gap-4">
            <h2 class="text-lg font-black text-on-surface tracking-tight">Active Deliverables</h2>
            <div class="h-6 w-px bg-outline-variant/20 mx-2"></div>
            <div class="flex gap-2">
                <button class="px-3 py-1 bg-surface-container rounded-full text-[10px] font-black uppercase tracking-widest text-on-surface-variant">All</button>
                <button class="px-3 py-1 text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-primary transition-colors">In Progress</button>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto @if($projects->isEmpty()) p-20 text-center @endif">
        @if($projects->isNotEmpty())
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-surface-container-low italic text-[10px] uppercase font-black tracking-widest text-on-surface-variant">
                    <th class="px-8 py-4 text-left">Project Title</th>
                    <th class="px-8 py-4 text-left">Customer</th>
                    <th class="px-8 py-4 text-left">Service</th>
                    <th class="px-8 py-4 text-left">Due Date</th>
                    <th class="px-8 py-4 text-right">Status</th>
                    <th class="px-8 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y-0">
                @foreach($projects as $project)
                <tr class="group hover:bg-surface-container transition-colors">
                    <td class="px-8 py-5">
                        <div class="flex flex-col">
                            <span class="font-black text-sm text-on-surface tracking-tight">{{ $project->title }}</span>
                            <span class="text-[10px] text-on-surface-variant font-bold uppercase tracking-widest">ID: #PROJ-{{ str_pad($project->id, 5, '0', STR_PAD_LEFT) }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-5 text-sm text-on-surface-variant font-bold italic">{{ $project->customer->name ?? 'N/A' }}</td>
                    <td class="px-8 py-5">
                        <span class="px-3 py-1 bg-primary/5 text-primary text-[10px] font-black uppercase tracking-widest rounded-lg border border-primary/10">
                            {{ $project->service->title ?? 'General' }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-sm font-bold text-slate-400 font-mono tracking-tighter">{{ $project->due_date ? $project->due_date->format('d/m/Y') : 'PENDING' }}</td>
                    <td class="px-8 py-5 text-right">
                        <span class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container rounded-full text-[10px] font-black uppercase tracking-widest text-on-surface-variant border border-outline-variant/10">
                            <span class="w-1.5 h-1.5 rounded-full @if($project->status == 'completed') bg-emerald-500 @elseif($project->status == 'cancelled') bg-rose-500 @else bg-primary @endif"></span>
                            {{ $project->status }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-right">
                        @php
                            $rolePrefix = auth()->user()->isSuperAdmin() ? 'admin' : (auth()->user()->isEmployee() ? 'employee' : 'customer');
                        @endphp
                        <a href="{{ route($rolePrefix.'.projects.show', $project->id) }}" class="p-2 hover:bg-primary-container hover:text-primary rounded-xl transition-all inline-block group/btn">
                            <span class="material-symbols-outlined text-lg group-hover/btn:scale-110 transition-transform">visibility</span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="space-y-4">
            <span class="material-symbols-outlined text-6xl text-slate-200">inventory_2</span>
            <p class="text-on-surface font-black text-xl tracking-tight leading-none">No active engagements found.</p>
            <p class="text-on-surface-variant text-sm italic font-medium max-w-xs mx-auto">Start by initializing a new project from the action menu above.</p>
        </div>
        @endif
    </div>
    
    @if($projects->hasPages())
    <div class="px-8 py-6 border-t border-outline-variant/10 bg-surface-container-low/30">
        {{ $projects->links() }}
    </div>
    @endif
</div>
@endsection
