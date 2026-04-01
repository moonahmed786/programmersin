@extends('layouts.backend')

@section('content')
<!-- Header Section -->
<header class="mb-10 flex items-end justify-between">
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight text-on-surface mb-1">Production Workspace</h1>
        <p class="text-on-surface-variant font-medium italic">Manage your assignments and track project health.</p>
    </div>
    <div class="flex gap-3">
        <button class="px-5 py-2.5 bg-emerald-600 text-white rounded-xl font-bold text-sm hover:bg-emerald-700 shadow-xl shadow-emerald-600/20 transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">schedule</span>
            Log Time
        </button>
    </div>
</header>

<!-- Stats Grid -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-surface-container-lowest p-7 rounded-2xl group hover:shadow-2xl transition-all duration-300 border border-outline-variant/10">
        <div class="flex justify-between items-start mb-4">
            <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center text-orange-600 shadow-sm border border-orange-100">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">work</span>
            </div>
            <span class="text-on-surface-variant font-bold text-xs bg-surface-container-low px-2 py-1 rounded-full italic">Portfolio</span>
        </div>
        <h3 class="text-on-surface-variant text-xs font-bold uppercase tracking-widest mb-1">Assigned Projects</h3>
        <div class="text-3xl font-black text-on-surface tracking-tighter">{{ $stats['assigned_projects'] }}</div>
    </div>

    <div class="bg-surface-container-lowest p-7 rounded-2xl group hover:shadow-2xl transition-all duration-300 border border-outline-variant/10">
        <div class="flex justify-between items-start mb-4">
            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 shadow-sm border border-blue-100">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">update</span>
            </div>
            <span class="text-primary font-bold text-xs bg-primary-fixed/30 px-2 py-1 rounded-full">Active</span>
        </div>
        <h3 class="text-on-surface-variant text-xs font-bold uppercase tracking-widest mb-1">Ongoing Tasks</h3>
        <div class="text-3xl font-black text-on-surface tracking-tighter">{{ $stats['ongoing_projects'] }}</div>
    </div>

    <div class="bg-surface-container-lowest p-7 rounded-2xl group hover:shadow-2xl transition-all duration-300 border border-outline-variant/10">
        <div class="flex justify-between items-start mb-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 shadow-sm border border-emerald-100">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">check_circle</span>
            </div>
            <span class="text-emerald-700 font-bold text-xs bg-emerald-100 px-2 py-1 rounded-full">Completed</span>
        </div>
        <h3 class="text-on-surface-variant text-xs font-bold uppercase tracking-widest mb-1">Success Rate</h3>
        <div class="text-3xl font-black text-on-surface tracking-tighter">{{ $stats['completed_projects'] }}</div>
    </div>
</section>

<!-- Projects Table -->
<div class="bg-surface-container-lowest rounded-2xl shadow-xl shadow-slate-200/50 overflow-hidden border border-outline-variant/10">
    <div class="px-8 py-6 flex items-center justify-between border-b border-outline-variant/10">
        <h2 class="text-lg font-black text-on-surface tracking-tight">Active Assignments</h2>
        <button class="text-primary font-bold text-sm hover:underline">Open KanBan</button>
    </div>
    <div class="overflow-x-auto @if($projects->count() == 0) p-16 text-center @endif">
        @if($projects->count() > 0)
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-surface-container-low italic">
                    <th class="px-8 py-4 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Project Name</th>
                    <th class="px-8 py-4 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Due Date</th>
                    <th class="px-8 py-4 text-right text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y-0">
                @foreach($projects as $project)
                <tr class="group hover:bg-surface-container transition-colors">
                    <td class="px-8 py-5">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-primary shadow-lg shadow-primary"></div>
                            <span class="font-bold text-sm text-on-surface">{{ $project->title }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-5 text-sm font-bold text-slate-400 font-mono tracking-tighter">{{ $project->due_date ? $project->due_date->format('d/m/Y') : 'PENDING' }}</td>
                    <td class="px-8 py-5 text-right">
                        <span class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container rounded-full text-[10px] font-bold uppercase tracking-wider text-on-surface-variant border border-outline-variant/10">
                            {{ $project->status }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center space-y-3">
            <span class="material-symbols-outlined text-4xl text-slate-200">folder_off</span>
            <p class="text-slate-400 text-sm italic font-medium">No projects assigned yet. Great time to upskill!</p>
        </div>
        @endif
    </div>
</div>
@endsection
