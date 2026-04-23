@extends('layouts.backend')

@section('content')

<!-- Production Header -->
<div class="mb-12">
    <div class="flex justify-between items-end mb-8">
        <div>
            <h1 class="text-2xl font-black tracking-tighter text-on-surface">Production Workspace</h1>
            <p class="text-xs text-on-surface-variant font-medium opacity-60 mt-1">Real-time assignment tracking and engineering velocity.</p>
        </div>
        <div class="flex gap-4">
            <button class="bg-secondary text-white px-5 py-2 rounded text-[10px] font-bold uppercase tracking-widest shadow-xl shadow-secondary/20 hover:opacity-90 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">schedule</span>
                Log Time
            </button>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Assigned Projects -->
        <div class="card-metric">
            <div class="flex justify-between items-start mb-6">
                <span class="label-mono opacity-50 text-[9px]">Production Portfolio</span>
                <span class="material-symbols-outlined text-on-surface-variant text-xl">work</span>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-4xl font-black tracking-tighter text-on-surface">{{ $stats['assigned_projects'] }}</span>
            </div>
            <div class="mt-4">
                <span class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest opacity-40 italic">Assigned Projects</span>
            </div>
        </div>

        <!-- Ongoing Tasks -->
        <div class="card-metric border-l-4 border-l-primary">
            <div class="flex justify-between items-start mb-6">
                <span class="label-mono opacity-50 text-[9px]">Active Pipeline</span>
                <span class="material-symbols-outlined text-primary text-xl">update</span>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-4xl font-black tracking-tighter text-on-surface">{{ $stats['ongoing_projects'] }}</span>
            </div>
            <div class="mt-4">
                <span class="text-[10px] font-bold text-primary uppercase tracking-widest">Ongoing Tasks</span>
            </div>
        </div>

        <!-- Success Rate -->
        <div class="card-metric">
            <div class="flex justify-between items-start mb-6">
                <span class="label-mono opacity-50 text-[9px]">Execution Success</span>
                <span class="material-symbols-outlined text-secondary text-xl">check_circle</span>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-4xl font-black tracking-tighter text-on-surface">{{ $stats['completed_projects'] }}</span>
            </div>
            <div class="mt-4">
                <span class="text-[10px] font-bold text-secondary uppercase tracking-widest">Success Rate</span>
            </div>
        </div>
    </div>
</div>

<!-- Active Assignments Table -->
<div>
    <div class="flex justify-between items-end mb-8">
        <h2 class="text-xl font-black tracking-tighter text-on-surface">Active Assignments</h2>
        <button class="text-[10px] font-bold uppercase tracking-widest text-primary hover:underline">Open KanBan</button>
    </div>

    <div class="bg-white rounded overflow-hidden border border-outline-variant/10 shadow-sm">
        @if($projects->count() > 0)
        <table class="ledger-table">
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Due Date</th>
                    <th class="text-right">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr class="hover:bg-surface-container-low transition-colors group">
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_8px_rgba(2,131,197,0.5)]"></div>
                            <span class="font-black text-on-surface">{{ $project->title }}</span>
                        </div>
                    </td>
                    <td class="font-mono text-xs text-on-surface-variant opacity-60">
                        {{ $project->due_date ? $project->due_date->format('d/m/Y') : 'PENDING' }}
                    </td>
                    <td class="text-right">
                        <span class="badge-node {{ $project->status == 'completed' ? 'badge-live' : 'badge-draft' }}">
                            {{ $project->status }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="p-20 text-center space-y-4">
            <span class="material-symbols-outlined text-4xl text-slate-200">folder_off</span>
            <p class="text-on-surface-variant text-sm font-medium opacity-50 italic">Terminal is clear. No active assignments detected.</p>
        </div>
        @endif
    </div>
</div>

@endsection
