@extends('layouts.backend')

@section('content')

<!-- System Telemetry Header -->
<div class="mb-14">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h1 class="text-3xl font-black tracking-tighter text-slate-900 uppercase italic">
                <span class="text-gradient">Agency Intelligence</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-extrabold uppercase tracking-[0.3em] mt-2 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                Real-time business telemetry and operational metrics
            </p>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex items-center -space-x-3">
                <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-100 shadow-sm overflow-hidden"></div>
                <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-200 shadow-sm overflow-hidden"></div>
                <div class="w-8 h-8 rounded-full border-2 border-white bg-primary text-[10px] flex items-center justify-center text-white font-bold shadow-lg">+{{ $stats['total_employees'] }}</div>
            </div>
            <div class="h-6 w-px bg-slate-200"></div>
            <span class="text-[10px] font-bold text-slate-300 uppercase tracking-widest">Nodes Active: {{ $stats['total_employees'] + 1 }}</span>
        </div>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
        <!-- Total Customers -->
        <div class="card-metric group">
            <div class="flex justify-between items-start mb-8">
                <div class="w-12 h-12 rounded-2xl bg-primary/5 flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'FILL' 1;">groups</span>
                </div>
                <span class="text-[10px] font-black text-emerald-500 uppercase tracking-widest bg-emerald-50 px-3 py-1 rounded-full">+12.5%</span>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-5xl font-black tracking-tighter text-slate-900">{{ $stats['total_customers'] }}</span>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Clients</span>
            </div>
            <p class="text-[10px] font-medium text-slate-400 mt-6 uppercase tracking-widest">Identity Pipeline</p>
        </div>

        <!-- Total Employees -->
        <div class="card-metric group">
            <div class="flex justify-between items-start mb-8">
                <div class="w-12 h-12 rounded-2xl bg-tertiary/10 flex items-center justify-center text-tertiary group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'FILL' 1;">rocket_launch</span>
                </div>
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Active</span>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-5xl font-black tracking-tighter text-slate-900">{{ $stats['total_employees'] }}</span>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Nodes</span>
            </div>
            <p class="text-[10px] font-medium text-slate-400 mt-6 uppercase tracking-widest">Neural Architectures</p>
        </div>

        <!-- AI Credit Registry -->
        <div class="card-metric group overflow-hidden relative">
            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-3xl -mr-16 -mt-16"></div>
            <div class="flex justify-between items-start mb-8 relative z-10">
                <div class="w-12 h-12 rounded-2xl bg-primary text-white flex items-center justify-center shadow-lg shadow-primary/30 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'FILL' 1;">generating_tokens</span>
                </div>
            </div>
            <div class="flex items-baseline gap-2 relative z-10">
                <span class="text-5xl font-black tracking-tighter text-slate-900">{{ auth()->user()->ai_credits ?? 0 }}</span>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Credits</span>
            </div>
            <div class="mt-8 relative z-10">
                <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-primary" style="width: {{ min((auth()->user()->ai_credits ?? 0) / 10, 100) }}%"></div>
                </div>
            </div>
        </div>

        <!-- Active Services -->
        <div class="card-metric group">
            <div class="flex justify-between items-start mb-8">
                <div class="w-12 h-12 rounded-2xl bg-slate-100 flex items-center justify-center text-slate-600 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-2xl">dataset</span>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="text-5xl font-black tracking-tighter text-slate-900">{{ $stats['total_services'] }}</span>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Modules</span>
            </div>
            <p class="text-[10px] font-medium text-slate-400 mt-6 uppercase tracking-widest">Service Catalog</p>
        </div>

        <!-- Total Projects -->
        <div class="card-metric bg-slate-900 border-none group overflow-hidden relative">
            <div class="absolute top-0 right-0 w-full h-full bg-gradient-to-br from-primary/20 to-transparent"></div>
            <div class="flex justify-between items-start mb-8 relative z-10">
                <div class="w-12 h-12 rounded-2xl bg-white/10 backdrop-blur-md flex items-center justify-center text-white group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-2xl">rocket_launch</span>
                </div>
            </div>
            <div class="flex items-baseline gap-2 relative z-10">
                <span class="text-5xl font-black tracking-tighter text-white">{{ $stats['total_projects'] }}</span>
                <span class="text-xs font-bold text-white/40 uppercase tracking-widest">Live</span>
            </div>
            <p class="text-[10px] font-bold text-primary mt-6 uppercase tracking-widest relative z-10">Executions Pending</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-12">
    <!-- Active Projects Grid -->
    <div class="lg:col-span-2">
        <div class="flex justify-between items-center mb-10">
            <h2 class="text-2xl font-black tracking-tighter text-slate-900 italic uppercase underline decoration-primary/20 decoration-8 underline-offset-8">Active Project Lifecycle</h2>
            <a href="{{ route('admin.projects.index') }}" class="text-[10px] font-extrabold uppercase tracking-[0.2em] text-primary hover:text-primary-dark transition-colors">Catalog Interface &rarr;</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($stats['ongoing_projects'] as $project)
                <div class="glass-card rounded-stellar group p-2">
                    <div class="aspect-video rounded-2xl bg-slate-900 relative overflow-hidden shadow-inner">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB8fl98XnYzAO8MIxMbdOq2sHWJWW39dWTi1lfRBQonvGVOjdqjS9_FOMSm2yyN0Egfu5wR6LV-iG0hGS2rDjhTw9q7xdEkDk_ZvOk07Rjp8AvHVh12l3VKdYV7DOu9Lg8_oCkpewGPNQ1mtUnGlO7SDfC9Qgigyq8SUX2dxmUOm6c4bd6fTbAahdK3fYPF47Y1j_j2k_pLRXCrOi3wuPEWHXFfKXKZCyENFUFn07GXZHA31DlB_EavbL5OVFUAgxj2T36v6OFNGv1s" 
                             class="w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-1000">
                        <div class="absolute top-4 right-4 bg-white/20 backdrop-blur-xl px-4 py-2 rounded-xl text-[9px] font-black text-white uppercase tracking-widest border border-white/20">
                            {{ $project->category ?? 'ALPHA NODE' }}
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h4 class="text-lg font-black text-slate-900 tracking-tight leading-none mb-2">{{ $project->title }}</h4>
                                <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Engagement ID: #{{ rand(1000, 9999) }}</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center -space-x-2">
                                <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-100"></div>
                                <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-200"></div>
                            </div>
                            <span class="badge-stellar badge-live">{{ strtoupper($project->status) }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- System Health Sidebar -->
    <div class="space-y-12">
        <div>
            <h2 class="text-2xl font-black tracking-tighter text-slate-900 italic uppercase mb-10">Critical Health</h2>
            
            <div class="glass-card rounded-stellar p-10">
                <div class="space-y-8 mb-14">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-2.5 h-2.5 rounded-full bg-emerald-400 shadow-[0_0_15px_rgba(52,211,153,0.5)]"></div>
                            <span class="text-xs font-black text-slate-700 uppercase tracking-widest">NLP Engine Cluster</span>
                        </div>
                        <span class="text-[9px] font-bold text-slate-300 uppercase italic">Steady</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-2.5 h-2.5 rounded-full bg-emerald-400 shadow-[0_0_15px_rgba(52,211,153,0.5)]"></div>
                            <span class="text-xs font-black text-slate-700 uppercase tracking-widest">Neural Render API</span>
                        </div>
                        <span class="text-[9px] font-bold text-slate-300 uppercase italic">Optimal</span>
                    </div>
                    <div class="flex items-center justify-between border-b border-slate-50 pb-8">
                        <div class="flex items-center gap-4">
                            <div class="w-2.5 h-2.5 rounded-full bg-amber-400 shadow-[0_0_15px_rgba(251,191,36,0.5)]"></div>
                            <span class="text-xs font-black text-slate-700 uppercase tracking-widest">Core Database Sync</span>
                        </div>
                        <span class="text-[9px] font-bold text-slate-300 uppercase italic">High Latency</span>
                    </div>
                </div>

                <!-- Visual Pulse Representation -->
                <div class="h-24 flex items-end gap-1.5 px-2">
                    @for($i = 0; $i < 24; $i++)
                        <div class="flex-1 bg-primary/20 rounded-t-lg transition-all hover:bg-primary" style="height: {{ rand(20, 100) }}%"></div>
                    @endfor
                </div>
                <div class="mt-6 flex items-center justify-center gap-2">
                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-[0.4em]">SYSTEM HEARTBEAT</span>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-stellar p-10 text-white relative overflow-hidden shadow-2xl">
            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-full blur-3xl -mr-16 -mt-16"></div>
            <h3 class="text-lg font-black tracking-tight mb-4 relative z-10">Upgrade Infrastructure?</h3>
            <p class="text-xs text-slate-400 leading-relaxed mb-8 relative z-10 font-medium">Your current enterprise node is operating at 84% capacity. Consider scaling for higher bandwidth.</p>
            <button class="w-full bg-white text-slate-900 font-black py-4 rounded-xl text-[10px] uppercase tracking-widest hover:scale-105 transition-transform">Scalability Portal</button>
        </div>
    </div>
</div>

<!-- Recent Inquiries Ledger -->
<div class="mt-20">
    <div class="flex justify-between items-end mb-10">
        <h2 class="text-2xl font-black tracking-tighter text-slate-900 italic uppercase underline decoration-tertiary/20 decoration-8 underline-offset-8">Engagement Registry</h2>
        <a href="{{ route('admin.inquiries.index') }}" class="btn-stellar bg-slate-950 text-white border-none shadow-none text-[10px] py-2.5">Global Audit Log</a>
    </div>

    <div class="glass-surface rounded-stellar overflow-hidden border border-white/80">
        <table class="ledger-table">
            <thead>
                <tr>
                    <th>Signatory Identity</th>
                    <th>Engagement Request</th>
                    <th>Auth Status</th>
                    <th>Timeline Entry</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stats['recent_inquiries'] as $inquiry)
                    <tr>
                        <td>
                            <div class="flex flex-col">
                                <span class="font-black text-slate-900 leading-none mb-1">{{ $inquiry->name }}</span>
                                <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">{{ $inquiry->email }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="text-sm font-medium text-slate-500 italic">"{{ $inquiry->subject }}"</span>
                        </td>
                        <td>
                            <span class="badge-stellar {{ $inquiry->status == 'new' ? 'badge-live' : 'badge-warning' }}">
                                {{ strtoupper($inquiry->status) }}
                            </span>
                        </td>
                        <td>
                            <span class="text-[10px] font-extrabold text-slate-300 uppercase tracking-widest">{{ $inquiry->created_at->format('D, M d, H:i') }}</span>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-slate-50 text-slate-300 hover:text-primary hover:bg-primary/5 transition-all group">
                                <span class="material-symbols-outlined text-lg group-hover:translate-x-0.5 transition-transform">arrow_forward</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
