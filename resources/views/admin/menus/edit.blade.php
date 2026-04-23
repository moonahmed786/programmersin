@extends('layouts.backend')

@section('content')

<div class="mb-8">
    <div class="flex items-center gap-4 mb-4">
        <a href="{{ route('admin.menus.index') }}" class="w-9 h-9 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-400 hover:text-primary transition-all">
            <span class="material-symbols-outlined text-lg">arrow_back</span>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Edit Menu Item</h1>
            <p class="text-sm text-slate-500 mt-0.5">Editing: <span class="font-medium text-slate-700">{{ $menu->title }}</span></p>
        </div>
    </div>
</div>

<div class="max-w-4xl">
    <div class="bg-white rounded-2xl overflow-hidden border border-slate-100">
        <form action="{{ route('admin.menus.update', $menu) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="p-8 md:p-10 space-y-10">
                <!-- Link Info -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div>
                        <p class="text-xs text-primary font-semibold uppercase tracking-wider mb-1">Details</p>
                        <h3 class="text-sm font-bold text-slate-900">Link Info</h3>
                    </div>
                    <div class="lg:col-span-2 space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5" for="title">Label *</label>
                            <input id="title" type="text" name="title" required value="{{ old('title', $menu->title) }}"
                                class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all @error('title') border-red-300 @enderror"
                                placeholder="e.g. About Us">
                            @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5" for="url">URL</label>
                            <input id="url" type="text" name="url" value="{{ old('url', $menu->url) }}"
                                class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 font-mono focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                placeholder="/#services or https://...">
                            <p class="text-xs text-slate-400 mt-1">Leave empty for parent dropdown items</p>
                        </div>
                    </div>
                </div>

                <div class="h-px bg-slate-100"></div>

                <!-- Placement -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div>
                        <p class="text-xs text-primary font-semibold uppercase tracking-wider mb-1">Placement</p>
                        <h3 class="text-sm font-bold text-slate-900">Position & Hierarchy</h3>
                    </div>
                    <div class="lg:col-span-2 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="location">Location *</label>
                                <div class="relative">
                                    <select id="location" name="location" required 
                                        class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm appearance-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        <option value="header" {{ $menu->location === 'header' ? 'selected' : '' }}>Header</option>
                                        <option value="footer" {{ $menu->location === 'footer' ? 'selected' : '' }}>Footer</option>
                                    </select>
                                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none text-lg">unfold_more</span>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="parent_id">Parent Item</label>
                                <div class="relative">
                                    <select id="parent_id" name="parent_id" 
                                        class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm appearance-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        <option value="">None (Top Level)</option>
                                        @foreach($parentMenus as $parent)
                                            <option value="{{ $parent->id }}" {{ $menu->parent_id === $parent->id ? 'selected' : '' }}>{{ $parent->title }} ({{ ucfirst($parent->location) }})</option>
                                        @endforeach
                                    </select>
                                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none text-lg">unfold_more</span>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="order">Order</label>
                                <input id="order" type="number" name="order" value="{{ old('order', $menu->order) }}"
                                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                            </div>
                            <div class="flex items-center pt-6">
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <div class="relative">
                                        <input type="hidden" name="is_active" value="0">
                                        <input id="is_active" type="checkbox" name="is_active" value="1" {{ old('is_active', $menu->is_active) ? 'checked' : '' }}
                                            class="sr-only peer">
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
                <a href="{{ route('admin.menus.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700 transition-colors px-4 py-2">Cancel</a>
                <button type="submit" class="inline-flex items-center gap-2 bg-primary text-white text-sm font-semibold px-6 py-2.5 rounded-xl hover:bg-primary-dark transition-colors">
                    <span class="material-symbols-outlined text-lg">save</span>
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
