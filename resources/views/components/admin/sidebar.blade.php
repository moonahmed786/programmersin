<aside
    class="h-screen w-72 min-w-[288px] fixed left-0 top-0 bg-node-dark/50 backdrop-blur-xl flex flex-col border-r border-white/5 tracking-tight z-50 transform transition-transform duration-300 lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
    
    <!-- Logo Area -->
    <div class="px-8 py-8 flex items-center gap-4 border-b border-white/5">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 rotate-hover group">
            <div class="w-10 h-10 rounded-xl overflow-hidden flex-shrink-0 shadow-md shadow-primary/10 transition-transform duration-300 group-hover:scale-105">
                <img alt="ProgrammersIn Logo"
                     class="w-full h-full object-contain"
                     src="{{ asset(\App\Models\Setting::get('site_logo', 'uploads/assets/logo.svg')) }}" />
            </div>
            <div class="flex flex-col">
                <span class="text-lg font-black tracking-tighter text-white leading-none">
                    Programmers<span class="text-primary">In</span>
                </span>
                <span class="text-[10px] font-bold text-slate-500 mt-0.5 uppercase tracking-widest">Admin Console</span>
            </div>
        </a>
    </div>

    <nav class="flex-1 overflow-y-auto pb-8 flex flex-col mt-6">
        <div class="px-8 flex items-center justify-between mb-4">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 opacity-60">Main Console</span>
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
        </div>
        
        <x-admin.sidebar-item route="admin.dashboard" icon="dashboard">Dashboard</x-admin.sidebar-item>
        <x-admin.sidebar-item route="admin.projects.index" icon="rocket_launch">Projects</x-admin.sidebar-item>
        <x-admin.sidebar-item route="admin.inquiries.index" icon="mail">Inquiries</x-admin.sidebar-item>

        <div class="mt-10 px-8 mb-4">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 opacity-60">Operations</span>
        </div>
        
        <x-admin.sidebar-item route="admin.employees.index" icon="group">Team Members</x-admin.sidebar-item>
        <x-admin.sidebar-item route="admin.services.index" icon="layers">Services</x-admin.sidebar-item>
        
        <div class="mt-10 px-8 mb-4">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 opacity-60">Content</span>
        </div>

        <x-admin.sidebar-item route="admin.pages.index" icon="article">Pages</x-admin.sidebar-item>
        <x-admin.sidebar-item route="admin.menus.index" icon="menu">Navigation</x-admin.sidebar-item>
        <x-admin.sidebar-item route="portfolio.index" icon="photo_library">Portfolio</x-admin.sidebar-item>
        <x-admin.sidebar-item route="admin.settings.index" icon="settings">Settings</x-admin.sidebar-item>
    </nav>

    <!-- User Profile Card -->
    <div class="px-4 py-6 border-t border-white/5 mt-auto">
        <div class="flex items-center gap-3 p-4 rounded-2xl bg-white/5 border border-white/10 group">
            <div class="w-9 h-9 rounded-xl bg-primary text-white flex items-center justify-center font-bold text-xs shadow-lg shadow-primary/20">
                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </div>
            <div class="flex flex-col min-w-0">
                <span class="text-[11px] font-black text-white truncate uppercase tracking-widest">System Admin</span>
                <span class="text-[10px] text-slate-500 font-bold truncate mt-0.5">{{ Auth::user()->name }}</span>
            </div>
        </div>
        
        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 py-3 text-[11px] font-bold text-slate-500 hover:text-rose-400 transition-colors group">
                <span class="material-symbols-outlined text-sm">logout</span>
                Logout
            </button>
        </form>
    </div>
</aside>
