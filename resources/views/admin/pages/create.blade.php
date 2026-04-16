@extends('layouts.backend')

@section('content')
<!-- Experience Blueprint Initialization Header -->
<div class="mb-12">
    <div class="flex items-center justify-between mb-4">
        <div>
            <h1 class="text-2xl font-black tracking-tighter text-on-surface uppercase italic">Experience Blueprint Initialization</h1>
            <p class="text-[10px] text-on-surface-variant font-mono opacity-60 uppercase tracking-widest mt-1">Initializing modular content sequence // CORE_RENDER_NODE</p>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex flex-col items-end">
                <span class="label-mono text-[8px] opacity-40 uppercase tracking-widest leading-none">Sync Status</span>
                <span class="text-[10px] font-black text-secondary uppercase tracking-tight mt-1 animate-pulse">AWAITING_COMMITTAL</span>
            </div>
        </div>
    </div>
</div>

<!-- Add Alpine.js for the dynamic builder logic -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<form action="{{ route('admin.pages.store') }}" method="POST" x-data="pageBuilder()" class="pb-20">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
        <!-- Main Assembly Canvas -->
        <div class="lg:col-span-3 space-y-12">
            <!-- Architectural Root Metadata -->
            <div class="bg-white rounded overflow-hidden border border-outline-variant/10 shadow-sm p-10 relative group/card">
                <div class="absolute top-0 right-0 p-10 opacity-[0.02] pointer-events-none">
                    <span class="material-symbols-outlined text-[100px]">architecture</span>
                </div>
                
                <div class="flex items-center gap-3 mb-8 pb-4 border-b border-outline-variant/5">
                    <h2 class="label-mono text-[9px] font-black text-on-surface uppercase tracking-widest opacity-40">Root Configuration</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="space-y-2">
                        <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest">Internal Module Identifier</label>
                        <input type="text" name="title" required value="{{ old('title') }}" 
                            class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-sm font-bold text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all shadow-inner"
                            placeholder="e.g. SERVICES_STRATEGY_NODE">
                    </div>
                    <div class="space-y-2">
                        <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest">Virtual URI Path (Slug)</label>
                        <input type="text" name="slug" value="{{ old('slug') }}" 
                            class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-xs font-mono font-bold text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all opacity-70 italic shadow-inner"
                            placeholder="AUTO_GENERATE_ON_SAVE">
                    </div>
                </div>
            </div>

            <!-- Content Assembly Line -->
            <div class="space-y-6">
                <div class="flex items-center justify-between px-2">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded bg-node-dark flex items-center justify-center text-primary shadow-lg border border-white/5">
                            <span class="material-symbols-outlined text-xl">view_quilt</span>
                        </div>
                        <h2 class="text-xl font-black text-on-surface tracking-tighter uppercase italic">
                            Module Assembly Line
                        </h2>
                    </div>
                    <div class="flex items-center gap-6">
                        <div class="flex flex-col items-end">
                            <span class="label-mono text-[8px] opacity-40 uppercase tracking-widest">Active Sequence</span>
                            <span class="text-xs font-mono font-black pt-1" x-text="`${blocks.length}`">0</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-8 min-h-[300px] border-2 border-dashed border-outline-variant/10 rounded-node p-8 bg-surface-container-lowest/30 transition-all" id="canvas">
                    <template x-for="(block, index) in blocks" :key="block.id">
                        <div class="bg-white rounded overflow-hidden border border-outline-variant/10 shadow-lg relative group/block animate-in fade-in slide-in-from-bottom-4 duration-500">
                            <!-- Technical Header -->
                            <div class="px-6 py-4 bg-node-dark flex items-center justify-between border-b border-white/5">
                                <div class="flex items-center gap-4">
                                    <div class="px-2 py-1 bg-white/5 border border-white/10 rounded label-mono text-[9px] text-white/40 tracking-widest uppercase">
                                        SEQ_0<span x-text="index + 1"></span>
                                    </div>
                                    <div class="h-4 w-px bg-white/10"></div>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-primary italic" x-text="block.type"></span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <button @click.prevent="moveUp(index)" class="p-2 text-white/30 hover:text-white hover:bg-white/5 rounded transition-all">
                                        <span class="material-symbols-outlined text-sm">arrow_upward</span>
                                    </button>
                                    <button @click.prevent="moveDown(index)" class="p-2 text-white/30 hover:text-white hover:bg-white/5 rounded transition-all">
                                        <span class="material-symbols-outlined text-sm">arrow_downward</span>
                                    </button>
                                    <div class="h-4 w-px bg-white/10 mx-1"></div>
                                    <button @click.prevent="removeBlock(index)" class="p-2 text-red-400 opacity-40 hover:opacity-100 hover:bg-red-400/10 rounded transition-all">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Operational Core -->
                            <div class="p-8 bg-surface-container-lowest/50">
                                <input type="hidden" :name="`content[${index}][type]`" :value="block.type">
                                
                                <template x-if="block.type === 'hero'">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-2">
                                            <span class="label-mono text-[8px] opacity-40 uppercase">Module_Title</span>
                                            <input type="text" :name="`content[${index}][data][title]`" placeholder="Primary Heading Override" class="w-full bg-white border border-outline-variant/10 rounded px-4 py-3 text-sm font-bold text-on-surface focus:ring-4 focus:ring-primary/5 transition-all outline-none">
                                        </div>
                                        <div class="space-y-2">
                                            <span class="label-mono text-[8px] opacity-40 uppercase">Module_Subtitle</span>
                                            <input type="text" :name="`content[${index}][data][subtitle]`" placeholder="Supporting Descriptor" class="w-full bg-white border border-outline-variant/10 rounded px-4 py-3 text-sm font-medium text-on-surface-variant focus:ring-4 focus:ring-primary/5 transition-all outline-none italic">
                                        </div>
                                        <div class="space-y-2">
                                            <span class="label-mono text-[8px] opacity-40 uppercase">Action_Label</span>
                                            <input type="text" :name="`content[${index}][data][cta_text]`" placeholder="Protocol Trigger (Button Text)" class="w-full bg-white border border-outline-variant/10 rounded px-4 py-3 text-sm font-black uppercase tracking-widest text-on-surface-variant focus:ring-4 focus:ring-primary/5 transition-all outline-none">
                                        </div>
                                        <div class="space-y-2">
                                            <span class="label-mono text-[8px] opacity-40 uppercase">Target_URI</span>
                                            <input type="text" :name="`content[${index}][data][cta_url]`" placeholder="/path/to/destination" class="w-full bg-white border border-outline-variant/10 rounded px-4 py-3 text-xs font-mono text-primary focus:ring-4 focus:ring-primary/5 transition-all outline-none">
                                        </div>
                                    </div>
                                </template>

                                <template x-if="block.type === 'text'">
                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                                        <div class="md:col-span-1 space-y-2">
                                            <span class="label-mono text-[8px] opacity-40 uppercase">Heading_Node</span>
                                            <input type="text" :name="`content[${index}][data][title]`" placeholder="MOD_TITLE" class="bg-surface-container-low border border-outline-variant/10 rounded px-4 py-3 text-xs font-black uppercase tracking-widest w-full outline-none focus:ring-2 focus:ring-primary/20">
                                        </div>
                                        <div class="md:col-span-3 space-y-2">
                                            <span class="label-mono text-[8px] opacity-40 uppercase">Narrative_Logic (Markdown)</span>
                                            <textarea :name="`content[${index}][data][body]`" placeholder="Injecting rich narrative data..." rows="6" class="w-full bg-white border border-outline-variant/10 rounded px-5 py-4 text-sm font-medium leading-relaxed italic focus:ring-4 focus:ring-primary/5 transition-all outline-none"></textarea>
                                        </div>
                                    </div>
                                </template>

                                <template x-if="block.type === 'cta'">
                                    <div class="bg-primary/5 border border-primary/20 rounded p-8">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                            <div class="col-span-1 md:col-span-2 space-y-2">
                                                <span class="label-mono text-[8px] text-primary opacity-60 uppercase">Call_Action_Logic</span>
                                                <input type="text" :name="`content[${index}][data][title]`" placeholder="Establish urgency phrase here..." class="w-full bg-white border border-primary/10 rounded px-5 py-4 text-sm font-black text-primary uppercase tracking-tighter shadow-sm outline-none">
                                            </div>
                                            <div class="space-y-2">
                                                <span class="label-mono text-[8px] text-primary opacity-60 uppercase">Protocol_URI</span>
                                                <input type="text" :name="`content[${index}][data][url]`" placeholder="/target-node" class="w-full bg-white border border-primary/10 rounded px-5 py-4 text-xs font-mono text-primary outline-none">
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>

                    <!-- Empty State -->
                    <div x-show="blocks.length === 0" class="flex flex-col items-center justify-center py-32 opacity-20 group hover:opacity-40 transition-opacity">
                        <div class="w-20 h-20 rounded bg-on-surface/5 flex items-center justify-center mb-6 border border-on-surface/10 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-5xl">architecture</span>
                        </div>
                        <p class="label-mono text-[10px] uppercase tracking-[0.3em] font-black">Null_Sequence_Detected</p>
                        <p class="text-[10px] opacity-60 mt-2 font-mono italic">Awaiting module injection from Component Registry</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Capability Console (Sidebar) -->
        <div class="lg:col-span-1 space-y-8">
            <div class="bg-node-dark rounded-node overflow-hidden border border-white/5 shadow-2xl sticky top-24">
                <div class="p-6 border-b border-white/5">
                    <h3 class="label-mono text-[9px] font-black text-white/40 uppercase tracking-widest">Component Registry</h3>
                </div>
                <div class="p-6 space-y-4">
                    <button @click.prevent="addBlock('hero')" class="w-full flex items-center justify-between p-4 bg-white/5 border border-white/10 rounded transition-all hover:bg-primary/20 hover:border-primary/40 group">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-white/40 group-hover:text-primary transition-colors text-lg">star</span>
                            <span class="text-[10px] font-black uppercase tracking-widest text-white/60 group-hover:text-white transition-colors pt-0.5">Hero_Node</span>
                        </div>
                        <span class="label-mono text-[8px] opacity-20 group-hover:opacity-100">MOD_01</span>
                    </button>
                    <button @click.prevent="addBlock('text')" class="w-full flex items-center justify-between p-4 bg-white/5 border border-white/10 rounded transition-all hover:bg-primary/20 hover:border-primary/40 group">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-white/40 group-hover:text-primary transition-colors text-lg">article</span>
                            <span class="text-[10px] font-black uppercase tracking-widest text-white/60 group-hover:text-white transition-colors pt-0.5">Rich_Data</span>
                        </div>
                        <span class="label-mono text-[8px] opacity-20 group-hover:opacity-100">MOD_02</span>
                    </button>
                    <button @click.prevent="addBlock('cta')" class="w-full flex items-center justify-between p-4 bg-white/5 border border-white/10 rounded transition-all hover:bg-primary/20 hover:border-primary/40 group">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-white/40 group-hover:text-primary transition-colors text-lg">ads_click</span>
                            <span class="text-[10px] font-black uppercase tracking-widest text-white/60 group-hover:text-white transition-colors pt-0.5">Action_Unit</span>
                        </div>
                        <span class="label-mono text-[8px] opacity-20 group-hover:opacity-100">MOD_03</span>
                    </button>
                    <button @click.prevent="addBlock('features')" class="w-full flex items-center justify-between p-4 bg-white/5 border border-white/10 rounded transition-all hover:bg-primary/20 hover:border-primary/40 group">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-white/40 group-hover:text-primary transition-colors text-lg">grid_view</span>
                            <span class="text-[10px] font-black uppercase tracking-widest text-white/60 group-hover:text-white transition-colors pt-0.5">Feature_Matrix</span>
                        </div>
                        <span class="label-mono text-[8px] opacity-20 group-hover:opacity-100">MOD_04</span>
                    </button>
                </div>

                <div class="p-6 bg-black/20 border-t border-white/5 space-y-6">
                    <div class="flex items-center justify-between">
                        <span class="label-mono text-[9px] font-black text-white/40 uppercase tracking-widest">Visibility Protocol</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_published" value="1" checked class="sr-only peer">
                            <div class="w-10 h-5 bg-white/10 rounded peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white/40 after:rounded after:h-4 after:w-4 after:transition-all peer-checked:bg-secondary"></div>
                        </label>
                    </div>

                    <div class="h-px bg-white/5"></div>

                    <button type="submit" class="w-full bg-primary text-white p-4 rounded font-black text-[11px] uppercase tracking-widest shadow-2xl shadow-primary/40 hover:-translate-y-1 hover:brightness-110 active:translate-y-0.5 transition-all flex items-center justify-center gap-3">
                        <span class="material-symbols-outlined text-sm pt-0.5">terminal</span>
                        Commit Initialize
                    </button>
                    <a href="{{ route('admin.pages.index') }}" class="block text-center label-mono text-[8px] text-white/30 uppercase tracking-[0.2em] hover:text-white transition-colors">Discard_Draft</a>
                </div>
            </div>

            <!-- Global Optimization Console -->
            <div class="bg-white rounded overflow-hidden border border-outline-variant/10 shadow-sm p-8 space-y-6">
                <h3 class="label-mono text-[10px] font-black text-on-surface uppercase tracking-widest opacity-40 flex items-center gap-3 pb-4 border-b border-outline-variant/5">
                    <span class="material-symbols-outlined text-sm">search</span>
                    Optimization Console
                </h3>
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="label-mono text-[8px] opacity-40 uppercase">Metadata_Heading</label>
                        <input type="text" name="meta_title" class="w-full bg-surface-container-low border border-outline-variant/10 rounded px-4 py-3 text-xs font-bold focus:ring-2 focus:ring-primary/20 outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="label-mono text-[8px] opacity-40 uppercase">Metadata_Descriptor</label>
                        <textarea name="meta_description" rows="4" class="w-full bg-surface-container-low border border-outline-variant/10 rounded px-4 py-3 text-xs font-medium focus:ring-2 focus:ring-primary/20 outline-none italic resize-none"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function pageBuilder() {
        return {
            blocks: [],
            addBlock(type) {
                this.blocks.push({
                    id: Date.now(),
                    type: type,
                    data: {}
                });
            },
            removeBlock(index) {
                this.blocks.splice(index, 1);
            },
            moveUp(index) {
                if (index > 0) {
                    const block = this.blocks.splice(index, 1)[0];
                    this.blocks.splice(index - 1, 0, block);
                }
            },
            moveDown(index) {
                if (index < this.blocks.length - 1) {
                    const block = this.blocks.splice(index, 1)[0];
                    this.blocks.splice(index + 1, 0, block);
                }
            }
        }
    }
</script>
@endsection
