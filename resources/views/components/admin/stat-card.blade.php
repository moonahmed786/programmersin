@props(['label', 'value', 'icon', 'trend' => null, 'trendUp' => true])

<div class="bg-node-dark/40 backdrop-blur-sm p-6 rounded-node border border-white/5 shadow-2xl hover:border-primary/20 transition-all duration-500 group relative overflow-hidden">
    <!-- Background Glow -->
    <div class="absolute -right-10 -top-10 w-32 h-32 bg-primary/5 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

    <div class="flex items-center justify-between mb-6 relative z-10">
        <div class="w-11 h-11 rounded-xl bg-white/5 flex items-center justify-center text-slate-400 group-hover:bg-primary/20 group-hover:text-primary transition-all duration-500 border border-white/5 group-hover:border-primary/20">
            <span class="material-symbols-outlined text-xl">
                {{ $icon }}
            </span>
        </div>
        @if($trend)
            <div class="px-2.5 py-1 rounded-full {{ $trendUp ? 'bg-emerald-500/10 text-emerald-500 border-emerald-500/20' : 'bg-rose-500/10 text-rose-500 border-rose-500/20' }} border flex items-center gap-1 text-[10px] font-black uppercase tracking-widest">
                <span class="material-symbols-outlined text-[12px]">
                    {{ $trendUp ? 'trending_up' : 'trending_down' }}
                </span>
                {{ $trend }}
            </div>
        @endif
    </div>
    
    <div class="flex flex-col relative z-10">
        <span class="text-3xl font-black text-white tracking-tighter leading-none mb-1.5">
            {{ $value }}
        </span>
        <span class="text-[11px] font-bold text-slate-500 uppercase tracking-widest">
            {{ $label }}
        </span>
    </div>
</div>
