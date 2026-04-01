@extends('layouts.backend')

@section('content')
<!-- Header Section -->
<header class="mb-10 flex items-end justify-between">
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight text-on-surface mb-1">Incoming Inquiries</h1>
        <p class="text-on-surface-variant font-medium italic">Lead management and customer engagement portal.</p>
    </div>
</header>

<!-- Inquiries Table -->
<div class="bg-surface-container-lowest rounded-2xl shadow-xl shadow-slate-200/50 overflow-hidden border border-outline-variant/10">
    <div class="px-8 py-6 flex items-center justify-between border-b border-outline-variant/10">
        <h2 class="text-lg font-black text-on-surface tracking-tight">Lead Activity</h2>
    </div>
    <div class="overflow-x-auto @if($inquiries->isEmpty()) p-20 text-center @endif">
        @if($inquiries->isNotEmpty())
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-surface-container-low italic text-[10px] uppercase font-black tracking-widest text-on-surface-variant">
                    <th class="px-8 py-4 text-left">Sender</th>
                    <th class="px-8 py-4 text-left">Contact Info</th>
                    <th class="px-8 py-4 text-left">Subject</th>
                    <th class="px-8 py-4 text-left">Received</th>
                    <th class="px-8 py-4 text-right">Status</th>
                    <th class="px-8 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y-0">
                @foreach($inquiries as $inquiry)
                <tr class="group hover:bg-surface-container transition-colors">
                    <td class="px-8 py-5">
                        <div class="flex flex-col">
                            <span class="font-black text-sm text-on-surface tracking-tight">{{ $inquiry->name }}</span>
                            <span class="text-[10px] text-on-surface-variant font-bold uppercase tracking-widest italic leading-none">{{ $inquiry->company ?? 'Personal Account' }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <div class="flex flex-col gap-1">
                            <div class="flex items-center gap-2 text-xs font-bold text-on-surface-variant">
                                <span class="material-symbols-outlined text-[14px]">mail</span>
                                {{ $inquiry->email }}
                            </div>
                            @if($inquiry->phone)
                            <div class="flex items-center gap-2 text-xs font-bold text-on-surface-variant">
                                <span class="material-symbols-outlined text-[14px]">call</span>
                                {{ $inquiry->phone }}
                            </div>
                            @endif
                        </div>
                    </td>
                    <td class="px-8 py-5 text-sm text-on-surface-variant font-medium">{{ $inquiry->subject }}</td>
                    <td class="px-8 py-5 text-sm font-bold text-slate-400 font-mono tracking-tighter">{{ $inquiry->created_at->diffForHumans() }}</td>
                    <td class="px-8 py-5 text-right">
                        <span class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container rounded-full text-[10px] font-black uppercase tracking-widest text-on-surface-variant border border-outline-variant/10">
                            <span class="w-1.5 h-1.5 rounded-full @if($inquiry->status == 'new') bg-primary @elseif($inquiry->status == 'closed') bg-slate-400 @else bg-emerald-500 @endif"></span>
                            {{ str_replace('_', ' ', $inquiry->status) }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="p-2 hover:bg-primary-container hover:text-primary rounded-xl transition-all inline-block group/btn">
                            <span class="material-symbols-outlined text-lg group-hover/btn:scale-110 transition-transform">visibility</span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="space-y-4">
            <span class="material-symbols-outlined text-6xl text-slate-200">contact_mail</span>
            <p class="text-on-surface font-black text-xl tracking-tight">No inquiries recorded.</p>
            <p class="text-on-surface-variant text-sm italic font-medium">Marketing efforts will usually populate this list in due time.</p>
        </div>
        @endif
    </div>
    
    @if($inquiries->hasPages())
    <div class="px-8 py-6 border-t border-outline-variant/10 bg-surface-container-low/30">
        {{ $inquiries->links() }}
    </div>
    @endif
</div>
@endsection
