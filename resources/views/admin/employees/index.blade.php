@extends('layouts.backend')

@section('content')

<!-- Architect Directory Header -->
<div class="mb-14">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h1 class="text-4xl font-black tracking-tighter text-white uppercase italic">
                Architect <span class="text-primary">Directory</span>
            </h1>
            <p class="text-[10px] text-slate-500 font-extrabold uppercase tracking-[.4em] mt-3 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-primary shadow-[0_0_8px_rgba(0,118,255,0.5)]"></span>
                Global engineering roster and personnel deployment ledger
            </p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('admin.employees.create') }}" class="bg-primary text-white px-8 py-3 rounded-xl font-black text-xs tracking-tight hover:brightness-110 shadow-xl shadow-primary/20 transition-all flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">person_add</span>
                Initialize Unit
            </a>
        </div>
    </div>
</div>

{{-- Flash Messages --}}
@if(session('success'))
    <div class="mb-10 flex items-center gap-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 px-8 py-5 rounded-node text-[11px] font-black uppercase tracking-widest animate-in-fade shadow-2xl">
        <span class="material-symbols-outlined text-lg">check_circle</span>
        {{ session('success') }}
    </div>
@endif

<!-- Ledger Table -->
<div class="bg-node-dark/40 backdrop-blur-sm rounded-node overflow-hidden border border-white/5 shadow-2xl">
    <table class="ledger-table">
        <thead>
            <tr class="bg-white/5 border-b border-white/5">
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Personnel Identity</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Specialization</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Communication Node</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em]">Status</th>
                <th class="px-8 py-5 text-[10px] font-black text-slate-500 uppercase tracking-[0.15em] text-right">Execution</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
            @foreach($employees as $employee)
                <tr class="hover:bg-white/[0.03] transition-colors group">
                    <td class="px-8 py-5">
                        <div class="flex items-center gap-5">
                            <div class="h-12 w-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shadow-2xl overflow-hidden flex-shrink-0 group-hover:scale-110 transition-transform">
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $employee->name }}" alt="{{ $employee->name }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex flex-col">
                                <span class="font-black text-white tracking-tight leading-none mb-1.5">{{ $employee->name }}</span>
                                <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest italic">{{ $employee->email }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <span class="text-xs font-bold text-slate-400 italic">{{ $employee->position ?? '—' }}</span>
                    </td>
                    <td class="px-8 py-5">
                        <span class="text-[10px] font-black font-mono text-slate-500 uppercase tracking-widest">{{ $employee->phone ?? '—' }}</span>
                    </td>
                    <td class="px-8 py-5">
                        <span class="badge-node {{ $employee->is_active ? 'badge-live' : 'badge-draft' }} tracking-[.15em] font-black text-[9px]">
                            {{ $employee->is_active ? 'ACTIVE' : 'INACTIVE' }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex items-center justify-end gap-5 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-x-4 group-hover:translate-x-0">
                            <a href="{{ route('admin.employees.edit', $employee) }}" class="p-2 text-slate-500 hover:text-primary transition-colors hover:bg-white/5 rounded-lg border border-transparent hover:border-white/10">
                                <span class="material-symbols-outlined text-base">edit</span>
                            </a>
                            <form action="{{ route('admin.employees.destroy', $employee) }}" method="POST" onsubmit="return confirm('Archive this personnel unit permanently?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 text-slate-500 hover:text-rose-500 transition-colors hover:bg-rose-500/5 rounded-lg border border-transparent hover:border-rose-500/10">
                                    <span class="material-symbols-outlined text-base">block</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            @if($employees->isEmpty())
                <tr>
                    <td colspan="5" class="px-8 py-32 text-center">
                        <div class="w-20 h-20 rounded-3xl bg-white/5 flex items-center justify-center mx-auto mb-6 border border-white/5">
                            <span class="material-symbols-outlined text-4xl text-slate-600">group</span>
                        </div>
                        <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-600 italic">Registry is clear. No personnel units detected.</p>
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
