@extends('layouts.backend')

@section('content')
<div class="space-y-6">

    {{-- Page Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Software Services</h1>
            <p class="text-sm text-slate-400 mt-1">Manage your agency's service catalog and pricing</p>
        </div>
        <a href="{{ route('admin.services.create') }}"
            class="inline-flex items-center gap-2 bg-primary text-on-primary px-5 py-2.5 rounded-xl font-semibold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all">
            <span class="material-symbols-outlined text-base">add_box</span>
            Add Service
        </a>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="flex items-center gap-3 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 px-5 py-3.5 rounded-xl text-sm font-medium">
            <span class="material-symbols-outlined text-base">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    {{-- Services Table --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-outline-variant/20 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-outline-variant/20 bg-surface-container-low/50">
                        <th class="text-left px-6 py-4 text-xs font-black uppercase tracking-widest text-slate-400">Service Info</th>
                        <th class="text-left px-6 py-4 text-xs font-black uppercase tracking-widest text-slate-400">Price</th>
                        <th class="text-left px-6 py-4 text-xs font-black uppercase tracking-widest text-slate-400">Order</th>
                        <th class="text-left px-6 py-4 text-xs font-black uppercase tracking-widest text-slate-400">Status</th>
                        <th class="text-right px-6 py-4 text-xs font-black uppercase tracking-widest text-slate-400">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/10">
                    @forelse($services as $service)
                    <tr class="hover:bg-surface-container-low/30 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary border border-primary/20">
                                    <span class="material-symbols-outlined">{{ $service->icon ?? 'settings_suggest' }}</span>
                                </div>
                                <div class="max-w-xs">
                                    <p class="font-bold text-slate-900 dark:text-white truncate">{{ $service->title }}</p>
                                    <p class="text-xs text-slate-400 truncate">{{ $service->description }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-slate-600 dark:text-slate-300 font-bold">
                                {{ $service->price ? '$' . number_format($service->price, 2) : 'Custom' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-slate-500 dark:text-slate-400">
                            {{ $service->order ?? 0 }}
                        </td>
                        <td class="px-6 py-4">
                            @if($service->is_active)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Public
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400">
                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> Draft
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.services.edit', $service) }}"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-primary bg-primary/10 hover:bg-primary/20 transition-colors">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                                </a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                                    onsubmit="return confirm('Delete this service permanently?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-red-500 bg-red-50 dark:bg-red-900/20 hover:bg-red-100 dark:hover:bg-red-900/40 transition-colors">
                                        <span class="material-symbols-outlined text-sm">delete</span> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center">
                            <span class="material-symbols-outlined text-5xl text-slate-300 block mb-3">settings_suggest</span>
                            <p class="text-slate-400 font-medium">No services found in the catalog.</p>
                            <a href="{{ route('admin.services.create') }}" class="text-primary text-sm font-semibold hover:underline mt-1 inline-block">Create your first service →</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($services->hasPages())
            <div class="px-6 py-4 border-t border-outline-variant/10">
                {{ $services->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
