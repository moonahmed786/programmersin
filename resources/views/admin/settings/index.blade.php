@extends('layouts.backend')

@section('content')

<!-- System Core Configuration Header -->
<div class="mb-14">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-black tracking-tighter text-slate-900 uppercase italic">
                <span class="text-gradient">System Configuration</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-extrabold uppercase tracking-[0.3em] mt-2 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                Synchronizing global registry and architectural nodes
            </p>
        </div>
        <div class="flex items-center gap-6">
            <div class="flex flex-col items-end">
                <span class="text-[8px] font-black text-slate-300 uppercase tracking-widest leading-none">Global Lock Status</span>
                <span class="text-[10px] font-black text-primary uppercase tracking-tight mt-1 animate-pulse">UNLOCKED_WRITE_ACCESS</span>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<div class="mb-10 p-8 glass-surface border border-white/80 rounded-stellar flex items-center gap-6 animate-in-fade">
    <div class="w-12 h-12 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-600 border border-emerald-100">
        <span class="material-symbols-outlined text-2xl">verified</span>
    </div>
    <div>
        <h4 class="text-xs font-black text-slate-900 tracking-tight uppercase italic">Registry Synchronized</h4>
        <p class="text-[11px] text-slate-400 font-bold uppercase tracking-widest mt-1">{{ session('success') }}</p>
    </div>
</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
    <!-- Capability Registry Sidebar -->
    <div class="lg:col-span-1">
        <div class="bg-slate-900 rounded-stellar overflow-hidden border border-slate-800 shadow-2xl sticky top-32">
            <div class="p-8 border-b border-white/5">
                <h3 class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Capability Registry</h3>
            </div>
            <nav class="p-6 space-y-3" id="settings-tabs">
                @foreach($settings as $group => $items)
                <button onclick="showGroup('{{ $group }}')" data-group="{{ $group }}" 
                    class="settings-tab-btn w-full flex items-center justify-between p-5 rounded-2xl transition-all duration-300 group {{ $loop->first ? 'active' : 'text-slate-500 hover:text-slate-300' }}">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-xl opacity-40 group-hover:opacity-100 transition-opacity">
                            @if($group === 'general') settings @elseif($group === 'seo') search @elseif($group === 'social') share @elseif($group === 'smtp') mail @else category @endif
                        </span>
                        <span class="text-[11px] font-black uppercase tracking-widest italic pt-0.5">{{ $group }}</span>
                    </div>
                </button>
                @endforeach
            </nav>
            <div class="p-8 bg-black/20 border-t border-white/5">
                <div class="flex items-center gap-4">
                    <div class="w-2 h-2 rounded-full bg-primary animate-ping"></div>
                    <span class="text-[9px] text-slate-600 uppercase font-black tracking-widest">Operational Console</span>
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
                <div class="glass-surface rounded-stellar overflow-hidden border border-white/80 relative group/card p-12">
                    <div class="flex items-center gap-4 mb-12 pb-8 border-b border-slate-100">
                        <div class="w-2.5 h-2.5 rounded-full bg-primary animate-pulse"></div>
                        <h2 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] italic">{{ $group }} Metadata Layer</h2>
                    </div>

                    <div class="space-y-14">
                        @foreach($items as $setting)
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                            <div class="md:col-span-1">
                                <label for="{{ $setting->key }}" class="text-[11px] font-black text-slate-900 uppercase tracking-widest block leading-tight">
                                    {{ $setting->label }}
                                </label>
                                <p class="text-[9px] font-extrabold text-slate-300 uppercase tracking-tighter mt-2">NODE_{{ strtoupper($setting->key) }}</p>
                            </div>
                            <div class="md:col-span-3">
                                @if($setting->type === 'textarea')
                                <textarea name="{{ $setting->key }}" id="{{ $setting->key }}" rows="5" 
                                    class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl px-6 py-5 focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white text-sm font-medium text-slate-600 transition-all resize-none italic shadow-sm">{{ $setting->value }}</textarea>
                                
                                @elseif($setting->type === 'file')
                                <div class="flex items-start gap-10">
                                    @if($setting->value)
                                    <div class="w-36 h-36 rounded-2xl bg-slate-900 flex items-center justify-center p-4 border border-slate-800 shadow-2xl group/img overflow-hidden">
                                        <img src="{{ asset('storage/' . $setting->value) }}" alt="{{ $setting->label }}" class="max-w-full max-h-full object-contain group-hover/img:scale-110 transition-transform duration-700">
                                    </div>
                                    @else
                                    <div class="w-36 h-36 rounded-2xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center text-slate-300">
                                        <span class="material-symbols-outlined text-3xl opacity-20">image</span>
                                        <span class="text-[8px] font-black uppercase mt-3 opacity-40">Null_Asset</span>
                                    </div>
                                    @endif
                                    <div class="flex-1 space-y-6">
                                        <div class="relative group/file">
                                            <input type="file" name="{{ $setting->key }}" id="{{ $setting->key }}" 
                                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                            <div class="bg-white border border-slate-100 rounded-2xl px-8 py-5 flex items-center justify-between group-hover/file:border-primary/40 transition-all shadow-sm">
                                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Inject New Asset...</span>
                                                <span class="material-symbols-outlined text-lg text-slate-300 group-hover/file:text-primary transition-all">upload_file</span>
                                            </div>
                                        </div>
                                        <p class="text-[9px] text-slate-400 font-extrabold tracking-tighter uppercase italic leading-loose opacity-60">Optimization protocol: Match agency primary palette assets for maximum architectural integrity.</p>
                                    </div>
                                </div>

                                @else
                                <input type="text" name="{{ $setting->key }}" id="{{ $setting->key }}" value="{{ $setting->value }}" 
                                    class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl px-6 py-5 focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white text-sm font-black text-slate-900 shadow-sm transition-all">
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

            <!-- Global Commmitment Footer -->
            <div class="mt-14 bg-slate-900 rounded-stellar overflow-hidden border border-slate-800 shadow-2xl p-12 flex items-center justify-between group">
                <div class="flex items-center gap-8">
                    <div class="w-16 h-16 rounded-3xl bg-white/5 border border-white/10 flex items-center justify-center text-primary group-hover:rotate-12 group-hover:scale-110 transition-transform duration-700">
                        <span class="material-symbols-outlined text-3xl">save_as</span>
                    </div>
                    <div>
                        <h4 class="text-white font-black text-lg uppercase tracking-tight italic">Synchronize Global State</h4>
                        <p class="text-slate-500 text-[10px] font-black uppercase tracking-[0.2em] mt-2">Committing changes to persistent architectural storage</p>
                    </div>
                </div>
                <button type="submit" class="btn-stellar px-12 py-5 text-[11px]">
                    <span class="material-symbols-outlined text-base">terminal</span>
                    Commit Registry Changes
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .settings-tab-btn.active {
        @apply bg-primary text-white shadow-[0_10px_30px_rgba(0,118,255,0.3)];
    }
    .settings-tab-btn.active .material-symbols-outlined {
        @apply opacity-100;
    }
</style>

<script>
    function showGroup(group) {
        // Hide all groups
        document.querySelectorAll('.settings-group').forEach(el => el.classList.add('hidden'));
        // Show selected group
        document.getElementById('group-' + group).classList.remove('hidden');
        
        // Update tab buttons
        document.querySelectorAll('.settings-tab-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        
        const activeBtn = document.querySelector(`[data-group="${group}"]`);
        activeBtn.classList.add('active');
    }
</script>
@endsection
