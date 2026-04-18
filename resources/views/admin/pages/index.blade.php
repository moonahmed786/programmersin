@extends('layouts.backend')

@section('content')

<!-- Blueprint Management Header -->
<div class="mb-12">
    <div class="flex justify-between items-end mb-8">
        <div>
            <h1 class="text-2xl font-black tracking-tighter text-on-surface">Blueprint Management</h1>
            <p class="text-xs text-on-surface-variant font-medium opacity-60 mt-1">Manage dynamic architectural nodes and experience blueprints.</p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('admin.pages.create') }}" class="bg-primary text-white px-6 py-2.5 rounded font-black text-xs tracking-tight hover:brightness-110 shadow-lg shadow-primary/20 transition-all flex items-center gap-2">
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
<div class="bg-white rounded overflow-hidden border border-outline-variant/10 shadow-sm">
    <table class="ledger-table">
        <thead>
            <tr>
                <th>Blueprint Identity</th>
                <th>Experience Slug</th>
                <th>Node Depth</th>
                <th>Status</th>
                <th>Last Refinement</th>
                <th class="text-right">Execution</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
                <tr class="hover:bg-surface-container-low transition-colors group">
                    <td>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded bg-primary/5 flex items-center justify-center text-primary border border-primary/10">
                                <span class="material-symbols-outlined">auto_stories</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-black text-on-surface tracking-tight">{{ $page->title }}</span>
                                <span class="text-[9px] text-on-surface-variant font-mono opacity-40 uppercase tracking-widest italic">Author: SYSTEM</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="{{ url($page->slug) }}" target="_blank" class="flex items-center gap-1.5 text-[11px] font-bold text-primary hover:underline font-mono">
                            /{{ $page->slug }}
                            <span class="material-symbols-outlined text-[10px]">open_in_new</span>
                        </a>
                    </td>
                    <td>
                        <div class="flex items-center gap-1">
                            @php $count = count($page->content ?? []); @endphp
                            <span class="text-[10px] font-black font-mono text-on-surface-variant opacity-60 uppercase">{{ str_pad($count, 2, '0', STR_PAD_LEFT) }} UNITS</span>
                        </div>
                    </td>
                    <td>
                        <span class="badge-node {{ $page->is_published ? 'badge-live' : 'badge-draft' }}">
                            {{ $page->is_published ? 'LIVE' : 'DRAFT' }}
                        </span>
                    </td>
                    <td>
                        <span class="text-[10px] font-bold text-on-surface-variant opacity-40 uppercase tracking-widest">{{ $page->updated_at->diffForHumans() }}</span>
                    </td>
                    <td class="text-right">
                        <div class="flex items-center justify-end gap-3 opacity-20 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('admin.pages.edit', $page) }}" class="p-1 hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-lg">edit</span>
                            </a>
                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" onsubmit="return confirm('Archive this blueprint permanently?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-1 hover:text-error transition-colors">
                                    <span class="material-symbols-outlined text-lg">delete</span>
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
