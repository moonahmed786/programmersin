@extends('layouts.backend')

@section('content')

<!-- Project Deployment Configuration Header -->
<div class="mb-14">
    <div class="flex items-center gap-6 mb-4">
        <a href="{{ route('admin.projects.index') }}" class="w-10 h-10 rounded-xl bg-white border border-slate-100 flex items-center justify-center text-slate-300 hover:text-primary hover:border-primary/20 transition-all shadow-sm">
            <span class="material-symbols-outlined text-lg">arrow_back</span>
        </a>
        <div class="h-6 w-px bg-slate-100 mx-2"></div>
        <div>
            <h1 class="text-3xl font-black tracking-tighter text-slate-900 uppercase italic">
                <span class="text-gradient">Deployment Config</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-extrabold uppercase tracking-[0.3em] mt-2">Refining operational node: ARCH-{{ str_pad($project->id, 4, '0', STR_PAD_LEFT) }}</p>
        </div>
    </div>
</div>

<div class="max-w-4xl animate-in-fade">
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="space-y-12">
            <!-- Group 01: Internal Core -->
            <div class="glass-surface rounded-stellar overflow-hidden border border-white/80 p-12">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div>
                        <span class="text-[10px] font-black text-primary uppercase tracking-[0.3em] block mb-2">PHASE 01</span>
                        <h3 class="font-black text-slate-900 tracking-tight uppercase text-sm italic">Core Framework</h3>
                    </div>
                    <div class="lg:col-span-2 space-y-10">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" for="title">Project Identity (Title)</label>
                            <input id="title" type="text" name="title" value="{{ old('title', $project->title) }}" required
                                class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl px-6 py-4 text-sm font-bold text-slate-900 focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white transition-all shadow-sm"
                                placeholder="ENTER_PROJECT_TITLE">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" for="status">Operational Status</label>
                            <div class="relative group">
                                <select id="status" name="status" required 
                                    class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl px-6 py-4 text-[11px] font-black text-primary uppercase tracking-widest appearance-none focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white transition-all shadow-sm cursor-pointer">
                                    <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>PENDING_INIT</option>
                                    <option value="in_progress" {{ $project->status == 'in_progress' ? 'selected' : '' }}>DEPLOYING_ACTIVE</option>
                                    <option value="review" {{ $project->status == 'review' ? 'selected' : '' }}>SYSTEM_AUDIT</option>
                                    <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>FINALIZED_STABLE</option>
                                    <option value="cancelled" {{ $project->status == 'cancelled' ? 'selected' : '' }}>ABORTED_NULL</option>
                                </select>
                                <span class="material-symbols-outlined absolute right-6 top-1/2 -translate-y-1/2 text-primary opacity-40 pointer-events-none text-lg">unfold_more</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Group 02: Showcase Module -->
            <div class="glass-surface rounded-stellar overflow-hidden border border-white/80 p-12">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div>
                        <span class="text-[10px] font-black text-tertiary uppercase tracking-[0.3em] block mb-2">PHASE 02</span>
                        <h3 class="font-black text-slate-900 tracking-tight uppercase text-sm italic">Showcase Overlay</h3>
                    </div>
                    <div class="lg:col-span-2 space-y-12">
                        <div class="flex items-center justify-between p-8 bg-slate-50/50 rounded-2xl border border-slate-100">
                            <div class="flex flex-col">
                                <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-900">Visibility Protocol</span>
                                <span class="text-[9px] text-slate-400 font-extrabold uppercase tracking-widest mt-1 opacity-60">Deploy to public portfolio node</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer group">
                                <input type="checkbox" name="is_public" value="1" {{ $project->is_public ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-14 h-7 bg-slate-100 rounded-full peer-checked:bg-primary transition-all shadow-inner"></div>
                                <div class="absolute top-1 left-1 w-5 h-5 bg-white rounded-full shadow-lg transition-all peer-checked:translate-x-7"></div>
                            </label>
                        </div>

                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">Telemetry Thumbnail</label>
                            <div class="flex items-center gap-10">
                                @if($project->featured_image)
                                <div class="w-40 h-24 rounded-2xl bg-slate-900 overflow-hidden border border-slate-800 flex items-center justify-center p-1 shadow-2xl">
                                    <img src="{{ asset('storage/' . $project->featured_image) }}" class="object-cover w-full h-full opacity-70 group-hover:scale-110 transition-transform duration-700">
                                </div>
                                @endif
                                <div class="flex-1 space-y-4">
                                    <div class="relative group/file">
                                        <input type="file" name="featured_image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                        <div class="bg-white border border-slate-100 rounded-2xl px-8 py-4 flex items-center justify-between group-hover/file:border-primary/40 transition-all shadow-sm">
                                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Inject New Asset...</span>
                                            <span class="material-symbols-outlined text-lg text-slate-300 group-hover/file:text-primary transition-all">upload_file</span>
                                        </div>
                                    </div>
                                    <p class="text-[9px] text-slate-400 font-extrabold tracking-tighter uppercase italic leading-loose opacity-60">RES_1200x800_MIN // ALPHA_CHANNEL_READY</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" for="showcase_description">Execution Blueprint (Description)</label>
                            <textarea id="showcase_description" name="showcase_description" rows="8" 
                                class="w-full bg-slate-50/50 border border-slate-100 rounded-2xl px-6 py-5 text-sm font-medium text-slate-600 focus:ring-4 focus:ring-primary/5 focus:border-primary/20 focus:bg-white transition-all resize-none italic shadow-sm"
                                placeholder="Describe the engineering challenge and systemic impact...">{{ old('showcase_description', $project->showcase_description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Execution Footer -->
            <div class="bg-slate-900 rounded-stellar overflow-hidden border border-slate-800 shadow-2xl p-12 flex items-center justify-between mt-12 group">
                <div class="flex items-center gap-6">
                    <div class="w-3 h-3 rounded-full bg-emerald-400 animate-pulse shadow-[0_0_12px_rgba(52,211,153,0.5)]"></div>
                    <div>
                        <h4 class="text-white font-black text-sm uppercase tracking-tight italic leading-none">Node Stabilized // Ready for Commit</h4>
                        <p class="text-slate-500 text-[9px] font-black uppercase tracking-[0.2em] mt-2">Committing update protocol to central core</p>
                    </div>
                </div>
                <div class="flex items-center gap-8">
                    <a href="{{ route('admin.projects.index') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-red-500 transition-colors">Abort Init</a>
                    <button type="submit" class="btn-stellar px-12 py-5 text-[11px]">
                        <span class="material-symbols-outlined text-base">terminal</span>
                        Commit Deployment
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
