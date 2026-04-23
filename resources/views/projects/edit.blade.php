@extends('layouts.backend')

@section('content')

<div class="mb-8">
    <div class="flex items-center gap-4 mb-4">
        <a href="{{ route('admin.projects.index') }}" class="w-9 h-9 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-400 hover:text-primary transition-all">
            <span class="material-symbols-outlined text-lg">arrow_back</span>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Edit Project</h1>
            <p class="text-sm text-slate-500 mt-0.5">Update <span class="font-medium text-slate-700">{{ $project->title }}</span></p>
        </div>
    </div>
</div>

<div class="max-w-5xl">
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="space-y-8">
            <!-- Project Details -->
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 p-8 md:p-10">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                    <div class="lg:col-span-1">
                        <p class="text-xs text-primary font-semibold uppercase tracking-wider mb-1">Details</p>
                        <h3 class="text-sm font-bold text-slate-900">Project Info</h3>
                    </div>
                    <div class="lg:col-span-3 space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5" for="title">Project Title *</label>
                            <input id="title" type="text" name="title" value="{{ old('title', $project->title) }}" required
                                class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all @error('title') border-red-300 @enderror"
                                placeholder="Project title">
                            @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5" for="status">Status</label>
                            <div class="relative">
                                <select id="status" name="status" required 
                                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm appearance-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                    <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="in_progress" {{ $project->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="review" {{ $project->status == 'review' ? 'selected' : '' }}>Under Review</option>
                                    <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $project->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none text-lg">unfold_more</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Portfolio -->
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 p-8 md:p-10">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                    <div class="lg:col-span-1">
                        <p class="text-xs text-primary font-semibold uppercase tracking-wider mb-1">Portfolio</p>
                        <h3 class="text-sm font-bold text-slate-900">Public Display</h3>
                    </div>
                    <div class="lg:col-span-3 space-y-8">
                        <div class="flex items-center justify-between p-5 bg-slate-50 border border-slate-100 rounded-xl">
                            <div>
                                <span class="text-sm font-medium text-slate-900">Show in Portfolio</span>
                                <p class="text-xs text-slate-400 mt-0.5">Display this project publicly on your website</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_public" value="1" {{ $project->is_public ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 rounded-full peer-checked:bg-primary transition-all"></div>
                                <div class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow-sm transition-all peer-checked:translate-x-5"></div>
                            </label>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Featured Image</label>
                            <div class="flex items-start gap-6">
                                @if($project->featured_image)
                                <div class="w-40 h-28 rounded-xl bg-slate-100 overflow-hidden border border-slate-200 flex-shrink-0">
                                    <img src="{{ asset('storage/' . $project->featured_image) }}" class="object-cover w-full h-full">
                                </div>
                                @endif
                                <div class="flex-1">
                                    <div class="relative">
                                        <input type="file" name="featured_image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                        <div class="border-2 border-dashed border-slate-200 rounded-xl px-6 py-5 flex flex-col items-center justify-center gap-2 hover:border-primary hover:bg-primary/5 transition-all">
                                            <span class="material-symbols-outlined text-2xl text-slate-300">cloud_upload</span>
                                            <span class="text-sm text-slate-400">Upload new image</span>
                                        </div>
                                    </div>
                                    <p class="text-xs text-slate-400 mt-2">Recommended: 1200×800px, WEBP or PNG</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5" for="showcase_description">Description</label>
                            <textarea id="showcase_description" name="showcase_description" rows="6" 
                                class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"
                                placeholder="Describe this project for your portfolio...">{{ old('showcase_description', $project->showcase_description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 p-8 md:p-10 flex items-center justify-end gap-3">
                <a href="{{ route('admin.projects.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700 transition-colors px-4 py-2">Cancel</a>
                <button type="submit" class="inline-flex items-center gap-2 bg-primary text-white text-sm font-semibold px-6 py-2.5 rounded-xl hover:bg-primary-dark transition-colors">
                    <span class="material-symbols-outlined text-lg">save</span>
                    Save Changes
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
