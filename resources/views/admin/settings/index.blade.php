@extends('layouts.backend')

@section('content')

<div class="flex flex-col gap-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-900">Settings</h1>
        <p class="text-sm text-slate-500 mt-1">Manage your site configuration</p>
    </div>

    @if(session('success'))
    <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-100 text-emerald-800 px-5 py-3 rounded-xl text-sm font-medium">
        <span class="material-symbols-outlined text-lg">check_circle</span>
        {{ session('success') }}
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Nav -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 sticky top-28">
                <div class="p-4 border-b border-slate-100">
                    <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-wider px-2">Categories</h3>
                </div>
                <nav class="p-3 space-y-1" id="settings-tabs">
                    @foreach($settings as $group => $items)
                    <button onclick="showGroup('{{ $group }}')" data-group="{{ $group }}" 
                        class="settings-tab-btn w-full flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all text-sm {{ $loop->first ? 'active' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        <span class="material-symbols-outlined text-lg opacity-60">
                            @if($group === 'general') settings @elseif($group === 'seo') search @elseif($group === 'social') share @elseif($group === 'smtp') mail @else category @endif
                        </span>
                        <span class="font-medium capitalize">{{ $group }}</span>
                    </button>
                    @endforeach
                </nav>
            </div>
        </div>

        <!-- Settings Content -->
        <div class="lg:col-span-3">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                @foreach($settings as $group => $items)
                <div id="group-{{ $group }}" class="settings-group {{ $loop->first ? '' : 'hidden' }} space-y-6">
                    <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 p-8 md:p-10">
                        <h2 class="text-lg font-bold text-slate-900 capitalize mb-8 pb-4 border-b border-slate-100">{{ $group }} Settings</h2>

                        <div class="space-y-8">
                            @foreach($items as $setting)
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
                                <div class="md:col-span-1">
                                    <label for="{{ $setting->key }}" class="text-sm font-medium text-slate-700 block">
                                        {{ $setting->label }}
                                    </label>
                                    <p class="text-xs text-slate-400 mt-0.5">{{ $setting->key }}</p>
                                </div>
                                <div class="md:col-span-3">
                                    @if($setting->type === 'textarea')
                                    <textarea name="{{ $setting->key }}" id="{{ $setting->key }}" rows="4" 
                                        class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none">{{ $setting->value }}</textarea>
                                    
                                    @elseif($setting->type === 'file')
                                    <div class="flex items-center gap-6">
                                        @if($setting->value)
                                        <div class="w-20 h-20 rounded-xl bg-slate-50 flex items-center justify-center p-3 border border-slate-100 overflow-hidden">
                                            @php
                                                $path = (str_starts_with($setting->value, 'settings/') || str_starts_with($setting->value, 'logos/')) 
                                                    ? 'storage/' . $setting->value 
                                                    : $setting->value;
                                                $fullPath = public_path($path);
                                                $v = file_exists($fullPath) ? filemtime($fullPath) : time();
                                                $previewUrl = asset($path) . '?v=' . $v;
                                            @endphp
                                            <img src="{{ $previewUrl }}" alt="{{ $setting->label }}" class="max-w-full max-h-full object-contain">
                                        </div>
                                        @else
                                        <div class="w-20 h-20 rounded-xl bg-slate-50 border border-dashed border-slate-200 flex items-center justify-center text-slate-300">
                                            <span class="material-symbols-outlined text-2xl">image</span>
                                        </div>
                                        @endif
                                        <div class="flex-1">
                                            <div class="relative">
                                                <input type="file" name="{{ $setting->key }}" id="{{ $setting->key }}" 
                                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                                <div class="border border-slate-200 rounded-xl px-4 py-2.5 flex items-center justify-between hover:border-primary transition-all">
                                                    <span class="text-sm text-slate-500">Choose file...</span>
                                                    <span class="material-symbols-outlined text-lg text-slate-400">upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @else
                                    <input type="text" name="{{ $setting->key }}" id="{{ $setting->key }}" value="{{ $setting->value }}" 
                                        class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                    @endif
                                </div>
                            </div>
                            @if(!$loop->last)
                            <div class="h-px bg-slate-50"></div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Save Button -->
                <div class="mt-8 flex justify-end">
                    <button type="submit" class="inline-flex items-center gap-2 bg-primary text-white text-sm font-semibold px-8 py-3 rounded-xl hover:bg-primary-dark transition-colors">
                        <span class="material-symbols-outlined text-lg">save</span>
                        Save All Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .settings-tab-btn.active {
        @apply bg-primary text-white font-semibold;
    }
    .settings-tab-btn.active .material-symbols-outlined {
        @apply opacity-100;
    }
</style>

<script>
    function showGroup(group) {
        document.querySelectorAll('.settings-group').forEach(el => el.classList.add('hidden'));
        document.getElementById('group-' + group).classList.remove('hidden');
        document.querySelectorAll('.settings-tab-btn').forEach(btn => btn.classList.remove('active'));
        document.querySelector(`[data-group="${group}"]`).classList.add('active');
    }
</script>
@endsection
