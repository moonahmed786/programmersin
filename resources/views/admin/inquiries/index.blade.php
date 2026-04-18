@extends('layouts.backend')

@section('content')

<!-- Incoming Inquiries Header -->
<div class="mb-14">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h1 class="text-3xl font-black tracking-tighter text-white uppercase italic">
                Lead <span class="text-primary">Activity Stream</span>
            </h1>
            <p class="text-[10px] text-slate-500 font-extrabold uppercase tracking-[0.4em] mt-3 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_rgba(0,118,255,0.5)]"></span>
                Lead management and customer engagement telemetry
            </p>
        </div>
    </div>
</div>

<!-- Ledger Table -->
<div class="bg-node-dark/40 backdrop-blur-sm rounded-node overflow-hidden border border-white/5 shadow-2xl">
    <div class="px-10 py-6 bg-white/5 border-b border-white/5 flex items-center justify-between">
        <h2 class="text-[10px] font-black uppercase tracking-widest text-slate-500 italic">Global Engagement Node</h2>
    </div>
    
    <table class="ledger-table">
        <thead>
            <tr class="bg-white/5">
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Lead Identity</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Communication Node</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Subject Protocol</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Telemetry Time</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Status Node</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em] text-right">Execution</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @foreach($inquiries as $inquiry)
                <tr class="hover:bg-white/[0.03] transition-colors group">
                    <td class="px-8 py-5">
                        <div class="flex flex-col">
                            <span class="font-black text-white tracking-tight leading-none mb-1.5">{{ $inquiry->name }}</span>
                            <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest italic">{{ $inquiry->company ?? 'PERSONAL_ACCOUNT' }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center gap-2 text-[10px] font-black text-primary uppercase tracking-widest">
                                <span class="material-symbols-outlined text-[14px]">alternate_email</span>
                                {{ $inquiry->email }}
                            </div>
                            @if($inquiry->phone)
                            <div class="flex items-center gap-2 text-[10px] font-black text-slate-500 uppercase tracking-widest">
                                <span class="material-symbols-outlined text-[14px]">call</span>
                                {{ $inquiry->phone }}
                            </div>
                            @endif
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <span class="text-xs font-bold text-slate-400 italic truncate max-w-xs block">{{ $inquiry->subject }}</span>
                    </td>
                    <td class="px-8 py-5">
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">{{ $inquiry->created_at->diffForHumans() }}</span>
                    </td>
                    <td class="px-8 py-5">
                        <span class="badge-node {{ $inquiry->status == 'new' ? 'badge-live' : ($inquiry->status == 'closed' ? 'badge-draft' : 'badge-live opacity-80') }} tracking-[0.2em] font-black text-[9px]">
                            {{ strtoupper(str_replace('_', ' ', $inquiry->status)) }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white/5 text-slate-400 hover:text-primary hover:bg-white/10 transition-all border border-white/5">
                            <span class="material-symbols-outlined text-xl">visibility</span>
                        </a>
                    </td>
                </tr>
            @endforeach
            @if($inquiries->isEmpty())
                <tr>
                    <td colspan="6" class="px-8 py-32 text-center">
                        <div class="w-20 h-20 rounded-3xl bg-white/5 flex items-center justify-center mx-auto mb-6 border border-white/5">
                            <span class="material-symbols-outlined text-4xl text-slate-600">contact_mail</span>
                        </div>
                        <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-600 italic">No inquiries recorded in the activity stream.</p>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

@if($inquiries->hasPages())
    <div class="mt-12">
        {{ $inquiries->links() }}
    </div>
@endif

@endsection
