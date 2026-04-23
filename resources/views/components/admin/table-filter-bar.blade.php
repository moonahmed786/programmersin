@props(['placeholder' => 'Search...', 'search' => true])

<div {{ $attributes->merge(['class' => 'px-6 py-4 bg-slate-50/50 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4']) }}>
    @if($search)
    <form action="{{ request()->url() }}" method="GET" class="relative group w-full max-w-md">
        @if(request('sort')) <input type="hidden" name="sort" value="{{ request('sort') }}"> @endif
        @if(request('direction')) <input type="hidden" name="direction" value="{{ request('direction') }}"> @endif
        
        <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-400 group-focus-within:text-primary transition-colors text-lg">search</span>
        <input type="text" name="search" value="{{ request('search') }}" 
               placeholder="{{ $placeholder }}"
               class="w-full bg-white border border-slate-200 rounded-lg pl-11 pr-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/10 focus:border-primary transition-all placeholder:text-slate-400">
        
        @if(request('search'))
        <a href="{{ request()->url() }}" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-300 hover:text-red-500 transition-colors">
            <span class="material-symbols-outlined text-lg">close</span>
        </a>
        @endif
    </form>
    @endif

    <div class="flex items-center gap-3">
        {{ $slot }}
        
        @if(request()->anyFilled(['search', 'sort', 'status']))
            <a href="{{ request()->url() }}" class="flex items-center gap-1.5 text-xs font-medium text-red-500 hover:bg-red-50 px-3 py-1.5 rounded-lg transition-all">
                <span class="material-symbols-outlined text-sm">filter_list_off</span>
                Clear filters
            </a>
        @endif
    </div>
</div>
