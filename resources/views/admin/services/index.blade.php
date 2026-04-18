@extends('layouts.backend')

@section('content')

<!-- Service Registry Header -->
<div class="mb-14 px-2">
    <div class="flex justify-between items-end mb-10">
        <div class="flex flex-col gap-3">
            <h1 class="text-4xl font-black tracking-tighter text-on-surface uppercase italic">
                Service <span class="text-primary opacity-90">Registry</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-black uppercase tracking-[0.4em] flex items-center gap-3">
                <span class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_rgba(0,118,255,0.4)] animate-pulse"></span>
                Global catalog of architectural capabilities and deployment nodes
            </p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('admin.services.create') }}" class="btn-stellar">
                <span class="material-symbols-outlined text-base">add_box</span>
                Initialize Module
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
        <table class="ledger-table">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-50">
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Service Module Info</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Price Point</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Sequence</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Registry Status</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">Execution</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach($services as $service)
                    <tr class="hover:bg-slate-50/50 transition-all group">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-6">
                                <div class="w-12 h-12 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center text-primary shadow-sm group-hover:scale-105 transition-all duration-500">
                                    <span class="material-symbols-outlined text-2xl group-hover:rotate-12 transition-transform">{{ $service->icon ?? 'settings_suggest' }}</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-black text-on-surface tracking-tight leading-none mb-1.5">{{ $service->title }}</span>
                                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest italic">{{ $service->slug }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="text-sm font-black text-on-surface tracking-tight">
                                    {{ $service->price ? '$' . number_format($service->price, 2) : 'CUSTOM_NODE' }}
                                </span>
                                <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-1">Market Valuation</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-[10px] font-black text-slate-400 font-mono tracking-[0.3em] bg-slate-50 px-3 py-1.5 rounded-lg border border-slate-100">
                                {{ str_pad($service->order ?? 0, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="badge-node {{ $service->is_active ? 'badge-live' : 'badge-draft' }} font-black text-[9px] tracking-widest">
                                {{ $service->is_active ? 'DEPLOYED' : 'INACTIVE' }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-x-4 group-hover:translate-x-0">
                                <a href="{{ route('admin.services.edit', $service) }}" class="w-10 h-10 flex items-center justify-center text-slate-400 hover:text-primary transition-all hover:bg-primary/5 rounded-xl border border-transparent hover:border-primary/10">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                </a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Securely archive this service module?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-10 h-10 flex items-center justify-center text-slate-400 hover:text-rose-600 transition-all hover:bg-rose-50 rounded-xl border border-transparent hover:border-rose-100">
                                        <span class="material-symbols-outlined text-lg">delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if($services->isEmpty())
                    <tr>
                        <td colspan="5" class="px-8 py-32 text-center">
                            <div class="w-20 h-20 rounded-full bg-slate-50 flex items-center justify-center mx-auto mb-6 border border-slate-100">
                                <span class="material-symbols-outlined text-4xl text-slate-200">settings_suggest</span>
                            </div>
                            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 italic">No services detected in the global registry node.</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@if($services->hasPages())
    <div class="mt-12">
        {{ $services->links() }}
    </div>
@endif

@if($services->hasPages())
    <div class="mt-12">
        {{ $services->links() }}
    </div>
@endif

@endsection
