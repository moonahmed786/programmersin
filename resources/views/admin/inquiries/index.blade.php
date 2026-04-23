@extends('layouts.backend')

@section('content')

<div class="flex flex-col gap-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Inquiries</h1>
            <p class="text-sm text-slate-500 mt-1">View and manage incoming leads & messages</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl overflow-hidden border border-slate-100">
        <x-admin.table-filter-bar placeholder="Search by name, email, company or subject..." />
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-100">
                        <x-admin.sortable-th column="name" label="Name" />
                        <x-admin.sortable-th column="email" label="Email" />
                        <x-admin.sortable-th column="subject" label="Subject" />
                        <x-admin.sortable-th column="created_at" label="Received" />
                        <x-admin.sortable-th column="status" label="Status" />
                        <th class="px-6 py-3.5 text-right text-xs font-semibold text-slate-500 w-16"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($inquiries as $inquiry)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div>
                                    <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="text-sm font-semibold text-slate-900 hover:text-primary transition-colors">{{ $inquiry->name }}</a>
                                    @if($inquiry->company)
                                        <p class="text-xs text-slate-400">{{ $inquiry->company }}</p>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1">
                                    <span class="text-sm text-primary">{{ $inquiry->email }}</span>
                                    @if($inquiry->phone)
                                        <span class="text-xs text-slate-400">{{ $inquiry->phone }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-slate-600 truncate max-w-xs block">{{ $inquiry->subject }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-slate-400">{{ $inquiry->created_at->diffForHumans() }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                    {{ $inquiry->status == 'new' ? 'bg-blue-50 text-blue-700' : ($inquiry->status == 'closed' ? 'bg-slate-100 text-slate-500' : 'bg-amber-50 text-amber-700') }}">
                                    {{ ucfirst(str_replace('_', ' ', $inquiry->status)) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <x-admin.row-actions>
                                    <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50 transition-colors">
                                        <span class="material-symbols-outlined text-lg text-slate-400">visibility</span>
                                        View
                                    </a>
                                    <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
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
                    @if($inquiries->isEmpty())
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <span class="material-symbols-outlined text-slate-300 text-3xl block mb-2">inbox</span>
                                <p class="text-sm text-slate-400">No inquiries found</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    @if($inquiries->hasPages())
        <div class="mt-4">
            {{ $inquiries->links() }}
        </div>
    @endif
</div>

@endsection
