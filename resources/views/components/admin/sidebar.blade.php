<aside
    class="h-screen w-64 fixed left-0 top-0 bg-white flex flex-col border-r border-slate-100 z-50 transform transition-transform duration-300 lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
    
    <!-- Logo -->
    <div class="px-6 py-6 flex items-center gap-3">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
            <div class="w-9 h-9 rounded-xl overflow-hidden flex-shrink-0 border border-slate-100 p-1.5 bg-white shadow-sm">
                <img alt="Logo" class="w-full h-full object-contain"
                     src="{{ asset(\App\Models\Setting::get('site_logo', 'uploads/assets/logo.svg')) }}" />
            </div>
            <span class="text-lg font-extrabold tracking-tight text-slate-900">
                Programmers<span class="text-primary">In</span>
            </span>
        </a>
    </div>

    <nav class="flex-1 overflow-y-auto px-3 pt-2 pb-6 flex flex-col">
        <p class="px-3 mb-2 text-[10px] font-semibold uppercase tracking-wider text-slate-400">Menu</p>
        
        <x-admin.sidebar-item route="admin.dashboard" icon="space_dashboard">Dashboard</x-admin.sidebar-item>
        <x-admin.sidebar-item route="admin.projects.index" icon="folder_open">Projects</x-admin.sidebar-item>
        <x-admin.sidebar-item route="admin.inquiries.index" icon="inbox">Inquiries</x-admin.sidebar-item>

        <p class="px-3 mt-6 mb-2 text-[10px] font-semibold uppercase tracking-wider text-slate-400">Manage</p>
        
        <x-admin.sidebar-item route="admin.employees.index" icon="people">Team</x-admin.sidebar-item>
        <x-admin.sidebar-item route="admin.services.index" icon="widgets">Services</x-admin.sidebar-item>

        <p class="px-3 mt-6 mb-2 text-[10px] font-semibold uppercase tracking-wider text-slate-400">Content</p>

        <x-admin.sidebar-item route="admin.pages.index" icon="description">Pages</x-admin.sidebar-item>
        <x-admin.sidebar-item route="admin.menus.index" icon="menu_open">Navigation</x-admin.sidebar-item>
        <x-admin.sidebar-item route="portfolio.index" icon="photo_library">Portfolio</x-admin.sidebar-item>
        
        <div class="mt-auto"></div>
        
        <x-admin.sidebar-item route="admin.settings.index" icon="tune">Settings</x-admin.sidebar-item>
    </nav>

    <!-- User & Logout -->
    <div class="px-4 py-4 border-t border-slate-100">
        <div class="flex items-center gap-3 px-2 py-2">
            <div class="w-8 h-8 rounded-lg bg-primary text-white flex items-center justify-center font-bold text-xs flex-shrink-0">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="flex flex-col min-w-0">
                <span class="text-sm font-semibold text-slate-900 truncate">{{ Auth::user()->name }}</span>
                <span class="text-[11px] text-slate-400 truncate capitalize">{{ Auth::user()->role }}</span>
            </div>
        </div>
        
        <form action="{{ route('logout') }}" method="POST" class="mt-2">
            @csrf
            <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-red-600 hover:bg-red-50 transition-colors">
                <span class="material-symbols-outlined text-lg">logout</span>
                Log out
            </button>
        </form>
    </div>
</aside>
