@extends('layouts.backend')

@section('content')
<!-- Alpine.js Engineering Core -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<form action="{{ route('admin.pages.update', $page) }}" method="POST" x-data="pageBuilder()">
    @csrf
    @method('PUT')
    
    <!-- Experience Blueprint Header -->
    <div class="mb-12 sticky top-20 z-30 bg-background/90 backdrop-blur-xl border-b border-outline-variant/10 -mx-8 px-8 py-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.pages.index') }}" class="p-2 rounded-full hover:bg-surface-container-low transition-colors text-on-surface-variant opacity-40">
                    <span class="material-symbols-outlined text-xl">arrow_back</span>
                </a>
                <div class="h-4 w-px bg-outline-variant/20 mx-2"></div>
                <div>
                    <h1 class="text-2xl font-black tracking-tighter text-on-surface uppercase italic">Experience Blueprint Configuration</h1>
                    <p class="text-[10px] text-on-surface-variant font-mono opacity-60 uppercase tracking-widest mt-1">Refining architectural node: {{ $page->slug }}</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-3 bg-surface-container-low px-4 py-2 rounded border border-outline-variant/10 mr-4">
                    <span class="label-mono text-[9px] font-black uppercase tracking-widest opacity-40">Status:</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_published" value="1" {{ $page->is_published ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-10 h-5 bg-outline-variant/20 rounded-full peer-checked:bg-secondary transition-all"></div>
                        <div class="absolute top-1 left-1 w-3 h-3 bg-white rounded-full shadow-sm transition-all peer-checked:translate-x-5"></div>
                    </label>
                    <span class="label-mono text-[9px] font-black uppercase tracking-widest text-secondary ml-1" x-text="published ? 'DEPLOYED' : 'STAGING'"></span>
                </div>
                <button type="submit" class="bg-primary text-white px-10 py-3.5 rounded font-black text-xs tracking-tight hover:brightness-110 shadow-2xl shadow-primary/20 transition-all flex items-center gap-2">
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
            <div class="bg-white rounded overflow-hidden border border-outline-variant/10 shadow-sm p-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="space-y-2">
                        <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="title">Internal Node Title</label>
                        <input id="title" type="text" name="title" required value="{{ $page->title }}" 
                            class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-sm font-bold text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="slug">Public URL Slug</label>
                        <input id="slug" type="text" name="slug" required value="{{ $page->slug }}" 
                            class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-sm font-mono font-bold text-primary focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all">
                    </div>
                </div>
            </div>

            <!-- Block Sequence -->
            <div class="space-y-6">
                <div class="flex items-center justify-between px-2">
                    <div class="flex items-center gap-3">
                        <div class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></div>
                        <h2 class="label-mono text-xs font-black text-on-surface uppercase tracking-widest opacity-80">Block Sequence Palette</h2>
                    </div>
                    <span class="label-mono text-[9px] opacity-40 uppercase tracking-widest" x-text="`${blocks.length} Units Stabilized` text: ''"></span>
                </div>

                <div class="space-y-8 min-h-[400px] border-2 border-dashed border-outline-variant/10 rounded-node p-10 bg-surface-container-low/10" id="canvas">
                    <template x-for="(block, index) in blocks" :key="block.id">
                        <div class="bg-white rounded overflow-hidden border border-outline-variant/10 shadow-sm relative group">
                            <!-- Unit Header -->
                            <div class="px-8 py-4 bg-surface-container-low/30 flex items-center justify-between border-b border-outline-variant/5">
                                <div class="flex items-center gap-6">
                                    <div class="flex flex-col">
                                        <span class="text-[8px] font-black text-on-surface opacity-20 uppercase tracking-widest">UNIT_NODE</span>
                                        <span class="text-xs font-black text-primary tracking-tighter" x-text="String(index + 1).padStart(2, '0')"></span>
                                    </div>
                                    <div class="h-6 w-px bg-outline-variant/10"></div>
                                    <span class="label-mono text-[10px] font-black uppercase tracking-widest text-on-surface opacity-60" x-text="block.type"></span>
                                </div>
                                <div class="flex items-center gap-2 opacity-20 group-hover:opacity-100 transition-opacity">
                                    <button @click.prevent="moveUp(index)" class="p-1 hover:text-primary transition-colors"><span class="material-symbols-outlined text-base">expand_less</span></button>
                                    <button @click.prevent="moveDown(index)" class="p-1 hover:text-primary transition-colors"><span class="material-symbols-outlined text-base">expand_more</span></button>
                                    <div class="w-px h-4 bg-outline-variant/10 mx-2"></div>
                                    <button @click.prevent="removeBlock(index)" class="p-1 hover:text-error transition-colors"><span class="material-symbols-outlined text-base font-black">close</span></button>
                                </div>
                            </div>

                            <!-- Configuration Matrix -->
                            <div class="p-8">
                                <input type="hidden" :name="`content[${index}][type]`" :value="block.type">
                                
                                <!-- Render Fields strictly based on Registry Type -->
                                <template x-if="block.type === 'hero'">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-1.5"><label class="label-mono text-[8px] opacity-40 uppercase tracking-widest">Primary Title</label><input type="text" :name="`content[${index}][data][title]`" x-model="block.data.title" class="w-full bg-surface-container-low border-outline-variant/10 rounded p-3.5 text-sm font-bold w-full"></div>
                                        <div class="space-y-1.5"><label class="label-mono text-[8px] opacity-40 uppercase tracking-widest">Subtitle / Context</label><input type="text" :name="`content[${index}][data][subtitle]`" x-model="block.data.subtitle" class="w-full bg-surface-container-low border-outline-variant/10 rounded p-3.5 text-sm font-medium w-full"></div>
                                        <div class="space-y-1.5"><label class="label-mono text-[8px] opacity-40 uppercase tracking-widest">Action Label</label><input type="text" :name="`content[${index}][data][cta_text]`" x-model="block.data.cta_text" class="w-full bg-surface-container-low border-outline-variant/10 rounded p-3.5 text-xs font-black uppercase tracking-widest w-full"></div>
                                        <div class="space-y-1.5"><label class="label-mono text-[8px] opacity-40 uppercase tracking-widest">Action Resource (URL)</label><input type="text" :name="`content[${index}][data][cta_url]`" x-model="block.data.cta_url" class="w-full bg-surface-container-low border-outline-variant/10 rounded p-3.5 text-xs font-mono w-full"></div>
                                    </div>
                                </template>

                                <template x-if="block.type === 'text'">
                                    <div class="space-y-6">
                                        <div class="space-y-1.5"><label class="label-mono text-[8px] opacity-40 uppercase tracking-widest">Unit Heading</label><input type="text" :name="`content[${index}][data][title]`" x-model="block.data.title" class="w-full bg-surface-container-low border-outline-variant/10 rounded p-3.5 text-sm font-bold w-full"></div>
                                        <div class="space-y-1.5"><label class="label-mono text-[8px] opacity-40 uppercase tracking-widest">Unit Content Body</label><textarea :name="`content[${index}][data][body]`" x-model="block.data.body" rows="6" class="w-full bg-surface-container-low border-outline-variant/10 rounded p-4 text-sm font-medium w-full resize-none"></textarea></div>
                                    </div>
                                </template>

                                <template x-if="block.type === 'cta'">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-1.5"><label class="label-mono text-[8px] opacity-40 uppercase tracking-widest">CTA Directive</label><input type="text" :name="`content[${index}][data][title]`" x-model="block.data.title" class="w-full bg-primary/5 border-primary/10 rounded p-3.5 text-sm font-black text-primary w-full"></div>
                                        <div class="space-y-1.5"><label class="label-mono text-[8px] opacity-40 uppercase tracking-widest">Resource Link (URL)</label><input type="text" :name="`content[${index}][data][url]`" x-model="block.data.url" class="w-full bg-surface-container-low border-outline-variant/10 rounded p-3.5 text-xs font-mono w-full"></div>
                                    </div>
                                </template>

                                <template x-if="block.type === 'services'">
                                    <div class="space-y-4">
                                        <div class="flex items-center gap-3 p-4 bg-primary/5 rounded border border-primary/10">
                                            <span class="material-symbols-outlined text-primary">analytics</span>
                                            <span class="label-mono text-[9px] font-black text-primary uppercase tracking-widest">Capability Ledger Node Initialized (Standard Render)</span>
                                        </div>
                                        <p class="text-[9px] text-on-surface-variant opacity-40 italic">Configuration for complex grid units will be extended in future patches.</p>
                                    </div>
                                </template>

                                <template x-if="block.type === 'features'">
                                    <div class="space-y-4">
                                        <div class="flex items-center gap-3 p-4 bg-secondary/5 rounded border border-secondary/10">
                                            <span class="material-symbols-outlined text-secondary">architecture</span>
                                            <span class="label-mono text-[9px] font-black text-secondary uppercase tracking-widest">Architectural Integrity Node Initialized (Standard Render)</span>
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
            <div class="bg-white rounded overflow-hidden border border-outline-variant/10 shadow-sm p-8">
                <h3 class="label-mono text-[10px] uppercase font-black tracking-widest text-on-surface opacity-40 mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">search</span>
                    SEO Configuration Matrix
                </h3>
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="label-mono text-[8px] opacity-40 uppercase tracking-widest">Metadata Title</label>
                        <input type="text" name="meta_title" value="{{ $page->meta_title }}" class="w-full bg-surface-container-low border border-outline-variant/10 rounded px-4 py-3 text-xs font-bold text-on-surface focus:ring-1 focus:ring-primary">
                    </div>
                    <div class="space-y-2">
                        <label class="label-mono text-[8px] opacity-40 uppercase tracking-widest">Metadata Context (Desc)</label>
                        <textarea name="meta_description" rows="4" class="w-full bg-surface-container-low border border-outline-variant/10 rounded px-4 py-3 text-xs font-medium text-on-surface resize-none focus:ring-1 focus:ring-primary">{{ $page->meta_description }}</textarea>
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
