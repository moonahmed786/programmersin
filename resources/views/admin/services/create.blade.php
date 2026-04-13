@extends('layouts.backend')

@section('content')
<div class="max-w-2xl space-y-6">

    {{-- Page Header --}}
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.services.index') }}"
            class="p-2 rounded-xl text-slate-500 hover:bg-surface-container-low transition-colors">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <div>
            <h1 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Add Service</h1>
            <p class="text-sm text-slate-400 mt-1">Define a new agency service offering</p>
        </div>
    </div>

    {{-- Form Card --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-outline-variant/20 shadow-sm overflow-hidden">
        <form action="{{ route('admin.services.store') }}" method="POST" class="divide-y divide-outline-variant/10">
            @csrf

            {{-- Service Details --}}
            <div class="p-6 space-y-5">
                <p class="text-xs uppercase font-black tracking-widest text-slate-400">Basic Information</p>

                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-widest" for="title">Service Title <span class="text-red-400">*</span></label>
                    <input id="title" type="text" name="title" value="{{ old('title') }}"
                        class="w-full bg-surface-container-low dark:bg-slate-800 border border-outline-variant/30 rounded-xl px-4 py-3 text-sm text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all @error('title') border-red-400 @enderror"
                        placeholder="e.g. Web Development">
                    @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-widest" for="description">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full bg-surface-container-low dark:bg-slate-800 border border-outline-variant/30 rounded-xl px-4 py-3 text-sm text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all resize-none @error('description') border-red-400 @enderror"
                        placeholder="Detailed description of the service...">{{ old('description') }}</textarea>
                    @error('description') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-widest" for="icon">Icon Name</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">category</span>
                            <input id="icon" type="text" name="icon" value="{{ old('icon', 'settings_suggest') }}"
                                class="w-full bg-surface-container-low dark:bg-slate-800 border border-outline-variant/30 rounded-xl pl-10 pr-4 py-3 text-sm text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all"
                                placeholder="Material Symbol Name">
                        </div>
                        <p class="text-[10px] text-slate-400 mt-1 font-bold">Use <a href="https://fonts.google.com/icons" target="_blank" class="text-primary hover:underline">Material Symbols</a> (e.g. rocket_launch)</p>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-widest" for="price">Starting Price ($)</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">$</span>
                            <input id="price" type="number" step="0.01" name="price" value="{{ old('price') }}"
                                class="w-full bg-surface-container-low dark:bg-slate-800 border border-outline-variant/30 rounded-xl pl-7 pr-4 py-3 text-sm text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all"
                                placeholder="0.00">
                        </div>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-widest" for="order">Display Order</label>
                    <input id="order" type="number" name="order" value="{{ old('order', 0) }}"
                        class="w-full bg-surface-container-low dark:bg-slate-800 border border-outline-variant/30 rounded-xl px-4 py-3 text-sm text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all"
                        placeholder="0">
                </div>
            </div>

            {{-- Status & Submit --}}
            <div class="p-6 flex items-center justify-between gap-4">
                <label class="flex items-center gap-3 cursor-pointer">
                    <div class="relative">
                        <input type="hidden" name="is_active" value="0">
                        <input id="is_active" type="checkbox" name="is_active" value="1" checked
                            class="sr-only peer">
                        <div class="w-10 h-6 bg-slate-200 dark:bg-slate-700 rounded-full peer-checked:bg-primary transition-colors"></div>
                        <div class="absolute top-1 left-1 w-4 h-4 bg-white rounded-full shadow transition-all peer-checked:translate-x-4"></div>
                    </div>
                    <span class="text-sm font-semibold text-slate-700 dark:text-slate-300">Set as Public</span>
                </label>

                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.services.index') }}"
                        class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-500 hover:bg-surface-container-low transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex items-center gap-2 bg-primary text-on-primary px-6 py-2.5 rounded-xl font-semibold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all">
                        <span class="material-symbols-outlined text-base">cloud_upload</span>
                        Save Service
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
