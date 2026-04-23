@extends('layouts.backend')

@section('content')

<div class="flex flex-col gap-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Services</h1>
            <p class="text-sm text-slate-500 mt-1">Manage the services you offer to clients</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 bg-primary text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-primary-dark transition-colors">
            <span class="material-symbols-outlined text-lg">add</span>
            Add Service
        </a>
    </div>

    @if(session('success'))
        <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-100 text-emerald-800 px-5 py-3 rounded-xl text-sm font-medium">
            <span class="material-symbols-outlined text-lg">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl overflow-hidden border border-slate-100">
        <x-admin.table-filter-bar placeholder="Search services by title or description..." />
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-100">
                        <x-admin.sortable-th column="title" label="Service" />
                        <x-admin.sortable-th column="price" label="Price" />
                        <x-admin.sortable-th column="order" label="Order" />
                        <x-admin.sortable-th column="is_active" label="Status" />
                        <th class="px-6 py-3.5 text-right text-xs font-semibold text-slate-500 w-16"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($services as $service)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg bg-primary/5 flex items-center justify-center text-primary">
                                        <span class="material-symbols-outlined text-lg">{{ $service->icon ?? 'settings_suggest' }}</span>
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.services.edit', $service) }}" class="text-sm font-semibold text-slate-900 hover:text-primary transition-colors">{{ $service->title }}</a>
                                        <p class="text-xs text-slate-400">{{ $service->slug }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm font-semibold text-slate-900">
                                    {{ $service->price ? '$' . number_format($service->price, 2) : 'Custom' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-slate-400 font-mono">{{ $service->order ?? 0 }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                    {{ $service->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $service->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <x-admin.row-actions>
                                    <a href="{{ route('admin.services.edit', $service) }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50 transition-colors">
                                        <span class="material-symbols-outlined text-lg text-slate-400">edit</span>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?')">
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
                    @if($services->isEmpty())
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <span class="material-symbols-outlined text-slate-300 text-3xl block mb-2">miscellaneous_services</span>
                                <p class="text-sm text-slate-400">No services found</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    @if($services->hasPages())
        <div class="mt-4">
            {{ $services->links() }}
        </div>
    @endif
</div>

@endsection
