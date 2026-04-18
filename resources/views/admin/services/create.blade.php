@extends('layouts.backend')

@section('content')

<!-- Service Initialization Header -->
<div class="mb-14 px-2">
    <div class="flex items-center gap-6 mb-4">
        <a href="{{ route('admin.services.index') }}" class="w-12 h-12 flex items-center justify-center rounded-2xl bg-white border border-slate-100 shadow-sm text-slate-400 hover:text-primary transition-all hover:shadow-md">
            <span class="material-symbols-outlined text-2xl">arrow_back</span>
        </a>
        <div class="flex flex-col gap-2">
            <h1 class="text-3xl font-black tracking-tighter text-on-surface uppercase italic">
                Initialize <span class="text-primary opacity-90">Module</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-black uppercase tracking-[0.4em] flex items-center gap-3">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                Creating new service capability registry node
            </p>
        </div>
    </div>
</div>

<div class="max-w-5xl animate-in-fade">
    <div class="bg-white rounded-stellar overflow-hidden border border-slate-100 shadow-sm">
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf

            <div class="p-12 space-y-14">
                <!-- Group 01: Core Identification -->
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start">
                    <div class="lg:col-span-1">
                        <span class="text-[9px] font-black text-primary uppercase tracking-[0.3em] block mb-3 opacity-60 italic">Section 01</span>
                        <h3 class="font-black text-on-surface tracking-tighter uppercase text-sm leading-tight italic">Architectural Core</h3>
                    </div>
                    <div class="lg:col-span-3 space-y-10">
                        <div class="space-y-1">
                            <label class="label-material" for="title">Capability Identifier (Title)</label>
                            <input id="title" type="text" name="title" required value="{{ old('title') }}"
                                class="input-material @error('title') border-rose-300 ring-rose-50 ring-4 @enderror"
                                placeholder="ENTER_MODULE_TITLE">
                            @error('title') <p class="text-[10px] text-rose-600 font-black uppercase tracking-widest mt-3 flex items-center gap-2">
                                <span class="material-symbols-outlined text-xs">error</span>
                                {{ $message }}
                            </p> @enderror
                        </div>

                        <div class="space-y-1">
                            <label class="label-material" for="description">Module Specification (Description)</label>
                            <textarea id="description" name="description" rows="5"
                                class="input-material h-40 resize-none italic @error('description') border-rose-300 ring-rose-50 ring-4 @enderror shadow-sm"
                                placeholder="Awaiting manual blueprint input...">{{ old('description') }}</textarea>
                            @error('description') <p class="text-[10px] text-rose-600 font-black uppercase tracking-widest mt-3 flex items-center gap-2">
                                <span class="material-symbols-outlined text-xs">error</span>
                                {{ $message }}
                            </p> @enderror
                        </div>
                    </div>
                </div>

                <div class="h-px bg-slate-50"></div>

                <!-- Group 02: Technical Telemetry -->
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start">
                    <div class="lg:col-span-1">
                        <span class="text-[9px] font-black text-secondary uppercase tracking-[0.3em] block mb-3 opacity-60 italic">Section 02</span>
                        <h3 class="font-black text-on-surface tracking-tighter uppercase text-sm leading-tight italic">Technical Telemetry</h3>
                    </div>
                    <div class="lg:col-span-3 space-y-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-1">
                                <label class="label-material" for="icon">Registry Icon Identifier</label>
                                <div class="relative group">
                                    <span class="material-symbols-outlined absolute left-6 top-1/2 -translate-y-1/2 text-primary text-xl group-focus-within:scale-110 transition-all">category</span>
                                    <input id="icon" type="text" name="icon" value="{{ old('icon', 'settings_suggest') }}"
                                        class="input-material pl-16 font-mono font-black"
                                        placeholder="SYMBOL_ID">
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label class="label-material" for="price">Starting Threshold ($)</label>
                                <div class="relative group">
                                    <span class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 font-black text-xs group-focus-within:text-primary transition-all">$</span>
                                    <input id="price" type="number" step="0.01" name="price" value="{{ old('price') }}"
                                        class="input-material pl-12 font-black tabular-nums"
                                        placeholder="0.00">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-1">
                                <label class="label-material" for="order">Registry Sequence (Order)</label>
                                <input id="order" type="number" name="order" value="{{ old('order', 0) }}"
                                    class="input-material font-mono font-black tabular-nums">
                            </div>

                            <div class="pt-2 flex flex-col justify-end">
                                <div class="flex items-center justify-between p-6 bg-slate-50 border border-slate-100 rounded-2xl">
                                    <div class="flex flex-col gap-1">
                                        <span class="text-[10px] font-black uppercase tracking-widest text-on-surface leading-none">Broadcast Protocol</span>
                                        <span class="text-[8px] text-slate-400 font-bold uppercase tracking-widest leading-none">Global Unit Visibility</span>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer group">
                                        <input type="hidden" name="is_active" value="0">
                                        <input id="is_active" type="checkbox" name="is_active" value="1" checked
                                            class="sr-only peer">
                                        <div class="w-12 h-6 bg-slate-200 rounded-full peer-checked:bg-primary transition-all shadow-inner border border-slate-200"></div>
                                        <div class="absolute top-1 left-1 w-4 h-4 bg-white rounded-full shadow-md transition-all border border-slate-100 peer-checked:translate-x-6"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="px-12 py-10 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-6">
                    <div class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse shadow-[0_0_10px_rgba(16,185,129,0.3)]"></div>
                    <div class="flex flex-col leading-none">
                        <span class="text-on-surface font-black text-[10px] uppercase tracking-tight italic">Node Ready for Init</span>
                        <p class="text-[8px] font-black uppercase tracking-[0.2em] text-slate-400 mt-1 opacity-60">Awaiting central core sync</p>
                    </div>
                </div>
                <div class="flex items-center gap-10">
                    <a href="{{ route('admin.services.index') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-rose-600 transition-colors">Abort Init</a>
                    <button type="submit" class="btn-stellar px-14 py-4">
                        <span class="material-symbols-outlined text-lg">cloud_upload</span>
                        Initialize Module
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
