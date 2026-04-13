@extends('layouts.backend')

@section('content')
<div class="space-y-6">

    {{-- Page Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Team Members</h1>
            <p class="text-sm text-slate-400 mt-1">Manage your developer & employee roster</p>
        </div>
        <a href="{{ route('admin.employees.create') }}"
            class="inline-flex items-center gap-2 bg-primary text-on-primary px-5 py-2.5 rounded-xl font-semibold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all">
            <span class="material-symbols-outlined text-base">person_add</span>
            Add Employee
        </a>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="flex items-center gap-3 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 px-5 py-3.5 rounded-xl text-sm font-medium">
            <span class="material-symbols-outlined text-base">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    {{-- Employees Table --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-outline-variant/20 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-outline-variant/20 bg-surface-container-low/50">
                        <th class="text-left px-6 py-4 text-xs font-black uppercase tracking-widest text-slate-400">Employee</th>
                        <th class="text-left px-6 py-4 text-xs font-black uppercase tracking-widest text-slate-400">Position</th>
                        <th class="text-left px-6 py-4 text-xs font-black uppercase tracking-widest text-slate-400">Contact</th>
                        <th class="text-left px-6 py-4 text-xs font-black uppercase tracking-widest text-slate-400">Status</th>
                        <th class="text-right px-6 py-4 text-xs font-black uppercase tracking-widest text-slate-400">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/10">
                    @forelse($employees as $employee)
                    <tr class="hover:bg-surface-container-low/30 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 rounded-xl bg-surface-container flex items-center justify-center border border-outline-variant/20 overflow-hidden flex-shrink-0">
                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $employee->name }}" alt="{{ $employee->name }}">
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900 dark:text-white">{{ $employee->name }}</p>
                                    <p class="text-xs text-slate-400">{{ $employee->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-slate-600 dark:text-slate-300 font-medium">
                                {{ $employee->position ?? '—' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-slate-500 dark:text-slate-400">
                            {{ $employee->phone ?? '—' }}
                        </td>
                        <td class="px-6 py-4">
                            @if($employee->is_active)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Active
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-500 dark:bg-slate-800 dark:text-slate-400">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Inactive
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.employees.edit', $employee) }}"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-primary bg-primary/10 hover:bg-primary/20 transition-colors">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                                </a>
                                <form action="{{ route('admin.employees.destroy', $employee) }}" method="POST"
                                    onsubmit="return confirm('Deactivate this employee?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-red-500 bg-red-50 dark:bg-red-900/20 hover:bg-red-100 dark:hover:bg-red-900/40 transition-colors">
                                        <span class="material-symbols-outlined text-sm">block</span> Deactivate
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center">
                            <span class="material-symbols-outlined text-5xl text-slate-300 block mb-3">group</span>
                            <p class="text-slate-400 font-medium">No employees found.</p>
                            <a href="{{ route('admin.employees.create') }}" class="text-primary text-sm font-semibold hover:underline mt-1 inline-block">Add your first employee →</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($employees->hasPages())
            <div class="px-6 py-4 border-t border-outline-variant/10">
                {{ $employees->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
