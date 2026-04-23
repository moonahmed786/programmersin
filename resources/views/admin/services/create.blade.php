@extends('layouts.backend')

@section('content')

<div class="mb-8">
    <div class="flex items-center gap-4 mb-4">
        <a href="{{ route('admin.services.index') }}" class="w-9 h-9 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-400 hover:text-primary transition-all">
            <span class="material-symbols-outlined text-lg">arrow_back</span>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Add Service</h1>
            <p class="text-sm text-slate-500 mt-0.5">Create a new service offering</p>
        </div>
    </div>
</div>

<div>
    <div class="bg-white rounded-2xl overflow-hidden border border-slate-100">
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf

            <div class="p-8 md:p-10 space-y-10">
                <!-- Details -->
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                    <div class="lg:col-span-1">
                        <p class="text-xs text-primary font-semibold uppercase tracking-wider mb-1">Details</p>
                        <h3 class="text-sm font-bold text-slate-900">Basic Info</h3>
                    </div>
                    <div class="lg:col-span-3 space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5" for="title">Title *</label>
                            <input id="title" type="text" name="title" required value="{{ old('title') }}"
                                class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all @error('title') border-red-300 @enderror"
                                placeholder="e.g. Web Development">
                            @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5" for="description">Description</label>
                            <textarea id="description" name="description" rows="4"
                                class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none @error('description') border-red-300 @enderror"
                                placeholder="Describe this service...">{{ old('description') }}</textarea>
                            @error('description') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="h-px bg-slate-100"></div>

                <!-- Settings -->
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                    <div class="lg:col-span-1">
                        <p class="text-xs text-primary font-semibold uppercase tracking-wider mb-1">Settings</p>
                        <h3 class="text-sm font-bold text-slate-900">Options</h3>
                    </div>
                    <div class="lg:col-span-3 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="icon">Icon Name</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-primary text-lg">category</span>
                                    <input id="icon" type="text" name="icon" value="{{ old('icon', 'settings_suggest') }}"
                                        class="w-full border border-slate-200 rounded-xl pl-11 pr-4 py-2.5 text-sm text-slate-900 font-mono focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                        placeholder="material_icon_name">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="price">Starting Price ($)</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm font-medium">$</span>
                                    <input id="price" type="number" step="0.01" name="price" value="{{ old('price') }}"
                                        class="w-full border border-slate-200 rounded-xl pl-9 pr-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                        placeholder="0.00">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="order">Display Order</label>
                                <input id="order" type="number" name="order" value="{{ old('order', 0) }}"
                                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 font-mono focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                            </div>
                            <div class="flex items-center pt-6">
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <div class="relative">
                                        <input type="hidden" name="is_active" value="0">
                                        <input id="is_active" type="checkbox" name="is_active" value="1" checked class="sr-only peer">
                                        <div class="w-11 h-6 bg-slate-200 rounded-full peer-checked:bg-primary transition-all"></div>
                                        <div class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow-sm transition-all peer-checked:translate-x-5"></div>
                                    </div>
                                    <span class="text-sm font-medium text-slate-700">Active</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-8 md:px-10 py-5 bg-slate-50 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.services.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700 transition-colors px-4 py-2">Cancel</a>
                <button type="submit" class="inline-flex items-center gap-2 bg-primary text-white text-sm font-semibold px-6 py-2.5 rounded-xl hover:bg-primary-dark transition-colors">
                    <span class="material-symbols-outlined text-lg">save</span>
                    Save Service
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
