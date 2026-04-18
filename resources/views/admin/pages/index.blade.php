@extends('layouts.backend')

@section('content')

<!-- Blueprint Management Header -->
<div class="mb-12">
    <div class="flex justify-between items-end mb-8">
        <div>
            <h1 class="text-3xl font-black tracking-tighter text-white uppercase">Blueprint Management</h1>
            <p class="text-xs text-slate-500 font-bold uppercase tracking-widest mt-1.5 opacity-80">Manage dynamic architectural nodes and experience blueprints.</p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('admin.pages.create') }}" class="bg-primary text-white px-8 py-3 rounded-xl font-black text-xs tracking-tight hover:brightness-110 shadow-xl shadow-primary/20 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">add_circle</span>
                Initialize Blueprint
            </a>
        </div>
    </div>
</div>

{{-- Flash Messages --}}
@if(session('success'))
    <div class="mb-8 flex items-center gap-3 bg-secondary/10 border border-secondary/20 text-secondary px-6 py-4 rounded-node text-xs font-bold">
        <span class="material-symbols-outlined text-base">check_circle</span>
        {{ session('success') }}
    </div>
@endif

<!-- Ledger Table -->
<div class="bg-node-dark/40 backdrop-blur-sm rounded-node overflow-hidden border border-white/5 shadow-2xl">
    <table class="ledger-table">
        <thead>
            <tr class="bg-white/5 border-b border-white/5">
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Blueprint Identity</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Experience Slug</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Node Depth</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Status</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Last Refinement</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em] text-right">Execution</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @foreach($pages as $page)
                <tr class="hover:bg-white/[0.03] transition-colors group">
                    <td class="px-8 py-5">
                        <div class="flex items-center gap-5">
                            <div class="w-11 h-11 rounded-lg bg-white/5 flex items-center justify-center text-primary border border-white/10 shadow-inner shadow-white/5">
                                <span class="material-symbols-outlined text-lg">auto_stories</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-black text-white tracking-tight">{{ $page->title }}</span>
                                <span class="text-[9px] text-slate-500 font-bold uppercase tracking-widest mt-0.5">System Blueprint</span>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <a href="{{ url($page->slug) }}" target="_blank" class="flex items-center gap-1.5 text-[11px] font-black text-primary hover:text-white transition-colors font-mono tracking-tighter">
                            /{{ $page->slug }}
                            <span class="material-symbols-outlined text-[10px]">open_in_new</span>
                        </a>
                    </td>
                    <td class="px-8 py-5">
                        <div class="flex items-center gap-1">
                            @php $count = count($page->content ?? []); @endphp
                            <span class="text-[10px] font-black font-mono text-slate-400 uppercase tracking-widest">{{ $count > 9 ? $count : '0'.$count }} Nodes</span>
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <span class="badge-node {{ $page->is_published ? 'badge-live' : 'badge-draft' }} tracking-[0.2em] font-black text-[9px]">
                            {{ $page->is_published ? 'LIVE' : 'DRAFT' }}
                        </span>
                    </td>
                    <td class="px-8 py-5">
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">{{ $page->updated_at->diffForHumans() }}</span>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex items-center justify-end gap-5 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-x-4 group-hover:translate-x-0">
                            <a href="{{ route('admin.pages.edit', $page) }}" class="p-2 text-slate-500 hover:text-primary transition-colors hover:bg-white/5 rounded-lg border border-transparent hover:border-white/10">
                                <span class="material-symbols-outlined text-base">edit</span>
                            </a>
                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" onsubmit="return confirm('Archive this blueprint permanently?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 text-slate-500 hover:text-rose-500 transition-colors hover:bg-rose-500/5 rounded-lg border border-transparent hover:border-rose-500/10">
                                    <span class="material-symbols-outlined text-base">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            @if($pages->isEmpty())
                <tr>
                    <td colspan="6" class="px-6 py-20 text-center">
                        <span class="material-symbols-outlined text-5xl text-slate-200 block mb-3">post_add</span>
                        <p class="text-on-surface-variant text-sm font-medium opacity-50 italic">Registry is clear. No blueprints detected.</p>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

@if($pages->hasPages())
    <div class="mt-8">
        {{ $pages->links() }}
    </div>
@endif

@endsection
