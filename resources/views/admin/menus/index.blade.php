@extends('layouts.backend')

@section('content')

<!-- Navigation Nodes Header -->
<div class="mb-14 px-2">
    <div class="flex justify-between items-end mb-10">
        <div class="flex flex-col gap-3">
            <h1 class="text-4xl font-black tracking-tighter text-on-surface uppercase italic">
                Navigation <span class="text-primary opacity-90">Nodes</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-black uppercase tracking-[0.4em] flex items-center gap-3">
                <span class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_rgba(0,118,255,0.4)] animate-pulse"></span>
                Registry of header and footer navigation architectural nodes
            </p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('admin.menus.create') }}" class="btn-stellar">
                <span class="material-symbols-outlined text-base">add</span>
                Add Menu Item
            </a>
        </div>
    </div>
</div>

{{-- Success Indicators --}}
@if(session('success'))
    <div class="mb-10 flex items-center gap-6 bg-emerald-50 border border-emerald-100 text-emerald-900 px-8 py-5 rounded-stellar text-[11px] font-black uppercase tracking-widest animate-in-fade shadow-sm">
        <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-emerald-500 shadow-sm border border-emerald-100">
            <span class="material-symbols-outlined text-xl">verified</span>
        </div>
        {{ session('success') }}
    </div>
@endif

<!-- Intelligence Ledger -->
<div class="bg-white rounded-stellar overflow-hidden border border-slate-100 shadow-sm">
    <div class="overflow-x-auto">
        <table class="ledger-table w-full">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-50">
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Node Identity</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">URI / Link</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Section</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Sequence</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Status</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">Execution</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($menus as $menu)
                    <tr class="hover:bg-slate-50/50 transition-all group">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-5">
                                <div class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-primary shadow-sm group-hover:rotate-6 transition-all">
                                    <span class="material-symbols-outlined text-lg">link</span>
                                </div>
                                <span class="font-black text-on-surface tracking-tight leading-none">{{ $menu->title }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-[11px] font-mono font-bold text-primary italic tracking-tighter bg-primary/5 px-2.5 py-1 rounded-lg">{{ $menu->url ?: 'VOID' }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-[9px] font-black uppercase tracking-widest text-slate-400 leading-none flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full {{ $menu->location === 'header' ? 'bg-indigo-400' : 'bg-amber-400' }}"></span>
                                {{ strtoupper($menu->location) }}
                            </span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-[10px] font-black text-slate-400 font-mono tracking-widest tabular-nums italic">{{ str_pad($menu->order, 2, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="badge-node {{ $menu->is_active ? 'badge-live' : 'badge-draft' }} font-black text-[9px] tracking-widest leading-none">
                                {{ $menu->is_active ? 'ACTIVE' : 'INACTIVE' }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex justify-end gap-3 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-x-4 group-hover:translate-x-0">
                                <a href="{{ route('admin.menus.edit', $menu) }}" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:text-primary hover:bg-white hover:shadow-sm transition-all border border-slate-100">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                </a>
                                <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" onsubmit="return confirm('Securely archive this structural node?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:text-rose-600 transition-all hover:bg-rose-50 border border-slate-100 hover:border-rose-100">
                                        <span class="material-symbols-outlined text-lg">delete_forever</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    
                    @foreach($menu->children as $child)
                    <tr class="bg-slate-50/30 group border-l-4 border-primary/10 hover:bg-slate-50/60 transition-colors">
                        <td class="px-8 py-4">
                            <div class="flex items-center gap-4 pl-14">
                                <span class="material-symbols-outlined text-slate-300 text-base rotate-90">subdirectory_arrow_right</span>
                                <span class="text-xs font-black text-slate-500 tracking-tight italic">{{ $child->title }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-4">
                            <span class="text-[10px] font-mono text-slate-400 italic tracking-tighter">{{ $child->url ?: 'VOID' }}</span>
                        </td>
                        <td class="px-8 py-4">
                            <span class="text-[9px] font-black text-slate-300 uppercase tracking-widest pl-2 italic">Sub-Node</span>
                        </td>
                        <td class="px-8 py-4">
                            <span class="text-[10px] font-black text-slate-300 font-mono italic">{{ str_pad($child->order, 2, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td class="px-8 py-4">
                            <div class="w-1.5 h-1.5 rounded-full {{ $child->is_active ? 'bg-primary shadow-[0_0_8px_rgba(0,118,255,0.4)]' : 'bg-slate-200' }}"></div>
                        </td>
                        <td class="px-8 py-4 text-right">
                            <div class="flex justify-end opacity-0 group-hover:opacity-100 transition-all translate-x-3 group-hover:translate-x-0">
                                <a href="{{ route('admin.menus.edit', $child) }}" class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-slate-100 text-slate-300 hover:text-primary hover:shadow-sm transition-all">
                                    <span class="material-symbols-outlined text-base">edit</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                @empty
                    <tr>
                        <td colspan="6" class="px-8 py-32 text-center">
                            <div class="w-20 h-20 rounded-full bg-slate-50 flex items-center justify-center mx-auto mb-6 border border-slate-100">
                                <span class="material-symbols-outlined text-4xl text-slate-200">menu_open</span>
                            </div>
                            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 italic">No navigation nodes detected in the registry node cluster.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
