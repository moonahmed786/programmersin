@extends('layouts.backend')

@section('content')

<!-- Incoming Inquiries Header -->
<div class="mb-14 px-2">
    <div class="flex justify-between items-end mb-10">
        <div class="flex flex-col gap-3">
            <h1 class="text-4xl font-black tracking-tighter text-on-surface uppercase italic">
                Activity <span class="text-primary opacity-90">Stream</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-black uppercase tracking-[0.4em] flex items-center gap-3">
                <span class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_rgba(0,118,255,0.4)] animate-pulse"></span>
                Lead management and customer engagement telemetry
            </p>
        </div>
    </div>
</div>

<!-- Intelligence Ledger -->
<div class="bg-white rounded-stellar overflow-hidden border border-slate-100 shadow-sm">
    <div class="px-10 py-6 bg-slate-50 border-b border-slate-100 flex items-center justify-between">
        <h2 class="text-[10px] font-black uppercase tracking-widest text-slate-400 italic">Global Engagement Node Registry</h2>
    </div>
    
    <div class="overflow-x-auto">
        <table class="ledger-table w-full">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-50">
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Lead Identity</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Communication Node</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Subject Protocol</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Telemetry Time</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Status Node</th>
                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">Execution</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach($inquiries as $inquiry)
                    <tr class="hover:bg-slate-50/50 transition-all group">
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="font-black text-on-surface tracking-tight leading-none mb-1.5">{{ $inquiry->name }}</span>
                                <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest italic">{{ $inquiry->company ?? 'INDIVIDUAL_ACCOUNT' }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex flex-col gap-2">
                                <div class="flex items-center gap-2 text-[10px] font-black text-primary uppercase tracking-widest">
                                    <span class="material-symbols-outlined text-[14px]">alternate_email</span>
                                    {{ $inquiry->email }}
                                </div>
                                @if($inquiry->phone)
                                <div class="flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                    <span class="material-symbols-outlined text-[14px]">call</span>
                                    {{ $inquiry->phone }}
                                </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-xs font-black text-on-surface-variant italic truncate max-w-xs block">{{ $inquiry->subject }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest tabular-nums">{{ $inquiry->created_at->diffForHumans() }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="badge-node {{ $inquiry->status == 'new' ? 'badge-live' : ($inquiry->status == 'closed' ? 'badge-draft' : 'badge-warning') }} font-black text-[9px] tracking-widest">
                                {{ strtoupper(str_replace('_', ' ', $inquiry->status)) }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex justify-end opacity-0 group-hover:opacity-100 transition-all duration-300 translate-x-4 group-hover:translate-x-0">
                                <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:text-primary hover:bg-white hover:shadow-sm transition-all border border-slate-100">
                                    <span class="material-symbols-outlined text-lg">visibility</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if($inquiries->isEmpty())
                    <tr>
                        <td colspan="6" class="px-8 py-32 text-center">
                            <div class="w-20 h-20 rounded-full bg-slate-50 flex items-center justify-center mx-auto mb-6 border border-slate-100">
                                <span class="material-symbols-outlined text-4xl text-slate-200">contact_mail</span>
                            </div>
                            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 italic">No inquiries recorded in the current activity stream.</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@if($inquiries->hasPages())
    <div class="mt-12">
        {{ $inquiries->links() }}
    </div>
@endif

@if($inquiries->hasPages())
    <div class="mt-12">
        {{ $inquiries->links() }}
    </div>
@endif

@endsection
