@extends('layouts.backend')

@section('content')

<form action="{{ route('admin.pages.update', $page) }}" method="POST" x-data="pageBuilder()">
    @csrf
    @method('PUT')
    
    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.pages.index') }}" class="w-9 h-9 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-400 hover:text-primary transition-all">
                <span class="material-symbols-outlined text-lg">arrow_back</span>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Edit Page</h1>
                <p class="text-sm text-slate-500 mt-0.5">/{{ $page->slug }}</p>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-3 bg-white px-4 py-2 rounded-xl border border-slate-200">
                <span class="text-xs font-medium text-slate-500">Published</span>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" {{ $page->is_published ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-10 h-5 bg-slate-200 rounded-full peer-checked:bg-primary transition-all"></div>
                    <div class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow-sm transition-all peer-checked:translate-x-5"></div>
                </label>
            </div>
            <button type="submit" class="inline-flex items-center gap-2 bg-primary text-white text-sm font-semibold px-6 py-2.5 rounded-xl hover:bg-primary-dark transition-colors">
                <span class="material-symbols-outlined text-lg">save</span>
                Save Changes
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-3 space-y-8">
            <!-- Page Info -->
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5" for="title">Page Title *</label>
                        <input id="title" type="text" name="title" required value="{{ $page->title }}" 
                            class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5" for="slug">URL Slug *</label>
                        <input id="slug" type="text" name="slug" required value="{{ $page->slug }}" 
                            class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-600 font-mono focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                </div>
            </div>

            <!-- Content Blocks -->
            <div class="space-y-4">
                <div class="flex items-center justify-between px-2">
                    <h2 class="text-sm font-bold text-slate-900">Content Blocks</h2>
                    <span class="text-xs font-medium text-slate-400 bg-slate-100 px-2.5 py-1 rounded-full" x-text="`${blocks.length} sections`"></span>
                </div>

                <div class="space-y-6 min-h-[200px] border-2 border-dashed border-slate-200 rounded-2xl p-6 bg-slate-50/30" id="canvas">
                    <template x-for="(block, index) in blocks" :key="block.id">
                        <div class="bg-white rounded-xl overflow-hidden border border-slate-200 shadow-sm">
                            <!-- Block Header -->
                            <div class="px-5 py-3 bg-slate-50 flex items-center justify-between border-b border-slate-100">
                                <div class="flex items-center gap-3">
                                    <span class="text-xs font-medium text-slate-400" x-text="'#' + String(index + 1).padStart(2, '0')"></span>
                                    <span class="text-xs font-bold text-primary uppercase" x-text="block.type"></span>
                                </div>
                                <div class="flex items-center gap-1 opacity-40 group-hover:opacity-100 transition-opacity">
                                    <button @click.prevent="moveUp(index)" class="w-7 h-7 flex items-center justify-center rounded text-slate-400 hover:text-slate-900 hover:bg-slate-100 transition-all">
                                        <span class="material-symbols-outlined text-sm">expand_less</span>
                                    </button>
                                    <button @click.prevent="moveDown(index)" class="w-7 h-7 flex items-center justify-center rounded text-slate-400 hover:text-slate-900 hover:bg-slate-100 transition-all">
                                        <span class="material-symbols-outlined text-sm">expand_more</span>
                                    </button>
                                    <div class="w-px h-4 bg-slate-200 mx-1"></div>
                                    <button @click.prevent="removeBlock(index)" class="w-7 h-7 flex items-center justify-center rounded text-red-400 hover:text-red-600 hover:bg-red-50 transition-all">
                                        <span class="material-symbols-outlined text-sm">close</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Block Content -->
                            <div class="p-6">
                                <input type="hidden" :name="`content[${index}][type]`" :value="block.type">
                                
                                <template x-if="block.type === 'hero'">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                        <div>
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Heading</label>
                                            <input type="text" :name="`content[${index}][data][title]`" x-model="block.data.title" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Subtitle</label>
                                            <input type="text" :name="`content[${index}][data][subtitle]`" x-model="block.data.subtitle" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Button Text</label>
                                            <input type="text" :name="`content[${index}][data][cta_text]`" x-model="block.data.cta_text" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Button URL</label>
                                            <input type="text" :name="`content[${index}][data][cta_url]`" x-model="block.data.cta_url" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-mono focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        </div>
                                    </div>
                                </template>

                                <template x-if="block.type === 'text'">
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Section Title</label>
                                            <input type="text" :name="`content[${index}][data][title]`" x-model="block.data.title" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Content</label>
                                            <textarea :name="`content[${index}][data][body]`" x-model="block.data.body" rows="5" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"></textarea>
                                        </div>
                                    </div>
                                </template>

                                <template x-if="block.type === 'cta'">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                        <div>
                                            <label class="block text-xs font-medium text-slate-500 mb-1">CTA Text</label>
                                            <input type="text" :name="`content[${index}][data][title]`" x-model="block.data.title" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Link URL</label>
                                            <input type="text" :name="`content[${index}][data][url]`" x-model="block.data.url" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-mono focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        </div>
                                    </div>
                                </template>

                                <template x-if="block.type === 'services'">
                                    <div class="flex items-center gap-3 p-5 bg-blue-50 rounded-xl border border-blue-100">
                                        <span class="material-symbols-outlined text-blue-500">analytics</span>
                                        <span class="text-sm font-medium text-blue-700">Services section — displays automatically from your service catalog</span>
                                    </div>
                                </template>

                                <template x-if="block.type === 'features'">
                                    <div class="flex items-center gap-3 p-5 bg-violet-50 rounded-xl border border-violet-100">
                                        <span class="material-symbols-outlined text-violet-500">grid_view</span>
                                        <span class="text-sm font-medium text-violet-700">Features grid — displays automatically</span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 sticky top-24">
                <div class="p-5 border-b border-slate-100">
                    <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Add Blocks</h3>
                </div>
                <div class="p-4 space-y-2">
                    <button @click.prevent="addBlock('hero')" class="w-full flex items-center gap-3 p-3 bg-slate-50 border border-slate-100 rounded-xl transition-all hover:bg-primary/5 hover:border-primary/20 group">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">star</span>
                        <span class="text-sm font-medium text-slate-600 group-hover:text-slate-900 transition-colors">Hero Section</span>
                    </button>
                    <button @click.prevent="addBlock('text')" class="w-full flex items-center gap-3 p-3 bg-slate-50 border border-slate-100 rounded-xl transition-all hover:bg-primary/5 hover:border-primary/20 group">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">article</span>
                        <span class="text-sm font-medium text-slate-600 group-hover:text-slate-900 transition-colors">Text Block</span>
                    </button>
                    <button @click.prevent="addBlock('cta')" class="w-full flex items-center gap-3 p-3 bg-slate-50 border border-slate-100 rounded-xl transition-all hover:bg-primary/5 hover:border-primary/20 group">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">ads_click</span>
                        <span class="text-sm font-medium text-slate-600 group-hover:text-slate-900 transition-colors">Call to Action</span>
                    </button>
                    <div class="h-px bg-slate-100 my-2"></div>
                    <button @click.prevent="addBlock('services')" class="w-full flex items-center gap-3 p-3 bg-slate-50 border border-slate-100 rounded-xl transition-all hover:bg-primary/5 hover:border-primary/20 group">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">analytics</span>
                        <span class="text-sm font-medium text-slate-600 group-hover:text-slate-900 transition-colors">Services List</span>
                    </button>
                    <button @click.prevent="addBlock('features')" class="w-full flex items-center gap-3 p-3 bg-slate-50 border border-slate-100 rounded-xl transition-all hover:bg-primary/5 hover:border-primary/20 group">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">grid_view</span>
                        <span class="text-sm font-medium text-slate-600 group-hover:text-slate-900 transition-colors">Features Grid</span>
                    </button>
                </div>
            </div>

            <!-- SEO Settings -->
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 p-6 space-y-4">
                <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-wider flex items-center gap-2 pb-3 border-b border-slate-50">
                    <span class="material-symbols-outlined text-sm">search</span>
                    SEO Settings
                </h3>
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $page->meta_title }}" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none">{{ $page->meta_description }}</textarea>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function pageBuilder() {
        return {
            blocks: {!! json_encode($page->content ?? []) !!},
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
