@extends('layouts.backend')

@section('content')

<div class="mb-8">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.inquiries.index') }}" class="w-9 h-9 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-400 hover:text-primary transition-all">
                <span class="material-symbols-outlined text-lg">arrow_back</span>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Inquiry Details</h1>
                <p class="text-sm text-slate-500 mt-0.5">INQ-{{ str_pad($inquiry->id, 4, '0', STR_PAD_LEFT) }} · {{ $inquiry->created_at->format('d M Y') }}</p>
            </div>
        </div>

        @if(auth()->user()->isSuperAdmin())
        <form action="{{ route('admin.inquiries.update_status', $inquiry->id) }}" method="POST" class="inline-flex items-center gap-3 bg-white px-4 py-2 rounded-xl border border-slate-200">
            @csrf
            @method('PATCH')
            <label class="text-xs font-medium text-slate-500">Status:</label>
            <select name="status" class="border-none text-sm font-semibold text-primary focus:ring-0 cursor-pointer bg-transparent">
                <option value="new" @if($inquiry->status == 'new') selected @endif>New</option>
                <option value="in_review" @if($inquiry->status == 'in_review') selected @endif>In Review</option>
                <option value="responded" @if($inquiry->status == 'responded') selected @endif>Responded</option>
                <option value="closed" @if($inquiry->status == 'closed') selected @endif>Closed</option>
            </select>
            <button type="submit" class="inline-flex items-center gap-1.5 bg-primary text-white text-xs font-semibold px-4 py-2 rounded-lg hover:bg-primary-dark transition-colors">
                Update
            </button>
        </form>
        @endif
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Message & Notes -->
    <div class="lg:col-span-2 space-y-8">
        <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 p-8">
            <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-6">Message</h3>
            <div class="bg-slate-50 border border-slate-100 rounded-xl p-8">
                <h4 class="text-xl font-bold text-slate-900 mb-4">{{ $inquiry->subject }}</h4>
                <div class="text-sm text-slate-600 leading-relaxed whitespace-pre-line">{{ $inquiry->message }}</div>
            </div>
        </div>

        <!-- Notes -->
        <div class="space-y-6">
            <div class="flex items-center justify-between px-2">
                <h3 class="text-sm font-bold text-slate-900">Internal Notes</h3>
                <span class="text-xs font-medium text-slate-400 bg-slate-100 px-2.5 py-1 rounded-full">{{ $inquiry->notes->count() }} notes</span>
            </div>
            
            @foreach($inquiry->notes as $note)
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 p-6">
                <div class="flex items-start justify-between mb-4 pb-4 border-b border-slate-50">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-slate-100 flex items-center justify-center text-sm font-bold text-slate-500">
                            {{ strtoupper(substr($note->user->name, 0, 2)) }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-900">{{ $note->user->name }}</p>
                            <p class="text-xs text-slate-400">{{ $note->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                </div>
                <div class="text-sm text-slate-600 leading-relaxed">{{ $note->content }}</div>
            </div>
            @endforeach

            <div class="bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl p-6">
                <form action="{{ route('admin.inquiries.store_note', $inquiry->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5" for="note_content">Add a note</label>
                        <textarea id="note_content" name="content" rows="4" placeholder="Write your note..." required 
                            class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center gap-2 bg-primary text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-primary-dark transition-colors">
                            <span class="material-symbols-outlined text-lg">post_add</span>
                            Add Note
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Quick Reply -->
        <div class="bg-slate-900 rounded-2xl p-10 text-center">
            <div class="max-w-sm mx-auto space-y-6">
                <div class="w-16 h-16 rounded-2xl bg-white/5 flex items-center justify-center text-primary mx-auto">
                    <span class="material-symbols-outlined text-3xl">outgoing_mail</span>
                </div>
                <div>
                    <h4 class="text-xl font-bold text-white">Reply to Inquiry</h4>
                    <p class="text-slate-400 text-sm mt-2">Send a direct response and convert this lead into an active project.</p>
                </div>
                <a href="mailto:{{ $inquiry->email }}?subject=Re: {{ $inquiry->subject }}" class="inline-flex items-center gap-2 bg-primary text-white text-sm font-semibold px-6 py-3 rounded-xl hover:bg-primary-dark transition-colors w-full justify-center">
                    Send Email
                </a>
            </div>
        </div>
    </div>

    <!-- Contact Info -->
    <div class="space-y-6">
        <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 p-8">
            <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-6 pb-4 border-b border-slate-50">Contact Info</h3>
            
            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 flex-shrink-0">
                        <span class="material-symbols-outlined">person</span>
                    </div>
                    <div>
                        <span class="text-xs text-slate-400">Name</span>
                        <p class="text-sm font-semibold text-slate-900">{{ $inquiry->name }}</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-lg bg-primary/5 flex items-center justify-center text-primary flex-shrink-0">
                        <span class="material-symbols-outlined">mail</span>
                    </div>
                    <div class="overflow-hidden">
                        <span class="text-xs text-slate-400">Email</span>
                        <p class="text-sm font-semibold text-primary truncate">{{ $inquiry->email }}</p>
                    </div>
                </div>

                @if($inquiry->phone)
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 flex-shrink-0">
                        <span class="material-symbols-outlined">phone</span>
                    </div>
                    <div>
                        <span class="text-xs text-slate-400">Phone</span>
                        <p class="text-sm font-semibold text-slate-900">{{ $inquiry->phone }}</p>
                    </div>
                </div>
                @endif

                <div class="pt-4 mt-4 border-t border-slate-50">
                    <span class="text-xs text-slate-400">Source</span>
                    <p class="text-sm font-medium text-slate-600 mt-0.5">Contact Form</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-slate-900 p-6 rounded-2xl text-white space-y-3">
            <h4 class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-4">Quick Actions</h4>
            <button class="w-full flex items-center justify-between p-4 bg-white/5 hover:bg-white/10 rounded-xl transition-all text-sm text-slate-400 hover:text-white">
                Assign to Team Member
                <span class="material-symbols-outlined text-lg">chevron_right</span>
            </button>
            <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
                @csrf @method('DELETE')
                <button type="submit" class="w-full flex items-center justify-between p-4 bg-white/5 hover:bg-red-500/10 rounded-xl transition-all text-sm text-slate-400 hover:text-red-400">
                    Delete Inquiry
                    <span class="material-symbols-outlined text-lg">chevron_right</span>
                </button>
            </form>
            <button class="w-full flex items-center justify-between p-4 bg-white/5 hover:bg-white/10 rounded-xl transition-all text-sm text-slate-400 hover:text-white">
                Export as PDF
                <span class="material-symbols-outlined text-lg">chevron_right</span>
            </button>
        </div>
    </div>
</div>
@endsection
