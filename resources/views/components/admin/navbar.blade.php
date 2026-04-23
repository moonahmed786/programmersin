@props(['title' => 'Dashboard', 'subtitle' => 'Overview'])

<header class="shrink-0 flex items-center justify-between px-6 md:px-10 py-4 bg-white/90 backdrop-blur-md border-b border-slate-100 sticky top-0 z-30">
    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = true" class="lg:hidden w-9 h-9 flex items-center justify-center text-slate-500 hover:text-primary transition-colors rounded-lg hover:bg-slate-50">
            <span class="material-symbols-outlined text-xl">menu</span>
        </button>
        
        <div>
            <h2 class="text-base font-bold text-slate-900 leading-tight">{{ $title ?? 'Dashboard' }}</h2>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <!-- Search -->
        <div class="hidden md:flex items-center gap-2 bg-slate-50 border border-slate-100 rounded-lg px-3.5 py-2 w-64 group focus-within:border-primary/30 focus-within:bg-white transition-all">
            <span class="material-symbols-outlined text-slate-400 text-lg group-focus-within:text-primary transition-colors">search</span>
            <input type="text" placeholder="Search..." class="bg-transparent border-none focus:ring-0 text-sm text-slate-900 placeholder:text-slate-400 w-full p-0" />
        </div>

        <button class="w-9 h-9 rounded-lg flex items-center justify-center text-slate-400 hover:bg-slate-50 hover:text-slate-600 transition-all relative">
            <span class="material-symbols-outlined text-xl">notifications</span>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
        </button>
        
        <a href="{{ route('portfolio.index') }}" target="_blank" class="hidden sm:flex items-center gap-1.5 text-sm font-medium text-slate-600 hover:text-primary px-3 py-2 rounded-lg hover:bg-slate-50 transition-all">
            <span>View Site</span>
            <span class="material-symbols-outlined text-base">open_in_new</span>
        </a>
    </div>
</header>
