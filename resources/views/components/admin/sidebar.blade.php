<aside
    class="h-screen w-72 min-w-[288px] fixed left-0 top-0 bg-white flex flex-col border-r border-slate-200 tracking-tight z-50 transform transition-transform duration-300 lg:translate-x-0 overflow-hidden"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
    
    <!-- Logo Area -->
    <div class="px-8 py-10 flex items-center gap-4 border-b border-slate-50">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
            <div class="w-11 h-11 rounded-2xl overflow-hidden flex-shrink-0 shadow-md shadow-primary/5 transition-all duration-300 group-hover:scale-105 border border-slate-100 p-1.5 bg-slate-50">
                <img alt="ProgrammersIn Logo"
                     class="w-full h-full object-contain"
                     src="{{ asset(\App\Models\Setting::get('site_logo', 'uploads/assets/logo.svg')) }}" />
            </div>
            <div class="flex flex-col">
                <span class="text-xl font-black tracking-tighter text-on-surface leading-none">
                    Programmers<span class="text-primary italic">In</span>
                </span>
                <span class="text-[9px] font-black text-slate-400 mt-1 uppercase tracking-widest leading-none">Admin Console</span>
            </div>
        </a>
    </div>

    <nav class="flex-1 overflow-y-auto pb-8 flex flex-col mt-8">
        <div class="px-10 flex items-center justify-between mb-4">
            <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Main Console</span>
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.3)]"></span>
        </div>
        
        <x-admin.sidebar-item route="admin.dashboard" icon="dashboard">Dashboard</x-admin.sidebar-item>
        <x-admin.sidebar-item route="admin.projects.index" icon="rocket_launch">Projects</x-admin.sidebar-item>
        <x-admin.sidebar-item route="admin.inquiries.index" icon="mail">Inquiries</x-admin.sidebar-item>

        <div class="mt-12 px-10 mb-4">
            <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Operations</span>
        </div>
        
        <x-admin.sidebar-item route="admin.employees.index" icon="group">Team Members</x-admin.sidebar-item>
        <x-admin.sidebar-item route="admin.services.index" icon="layers">Services</x-admin.sidebar-item>
        
        <div class="mt-12 px-10 mb-4">
            <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Content Hub</span>
        </div>

        <x-admin.sidebar-item route="admin.pages.index" icon="article">Pages</x-admin.sidebar-item>
        <x-admin.sidebar-item route="admin.menus.index" icon="menu">Navigation</x-admin.sidebar-item>
        <x-admin.sidebar-item route="portfolio.index" icon="photo_library">Portfolio</x-admin.sidebar-item>
        <x-admin.sidebar-item route="admin.settings.index" icon="settings">Settings</x-admin.sidebar-item>
    </nav>

    <!-- User Profile Card -->
    <div class="px-6 py-8 border-t border-slate-50 mt-auto bg-slate-50/30">
        <div class="flex items-center gap-4 p-4 rounded-2xl bg-white border border-slate-200 shadow-sm transition-all hover:shadow-md group">
            <div class="w-10 h-10 rounded-xl bg-primary text-white flex items-center justify-center font-black text-[11px] shadow-lg shadow-primary/10">
                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </div>
            <div class="flex flex-col min-w-0">
                <span class="text-[11px] font-black text-on-surface truncate uppercase tracking-widest">System Admin</span>
                <span class="text-[10px] text-slate-500 font-bold truncate mt-0.5">{{ Auth::user()->name }}</span>
            </div>
        </div>
        
        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 py-3 text-[10px] font-black text-slate-400 hover:text-rose-600 transition-colors group uppercase tracking-widest">
                <span class="material-symbols-outlined text-[16px]">logout</span>
                Secure Logout
            </button>
        </form>
    </div>
</aside>
