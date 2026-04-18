@extends('layouts.backend')

@section('content')
<!-- Alpine.js Engineering Core -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<form action="{{ route('admin.pages.update', $page) }}" method="POST" x-data="pageBuilder()">
    @csrf
    @method('PUT')
    
    <!-- Experience Blueprint Header -->
    <div class="mb-12 sticky top-20 z-30 bg-node-dark/80 backdrop-blur-xl border-b border-white/5 -mx-8 px-8 py-6 shadow-2xl">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.pages.index') }}" class="p-2 rounded-full hover:bg-white/5 transition-colors text-slate-500 opacity-60">
                    <span class="material-symbols-outlined text-xl">arrow_back</span>
                </a>
                <div class="h-4 w-px bg-white/10 mx-2"></div>
                <div>
                    <h1 class="text-2xl font-black tracking-tighter text-white uppercase italic">Experience <span class="text-primary">Blueprint</span> Configuration</h1>
                    <p class="text-[10px] text-slate-500 font-mono opacity-60 uppercase tracking-widest mt-2 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_8px_rgba(0,118,255,0.6)] animate-pulse"></span>
                        Refining architectural node: {{ $page->slug }}
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-3 bg-white/5 px-6 py-2.5 rounded-xl border border-white/5 mr-4 shadow-inner">
                    <span class="text-[9px] font-black uppercase tracking-widest opacity-40 text-slate-500">Status:</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_published" value="1" {{ $page->is_published ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-10 h-5 bg-white/10 rounded-full peer-checked:bg-primary transition-all"></div>
                        <div class="absolute top-1 left-1 w-3 h-3 bg-white rounded-full shadow-sm transition-all peer-checked:translate-x-5"></div>
                    </label>
                    <span class="text-[9px] font-black uppercase tracking-[0.2em] text-primary ml-1" x-text="published ? 'DEPLOYED' : 'STAGING'"></span>
                </div>
                <button type="submit" class="bg-primary text-white px-10 py-3.5 rounded-xl font-black text-xs tracking-tight hover:brightness-110 shadow-2xl shadow-primary/20 transition-all flex items-center gap-3">
                    <span class="material-symbols-outlined text-sm">terminal</span>
                    Commit Blueprint
                </button>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
        <!-- Main Configuration Canvas -->
        <div class="lg:col-span-3 space-y-12">
            <!-- Node Metadata -->
            <div class="bg-node-dark/40 backdrop-blur-sm rounded-node overflow-hidden border border-white/5 shadow-2xl p-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="space-y-3">
                        <label class="text-[10px] text-slate-500 font-black uppercase tracking-widest" for="title">Internal Node Title</label>
                        <input id="title" type="text" name="title" required value="{{ $page->title }}" 
                            class="w-full bg-white/5 border border-white/5 rounded-xl px-5 py-4 text-sm font-bold text-white focus:ring-4 focus:ring-primary/10 focus:border-primary/40 focus:bg-white/10 transition-all shadow-inner">
                    </div>
                    <div class="space-y-3">
                        <label class="text-[10px] text-slate-500 font-black uppercase tracking-widest" for="slug">Public URL Slug</label>
                        <input id="slug" type="text" name="slug" required value="{{ $page->slug }}" 
                            class="w-full bg-white/5 border border-white/5 rounded-xl px-5 py-4 text-sm font-mono font-bold text-primary focus:ring-4 focus:ring-primary/10 focus:border-primary/40 focus:bg-white/10 transition-all shadow-inner">
                    </div>
                </div>
            </div>

            <!-- Block Sequence -->
            <div class="space-y-6">
                <div class="flex items-center justify-between px-2">
                    <div class="flex items-center gap-3">
                        <div class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_8px_rgba(0,118,255,0.6)] animate-pulse"></div>
                        <h2 class="text-xs font-black text-slate-500 uppercase tracking-widest italic pl-2">Block Sequence Palette</h2>
                    </div>
                    <span class="text-[9px] opacity-40 uppercase tracking-widest text-slate-700 font-black" x-text="`${blocks.length} Units Stabilized` text: ''"></span>
                </div>

                <div class="space-y-8 min-h-[400px] border-2 border-dashed border-white/5 rounded-node p-10 bg-white/[0.02]" id="canvas">
                    <template x-for="(block, index) in blocks" :key="block.id">
                        <div class="bg-node-dark/60 rounded-xl overflow-hidden border border-white/5 shadow-2xl relative group mb-8">
                            <!-- Unit Header -->
                            <div class="px-8 py-5 bg-white/5 flex items-center justify-between border-b border-white/5">
                                <div class="flex items-center gap-6">
                                    <div class="flex flex-col">
                                        <span class="text-[8px] font-black text-slate-500 opacity-40 uppercase tracking-widest">UNIT_NODE</span>
                                        <span class="text-xs font-black text-primary tracking-tighter" x-text="String(index + 1).padStart(2, '0')"></span>
                                    </div>
                                    <div class="h-6 w-px bg-white/10"></div>
                                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-white italic" x-text="block.type"></span>
                                </div>
                                <div class="flex items-center gap-4 opacity-40 group-hover:opacity-100 transition-opacity">
                                    <button @click.prevent="moveUp(index)" class="p-1 hover:text-primary transition-colors"><span class="material-symbols-outlined text-base">expand_less</span></button>
                                    <button @click.prevent="moveDown(index)" class="p-1 hover:text-primary transition-colors"><span class="material-symbols-outlined text-base">expand_more</span></button>
                                    <div class="w-px h-4 bg-white/10 mx-2"></div>
                                    <button @click.prevent="removeBlock(index)" class="p-1 hover:text-rose-500 transition-colors"><span class="material-symbols-outlined text-base font-black">close</span></button>
                                </div>
                            </div>

                            <!-- Configuration Matrix -->
                            <div class="p-8">
                                <input type="hidden" :name="`content[${index}][type]`" :value="block.type">
                                
                                <!-- Render Fields strictly based on Registry Type -->
                                <template x-if="block.type === 'hero'">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-2"><label class="text-[8px] text-slate-500 font-black uppercase tracking-[0.2em]">Primary Title</label><input type="text" :name="`content[${index}][data][title]`" x-model="block.data.title" class="w-full bg-white/5 border border-white/5 rounded-xl p-4 text-sm font-black text-white focus:bg-white/10 transition-all shadow-inner"></div>
                                        <div class="space-y-2"><label class="text-[8px] text-slate-500 font-black uppercase tracking-[0.2em]">Subtitle / Context</label><input type="text" :name="`content[${index}][data][subtitle]`" x-model="block.data.subtitle" class="w-full bg-white/5 border border-white/5 rounded-xl p-4 text-sm font-medium text-slate-300"></div>
                                        <div class="space-y-2"><label class="text-[8px] text-slate-500 font-black uppercase tracking-[0.2em]">Action Label</label><input type="text" :name="`content[${index}][data][cta_text]`" x-model="block.data.cta_text" class="w-full bg-white/5 border border-white/5 rounded-xl p-4 text-[10px] font-black uppercase tracking-widest text-primary italic"></div>
                                        <div class="space-y-2"><label class="text-[8px] text-slate-500 font-black uppercase tracking-[0.2em]">Action Resource (URL)</label><input type="text" :name="`content[${index}][data][cta_url]`" x-model="block.data.cta_url" class="w-full bg-white/5 border border-white/5 rounded-xl p-4 text-xs font-mono text-slate-400"></div>
                                    </div>
                                </template>

                                <template x-if="block.type === 'text'">
                                    <div class="space-y-6">
                                        <div class="space-y-2"><label class="text-[8px] text-slate-500 font-black uppercase tracking-[0.2em]">Unit Heading</label><input type="text" :name="`content[${index}][data][title]`" x-model="block.data.title" class="w-full bg-white/5 border border-white/5 rounded-xl p-4 text-sm font-black text-white"></div>
                                        <div class="space-y-2"><label class="text-[8px] text-slate-500 font-black uppercase tracking-[0.2em]">Unit Content Body</label><textarea :name="`content[${index}][data][body]`" x-model="block.data.body" rows="6" class="w-full bg-white/5 border border-white/5 rounded-xl p-4 text-sm font-bold text-slate-300 italic resize-none shadow-inner"></textarea></div>
                                    </div>
                                </template>

                                <template x-if="block.type === 'cta'">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-2"><label class="text-[8px] text-slate-500 font-black uppercase tracking-[0.2em]">CTA Directive</label><input type="text" :name="`content[${index}][data][title]`" x-model="block.data.title" class="w-full bg-primary/10 border border-primary/20 rounded-xl p-4 text-sm font-black text-primary italic"></div>
                                        <div class="space-y-2"><label class="text-[8px] text-slate-500 font-black uppercase tracking-[0.2em]">Resource Link (URL)</label><input type="text" :name="`content[${index}][data][url]`" x-model="block.data.url" class="w-full bg-white/5 border border-white/5 rounded-xl p-4 text-xs font-mono text-slate-400"></div>
                                    </div>
                                </template>

                                <template x-if="block.type === 'services'">
                                    <div class="space-y-4">
                                        <div class="flex items-center gap-3 p-6 bg-primary/10 rounded-xl border border-primary/20 shadow-2xl">
                                            <span class="material-symbols-outlined text-primary text-2xl">analytics</span>
                                            <span class="text-[10px] font-black text-primary uppercase tracking-[0.25em] italic pl-2">Capability Ledger Node Initialized (Standard Render)</span>
                                        </div>
                                        <p class="text-[10px] text-slate-600 font-bold italic pl-2">Configuration for complex grid units will be extended in future patches.</p>
                                    </div>
                                </template>

                                <template x-if="block.type === 'features'">
                                    <div class="space-y-4">
                                        <div class="flex items-center gap-3 p-6 bg-secondary/10 rounded-xl border border-secondary/20 shadow-2xl">
                                            <span class="material-symbols-outlined text-secondary text-2xl">architecture</span>
                                            <span class="text-[10px] font-black text-secondary uppercase tracking-[0.25em] italic pl-2">Architectural Integrity Node Initialized (Standard Render)</span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Sidebar Architectural Tools -->
        <div class="lg:col-span-1 space-y-8">
            <div class="bg-node-dark rounded-node p-8 border border-white/5 shadow-2xl sticky top-40">
                <h3 class="label-mono text-[9px] font-black uppercase tracking-widest text-white/40 mb-8 pb-4 border-b border-white/5">Component Registry</h3>
                <div class="space-y-4">
                    <button @click.prevent="addBlock('hero')" class="w-full flex items-center justify-between p-4 bg-white/5 hover:bg-primary rounded transition-all group text-white">
                        <span class="text-[9px] font-black uppercase tracking-widest opacity-80 group-hover:opacity-100 italic">Velocity Hero</span>
                        <span class="material-symbols-outlined text-sm opacity-20 group-hover:scale-110 group-hover:opacity-100 transition-all">star</span>
                    </button>
                    <button @click.prevent="addBlock('text')" class="w-full flex items-center justify-between p-4 bg-white/5 hover:bg-primary rounded transition-all group text-white">
                        <span class="text-[9px] font-black uppercase tracking-widest opacity-80 group-hover:opacity-100 italic">Surgical Text</span>
                        <span class="material-symbols-outlined text-sm opacity-20 group-hover:scale-110 group-hover:opacity-100 transition-all">article</span>
                    </button>
                    <button @click.prevent="addBlock('cta')" class="w-full flex items-center justify-between p-4 bg-white/5 hover:bg-primary rounded transition-all group text-white">
                        <span class="text-[9px] font-black uppercase tracking-widest opacity-80 group-hover:opacity-100 italic">Critical CTA</span>
                        <span class="material-symbols-outlined text-sm opacity-20 group-hover:scale-110 group-hover:opacity-100 transition-all">ads_click</span>
                    </button>
                    <div class="h-px bg-white/10 my-4"></div>
                    <button @click.prevent="addBlock('services')" class="w-full flex items-center justify-between p-4 bg-white/5 hover:bg-secondary rounded transition-all group text-white">
                        <span class="text-[9px] font-black uppercase tracking-widest opacity-80 group-hover:opacity-100 italic">Capability Ledger</span>
                        <span class="material-symbols-outlined text-sm opacity-20 group-hover:scale-110 group-hover:opacity-100 transition-all">analytics</span>
                    </button>
                    <button @click.prevent="addBlock('features')" class="w-full flex items-center justify-between p-4 bg-white/5 hover:bg-secondary rounded transition-all group text-white">
                        <span class="text-[9px] font-black uppercase tracking-widest opacity-80 group-hover:opacity-100 italic">Arch Integrity</span>
                        <span class="material-symbols-outlined text-sm opacity-20 group-hover:scale-110 group-hover:opacity-100 transition-all">architecture</span>
                    </button>
                </div>
            </div>

            <!-- SEO Configuration Matrix -->
            <div class="bg-node-dark/40 backdrop-blur-sm rounded-node overflow-hidden border border-white/5 shadow-2xl p-8">
                <h3 class="text-[10px] uppercase font-black tracking-[0.3em] text-white opacity-60 mb-8 flex items-center gap-3 italic">
                    <span class="material-symbols-outlined text-xl text-primary">search</span>
                    SEO Configuration Matrix
                </h3>
                <div class="space-y-8">
                    <div class="space-y-3">
                        <label class="text-[8px] text-slate-500 font-black uppercase tracking-widest">Metadata Title</label>
                        <input type="text" name="meta_title" value="{{ $page->meta_title }}" class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-4 text-xs font-black text-white focus:ring-1 focus:ring-primary shadow-inner">
                    </div>
                    <div class="space-y-3">
                        <label class="text-[8px] text-slate-500 font-black uppercase tracking-widest">Metadata Context (Desc)</label>
                        <textarea name="meta_description" rows="5" class="w-full bg-white/5 border border-white/5 rounded-xl px-4 py-4 text-xs font-bold text-slate-300 resize-none focus:ring-1 focus:ring-primary shadow-inner mb-4 italic"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function pageBuilder() {
        return {
            blocks: {!! json_encode($page->content ?? []) !!},
            published: {{ $page->is_published ? 'true' : 'false' }},
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
