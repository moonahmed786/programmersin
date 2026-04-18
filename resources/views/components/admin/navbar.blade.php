@props(['title' => 'Dashboard', 'subtitle' => 'Overview'])

<header class="flex items-center justify-between px-6 md:px-10 py-5 bg-node-dark/80 backdrop-blur-md border-b border-white/5 sticky top-0 z-30">
    <div class="flex items-center gap-4">
        <!-- Mobile Toggle -->
        <button @click="sidebarOpen = true" class="lg:hidden text-slate-400 hover:text-white transition-colors p-2 -ml-2">
            <span class="material-symbols-outlined text-2xl">menu</span>
        </button>

        <h2 class="text-xs font-black text-white tracking-widest uppercase">{{ $title }}</h2>
        <span class="h-4 w-px bg-white/10 hidden md:block"></span>
        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest hidden md:block">{{ $subtitle }}</span>
    </div>

    <div class="flex items-center gap-4 md:gap-6">
        <!-- Status Indicator -->
        <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/20">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></span>
            <span class="text-[9px] font-black text-emerald-500 uppercase tracking-widest">Active System</span>
        </div>

        <a href="{{ route('admin.projects.create') }}" class="flex items-center gap-2 px-4 py-2 bg-primary text-white text-[11px] font-bold rounded-xl shadow-sm hover:brightness-110 active:scale-95 transition-all">
            <span class="material-symbols-outlined text-sm">add</span>
            New Project
        </a>
    </div>
</header>
