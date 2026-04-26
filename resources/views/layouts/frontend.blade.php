<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', \App\Models\Setting::get('meta_title', 'ProgrammersIn | AI-First Software Velocity'))</title>
    <meta name="description" content="@yield('meta_description', \App\Models\Setting::get('meta_description'))">
    <meta name="keywords" content="@yield('meta_keywords', \App\Models\Setting::get('meta_keywords'))">
    <link rel="icon" type="image/svg+xml" href="{{ \App\Models\Setting::logoUrl() }}">
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
    <style>
    /* ══════════════════════════════════════════════════
       GLOBAL BLUE DESIGN SYSTEM — programmersin.com
    ══════════════════════════════════════════════════ */
    body { background-color:#030c1a; background-image:radial-gradient(ellipse 80% 60% at 20% -10%,rgba(2,131,197,.09) 0%,transparent 60%),radial-gradient(ellipse 60% 50% at 80% 110%,rgba(2,131,197,.06) 0%,transparent 60%); }

    /* ── Keyframes ── */
    @keyframes morph-blob { 0%,100%{border-radius:42% 58% 70% 30%/45% 55% 45% 55%;transform:translate(0,0) scale(1)} 33%{border-radius:70% 30% 46% 54%/30% 60% 40% 70%;transform:translate(20px,-15px) scale(1.04)} 66%{border-radius:30% 70% 60% 40%/50% 40% 60% 50%;transform:translate(-15px,20px) scale(.97)} }
    @keyframes shimmer-flow { 0%{background-position:-400% center} 100%{background-position:400% center} }
    @keyframes border-spin { 0%{transform:rotate(0deg)} 100%{transform:rotate(360deg)} }
    @keyframes rise { 0%{transform:translateY(100vh) translateX(0) scale(0);opacity:0} 6%{opacity:.7} 94%{opacity:.25} 100%{transform:translateY(-80px) translateX(var(--dx,20px)) scale(.4);opacity:0} }
    @keyframes dot-pulse { 0%,100%{transform:scale(1);opacity:.7} 50%{transform:scale(1.5);opacity:1} }
    @keyframes scan-line { 0%{transform:translateY(-100%)} 100%{transform:translateY(100vh)} }
    @keyframes count-pop { 0%{transform:scale(1)} 50%{transform:scale(1.12)} 100%{transform:scale(1)} }
    @keyframes glow-border-anim { 0%,100%{box-shadow:0 0 20px rgba(2,131,197,.3),0 0 60px rgba(2,131,197,.1)} 50%{box-shadow:0 0 40px rgba(2,131,197,.6),0 0 80px rgba(2,131,197,.25),inset 0 0 20px rgba(2,131,197,.05)} }
    @keyframes float-up   { 0%,100%{transform:translateY(0)}   50%{transform:translateY(-18px)} }
    @keyframes float-down { 0%,100%{transform:translateY(0)}   50%{transform:translateY(14px)} }
    @keyframes orbit-cw   { from{transform:rotate(0deg)}   to{transform:rotate(360deg)} }
    @keyframes orbit-ccw  { from{transform:rotate(0deg)}   to{transform:rotate(-360deg)} }
    @keyframes cube-spin  { 0%{transform:rotateX(15deg) rotateY(0deg)} 100%{transform:rotateX(375deg) rotateY(360deg)} }
    @keyframes ticker     { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }
    @keyframes slide-up   { from{opacity:0;transform:translateY(36px)}  to{opacity:1;transform:translateY(0)} }
    @keyframes slide-left { from{opacity:0;transform:translateX(-36px)} to{opacity:1;transform:translateX(0)} }
    @keyframes slide-right{ from{opacity:0;transform:translateX(36px)}  to{opacity:1;transform:translateX(0)} }

    /* ── Gradient text ── */
    .text-grd      { background:linear-gradient(135deg,#93c5fd 0%,#0283c5 45%,#22d3ee 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }
    .text-grd-warm { background:linear-gradient(135deg,#60a5fa,#38bdf8); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }
    .text-grd-green{ background:linear-gradient(135deg,#86efac,#5ABB4A); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }
    .text-shimmer  { background:linear-gradient(90deg,rgba(255,255,255,.65) 0%,rgba(56,189,248,1) 30%,rgba(255,255,255,1) 50%,rgba(56,189,248,1) 70%,rgba(255,255,255,.65) 100%); background-size:400% auto; -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; animation:shimmer-flow 5s linear infinite; }

    /* ── Blue glass cards ── */
    .card-blue  { background:rgba(2,131,197,.045); border:1px solid rgba(2,131,197,.13); transition:background .3s,border-color .3s,box-shadow .35s,transform .35s; }
    .card-blue:hover { background:rgba(2,131,197,.08); border-color:rgba(2,131,197,.28); box-shadow:0 24px 70px rgba(0,0,0,.55),0 0 50px rgba(2,131,197,.14),inset 0 1px 0 rgba(255,255,255,.04); transform:translateY(-5px); }
    .card-blue-hot { background:rgba(2,131,197,.1); border:1px solid rgba(2,131,197,.3); box-shadow:0 0 60px rgba(2,131,197,.18),0 20px 60px rgba(0,0,0,.5); animation:glow-border-anim 3s ease-in-out infinite; }
    .card-glass { background:rgba(255,255,255,.025); border:1px solid rgba(255,255,255,.06); }

    /* ── Glowing CTA button ── */
    .btn-glow { position:relative; overflow:hidden; box-shadow:0 0 25px rgba(2,131,197,.4),0 4px 20px rgba(2,131,197,.2); transition:box-shadow .3s,transform .15s; }
    .btn-glow:hover { box-shadow:0 0 50px rgba(2,131,197,.65),0 8px 35px rgba(2,131,197,.3); transform:translateY(-2px); }
    .btn-glow::after { content:''; position:absolute; inset:0; background:linear-gradient(135deg,rgba(255,255,255,.15) 0%,transparent 100%); pointer-events:none; }

    /* ── Dots / patterns ── */
    .bg-dots  { background-image:radial-gradient(circle,rgba(2,131,197,.07) 1px,transparent 1px); background-size:30px 30px; }
    .bg-grid  { background-image:linear-gradient(rgba(2,131,197,.04) 1px,transparent 1px),linear-gradient(90deg,rgba(2,131,197,.04) 1px,transparent 1px); background-size:56px 56px; }

    /* ── Section divider ── */
    .blue-divider { height:1px; background:linear-gradient(90deg,transparent 0%,rgba(2,131,197,.3) 20%,rgba(2,131,197,.7) 50%,rgba(2,131,197,.3) 80%,transparent 100%); }
    .accent-bar   { display:block; width:48px; height:3px; background:linear-gradient(90deg,#0283c5,#22d3ee); border-radius:99px; margin-top:14px; }
    .accent-bar-c { margin-left:auto; margin-right:auto; }

    /* ── Reveal ── */
    .reveal   { opacity:0; transform:translateY(28px); transition:opacity .75s ease,transform .75s ease; }
    .reveal.in{ opacity:1; transform:translateY(0); }
    .reveal-l { opacity:0; transform:translateX(-28px); transition:opacity .75s ease,transform .75s ease; }
    .reveal-l.in { opacity:1; transform:translateX(0); }
    .reveal-r { opacity:0; transform:translateX(28px); transition:opacity .75s ease,transform .75s ease; }
    .reveal-r.in { opacity:1; transform:translateX(0); }

    /* ── 3D cube ── */
    .cube-scene { perspective:700px; }
    .cube { transform-style:preserve-3d; animation:cube-spin 22s linear infinite; }
    .cube-face { position:absolute; border:1px solid rgba(2,131,197,.22); background:rgba(2,131,197,.03); }
    .cube-face::after { content:''; position:absolute; inset:28px; border:1px solid rgba(2,131,197,.08); }
    .cf-front  { transform:rotateY(  0deg) translateZ(var(--half,150px)); }
    .cf-back   { transform:rotateY(180deg) translateZ(var(--half,150px)); }
    .cf-right  { transform:rotateY( 90deg) translateZ(var(--half,150px)); }
    .cf-left   { transform:rotateY(-90deg) translateZ(var(--half,150px)); }
    .cf-top    { transform:rotateX( 90deg) translateZ(var(--half,150px)); }
    .cf-bottom { transform:rotateX(-90deg) translateZ(var(--half,150px)); }

    /* ── Orbit rings ── */
    .orbit { position:absolute; border-radius:50%; top:50%; left:50%; transform:translate(-50%,-50%); border:1px solid rgba(2,131,197,.12); }
    .orbit-dot { position:absolute; width:10px; height:10px; border-radius:50%; top:-5px; left:calc(50% - 5px); background:#0283c5; box-shadow:0 0 12px rgba(2,131,197,.9),0 0 24px rgba(2,131,197,.5); }

    /* ── Flip cards ── */
    .flip-card { perspective:1000px; }
    .flip-inner { position:relative; width:100%; height:100%; transform-style:preserve-3d; transition:transform .75s cubic-bezier(.4,0,.2,1); }
    .flip-card:hover .flip-inner { transform:rotateY(180deg); }
    .flip-front,.flip-back { position:absolute; inset:0; backface-visibility:hidden; -webkit-backface-visibility:hidden; border-radius:1rem; }
    .flip-back { transform:rotateY(180deg); }

    /* ── Ticker ── */
    .ticker-wrap { overflow:hidden; }
    .ticker-inner { display:flex; animation:ticker 38s linear infinite; width:max-content; }

    /* ── Glowing dots ── */
    .dot-blue  { width:8px; height:8px; border-radius:50%; background:#0283c5; box-shadow:0 0 8px rgba(2,131,197,.9),0 0 20px rgba(2,131,197,.5); animation:dot-pulse 2s ease-in-out infinite; }
    .dot-green { width:8px; height:8px; border-radius:50%; background:#5ABB4A; box-shadow:0 0 8px rgba(90,187,74,.9),0 0 20px rgba(90,187,74,.5); animation:dot-pulse 2s 1s ease-in-out infinite; }
    </style>
    @stack('styles')
</head>
<body class="font-body text-slate-300 antialiased" style="background-color:#030c1a">
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
