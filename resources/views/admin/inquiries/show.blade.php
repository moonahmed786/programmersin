@extends('layouts.backend')

@section('content')

<!-- Lead Intelligence Terminal Header -->
<div class="mb-14 px-2">
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-6">
            <a href="{{ route('admin.inquiries.index') }}" class="w-12 h-12 flex items-center justify-center rounded-2xl bg-white border border-slate-100 shadow-sm text-slate-400 hover:text-primary transition-all hover:shadow-md">
                <span class="material-symbols-outlined text-2xl">arrow_back</span>
            </a>
            <div class="flex flex-col gap-2">
                <h1 class="text-3xl font-black tracking-tighter text-on-surface uppercase italic">
                    Lead <span class="text-primary opacity-90">Intelligence</span>
                </h1>
                <p class="text-[10px] text-slate-400 font-black uppercase tracking-[0.3em] flex items-center gap-3">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                    Analyzing node: <span class="text-on-surface">INQ-{{ str_pad($inquiry->id, 4, '0', STR_PAD_LEFT) }}</span>
                </p>
            </div>
        </div>

        @if(auth()->user()->isSuperAdmin())
        <div class="flex items-center gap-4">
            <form action="{{ route('admin.inquiries.update_status', $inquiry->id) }}" method="POST" class="inline-flex items-center gap-8 bg-white p-3 px-8 rounded-stellar border border-slate-100 shadow-sm">
                @csrf
                @method('PATCH')
                <div class="flex flex-col">
                    <span class="text-[8px] font-black uppercase text-slate-400 tracking-widest leading-none mb-1">Pipeline Stage</span>
                    <select name="status" class="bg-transparent border-none text-[11px] font-black uppercase tracking-widest text-primary focus:ring-0 cursor-pointer p-0 -mt-1 appearance-none">
                        <option value="new" @if($inquiry->status == 'new') selected @endif>NEW_LEAD</option>
                        <option value="in_review" @if($inquiry->status == 'in_review') selected @endif>IN_REVIEW</option>
                        <option value="responded" @if($inquiry->status == 'responded') selected @endif>RESPONDED</option>
                        <option value="closed" @if($inquiry->status == 'closed') selected @endif>CLOSED</option>
                    </select>
                </div>
                <div class="w-px h-8 bg-slate-100"></div>
                <button type="submit" class="btn-stellar px-8 py-3 text-[10px]">
                    Commit Pipeline
                </button>
            </form>
        </div>
        @endif
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-12 animate-in-fade">
    <!-- Message Intelligence -->
    <div class="lg:col-span-2 space-y-12">
        <section class="bg-white rounded-stellar overflow-hidden border border-slate-100 shadow-sm relative group">
            <div class="p-12 relative z-10">
                <div class="flex items-center gap-4 mb-10">
                    <div class="w-2.5 h-2.5 rounded-full bg-primary animate-pulse shadow-[0_0_10px_rgba(0,118,255,0.3)]"></div>
                    <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] italic">Decrypted Payload (Inquiry Message)</h3>
                </div>
                <div class="bg-slate-50 border border-slate-100 rounded-3xl p-12">
                    <h4 class="text-2xl font-black text-on-surface tracking-tighter mb-8 italic">{{ $inquiry->subject }}</h4>
                    <div class="text-on-surface-variant font-medium leading-[2.2] text-sm whitespace-pre-line italic">
                        {{ $inquiry->message }}
                    </div>
                </div>
            </div>
        </section>

        <!-- Internal Telemetry (Collaboration) -->
        <section class="space-y-8">
            <div class="flex items-center justify-between px-6">
                <div class="flex items-center gap-4">
                    <div class="w-2 h-2 rounded-full bg-tertiary shadow-[0_0_8px_rgba(124,77,255,0.4)]"></div>
                    <h3 class="text-[10px] font-black text-on-surface uppercase tracking-[0.3em] leading-none">Specialist Collaboration Log</h3>
                </div>
                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest tabular-nums bg-white px-3 py-1 rounded-full border border-slate-100">{{ $inquiry->notes->count() }} ENTRIES_DETECTOR</span>
            </div>
            
            <div class="space-y-8">
                @foreach($inquiry->notes as $note)
                <div class="bg-white rounded-stellar overflow-hidden border border-slate-100 shadow-sm p-10 relative group hover:border-primary/20 transition-all">
                    <div class="flex items-start justify-between mb-6 pb-6 border-b border-slate-50">
                        <div class="flex items-center gap-5">
                            <div class="w-12 h-12 rounded-2xl bg-on-surface border border-on-surface flex items-center justify-center text-white font-black text-xs shadow-md">
                                {{ strtoupper(substr($note->user->name, 0, 2)) }}
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-on-surface uppercase tracking-widest leading-none">{{ $note->user->name }}</p>
                                <p class="text-[9px] font-black text-primary uppercase tracking-tighter mt-1.5 tabular-nums opacity-80">{{ $note->created_at->format('d M Y // H:i') }}</p>
                            </div>
                        </div>
                        <span class="text-[9px] font-black text-slate-300 uppercase tracking-[0.2em] italic">LOG_ENTRY_{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="text-sm font-medium text-on-surface-variant leading-relaxed italic px-2">
                        {{ $note->content }}
                    </div>
                </div>
                @endforeach

                <div class="bg-slate-50 border-2 border-dashed border-slate-200 rounded-stellar p-10">
                    <form action="{{ route('admin.inquiries.store_note', $inquiry->id) }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="flex flex-col">
                            <label class="label-material" for="note_content">Initialize New Logistics Entry</label>
                            <textarea id="note_content" name="content" rows="5" placeholder="Awaiting manual encryption..." required 
                                class="input-material h-40 resize-none italic py-6"></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="btn-stellar px-12">
                                <span class="material-symbols-outlined text-lg">post_add</span>
                                Log Intelligence
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Engagement Hub -->
        <section class="bg-on-surface rounded-stellar overflow-hidden border border-on-surface shadow-2xl p-16 text-center relative group">
            <div class="absolute inset-0 bg-primary opacity-5 group-hover:opacity-10 transition-opacity duration-700"></div>
            <div class="relative z-10 max-w-sm mx-auto space-y-10">
                <div class="w-24 h-24 rounded-3xl bg-white/5 border border-white/10 flex items-center justify-center text-primary mx-auto shadow-inner group-hover:scale-110 group-hover:rotate-6 transition-all duration-700">
                    <span class="material-symbols-outlined text-5xl">outgoing_mail</span>
                </div>
                <div class="space-y-4">
                    <h4 class="text-3xl font-black text-white tracking-tighter italic uppercase">Initialize Outreach</h4>
                    <p class="text-slate-400 text-sm italic font-medium leading-relaxed">Commence direct engagement protocol and transform this node into an active engineering engagement.</p>
                </div>
                <button class="btn-stellar w-full py-6 flex justify-center text-white bg-primary hover:bg-primary-dark">
                    Initialize Engagement Protocol
                </button>
            </div>
        </section>
    </div>

    <!-- Contact Metadata -->
    <div class="space-y-10">
        <!-- Identity Telemetry Card -->
        <div class="bg-white rounded-stellar overflow-hidden border border-slate-100 shadow-sm p-12">
            <div class="flex items-center gap-4 mb-12 pb-6 border-b border-slate-50">
                <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Identity Telemetry</h3>
            </div>
            
            <div class="space-y-10">
                 <div class="flex items-start gap-6">
                    <div class="w-12 h-12 rounded-2xl bg-white border border-slate-100 flex items-center justify-center text-slate-300 shadow-sm group-hover:text-primary transition-colors">
                        <span class="material-symbols-outlined text-2xl">id_card</span>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest italic opacity-60">Legal Entity</span>
                        <span class="font-black tracking-tighter text-on-surface text-xl uppercase italic leading-none">{{ $inquiry->name }}</span>
                    </div>
                </div>

                <div class="flex items-start gap-6">
                    <div class="w-12 h-12 rounded-2xl bg-primary/5 border border-primary/10 flex items-center justify-center text-primary shadow-sm hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-2xl">alternate_email</span>
                    </div>
                    <div class="flex flex-col gap-1.5 overflow-hidden">
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest italic opacity-60">Auth Email Path</span>
                        <span class="font-black tracking-tight text-primary text-sm truncate leading-none tabular-nums">{{ $inquiry->email }}</span>
                    </div>
                </div>

                @if($inquiry->phone)
                <div class="flex items-start gap-6">
                    <div class="w-12 h-12 rounded-2xl bg-secondary/5 border border-secondary/10 flex items-center justify-center text-secondary shadow-sm">
                        <span class="material-symbols-outlined text-2xl">cell_tower</span>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest italic opacity-60">Signal Port Link</span>
                        <span class="font-black tracking-tight text-on-surface text-sm italic leading-none tabular-nums">{{ $inquiry->phone }}</span>
                    </div>
                </div>
                @endif

                <div class="pt-10 mt-10 border-t border-slate-50 flex items-center gap-4">
                    <div class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse shadow-[0_0_8px_rgba(16,185,129,0.3)]"></div>
                    <div class="flex flex-col leading-none">
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest italic opacity-60">Source Node</span>
                        <span class="font-black tracking-tighter text-on-surface text-[10px] uppercase mt-1.5">MAIN_INQUIRY_LANDING</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Operations Console -->
        <div class="bg-on-surface p-12 rounded-stellar text-white border border-on-surface shadow-2xl relative overflow-hidden group">
            <div class="relative z-10 space-y-8">
                <h4 class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] italic mb-6">Operations Console</h4>
                <div class="space-y-4">
                    <button class="w-full flex items-center justify-between p-6 bg-white/5 hover:bg-white/10 rounded-2xl border border-white/5 transition-all group/action">
                        <span class="text-[10px] font-black uppercase tracking-widest italic text-slate-400 group-hover/action:text-white transition-colors">Direct Specialist Assign</span>
                        <span class="material-symbols-outlined text-lg text-slate-700 group-hover/action:translate-x-1 group-hover/action:text-white transition-all">chevron_right</span>
                    </button>
                    <button class="w-full flex items-center justify-between p-6 bg-white/5 hover:bg-white/10 rounded-2xl border border-white/5 transition-all group/action hover:border-rose-500/20">
                        <span class="text-[10px] font-black uppercase tracking-widest italic text-slate-400 group-hover/action:text-rose-500 transition-colors">Archive Payload Node</span>
                        <span class="material-symbols-outlined text-lg text-slate-700 group-hover/action:translate-x-1 group-hover/action:text-rose-500 transition-all">chevron_right</span>
                    </button>
                    <button class="w-full flex items-center justify-between p-6 bg-white/5 hover:bg-white/10 rounded-2xl border border-white/5 transition-all group/action">
                        <span class="text-[10px] font-black uppercase tracking-widest italic text-slate-400 group-hover/action:text-white transition-colors">Export Telemetry Data</span>
                        <span class="material-symbols-outlined text-lg text-slate-700 group-hover/action:translate-x-1 group-hover/action:text-white transition-all">chevron_right</span>
                    </button>
                </div>
            </div>
            <span class="material-symbols-outlined absolute -right-8 -bottom-8 text-[12rem] text-white/5 pointer-events-none group-hover:scale-125 group-hover:-rotate-12 transition-all duration-[2s]">hub</span>
        </div>
    </div>
</div>
@endsection
