@props(['label', 'value', 'icon', 'trend' => null, 'trendUp' => true])

<div class="bg-white p-6 rounded-node border border-slate-100 shadow-sm hover:shadow-md transition-all duration-500 group relative overflow-hidden">
    <div class="card-metric group">
    <div class="flex items-start justify-between">
        <div class="flex flex-col">
            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2 leading-none uppercase">{{ $label }}</span>
            <h3 class="text-3xl font-black text-slate-900 tracking-tighter">{{ $value }}</h3>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600 border border-blue-100 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500 shadow-inner">
            <span class="material-symbols-outlined text-xl">{{ $icon }}</span>
        </div>
    </div>
    
    @if(isset($trend))
    <div class="mt-6 flex items-center gap-3">
        <div class="flex items-center gap-1.5 {{ $trendUp ?? true ? 'text-emerald-500' : 'text-rose-500' }}">
            <span class="material-symbols-outlined text-base">{{ ($trendUp ?? true) ? 'trending_up' : 'trending_down' }}</span>
            <span class="text-[10px] font-black uppercase tracking-widest">{{ $trend }}</span>
        </div>
        <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest italic opacity-60">vs last segment</span>
    </div>
    @else
    <div class="mt-6 flex items-center gap-4">
        <div class="flex -space-x-2">
            @for($i = 0; $i < 4; $i++)
                <div class="w-6 h-6 rounded-full border-2 border-white bg-slate-100 flex items-center justify-center text-[8px] font-black text-slate-400">
                    {{ chr(65 + $i) }}
                </div>
            @endfor
        </div>
        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Active Units</span>
    </div>
    @endif

    <!-- Tonal Accent -->
    <div class="absolute bottom-0 left-0 w-full h-1 bg-slate-100 group-hover:bg-blue-600 transition-all duration-700"></div>
</div>
</div>
