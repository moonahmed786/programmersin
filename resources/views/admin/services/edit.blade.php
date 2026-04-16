@extends('layouts.backend')

@section('content')

<!-- Service Node Configuration Header -->
<div class="mb-14">
    <div class="flex items-center gap-6 mb-4">
        <a href="{{ route('admin.services.index') }}" class="w-10 h-10 rounded-xl bg-white border border-slate-100 flex items-center justify-center text-slate-300 hover:text-primary hover:border-primary/20 transition-all shadow-sm">
            <span class="material-symbols-outlined text-lg">arrow_back</span>
        </a>
        <div class="h-6 w-px bg-slate-100 mx-2"></div>
        <div>
            <h1 class="text-3xl font-black tracking-tighter text-slate-900 uppercase italic">
                <span class="text-gradient">Configure Unit</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-extrabold uppercase tracking-[0.3em] mt-2">Refining architectural module: {{ $service->slug }}</p>
        </div>
    </div>
</div>

<div class="max-w-4xl animate-in-fade">
    <div class="glass-surface rounded-stellar overflow-hidden border border-white/80">
        <form action="{{ route('admin.services.update', $service) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="p-12 space-y-14">
                <!-- Group 01: Identity -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div>
                        <span class="text-[10px] font-black text-primary uppercase tracking-[0.3em] block mb-2">PHASE 01</span>
                        <h3 class="font-black text-slate-900 tracking-tight uppercase text-sm italic">Module Identity</h3>
                    </div>
                    <div class="lg:col-span-2 space-y-10">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" for="title">Label Display Name</label>
                            <input id="title" type="text" name="title" value="{{ old('title', $service->title) }}" required
                                class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-900 focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white transition-all shadow-sm @error('title') border-red-200 @enderror"
                                placeholder="Module identifier...">
                            @error('title') <p class="text-[9px] text-red-500 font-bold uppercase tracking-widest mt-2">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" for="description">Functional Blueprint</label>
                            <textarea id="description" name="description" rows="5"
                                class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl px-6 py-5 text-sm font-medium text-slate-600 focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white transition-all resize-none italic @error('description') border-red-200 @enderror"
                                placeholder="Describe the unit's operational parameters...">{{ old('description', $service->description) }}</textarea>
                            @error('description') <p class="text-[9px] text-red-500 font-bold uppercase tracking-widest mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="h-px bg-slate-100/50"></div>

                <!-- Group 02: Parameters -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div>
                        <span class="text-[10px] font-black text-tertiary uppercase tracking-[0.3em] block mb-2">PHASE 02</span>
                        <h3 class="font-black text-slate-900 tracking-tight uppercase text-sm italic">Performance & Pricing</h3>
                    </div>
                    <div class="lg:col-span-2 space-y-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" for="icon">Visual Glyph</label>
                                <div class="relative group">
                                    <span class="material-symbols-outlined absolute left-6 top-1/2 -translate-y-1/2 text-primary text-xl">{{ old('icon', $service->icon) ?? 'category' }}</span>
                                    <input id="icon" type="text" name="icon" value="{{ old('icon', $service->icon) }}"
                                        class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl pl-16 pr-6 py-4 text-xs font-mono font-bold text-slate-900 focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white transition-all shadow-sm"
                                        placeholder="material_symbol_id">
                                </div>
                            </div>

                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" for="price">Base Unit Price (USD)</label>
                                <div class="relative group">
                                    <span class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-300 font-bold text-xs group-focus-within:text-primary transition-all">$</span>
                                    <input id="price" type="number" step="0.01" name="price" value="{{ old('price', $service->price) }}"
                                        class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl pl-12 pr-6 py-4 text-sm font-black text-slate-900 focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white transition-all shadow-sm"
                                        placeholder="00.00">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" for="order">Registry Priority</label>
                                <input id="order" type="number" name="order" value="{{ old('order', $service->order) }}"
                                    class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl px-6 py-4 text-sm font-black text-slate-900 focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white transition-all shadow-sm">
                            </div>

                            <div class="pt-6 flex flex-col justify-end">
                                <label class="flex items-center gap-6 cursor-pointer group">
                                    <div class="relative">
                                        <input type="hidden" name="is_active" value="0">
                                        <input id="is_active" type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                                            class="sr-only peer">
                                        <div class="w-14 h-7 bg-slate-100 rounded-full peer-checked:bg-primary transition-all shadow-inner"></div>
                                        <div class="absolute top-1 left-1 w-5 h-5 bg-white rounded-full shadow-lg transition-all peer-checked:translate-x-7"></div>
                                    </div>
                                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-300 group-hover:text-primary transition-colors italic">Broadcast Protocol</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="px-12 py-10 bg-slate-50/50 border-t border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-2.5 h-2.5 rounded-full bg-primary animate-pulse shadow-[0_0_10px_rgba(0,118,255,0.3)]"></div>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-300">Awaiting Commit</span>
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ route('admin.services.index') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-300 hover:text-red-500 transition-colors">Abort Sync</a>
                    <button type="submit" class="btn-stellar px-10">
                        <span class="material-symbols-outlined text-sm">terminal</span>
                        Commit Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
