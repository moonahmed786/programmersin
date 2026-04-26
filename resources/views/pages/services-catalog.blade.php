@extends('layouts.frontend')

@push('styles')
<style>
@keyframes rotate-y  { from{transform:rotateY(0deg)} to{transform:rotateY(360deg)} }
@keyframes pulse-ring{ 0%{transform:scale(1);opacity:.6} 100%{transform:scale(1.8);opacity:0} }
@keyframes spin-slow { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }

.card-glass-2 { background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.12); }
.icon-3d { animation:rotate-y 12s linear infinite; transform-style:preserve-3d; }
</style>
@endpush

@section('title', 'Services — ' . \App\Models\Setting::get('site_name', 'ProgrammersIn'))

@section('content')

{{-- ══════════ HERO ══════════ --}}
<section class="relative overflow-hidden bg-dots pt-32 pb-24">
  <div class="pointer-events-none absolute inset-0">
    <div class="absolute top-0 left-1/3 w-[600px] h-[600px] bg-primary/8 rounded-full blur-[130px]"></div>
    <div class="absolute bottom-0 right-1/4 w-[400px] h-[400px] bg-secondary/6 rounded-full blur-[110px]"></div>
  </div>

  <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
    <div class="grid lg:grid-cols-2 gap-14 items-center">
      <div style="animation: slide-left .8s ease both">
        <span class="inline-block text-[10px] font-bold text-primary/70 tracking-[.3em] uppercase mb-5">Excellence in Execution</span>
        <h1 class="text-5xl lg:text-7xl font-black tracking-tighter text-white leading-[.9] mb-4">
          Engineering<br /><span class="text-grd">Capabilities.</span>
        </h1>
        <span class="accent-bar mb-6 block"></span>
        <p class="text-lg text-slate-400 leading-relaxed max-w-md mb-8">
          We build the digital backbone for modern enterprises — from architectural blueprints to production deployment at record speed.
        </p>
        <div class="flex flex-wrap gap-4">
          <a href="#services" class="btn-glow inline-flex items-center gap-2 bg-primary text-white px-7 py-3.5 rounded-xl font-bold hover:brightness-110 transition-all shadow-lg shadow-primary/25">
            Explore Services <span class="material-symbols-outlined text-[18px]">arrow_downward</span>
          </a>
          <a href="#quote-form"
             onclick="event.preventDefault(); document.querySelector('#quote-form').scrollIntoView({behavior:'smooth'})"
             class="inline-flex items-center gap-2 card-glass text-white/60 hover:text-white px-7 py-3.5 rounded-xl font-bold transition-all border border-primary/15 hover:border-primary/35">
            Get a Quote
          </a>
        </div>
      </div>

      {{-- 3D scene --}}
      <div class="flex items-center justify-center relative h-64 lg:h-80" style="animation: slide-right .9s .2s ease both; opacity:0">
        <div class="absolute w-56 h-56 rounded-full border border-primary/12" style="animation: spin-slow 20s linear infinite"></div>
        <div class="absolute w-72 h-72 rounded-full border border-dashed border-secondary/8" style="animation: spin-slow 30s linear infinite reverse"></div>
        <div class="absolute w-[340px] h-[340px] rounded-full border border-white/4" style="animation: spin-slow 45s linear infinite"></div>

        <div class="w-28 h-28 relative z-10 icon-3d card-glass-2 rounded-2xl flex items-center justify-center border border-primary/20">
          <span class="material-symbols-outlined text-5xl text-primary" style="font-variation-settings:'FILL' 1">hub</span>
        </div>

        @php $miniIcons=[['smart_toy','top-4 right-8','primary'],['cloud_sync','bottom-4 right-8','secondary'],['security','top-4 left-8','violet-400'],['analytics','bottom-4 left-8','primary']]; @endphp
        @foreach($miniIcons as [$ico,$pos,$col])
          <div class="absolute {{ $pos }} card-glass rounded-xl w-12 h-12 flex items-center justify-center text-{{ $col }} border border-{{ $col }}/20"
               style="animation: float-up {{ 4+$loop->index }}s {{ $loop->index * .7 }}s ease-in-out infinite">
            <span class="material-symbols-outlined text-[20px]" style="font-variation-settings:'FILL' 1">{{ $ico }}</span>
          </div>
        @endforeach

        <div class="absolute -bottom-6 left-1/2 -translate-x-1/2 flex gap-3">
          @foreach([['500+','Deployments','primary'],['98%','Uptime','secondary']] as [$n,$l,$c])
          <div class="card-blue rounded-xl px-5 py-3 text-center min-w-[100px]">
            <div class="text-xl font-black text-{{ $c }}">{{ $n }}</div>
            <div class="text-[9px] text-slate-500 font-bold uppercase tracking-widest mt-0.5">{{ $l }}</div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<div class="blue-divider"></div>

{{-- ══════════ FLIP CARDS GRID ══════════ --}}
<section class="py-28" id="services">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="text-center mb-16 reveal">
      <h2 class="text-4xl lg:text-5xl font-black tracking-tighter text-white mb-4">What We Deliver</h2>
      <span class="accent-bar accent-bar-c mb-4"></span>
      <p class="text-slate-400 max-w-xl mx-auto text-sm leading-relaxed">
        Hover each card to reveal full details. Every service is backed by our 14-day delivery guarantee.
      </p>
    </div>

    @php
      $colors   = ['primary','secondary','violet-400','cyan-400','rose-400','amber-400','emerald-400','indigo-400'];
      $bgFronts = [
        'rgba(2,131,197,.07)',
        'rgba(90,187,74,.07)',
        'rgba(139,92,246,.07)',
        'rgba(6,182,212,.07)',
        'rgba(244,63,94,.07)',
        'rgba(245,158,11,.07)',
        'rgba(52,211,153,.07)',
        'rgba(99,102,241,.07)',
      ];
      $borderFronts = [
        'rgba(2,131,197,.18)',
        'rgba(90,187,74,.18)',
        'rgba(139,92,246,.18)',
        'rgba(6,182,212,.18)',
        'rgba(244,63,94,.18)',
        'rgba(245,158,11,.18)',
        'rgba(52,211,153,.18)',
        'rgba(99,102,241,.18)',
      ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
      @foreach($services as $i => $service)
      @php
        $col    = $colors[$i % count($colors)];
        $bgF    = $bgFronts[$i % count($bgFronts)];
        $borF   = $borderFronts[$i % count($borderFronts)];
      @endphp
      <div class="flip-card h-72 reveal cursor-pointer" style="transition-delay:{{ $i*80 }}ms" title="Hover to flip">
        <div class="flip-inner">

          {{-- Front --}}
          <div class="flip-front p-7 flex flex-col justify-between" style="background:{{ $bgF }}; border:1px solid {{ $borF }}; border-radius:1rem">
            <div>
              <div class="w-12 h-12 rounded-xl flex items-center justify-center text-{{ $col }} mb-5" style="background:{{ $bgF }}; border:1px solid {{ $borF }}">
                <span class="material-symbols-outlined text-2xl" style="font-variation-settings:'FILL' 1">{{ $service->icon ?: 'engineering' }}</span>
              </div>
              <h3 class="text-base font-bold text-white mb-2">{{ $service->title }}</h3>
              <p class="text-xs text-slate-400 line-clamp-3 leading-relaxed">{{ $service->description }}</p>
            </div>
            <div class="flex items-center gap-2 mt-4 text-{{ $col }} opacity-60">
              <span class="text-[10px] font-bold">Hover to see details</span>
              <span class="material-symbols-outlined text-[14px]">autorenew</span>
            </div>
          </div>

          {{-- Back --}}
          <div class="flip-back p-7 flex flex-col justify-between" style="background:rgba(2,131,197,.12); border:1px solid rgba(2,131,197,.3); border-radius:1rem">
            <div>
              <div class="text-[10px] font-bold text-primary uppercase tracking-widest mb-3">{{ $service->title }}</div>
              <p class="text-sm text-slate-300 leading-relaxed mb-5">{{ $service->description }}</p>
              @if($service->price)
              <div class="flex items-baseline gap-1 mb-4">
                <span class="text-2xl font-black text-primary">${{ number_format($service->price,0) }}</span>
                <span class="text-xs text-slate-500">starting</span>
              </div>
              @endif
            </div>
            <a href="#quote-form"
               onclick="event.preventDefault(); document.querySelector('#quote-form').scrollIntoView({behavior:'smooth'})"
               class="btn-glow w-full text-center py-3 rounded-xl text-sm font-bold text-white bg-primary hover:brightness-110 transition-colors">
              Request a Quote →
            </a>
          </div>

        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="blue-divider"></div>

{{-- ══════════ PROCESS ══════════ --}}
<section class="py-28 bg-grid">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="text-center mb-16 reveal">
      <span class="block text-[10px] font-bold text-secondary/60 tracking-[.3em] uppercase mb-3">Methodology</span>
      <h2 class="text-4xl font-black tracking-tighter text-white">How We Operate</h2>
      <span class="accent-bar accent-bar-c mt-4"></span>
    </div>

    @php
      $ops = [
        ['Discovery & Scoping',  'We conduct a thorough technical audit, define requirements, and propose the optimal architecture.', 'find_in_page', 'primary'],
        ['Sprint Architecture',  '14-day sprint plan with defined deliverables, API contracts, and infrastructure blueprints.',        'account_tree', 'secondary'],
        ['Velocity Engineering', 'Daily builds, CI/CD automation, code reviews, and continuous testing throughout every sprint.',     'bolt',         'primary'],
        ['Hardening & Launch',   'Load testing, security hardening, zero-downtime deployment, and post-launch SLA monitoring.',      'verified_user','secondary'],
      ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
      @foreach($ops as $i => [$title,$desc,$icon,$color])
      <div class="card-blue rounded-2xl p-7 reveal relative" style="transition-delay:{{ $i*110 }}ms">
        <div class="text-6xl font-black text-primary/6 leading-none mb-4 select-none">0{{ $i+1 }}</div>
        <div class="w-10 h-10 rounded-xl bg-{{ $color }}/15 text-{{ $color }} flex items-center justify-center mb-4 border border-{{ $color }}/20">
          <span class="material-symbols-outlined">{{ $icon }}</span>
        </div>
        <h3 class="text-sm font-bold text-white mb-2">{{ $title }}</h3>
        <p class="text-xs text-slate-400 leading-relaxed">{{ $desc }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="blue-divider"></div>

{{-- ══════════ TECH STACK PILLS ══════════ --}}
<section class="py-20">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="text-center mb-12 reveal">
      <h2 class="text-2xl font-black tracking-tighter text-white">Our Technology Stack</h2>
      <span class="accent-bar accent-bar-c mt-3"></span>
    </div>
    @php
      $stack = [
        'Backend'   => ['Laravel','Node.js','Python','Go','Rust'],
        'Frontend'  => ['React','Next.js','Vue','TypeScript','Tailwind'],
        'AI / ML'   => ['GPT-4o','LangChain','Pinecone','Hugging Face','LlamaIndex'],
        'Cloud/Ops' => ['AWS','GCP','Azure','Kubernetes','Terraform'],
        'Data'      => ['PostgreSQL','Redis','Kafka','Spark','Snowflake'],
      ];
      $stackColors = ['primary','secondary','violet-400','cyan-400','emerald-400'];
      $i = 0;
    @endphp
    <div class="space-y-5 reveal">
      @foreach($stack as $layer => $techs)
      @php $layerColor = $stackColors[$i++ % count($stackColors)]; @endphp
      <div class="flex flex-wrap items-center gap-3">
        <span class="text-[10px] text-{{ $layerColor }}/70 font-bold uppercase tracking-widest w-20 shrink-0">{{ $layer }}</span>
        @foreach($techs as $tech)
          <span class="px-3 py-1.5 card-blue rounded-full text-xs font-bold text-white/60 hover:text-{{ $layerColor }} hover:border-{{ $layerColor }}/30 transition-colors cursor-default">{{ $tech }}</span>
        @endforeach
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ══════════ QUOTE FORM CTA ══════════ --}}
<div class="blue-divider"></div>
<section class="py-28 relative overflow-hidden" id="quote-form">
  <div class="pointer-events-none absolute inset-0">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-primary/5 to-transparent"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-primary/7 rounded-full blur-[140px]"></div>
  </div>
  <div class="max-w-5xl mx-auto px-6 lg:px-8 relative z-10">
    <div class="card-blue-hot rounded-3xl p-10 lg:p-14 grid lg:grid-cols-2 gap-12 items-center reveal">
      <div>
        <h2 class="text-4xl font-black tracking-tighter text-white mb-4 leading-tight">
          Need a Custom<br /><span class="text-grd">Engineering Solution?</span>
        </h2>
        <span class="accent-bar mb-6 block"></span>
        <p class="text-slate-400 text-sm leading-relaxed mb-6">
          Our architects will propose a tailored tech stack for your exact requirements within 24 hours.
        </p>
        <div class="flex flex-wrap gap-2">
          @foreach(['Legacy Migration','AI Integration','DevOps Automation','Blockchain / Web3','Custom SaaS'] as $tag)
            <span class="px-3 py-1.5 card-blue rounded-full text-[10px] font-bold text-secondary/70 uppercase tracking-wider">{{ $tag }}</span>
          @endforeach
        </div>
      </div>

      @if(session('success'))
        <div class="p-5 rounded-xl bg-secondary/10 border border-secondary/20 text-secondary text-sm font-bold">{{ session('success') }}</div>
      @else
      <form action="{{ route('inquiries.store') }}" method="POST" class="space-y-3">
        @csrf
        <input name="name" type="text" placeholder="Your Name" required
               class="w-full card-glass rounded-xl px-5 py-3.5 text-white placeholder-slate-500 text-sm outline-none border border-transparent focus:border-primary/40 transition-colors bg-transparent">
        <input name="email" type="email" placeholder="Work Email" required
               class="w-full card-glass rounded-xl px-5 py-3.5 text-white placeholder-slate-500 text-sm outline-none border border-transparent focus:border-primary/40 transition-colors bg-transparent">
        <input name="subject" type="text" placeholder="Project type / Service needed" required
               class="w-full card-glass rounded-xl px-5 py-3.5 text-white placeholder-slate-500 text-sm outline-none border border-transparent focus:border-primary/40 transition-colors bg-transparent">
        <textarea name="message" rows="3" placeholder="Describe your requirements…" required
                  class="w-full card-glass rounded-xl px-5 py-3.5 text-white placeholder-slate-500 text-sm outline-none border border-transparent focus:border-primary/40 transition-colors bg-transparent resize-none"></textarea>
        <button type="submit"
                class="btn-glow w-full bg-primary text-white py-4 rounded-xl font-black text-sm hover:brightness-110 transition-all shadow-lg shadow-primary/30">
          Request Custom Quote →
        </button>
      </form>
      @endif
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
const ro = new IntersectionObserver(e => e.forEach(x => { if(x.isIntersecting) x.target.classList.add('in'); }), { threshold:0.1, rootMargin:'0px 0px -40px 0px' });
document.querySelectorAll('.reveal').forEach(el => ro.observe(el));
</script>
@endpush
