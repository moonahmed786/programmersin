@extends('layouts.backend')

@section('content')

<!-- Incoming Inquiries Header -->
<div class="mb-14">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h1 class="text-3xl font-black tracking-tighter text-slate-900 uppercase italic">
                <span class="text-gradient">Lead Activity Stream</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-extrabold uppercase tracking-[0.3em] mt-2 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                Lead management and customer engagement telemetry
            </p>
        </div>
    </div>
</div>

<!-- Ledger Table -->
<div class="glass-surface rounded-stellar overflow-hidden border border-white/80 animate-in-fade">
    <div class="px-10 py-6 bg-slate-50/30 border-b border-slate-100 flex items-center justify-between">
        <h2 class="text-[10px] font-black uppercase tracking-widest text-slate-400 italic">Global Engagement Node</h2>
    </div>
    
    <table class="ledger-table">
        <thead>
            <tr>
                <th>Lead Identity</th>
                <th>Communication Node</th>
                <th>Subject Protocol</th>
                <th>Telemetry Time</th>
                <th>Status Node</th>
                <th class="text-right">Execution</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inquiries as $inquiry)
                <tr class="group">
                    <td>
                        <div class="flex flex-col">
                            <span class="font-black text-slate-900 tracking-tight leading-none mb-1">{{ $inquiry->name }}</span>
                            <span class="text-[10px] text-slate-400 font-extrabold uppercase tracking-widest italic">{{ $inquiry->company ?? 'PERSONAL_ACCOUNT' }}</span>
                        </div>
                    </td>
                    <td>
                        <div class="flex flex-col gap-1.5">
                            <div class="flex items-center gap-2 text-[10px] font-black text-primary uppercase tracking-wider">
                                <span class="material-symbols-outlined text-[14px]">alternate_email</span>
                                {{ $inquiry->email }}
                            </div>
                            @if($inquiry->phone)
                            <div class="flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-wider">
                                <span class="material-symbols-outlined text-[14px]">call</span>
                                {{ $inquiry->phone }}
                            </div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <span class="text-xs font-bold text-slate-500 italic truncate max-w-xs block">{{ $inquiry->subject }}</span>
                    </td>
                    <td>
                        <span class="text-[10px] font-black text-slate-300 uppercase tracking-widest">{{ $inquiry->created_at->diffForHumans() }}</span>
                    </td>
                    <td>
                        <span class="badge-stellar {{ $inquiry->status == 'new' ? 'badge-live' : ($inquiry->status == 'closed' ? 'badge-warning' : 'badge-live opacity-80') }}">
                            {{ strtoupper(str_replace('_', ' ', $inquiry->status)) }}
                        </span>
                    </td>
                    <td class="text-right">
                        <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-slate-50 text-slate-300 hover:text-primary hover:bg-primary/5 transition-all">
                            <span class="material-symbols-outlined text-xl">visibility</span>
                        </a>
                    </td>
                </tr>
            @endforeach
            @if($inquiries->isEmpty())
                <tr>
                    <td colspan="6" class="px-6 py-32 text-center">
                        <div class="w-20 h-20 rounded-3xl bg-slate-50 flex items-center justify-center mx-auto mb-6">
                            <span class="material-symbols-outlined text-4xl text-slate-200">contact_mail</span>
                        </div>
                        <p class="text-[10px] font-extrabold uppercase tracking-[0.3em] text-slate-300 italic">No inquiries recorded in the activity stream.</p>
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
