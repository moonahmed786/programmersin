@extends('layouts.backend')

@section('content')

<!-- Service Node Configuration Header -->
<div class="mb-14">
    <div class="flex items-center gap-6 mb-4">
        <a href="{{ route('admin.services.index') }}" class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-500 hover:text-primary transition-all shadow-2xl">
            <span class="material-symbols-outlined text-lg">arrow_back</span>
        </a>
        <div class="h-6 w-px bg-white/10 mx-2"></div>
        <div>
            <h1 class="text-3xl font-black tracking-tighter text-white uppercase italic">
                Configure <span class="text-primary">Unit</span>
            </h1>
            <p class="text-[10px] text-slate-500 font-extrabold uppercase tracking-[0.4em] mt-3 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_8px_rgba(0,118,255,0.6)] animate-pulse"></span>
                Refining architectural module: {{ $service->slug }}
            </p>
        </div>
    </div>
</div>

<div class="max-w-4xl animate-in-fade">
    <div class="bg-node-dark/40 backdrop-blur-sm rounded-node overflow-hidden border border-white/5 shadow-2xl">
        <form action="{{ route('admin.services.update', $service) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="p-12 space-y-14">
                <!-- Group 01: Identity -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div>
                        <span class="text-[10px] font-black text-primary uppercase tracking-[0.3em] block mb-2 font-mono">PHASE 01</span>
                        <h3 class="font-black text-white tracking-tight uppercase text-sm italic">Module Identity</h3>
                    </div>
                    <div class="lg:col-span-2 space-y-10">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest px-1" for="title">Label Display Name</label>
                            <input id="title" type="text" name="title" value="{{ old('title', $service->title) }}" required
                                class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-sm font-bold text-white focus:ring-4 focus:ring-primary/10 focus:border-primary/40 focus:bg-white/10 transition-all shadow-inner @error('title') border-rose-500/50 @enderror"
                                placeholder="Module identifier...">
                            @error('title') <p class="text-[9px] text-rose-500 font-bold uppercase tracking-widest mt-2">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest px-1" for="description">Functional Blueprint</label>
                            <textarea id="description" name="description" rows="5"
                                class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-5 text-sm font-bold text-slate-300 focus:ring-4 focus:ring-primary/10 focus:border-primary/40 focus:bg-white/10 transition-all resize-none italic @error('description') border-rose-500/50 @enderror shadow-inner"
                                placeholder="Describe the unit's operational parameters...">{{ old('description', $service->description) }}</textarea>
                            @error('description') <p class="text-[9px] text-rose-500 font-bold uppercase tracking-widest mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="h-px bg-white/5"></div>

                <!-- Group 02: Parameters -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div>
                        <span class="text-[10px] font-black text-primary uppercase tracking-[0.3em] block mb-2 font-mono opacity-80">PHASE 02</span>
                        <h3 class="font-black text-white tracking-tight uppercase text-sm italic">Parameters</h3>
                    </div>
                    <div class="lg:col-span-2 space-y-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest px-1" for="icon">Visual Glyph</label>
                                <div class="relative group">
                                    <span class="material-symbols-outlined absolute left-6 top-1/2 -translate-y-1/2 text-primary text-xl">{{ old('icon', $service->icon) ?? 'category' }}</span>
                                    <input id="icon" type="text" name="icon" value="{{ old('icon', $service->icon) }}"
                                        class="w-full bg-white/5 border border-white/5 rounded-2xl pl-16 pr-6 py-4 text-xs font-mono font-black text-white focus:ring-4 focus:ring-primary/10 focus:border-primary/40 focus:bg-white/10 transition-all shadow-inner"
                                        placeholder="material_symbol_id">
                                </div>
                            </div>

                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest px-1" for="price">Base Unit Price (USD)</label>
                                <div class="relative group">
                                    <span class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-600 font-bold text-xs group-focus-within:text-primary transition-all">$</span>
                                    <input id="price" type="number" step="0.01" name="price" value="{{ old('price', $service->price) }}"
                                        class="w-full bg-white/5 border border-white/5 rounded-2xl pl-12 pr-6 py-4 text-sm font-black text-white focus:ring-4 focus:ring-primary/10 focus:border-primary/40 focus:bg-white/10 transition-all shadow-inner"
                                        placeholder="00.00">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest px-1" for="order">Registry Priority</label>
                                <input id="order" type="number" name="order" value="{{ old('order', $service->order) }}"
                                    class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-sm font-mono font-black text-white focus:ring-4 focus:ring-primary/10 focus:border-primary/40 focus:bg-white/10 transition-all shadow-inner">
                            </div>

                            <div class="pt-6 flex flex-col justify-end">
                                <label class="flex items-center gap-6 cursor-pointer group">
                                    <div class="relative">
                                        <input type="hidden" name="is_active" value="0">
                                        <input id="is_active" type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                                            class="sr-only peer">
                                        <div class="w-14 h-7 bg-white/10 rounded-full peer-checked:bg-primary transition-all shadow-inner"></div>
                                        <div class="absolute top-1 left-1 w-5 h-5 bg-white rounded-full shadow-lg transition-all peer-checked:translate-x-7"></div>
                                    </div>
                                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 group-hover:text-primary transition-colors italic">Broadcast Protocol</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="px-12 py-10 bg-white/5 border-t border-white/5 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-2.5 h-2.5 rounded-full bg-primary animate-pulse shadow-[0_0_10px_rgba(0,118,255,0.4)]"></div>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-600">Awaiting Commit</span>
                </div>
                <div class="flex items-center gap-8">
                    <a href="{{ route('admin.services.index') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 hover:text-rose-500 transition-colors">Abort Sync</a>
                    <button type="submit" class="bg-primary text-white border border-primary/20 px-12 py-4 rounded-xl font-black text-[11px] uppercase tracking-widest hover:brightness-110 shadow-2xl shadow-primary/20 transition-all flex items-center gap-3">
                        <span class="material-symbols-outlined text-base">terminal</span>
                        Commit Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
