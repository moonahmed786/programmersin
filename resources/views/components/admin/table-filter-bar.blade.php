@props(['placeholder' => 'Search registry...', 'search' => true])

<div {{ $attributes->merge(['class' => 'px-10 py-8 bg-slate-50 border-b border-outline-variant flex flex-col md:flex-row md:items-center justify-between gap-6']) }}>
    @if($search)
    <form action="{{ request()->url() }}" method="GET" class="relative group w-full max-w-md">
        {{-- Preserve sorting when searching --}}
        @if(request('sort')) <input type="hidden" name="sort" value="{{ request('sort') }}"> @endif
        @if(request('direction')) <input type="hidden" name="direction" value="{{ request('direction') }}"> @endif
        
        <span class="absolute left-6 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-300 group-focus-within:text-primary transition-colors text-xl">search</span>
        <input type="text" name="search" value="{{ request('search') }}" 
               placeholder="{{ $placeholder }}"
               class="w-full bg-white border border-outline rounded-2xl pl-16 pr-6 py-4 text-xs font-black text-on-surface focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm placeholder:text-slate-400 placeholder:italic placeholder:font-bold">
        
        @if(request('search'))
        <a href="{{ request()->url() }}" class="absolute right-6 top-1/2 -translate-y-1/2 text-slate-300 hover:text-rose-500 transition-colors">
            <span class="material-symbols-outlined text-lg">close</span>
        </a>
        @endif
    </form>
    @endif

    <div class="flex items-center gap-4">
        {{ $slot }}
        
        @if(request()->anyFilled(['search', 'sort', 'status']))
            <a href="{{ request()->url() }}" class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-rose-500 hover:bg-rose-50 px-4 py-2 rounded-lg transition-all border border-rose-100">
                <span class="material-symbols-outlined text-base">filter_list_off</span>
                Reset Engine
            </a>
        @endif
    </div>
</div>
