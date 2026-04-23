@extends('layouts.backend')

@section('content')

<div class="flex flex-col gap-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Projects</h1>
            <p class="text-sm text-slate-500 mt-1">Manage all your client projects</p>
        </div>
        @if(auth()->user()->isSuperAdmin())
        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 bg-primary text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-primary-dark transition-colors">
            <span class="material-symbols-outlined text-lg">add</span>
            New Project
        </a>
        @endif
    </div>

    <div class="bg-white rounded-2xl overflow-hidden border border-slate-100">
        <x-admin.table-filter-bar placeholder="Search by title or description..." />
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-100">
                        <x-admin.sortable-th column="title" label="Project" />
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500">Client</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500">Service</th>
                        <x-admin.sortable-th column="created_at" label="Created" />
                        <x-admin.sortable-th column="status" label="Status" />
                        <th class="px-6 py-3.5 text-right text-xs font-semibold text-slate-500 w-16"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($projects as $project)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <span class="text-sm font-semibold text-slate-900">{{ $project->title }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-slate-600">{{ $project->customer->name ?? '—' }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-medium text-primary bg-primary/5 px-2.5 py-1 rounded-md">
                                    {{ $project->service->title ?? 'General' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-slate-400">{{ $project->created_at->format('d M Y') }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                    {{ $project->status == 'completed' ? 'bg-emerald-50 text-emerald-700' : ($project->status == 'cancelled' ? 'bg-red-50 text-red-600' : 'bg-blue-50 text-blue-700') }}">
                                    {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <x-admin.row-actions>
                                    @php $rolePrefix = auth()->user()->isSuperAdmin() ? 'admin' : (auth()->user()->isEmployee() ? 'employee' : 'customer'); @endphp
                                    <a href="{{ route($rolePrefix.'.projects.show', $project->id) }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50 transition-colors">
                                        <span class="material-symbols-outlined text-lg text-slate-400">visibility</span>
                                        View
                                    </a>
                                    @if(auth()->user()->isSuperAdmin())
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50 transition-colors">
                                        <span class="material-symbols-outlined text-lg text-slate-400">edit</span>
                                        Edit
                                    </a>
                                    @endif
                                </x-admin.row-actions>
                            </td>
                        </tr>
                    @endforeach
                    @if($projects->isEmpty())
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <span class="material-symbols-outlined text-slate-300 text-3xl block mb-2">folder_off</span>
                                <p class="text-sm text-slate-400">No projects found</p>
                                <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-1 mt-3 text-sm font-medium text-primary hover:underline">Clear filters</a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    @if($projects->hasPages())
        <div class="mt-4">
            {{ $projects->links() }}
        </div>
    @endif
</div>

@endsection
