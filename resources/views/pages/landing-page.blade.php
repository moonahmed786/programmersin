@extends('layouts.frontend')

@section('content')

  <main>
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-white pt-24 pb-32">
      <div class="max-w-7xl mx-auto px-8 grid lg:grid-cols-2 gap-20 items-center">
        <div class="z-10 animate-in-fade">
          <div class="flex items-center gap-3 mb-8">
            <div class="w-10 h-px bg-primary opacity-30"></div>
            <span class="label-mono text-primary opacity-80">Velocity Engineering</span>
          </div>
          <h1 class="text-[72px] font-extrabold tracking-tighter leading-[0.9] text-on-surface mb-8">
            Architecting<br />Intelligence <span class="text-primary italic">at Scale.</span>
          </h1>
          <p class="text-lg text-on-surface-variant max-w-xl leading-relaxed mb-12 opacity-80 font-medium">
            High-precision engineering for the next generation of digital products. From concept to deployment in exactly 14 days.
          </p>
          <div class="flex flex-wrap gap-4">
            <button class="bg-primary text-white px-10 py-4 rounded font-bold transition-all hover:brightness-110 shadow-lg shadow-primary/20">
              Consult Architects
            </button>
            <button class="border border-outline-variant px-10 py-4 rounded font-bold text-on-surface hover:bg-surface-container-low transition-all">
              View Case Studies
            </button>
          </div>
        </div>
        <div class="relative group">
          <div class="aspect-square bg-slate-900 rounded-node overflow-hidden shadow-2xl relative border-node border-white/5">
            <img class="w-full h-full object-cover opacity-60 group-hover:scale-105 transition-all duration-1000"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuB8fl98XnYzAO8MIxMbdOq2sHWJWW39dWTi1lfRBQonvGVOjdqjS9_FOMSm2yyN0Egfu5wR6LV-iG0hGS2rDjhTw9q7xdEkDk_ZvOk07Rjp8AvHVh12l3VKdYV7DOu9Lg8_oCkpewGPNQ1mtUnGlO7SDfC9Qgigyq8SUX2dxmUOm6c4bd6fTbAahdK3fYPF47Y1j_j2k_pLRXCrOi3wuPEWHXFfKXKZCyENFUFn07GXZHA31DlB_EavbL5OVFUAgxj2T36v6OFNGv1s" />
            
            <div class="absolute inset-0 bg-gradient-to-tr from-primary/20 to-transparent"></div>
            
            <!-- Floating Badge: Delivery Window -->
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 w-fit bg-white p-5 rounded shadow-2xl border-node flex items-center gap-4 animate-in-fade" style="animation-delay: 0.5s">
                <div class="w-10 h-10 rounded bg-secondary/10 flex items-center justify-center text-secondary">
                    <span class="material-symbols-outlined text-xl">timer</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-[9px] uppercase tracking-[0.2em] font-bold text-on-surface-variant leading-none">Delivery window</span>
                    <span class="text-xl font-bold tracking-tighter text-on-surface mt-1">14 Days Flat</span>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Architectural Integrity Section -->
    <section class="py-32 bg-node-dark text-white overflow-hidden relative border-y border-white/5">
      <div class="max-w-7xl mx-auto px-8 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-20 gap-8">
            <div class="max-w-xl">
                <h2 class="text-4xl font-extrabold tracking-tighter mb-6">Architectural Integrity</h2>
                <p class="text-surface-container-high opacity-70 leading-relaxed font-medium">
                    Our core pillar isn't just speed; it's the unwavering commitment to structural excellence. We don't just build; we engineer with mathematical precision.
                </p>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-secondary text-5xl font-black italic opacity-50">01</span>
                <div class="w-20 h-px bg-secondary opacity-30 mt-4"></div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
          <!-- Card: Clean Code -->
          <div class="p-10 rounded border-node bg-white/5 hover:bg-white/[0.07] transition-all group">
            <div class="text-primary mb-8">
              <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">dataset</span>
            </div>
            <h4 class="text-xl font-bold mb-4 tracking-tight">CLEAN CODE</h4>
            <p class="text-surface-container-high/60 text-sm leading-relaxed mb-10">
              Modular, self-documenting architectures designed for long-term scalability and zero technical debt. Built for humans, optimized for machines.
            </p>
            <div class="flex justify-between items-center pt-6 border-t border-white/5">
                <span class="label-mono opacity-40">TYP: STATELESS</span>
                <span class="label-mono opacity-40">MOD: ATOMIC</span>
            </div>
          </div>
          <!-- Card: Systemic Verification -->
          <div class="p-10 rounded border-node bg-white/5 hover:bg-white/[0.07] transition-all group">
            <div class="text-primary mb-8">
              <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">verified_user</span>
            </div>
            <h4 class="text-xl font-bold mb-4 tracking-tight">SYSTEMIC VERIFICATION</h4>
            <p class="text-surface-container-high/60 text-sm leading-relaxed mb-10">
              Every line is stress-tested through automated CI/CD pipelines. We prioritize verification as a first-class citizen of our sprint cycle.
            </p>
            <div class="flex justify-between items-center pt-6 border-t border-white/5">
                <span class="label-mono opacity-40">COV: 100%</span>
                <span class="label-mono opacity-40">LAT: < 20ms</span>
            </div>
          </div>
          <!-- Card: Hardened Ops -->
          <div class="p-10 rounded border-node bg-white/5 hover:bg-white/[0.07] transition-all group">
            <div class="text-primary mb-8">
              <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">security</span>
            </div>
            <h4 class="text-xl font-bold mb-4 tracking-tight">HARDENED OPS</h4>
            <p class="text-surface-container-high/60 text-sm leading-relaxed mb-10">
              Infrastructure as code. Enterprise-grade security protocols baked into the foundation. Deployment is the beginning, not the end.
            </p>
            <div class="flex justify-between items-center pt-6 border-t border-white/5">
                <span class="label-mono opacity-40">SLO: 99.9%</span>
                <span class="label-mono opacity-40">ISO: HIGH</span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Capability Ledger Section -->
    <section class="py-32 bg-white">
      <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-24">
          <h3 class="text-4xl font-extrabold tracking-tighter text-on-surface">Capability Ledger</h3>
          <div class="w-12 h-1 bg-primary mx-auto mt-6 opacity-80"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 border border-outline-variant/30 rounded overflow-hidden shadow-sm">
          @foreach($services as $service)
            <div class="p-10 border border-outline-variant/20 hover:bg-surface-container-low transition-all group flex flex-col justify-between">
              <div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-2 h-2 rounded-full {{ $loop->first ? 'bg-secondary' : ($loop->index == 1 ? 'bg-primary' : 'bg-tertiary') }}"></div>
                    <span class="label-mono opacity-80">{{ strtoupper($service->title) }}</span>
                </div>
                <p class="text-on-surface-variant text-sm leading-relaxed mb-12 opacity-80">
                  {{ $service->description }}
                </p>
              </div>
              <div class="flex flex-col gap-6">
                  <div class="flex justify-between items-end border-t border-outline-variant/10 pt-6">
                      <div class="flex flex-col">
                          <span class="text-3xl font-black text-primary tracking-tighter">{{ $loop->first ? '99.9%' : ($loop->index == 1 ? '12ms' : 'A+ UX') }}</span>
                          <span class="label-mono text-[8px] opacity-40 mt-1 uppercase">{{ $loop->first ? 'UPTIME' : ($loop->index == 1 ? 'LATENCY' : 'ACCESSIBILITY') }}</span>
                      </div>
                      <div class="flex flex-col items-end">
                        <span class="text-xl font-bold text-on-surface tracking-tighter">{{ $loop->first ? '0.8s' : ($loop->index == 1 ? 'RAG' : 'NEURAL') }}</span>
                        <span class="label-mono text-[8px] opacity-40 mt-1 uppercase">{{ $loop->first ? 'TOKEN OUT' : ($loop->index == 1 ? 'ENGINE' : 'ENGINE') }}</span>
                    </div>
                  </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="mt-8 flex justify-between items-center px-6">
            <div class="flex items-center gap-4 opacity-30">
                <span class="label-mono text-[8px]">LEDGER_ID: ARCH-7782</span>
                <span class="label-mono text-[8px]">TIMESTAMP: 2024.Q1.V2</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-2 h-2 rounded-full bg-secondary animate-pulse"></div>
                <span class="label-mono text-[8px] opacity-50 uppercase">Systems_Active</span>
            </div>
        </div>
      </div>
    </section>
    <!-- The 14-Day Blueprint Section -->
    <section class="py-32 bg-surface-container-low border-y border-outline-variant/20">
      <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-24">
          <h3 class="text-4xl font-extrabold tracking-tighter text-on-surface">The 14-Day Blueprint</h3>
          <div class="w-12 h-1 bg-primary mx-auto mt-6 opacity-80"></div>
        </div>
        
        <div class="relative">
            <!-- Timeline Line -->
            <div class="absolute top-1/2 left-0 w-full h-px bg-outline-variant/30 -translate-y-1/2 hidden md:block"></div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 relative z-10">
                <!-- Step 01 -->
                <div class="flex flex-col items-center md:items-start text-center md:text-left">
                    <div class="w-12 h-12 rounded bg-primary text-white flex items-center justify-center font-bold text-sm mb-8 shadow-lg shadow-primary/20">01</div>
                    <h4 class="text-sm font-bold tracking-widest uppercase mb-3">Extraction</h4>
                    <p class="text-xs text-on-surface-variant leading-relaxed opacity-70">
                        Systemic audit of requirements and technical discovery session.
                    </p>
                </div>
                <!-- Step 02 -->
                <div class="flex flex-col items-center md:items-start text-center md:text-left">
                    <div class="w-12 h-12 rounded bg-primary text-white flex items-center justify-center font-bold text-sm mb-8 shadow-lg shadow-primary/20">02</div>
                    <h4 class="text-sm font-bold tracking-widest uppercase mb-3">Architecting</h4>
                    <p class="text-xs text-on-surface-variant leading-relaxed opacity-70">
                        Development of core LLM infrastructure and neural UI foundations.
                    </p>
                </div>
                <!-- Step 03 -->
                <div class="flex flex-col items-center md:items-start text-center md:text-left">
                    <div class="w-12 h-12 rounded bg-primary text-white flex items-center justify-center font-bold text-sm mb-8 shadow-lg shadow-primary/20">03</div>
                    <h4 class="text-sm font-bold tracking-widest uppercase mb-3">Hardening</h4>
                    <p class="text-xs text-on-surface-variant leading-relaxed opacity-70">
                        Edge case verification, RAG optimization, and systemic stress testing.
                    </p>
                </div>
                <!-- Step 04 -->
                <div class="flex flex-col items-center md:items-start text-center md:text-left">
                    <div class="w-12 h-12 rounded bg-primary text-white flex items-center justify-center font-bold text-sm mb-8 shadow-lg shadow-primary/20">04</div>
                    <h4 class="text-sm font-bold tracking-widest uppercase mb-3">Deployment</h4>
                    <p class="text-xs text-on-surface-variant leading-relaxed opacity-70">
                        Seamless production handover and real-world system validation.
                    </p>
                </div>
            </div>
        </div>
      </div>
    </section>
    <!-- Simple Testimonial Section -->
    <section class="py-32 bg-white">
      <div class="max-w-7xl mx-auto px-8">
        <div class="flex flex-col md:flex-row items-center gap-12 p-12 bg-surface-container-low rounded-node border-node">
          <div class="w-20 h-20 rounded bg-node-dark flex items-center justify-center text-primary shadow-xl">
            <span class="material-symbols-outlined text-4xl">flare</span>
          </div>
          <div class="flex-1">
            <p class="text-xl font-medium leading-relaxed text-on-surface italic mb-6">
              "The speed of Programmers.in is only matched by their precision. We received a production-ready RAG system in exactly two weeks."
            </p>
            <div class="flex items-center gap-2">
                <span class="text-sm font-bold text-primary">— CTO, Global Logistics Titan</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Ready to Build CTA Section -->
    <section class="py-32 bg-node-dark text-white text-center relative overflow-hidden">
      <!-- Background mesh/grid effect -->
      <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 30px 30px;"></div>
      
      <div class="max-w-4xl mx-auto px-8 relative z-10">
        <h2 class="text-[56px] font-extrabold tracking-tighter leading-tight mb-8">
          Ready to Build Your Digital <br /><span class="text-primary italic">Monarchy?</span>
        </h2>
        <p class="text-xl text-surface-container-high opacity-70 mb-12 max-w-2xl mx-auto leading-relaxed">
          Join the elite enterprises leveraging 14-day velocity delivery for mission-critical AI systems.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <button class="bg-primary text-white px-10 py-5 rounded font-bold text-lg hover:brightness-110 transition-all shadow-2xl shadow-primary/20">
            Start 14-Day Sprint
          </button>
          <button class="border border-white/20 text-white px-10 py-5 rounded font-bold text-lg hover:bg-white/5 transition-all">
            Speak with an Architect
          </button>
        </div>
      </div>
    </section>
  </main>
@endsection