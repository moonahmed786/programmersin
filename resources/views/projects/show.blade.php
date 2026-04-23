@extends('layouts.backend')

@section('content')

<!-- Header -->
<div class="mb-8 flex items-center justify-between">
    <div class="flex items-center gap-4">
        <a href="{{ url()->previous() }}" class="w-9 h-9 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-400 hover:text-primary transition-all">
            <span class="material-symbols-outlined text-lg">arrow_back</span>
        </a>
        <div>
            <div class="flex items-center gap-3 mb-1">
                <h1 class="text-2xl font-bold text-slate-900">{{ $project->title }}</h1>
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                    {{ $project->status == 'completed' ? 'bg-emerald-50 text-emerald-700' : ($project->status == 'cancelled' ? 'bg-red-50 text-red-600' : 'bg-blue-50 text-blue-700') }}">
                    {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                </span>
            </div>
            <p class="text-sm text-slate-500">{{ $project->description }}</p>
        </div>
    </div>

    @if(auth()->user()->isSuperAdmin())
    <div class="flex gap-2">
        <a href="{{ route('admin.projects.edit', $project->id) }}" class="w-9 h-9 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-400 hover:text-primary transition-all">
            <span class="material-symbols-outlined text-lg">edit</span>
        </a>
    </div>
    @endif
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Main Content -->
    <div class="lg:col-span-2 space-y-8">
        <!-- Progress -->
        <div class="bg-white rounded-2xl p-8 border border-slate-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-bold text-slate-900">Project Progress</h3>
                <span class="text-lg font-bold text-primary">45%</span>
            </div>
            <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                <div class="h-full bg-primary rounded-full transition-all duration-1000 ease-out" style="width: 45%;"></div>
            </div>
            <div class="grid grid-cols-3 gap-4 pt-6">
                <div>
                    <span class="text-xs text-slate-400 block mb-1">Planning</span>
                    <p class="text-sm font-semibold text-slate-900">Completed</p>
                </div>
                <div>
                    <span class="text-xs text-slate-400 block mb-1">Development</span>
                    <p class="text-sm font-medium text-slate-400">In Queue</p>
                </div>
                <div>
                    <span class="text-xs text-slate-400 block mb-1">Review</span>
                    <p class="text-sm font-medium text-slate-400">Pending</p>
                </div>
            </div>
        </div>

        <!-- Team Members -->
        <div class="space-y-4">
            <h3 class="text-sm font-bold text-slate-900 px-1">Assigned Team</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($project->employees as $employee)
                <div class="bg-white p-5 rounded-xl border border-slate-100 flex items-center gap-4 hover:shadow-sm transition-all">
                    <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center overflow-hidden flex-shrink-0">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $employee->name }}" alt="{{ $employee->name }}" class="w-full h-full">
                    </div>
                    <div>
                        <span class="text-sm font-semibold text-slate-900">{{ $employee->name }}</span>
                        <p class="text-xs text-primary font-medium mt-0.5">{{ $employee->pivot->role ?? 'Team Member' }}</p>
                    </div>
                </div>
                @endforeach
                @if($project->employees->isEmpty())
                <div class="col-span-full py-10 bg-slate-50 rounded-xl border-2 border-dashed border-slate-200 flex flex-col items-center gap-2">
                    <span class="material-symbols-outlined text-3xl text-slate-300">person_add</span>
                    <p class="text-sm text-slate-400">No team members assigned yet</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">
        <!-- Project Details -->
        <div class="bg-white rounded-2xl p-8 border border-slate-100">
            <h3 class="text-sm font-bold text-slate-900 mb-6">Project Details</h3>
            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center text-blue-500 flex-shrink-0">
                        <span class="material-symbols-outlined text-lg">account_balance_wallet</span>
                    </div>
                    <div>
                        <span class="text-xs text-slate-400">Budget</span>
                        <p class="text-lg font-bold text-slate-900">${{ number_format($project->budget, 2) }}</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-9 h-9 rounded-lg bg-orange-50 flex items-center justify-center text-orange-500 flex-shrink-0">
                        <span class="material-symbols-outlined text-lg">corporate_fare</span>
                    </div>
                    <div>
                        <span class="text-xs text-slate-400">Client</span>
                        <p class="text-sm font-semibold text-slate-900">{{ $project->customer->name }}</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-9 h-9 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-500 flex-shrink-0">
                        <span class="material-symbols-outlined text-lg">event_upcoming</span>
                    </div>
                    <div>
                        <span class="text-xs text-slate-400">Due Date</span>
                        <p class="text-sm font-semibold text-slate-900">{{ $project->due_date ? $project->due_date->format('M d, Y') : 'Not set' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service -->
        <div class="bg-primary rounded-2xl p-8 text-white">
            <span class="text-xs bg-white/20 px-2.5 py-1 rounded-full font-medium inline-block mb-3">Service</span>
            <h4 class="text-xl font-bold mb-2">{{ $project->service->title ?? 'Full Stack Development' }}</h4>
            <p class="text-white/70 text-sm leading-relaxed line-clamp-3">{{ $project->service->description ?? 'Custom development services' }}</p>
        </div>
    </div>
</div>
@endsection
