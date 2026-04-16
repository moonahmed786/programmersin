<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Programmers.in') }} | Backend</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>

    <link rel="icon" type="image/svg+xml" href="{{ \App\Models\Setting::get('site_logo', asset('uploads/assets/logo.svg')) }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F8FAFC] text-slate-800 antialiased font-inter">

    <!-- Sidebar -->
    <aside
        class="h-screen w-72 min-w-[288px] fixed left-0 top-0 bg-white flex flex-col border-r border-slate-100 tracking-tight z-50">
        <!-- Logo Area -->
        <div class="px-10 py-10 flex items-center gap-5">
            <div class="w-12 h-12 rounded-2xl bg-slate-900 flex items-center justify-center text-white shadow-2xl shadow-slate-900/10 overflow-hidden flex-shrink-0 group hover:scale-110 transition-transform duration-500">
                <img alt="Pi Logo" class="w-2/3 h-2/3 object-contain group-hover:rotate-12 transition-transform duration-500" src="{{ \App\Models\Setting::get('site_logo', asset('uploads/assets/logo.svg')) }}" />
            </div>
            <div class="flex flex-col">
                <span class="text-xl font-black tracking-tighter text-slate-900 uppercase italic">
                    <span class="text-gradient">Agency</span>
                </span>
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-[0.4em] -mt-0.5">Intelligence</span>
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto pb-8 flex flex-col mt-4">
            <div class="px-10 flex items-center justify-between mb-6">
                <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-300">Command Center</span>
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            </div>
            
            @php $currentRoute = Route::currentRouteName(); @endphp
            
            <a href="{{ auth()->user()->dashboardRoute() }}"
                class="sidebar-link {{ str_contains($currentRoute, 'dashboard') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' {{ str_contains($currentRoute, 'dashboard') ? '1' : '0' }};">grid_view</span>
                <span class="text-sm tracking-tight">Velocity Hub</span>
            </a>
            
            <a href="{{ route('admin.projects.index') }}"
                class="sidebar-link {{ str_contains($currentRoute, 'projects') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' {{ str_contains($currentRoute, 'projects') ? '1' : '0' }};">rocket_launch</span>
                <span class="text-sm tracking-tight">Engagements</span>
            </a>
            
            <a href="{{ route('admin.inquiries.index') }}"
                class="sidebar-link {{ str_contains($currentRoute, 'inquiries') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' {{ str_contains($currentRoute, 'inquiries') ? '1' : '0' }};">monitor_heart</span>
                <span class="text-sm tracking-tight">Registry Feed</span>
            </a>

            <div class="mt-12 px-10 mb-6">
                <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-300">Engineering</span>
            </div>
            
            <a href="{{ route('admin.services.index') }}"
                class="sidebar-link {{ str_contains($currentRoute, 'services') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' {{ str_contains($currentRoute, 'services') ? '1' : '0' }};">layers</span>
                <span class="text-sm tracking-tight">Service Units</span>
            </a>
            
            <a href="{{ route('portfolio.index') }}"
                class="sidebar-link">
                <span class="material-symbols-outlined text-xl">auto_awesome_motion</span>
                <span class="text-sm tracking-tight">Public Nodes</span>
            </a>

            <a href="{{ route('admin.settings.index') }}"
                class="sidebar-link {{ str_contains($currentRoute, 'settings') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' {{ str_contains($currentRoute, 'settings') ? '1' : '0' }};">settings_input_component</span>
                <span class="text-sm tracking-tight">Core Protocol</span>
            </a>
        </nav>

        <!-- User Profile Card -->
        <div class="px-6 py-8 border-t border-slate-50 mt-auto">
            <div class="flex items-center gap-4 p-5 rounded-3xl bg-slate-50 border border-slate-100 transition-all cursor-pointer group hover:bg-white hover:shadow-2xl hover:shadow-primary/10">
                <div class="w-11 h-11 rounded-2xl glass-surface flex items-center justify-center text-primary font-black text-xs shadow-lg group-hover:scale-110 transition-transform duration-500">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                <div class="flex flex-col min-w-0">
                    <span class="text-xs font-black text-slate-900 truncate">Lead Specialist</span>
                    <span class="text-[10px] text-slate-400 font-bold truncate opacity-60">{{ Auth::user()->name }}</span>
                </div>
            </div>
            
            <form action="{{ route('logout') }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-3 py-4 text-[10px] font-black uppercase tracking-[0.2em] text-slate-300 hover:text-red-500 transition-all group">
                    <span class="material-symbols-outlined text-sm group-hover:-translate-x-1 transition-transform">logout</span>
                    Disconnect Node
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="ml-72 flex-1 flex flex-col min-h-screen">
        <!-- Floating Glass Header -->
        <header class="floating-header">
            <div class="flex items-center gap-6">
                <!-- Breadcrumbs -->
                <nav class="flex items-center gap-3">
                    <a href="#" class="text-xs font-bold text-primary tracking-tight">System Registry</a>
                    <span class="text-slate-300 transform rotate-12 text-[10px]">/</span>
                    <span class="text-xs font-semibold text-slate-400 tracking-tight italic">Root Console</span>
                </nav>
            </div>

            <div class="flex items-center gap-8">
                <!-- Systems Nominal Indicator -->
                <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-100 px-5 py-2 rounded-full">
                    <div class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></div>
                    <span class="text-[9px] font-black uppercase tracking-[0.2em] text-emerald-600">Operational</span>
                </div>

                <div class="h-6 w-px bg-slate-100"></div>
                
                <button class="btn-stellar">
                    <span class="material-symbols-outlined text-xs">add</span>
                    New Engagement
                </button>
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 p-10 mt-2 animate-in-fade">
            @yield('content')
        </div>
    </main>
</body>
</html>