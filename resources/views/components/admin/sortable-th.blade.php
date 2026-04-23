@props(['column', 'label'])

@php
    $direction = request('direction', 'asc');
    $sort = request('sort');
    $isActive = $sort === $column;
    $nextDirection = $isActive && $direction === 'asc' ? 'desc' : 'asc';
@endphp

<th {{ $attributes->merge(['class' => 'px-8 py-5 text-left bg-background/50 border-b border-outline-variant group/th']) }}>
    <a href="{{ request()->fullUrlWithQuery(['sort' => $column, 'direction' => $nextDirection]) }}" 
       class="flex items-center gap-2 text-[11px] font-black uppercase tracking-[0.15em] transition-all hover:text-primary {{ $isActive ? 'text-primary' : 'text-on-surface-variant' }}">
        {{ $label }}
        
        <div class="flex flex-col -gap-1 opacity-0 group-hover/th:opacity-100 transition-opacity {{ $isActive ? 'opacity-100' : '' }}">
            <span class="material-symbols-outlined text-[10px] leading-none {{ ($isActive && $direction === 'asc') ? 'text-primary' : 'text-slate-300' }}">expand_less</span>
            <span class="material-symbols-outlined text-[10px] leading-none {{ ($isActive && $direction === 'desc') ? 'text-primary' : 'text-slate-300' }}">expand_more</span>
        </div>
    </a>
</th>
