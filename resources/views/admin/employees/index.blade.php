@extends('layouts.backend')

@section('content')

<div class="flex flex-col gap-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Team Members</h1>
            <p class="text-sm text-slate-500 mt-1">Manage your team and their profiles</p>
        </div>
        <a href="{{ route('admin.employees.create') }}" class="inline-flex items-center gap-2 bg-primary text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-primary-dark transition-colors">
            <span class="material-symbols-outlined text-lg">person_add</span>
            Add Member
        </a>
    </div>

    @if(session('success'))
        <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-100 text-emerald-800 px-5 py-3 rounded-xl text-sm font-medium">
            <span class="material-symbols-outlined text-lg">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl overflow-hidden border border-slate-100">
        <x-admin.table-filter-bar placeholder="Search by name, email or position..." />
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-100">
                        <x-admin.sortable-th column="name" label="Name" />
                        <x-admin.sortable-th column="position" label="Position" />
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500">Contact</th>
                        <x-admin.sortable-th column="is_active" label="Status" />
                        <th class="px-6 py-3.5 text-right text-xs font-semibold text-slate-500 w-16"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($employees as $employee)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-9 w-9 rounded-lg bg-slate-100 flex items-center justify-center overflow-hidden flex-shrink-0">
                                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $employee->name }}" alt="{{ $employee->name }}" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.employees.edit', $employee) }}" class="text-sm font-semibold text-slate-900 hover:text-primary transition-colors">{{ $employee->name }}</a>
                                        <p class="text-xs text-slate-400">{{ $employee->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-slate-600">{{ $employee->position ?? '—' }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-slate-500">{{ $employee->phone ?? '—' }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                    {{ $employee->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $employee->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <x-admin.row-actions>
                                    <a href="{{ route('admin.employees.edit', $employee) }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50 transition-colors">
                                        <span class="material-symbols-outlined text-lg text-slate-400">edit</span>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.employees.destroy', $employee) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this member?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                            <span class="material-symbols-outlined text-lg">delete</span>
                                            Delete
                                        </button>
                                    </form>
                                </x-admin.row-actions>
                            </td>
                        </tr>
                    @endforeach
                    @if($employees->isEmpty())
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <span class="material-symbols-outlined text-slate-300 text-3xl block mb-2">people</span>
                                <p class="text-sm text-slate-400">No team members found</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    @if($employees->hasPages())
        <div class="mt-4">
            {{ $employees->links() }}
        </div>
    @endif
</div>

@endsection
