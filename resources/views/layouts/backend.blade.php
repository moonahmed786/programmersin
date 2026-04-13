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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-on-surface antialiased font-inter">

    <!-- Sidebar -->
    <aside
        class="h-screen w-64 fixed left-0 top-0 bg-white dark:bg-slate-900 flex flex-col border-r border-outline-variant/30 tracking-tight z-50">
        <div class="p-6 flex flex-col gap-1">
            <div class="flex items-center gap-3 px-2">
                <div
                    class="w-8 h-8 rounded-lg bg-primary flex items-center justify-center text-on-primary shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-lg">terminal</span>
                </div>
                <div class="flex flex-col">
                    <span
                        class="text-lg font-bold tracking-tighter text-slate-900 dark:text-slate-50">Programmers.in</span>
                    <span class="text-[10px] uppercase tracking-widest text-on-surface-variant font-bold leading-none">
                        @if(auth()->user()->isSuperAdmin()) Agency Admin
                        @elseif(auth()->user()->isEmployee()) Team Portal
                        @else Client Space @endif
                    </span>
                </div>
            </div>
        </div>

        <nav class="flex-1 px-4 mt-4 space-y-1 overflow-y-auto">
            @php
                $role = auth()->user()->role;
                $currentRoute = request()->route()->getName();
            @endphp

            <!-- Dashboard Link (Common) -->
            <a href="{{ auth()->user()->dashboardRoute() }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ str_contains($currentRoute, 'dashboard') ? 'bg-primary text-on-primary shadow-lg shadow-primary/20' : 'text-slate-500 hover:bg-surface-container-low hover:text-primary' }}">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="text-sm font-semibold">Overview</span>
            </a>

            @if(auth()->user()->isSuperAdmin())
                <div class="pt-4 pb-2 px-4 text-[10px] uppercase font-bold text-slate-400 tracking-widest">Management</div>
                <a href="{{ route('admin.projects.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ str_contains($currentRoute, 'projects') ? 'bg-primary text-on-primary shadow-lg shadow-primary/20' : 'text-slate-500 hover:bg-surface-container-low hover:text-primary' }}">
                    <span class="material-symbols-outlined">rocket_launch</span>
                    <span class="text-sm font-semibold">Projects</span>
                </a>
                <a href="{{ route('admin.employees.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ str_contains($currentRoute, 'employees') ? 'bg-primary text-on-primary shadow-lg shadow-primary/20' : 'text-slate-500 hover:bg-surface-container-low hover:text-primary' }}">
                    <span class="material-symbols-outlined">badge</span>
                    <span class="text-sm font-semibold">Employees</span>
                </a>
                <a href="{{ route('admin.services.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ str_contains($currentRoute, 'services') ? 'bg-primary text-on-primary shadow-lg shadow-primary/20' : 'text-slate-500 hover:bg-surface-container-low hover:text-primary' }}">
                    <span class="material-symbols-outlined">settings_suggest</span>
                    <span class="text-sm font-semibold">Services</span>
                </a>
                <a href="{{ route('admin.inquiries.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ str_contains($currentRoute, 'inquiries') ? 'bg-primary text-on-primary shadow-lg shadow-primary/20' : 'text-slate-500 hover:bg-surface-container-low hover:text-primary' }}">
                    <span class="material-symbols-outlined">mail</span>
                    <span class="text-sm font-semibold">Inquiries</span>
                </a>
            @endif

            @if(auth()->user()->isEmployee())
                <div class="pt-4 pb-2 px-4 text-[10px] uppercase font-bold text-slate-400 tracking-widest">Production</div>
                <a href="{{ route('employee.projects.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ str_contains($currentRoute, 'projects') ? 'bg-primary text-on-primary shadow-lg shadow-primary/20' : 'text-slate-500 hover:bg-surface-container-low hover:text-primary' }}">
                    <span class="material-symbols-outlined">work</span>
                    <span class="text-sm font-semibold">Assigned Projects</span>
                </a>
            @endif

            @if(auth()->user()->isCustomer())
                <div class="pt-4 pb-2 px-4 text-[10px] uppercase font-bold text-slate-400 tracking-widest">Workspace</div>
                <a href="{{ route('customer.projects.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ str_contains($currentRoute, 'projects') ? 'bg-primary text-on-primary shadow-lg shadow-primary/20' : 'text-slate-500 hover:bg-surface-container-low hover:text-primary' }}">
                    <span class="material-symbols-outlined">rocket_launch</span>
                    <span class="text-sm font-semibold">My Projects</span>
                </a>
            @endif
        </nav>

        <!-- Logout Section -->
        <div class="p-6 border-t border-outline-variant/20">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 w-full px-4 py-3 text-slate-500 hover:text-error hover:bg-error-container/20 rounded-xl transition-all">
                    <span class="material-symbols-outlined text-sm">logout</span>
                    <span class="text-sm font-bold">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Header Section -->
    <header
        class="fixed top-0 right-0 w-[calc(100%-16rem)] z-40 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md flex items-center justify-between px-8 h-16 border-b border-outline-variant/20 transition-all">
        <div class="flex items-center flex-1 max-w-lg">
            <div class="relative w-full group">
                <span
                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg group-focus-within:text-primary transition-colors">search</span>
                <input
                    class="w-full bg-surface-container-low border-none rounded-xl pl-10 pr-4 py-2 focus:ring-4 focus:ring-primary/10 transition-all text-on-surface text-sm"
                    placeholder="Search and navigate..." type="text" />
            </div>
        </div>
        <div class="flex items-center gap-4">
            <button
                class="p-2 text-slate-500 dark:text-slate-400 hover:bg-surface-container rounded-xl relative transition-all">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 0;">notifications</span>
                <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-error rounded-full ring-2 ring-white"></span>
            </button>
            <div class="h-8 w-[px] bg-outline-variant/30 mx-2"></div>

            <div class="flex items-center gap-3 pl-2">
                <div class="text-right hidden sm:block">
                    <p class="text-xs font-black text-slate-900 dark:text-white leading-none">{{ auth()->user()->name }}
                    </p>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">
                        {{ auth()->user()->role }}
                    </p>
                </div>
                <div
                    class="h-9 w-9 rounded-xl bg-surface-container flex items-center justify-center border border-outline-variant/20 overflow-hidden shadow-sm">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ auth()->user()->name }}" alt="Avatar">
                </div>
            </div>
        </div>
    </header>

    <!-- Content Area -->
    <main class="ml-64 pt-24 pb-12 px-8 min-h-screen">
        @yield('content')
    </main>

</body>

</html>