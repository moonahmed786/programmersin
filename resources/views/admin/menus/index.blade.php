@extends('layouts.backend')

@section('content')

<!-- Navigation Nodes Header -->
<div class="mb-14">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h1 class="text-3xl font-black tracking-tighter text-white uppercase italic">
                Navigation <span class="text-primary">Nodes</span>
            </h1>
            <p class="text-[10px] text-slate-500 font-extrabold uppercase tracking-[.4em] mt-3 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_rgba(0,118,255,0.5)]"></span>
                Manage header and footer navigation architectural nodes
            </p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('admin.menus.create') }}" class="bg-primary text-white px-8 py-3 rounded-xl font-black text-xs tracking-tight hover:brightness-110 shadow-xl shadow-primary/20 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">add</span>
                Add Menu Item
            </a>
        </div>
    </div>
</div>

{{-- Success Indicators --}}
@if(session('success'))
    <div class="mb-10 flex items-center gap-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 px-8 py-5 rounded-node text-[11px] font-black uppercase tracking-widest animate-in-fade shadow-sm">
        <span class="material-symbols-outlined text-lg">check_circle</span>
        {{ session('success') }}
    </div>
@endif

<!-- Ledger Table -->
<div class="bg-node-dark/40 backdrop-blur-sm rounded-node overflow-hidden border border-white/5 shadow-2xl">
    <table class="ledger-table">
        <thead>
            <tr class="bg-white/5 border-b border-white/5">
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Node Identity</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">URI / Link</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Section</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Priority</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Status</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em] text-right">Execution</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @forelse($menus as $menu)
                <tr class="hover:bg-white/[0.03] transition-colors group">
                    <td class="px-8 py-5">
                        <div class="flex items-center gap-5">
                            <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center text-primary group-hover:scale-110 transition-transform shadow-2xl border border-white/5">
                                <span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' 1;">link</span>
                            </div>
                            <span class="font-black text-white tracking-tight">{{ $menu->title }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <span class="text-xs font-mono font-bold text-primary italic tracking-tighter">{{ $menu->url ?: 'VOID' }}</span>
                    </td>
                    <td class="px-8 py-5">
                        <span class="badge-node {{ $menu->location === 'header' ? 'badge-live' : 'badge-draft opacity-80' }} tracking-[.15em] font-black text-[9px]">
                            {{ strtoupper($menu->location) }}
                        </span>
                    </td>
                    <td class="px-8 py-5">
                        <span class="text-[11px] font-black text-slate-500 font-mono tracking-widest">{{ str_pad($menu->order, 2, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td class="px-8 py-5">
                        <span class="badge-node {{ $menu->is_active ? 'badge-live' : 'badge-draft' }} tracking-[.15em] font-black text-[9px]">
                            {{ $menu->is_active ? 'ACTIVE' : 'IDLE' }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex items-center justify-end gap-5 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-x-4 group-hover:translate-x-0">
                            <a href="{{ route('admin.menus.edit', $menu) }}" class="p-2 text-slate-500 hover:text-primary transition-colors hover:bg-white/5 rounded-lg border border-transparent hover:border-white/10">
                                <span class="material-symbols-outlined text-base">edit</span>
                            </a>
                            <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" onsubmit="return confirm('Archive this node permanently?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 text-slate-500 hover:text-rose-500 transition-colors hover:bg-rose-500/5 rounded-lg border border-transparent hover:border-rose-500/10">
                                    <span class="material-symbols-outlined text-base">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                
                @foreach($menu->children as $child)
                <tr class="bg-white/[0.015] group border-l-2 border-primary/20">
                    <td class="px-8 py-4">
                        <div class="flex items-center gap-3 pl-14">
                            <span class="material-symbols-outlined text-slate-700 text-sm">subdirectory_arrow_right</span>
                            <span class="text-xs font-bold text-slate-500 tracking-tight">{{ $child->title }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-4">
                        <span class="text-[10px] font-mono text-slate-600 italic tracking-tighter">{{ $child->url ?: 'VOID' }}</span>
                    </td>
                    <td class="px-8 py-4">
                        <span class="text-[9px] font-black text-slate-700 uppercase tracking-widest pl-2">SUB-NODE</span>
                    </td>
                    <td class="px-8 py-4">
                        <span class="text-[11px] font-black text-slate-700 font-mono">{{ str_pad($child->order, 2, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td class="px-8 py-4">
                        <div class="w-1.5 h-1.5 rounded-full {{ $child->is_active ? 'bg-primary shadow-[0_0_8px_rgba(0,118,255,0.6)]' : 'bg-white/10' }}"></div>
                    </td>
                    <td class="px-8 py-4 text-right">
                        <a href="{{ route('admin.menus.edit', $child) }}" class="p-1.5 text-slate-700 hover:text-primary transition-colors hover:bg-white/5 rounded-md">
                            <span class="material-symbols-outlined text-base">edit</span>
                        </a>
                    </td>
                </tr>
                @endforeach

            @empty
                <tr>
                    <td colspan="6" class="px-8 py-32 text-center">
                        <div class="w-20 h-20 rounded-3xl bg-white/5 flex items-center justify-center mx-auto mb-6 border border-white/5">
                            <span class="material-symbols-outlined text-4xl text-slate-600">menu_open</span>
                        </div>
                        <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-600 italic">No navigation nodes detected in the registry.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
