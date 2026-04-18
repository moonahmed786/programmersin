<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', \App\Models\Setting::get('meta_title', 'ProgrammersIn | AI-First Software Velocity'))</title>
    <meta name="description" content="@yield('meta_description', \App\Models\Setting::get('meta_description'))">
    <meta name="keywords" content="@yield('meta_keywords', \App\Models\Setting::get('meta_keywords'))">
    <link rel="icon" type="image/svg+xml" href="{{ \App\Models\Setting::get('site_logo', asset('uploads/assets/logo.svg')) }}">
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    
    @vite(['resources/css/app.css'])
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0283c5",
                        "on-primary": "#ffffff",
                        "primary-container": "#d9f1ff",
                        "secondary": "#5ABB4A",
                        "on-secondary": "#ffffff",
                        "tertiary": "#A1F992",
                        "on-tertiary": "#161616",
                        "surface": "#ffffff",
                        "on-surface": "#161616",
                        "node-dark": "#0F172A",
                        "surface-container": "#f4f9fc",
                        "surface-container-low": "#f8fbfe",
                        "surface-container-high": "#e9f4fb",
                        "on-surface-variant": "#424654",
                        "outline": "#737785",
                        "outline-variant": "#e1e4ef",
                    },
                    borderRadius: {
                        "node": "1rem",
                        "stellar": "1.25rem",
                    },
                    fontFamily: {
                        "inter": ["Inter", "sans-serif"],
                        "body": ["Inter", "sans-serif"],
                        "headline": ["Inter", "sans-serif"],
                        "label": ["Inter", "sans-serif"],
                    }
                }
            }
        };
    </script>
    @stack('styles')
</head>
<body class="bg-node-dark font-body text-slate-300 antialiased">
@unless(View::hasSection('no-nav'))
    <x-frontend.header />
@endunless
    
    <main>
        @yield('content')
    </main>

@unless(View::hasSection('no-nav'))
    <x-frontend.footer />
@endunless
    
    @stack('scripts')
</body>
</html>
