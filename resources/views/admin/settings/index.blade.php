@extends('layouts.backend')

@section('content')

<!-- System Configuration Header -->
<div class="mb-14 px-2">
    <div class="flex items-center justify-between mb-8">
        <div class="flex flex-col gap-3">
            <h1 class="text-4xl font-black tracking-tighter text-on-surface uppercase italic">
                System <span class="text-primary opacity-90">Configuration</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-black uppercase tracking-[0.4em] flex items-center gap-3">
                <span class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_rgba(0,118,255,0.4)] animate-pulse"></span>
                Synchronizing global registry nodes
            </p>
        </div>
        <div class="flex items-center gap-6">
            <div class="px-5 py-2.5 rounded-xl bg-primary/5 border border-primary/10 flex flex-col items-end">
                <span class="text-[8px] font-black text-slate-400 uppercase tracking-widest leading-none">Access Protocol</span>
                <span class="text-[10px] font-black text-primary uppercase tracking-tight mt-1.5">UNLOCKED_WRITE_ACCESS</span>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<div class="mb-12 p-8 bg-emerald-50 border border-emerald-100 rounded-stellar flex items-center gap-6 animate-in-fade shadow-sm">
    <div class="w-14 h-14 rounded-2xl bg-white flex items-center justify-center text-emerald-500 shadow-sm border border-emerald-100">
        <span class="material-symbols-outlined text-2xl">verified</span>
    </div>
    <div>
        <h4 class="text-sm font-black text-emerald-900 tracking-tight uppercase italic leading-none">Registry Synchronized</h4>
        <p class="text-[10px] text-emerald-600 font-black uppercase tracking-widest mt-2">{{ strtoupper(session('success')) }}</p>
    </div>
</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
    <!-- Capability Registry Navigation -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-stellar overflow-hidden border border-slate-100 shadow-sm sticky top-32">
            <div class="p-8 border-b border-slate-50 flex items-center gap-3">
                <span class="material-symbols-outlined text-slate-300 text-lg">category</span>
                <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Asset Registry</h3>
            </div>
            <nav class="p-6 space-y-2" id="settings-tabs">
                @foreach($settings as $group => $items)
                <button onclick="showGroup('{{ $group }}')" data-group="{{ $group }}" 
                    class="settings-tab-btn w-full flex items-center justify-between p-5 rounded-2xl transition-all duration-300 group {{ $loop->first ? 'active' : 'text-slate-500 hover:text-primary hover:bg-slate-50' }}">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-xl opacity-40 group-hover:opacity-100 transition-opacity">
                            @if($group === 'general') settings @elseif($group === 'seo') search @elseif($group === 'social') share @elseif($group === 'smtp') mail @else category @endif
                        </span>
                        <span class="text-[11px] font-black uppercase tracking-widest pt-0.5">{{ $group }}</span>
                    </div>
                </button>
                @endforeach
            </nav>
            <div class="p-8 bg-slate-50/50 border-t border-slate-50">
                <div class="flex items-center gap-4">
                    <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                    <span class="text-[9px] text-slate-400 uppercase font-black tracking-widest opacity-60">Operational Core</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Configuration Canvas -->
    <div class="lg:col-span-3">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @foreach($settings as $group => $items)
            <div id="group-{{ $group }}" class="settings-group {{ $loop->first ? '' : 'hidden' }} space-y-10 animate-in-fade">
                <div class="bg-white rounded-stellar overflow-hidden border border-slate-100 shadow-sm p-12">
                    <div class="flex items-center gap-4 mb-14 pb-8 border-b border-slate-50">
                        <div class="w-2.5 h-2.5 rounded-full bg-primary shadow-[0_0_10px_rgba(0,118,255,0.4)]"></div>
                        <h2 class="text-xl font-black text-on-surface uppercase tracking-tighter italic">{{ $group }} <span class="text-primary opacity-60">Metadata Layer</span></h2>
                    </div>

                    <div class="space-y-14">
                        @foreach($items as $setting)
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 items-start">
                            <div class="md:col-span-1 py-1">
                                <label for="{{ $setting->key }}" class="text-[11px] font-black text-on-surface uppercase tracking-widest block leading-tight">
                                    {{ $setting->label }}
                                </label>
                                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-tighter mt-3 font-mono opacity-60">NODE_{{ strtoupper($setting->key) }}</p>
                            </div>
                            <div class="md:col-span-3">
                                @if($setting->type === 'textarea')
                                <textarea name="{{ $setting->key }}" id="{{ $setting->key }}" rows="5" 
                                    class="input-material h-40 resize-none italic">{{ $setting->value }}</textarea>
                                
                                @elseif($setting->type === 'file')
                                <div class="flex items-center gap-10">
                                    @if($setting->value)
                                    <div class="w-32 h-32 rounded-3xl bg-slate-50 flex items-center justify-center p-5 border border-slate-100 shadow-sm overflow-hidden group/img">
                                        <img src="{{ asset('storage/' . $setting->value) }}" alt="{{ $setting->label }}" class="max-w-full max-h-full object-contain group-hover/img:scale-110 transition-transform duration-700">
                                    </div>
                                    @else
                                    <div class="w-32 h-32 rounded-3xl bg-slate-50 border border-dashed border-slate-200 flex flex-col items-center justify-center text-slate-300">
                                        <span class="material-symbols-outlined text-3xl">image</span>
                                        <span class="text-[8px] font-black uppercase mt-3 tracking-widest">Null_Asset</span>
                                    </div>
                                    @endif
                                    <div class="flex-1 space-y-4">
                                        <div class="relative group/file">
                                            <input type="file" name="{{ $setting->key }}" id="{{ $setting->key }}" 
                                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                            <div class="bg-slate-50 border border-slate-200 rounded-2xl px-8 py-5 flex items-center justify-between group-hover/file:border-primary transition-all shadow-sm">
                                                <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest text-primary italic">Inject New Node Asset...</span>
                                                <span class="material-symbols-outlined text-lg text-slate-400 group-hover/file:text-primary transition-all">upload_file</span>
                                            </div>
                                        </div>
                                        <p class="text-[9px] text-slate-400 font-bold tracking-widest uppercase italic leading-relaxed opacity-60">Optimization protocol: Match brand primary typography colors for consistency.</p>
                                    </div>
                                </div>

                                @else
                                <input type="text" name="{{ $setting->key }}" id="{{ $setting->key }}" value="{{ $setting->value }}" 
                                    class="input-material">
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

            <!-- Global Commitment Controls -->
            <div class="mt-14 bg-slate-900 rounded-stellar p-12 flex items-center justify-between group shadow-xl">
                <div class="flex items-center gap-8">
                    <div class="w-16 h-16 rounded-3xl bg-white/5 border border-white/10 flex items-center justify-center text-primary group-hover:rotate-6 group-hover:scale-110 transition-transform duration-700">
                        <span class="material-symbols-outlined text-3xl">save_as</span>
                    </div>
                    <div>
                        <h4 class="text-white font-black text-2xl uppercase tracking-tighter italic">Commit Sequence</h4>
                        <p class="text-slate-500 text-[10px] font-black uppercase tracking-[0.3em] mt-2">Synchronizing local state with persistent architectural storage</p>
                    </div>
                </div>
                <button type="submit" class="btn-stellar px-14 py-5 shadow-primary/20 bg-primary hover:bg-white hover:text-primary transition-all">
                    <span class="material-symbols-outlined text-base">terminal</span>
                    Commit All Changes
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .settings-tab-btn.active {
        @apply bg-primary text-white shadow-xl shadow-primary/20 scale-[1.02];
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
