<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Programmers.in') }} | Backend</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
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

        /* Background decorative blobs — NEVER block clicks */
        .bg-decor {
            position: fixed;
            border-radius: 50%;
            filter: blur(120px);
            pointer-events: none !important;
            z-index: 0;
        }
    </style>

    <link rel="icon" type="image/svg+xml" href="{{ \App\Models\Setting::get('site_logo', asset('uploads/assets/logo.svg')) }}">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-on-surface antialiased font-inter overflow-x-hidden" x-data="{ sidebarOpen: false }">

    <x-admin.sidebar />

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col min-h-screen relative transition-all duration-300 lg:ml-64">
        <!-- Decorative background blobs — pointer-events: none ensures they never block clicks -->
        <div class="bg-decor" style="top: -160px; right: -160px; width: 800px; height: 800px; background: rgba(0,118,255,0.04);"></div>
        <div class="bg-decor" style="top: 50%; left: -160px; width: 600px; height: 600px; background: rgba(0,229,255,0.04);"></div>

        <x-admin.navbar :title="$title ?? 'Dashboard'" :subtitle="$subtitle ?? 'Overview'" />

        <!-- Scrollable Content — NO opacity animation, content is always visible -->
        <div class="flex-1 p-6 md:p-10 relative z-10 w-full max-w-full">
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
         class="fixed inset-0 bg-slate-900/10 backdrop-blur-sm z-40 lg:hidden">
    </div>
</body>
</html>