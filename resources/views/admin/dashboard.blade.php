@extends('layouts.backend')

@section('content')
<!-- Header Section -->
<header class="mb-10 flex items-end justify-between">
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight text-on-surface mb-1">Dashboard Overview</h1>
        <p class="text-on-surface-variant font-medium italic">Agency health and real-time operations metrics.</p>
    </div>
    <div class="flex gap-3">
        <button class="px-4 py-2 text-primary font-bold text-sm bg-primary/5 hover:bg-primary/10 rounded-xl transition-all">Generate Report</button>
        <button class="px-5 py-2.5 bg-on-surface text-surface rounded-xl font-bold text-sm hover:opacity-90 shadow-xl shadow-on-surface/20 transition-all">New Service</button>
    </div>
</header>

<!-- Stats Grid -->
<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-surface-container-lowest p-7 rounded-2xl group hover:shadow-2xl transition-all duration-300 border border-outline-variant/10">
        <div class="flex justify-between items-start mb-4">
            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 shadow-sm">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">groups</span>
            </div>
            <span class="text-tertiary font-bold text-xs bg-tertiary-fixed/30 px-2 py-1 rounded-full">+12%</span>
        </div>
        <h3 class="text-on-surface-variant text-xs font-bold uppercase tracking-widest mb-1">Total Customers</h3>
        <div class="text-3xl font-black text-on-surface tracking-tighter">{{ $stats['total_customers'] }}</div>
    </div>

    <div class="bg-surface-container-lowest p-7 rounded-2xl group hover:shadow-2xl transition-all duration-300 border border-outline-variant/10">
        <div class="flex justify-between items-start mb-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 shadow-sm">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">badge</span>
            </div>
            <span class="text-on-surface-variant font-bold text-xs bg-surface-container-low px-2 py-1 rounded-full">Active</span>
        </div>
        <h3 class="text-on-surface-variant text-xs font-bold uppercase tracking-widest mb-1">Total Employees</h3>
        <div class="text-3xl font-black text-on-surface tracking-tighter">{{ $stats['total_employees'] }}</div>
    </div>

    <div class="bg-surface-container-lowest p-7 rounded-2xl group hover:shadow-2xl transition-all duration-300 border border-outline-variant/10">
        <div class="flex justify-between items-start mb-4">
            <div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-600 shadow-sm">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">rocket_launch</span>
            </div>
            <span class="text-primary font-bold text-xs bg-primary-fixed/30 px-2 py-1 rounded-full">{{ $stats['total_projects'] }} Active</span>
        </div>
        <h3 class="text-on-surface-variant text-xs font-bold uppercase tracking-widest mb-1">Live Projects</h3>
        <div class="text-3xl font-black text-on-surface tracking-tighter">{{ $stats['total_projects'] }}</div>
    </div>

    <div class="bg-surface-container-lowest p-7 rounded-2xl group hover:shadow-2xl transition-all duration-300 border border-outline-variant/10">
        <div class="flex justify-between items-start mb-4">
            <div class="w-12 h-12 rounded-xl bg-rose-50 flex items-center justify-center text-rose-600 shadow-sm">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">mail</span>
            </div>
            <span class="text-error font-bold text-xs bg-error-container px-2 py-1 rounded-full">{{ $stats['recent_inquiries']->count() }} New</span>
        </div>
        <h3 class="text-on-surface-variant text-xs font-bold uppercase tracking-widest mb-1">New Inquiries</h3>
        <div class="text-3xl font-black text-on-surface tracking-tighter">{{ $stats['recent_inquiries']->count() }}</div>
    </div>
</section>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 space-y-8">
        <!-- Upcoming Deliverables Table -->
        <div class="bg-surface-container-lowest rounded-2xl shadow-xl shadow-slate-200/50 overflow-hidden border border-outline-variant/10">
            <div class="px-8 py-6 flex items-center justify-between border-b border-outline-variant/10">
                <h2 class="text-lg font-black text-on-surface tracking-tight">Active Agency Inquiries</h2>
                <button class="text-primary font-bold text-sm hover:underline">Full Catalog</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-surface-container-low italic">
                            <th class="px-8 py-4 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Name</th>
                            <th class="px-8 py-4 text-left text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Subject</th>
                            <th class="px-8 py-4 text-right text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-0">
                        @foreach($stats['recent_inquiries'] as $inquiry)
                        <tr class="group hover:bg-surface-container transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-2 rounded-full bg-primary shadow-lg shadow-primary"></div>
                                    <span class="font-bold text-sm text-on-surface">{{ $inquiry->name }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-sm text-on-surface-variant font-medium">{{ $inquiry->subject }}</td>
                            <td class="px-8 py-5 text-right">
                                <span class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container rounded-full text-[10px] font-bold uppercase tracking-wider text-on-surface-variant border border-outline-variant/10">
                                    <span class="w-1.5 h-1.5 rounded-full @if($inquiry->status == 'new') bg-primary @elseif($inquiry->status == 'closed') bg-slate-400 @else bg-emerald-500 @endif"></span>
                                    {{ str_replace('_', ' ', $inquiry->status) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Featured Project Insight (Stitch Style) -->
        <div class="relative rounded-2xl overflow-hidden min-h-[220px] bg-slate-900 group shadow-2xl shadow-slate-900/40">
            <img src="{{ asset('uploads/stitch/landing_page_image.webp') }}" class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:scale-105 transition-transform duration-700" alt="Featured">
            <div class="relative p-10 h-full flex flex-col justify-end">
                <div class="inline-flex px-3 py-1 bg-primary/20 backdrop-blur-md rounded-full border border-primary/40 text-primary-fixed-dim text-[10px] font-black tracking-widest uppercase mb-4 w-fit">
                    AI Infrastructure Update
                </div>
                <div>
                    <h2 class="text-white text-3xl font-black mb-2 tracking-tight">Main Agency Performance</h2>
                    <p class="text-slate-300 text-sm max-w-lg leading-relaxed italic">All service endpoints are performing optimally. Scalability report for current quarter is pending.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Quick Info -->
    <div class="space-y-8">
        <div class="bg-surface-container-lowest rounded-2xl p-8 border border-outline-variant/10 shadow-xl shadow-slate-200/50">
            <h2 class="text-lg font-black text-on-surface tracking-tight mb-6">Recent Deliverables</h2>
            <div class="space-y-6">
                @foreach($stats['ongoing_projects'] as $project)
                <div class="flex gap-4">
                    <div class="relative">
                        <div class="w-10 h-10 rounded-xl bg-primary-fixed flex items-center justify-center text-primary shadow-sm border border-primary/10 transition-transform hover:scale-110">
                            <span class="material-symbols-outlined text-xl">check_circle</span>
                        </div>
                        <div class="absolute top-10 left-1/2 -translate-x-1/2 w-[2px] h-6 bg-surface-container"></div>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-sm font-black text-on-surface">{{ $project->title }}</p>
                        <span class="text-[11px] text-on-surface-variant font-bold uppercase tracking-wider mt-1">{{ $project->status }}</span>
                    </div>
                </div>
                @endforeach
                @if($stats['ongoing_projects']->count() == 0)
                <div class="text-center py-6">
                    <span class="material-symbols-outlined text-3xl text-slate-200 mb-2">dashboard_customize</span>
                    <p class="text-xs text-slate-400 font-bold italic">Clear for takeoff</p>
                </div>
                @endif
            </div>
        </div>

        <div class="bg-primary/5 rounded-2xl p-8 border border-primary/10 shadow-lg">
            <h2 class="text-lg font-black text-on-surface tracking-tight mb-6">Quick Tools</h2>
            <div class="space-y-4">
                <button class="w-full flex items-center justify-between p-4 bg-white rounded-xl hover:bg-primary hover:text-on-primary transition-all duration-300 group shadow-sm border border-outline-variant/5">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined">add_box</span>
                        <span class="text-sm font-bold tracking-tight">Create Service Catalog</span>
                    </div>
                    <span class="material-symbols-outlined text-sm opacity-0 group-hover:opacity-100 -translate-x-2 group-hover:translate-x-0 transition-all">arrow_forward</span>
                </button>
                <button class="w-full flex items-center justify-between p-4 bg-white rounded-xl hover:bg-primary hover:text-on-primary transition-all duration-300 group shadow-sm border border-outline-variant/5">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined">auto_awesome_motion</span>
                        <span class="text-sm font-bold tracking-tight">Edit Portfolio</span>
                    </div>
                    <span class="material-symbols-outlined text-sm opacity-0 group-hover:opacity-100 -translate-x-2 group-hover:translate-x-0 transition-all">arrow_forward</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
