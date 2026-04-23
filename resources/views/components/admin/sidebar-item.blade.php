@props(['route', 'icon', 'active' => false, 'fill' => false])

@php
    $isActive = $active ?: (request()->routeIs($route) || request()->routeIs($route . '.*'));
@endphp

<a href="{{ Route::has($route) ? route($route) : '#' }}"
    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ $isActive ? 'bg-primary/8 text-primary font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
    <span class="material-symbols-outlined text-xl" 
          style="font-variation-settings: 'FILL' {{ ($isActive || $fill) ? '1' : '0' }};">
        {{ $icon }}
    </span>
    <span>{{ $slot }}</span>
</a>
