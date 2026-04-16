@extends('layouts.backend')

@section('content')

<!-- Navigation Nodes Header -->
<div class="mb-14">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h1 class="text-3xl font-black tracking-tighter text-slate-900 uppercase italic">
                <span class="text-gradient">Navigation Nodes</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-extrabold uppercase tracking-[0.3em] mt-2 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                Manage header and footer navigation architectural nodes
            </p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('admin.menus.create') }}" class="btn-stellar">
                <span class="material-symbols-outlined text-sm">add</span>
                Add Menu Item
            </a>
        </div>
    </div>
</div>

{{-- Success Indicators --}}
@if(session('success'))
    <div class="mb-10 flex items-center gap-4 bg-emerald-50 border border-emerald-100 text-emerald-600 px-8 py-5 rounded-stellar text-[11px] font-black uppercase tracking-widest animate-in-fade shadow-sm">
        <span class="material-symbols-outlined text-lg">check_circle</span>
        {{ session('success') }}
    </div>
@endif

<!-- Ledger Table -->
<div class="glass-surface rounded-stellar overflow-hidden border border-white/80 animate-in-fade">
    <table class="ledger-table">
        <thead>
            <tr>
                <th>Node Identity</th>
                <th>URI / Link</th>
                <th>Section</th>
                <th>Priority</th>
                <th>Status</th>
                <th class="text-right">Execution</th>
            </tr>
        </thead>
        <tbody>
            @forelse($menus as $menu)
                <tr class="group">
                    <td>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-primary/5 flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' 1;">link</span>
                            </div>
                            <span class="font-black text-slate-900 tracking-tight">{{ $menu->title }}</span>
                        </div>
                    </td>
                    <td>
                        <span class="text-xs font-mono font-bold text-primary italic">{{ $menu->url ?: 'VOID' }}</span>
                    </td>
                    <td>
                        <span class="badge-stellar {{ $menu->location === 'header' ? 'bg-primary/5 text-primary border-primary/10' : 'bg-tertiary/10 text-tertiary border-tertiary/10' }}">
                            {{ strtoupper($menu->location) }}
                        </span>
                    </td>
                    <td>
                        <span class="text-[11px] font-black text-slate-300">{{ str_pad($menu->order, 2, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td>
                        <span class="badge-stellar {{ $menu->is_active ? 'badge-live' : 'badge-warning' }}">
                            {{ $menu->is_active ? 'ACTIVE' : 'IDLE' }}
                        </span>
                    </td>
                    <td class="text-right">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.menus.edit', $menu) }}" class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-slate-50 text-slate-300 hover:text-primary hover:bg-primary/5 transition-all">
                                <span class="material-symbols-outlined text-lg">edit</span>
                            </a>
                            <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" onsubmit="return confirm('Archive this node permanently?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-slate-50 text-slate-300 hover:text-red-500 hover:bg-red-50 transition-all">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                
                @foreach($menu->children as $child)
                <tr class="bg-slate-50/30 group">
                    <td class="first:rounded-none">
                        <div class="flex items-center gap-3 pl-14">
                            <span class="material-symbols-outlined text-slate-200 text-sm">subdirectory_arrow_right</span>
                            <span class="text-xs font-bold text-slate-400 tracking-tight">{{ $child->title }}</span>
                        </div>
                    </td>
                    <td>
                        <span class="text-[10px] font-mono text-slate-300 italic">{{ $child->url ?: 'VOID' }}</span>
                    </td>
                    <td>
                        <span class="text-[9px] font-black text-slate-200 uppercase tracking-widest">SUB-NODE</span>
                    </td>
                    <td>
                        <span class="text-[11px] font-black text-slate-200 opacity-50">{{ str_pad($child->order, 2, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td>
                        <div class="w-1.5 h-1.5 rounded-full {{ $child->is_active ? 'bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.5)]' : 'bg-slate-200' }}"></div>
                    </td>
                    <td class="text-right last:rounded-none">
                        <a href="{{ route('admin.menus.edit', $child) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-slate-200 hover:text-primary transition-all">
                            <span class="material-symbols-outlined text-base">edit</span>
                        </a>
                    </td>
                </tr>
                @endforeach

            @empty
                <tr>
                    <td colspan="6" class="px-6 py-32 text-center">
                        <div class="w-20 h-20 rounded-3xl bg-slate-50 flex items-center justify-center mx-auto mb-6">
                            <span class="material-symbols-outlined text-4xl text-slate-200">menu_open</span>
                        </div>
                        <p class="text-[10px] font-extrabold uppercase tracking-[0.3em] text-slate-300 italic">No navigation nodes detected in the registry.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
