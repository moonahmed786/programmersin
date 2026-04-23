@extends('layouts.backend')

@section('content')

<!-- Personnel Directory Header -->
<div class="mb-14 px-2">
    <div class="flex justify-between items-end mb-10">
        <div class="flex flex-col gap-3">
            <h1 class="text-4xl font-black tracking-tighter text-on-surface uppercase italic">
                Personnel <span class="text-primary opacity-90">Directory</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-black uppercase tracking-[0.4em] flex items-center gap-3">
                <span class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_10px_rgba(0,118,255,0.4)] animate-pulse"></span>
                Global engineering roster and deployment ledger
            </p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('admin.employees.create') }}" class="btn-stellar">
                <span class="material-symbols-outlined text-base">person_add</span>
                Initialize Unit
            </a>
        </div>
    </div>
</div>

{{-- Flash Messages --}}
@if(session('success'))
    <div class="mb-10 flex items-center gap-6 bg-emerald-50 border border-emerald-100 text-emerald-900 px-8 py-5 rounded-stellar text-[11px] font-black uppercase tracking-widest animate-in-fade shadow-sm">
        <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-emerald-500 shadow-sm border border-emerald-100">
            <span class="material-symbols-outlined text-xl">verified</span>
        </div>
        {{ session('success') }}
    </div>
@endif

<!-- Intelligence Ledger -->
<div class="bg-white rounded-stellar overflow-hidden border border-slate-100 shadow-sm">
    <x-admin.table-filter-bar placeholder="Search personnel by name, email or position..." />
    
    <div class="overflow-x-auto">
        <table class="ledger-table">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-50">
                    <x-admin.sortable-th column="name" label="Personnel Identity" />
                    <x-admin.sortable-th column="position" label="Specialization" />
                    <th class="px-8 py-5 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] bg-background/50 border-b border-outline-variant">Communication Node</th>
                    <x-admin.sortable-th column="is_active" label="Status" />
                    <th class="px-8 py-5 text-right text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] bg-background/50 border-b border-outline-variant">Execution</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @foreach($employees as $employee)
                    <tr class="hover:bg-slate-50/50 transition-all group">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-5">
                                <div class="h-12 w-12 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center shadow-sm overflow-hidden flex-shrink-0 group-hover:scale-105 transition-transform duration-500">
                                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $employee->name }}" alt="{{ $employee->name }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex flex-col">
                                    <a href="{{ route('admin.employees.edit', $employee) }}" class="font-black text-on-surface tracking-tight leading-none mb-1.5 hover:text-primary transition-colors">{{ $employee->name }}</a>
                                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest italic">{{ $employee->email }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-xs font-black text-on-surface-variant italic">{{ $employee->position ?? '—' }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-[10px] font-black font-mono text-slate-500 uppercase tracking-widest">{{ $employee->phone ?? '—' }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="badge-node {{ $employee->is_active ? 'badge-live' : 'badge-draft' }} font-black text-[9px] tracking-widest">
                                {{ $employee->is_active ? 'ACTIVE' : 'INACTIVE' }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-x-4 group-hover:translate-x-0">
                                <a href="{{ route('admin.employees.edit', $employee) }}" class="w-10 h-10 flex items-center justify-center text-slate-400 hover:text-primary transition-all hover:bg-primary/5 rounded-xl border border-transparent hover:border-primary/10">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                </a>
                                <form action="{{ route('admin.employees.destroy', $employee) }}" method="POST" onsubmit="return confirm('Securely archive this personnel unit?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-10 h-10 flex items-center justify-center text-slate-400 hover:text-rose-600 transition-all hover:bg-rose-50 rounded-xl border border-transparent hover:border-rose-100">
                                        <span class="material-symbols-outlined text-lg">block</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if($employees->isEmpty())
                    <tr>
                        <td colspan="5" class="px-8 py-32 text-center">
                            <div class="w-20 h-20 rounded-full bg-slate-50 flex items-center justify-center mx-auto mb-6 border border-slate-100">
                                <span class="material-symbols-outlined text-4xl text-slate-200">manage_search</span>
                            </div>
                            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 italic">No personnel units matched your current filter parameters.</p>
                            <a href="{{ route('admin.employees.index') }}" class="inline-flex items-center gap-2 mt-6 text-[9px] font-black uppercase tracking-widest text-primary hover:bg-primary/5 px-6 py-3 rounded-xl border border-primary/10 transition-all">Reset Active Query</a>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@if($employees->hasPages())
    <div class="mt-12">
        {{ $employees->links() }}
    </div>
@endif

@if($employees->hasPages())
    <div class="mt-12">
        {{ $employees->links() }}
    </div>
@endif

@endsection
