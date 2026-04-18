@props(['title' => 'Dashboard', 'subtitle' => 'Overview'])

<header class="floating-header shrink-0 flex items-center justify-between px-6 md:px-10 py-5 bg-white/80 backdrop-blur-md border-b border-slate-100 sticky top-0 z-30">
    <div class="flex items-center gap-6">
        <button @click="sidebarOpen = true" class="lg:hidden w-10 h-10 flex items-center justify-center text-slate-500 hover:text-primary transition-colors">
            <span class="material-symbols-outlined text-2xl">menu</span>
        </button>
        
        <div class="flex flex-col">
            <h2 class="text-xl font-black text-slate-900 tracking-tighter leading-tight uppercase italic">{{ $title ?? 'Dashboard' }}</h2>
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.3em] mt-1">{{ $subtitle ?? 'System Overview' }}</p>
        </div>
    </div>

    <div class="flex items-center gap-10">
        <!-- Search bar (Material style) -->
        <div class="hidden md:flex items-center gap-3 bg-slate-50 border border-slate-100 rounded-2xl px-5 py-2.5 w-80 group focus-within:border-primary/30 transition-all">
            <span class="material-symbols-outlined text-slate-400 text-lg group-focus-within:text-primary transition-colors">search</span>
            <input type="text" placeholder="Omni Search..." class="bg-transparent border-none focus:ring-0 text-xs font-bold text-slate-900 placeholder:text-slate-400 w-full" />
        </div>

        <div class="flex items-center gap-6">
            <button class="w-10 h-10 rounded-xl flex items-center justify-center text-slate-400 hover:bg-slate-50 hover:text-primary transition-all relative">
                <span class="material-symbols-outlined text-xl">notifications</span>
                <span class="absolute top-2 right-2 w-2 h-2 bg-rose-500 rounded-full border-2 border-white"></span>
            </button>
            
            <a href="{{ route('portfolio.index') }}" target="_blank" class="hidden sm:flex items-center gap-3 bg-primary/5 hover:bg-primary/10 text-primary px-6 py-2.5 rounded-xl border border-primary/10 transition-all group">
                <span class="text-[10px] font-black uppercase tracking-widest">Public Canvas</span>
                <span class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform">open_in_new</span>
            </a>
        </div>
    </div>
</header>
