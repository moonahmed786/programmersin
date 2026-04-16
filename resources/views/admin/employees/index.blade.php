@extends('layouts.backend')

@section('content')

<!-- Architect Directory Header -->
<div class="mb-14">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h1 class="text-3xl font-black tracking-tighter text-slate-900 uppercase italic">
                <span class="text-gradient">Architect Directory</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-extrabold uppercase tracking-[0.3em] mt-2 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                Global engineering roster and personnel deployment ledger
            </p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('admin.employees.create') }}" class="btn-stellar">
                <span class="material-symbols-outlined text-sm">person_add</span>
                Initialize New Unit
            </a>
        </div>
    </div>
</div>

{{-- Flash Messages --}}
@if(session('success'))
    <div class="mb-10 flex items-center gap-4 bg-emerald-50 border border-emerald-100 text-emerald-600 px-8 py-5 rounded-stellar text-[11px] font-black uppercase tracking-widest animate-in-fade shadow-sm">
        <span class="material-symbols-outlined text-lg">check_circle</span>
        {{ session('success') }}
    </div>
@endif

<!-- Ledger Table -->
<div class="glass-surface rounded-stellar overflow-hidden border border-white/80 animate-in-fade">
    <table class="ledger-table">
        <thead>
            <tr>
                <th>Personnel Identity</th>
                <th>Specialization</th>
                <th>Communication Node</th>
                <th>Status</th>
                <th class="text-right">Execution</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr class="group">
                    <td>
                        <div class="flex items-center gap-4">
                            <div class="h-12 w-12 rounded-2xl bg-white border border-slate-100 flex items-center justify-center shadow-lg overflow-hidden flex-shrink-0 group-hover:scale-110 transition-transform">
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $employee->name }}" alt="{{ $employee->name }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex flex-col">
                                <span class="font-black text-slate-900 tracking-tight leading-none mb-1">{{ $employee->name }}</span>
                                <span class="text-[10px] text-slate-400 font-extrabold uppercase tracking-widest italic">{{ $employee->email }}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-sm font-medium text-slate-500 italic">{{ $employee->position ?? '—' }}</span>
                    </td>
                    <td>
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">{{ $employee->phone ?? '—' }}</span>
                    </td>
                    <td>
                        <span class="badge-stellar {{ $employee->is_active ? 'badge-live' : 'badge-warning' }}">
                            {{ $employee->is_active ? 'ACTIVE' : 'INACTIVE' }}
                        </span>
                    </td>
                    <td class="text-right">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.employees.edit', $employee) }}" class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-slate-50 text-slate-300 hover:text-primary hover:bg-primary/5 transition-all">
                                <span class="material-symbols-outlined text-lg">edit</span>
                            </a>
                            <form action="{{ route('admin.employees.destroy', $employee) }}" method="POST" onsubmit="return confirm('Archive this personnel unit permanently?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-slate-50 text-slate-300 hover:text-red-500 hover:bg-red-50 transition-all">
                                    <span class="material-symbols-outlined text-lg">block</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            @if($employees->isEmpty())
                <tr>
                    <td colspan="5" class="px-6 py-32 text-center">
                        <div class="w-20 h-20 rounded-3xl bg-slate-50 flex items-center justify-center mx-auto mb-6">
                            <span class="material-symbols-outlined text-4xl text-slate-200">group</span>
                        </div>
                        <p class="text-[10px] font-extrabold uppercase tracking-[0.3em] text-slate-300 italic">Registry is clear. No personnel units detected.</p>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

@if($employees->hasPages())
    <div class="mt-12">
        {{ $employees->links() }}
    </div>
@endif

@endsection
