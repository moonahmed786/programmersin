@extends('layouts.backend')

@section('content')

<div class="flex flex-col gap-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Navigation</h1>
            <p class="text-sm text-slate-500 mt-1">Manage header and footer menu links</p>
        </div>
        <a href="{{ route('admin.menus.create') }}" class="inline-flex items-center gap-2 bg-primary text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-primary-dark transition-colors">
            <span class="material-symbols-outlined text-lg">add</span>
            Add Menu Item
        </a>
    </div>

    @if(session('success'))
        <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-100 text-emerald-800 px-5 py-3 rounded-xl text-sm font-medium">
            <span class="material-symbols-outlined text-lg">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl overflow-hidden border border-slate-100">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-100">
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500">Label</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500">URL</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500">Location</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500">Order</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500">Status</th>
                        <th class="px-6 py-3.5 text-right text-xs font-semibold text-slate-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($menus as $menu)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-slate-400 text-lg">link</span>
                                    <span class="text-sm font-semibold text-slate-900">{{ $menu->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-primary font-mono">{{ $menu->url ?: '—' }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-500">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $menu->location === 'header' ? 'bg-indigo-400' : 'bg-amber-400' }}"></span>
                                    {{ ucfirst($menu->location) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-slate-400">{{ $menu->order }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                    {{ $menu->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $menu->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-1 opacity-0 group-hover:opacity-100 transition-all">
                                    <a href="{{ route('admin.menus.edit', $menu) }}" class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-400 hover:text-primary hover:bg-slate-100 transition-all">
                                        <span class="material-symbols-outlined text-lg">edit</span>
                                    </a>
                                    <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this menu item?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition-all">
                                            <span class="material-symbols-outlined text-lg">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        
                        @foreach($menu->children as $child)
                        <tr class="bg-slate-50/30 group border-l-2 border-primary/10 hover:bg-slate-50/60 transition-colors">
                            <td class="px-6 py-3">
                                <div class="flex items-center gap-3 pl-8">
                                    <span class="material-symbols-outlined text-slate-300 text-base">subdirectory_arrow_right</span>
                                    <span class="text-sm text-slate-600">{{ $child->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-3">
                                <span class="text-xs text-slate-400 font-mono">{{ $child->url ?: '—' }}</span>
                            </td>
                            <td class="px-6 py-3">
                                <span class="text-xs text-slate-400">Sub-item</span>
                            </td>
                            <td class="px-6 py-3">
                                <span class="text-sm text-slate-300">{{ $child->order }}</span>
                            </td>
                            <td class="px-6 py-3">
                                <span class="w-1.5 h-1.5 rounded-full {{ $child->is_active ? 'bg-emerald-400' : 'bg-slate-200' }} inline-block"></span>
                            </td>
                            <td class="px-6 py-3 text-right">
                                <a href="{{ route('admin.menus.edit', $child) }}" class="w-7 h-7 flex items-center justify-center rounded-lg text-slate-300 hover:text-primary transition-all opacity-0 group-hover:opacity-100 ml-auto">
                                    <span class="material-symbols-outlined text-base">edit</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <span class="material-symbols-outlined text-slate-300 text-3xl block mb-2">menu</span>
                                <p class="text-sm text-slate-400">No menu items yet</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
