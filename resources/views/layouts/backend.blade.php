<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-node-dark text-slate-300 antialiased font-inter" x-data="{ sidebarOpen: false }">

    <x-admin.sidebar />

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col min-h-screen relative overflow-hidden transition-all duration-300 lg:ml-72">
        <!-- Abstract background elements for atmosphere -->
        <div class="absolute -top-24 -right-24 w-[600px] h-[600px] bg-primary/10 rounded-full blur-[150px] pointer-events-none"></div>
        <div class="absolute bottom-0 -left-24 w-[600px] h-[600px] bg-tertiary/10 rounded-full blur-[150px] pointer-events-none"></div>

        <x-admin.navbar :title="$title ?? 'Dashboard'" :subtitle="$subtitle ?? 'Overview'" />

        <!-- Scrollable Content -->
        <div class="flex-1 p-6 md:p-10 mt-2 animate-in-fade relative z-10">
            @yield('content')
        </div>
    </main>

    <!-- Overlay for mobile sidebar -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-40 lg:hidden">
    </div>
</body>
</html>