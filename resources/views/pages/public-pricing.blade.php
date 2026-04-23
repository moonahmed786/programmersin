@extends('layouts.frontend')

@section('content')
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
        <div class="mt-12 inline-flex items-center p-1 bg-surface-container rounded">
            <button class="px-6 py-2 rounded text-sm font-semibold bg-surface-container-lowest text-primary shadow-sm">Monthly</button>
            <button class="px-6 py-2 rounded text-sm font-semibold text-on-surface-variant hover:text-primary transition-colors">Yearly <span class="text-tertiary ml-1">-20%</span></button>
        </div>
    </header>

    <!-- Pricing Bento Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        <!-- Startup Tier -->
        <div class="bg-surface-container-low rounded p-8 transition-transform hover:-translate-y-1 duration-300">
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
            <button class="w-full py-4 rounded font-semibold border-2 border-primary text-primary hover:bg-primary-fixed/30 transition-all">
                Get Started
            </button>
        </div>

        <!-- Corporate Tier (Highlighted) -->
        <div class="relative bg-surface-container-lowest rounded p-8 ring-4 ring-primary-container shadow-2xl transition-transform hover:-translate-y-2 duration-300">
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-primary px-4 py-1 rounded text-white text-xs font-bold tracking-widest uppercase">
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
                    <div class="w-1.5 h-1.5 rounded bg-tertiary"></div>
                    <span class="text-on-surface font-medium text-sm">Up to 10 Dedicated Developers</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-1.5 h-1.5 rounded bg-tertiary"></div>
                    <span class="text-on-surface font-medium text-sm">Priority Infrastructure Management</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-1.5 h-1.5 rounded bg-tertiary"></div>
                    <span class="text-on-surface font-medium text-sm">Custom API Integrations</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-1.5 h-1.5 rounded bg-tertiary"></div>
                    <span class="text-on-surface font-medium text-sm">24/7 Priority Chat Support</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-1.5 h-1.5 rounded bg-tertiary"></div>
                    <span class="text-on-surface font-medium text-sm">Monthly Performance Reviews</span>
                </div>
            </div>
            <button class="w-full py-4 rounded font-bold bg-primary text-on-primary shadow-lg shadow-primary/20 hover:shadow-primary/40 transition-all">
                Get Started Now
            </button>
        </div>

        <!-- Enterprise Tier -->
        <div class="bg-surface-container-low rounded p-8 transition-transform hover:-translate-y-1 duration-300">
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
            <button class="w-full py-4 rounded font-semibold bg-inverse-surface text-inverse-on-surface hover:opacity-90 transition-all">
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
        <div class="bg-surface-container-low p-8 rounded">
            <h4 class="font-bold text-lg mb-4">Can I change plans anytime?</h4>
            <p class="text-on-surface-variant text-sm leading-relaxed">Yes, you can upgrade or downgrade your plan at any time. Changes will be reflected in your next billing cycle with prorated adjustments.</p>
        </div>
        <div class="bg-surface-container-low p-8 rounded">
            <h4 class="font-bold text-lg mb-4">What kind of support is included?</h4>
            <p class="text-on-surface-variant text-sm leading-relaxed">All plans include access to our documentation and community forums. Paid plans include direct email or chat support with varying response times.</p>
        </div>
    </section>
</main>
@endsection