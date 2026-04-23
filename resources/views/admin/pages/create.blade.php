@extends('layouts.backend')

@section('content')

<div class="mb-8">
    <div class="flex items-center gap-4 mb-4">
        <a href="{{ route('admin.pages.index') }}" class="w-9 h-9 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-400 hover:text-primary transition-all">
            <span class="material-symbols-outlined text-lg">arrow_back</span>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900">New Page</h1>
            <p class="text-sm text-slate-500 mt-0.5">Build a new page with content blocks</p>
        </div>
    </div>
</div>

<form action="{{ route('admin.pages.store') }}" method="POST" x-data="pageBuilder()" class="pb-20">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-3 space-y-8">
            <!-- Page Info -->
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 p-8">
                <h2 class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-6 pb-4 border-b border-slate-50">Page Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Page Title *</label>
                        <input type="text" name="title" required value="{{ old('title') }}" 
                            class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            placeholder="e.g. About Us">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">URL Slug</label>
                        <input type="text" name="slug" value="{{ old('slug') }}" 
                            class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-600 font-mono focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            placeholder="Auto-generated from title">
                    </div>
                </div>
            </div>

            <!-- Content Blocks -->
            <div class="space-y-4">
                <div class="flex items-center justify-between px-2">
                    <h2 class="text-sm font-bold text-slate-900">Content Blocks</h2>
                    <span class="text-xs font-medium text-slate-400 bg-slate-100 px-2.5 py-1 rounded-full" x-text="`${blocks.length} sections`">0 sections</span>
                </div>

                <div class="space-y-6 min-h-[200px] border-2 border-dashed border-slate-200 rounded-2xl p-6 bg-slate-50/30 transition-all" id="canvas">
                    <template x-for="(block, index) in blocks" :key="block.id">
                        <div class="bg-white rounded-xl overflow-hidden border border-slate-200 shadow-sm">
                            <!-- Block Header -->
                            <div class="px-5 py-3 bg-slate-50 flex items-center justify-between border-b border-slate-100">
                                <div class="flex items-center gap-3">
                                    <span class="text-xs font-medium text-slate-400" x-text="'#' + (index + 1)"></span>
                                    <span class="text-xs font-bold text-primary uppercase" x-text="block.type"></span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <button @click.prevent="moveUp(index)" class="w-7 h-7 flex items-center justify-center rounded text-slate-400 hover:text-slate-900 hover:bg-slate-100 transition-all">
                                        <span class="material-symbols-outlined text-sm">arrow_upward</span>
                                    </button>
                                    <button @click.prevent="moveDown(index)" class="w-7 h-7 flex items-center justify-center rounded text-slate-400 hover:text-slate-900 hover:bg-slate-100 transition-all">
                                        <span class="material-symbols-outlined text-sm">arrow_downward</span>
                                    </button>
                                    <div class="w-px h-4 bg-slate-200 mx-1"></div>
                                    <button @click.prevent="removeBlock(index)" class="w-7 h-7 flex items-center justify-center rounded text-red-400 hover:text-red-600 hover:bg-red-50 transition-all">
                                        <span class="material-symbols-outlined text-sm">delete</span>
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
                                            <input type="text" :name="`content[${index}][data][title]`" placeholder="Main heading" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Subtitle</label>
                                            <input type="text" :name="`content[${index}][data][subtitle]`" placeholder="Supporting text" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Button Text</label>
                                            <input type="text" :name="`content[${index}][data][cta_text]`" placeholder="e.g. Get Started" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Button URL</label>
                                            <input type="text" :name="`content[${index}][data][cta_url]`" placeholder="/contact" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-mono focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        </div>
                                    </div>
                                </template>

                                <template x-if="block.type === 'text'">
                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                                        <div class="md:col-span-1">
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Section Title</label>
                                            <input type="text" :name="`content[${index}][data][title]`" placeholder="Title" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        </div>
                                        <div class="md:col-span-3">
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Content (Markdown)</label>
                                            <textarea :name="`content[${index}][data][body]`" placeholder="Write your content..." rows="5" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"></textarea>
                                        </div>
                                    </div>
                                </template>

                                <template x-if="block.type === 'cta'">
                                    <div class="bg-primary/5 border border-primary/10 rounded-xl p-6">
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                            <div class="col-span-2">
                                                <label class="block text-xs font-medium text-primary mb-1">Call to Action Text</label>
                                                <input type="text" :name="`content[${index}][data][title]`" placeholder="e.g. Ready to get started?" class="w-full bg-white border border-primary/10 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                            </div>
                                            <div>
                                                <label class="block text-xs font-medium text-primary mb-1">Link URL</label>
                                                <input type="text" :name="`content[${index}][data][url]`" placeholder="/contact" class="w-full bg-white border border-primary/10 rounded-lg px-4 py-2.5 text-sm font-mono focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>

                    <!-- Empty State -->
                    <div x-show="blocks.length === 0" class="flex flex-col items-center justify-center py-16 text-slate-300">
                        <span class="material-symbols-outlined text-4xl mb-3">view_quilt</span>
                        <p class="text-sm font-medium">No content blocks yet</p>
                        <p class="text-xs text-slate-400 mt-1">Add blocks from the panel on the right</p>
                    </div>
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
                    <button @click.prevent="addBlock('features')" class="w-full flex items-center gap-3 p-3 bg-slate-50 border border-slate-100 rounded-xl transition-all hover:bg-primary/5 hover:border-primary/20 group">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">grid_view</span>
                        <span class="text-sm font-medium text-slate-600 group-hover:text-slate-900 transition-colors">Features Grid</span>
                    </button>
                </div>

                <div class="p-5 bg-slate-50 border-t border-slate-100 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-slate-700">Published</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_published" value="1" checked class="sr-only peer">
                            <div class="w-10 h-5 bg-slate-200 rounded-full peer-checked:bg-primary transition-all"></div>
                            <div class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow-sm transition-all peer-checked:translate-x-5"></div>
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-primary text-white py-3 rounded-xl font-semibold text-sm hover:bg-primary-dark transition-colors flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-lg">save</span>
                        Create Page
                    </button>
                    <a href="{{ route('admin.pages.index') }}" class="block text-center text-xs text-slate-400 hover:text-slate-700 transition-colors">Cancel</a>
                </div>
            </div>

            <!-- SEO -->
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 p-6 space-y-4">
                <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-wider flex items-center gap-2 pb-3 border-b border-slate-50">
                    <span class="material-symbols-outlined text-sm">search</span>
                    SEO Settings
                </h3>
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Meta Title</label>
                    <input type="text" name="meta_title" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-500 mb-1">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"></textarea>
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
