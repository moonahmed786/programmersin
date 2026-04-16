@extends('layouts.backend')

@section('content')

<!-- Lead Intelligence Terminal Header -->
<div class="mb-14">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-6">
            <a href="{{ route('admin.inquiries.index') }}" class="w-10 h-10 rounded-xl bg-white border border-slate-100 flex items-center justify-center text-slate-300 hover:text-primary hover:border-primary/20 transition-all shadow-sm">
                <span class="material-symbols-outlined text-lg">arrow_back</span>
            </a>
            <div class="h-6 w-px bg-slate-100 mx-2"></div>
            <div>
                <h1 class="text-3xl font-black tracking-tighter text-slate-900 uppercase italic">
                    <span class="text-gradient">Lead Intelligence</span>
                </h1>
                <p class="text-[10px] text-slate-400 font-extrabold uppercase tracking-[0.3em] mt-2">Analyzing node: INQ-{{ str_pad($inquiry->id, 4, '0', STR_PAD_LEFT) }}</p>
            </div>
        </div>

        @if(auth()->user()->isSuperAdmin())
        <div class="flex items-center gap-4">
            <form action="{{ route('admin.inquiries.update_status', $inquiry->id) }}" method="POST" class="inline-flex items-center gap-6 glass-surface p-2 px-6 rounded-stellar border border-white/80">
                @csrf
                @method('PATCH')
                <div class="flex flex-col">
                    <span class="text-[8px] font-black uppercase text-slate-400 tracking-widest">Pipeline Stage</span>
                    <select name="status" class="bg-transparent border-none text-[11px] font-black uppercase tracking-widest text-primary focus:ring-0 cursor-pointer p-0 -mt-1">
                        <option value="new" @if($inquiry->status == 'new') selected @endif>NEW_LEAD</option>
                        <option value="in_review" @if($inquiry->status == 'in_review') selected @endif>IN_REVIEW</option>
                        <option value="responded" @if($inquiry->status == 'responded') selected @endif>RESPONDED</option>
                        <option value="closed" @if($inquiry->status == 'closed') selected @endif>CLOSED</option>
                    </select>
                </div>
                <div class="w-px h-6 bg-slate-100 mx-2"></div>
                <button type="submit" class="btn-stellar px-6 py-2.5 text-[10px]">
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
        <section class="glass-surface rounded-stellar overflow-hidden border border-white/80 relative group">
            <div class="p-12 relative z-10">
                <div class="flex items-center gap-4 mb-10">
                    <div class="w-2.5 h-2.5 rounded-full bg-primary animate-pulse shadow-[0_0_10px_rgba(0,118,255,0.3)]"></div>
                    <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] italic">Decrypted Payload (Message)</h3>
                </div>
                <div class="bg-slate-50/50 rounded-3xl border border-slate-100 p-12">
                    <h4 class="text-2xl font-black text-slate-900 tracking-tight mb-8">{{ $inquiry->subject }}</h4>
                    <div class="text-slate-600 font-medium leading-[2.2] text-sm whitespace-pre-line italic">
                        {{ $inquiry->message }}
                    </div>
                </div>
            </div>
        </section>

        <!-- Internal Telemetry (Collaboration) -->
        <section class="space-y-8">
            <div class="flex items-center justify-between px-4">
                <div class="flex items-center gap-4">
                    <div class="w-2 h-2 rounded-full bg-tertiary"></div>
                    <h3 class="text-[10px] font-black text-slate-900 uppercase tracking-[0.3em]">Specialist Collaboration Log</h3>
                </div>
                <span class="text-[10px] font-extrabold text-slate-300 uppercase tracking-widest">{{ $inquiry->notes->count() }} ENTRIES</span>
            </div>
            
            <div class="space-y-8">
                @foreach($inquiry->notes as $note)
                <div class="glass-surface rounded-stellar overflow-hidden border border-white/80 p-10 relative group">
                    <div class="flex items-start justify-between mb-6 pb-6 border-b border-slate-100/50">
                        <div class="flex items-center gap-5">
                            <div class="w-12 h-12 rounded-2xl bg-slate-900 border border-slate-800 flex items-center justify-center text-white font-black text-xs shadow-xl">
                                {{ strtoupper(substr($note->user->name, 0, 2)) }}
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-900 uppercase tracking-widest">{{ $note->user->name }}</p>
                                <p class="text-[9px] font-extrabold text-primary uppercase tracking-tighter mt-1">{{ $note->created_at->format('d M Y // H:i') }}</p>
                            </div>
                        </div>
                        <span class="text-[9px] font-black text-slate-300 uppercase tracking-[0.2em]">LOG_ENTRY_{{ $loop->iteration }}</span>
                    </div>
                    <div class="text-sm font-medium text-slate-600 leading-relaxed italic">
                        {{ $note->content }}
                    </div>
                </div>
                @endforeach

                <div class="bg-slate-50/50 rounded-stellar border-2 border-dashed border-slate-200 p-10">
                    <form action="{{ route('admin.inquiries.store_note', $inquiry->id) }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="flex flex-col">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 px-2">Initialize New Logistics Entry</label>
                            <textarea name="content" rows="4" placeholder="Awaiting manual input..." required 
                                class="w-full bg-white border border-slate-100 rounded-2xl px-6 py-5 focus:ring-4 focus:ring-primary/5 focus:border-primary/20 text-sm font-medium text-slate-600 placeholder:italic resize-none shadow-sm transition-all"></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="btn-stellar px-10">
                                <span class="material-symbols-outlined text-sm">post_add</span>
                                Log Intelligence
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Engagement Hub -->
        <section class="bg-slate-900 rounded-stellar overflow-hidden border border-slate-800 shadow-2xl p-16 text-center relative group">
            <div class="absolute inset-0 bg-primary opacity-0 group-hover:opacity-[0.05] transition-opacity duration-700"></div>
            <div class="relative z-10 max-w-sm mx-auto space-y-10">
                <div class="w-24 h-24 rounded-3xl bg-white/5 border border-white/10 flex items-center justify-center text-primary mx-auto shadow-inner group-hover:scale-110 group-hover:rotate-6 transition-all duration-700">
                    <span class="material-symbols-outlined text-5xl">outgoing_mail</span>
                </div>
                <div class="space-y-4">
                    <h4 class="text-3xl font-black text-white tracking-tighter italic uppercase">Initialize Outreach</h4>
                    <p class="text-slate-400 text-sm italic font-medium leading-relaxed">Commence direct engagement protocol and transform this node into an active engineering engagement.</p>
                </div>
                <button class="w-full py-5 bg-primary text-white rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-2xl shadow-primary/40 hover:-translate-y-1 hover:brightness-110 active:scale-95 transition-all">
                    Initialize Engagement Protocol
                </button>
            </div>
        </section>
    </div>

    <!-- Contact Metadata -->
    <div class="space-y-10">
        <!-- Identity Telemetry Card -->
        <div class="glass-surface rounded-stellar overflow-hidden border border-white/80 p-12">
            <div class="flex items-center gap-4 mb-12 pb-6 border-b border-slate-100">
                <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Identity Telemetry</h3>
            </div>
            
            <div class="space-y-12">
                 <div class="flex items-start gap-5">
                    <div class="w-12 h-12 rounded-2xl bg-white border border-slate-100 flex items-center justify-center text-slate-300 shadow-sm">
                        <span class="material-symbols-outlined text-2xl">id_card</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black text-slate-300 uppercase tracking-widest">Legal Name</span>
                        <span class="font-black tracking-tight text-slate-900 text-lg uppercase mt-1 italic leading-none">{{ $inquiry->name }}</span>
                    </div>
                </div>

                <div class="flex items-start gap-5">
                    <div class="w-12 h-12 rounded-2xl bg-primary/5 border border-primary/10 flex items-center justify-center text-primary shadow-sm">
                        <span class="material-symbols-outlined text-2xl">alternate_email</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black text-slate-300 uppercase tracking-widest">Auth Email</span>
                        <span class="font-bold tracking-tight text-primary text-sm mt-1 break-all leading-none">{{ $inquiry->email }}</span>
                    </div>
                </div>

                @if($inquiry->phone)
                <div class="flex items-start gap-5">
                    <div class="w-12 h-12 rounded-2xl bg-tertiary/5 border border-tertiary/10 flex items-center justify-center text-tertiary shadow-sm">
                        <span class="material-symbols-outlined text-2xl">cell_tower</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black text-slate-300 uppercase tracking-widest">Signal Port</span>
                        <span class="font-bold tracking-tight text-slate-900 text-sm mt-1 italic leading-none">{{ $inquiry->phone }}</span>
                    </div>
                </div>
                @endif

                <div class="pt-12 border-t border-slate-100">
                    <div class="flex items-center gap-4">
                        <div class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></div>
                        <div class="flex flex-col">
                            <span class="text-[9px] font-black text-slate-300 uppercase tracking-widest">Source Protocol</span>
                            <span class="font-black tracking-tight text-slate-900 text-[10px] uppercase mt-1">MAIN_INQUIRY_LANDING</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Operations Console -->
        <div class="bg-slate-900 p-12 rounded-stellar text-white border border-slate-800 shadow-2xl relative overflow-hidden group">
            <div class="relative z-10 space-y-10">
                <h4 class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Operations Console</h4>
                <div class="space-y-5">
                    <button class="w-full flex items-center justify-between p-6 bg-white/5 hover:bg-white/10 rounded-2xl border border-white/5 transition-all group/action">
                        <span class="text-[10px] font-black uppercase tracking-widest italic text-slate-400 group-hover/action:text-white transition-colors">Direct Assign</span>
                        <span class="material-symbols-outlined text-lg text-slate-700 group-hover/action:translate-x-1 group-hover/action:text-white transition-all">chevron_right</span>
                    </button>
                    <button class="w-full flex items-center justify-between p-6 bg-white/5 hover:bg-white/10 rounded-2xl border border-white/5 transition-all group/action">
                        <span class="text-[10px] font-black uppercase tracking-widest italic text-slate-400 group-hover/action:text-white transition-colors">Archive Node</span>
                        <span class="material-symbols-outlined text-lg text-slate-700 group-hover/action:translate-x-1 group-hover/action:text-white transition-all">chevron_right</span>
                    </button>
                    <button class="w-full flex items-center justify-between p-6 bg-white/5 hover:bg-white/10 rounded-2xl border border-white/5 transition-all group/action">
                        <span class="text-[10px] font-black uppercase tracking-widest italic text-slate-400 group-hover/action:text-white transition-colors">Export Telemetry</span>
                        <span class="material-symbols-outlined text-lg text-slate-700 group-hover/action:translate-x-1 group-hover/action:text-white transition-all">chevron_right</span>
                    </button>
                </div>
            </div>
            <span class="material-symbols-outlined absolute -right-6 -bottom-6 text-9xl text-white/5 pointer-events-none group-hover:scale-125 transition-transform duration-[1.5s]">hub</span>
        </div>
    </div>
</div>
@endsection
