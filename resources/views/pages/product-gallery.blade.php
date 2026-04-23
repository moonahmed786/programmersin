@extends('layouts.frontend')

@section('content')
<main class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative pt-20 pb-16 px-8 overflow-hidden">
        <div class="max-w-7xl mx-auto text-center relative z-10">
            <span class="inline-block px-4 py-1.5 rounded bg-secondary-container text-on-secondary-container font-label text-xs font-bold tracking-widest uppercase mb-6">
                Our Ecosystem
            </span>
            <h1 class="text-5xl md:text-7xl font-headline font-extrabold tracking-tighter text-on-surface mb-8 leading-[1.1]">
                Proprietary Software & <br/><span class="text-primary">SaaS Solutions.</span>
            </h1>
            <p class="max-w-2xl mx-auto text-on-surface-variant body-md leading-relaxed mb-12">
                Architecting the next generation of enterprise tools. Precision-engineered platforms designed to scale with your ambition.
            </p>
        </div>
        <!-- Background Decorative Element -->
        <div class="absolute top-0 right-0 -z-0 opacity-10">
            <svg fill="none" height="600" viewbox="0 0 600 600" width="600" xmlns="http://www.w3.org/2000/svg">
                <circle cx="300" cy="300" fill="url(#paint0_radial)" r="300"></circle>
                <defs>
                    <radialgradient cx="0" cy="0" gradienttransform="translate(300 300) rotate(90) scale(300)" gradientunits="userSpaceOnUse" id="paint0_radial" r="1">
                        <stop stop-color="#0040A1"></stop>
                        <stop offset="1" stop-color="#0040A1" stop-opacity="0"></stop>
                    </radialgradient>
                </defs>
            </svg>
        </div>
    </section>

    <!-- Product Gallery Grid -->
    <section class="px-8 pb-24 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Large Featured Card: Inventory Pro SaaS -->
            <div class="lg:col-span-12 group">
                <div class="bg-surface-container-lowest rounded overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col md:flex-row min-h-[500px]">
                    <div class="md:w-3/5 relative overflow-hidden bg-surface-container-low">
                        <img alt="Inventory Pro Dashboard" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="/uploads/stitch/92cf036a3b.png"/>
                    </div>
                    <div class="md:w-2/5 p-12 flex flex-col justify-center">
                        <div class="flex gap-2 mb-6">
                            <span class="px-3 py-1 bg-surface-container-high rounded text-xs font-bold font-label uppercase text-primary">React</span>
                            <span class="px-3 py-1 bg-surface-container-high rounded text-xs font-bold font-label uppercase text-primary">Node.js</span>
                        </div>
                        <h3 class="text-3xl font-headline font-bold text-on-surface mb-4 tracking-tight">Inventory Pro SaaS</h3>
                        <p class="text-on-surface-variant body-md mb-8 leading-relaxed">
                            Complete supply chain transparency with real-time analytics. Optimized for high-volume logistics and automated warehousing operations.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <button class="bg-primary text-on-primary px-8 py-3 rounded font-semibold flex items-center gap-2 hover:bg-primary-container transition-colors">
                                View Live Demo
                                <span class="material-symbols-outlined text-[18px]">arrow_outward</span>
                            </button>
                            <button class="text-primary font-semibold px-6 py-3 border-2 border-transparent hover:border-primary-fixed rounded transition-all">
                                Case Study
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Secondary Card: Omni CRM Hub -->
            <div class="lg:col-span-6 group">
                <div class="bg-surface-container-lowest rounded overflow-hidden shadow-sm hover:shadow-md transition-shadow h-full flex flex-col">
                    <div class="aspect-video relative overflow-hidden bg-surface-container-low">
                        <img alt="Omni CRM interface" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="/uploads/stitch/772b9da9dd.png"/>
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <div class="flex gap-2 mb-4">
                            <span class="px-2 py-0.5 bg-surface-container-high rounded text-[10px] font-bold font-label uppercase text-primary">Next.js</span>
                            <span class="px-2 py-0.5 bg-surface-container-high rounded text-[10px] font-bold font-label uppercase text-primary">PostgreSQL</span>
                        </div>
                        <h3 class="text-2xl font-headline font-bold text-on-surface mb-3">Omni CRM Hub</h3>
                        <p class="text-on-surface-variant body-md mb-8 flex-1">
                            Unify customer touchpoints into a single visual stream. AI-driven lead scoring and automated pipeline management for elite sales teams.
                        </p>
                        <button class="w-full bg-surface-container-low text-primary px-6 py-3 rounded font-bold hover:bg-surface-container-high transition-colors flex justify-center items-center gap-2">
                            View Live Demo
                            <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Secondary Card: Cyber Guard AI -->
            <div class="lg:col-span-6 group">
                <div class="bg-surface-container-lowest rounded overflow-hidden shadow-sm hover:shadow-md transition-shadow h-full flex flex-col">
                    <div class="aspect-video relative overflow-hidden bg-surface-container-low">
                        <img alt="Cyber Guard AI system" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="/uploads/stitch/a8482a9beb.png"/>
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <div class="flex gap-2 mb-4">
                            <span class="px-2 py-0.5 bg-surface-container-high rounded text-[10px] font-bold font-label uppercase text-primary">Python</span>
                            <span class="px-2 py-0.5 bg-surface-container-high rounded text-[10px] font-bold font-label uppercase text-primary">AWS</span>
                        </div>
                        <h3 class="text-2xl font-headline font-bold text-on-surface mb-3">Cyber Guard AI</h3>
                        <p class="text-on-surface-variant body-md mb-8 flex-1">
                            Predictive threat modeling and real-time network defense. Leveraging deep learning to secure critical enterprise infrastructure.
                        </p>
                        <button class="w-full bg-surface-container-low text-primary px-6 py-3 rounded font-bold hover:bg-surface-container-high transition-colors flex justify-center items-center gap-2">
                            View Live Demo
                            <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Asymmetric "Bento" Block -->
            <div class="lg:col-span-4 bg-primary text-on-primary p-10 rounded flex flex-col justify-between">
                <div>
                    <span class="material-symbols-outlined text-4xl mb-6">integration_instructions</span>
                    <h4 class="text-2xl font-bold mb-4 tracking-tight">API-First Architecture</h4>
                    <p class="opacity-80 leading-relaxed">All our products come with robust GraphQL and REST APIs for seamless ecosystem integration.</p>
                </div>
                <div class="mt-8">
                    <a class="inline-flex items-center gap-2 font-bold hover:underline" href="#">
                        Read Developer Docs
                        <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-8 bg-surface-container-low p-10 rounded relative overflow-hidden group">
                <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
                    <div class="md:w-1/2">
                        <h4 class="text-2xl font-bold text-on-surface mb-4 tracking-tight">Need a Custom Build?</h4>
                        <p class="text-on-surface-variant mb-6">Our senior architects can transform your proprietary workflow into a custom SaaS solution tailored to your operational dna.</p>
                        <button class="bg-primary text-on-primary px-8 py-3 rounded font-semibold hover:bg-primary-container transition-colors">
                            Consultation Call
                        </button>
                    </div>
                    <div class="md:w-1/2 flex justify-center">
                        <img alt="Technical consultation" class="rounded shadow-xl grayscale hover:grayscale-0 transition-all duration-500" src="/uploads/stitch/96276c7aa8.png"/>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Stats Ticker -->
    <section class="bg-surface-container-low py-12">
        <div class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-black text-primary mb-1">2M+</div>
                    <div class="label-md uppercase tracking-widest text-on-surface-variant font-bold">End Users</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-black text-primary mb-1">99.9%</div>
                    <div class="label-md uppercase tracking-widest text-on-surface-variant font-bold">Uptime SLA</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-black text-primary mb-1">150+</div>
                    <div class="label-md uppercase tracking-widest text-on-surface-variant font-bold">Global Clients</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-black text-primary mb-1">12ms</div>
                    <div class="label-md uppercase tracking-widest text-on-surface-variant font-bold">Avg Response</div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection