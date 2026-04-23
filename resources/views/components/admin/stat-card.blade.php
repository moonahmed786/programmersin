@props(['label', 'value', 'icon', 'trend' => null, 'trendUp' => true])

<div class="bg-white p-6 rounded-2xl border border-slate-100 hover:border-slate-200 transition-all duration-300 group">
    <div class="flex items-start justify-between">
        <div>
            <p class="text-xs font-medium text-slate-500 mb-1">{{ $label }}</p>
            <h3 class="text-3xl font-bold text-slate-900 tracking-tight">{{ $value }}</h3>
        </div>
        <div class="w-10 h-10 rounded-xl bg-primary/8 flex items-center justify-center text-primary">
            <span class="material-symbols-outlined text-xl">{{ $icon }}</span>
        </div>
    </div>
    
    @if(isset($trend))
    <div class="mt-4 flex items-center gap-2">
        <span class="inline-flex items-center gap-1 text-xs font-medium {{ $trendUp ?? true ? 'text-emerald-600' : 'text-red-500' }}">
            <span class="material-symbols-outlined text-sm">{{ ($trendUp ?? true) ? 'trending_up' : 'trending_down' }}</span>
            {{ $trend }}
        </span>
        <span class="text-xs text-slate-400">vs last month</span>
    </div>
    @endif
</div>
