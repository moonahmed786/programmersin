@extends('layouts.backend')

@section('content')

<div class="mb-8">
    <div class="flex items-center gap-4 mb-4">
        <a href="{{ route('admin.projects.index') }}" class="w-9 h-9 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-400 hover:text-primary transition-all">
            <span class="material-symbols-outlined text-lg">arrow_back</span>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900">New Project</h1>
            <p class="text-sm text-slate-500 mt-0.5">Set up a new client project</p>
        </div>
    </div>
</div>

<div class="max-w-4xl">
    <div class="bg-white rounded-2xl overflow-hidden border border-slate-100">
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="p-8 md:p-10 space-y-10">
                <!-- Project Info -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div>
                        <p class="text-xs text-primary font-semibold uppercase tracking-wider mb-1">Details</p>
                        <h3 class="text-sm font-bold text-slate-900">Project Info</h3>
                    </div>
                    <div class="lg:col-span-2 space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5" for="title">Project Title *</label>
                            <input id="title" type="text" name="title" required value="{{ old('title') }}"
                                class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all @error('title') border-red-300 @enderror"
                                placeholder="e.g. Company Website Redesign">
                            @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="customer_id">Client *</label>
                                <div class="relative">
                                    <select id="customer_id" name="customer_id" required 
                                        class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm appearance-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        <option value="" disabled selected>Select a client</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->email }})</option>
                                        @endforeach
                                    </select>
                                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none text-lg">unfold_more</span>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="service_id">Service *</label>
                                <div class="relative">
                                    <select id="service_id" name="service_id" required 
                                        class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm appearance-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        <option value="" disabled selected>Select a service</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                                        @endforeach
                                    </select>
                                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none text-lg">unfold_more</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-px bg-slate-100"></div>

                <!-- Timeline & Budget -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div>
                        <p class="text-xs text-primary font-semibold uppercase tracking-wider mb-1">Planning</p>
                        <h3 class="text-sm font-bold text-slate-900">Timeline & Budget</h3>
                    </div>
                    <div class="lg:col-span-2 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="status">Status</label>
                                <div class="relative">
                                    <select id="status" name="status" required 
                                        class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm appearance-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                        <option value="pending">Pending</option>
                                        <option value="in_progress">In Progress</option>
                                        <option value="review">Under Review</option>
                                        <option value="completed">Completed</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none text-lg">unfold_more</span>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="budget">Budget ($)</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm font-medium">$</span>
                                    <input id="budget" type="number" step="0.01" name="budget" value="{{ old('budget') }}"
                                        class="w-full border border-slate-200 rounded-xl pl-9 pr-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                        placeholder="0.00">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="due_date">Due Date</label>
                                <input id="due_date" type="date" name="due_date" value="{{ old('due_date') }}"
                                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5" for="description">Notes</label>
                            <textarea id="description" name="description" rows="4"
                                class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"
                                placeholder="Project objectives, requirements, notes...">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-8 md:px-10 py-5 bg-slate-50 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.projects.index') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700 transition-colors px-4 py-2">Cancel</a>
                <button type="submit" class="inline-flex items-center gap-2 bg-primary text-white text-sm font-semibold px-6 py-2.5 rounded-xl hover:bg-primary-dark transition-colors">
                    <span class="material-symbols-outlined text-lg">save</span>
                    Create Project
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
