@extends('layouts.frontend')

@section('content')
<main class="max-w-7xl mx-auto px-8 py-24 bg-surface">
    <section class="mb-20">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
            <div class="max-w-2xl">
                <span class="text-xs font-bold tracking-[0.3em] uppercase text-primary mb-4 block">Excellence in Execution</span>
                <h1 class="text-5xl md:text-6xl font-extrabold tracking-tighter text-on-surface mb-6">Our Expertise.</h1>
                <p class="text-lg text-on-surface-variant leading-relaxed opacity-70">
                    We build the digital backbone for modern enterprises. From architectural blueprints to deployment, our engineering teams deliver scalable, high-performance IT solutions tailored for complex challenges.
                </p>
            </div>
            <div class="flex gap-4">
                <div class="bg-surface-container-low p-6 rounded text-center min-w-[140px] border border-outline-variant/30">
                    <div class="text-3xl font-bold text-primary">500+</div>
                    <div class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mt-1">Deployments</div>
                </div>
                <div class="bg-surface-container-low p-6 rounded text-center min-w-[140px] border border-outline-variant/30">
                    <div class="text-3xl font-bold text-secondary">98%</div>
                    <div class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mt-1">Uptime</div>
                </div>
            </div>
        </div>
    </section>

    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($services as $service)
            <div class="group bg-surface p-8 rounded border border-outline-variant shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 bg-primary/10 rounded flex items-center justify-center mb-6 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">{{ $service->icon ?: 'engineering' }}</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-on-surface">{{ $service->title }}</h3>
                    <p class="text-on-surface-variant text-sm mb-6 leading-relaxed opacity-80">{{ $service->description }}</p>
                    @if($service->price)
                    <div class="flex items-center gap-2 mb-8">
                        <span class="material-symbols-outlined text-sm text-secondary">payments</span>
                        <span class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">Starts from ${{ number_format($service->price, 0) }}</span>
                    </div>
                    @endif
                </div>
                <button class="w-full py-3 bg-surface-container-low text-primary font-bold rounded hover:bg-primary hover:text-white transition-all flex items-center justify-center gap-2 border border-primary/10">
                    Consult Now <span class="material-symbols-outlined text-lg">arrow_forward</span>
                </button>
            </div>
            @endforeach
        </div>

        <aside class="lg:col-span-4 flex flex-col gap-6">
            <div class="bg-on-surface text-surface p-8 rounded relative overflow-hidden h-full min-h-[400px] flex flex-col justify-end shadow-2xl">
                <div class="absolute top-0 right-0 w-full h-full opacity-10 pointer-events-none">
                    <div class="absolute -top-12 -right-12 w-64 h-64 bg-primary rounded blur-[80px]"></div>
                    <div class="absolute -bottom-12 -left-12 w-64 h-64 bg-secondary rounded blur-[80px]"></div>
                </div>
                <div class="relative z-10">
                    <h4 class="text-2xl font-bold mb-4 text-white">Accelerate Your Roadmap</h4>
                    <p class="text-surface-container-high mb-8 leading-relaxed opacity-80">Our dedicated engineering units integrate seamlessly into your existing workflows, reducing time-to-market by 40%.</p>
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-secondary text-lg">check_circle</span>
                            <span class="text-sm font-medium text-white/90">SOC2 Compliant Processes</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-secondary text-lg">check_circle</span>
                            <span class="text-sm font-medium text-white/90">Agile Scrum Methodology</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-secondary text-lg">check_circle</span>
                            <span class="text-sm font-medium text-white/90">Continuous Support 24/7</span>
                        </li>
                    </ul>
                    <button class="w-full bg-primary text-white py-4 rounded font-bold hover:brightness-110 transition-all shadow-lg shadow-primary/20">
                        Schedule Technical Audit
                    </button>
                </div>
            </div>
        </aside>
    </section>

    <section class="mt-24">
        <div class="bg-surface-container-low rounded p-12 flex flex-col md:flex-row items-center justify-between gap-12 border border-outline-variant/30 shadow-sm">
            <div class="md:w-1/2">
                <h2 class="text-4xl font-extrabold tracking-tighter text-on-surface mb-6 leading-tight">Can't find a <span class="text-primary italic">specific</span> service?</h2>
                <p class="text-on-surface-variant mb-8 text-lg opacity-70">We specialize in custom engineering solutions. Tell us about your technical requirements, and our architects will propose a tailored stack.</p>
                <div class="flex flex-wrap gap-3">
                    <span class="px-4 py-2 bg-white rounded text-[10px] font-bold text-secondary uppercase tracking-widest border border-outline-variant/30 shadow-sm">Legacy Migration</span>
                    <span class="px-4 py-2 bg-white rounded text-[10px] font-bold text-secondary uppercase tracking-widest border border-outline-variant/30 shadow-sm">AI Integration</span>
                    <span class="px-4 py-2 bg-white rounded text-[10px] font-bold text-secondary uppercase tracking-widest border border-outline-variant/30 shadow-sm">DevOps Automation</span>
                    <span class="px-4 py-2 bg-white rounded text-[10px] font-bold text-secondary uppercase tracking-widest border border-outline-variant/30 shadow-sm">Web3 / Blockchain</span>
                </div>
            </div>
            <div class="md:w-1/3 w-full">
                <div class="bg-surface p-8 rounded shadow-xl border border-outline-variant">
                    <form class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold text-on-surface uppercase tracking-widest mb-3">Project Type</label>
                            <select class="w-full bg-surface-container-low border border-outline-variant rounded focus:ring-4 focus:ring-primary/10 focus:border-primary text-sm py-3 px-4 outline-none transition-all">
                                <option>Custom Development</option>
                                <option>System Migration</option>
                                <option>Security Audit</option>
                            </select>
                        </div>
                        <button class="w-full py-4 bg-primary text-white font-bold rounded hover:brightness-110 transition-all shadow-sm">
                            Request Custom Quote
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection