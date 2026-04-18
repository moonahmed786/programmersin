@props(['route', 'icon', 'active' => false, 'fill' => false])

@php
    $isActive = $active ?: (request()->routeIs($route) || request()->routeIs($route . '.*'));
@endphp

<a href="{{ Route::has($route) ? route($route) : '#' }}"
    {{ $attributes->merge(['class' => 'sidebar-link ' . ($isActive ? 'active' : '')]) }}>
    <span class="material-symbols-outlined text-xl" 
          style="font-variation-settings: 'FILL' {{ ($isActive || $fill) ? '1' : '0' }};">
        {{ $icon }}
    </span>
    <span class="text-sm tracking-tight">{{ $slot }}</span>
</a>
