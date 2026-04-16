@extends('layouts.backend')

@section('content')

<!-- Project Deployment Initialization Header -->
<div class="mb-14">
    <div class="flex items-center gap-6 mb-4">
        <a href="{{ route('admin.projects.index') }}" class="w-10 h-10 rounded-xl bg-white border border-slate-100 flex items-center justify-center text-slate-300 hover:text-primary hover:border-primary/20 transition-all shadow-sm">
            <span class="material-symbols-outlined text-lg">arrow_back</span>
        </a>
        <div class="h-6 w-px bg-slate-100 mx-2"></div>
        <div>
            <h1 class="text-3xl font-black tracking-tighter text-slate-900 uppercase italic">
                <span class="text-gradient">Initialize Engagement</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-extrabold uppercase tracking-[0.3em] mt-2">Establishing new architectural engineering node</p>
        </div>
    </div>
</div>

<div class="max-w-4xl animate-in-fade">
    <div class="glass-surface rounded-stellar overflow-hidden border border-white/80">
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="p-12 space-y-14">
                <!-- Group 01: Core Engagement Strategy -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div>
                        <span class="text-[10px] font-black text-primary uppercase tracking-[0.3em] block mb-2">PHASE 01</span>
                        <h3 class="font-black text-slate-900 tracking-tight uppercase text-sm italic">Core Strategy</h3>
                    </div>
                    <div class="lg:col-span-2 space-y-10">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" for="title">Engagement Identity (Title)</label>
                            <input id="title" type="text" name="title" required value="{{ old('title') }}"
                                class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-900 focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white transition-all @error('title') border-red-200 @enderror"
                                placeholder="ENTER_PROJECT_PHRASE">
                            @error('title') <p class="text-[9px] text-red-500 font-bold uppercase tracking-widest mt-2">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" for="customer_id">Target Account Hub</label>
                                <div class="relative">
                                    <select id="customer_id" name="customer_id" required 
                                        class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl px-6 py-4 text-[11px] font-black uppercase tracking-widest appearance-none focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white transition-all">
                                        <option value="" disabled selected>SELECT_CLIENT_NODE</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ strtoupper($customer->name) }} ({{ $customer->email }})</option>
                                        @endforeach
                                    </select>
                                    <span class="material-symbols-outlined absolute right-6 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none text-lg">unfold_more</span>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" for="service_id">Service Core Module</label>
                                <div class="relative">
                                    <select id="service_id" name="service_id" required 
                                        class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl px-6 py-4 text-[11px] font-black uppercase tracking-widest appearance-none focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white transition-all">
                                        <option value="" disabled selected>SELECT_SERVICE_TYPE</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}">{{ strtoupper($service->title) }}</option>
                                        @endforeach
                                    </select>
                                    <span class="material-symbols-outlined absolute right-6 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none text-lg">unfold_more</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-px bg-slate-100/50"></div>

                <!-- Group 02: Logistics & Constraints -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div>
                        <span class="text-[10px] font-black text-tertiary uppercase tracking-[0.3em] block mb-2">PHASE 02</span>
                        <h3 class="font-black text-slate-900 tracking-tight uppercase text-sm italic">Logistics & Constraints</h3>
                    </div>
                    <div class="lg:col-span-2 space-y-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" for="status">Initial Status Node</label>
                                <div class="relative">
                                    <select id="status" name="status" required 
                                        class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl px-6 py-4 text-[11px] font-black uppercase tracking-widest appearance-none focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white transition-all">
                                        <option value="pending">PENDING_STRATEGY</option>
                                        <option value="in_progress">LIVE_BUILD</option>
                                        <option value="review">AUDIT_REVIEW</option>
                                        <option value="completed">DEPLOYMENT_SUCCESS</option>
                                        <option value="cancelled">ENGAGEMENT_HALT</option>
                                    </select>
                                    <span class="material-symbols-outlined absolute right-6 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none text-lg">unfold_more</span>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" for="budget">Allocated Budget Threshold ($)</label>
                                <div class="relative group">
                                    <span class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 font-black text-xs group-focus-within:text-primary transition-all">$</span>
                                    <input id="budget" type="number" step="0.01" name="budget" value="{{ old('budget') }}"
                                        class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl pl-12 pr-6 py-4 text-sm font-black text-slate-900 focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white transition-all"
                                        placeholder="0.00">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" for="due_date">Final Deployment Deadline</label>
                                <input id="due_date" type="date" name="due_date" value="{{ old('due_date') }}"
                                    class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl px-6 py-4 text-[11px] font-black text-slate-900 focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white transition-all">
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" for="description">Scope Directives & Logic</label>
                            <textarea id="description" name="description" rows="5"
                                class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl px-6 py-5 text-sm font-medium text-slate-600 focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white transition-all resize-none italic"
                                placeholder="Establish core objectives and technical dependencies...">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="px-12 py-10 bg-slate-50/50 border-t border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-2.5 h-2.5 rounded-full bg-primary animate-pulse shadow-[0_0_10px_rgba(0,118,255,0.3)]"></div>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-300">Awaiting Strategy Deployment</span>
                </div>
                <div class="flex items-center gap-6">
                    <button type="reset" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-300 hover:text-red-500 transition-colors">Abort Architecture</button>
                    <button type="submit" class="btn-stellar px-10">
                        <span class="material-symbols-outlined text-sm">rocket_launch</span>
                        Deploy Project Node
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
