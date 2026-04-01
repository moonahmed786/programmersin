@extends('layouts.backend')

@section('content')
<!-- Header Section -->
<header class="mb-12 flex items-end justify-between">
    <div class="space-y-4">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.inquiries.index') }}" class="w-10 h-10 rounded-xl bg-surface-container flex items-center justify-center text-on-surface-variant hover:text-primary transition-all border border-outline-variant/10 shadow-sm">
                <span class="material-symbols-outlined text-base">arrow_back</span>
            </a>
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest rounded-lg border border-primary/20">
                    Lead: #INQ-{{ str_pad($inquiry->id, 5, '0', STR_PAD_LEFT) }}
                </span>
                <span class="px-3 py-1 bg-surface-container text-on-surface-variant text-[10px] font-black uppercase tracking-widest rounded-lg border border-outline-variant/10">
                    {{ str_replace('_', ' ', $inquiry->status) }}
                </span>
            </div>
        </div>
        <div>
            <h1 class="text-4xl font-black tracking-tighter text-on-surface leading-none mb-2">{{ $inquiry->subject }}</h1>
            <p class="text-on-surface-variant font-black italic uppercase tracking-widest text-[10px]">Received via {{ $inquiry->company ?? 'Personal Channel' }} • {{ $inquiry->created_at->toDayDateTimeString() }}</p>
        </div>
    </div>

    @if(auth()->user()->isSuperAdmin())
    <div class="flex gap-4">
        <form action="{{ route('admin.inquiries.update_status', $inquiry->id) }}" method="POST" class="inline-flex gap-2">
            @csrf
            @method('PATCH')
            <select name="status" class="bg-surface-container-low border-2 border-transparent focus:border-primary/20 rounded-xl px-4 py-3 text-xs font-black uppercase tracking-widest outline-none">
                <option value="new" @if($inquiry->status == 'new') selected @endif>New Lead</option>
                <option value="in_review" @if($inquiry->status == 'in_review') selected @endif>In Review</option>
                <option value="responded" @if($inquiry->status == 'responded') selected @endif>Responded</option>
                <option value="closed" @if($inquiry->status == 'closed') selected @endif>Closed</option>
            </select>
            <button type="submit" class="px-6 py-3 bg-on-surface text-surface rounded-xl font-black text-[10px] uppercase tracking-widest shadow-2xl shadow-on-surface/30 transition-all hover:bg-primary hover:text-on-primary">Update Pipeline</button>
        </form>
    </div>
    @endif
</header>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Message Content -->
    <div class="lg:col-span-2 space-y-10">
        <section class="bg-surface-container-lowest rounded-3xl p-10 border border-outline-variant/10 shadow-2xl shadow-slate-200/40 relative group overflow-hidden">
             <div class="absolute top-0 right-0 p-10 opacity-[0.03] group-hover:opacity-10 transition-opacity">
                <span class="material-symbols-outlined text-[160px]">format_quote</span>
            </div>
            <div class="relative z-10 space-y-6">
                <h3 class="text-xl font-black text-on-surface tracking-tight">Core Message</h3>
                <div class="text-on-surface-variant font-medium leading-[2.2] text-sm whitespace-pre-line italic bg-surface-container-low/30 p-8 rounded-2xl border border-outline-variant/5">
                    {{ $inquiry->message }}
                </div>
            </div>
        </section>

        <!-- Response Action -->
        <section class="space-y-6">
            <h3 class="text-xl font-black text-on-surface tracking-tight">Compose Response</h3>
            <div class="bg-surface-container-lowest rounded-3xl p-10 border-2 border-dashed border-outline-variant/20 flex flex-col items-center justify-center text-center gap-4 transition-all hover:border-primary/30">
                <div class="w-16 h-16 rounded-2xl bg-primary/5 flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-3xl">outgoing_mail</span>
                </div>
                <div class="max-w-xs mx-auto">
                    <p class="text-on-surface font-black text-lg tracking-tight">Initialize Outreach</p>
                    <p class="text-on-surface-variant text-sm italic font-medium">Ready to convert this lead? Start the engagement process now.</p>
                </div>
                <button class="mt-4 px-10 py-4 bg-primary text-on-primary rounded-2xl font-black text-xs uppercase tracking-widest shadow-2xl shadow-primary/30 hover:-translate-y-1 transition-all">Send Direct Response</button>
            </div>
        </section>
    </div>

    <!-- Contact Info Column -->
    <div class="space-y-8">
        <!-- Lead Insights -->
        <div class="bg-surface-container-lowest rounded-3xl p-8 border border-outline-variant/10 shadow-2xl shadow-slate-200/40">
            <h3 class="text-lg font-black text-on-surface tracking-tight mb-8">Lead Intelligence</h3>
            <div class="space-y-8">
                 <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-surface-container flex items-center justify-center text-on-surface shadow-sm">
                        <span class="material-symbols-outlined text-xl">person</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Full Name</span>
                        <span class="font-black tracking-tight text-on-surface text-sm uppercase">{{ $inquiry->name }}</span>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 shadow-sm">
                        <span class="material-symbols-outlined text-xl">alternate_email</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Email Identity</span>
                        <span class="font-black font-mono tracking-tighter text-on-surface text-sm text-primary">{{ $inquiry->email }}</span>
                    </div>
                </div>

                @if($inquiry->phone)
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center text-orange-600 shadow-sm">
                        <span class="material-symbols-outlined text-xl">cell_tower</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Mobile Contact</span>
                        <span class="font-black font-mono tracking-tighter text-on-surface text-sm uppercase">{{ $inquiry->phone }}</span>
                    </div>
                </div>
                @endif

                <div class="flex items-start gap-4 pt-4 border-t border-outline-variant/10">
                    <div class="w-2 h-2 rounded-full bg-emerald-500 mt-2"></div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Lead Source</span>
                        <span class="font-black tracking-tight text-on-surface text-sm uppercase">Main Website Form</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-on-surface p-8 rounded-3xl text-surface shadow-2xl shadow-on-surface/30 group relative overflow-hidden">
             <div class="relative z-10 space-y-6">
                <h4 class="text-xl font-black tracking-tighter leading-none">Internal Logistics</h4>
                <div class="space-y-3">
                    <button class="w-full flex items-center justify-between p-4 bg-white/5 hover:bg-white/10 rounded-2xl border border-white/5 transition-all group/action">
                        <span class="text-[10px] font-black uppercase tracking-widest">Assign Specialist</span>
                        <span class="material-symbols-outlined text-sm group-hover/action:translate-x-1 transition-transform">chevron_right</span>
                    </button>
                    <button class="w-full flex items-center justify-between p-4 bg-white/5 hover:bg-white/10 rounded-2xl border border-white/5 transition-all group/action">
                        <span class="text-[10px] font-black uppercase tracking-widest">Internal Thread</span>
                        <span class="material-symbols-outlined text-sm group-hover/action:translate-x-1 transition-transform">chevron_right</span>
                    </button>
                </div>
            </div>
            <span class="material-symbols-outlined absolute -right-6 -bottom-6 text-9xl text-white/5 pointer-events-none group-hover:scale-125 transition-transform duration-700">inventory</span>
        </div>
    </div>
</div>
@endsection
