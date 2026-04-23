@props(['column', 'label'])

@php
    $direction = request('direction', 'asc');
    $sort = request('sort');
    $isActive = $sort === $column;
    $nextDirection = $isActive && $direction === 'asc' ? 'desc' : 'asc';
@endphp

<th {{ $attributes->merge(['class' => 'px-6 py-3.5 text-left']) }}>
    <a href="{{ request()->fullUrlWithQuery(['sort' => $column, 'direction' => $nextDirection]) }}" 
       class="flex items-center gap-1.5 text-xs font-semibold transition-all hover:text-primary {{ $isActive ? 'text-primary' : 'text-slate-500' }}">
        {{ $label }}
        
        @if($isActive)
        <span class="material-symbols-outlined text-sm">{{ $direction === 'asc' ? 'arrow_upward' : 'arrow_downward' }}</span>
        @endif
    </a>
</th>
