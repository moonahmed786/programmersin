@extends('layouts.backend')

@section('content')

<!-- Blueprint Management Header -->
<div class="mb-14 px-2">
    <div class="flex justify-between items-end mb-10">
        <div class="flex flex-col gap-3">
            <h1 class="text-4xl font-black tracking-tighter text-on-surface uppercase italic">
                Blueprint <span class="text-primary opacity-90">Management</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-black uppercase tracking-[0.4em] flex items-center gap-3">
                <span class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_rgba(0,118,255,0.4)] animate-pulse"></span>
                Registry of dynamic architectural nodes and experience blueprints
            </p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('admin.pages.create') }}" class="btn-stellar">
                <span class="material-symbols-outlined text-base">add_circle</span>
                Initialize Blueprint
            </a>
        </div>
    </div>
</div>

{{-- Flash Indicators --}}
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
    <x-admin.table-filter-bar placeholder="Search blueprints by title or description..." />
    
    <div class="overflow-x-auto">
        <table class="ledger-table w-full">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-50">
                    <x-admin.sortable-th column="title" label="Blueprint Identity" />
                    <x-admin.sortable-th column="slug" label="Experience Slug" />
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] bg-background/50 border-b border-outline-variant">Node Depth</th>
                    <x-admin.sortable-th column="is_published" label="Registry Status" />
                    <x-admin.sortable-th column="updated_at" label="Last Refined" />
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] bg-background/50 border-b border-outline-variant text-right">Execution</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach($pages as $page)
                    <tr class="hover:bg-slate-50/50 transition-all group">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-6">
                                <div class="w-12 h-12 rounded-2xl bg-primary/5 border border-primary/10 flex items-center justify-center text-primary shadow-sm group-hover:scale-105 transition-all duration-500">
                                    <span class="material-symbols-outlined text-2xl group-hover:rotate-12 transition-transform">auto_stories</span>
                                </div>
                                <div class="flex flex-col">
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="font-black text-on-surface tracking-tight leading-none mb-1.5 hover:text-primary transition-colors">{{ $page->title }}</a>
                                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest italic">Experience Blueprint</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <a href="{{ url($page->slug) }}" target="_blank" class="flex items-center gap-2 text-[11px] font-black text-primary hover:text-on-surface transition-all font-mono tracking-tighter bg-primary/5 px-4 py-2 rounded-xl border border-primary/5 hover:border-primary/20">
                                /{{ $page->slug }}
                                <span class="material-symbols-outlined text-[14px]">open_in_new</span>
                            </a>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-3">
                                @php $count = count($page->content ?? []); @endphp
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-200"></span>
                                <span class="text-[10px] font-black font-mono text-slate-400 uppercase tracking-widest tabular-nums">{{ $count > 9 ? $count : '0'.$count }} Content Nodes</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="badge-node {{ $page->is_published ? 'badge-live' : 'badge-draft' }} font-black text-[9px] tracking-widest">
                                {{ $page->is_published ? 'PUBLISHED' : 'DRAFT' }}
                            </span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest tabular-nums">{{ $page->updated_at->diffForHumans() }}</span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex justify-end gap-3 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-x-4 group-hover:translate-x-0">
                                <a href="{{ route('admin.pages.edit', $page) }}" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:text-primary hover:bg-white hover:shadow-sm transition-all border border-slate-100">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                </a>
                                <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" onsubmit="return confirm('Securely archive this blueprint node?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:text-rose-600 transition-all hover:bg-rose-50 border border-slate-100 hover:border-rose-100">
                                        <span class="material-symbols-outlined text-lg">delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if($pages->isEmpty())
                    <tr>
                        <td colspan="6" class="px-8 py-32 text-center">
                            <div class="w-20 h-20 rounded-full bg-slate-50 flex items-center justify-center mx-auto mb-6 border border-slate-100">
                                <span class="material-symbols-outlined text-4xl text-slate-200">manage_search</span>
                            </div>
                            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 italic">No blueprints found matching your current indexing protocol.</p>
                            <a href="{{ route('admin.pages.index') }}" class="inline-flex items-center gap-2 mt-6 text-[9px] font-black uppercase tracking-widest text-primary hover:bg-primary/5 px-6 py-3 rounded-xl border border-primary/10 transition-all">Reset Blueprint Index</a>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@if($pages->hasPages())
    <div class="mt-12">
        {{ $pages->links() }}
    </div>
@endif

@if($pages->hasPages())
    <div class="mt-12">
        {{ $pages->links() }}
    </div>
@endif

@endsection
