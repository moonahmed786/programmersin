<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Pricing | Programmers.in</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface": "#f8f9ff",
                        "on-error": "#ffffff",
                        "surface-container": "#e5eeff",
                        "primary-fixed-dim": "#b2c5ff",
                        "tertiary-fixed": "#89f5e7",
                        "surface-container-high": "#dce9ff",
                        "inverse-on-surface": "#eaf1ff",
                        "on-secondary": "#ffffff",
                        "primary": "#0040a1",
                        "on-surface-variant": "#424654",
                        "surface-variant": "#d3e4fe",
                        "surface-container-low": "#eff4ff",
                        "on-tertiary-fixed-variant": "#005049",
                        "primary-fixed": "#dae2ff",
                        "tertiary": "#00514a",
                        "outline": "#737785",
                        "on-surface": "#0b1c30",
                        "on-secondary-fixed": "#0d1c2e",
                        "secondary": "#515f74",
                        "tertiary-fixed-dim": "#6bd8cb",
                        "surface-container-highest": "#d3e4fe",
                        "on-tertiary-fixed": "#00201d",
                        "on-primary-fixed": "#001847",
                        "secondary-container": "#d5e3fc",
                        "outline-variant": "#c3c6d6",
                        "on-background": "#0b1c30",
                        "error-container": "#ffdad6",
                        "surface-container-lowest": "#ffffff",
                        "secondary-fixed-dim": "#b9c7df",
                        "on-secondary-fixed-variant": "#3a485b",
                        "on-primary": "#ffffff",
                        "surface-bright": "#f8f9ff",
                        "on-tertiary": "#ffffff",
                        "surface-dim": "#cbdbf5",
                        "primary-container": "#0056d2",
                        "secondary-container": "#d5e3fc",
                        "inverse-surface": "#213145",
                        "on-primary-fixed-variant": "#0040a1",
                        "on-secondary-container": "#57657a",
                        "background": "#f8f9ff",
                        "error": "#ba1a1a",
                        "inverse-primary": "#b2c5ff",
                        "on-tertiary-container": "#7fecde",
                        "on-error-container": "#93000a",
                        "tertiary-container": "#006b62",
                        "surface-tint": "#0056d2",
                        "on-primary-container": "#ccd8ff"
                    },
                    fontFamily: {
                        "headline": ["Inter", "sans-serif"],
                        "body": ["Inter", "sans-serif"],
                        "label": ["Inter", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" },
                },
            },
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .glass-header {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .primary-gradient {
            background: linear-gradient(135deg, #0040a1 0%, #0056d2 100%);
        }
        .text-balance {
            text-wrap: balance;
        }
    </style>
</head>
<body class="bg-surface font-body text-on-surface selection:bg-primary-fixed selection:text-on-primary-fixed">
<!-- Top Navigation Bar -->
<nav class="sticky top-0 w-full z-50 bg-white/70 backdrop-blur-md shadow-sm">
<div class="flex justify-between items-center px-8 py-4 max-w-7xl mx-auto">
<div class="text-xl font-bold tracking-tighter text-slate-900">Programmers.in</div>
<!-- Desktop Links -->
<div class="hidden md:flex items-center space-x-8 font-inter body-md tracking-tight">
<a class="text-slate-600 hover:text-blue-600 transition-colors" href="#">Services</a>
<a class="text-slate-600 hover:text-blue-600 transition-colors" href="#">Products</a>
<a class="text-blue-700 font-semibold border-b-2 border-blue-700" href="#">Pricing</a>
<button class="primary-gradient text-on-primary px-6 py-2 rounded-lg font-semibold scale-95 hover:scale-100 duration-200 ease-in-out">
                    Get Started
                </button>
</div>
<!-- Mobile Menu Icon (Placeholder) -->
<div class="md:hidden">
<span class="material-symbols-outlined">menu</span>
</div>
</div>
</nav>
<main class="max-w-7xl mx-auto px-8 py-20">
<!-- Hero Section -->
<header class="text-center mb-24 max-w-3xl mx-auto">
<h1 class="text-5xl md:text-6xl font-black tracking-tighter text-on-surface mb-6 leading-tight">
                Flexible Solutions for Every Stage.
            </h1>
<p class="text-on-surface-variant text-lg leading-relaxed text-balance">
                Scale your technical infrastructure with precision. Whether you are a solo founder or a global enterprise, our plans evolve as you do.
            </p>
<!-- Toggle Selector -->
<div class="mt-12 inline-flex items-center p-1 bg-surface-container rounded-full">
<button class="px-6 py-2 rounded-full text-sm font-semibold bg-surface-container-lowest text-primary shadow-sm">Monthly</button>
<button class="px-6 py-2 rounded-full text-sm font-semibold text-on-surface-variant hover:text-primary transition-colors">Yearly <span class="text-tertiary ml-1">-20%</span></button>
</div>
</header>
<!-- Pricing Bento Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
<!-- Startup Tier -->
<div class="bg-surface-container-low rounded-xl p-8 transition-transform hover:-translate-y-1 duration-300">
<div class="mb-8">
<h3 class="label-md tracking-wide uppercase font-inter text-slate-500 mb-2">Startup</h3>
<div class="flex items-baseline gap-1">
<span class="text-4xl font-bold text-on-surface tracking-tight">$49</span>
<span class="text-on-surface-variant">/mo</span>
</div>
<p class="mt-4 text-on-surface-variant text-sm">Perfect for early-stage teams launching their first MVP.</p>
</div>
<div class="space-y-4 mb-10">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary text-lg" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="text-on-surface-variant text-sm">Up to 3 Dedicated Developers</span>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary text-lg" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="text-on-surface-variant text-sm">Git-based CI/CD Workflow</span>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary text-lg" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="text-on-surface-variant text-sm">48-hour Support Turnaround</span>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-outline-variant text-lg">cancel</span>
<span class="text-outline text-sm">Advanced Security Audits</span>
</div>
</div>
<button class="w-full py-4 rounded-lg font-semibold border-2 border-primary text-primary hover:bg-primary-fixed/30 transition-all">
                    Get Started
                </button>
</div>
<!-- Corporate Tier (Highlighted) -->
<div class="relative bg-surface-container-lowest rounded-xl p-8 ring-4 ring-primary-container shadow-2xl transition-transform hover:-translate-y-2 duration-300">
<div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-primary px-4 py-1 rounded-full text-white text-xs font-bold tracking-widest uppercase">
                    Most Popular
                </div>
<div class="mb-8">
<h3 class="label-md tracking-wide uppercase font-inter text-primary mb-2">Corporate</h3>
<div class="flex items-baseline gap-1">
<span class="text-5xl font-extrabold text-on-surface tracking-tight">$199</span>
<span class="text-on-surface-variant">/mo</span>
</div>
<p class="mt-4 text-on-surface-variant text-sm">The ideal balance for growing companies with scaling needs.</p>
</div>
<div class="space-y-4 mb-10">
<div class="flex items-center gap-3">
<div class="w-1.5 h-1.5 rounded-full bg-tertiary"></div>
<span class="text-on-surface font-medium text-sm">Up to 10 Dedicated Developers</span>
</div>
<div class="flex items-center gap-3">
<div class="w-1.5 h-1.5 rounded-full bg-tertiary"></div>
<span class="text-on-surface font-medium text-sm">Priority Infrastructure Management</span>
</div>
<div class="flex items-center gap-3">
<div class="w-1.5 h-1.5 rounded-full bg-tertiary"></div>
<span class="text-on-surface font-medium text-sm">Custom API Integrations</span>
</div>
<div class="flex items-center gap-3">
<div class="w-1.5 h-1.5 rounded-full bg-tertiary"></div>
<span class="text-on-surface font-medium text-sm">24/7 Priority Chat Support</span>
</div>
<div class="flex items-center gap-3">
<div class="w-1.5 h-1.5 rounded-full bg-tertiary"></div>
<span class="text-on-surface font-medium text-sm">Monthly Performance Reviews</span>
</div>
</div>
<button class="w-full py-4 rounded-lg font-bold primary-gradient text-on-primary shadow-lg shadow-primary/20 hover:shadow-primary/40 transition-all">
                    Get Started Now
                </button>
</div>
<!-- Enterprise Tier -->
<div class="bg-surface-container-low rounded-xl p-8 transition-transform hover:-translate-y-1 duration-300">
<div class="mb-8">
<h3 class="label-md tracking-wide uppercase font-inter text-slate-500 mb-2">Enterprise</h3>
<div class="flex items-baseline gap-1">
<span class="text-4xl font-bold text-on-surface tracking-tight">Custom</span>
</div>
<p class="mt-4 text-on-surface-variant text-sm">Dedicated infrastructure for global-scale operations.</p>
</div>
<div class="space-y-4 mb-10">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary text-lg" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="text-on-surface-variant text-sm">Unlimited Developers &amp; Resources</span>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary text-lg" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="text-on-surface-variant text-sm">Bespoke Security &amp; Compliance</span>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary text-lg" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="text-on-surface-variant text-sm">Dedicated Account Architect</span>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary text-lg" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="text-on-surface-variant text-sm">On-Premise Deployment Options</span>
</div>
</div>
<button class="w-full py-4 rounded-lg font-semibold bg-inverse-surface text-inverse-on-surface hover:opacity-90 transition-all">
                    Contact Sales
                </button>
</div>
</div>
<!-- Comparison Section -->
<section class="mt-32">
<h2 class="text-3xl font-bold text-center mb-16">Compare detailed features</h2>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-high">
<th class="px-6 py-4 label-md text-on-surface-variant rounded-tl-lg">Feature</th>
<th class="px-6 py-4 label-md text-on-surface-variant">Startup</th>
<th class="px-6 py-4 label-md text-on-surface-variant">Corporate</th>
<th class="px-6 py-4 label-md text-on-surface-variant rounded-tr-lg">Enterprise</th>
</tr>
</thead>
<tbody class="bg-surface-container-lowest">
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-5 body-md font-medium text-on-surface">Source Code Ownership</td>
<td class="px-6 py-5 text-on-surface-variant"><span class="material-symbols-outlined text-tertiary" style="font-variation-settings: 'FILL' 1;">check</span></td>
<td class="px-6 py-5 text-on-surface-variant"><span class="material-symbols-outlined text-tertiary" style="font-variation-settings: 'FILL' 1;">check</span></td>
<td class="px-6 py-5 text-on-surface-variant"><span class="material-symbols-outlined text-tertiary" style="font-variation-settings: 'FILL' 1;">check</span></td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-5 body-md font-medium text-on-surface">SLA Guarantee</td>
<td class="px-6 py-5 text-on-surface-variant">—</td>
<td class="px-6 py-5 text-on-surface-variant">99.9%</td>
<td class="px-6 py-5 text-on-surface-variant">99.99%</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-5 body-md font-medium text-on-surface">Data Encryption</td>
<td class="px-6 py-5 text-on-surface-variant">Standard</td>
<td class="px-6 py-5 text-on-surface-variant">Advanced (AES-256)</td>
<td class="px-6 py-5 text-on-surface-variant">Full End-to-End</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-5 body-md font-medium text-on-surface">White-label Options</td>
<td class="px-6 py-5 text-on-surface-variant">—</td>
<td class="px-6 py-5 text-on-surface-variant"><span class="material-symbols-outlined text-tertiary" style="font-variation-settings: 'FILL' 1;">check</span></td>
<td class="px-6 py-5 text-on-surface-variant"><span class="material-symbols-outlined text-tertiary" style="font-variation-settings: 'FILL' 1;">check</span></td>
</tr>
</tbody>
</table>
</div>
</section>
<!-- FAQ Mini Section -->
<section class="mt-32 grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">
<div class="bg-surface-container-low p-8 rounded-xl">
<h4 class="font-bold text-lg mb-4">Can I change plans anytime?</h4>
<p class="text-on-surface-variant text-sm leading-relaxed">Yes, you can upgrade or downgrade your plan at any time. Changes will be reflected in your next billing cycle with prorated adjustments.</p>
</div>
<div class="bg-surface-container-low p-8 rounded-xl">
<h4 class="font-bold text-lg mb-4">What kind of support is included?</h4>
<p class="text-on-surface-variant text-sm leading-relaxed">All plans include access to our documentation and community forums. Paid plans include direct email or chat support with varying response times.</p>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-slate-50 border-t border-slate-200 mt-24">
<div class="grid grid-cols-1 md:grid-cols-4 gap-12 px-8 py-16 max-w-7xl mx-auto">
<div class="space-y-4">
<div class="text-lg font-black text-slate-900">Programmers.in</div>
<p class="text-slate-500 text-sm">Building the future of software development, one precision-engineered solution at a time.</p>
</div>
<div>
<h5 class="label-md tracking-wide uppercase font-inter text-slate-500 mb-6">Services</h5>
<ul class="space-y-4 text-sm font-medium text-slate-500">
<li><a class="hover:text-blue-700 transition-all" href="#">Web Development</a></li>
<li><a class="hover:text-blue-700 transition-all" href="#">Mobile Apps</a></li>
<li><a class="hover:text-blue-700 transition-all" href="#">Cloud Engineering</a></li>
</ul>
</div>
<div>
<h5 class="label-md tracking-wide uppercase font-inter text-slate-500 mb-6">Company</h5>
<ul class="space-y-4 text-sm font-medium text-slate-500">
<li><a class="hover:text-blue-700 transition-all" href="#">About Us</a></li>
<li><a class="hover:text-blue-700 transition-all" href="#">Contact</a></li>
<li><a class="hover:text-blue-700 transition-all" href="#">Privacy Policy</a></li>
</ul>
</div>
<div>
<h5 class="label-md tracking-wide uppercase font-inter text-slate-500 mb-6">Newsletter</h5>
<div class="flex gap-2">
<input class="bg-white border-none rounded-lg px-4 py-2 w-full text-sm ring-1 ring-slate-200 focus:ring-2 focus:ring-primary outline-none" placeholder="Email" type="email"/>
<button class="primary-gradient p-2 rounded-lg text-white">
<span class="material-symbols-outlined">send</span>
</button>
</div>
</div>
</div>
<div class="max-w-7xl mx-auto px-8 py-8 border-t border-slate-100">
<p class="text-slate-400 text-xs text-center">© 2024 Programmers.in. All rights reserved.</p>
</div>
</footer>
</body></html>