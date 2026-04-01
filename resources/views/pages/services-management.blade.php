@extends("layouts.backend")

@section("content")
<!-- Bento Dashboard Header -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="col-span-1 md:col-span-2 bg-surface-container-lowest p-10 rounded-3xl flex flex-col justify-center relative overflow-hidden group border border-outline-variant/10 shadow-xl shadow-slate-200/40">
        <div class="absolute top-0 right-0 p-8 opacity-[0.03] group-hover:opacity-10 transition-opacity">
            <span class="material-symbols-outlined text-[120px]">hub</span>
        </div>
        <h2 class="text-4xl font-black tracking-tighter mb-2 text-on-surface">Core Offerings</h2>
        <p class="text-on-surface-variant max-w-sm italic font-medium leading-relaxed">Manage your agency's service ecosystem, tech stacks, and delivery frameworks.</p>
    </div>
    <div class="bg-primary p-8 rounded-3xl flex flex-col justify-between shadow-2xl shadow-primary/20 group overflow-hidden relative">
        <span class="material-symbols-outlined text-white/20 text-4xl group-hover:scale-125 transition-transform duration-700">bolt</span>
        <div class="relative z-10">
            <div class="text-5xl font-black text-white tracking-tighter">24</div>
            <div class="text-[10px] font-black uppercase tracking-[0.2em] text-white/60 mt-1">Live Engines</div>
        </div>
    </div>
    <div class="bg-surface-container-lowest p-8 rounded-3xl flex flex-col justify-between border border-outline-variant/10 shadow-xl shadow-slate-200/40">
        <span class="material-symbols-outlined text-slate-300 text-4xl">build_circle</span>
        <div>
            <div class="text-5xl font-black text-on-surface tracking-tighter">03</div>
            <div class="text-[10px] font-black uppercase tracking-[0.2em] text-on-surface-variant mt-1">Maintenance</div>
        </div>
    </div>
</div>

<!-- Table Section -->
<div class="bg-surface-container-lowest rounded-3xl overflow-hidden shadow-2xl shadow-slate-200/50 border border-outline-variant/10">
    <!-- Table Controls -->
    <div class="px-10 py-8 flex flex-wrap items-center justify-between gap-6 border-b border-outline-variant/10">
        <div class="flex items-center gap-8">
            <h3 class="text-xs font-black uppercase tracking-[0.2em] text-on-surface-variant">Inventory Analysis</h3>
            <div class="flex items-center gap-2 bg-surface-container-low p-1.5 rounded-2xl border border-outline-variant/5">
                <button class="px-6 py-2 text-[10px] font-black uppercase tracking-widest rounded-xl bg-on-surface text-surface shadow-lg">All Units</button>
                <button class="px-6 py-2 text-[10px] font-black uppercase tracking-widest rounded-xl text-on-surface-variant hover:text-primary transition-all">Client Side</button>
                <button class="px-6 py-2 text-[10px] font-black uppercase tracking-widest rounded-xl text-on-surface-variant hover:text-primary transition-all">Core Ops</button>
            </div>
        </div>
        <div class="flex items-center gap-6">
            <button class="bg-primary text-on-primary px-8 py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest flex items-center gap-3 hover:opacity-90 shadow-2xl shadow-primary/30 transition-all hover:-translate-y-1">
                <span class="material-symbols-outlined text-lg">add</span>
                Append Service
            </button>
        </div>
    </div>
    
    <!-- Data Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface-container-low/30 text-[10px] uppercase tracking-[0.2em] text-slate-400 font-black italic">
                    <th class="px-10 py-6">Architectural Title</th>
                    <th class="px-8 py-6">Domain</th>
                    <th class="px-8 py-6">Velocity</th>
                    <th class="px-8 py-6 text-right">Status</th>
                    <th class="px-10 py-6 text-right">Operations</th>
                </tr>
            </thead>
            <tbody class="divide-y-0">
                <!-- Sample Row 1 -->
                <tr class="group hover:bg-surface-container/30 transition-all">
                    <td class="px-10 py-8">
                        <div class="flex items-center gap-5">
                            <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 shadow-sm border border-blue-100/50">
                                <span class="material-symbols-outlined text-2xl">smartphone</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <div class="font-black text-on-surface text-base tracking-tight group-hover:text-primary transition-colors">iOS Executive Suite</div>
                                <div class="text-[10px] text-on-surface-variant font-bold uppercase tracking-widest">Build v2.4.0 • Enterprise Core</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-8">
                        <span class="px-4 py-1.5 bg-surface-container-low text-on-surface-variant text-[10px] font-black rounded-lg uppercase tracking-widest border border-outline-variant/10">Mobile Apps</span>
                    </td>
                    <td class="px-8 py-8">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-sm text-slate-300">timer</span>
                            <span class="text-sm text-on-surface font-bold tracking-tight">12-16 Weeks</span>
                        </div>
                    </td>
                    <td class="px-8 py-8 text-right">
                        <span class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container rounded-full text-[10px] font-black uppercase tracking-widest text-on-surface-variant border border-outline-variant/10">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></span>
                            Production
                        </span>
                    </td>
                    <td class="px-10 py-8 text-right">
                        <button class="w-10 h-10 hover:bg-surface-container rounded-xl text-slate-300 hover:text-primary transition-all flex items-center justify-center group/btn border border-transparent hover:border-outline-variant/20">
                            <span class="material-symbols-outlined group-hover/btn:scale-110 transition-transform">more_horiz</span>
                        </button>
                    </td>
                </tr>
                <!-- Sample Row 2 -->
                <tr class="group hover:bg-surface-container/30 transition-all">
                    <td class="px-10 py-8">
                        <div class="flex items-center gap-5">
                            <div class="w-14 h-14 rounded-2xl bg-indigo-50 flex items-center justify-center text-indigo-600 shadow-sm border border-indigo-100/50">
                                <span class="material-symbols-outlined text-2xl">dns</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <div class="font-black text-on-surface text-base tracking-tight group-hover:text-primary transition-colors">Microservice Gateway</div>
                                <div class="text-[10px] text-on-surface-variant font-bold uppercase tracking-widest">Build v1.0.2 • Logic Layer</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-8">
                        <span class="px-4 py-1.5 bg-surface-container-low text-on-surface-variant text-[10px] font-black rounded-lg uppercase tracking-widest border border-outline-variant/10">Cloud Infra</span>
                    </td>
                    <td class="px-8 py-8">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-sm text-slate-300">timer</span>
                            <span class="text-sm text-on-surface font-bold tracking-tight">4-8 Weeks</span>
                        </div>
                    </td>
                    <td class="px-8 py-8 text-right">
                        <span class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container rounded-full text-[10px] font-black uppercase tracking-widest text-on-surface-variant border border-outline-variant/10">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                            Standby
                        </span>
                    </td>
                    <td class="px-10 py-8 text-right">
                        <button class="w-10 h-10 hover:bg-surface-container rounded-xl text-slate-300 hover:text-primary transition-all flex items-center justify-center group/btn border border-transparent hover:border-outline-variant/20">
                            <span class="material-symbols-outlined group-hover/btn:scale-110 transition-transform">more_horiz</span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Contextual Analysis Section -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12 mb-10">
    <div class="bg-surface-container-lowest p-10 rounded-3xl border border-outline-variant/10 shadow-2xl shadow-slate-200/40">
        <div class="flex items-center justify-between mb-8">
            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Intelligence Hub</span>
            <span class="material-symbols-outlined text-slate-300">analytics</span>
        </div>
        <div class="space-y-6">
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-black text-on-surface uppercase tracking-tight">Web Engines</span>
                    <span class="text-xs font-black text-primary">62%</span>
                </div>
                <div class="w-full h-1.5 bg-surface-container-low rounded-full overflow-hidden shadow-inner">
                    <div class="h-full bg-primary w-[62%] rounded-full shadow-[0_0_8px_rgba(0,86,210,0.3)]"></div>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-black text-on-surface uppercase tracking-tight">Backend Logic</span>
                    <span class="text-xs font-black text-indigo-600">45%</span>
                </div>
                <div class="w-full h-1.5 bg-surface-container-low rounded-full overflow-hidden shadow-inner">
                    <div class="h-full bg-indigo-600 w-[45%] rounded-full shadow-[0_0_8px_rgba(79,70,229,0.3)]"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-surface-container-lowest p-10 rounded-3xl border border-outline-variant/10 shadow-2xl shadow-slate-200/40">
        <div class="flex items-center justify-between mb-8">
            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-orange-600">Timeline Feed</span>
            <span class="material-symbols-outlined text-slate-300">history</span>
        </div>
        <div class="space-y-5">
            <div class="flex gap-4">
                <div class="w-2 h-2 rounded-full bg-primary mt-1.5 shadow-[0_0_8px_rgba(0,86,210,0.4)]"></div>
                <p class="text-xs text-on-surface-variant font-medium leading-relaxed italic"><strong class="text-on-surface font-black not-italic tracking-tight">Mobile Core</strong> shifted to Maintenance 2h ago</p>
            </div>
            <div class="flex gap-4">
                <div class="w-2 h-2 rounded-full bg-emerald-500 mt-1.5 shadow-[0_0_8px_rgba(16,185,129,0.4)]"></div>
                <p class="text-xs text-on-surface-variant font-medium leading-relaxed italic"><strong class="text-on-surface font-black not-italic tracking-tight">Edge API</strong> v2.1.0 deployed successfully</p>
            </div>
        </div>
    </div>
    <div class="bg-gradient-to-br from-on-surface to-slate-800 p-10 rounded-3xl text-surface shadow-2xl shadow-on-surface/30 flex flex-col justify-between group overflow-hidden relative">
        <div class="relative z-10">
            <h4 class="font-black text-primary-fixed-dim text-sm uppercase tracking-widest mb-2">Scale Optimization</h4>
            <p class="text-slate-300 text-xs leading-relaxed italic font-medium">System recommends migrating 3 legacy backend services to Microservices for 22% better throughput of data packets.</p>
        </div>
        <button class="w-full mt-6 py-4 bg-white/5 border border-white/10 text-[10px] font-black uppercase tracking-widest rounded-2xl hover:bg-white/10 transition-all">View Audit Report</button>
        <span class="material-symbols-outlined absolute -right-6 -bottom-6 text-9xl text-white/5 pointer-events-none group-hover:scale-125 transition-transform duration-700">shutter_speed</span>
    </div>
</div>
@endsection