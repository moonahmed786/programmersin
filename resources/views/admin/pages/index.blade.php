@extends('layouts.backend')

@section('content')

<div class="flex flex-col gap-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Pages</h1>
            <p class="text-sm text-slate-500 mt-1">Create and manage your website pages</p>
        </div>
        <a href="{{ route('admin.pages.create') }}" class="inline-flex items-center gap-2 bg-primary text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-primary-dark transition-colors">
            <span class="material-symbols-outlined text-lg">add</span>
            New Page
        </a>
    </div>

    @if(session('success'))
        <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-100 text-emerald-800 px-5 py-3 rounded-xl text-sm font-medium">
            <span class="material-symbols-outlined text-lg">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl overflow-hidden border border-slate-100">
        <x-admin.table-filter-bar placeholder="Search pages by title..." />
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-slate-100">
                        <x-admin.sortable-th column="title" label="Page" />
                        <x-admin.sortable-th column="slug" label="URL" />
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500">Sections</th>
                        <x-admin.sortable-th column="is_published" label="Status" />
                        <x-admin.sortable-th column="updated_at" label="Updated" />
                        <th class="px-6 py-3.5 text-right text-xs font-semibold text-slate-500 w-16"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($pages as $page)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg bg-primary/5 flex items-center justify-center text-primary">
                                        <span class="material-symbols-outlined text-lg">article</span>
                                    </div>
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="text-sm font-semibold text-slate-900 hover:text-primary transition-colors">{{ $page->title }}</a>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ url($page->slug) }}" target="_blank" class="inline-flex items-center gap-1 text-sm text-primary hover:underline font-mono">
                                    /{{ $page->slug }}
                                    <span class="material-symbols-outlined text-sm">open_in_new</span>
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-slate-500">{{ count($page->content ?? []) }} sections</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                    {{ $page->is_published ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-600' }}">
                                    {{ $page->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-slate-400">{{ $page->updated_at->diffForHumans() }}</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <x-admin.row-actions>
                                    <a href="{{ url($page->slug) }}" target="_blank" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50 transition-colors">
                                        <span class="material-symbols-outlined text-lg text-slate-400">open_in_new</span>
                                        Preview
                                    </a>
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50 transition-colors">
                                        <span class="material-symbols-outlined text-lg text-slate-400">edit</span>
                                        Edit
                                    </a>
                                    <div class="h-px bg-slate-100 mx-3 my-1"></div>
                                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this page?')">
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
                    @if($pages->isEmpty())
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">
                                <span class="material-symbols-outlined text-slate-300 text-3xl block mb-2">description</span>
                                <p class="text-sm text-slate-400">No pages found</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    @if($pages->hasPages())
        <div class="mt-4">
            {{ $pages->links() }}
        </div>
    @endif
</div>

@endsection
