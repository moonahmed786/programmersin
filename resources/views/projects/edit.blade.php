@extends('layouts.backend')

@section('content')

<!-- Project Deployment Configuration Header -->
<div class="mb-14 px-2">
    <div class="flex items-center gap-6 mb-4">
        <a href="{{ route('admin.projects.index') }}" class="w-12 h-12 flex items-center justify-center rounded-2xl bg-white border border-slate-100 shadow-sm text-slate-400 hover:text-primary transition-all hover:shadow-md">
            <span class="material-symbols-outlined text-2xl">arrow_back</span>
        </a>
        <div class="flex flex-col gap-2">
            <h1 class="text-3xl font-black tracking-tighter text-on-surface uppercase italic">
                Deployment <span class="text-primary opacity-90">Configuration</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-black uppercase tracking-[0.3em] flex items-center gap-3">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                Refining operational node: <span class="text-on-surface">ARCH-{{ str_pad($project->id, 4, '0', STR_PAD_LEFT) }}</span>
            </p>
        </div>
    </div>
</div>

<div class="max-w-5xl animate-in-fade">
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="space-y-12">
            <!-- Group 01: Internal Core -->
            <div class="bg-white rounded-stellar overflow-hidden border border-slate-100 shadow-sm p-12">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start">
                    <div class="lg:col-span-1">
                        <span class="text-[9px] font-black text-primary uppercase tracking-[0.3em] block mb-3 opacity-60 italic">Section 01</span>
                        <h3 class="font-black text-on-surface tracking-tighter uppercase text-sm leading-tight italic">Framework Core</h3>
                    </div>
                    <div class="lg:col-span-3 space-y-10">
                        <div class="space-y-1">
                            <label class="label-material" for="title">Project Identity (Title)</label>
                            <input id="title" type="text" name="title" value="{{ old('title', $project->title) }}" required
                                class="input-material @error('title') border-rose-300 ring-rose-50 ring-4 @enderror"
                                placeholder="ENTER_PROJECT_TITLE">
                            @error('title') <p class="text-[10px] text-rose-600 font-black uppercase tracking-widest mt-3 flex items-center gap-2">
                                <span class="material-symbols-outlined text-xs">error</span>
                                {{ $message }}
                            </p> @enderror
                        </div>

                        <div class="space-y-1">
                            <label class="label-material" for="status">Operational Lifecycle Status</label>
                            <div class="relative group">
                                <select id="status" name="status" required 
                                    class="input-material appearance-none cursor-pointer uppercase tracking-widest font-black text-[11px] text-primary">
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
            <div class="bg-white rounded-stellar overflow-hidden border border-slate-100 shadow-sm p-12">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start">
                    <div class="lg:col-span-1">
                        <span class="text-[9px] font-black text-secondary uppercase tracking-[0.3em] block mb-3 opacity-60 italic">Section 02</span>
                        <h3 class="font-black text-on-surface tracking-tighter uppercase text-sm leading-tight italic">Public Overlay</h3>
                    </div>
                    <div class="lg:col-span-3 space-y-12">
                        <div class="flex items-center justify-between p-8 bg-slate-50 border border-slate-100 rounded-3xl">
                            <div class="flex flex-col gap-1">
                                <span class="text-xs font-black uppercase tracking-widest text-on-surface leading-none">Visibility Protocol</span>
                                <span class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-1">Personnel unit deployment to public portfolio node</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer group">
                                <input type="checkbox" name="is_public" value="1" {{ $project->is_public ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-16 h-8 bg-slate-200 rounded-full peer-checked:bg-primary transition-all shadow-inner border border-slate-200"></div>
                                <div class="absolute top-1 left-1 w-6 h-6 bg-white rounded-full shadow-md transition-all border border-slate-100 peer-checked:translate-x-8"></div>
                            </label>
                        </div>

                        <div class="space-y-4">
                            <label class="label-material px-1">Telemetry Thumbnail Asset</label>
                            <div class="flex items-start gap-12">
                                @if($project->featured_image)
                                <div class="w-48 h-32 rounded-2xl bg-slate-900 overflow-hidden border border-slate-200 flex items-center justify-center p-1 shadow-md group">
                                    <img src="{{ asset('storage/' . $project->featured_image) }}" class="object-cover w-full h-full opacity-80 group-hover:scale-110 transition-transform duration-700">
                                </div>
                                @endif
                                <div class="flex-1 space-y-5">
                                    <div class="relative group/file">
                                        <input type="file" name="featured_image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                        <div class="bg-slate-50 border border-slate-200 border-dashed rounded-2xl px-8 py-6 flex flex-col items-center justify-center gap-3 group-hover/file:border-primary group-hover/file:bg-primary/5 transition-all">
                                            <span class="material-symbols-outlined text-3xl text-slate-300 group-hover/file:text-primary group-hover/file:scale-110 transition-all">cloud_upload</span>
                                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Inject New Media Asset...</span>
                                        </div>
                                    </div>
                                    <p class="text-[9px] text-slate-400 font-bold tracking-tighter uppercase italic leading-loose px-2">RES_1200x800_MIN // ALPHA_CHANNEL_READY // MIME: IMG/WEBP</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="label-material px-1" for="showcase_description">Execution Blueprint (Description)</label>
                            <textarea id="showcase_description" name="showcase_description" rows="10" 
                                class="input-material h-56 resize-none italic leading-relaxed py-6">{{ old('showcase_description', $project->showcase_description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Execution Runtime Controls -->
            <div class="bg-white rounded-stellar overflow-hidden border border-slate-100 shadow-sm p-12 flex items-center justify-between mt-12">
                <div class="flex items-center gap-6">
                    <div class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse shadow-[0_0_12px_rgba(16,185,129,0.3)]"></div>
                    <div class="flex flex-col leading-none">
                        <h4 class="text-on-surface font-black text-sm uppercase tracking-tight italic">Node Stabilized // Ready</h4>
                        <p class="text-slate-400 text-[9px] font-black uppercase tracking-[0.2em] mt-1.5 opacity-60">Committing update protocol to central core</p>
                    </div>
                </div>
                <div class="flex items-center gap-10">
                    <a href="{{ route('admin.projects.index') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-rose-600 transition-colors">Abort Init</a>
                    <button type="submit" class="btn-stellar px-14 py-5">
                        <span class="material-symbols-outlined text-lg">terminal</span>
                        Commit Protocol
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@endsection
