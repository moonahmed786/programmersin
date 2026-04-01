@extends('layouts.backend')

@section('content')
<!-- Header Section -->
<header class="mb-10 flex items-end justify-between">
    <div>
        <div class="flex items-center gap-4 mb-2">
            <a href="{{ route('admin.projects.index') }}" class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
            </a>
            <h1 class="text-3xl font-extrabold tracking-tight text-on-surface">Initialize Engagement</h1>
        </div>
        <p class="text-on-surface-variant font-medium italic">Create a new architectural ledger for client delivery.</p>
    </div>
</header>

<div class="max-w-4xl">
    <form action="{{ route('admin.projects.store') }}" method="POST" class="space-y-8">
        @csrf
        
        <div class="bg-surface-container-lowest rounded-3xl p-10 border border-outline-variant/10 shadow-2xl shadow-slate-200/50 space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Title -->
                <div class="space-y-2 col-span-1 md:col-span-2">
                    <label class="text-[11px] font-black uppercase tracking-widest text-on-surface-variant ml-1">Engagment Name</label>
                    <input type="text" name="title" required placeholder="e.g. Enterprise Cloud Infrastructure v2" 
                           class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary/20 focus:ring-4 focus:ring-primary/5 rounded-2xl px-6 py-4 text-on-surface font-bold tracking-tight transition-all placeholder:text-slate-300">
                </div>

                <!-- Customer Selection -->
                <div class="space-y-2">
                    <label class="text-[11px] font-black uppercase tracking-widest text-on-surface-variant ml-1">Target Account</label>
                    <select name="customer_id" required class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary/20 focus:ring-4 focus:ring-primary/5 rounded-2xl px-6 py-4 text-on-surface font-black tracking-tight transition-all">
                        <option value="" disabled selected>Select Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->email }})</option>
                        @endforeach
                    </select>
                </div>

                <!-- Service Category -->
                <div class="space-y-2">
                    <label class="text-[11px] font-black uppercase tracking-widest text-on-surface-variant ml-1">Service Core</label>
                    <select name="service_id" required class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary/20 focus:ring-4 focus:ring-primary/5 rounded-2xl px-6 py-4 text-on-surface font-black tracking-tight transition-all">
                        <option value="" disabled selected>Select Core Service</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status & Budget -->
                <div class="space-y-2">
                    <label class="text-[11px] font-black uppercase tracking-widest text-on-surface-variant ml-1">Global Status</label>
                    <select name="status" required class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary/20 focus:ring-4 focus:ring-primary/5 rounded-2xl px-6 py-4 text-on-surface font-black tracking-tight transition-all">
                        <option value="pending">Pending Strategy</option>
                        <option value="in_progress">Live Build</option>
                        <option value="review">Audit/Review</option>
                        <option value="completed">Deployment Success</option>
                        <option value="cancelled">Engagement Halt</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-black uppercase tracking-widest text-on-surface-variant ml-1">Allocated Budget ($)</label>
                    <input type="number" step="0.01" name="budget" placeholder="0.00" 
                           class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary/20 focus:ring-4 focus:ring-primary/5 rounded-2xl px-6 py-4 text-on-surface font-mono font-black tracking-tight transition-all">
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-black uppercase tracking-widest text-on-surface-variant ml-1">Project Deadline</label>
                    <input type="date" name="due_date" 
                           class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary/20 focus:ring-4 focus:ring-primary/5 rounded-2xl px-6 py-4 text-on-surface font-black tracking-tight transition-all">
                </div>

                <div class="space-y-2 col-span-1 md:col-span-2">
                    <label class="text-[11px] font-black uppercase tracking-widest text-on-surface-variant ml-1">Project Scope & Directives</label>
                    <textarea name="description" rows="4" placeholder="Clarify the core objectives and technical requirements..." 
                           class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary/20 focus:ring-4 focus:ring-primary/5 rounded-3xl px-6 py-4 text-on-surface font-medium leading-relaxed italic transition-all placeholder:text-slate-300"></textarea>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-4 pt-4">
            <button type="reset" class="px-8 py-4 text-on-surface-variant font-black text-sm uppercase tracking-widest hover:text-error transition-colors">Reset Architecture</button>
            <button type="submit" class="px-10 py-4 bg-on-surface text-surface rounded-2xl font-black text-sm uppercase tracking-widest shadow-2xl shadow-on-surface/30 transition-all hover:-translate-y-1 hover:shadow-on-surface/40">Deploy Project</button>
        </div>
    </form>
</div>
@endsection
