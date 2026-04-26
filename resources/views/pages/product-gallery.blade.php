@extends('layouts.frontend')

@push('styles')
<style>
@keyframes count-up  { from{opacity:0;transform:scale(.8)} to{opacity:1;transform:scale(1)} }
@keyframes pulse-glow{ 0%,100%{box-shadow:0 0 20px rgba(2,131,197,.2)} 50%{box-shadow:0 0 50px rgba(2,131,197,.5)} }
@keyframes spin-slow { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }

.card-glass-2 { background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.12); }
</style>
@endpush

@section('title', 'Products — ' . \App\Models\Setting::get('site_name', 'ProgrammersIn'))

@section('content')

{{-- ══════════ HERO ══════════ --}}
<section class="relative overflow-hidden bg-dots pt-32 pb-20">
  <div class="pointer-events-none absolute inset-0">
    <div class="absolute top-1/4 left-1/4  w-[700px] h-[700px] bg-primary/7  rounded-full blur-[140px]"></div>
    <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-secondary/5 rounded-full blur-[110px]"></div>
  </div>

  <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 text-center">
    <div style="animation: slide-up .8s ease both">
      <span class="inline-block text-[10px] font-bold text-primary/70 tracking-[.3em] uppercase mb-5">Our Ecosystem</span>
      <h1 class="text-6xl lg:text-8xl font-black tracking-tighter text-white leading-[.9] mb-4">
        Proprietary<br /><span class="text-grd">Software Studio.</span>
      </h1>
      <span class="accent-bar accent-bar-c mb-8 block"></span>
      <p class="text-xl text-slate-400 max-w-2xl mx-auto leading-relaxed mb-10">
        Precision-engineered platforms designed to scale with your ambition. Built in-house, battle-tested in production.
      </p>

      <div class="flex flex-wrap justify-center gap-4 mb-16" style="animation:count-up .7s .4s ease both; opacity:0">
        @foreach([['2M+','End Users','primary'],['99.9%','Uptime SLA','secondary'],['150+','Global Clients','primary'],['12ms','Avg Response','secondary']] as [$n,$l,$c])
        <div class="card-blue rounded-xl px-6 py-3">
          <span class="text-2xl font-black text-{{ $c }}">{{ $n }}</span>
          <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest ml-2">{{ $l }}</span>
        </div>
        @endforeach
      </div>
    </div>

    {{-- 3D mock screens scene --}}
    <div class="relative h-56 flex items-end justify-center gap-4 overflow-visible">
      <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] rounded-full border border-primary/8" style="animation:spin-slow 40s linear infinite"></div>
      <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] rounded-full border border-dashed border-secondary/4" style="animation:spin-slow 60s linear infinite reverse"></div>

      @php
        $mockCards = [
          ['AI Dashboard','from-blue-900 to-indigo-900','smart_toy',  '-rotate-6 -translate-y-2 opacity-60'],
          ['CRM Platform', 'from-emerald-900 to-teal-900','people',   'rotate-0 -translate-y-6 opacity-90 z-10 scale-105'],
          ['Data Analytics','from-violet-900 to-purple-900','analytics','rotate-6 -translate-y-2 opacity-60'],
        ];
      @endphp
      @foreach($mockCards as [$label,$bg,$ico,$transform])
      <div class="relative card-glass rounded-2xl overflow-hidden w-48 h-32 flex flex-col {{ $transform }} transition-all duration-500 hover:scale-110 hover:opacity-100 hover:-translate-y-10 cursor-default border border-primary/15"
           style="animation:float-up {{ 5 + $loop->index }}s {{ $loop->index * .8 }}s ease-in-out infinite">
        <div class="bg-gradient-to-br {{ $bg }} flex-1 flex items-center justify-center">
          <span class="material-symbols-outlined text-white/20 text-4xl" style="font-variation-settings:'FILL' 1">{{ $ico }}</span>
        </div>
        <div class="px-3 py-1.5 border-t border-primary/10">
          <span class="text-[9px] font-bold text-primary/50 uppercase tracking-wider">{{ $label }}</span>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="blue-divider"></div>

{{-- ══════════ TECH TICKER ══════════ --}}
<section class="py-4 ticker-wrap" style="background:rgba(2,131,197,.03); border-top:1px solid rgba(2,131,197,.1); border-bottom:1px solid rgba(2,131,197,.1)">
  @php $techs = ['React','Node.js','GPT-4o','Laravel','Next.js','PostgreSQL','Kubernetes','Python','AWS','Redis','TypeScript','GraphQL','Docker','Stripe']; @endphp
  <div class="ticker-inner">
    @foreach(array_merge($techs,$techs) as $idx => $t)
      <span class="{{ $idx % 3 === 0 ? 'text-primary/50' : ($idx % 3 === 1 ? 'text-secondary/35' : 'text-white/12') }} font-black text-xs tracking-[.25em] uppercase whitespace-nowrap px-8">{{ $t }}</span>
    @endforeach
  </div>
</section>

<div class="blue-divider"></div>

{{-- ══════════ FEATURED PRODUCT ══════════ --}}
@php $featured = $projects->first(); @endphp
@if($featured)
<section class="py-20">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="flex items-center gap-3 mb-6 reveal">
      <span class="dot-blue"></span>
      <div class="text-[10px] font-bold text-primary/70 tracking-[.3em] uppercase">Featured Build</div>
    </div>
    <div class="card-blue-hot rounded-3xl overflow-hidden grid lg:grid-cols-2 min-h-[420px] reveal"
         x-data="{ rx:0, ry:0, on:false }"
         @mouseenter="on=true"
         @mousemove="if(on){ const r=$el.getBoundingClientRect(); ry=(($event.clientX-r.left)/r.width-.5)*6; rx=-(($event.clientY-r.top)/r.height-.5)*6 }"
         @mouseleave="on=false; rx=0; ry=0"
         :style="on ? `transform:perspective(1400px) rotateX(${rx}deg) rotateY(${ry}deg);transition:transform .1s ease` : `transform:perspective(1400px) rotateX(0deg) rotateY(0deg);transition:transform .6s ease`">

      {{-- Visual side --}}
      <div class="relative bg-gradient-to-br from-blue-900/80 to-indigo-900/80 flex items-center justify-center overflow-hidden min-h-[300px]">
        @if($featured->featured_image)
          <img src="{{ asset('storage/'.$featured->featured_image) }}" class="w-full h-full object-cover opacity-40" alt="">
        @endif
        <div class="absolute inset-0 flex items-center justify-center">
          <div class="relative" style="animation:float-up 5s ease-in-out infinite">
            <div class="w-28 h-28 card-glass rounded-2xl flex items-center justify-center border border-primary/30" style="animation:pulse-glow 3s ease-in-out infinite">
              <span class="material-symbols-outlined text-5xl text-primary" style="font-variation-settings:'FILL' 1">{{ $featured->service?->icon ?: 'deployed_code' }}</span>
            </div>
          </div>
        </div>
        <div class="absolute top-6 left-6">
          <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase bg-secondary/25 text-secondary border border-secondary/20">Featured</span>
        </div>
        @if($featured->budget)
        <div class="absolute bottom-6 right-6">
          <span class="text-[10px] font-bold text-white/50 bg-primary/25 backdrop-blur-sm px-3 py-1.5 rounded-lg border border-primary/20">
            ${{ number_format($featured->budget/1000,0) }}k project
          </span>
        </div>
        @endif
      </div>

      {{-- Content side --}}
      <div class="p-10 lg:p-12 flex flex-col justify-between">
        <div>
          @if($featured->service)
          <div class="mb-4">
            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold text-primary bg-primary/15 border border-primary/20">{{ $featured->service->title }}</span>
          </div>
          @endif
          <h2 class="text-3xl lg:text-4xl font-black tracking-tighter text-white mb-4 leading-tight">{{ $featured->title }}</h2>
          <span class="accent-bar mb-5 block"></span>
          <p class="text-slate-400 text-sm leading-relaxed mb-8">
            {{ $featured->showcase_description ?: $featured->description }}
          </p>
          <div class="grid grid-cols-2 gap-4 mb-8">
            @foreach([['Status',ucfirst($featured->status)],['Delivery','14 Days']] as [$k,$v])
            <div class="card-blue rounded-xl p-4">
              <div class="text-[9px] text-slate-500 font-bold uppercase tracking-wider">{{ $k }}</div>
              <div class="text-sm font-bold text-white mt-1">{{ $v }}</div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="flex gap-3">
          <a href="{{ route('portfolio.show', $featured->slug) }}"
             class="btn-glow flex-1 text-center bg-primary text-white py-3 rounded-xl text-sm font-bold hover:brightness-110 transition-all shadow-lg shadow-primary/25">
            Full Case Study
          </a>
          <a href="/#contact"
             class="flex-1 text-center card-glass text-white/60 hover:text-white py-3 rounded-xl text-sm font-bold transition-all border border-primary/15 hover:border-primary/35">
            Build Similar
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

<div class="blue-divider"></div>

{{-- ══════════ PRODUCT GRID ══════════ --}}
<section class="py-20 bg-grid">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="flex items-center justify-between mb-10 reveal">
      <div>
        <h2 class="text-3xl font-black tracking-tighter text-white">All Products</h2>
        <span class="accent-bar mt-3"></span>
      </div>
      <a href="{{ route('portfolio.index') }}" class="text-sm text-white/30 hover:text-primary font-bold transition-colors flex items-center gap-1">
        Portfolio view <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
      </a>
    </div>

    @php
      $gradients = [
        ['#1e3a5f','#0c4a6e'],
        ['#064e3b','#0f4c5c'],
        ['#3b0764','#312e81'],
        ['#431407','#451a03'],
        ['#1e1b4b','#312e81'],
        ['#0c4a6e','#083344'],
      ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
      @foreach($projects->skip(1) as $i => $project)
      @php [$c1,$c2] = $gradients[$i % count($gradients)]; @endphp
      <article class="card-blue rounded-2xl overflow-hidden reveal block"
               style="transition-delay:{{ $i*90 }}ms"
               x-data="{ rx:0, ry:0, on:false }"
               @mouseenter="on=true"
               @mousemove="if(on){ const r=$el.getBoundingClientRect(); ry=(($event.clientX-r.left)/r.width-.5)*14; rx=-(($event.clientY-r.top)/r.height-.5)*14 }"
               @mouseleave="on=false; rx=0; ry=0"
               :style="on ? `transform:perspective(900px) rotateX(${rx}deg) rotateY(${ry}deg) translateZ(8px);transition:transform .05s ease` : `transform:perspective(900px) rotateX(0deg) rotateY(0deg);transition:transform .5s ease`">

        <div class="h-44 relative overflow-hidden flex items-center justify-center" style="background:linear-gradient(135deg,{{ $c1 }},{{ $c2 }})">
          @if($project->featured_image)
            <img src="{{ asset('storage/'.$project->featured_image) }}" class="w-full h-full object-cover opacity-30" alt="">
          @endif
          <span class="material-symbols-outlined text-white/5 absolute" style="font-size:100px">{{ $project->service?->icon ?: 'deployed_code' }}</span>
          <div class="relative z-10 flex flex-col items-center gap-2">
            <div class="w-14 h-14 card-glass rounded-xl flex items-center justify-center border border-primary/25">
              <span class="material-symbols-outlined text-primary text-2xl" style="font-variation-settings:'FILL' 1">{{ $project->service?->icon ?: 'deployed_code' }}</span>
            </div>
          </div>
          <div class="absolute top-3 right-3">
            <span class="px-2 py-0.5 rounded-full text-[9px] font-black uppercase backdrop-blur-sm
              {{ $project->status==='completed' ? 'bg-secondary/25 text-secondary' : 'bg-primary/25 text-primary' }}">
              {{ ucfirst($project->status) }}
            </span>
          </div>
        </div>

        <div class="p-6">
          @if($project->service)
          <span class="px-2.5 py-1 rounded-full text-[9px] font-bold text-primary bg-primary/10 border border-primary/15 mb-3 inline-block">{{ $project->service->title }}</span>
          @endif
          <h3 class="text-lg font-bold text-white mb-2 leading-tight">{{ $project->title }}</h3>
          <p class="text-xs text-slate-400 line-clamp-2 leading-relaxed mb-5">{{ Str::limit($project->showcase_description ?: $project->description, 100) }}</p>
          <div class="flex items-center justify-between">
            <a href="{{ route('portfolio.show', $project->slug) }}"
               class="inline-flex items-center gap-1.5 text-xs font-bold text-primary hover:gap-2.5 transition-all group">
              Case Study <span class="material-symbols-outlined text-[14px] group-hover:translate-x-0.5 transition-transform">arrow_forward</span>
            </a>
            @if($project->budget)
            <span class="text-[10px] text-slate-500 font-bold">${{ number_format($project->budget/1000,0) }}k</span>
            @endif
          </div>
        </div>
      </article>
      @endforeach
    </div>
  </div>
</section>

{{-- ══════════ API CTA BENTO ══════════ --}}
<div class="blue-divider"></div>
<section class="py-20">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="grid lg:grid-cols-3 gap-5 reveal">

      {{-- API block --}}
      <div class="card-blue-hot rounded-2xl p-8 flex flex-col justify-between">
        <div>
          <span class="material-symbols-outlined text-4xl text-primary mb-4 block" style="font-variation-settings:'FILL' 1">integration_instructions</span>
          <h4 class="text-xl font-bold text-white mb-3 tracking-tight">API-First Architecture</h4>
          <span class="accent-bar mb-4 block"></span>
          <p class="text-slate-400 text-sm leading-relaxed">All our products come with robust GraphQL and REST APIs for seamless ecosystem integration.</p>
        </div>
        <a href="#" class="inline-flex items-center gap-2 text-sm font-bold text-primary mt-6 hover:gap-3 transition-all group">
          Developer Docs <span class="material-symbols-outlined text-[16px] group-hover:translate-x-0.5 transition-transform">chevron_right</span>
        </a>
      </div>

      {{-- Custom build block --}}
      <div class="lg:col-span-2 card-blue rounded-2xl p-8 flex flex-col lg:flex-row items-center gap-8">
        <div class="flex-1">
          <h4 class="text-2xl font-bold text-white mb-3 tracking-tight">Need a Custom Build?</h4>
          <span class="accent-bar mb-4 block"></span>
          <p class="text-slate-400 text-sm leading-relaxed mb-5">Our senior architects can transform your proprietary workflow into a tailored SaaS solution.</p>
          <a href="/#contact"
             class="btn-glow inline-flex items-center gap-2 bg-primary text-white px-7 py-3 rounded-xl text-sm font-bold hover:brightness-110 transition-all shadow-lg shadow-primary/25">
            Start Consultation
          </a>
        </div>
        <div class="flex-shrink-0 w-32 h-32 card-glass rounded-2xl flex items-center justify-center border border-primary/20"
             style="animation: float-up 5s ease-in-out infinite">
          <span class="material-symbols-outlined text-5xl text-secondary" style="font-variation-settings:'FILL' 1">build_circle</span>
        </div>
      </div>

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
