@extends('layouts.backend')

@section('content')

<!-- Service Registry Header -->
<div class="mb-14">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h1 class="text-3xl font-black tracking-tighter text-slate-900 uppercase italic">
                <span class="text-gradient">Service Registry</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-extrabold uppercase tracking-[0.3em] mt-2 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                Global engineering catalog and architectural unit pricing
            </p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('admin.services.create') }}" class="btn-stellar">
                <span class="material-symbols-outlined text-sm">add_box</span>
                Initialize New Module
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
                <th>Service Module Info</th>
                <th>Price Point</th>
                <th>Priority</th>
                <th>Status</th>
                <th class="text-right">Execution</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr class="group">
                    <td>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-primary/5 flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-2xl">{{ $service->icon ?? 'settings_suggest' }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-black text-slate-900 tracking-tight leading-none mb-1">{{ $service->title }}</span>
                                <span class="text-[10px] text-slate-400 font-extrabold uppercase tracking-widest">{{ $service->slug }}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-sm font-black text-slate-900">
                            {{ $service->price ? '$' . number_format($service->price, 2) : 'CUSTOM' }}
                        </span>
                    </td>
                    <td>
                        <span class="text-[11px] font-black text-slate-300">{{ str_pad($service->order ?? 0, 2, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td>
                        <span class="badge-stellar {{ $service->is_active ? 'badge-live' : 'badge-warning' }}">
                            {{ $service->is_active ? 'ENABLED' : 'DRAFT' }}
                        </span>
                    </td>
                    <td class="text-right">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.services.edit', $service) }}" class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-slate-50 text-slate-300 hover:text-primary hover:bg-primary/5 transition-all">
                                <span class="material-symbols-outlined text-lg">edit</span>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Archive this service node permanently?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-slate-50 text-slate-300 hover:text-red-500 hover:bg-red-50 transition-all">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            @if($services->isEmpty())
                <tr>
                    <td colspan="5" class="px-6 py-32 text-center">
                        <div class="w-20 h-20 rounded-3xl bg-slate-50 flex items-center justify-center mx-auto mb-6">
                            <span class="material-symbols-outlined text-4xl text-slate-200">settings_suggest</span>
                        </div>
                        <p class="text-[10px] font-extrabold uppercase tracking-[0.3em] text-slate-300 italic">No software modules detected in the registry.</p>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

@if($services->hasPages())
    <div class="mt-12">
        {{ $services->links() }}
    </div>
@endif

@endsection
