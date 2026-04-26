@extends('layouts.frontend')

@push('styles')
<style>
/* ── Page-local only ── */
@keyframes pulse-glow { 0%,100%{box-shadow:0 0 20px rgba(2,131,197,.25)} 50%{box-shadow:0 0 55px rgba(2,131,197,.6),0 0 90px rgba(2,131,197,.2)} }
@keyframes reveal-up  { from{opacity:0;transform:translateY(36px)} to{opacity:1;transform:translateY(0)} }
@keyframes count-in   { from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:translateY(0)} }
@keyframes num-count  { from{opacity:0;transform:translateY(20px) scale(.8)} to{opacity:1;transform:translateY(0) scale(1)} }
@keyframes spin-slow  { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }

.card-glass-2 { background:rgba(255,255,255,.055); border:1px solid rgba(255,255,255,.10); }
</style>
@endpush

@section('title', \App\Models\Setting::get('meta_title', 'ProgrammersIn | AI-First Software Velocity'))

@section('content')

{{-- ════════════════════════════════════════
     HERO
════════════════════════════════════════ --}}
<section class="relative min-h-screen flex items-center overflow-hidden bg-dots">
  {{-- ambient lights --}}
  <div class="pointer-events-none absolute inset-0">
    <div class="absolute top-1/4 left-1/3 w-[700px] h-[700px] bg-primary/8 rounded-full blur-[140px]"></div>
    <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-secondary/6 rounded-full blur-[120px]"></div>
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-primary/4 rounded-full blur-[100px]"></div>
  </div>

  <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-8 py-28 grid lg:grid-cols-2 gap-14 items-center">

    {{-- ── Left: copy ── --}}
    <div class="space-y-8" style="animation: reveal-up .8s ease both">
      <div class="inline-flex items-center gap-2.5 card-glass rounded-full px-4 py-2 border border-primary/20">
        <span class="dot-blue flex-shrink-0"></span>
        <span class="text-xs font-bold text-primary/90 tracking-[.2em] uppercase">AI-First Velocity Engineering</span>
      </div>

      <h1 class="text-[64px] lg:text-[76px] font-black tracking-tighter leading-[.9] text-white">
        Ship AI Products<br />
        <span class="text-grd">in 14 Days.</span>
      </h1>

      <p class="text-lg text-slate-400 leading-relaxed max-w-md">
        High-velocity engineering for the world's most ambitious companies.
        LLM pipelines, SaaS platforms, and enterprise systems — delivered at speed.
      </p>

      <div class="flex flex-wrap gap-4">
        <a href="#contact"
           class="btn-glow group inline-flex items-center gap-2 bg-primary text-white px-8 py-4 rounded-xl font-bold hover:brightness-110 active:scale-95 transition-all shadow-lg shadow-primary/25">
          Start Building
          <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
        </a>
        <a href="{{ route('portfolio.index') }}"
           class="inline-flex items-center gap-2 card-glass text-white/60 hover:text-white px-8 py-4 rounded-xl font-bold transition-all border border-white/8 hover:border-primary/30">
          View Our Work
          <span class="material-symbols-outlined text-[18px]">open_in_new</span>
        </a>
      </div>

      <div class="grid grid-cols-3 gap-6 pt-8 border-t border-primary/10" style="animation: count-in .9s .4s ease both; opacity: 0;">
        @foreach([['14','Day Delivery','primary'],['99.9%','SLA Uptime','secondary'],['200+','Products Shipped','primary']] as [$n,$l,$c])
          <div>
            <div class="text-3xl font-black text-{{ $c }}" style="animation:num-count .8s ease both">{{ $n }}</div>
            <div class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mt-1">{{ $l }}</div>
          </div>
        @endforeach
      </div>
    </div>

    {{-- ── Right: 3D scene ── --}}
    <div class="relative flex items-center justify-center h-[520px]" style="animation: reveal-up 1s .2s ease both; opacity: 0">

      {{-- orbit rings --}}
      <div class="orbit w-[380px] h-[380px]" style="animation: orbit-cw 25s linear infinite">
        <span class="orbit-dot"></span>
      </div>
      <div class="orbit w-[470px] h-[470px]" style="border-color:rgba(90,187,74,.12); animation: orbit-ccw 38s linear infinite">
        <span class="orbit-dot" style="background:#5ABB4A; box-shadow:0 0 12px rgba(90,187,74,.9)"></span>
      </div>
      <div class="orbit w-[560px] h-[560px]" style="border-style:dashed; border-color:rgba(255,255,255,.04); animation: orbit-cw 55s linear infinite">
        <span class="orbit-dot" style="background:rgba(255,255,255,.3); box-shadow:none"></span>
      </div>

      {{-- spinning cube --}}
      <div class="cube-scene absolute" style="top:50%;left:50%;transform:translate(-50%,-50%);width:300px;height:300px;">
        <div class="cube" style="width:100%;height:100%;position:relative;transform-style:preserve-3d;animation:cube-spin 22s linear infinite">
          <div class="cube-face cf-front"></div>
          <div class="cube-face cf-back"></div>
          <div class="cube-face cf-right"></div>
          <div class="cube-face cf-left"></div>
          <div class="cube-face cf-top"></div>
          <div class="cube-face cf-bottom"></div>
        </div>
      </div>

      {{-- center glow dot --}}
      <div class="w-4 h-4 rounded-full bg-primary relative z-10" style="animation: pulse-glow 3s ease-in-out infinite"></div>

      {{-- floating data cards --}}
      <div class="absolute top-10 right-6 card-glass rounded-xl p-3.5 flex items-center gap-3 max-w-[195px] z-20 border border-primary/20"
           style="animation: float-up 5s ease-in-out infinite">
        <div class="w-9 h-9 rounded-lg bg-primary/15 flex items-center justify-center text-primary flex-shrink-0">
          <span class="material-symbols-outlined text-[18px]" style="font-variation-settings:'FILL' 1">smart_toy</span>
        </div>
        <div>
          <div class="text-[9px] text-primary/50 font-bold uppercase tracking-wider leading-none">AI Engine</div>
          <div class="text-sm font-bold text-white mt-0.5">RAG Pipeline</div>
        </div>
      </div>

      <div class="absolute bottom-14 left-6 card-glass rounded-xl p-3.5 flex items-center gap-3 max-w-[195px] z-20 border border-secondary/20"
           style="animation: float-down 6s 1s ease-in-out infinite">
        <div class="w-9 h-9 rounded-lg bg-secondary/15 flex items-center justify-center text-secondary flex-shrink-0">
          <span class="material-symbols-outlined text-[18px]" style="font-variation-settings:'FILL' 1">rocket_launch</span>
        </div>
        <div>
          <div class="text-[9px] text-secondary/50 font-bold uppercase tracking-wider leading-none">Deployed</div>
          <div class="text-sm font-bold text-white mt-0.5">14 Days Flat</div>
        </div>
      </div>

      <div class="absolute top-1/3 right-0 card-glass rounded-xl p-3 z-20 border border-secondary/15"
           style="animation: float-up 7s 2s ease-in-out infinite">
        <div class="flex items-center gap-1.5 mb-0.5">
          <span class="dot-green flex-shrink-0" style="width:6px;height:6px"></span>
          <div class="text-xs font-black text-secondary">99.9%</div>
        </div>
        <div class="text-[9px] text-white/35">SLA Uptime</div>
      </div>
    </div>
  </div>

  <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-30">
    <span class="text-[9px] text-white font-bold uppercase tracking-widest">Scroll</span>
    <div class="w-px h-10 bg-gradient-to-b from-primary to-transparent"></div>
  </div>
</section>

{{-- ════════════════════════════════════════
     TECH TICKER
════════════════════════════════════════ --}}
<div class="blue-divider"></div>
<section class="py-5 ticker-wrap" style="background:rgba(2,131,197,.03); border-top:1px solid rgba(2,131,197,.1); border-bottom:1px solid rgba(2,131,197,.1)">
  @php $techs = ['Laravel','React','Next.js','Python','LangChain','AWS','GPT-4o','Kubernetes','PostgreSQL','Node.js','Docker','Redis','TypeScript','GraphQL','Flutter','Tailwind CSS']; @endphp
  <div class="ticker-inner">
    @foreach(array_merge($techs, $techs) as $idx => $t)
      <span class="font-black text-xs tracking-[.25em] uppercase whitespace-nowrap px-8 {{ $idx % 3 === 0 ? 'text-primary/60' : ($idx % 3 === 1 ? 'text-secondary/40' : 'text-white/12') }}">{{ $t }}</span>
    @endforeach
  </div>
</section>
<div class="blue-divider"></div>

{{-- ════════════════════════════════════════
     SERVICES
════════════════════════════════════════ --}}
<section class="py-28 relative reveal">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">

    <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
      <div>
        <span class="block text-[10px] font-bold text-primary/60 tracking-[.3em] uppercase mb-3">Engineering Capabilities</span>
        <h2 class="text-4xl lg:text-5xl font-black tracking-tighter text-white leading-tight">What We Build</h2>
        <span class="accent-bar"></span>
      </div>
      <a href="{{ route('services.catalog') }}"
         class="flex items-center gap-1.5 text-sm text-white/35 hover:text-primary font-bold transition-colors shrink-0">
        All Services <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      @foreach($services as $i => $service)
      <div class="card-blue rounded-2xl p-7 reveal cursor-default"
           style="transition-delay:{{ $i * 80 }}ms"
           x-data="{ rx:0, ry:0, on:false }"
           @mouseenter="on=true"
           @mousemove="if(on){ const r=$el.getBoundingClientRect(); ry=(($event.clientX-r.left)/r.width-.5)*14; rx=-(($event.clientY-r.top)/r.height-.5)*14 }"
           @mouseleave="on=false; rx=0; ry=0"
           :style="on ? `transform:perspective(900px) rotateX(${rx}deg) rotateY(${ry}deg) translateZ(8px);transition:transform .05s ease` : `transform:perspective(900px) rotateX(0deg) rotateY(0deg) translateZ(0);transition:transform .5s ease`">

        <div class="w-12 h-12 rounded-xl bg-primary/15 flex items-center justify-center text-primary mb-6 border border-primary/20">
          <span class="material-symbols-outlined text-2xl" style="font-variation-settings:'FILL' 1">{{ $service->icon ?: 'engineering' }}</span>
        </div>
        <h3 class="text-base font-bold text-white mb-2.5 tracking-tight">{{ $service->title }}</h3>
        <p class="text-sm text-slate-400 leading-relaxed line-clamp-3 mb-5">{{ $service->description }}</p>
        @if($service->price)
        <div class="flex items-center justify-between pt-5 border-t border-primary/10">
          <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Starting from</span>
          <span class="text-primary font-black text-lg">${{ number_format($service->price, 0) }}</span>
        </div>
        @endif
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ════════════════════════════════════════
     PORTFOLIO PREVIEW
════════════════════════════════════════ --}}
@if($projects->count())
<div class="blue-divider"></div>
<section class="py-28 bg-grid">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">

    <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6 reveal">
      <div>
        <span class="block text-[10px] font-bold text-secondary/60 tracking-[.3em] uppercase mb-3">Case Studies</span>
        <h2 class="text-4xl lg:text-5xl font-black tracking-tighter text-white leading-tight">Shipped Products</h2>
        <span class="accent-bar"></span>
      </div>
      <a href="{{ route('portfolio.index') }}"
         class="flex items-center gap-1.5 text-sm text-white/35 hover:text-secondary font-bold transition-colors shrink-0">
        View All <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
      </a>
    </div>

    @php
      $gradients = [
        ['#1e3a5f','#312e81'],
        ['#064e3b','#0f4c5c'],
        ['#3b0764','#4c0519'],
        ['#431407','#451a03'],
        ['#0c4a6e','#083344'],
        ['#1a1a2e','#16213e'],
      ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      @foreach($projects as $i => $project)
      @php [$c1,$c2] = $gradients[$i % count($gradients)]; @endphp
      <a href="{{ route('portfolio.show', $project->slug) }}"
         class="group card-blue rounded-2xl overflow-hidden block reveal"
         style="transition-delay:{{ $i * 90 }}ms"
         x-data="{ rx:0, ry:0, on:false }"
         @mouseenter="on=true"
         @mousemove="if(on){ const r=$el.getBoundingClientRect(); ry=(($event.clientX-r.left)/r.width-.5)*12; rx=-(($event.clientY-r.top)/r.height-.5)*12 }"
         @mouseleave="on=false; rx=0; ry=0"
         :style="on ? `transform:perspective(900px) rotateX(${rx}deg) rotateY(${ry}deg) translateZ(6px);transition:transform .05s ease` : `transform:perspective(900px) rotateX(0deg) rotateY(0deg);transition:transform .5s ease`">

        <div class="h-44 relative overflow-hidden" style="background:linear-gradient(135deg,{{ $c1 }},{{ $c2 }})">
          @if($project->featured_image)
            <img src="{{ asset('storage/'.$project->featured_image) }}"
                 class="w-full h-full object-cover opacity-50 group-hover:scale-110 transition-transform duration-700" alt="">
          @else
            <div class="absolute inset-0 flex items-center justify-center opacity-10">
              <span class="material-symbols-outlined text-white" style="font-size:80px">code_blocks</span>
            </div>
          @endif
          <div class="absolute top-4 right-4">
            <span class="px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-black/30 text-white/60 backdrop-blur-sm">
              {{ ucfirst($project->status) }}
            </span>
          </div>
          @if($project->budget)
          <div class="absolute bottom-4 left-4">
            <span class="px-2.5 py-1 rounded-full text-[10px] font-black bg-primary/30 text-primary backdrop-blur-sm">
              ${{ number_format($project->budget/1000, 0) }}k project
            </span>
          </div>
          @endif
        </div>

        <div class="p-6">
          <h3 class="text-base font-bold text-white mb-2 group-hover:text-primary transition-colors">{{ $project->title }}</h3>
          <p class="text-xs text-slate-400 line-clamp-2 leading-relaxed mb-4">{{ Str::limit($project->showcase_description ?: $project->description, 100) }}</p>
          @if($project->service)
            <span class="inline-block px-2.5 py-1 rounded-full text-[10px] font-bold text-primary bg-primary/10 border border-primary/15">{{ $project->service->title }}</span>
          @endif
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>
<div class="blue-divider"></div>
@endif

{{-- ════════════════════════════════════════
     PROCESS
════════════════════════════════════════ --}}
<section class="py-28">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="text-center mb-20 reveal">
      <span class="block text-[10px] font-bold text-primary/60 tracking-[.3em] uppercase mb-3">Our Process</span>
      <h2 class="text-4xl lg:text-5xl font-black tracking-tighter text-white">The 14-Day Blueprint</h2>
      <span class="accent-bar accent-bar-c mt-4"></span>
    </div>

    @php
      $steps = [
        ['01','Discovery',    'Deep-dive into requirements, tech audit, and architecture definition.',        'search_insights','primary'],
        ['02','Architecture', 'System design, API contracts, database schema, and tech stack decisions.',     'schema',         'secondary'],
        ['03','Engineering',  'Rapid sprint cycles with daily builds and continuous integration pipelines.',  'code',           'primary'],
        ['04','Deployment',   'Production-grade release with monitoring, SLA guarantee, and handover.',       'rocket_launch',  'secondary'],
      ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
      @foreach($steps as $i => [$num,$title,$desc,$icon,$color])
      <div class="card-blue rounded-2xl p-7 reveal relative" style="transition-delay:{{ $i * 120 }}ms">
        @if($i < 3)
          <div class="hidden md:block absolute top-10 left-full w-5 z-10">
            <div class="w-full h-px bg-gradient-to-r from-primary/20 to-transparent"></div>
          </div>
        @endif
        <div class="text-5xl font-black text-primary/8 mb-3 leading-none select-none">{{ $num }}</div>
        <div class="w-10 h-10 rounded-xl bg-{{ $color }}/15 flex items-center justify-center text-{{ $color }} mb-5 border border-{{ $color }}/20">
          <span class="material-symbols-outlined text-xl">{{ $icon }}</span>
        </div>
        <h3 class="text-lg font-bold text-white mb-3">{{ $title }}</h3>
        <p class="text-sm text-slate-400 leading-relaxed">{{ $desc }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ════════════════════════════════════════
     TESTIMONIALS
════════════════════════════════════════ --}}
<div class="blue-divider"></div>
<section class="py-28 relative overflow-hidden bg-dots">
  <div class="pointer-events-none absolute top-0 left-0 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[150px]"></div>
  <div class="pointer-events-none absolute bottom-0 right-0 w-[400px] h-[400px] bg-secondary/4 rounded-full blur-[120px]"></div>

  <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
    <div class="text-center mb-16 reveal">
      <span class="block text-[10px] font-bold text-primary/60 tracking-[.3em] uppercase mb-3">Client Stories</span>
      <h2 class="text-4xl lg:text-5xl font-black tracking-tighter text-white">Trusted by Leaders</h2>
      <span class="accent-bar accent-bar-c mt-4"></span>
    </div>

    @php
      $testimonials = [
        ['quote'=>'Programmers.in shipped our AI-powered CRM in exactly 14 days. Enterprise-grade quality from day one.','name'=>'Sarah Chen','role'=>'CTO, NexusAI','init'=>'SC','bg'=>'bg-primary/20','tc'=>'text-primary'],
        ['quote'=>'We tried three agencies before this. No one else could deliver at this speed without sacrificing quality.','name'=>'Marcus Webb','role'=>'CEO, SecureLogic','init'=>'MW','bg'=>'bg-secondary/20','tc'=>'text-secondary'],
        ['quote'=>'Their RAG pipeline cut our customer support tickets by 70% in the first month. Transformative.','name'=>'Priya Sharma','role'=>'VP Engineering, CloudScale','init'=>'PS','bg'=>'bg-violet-500/20','tc'=>'text-violet-400'],
      ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
      @foreach($testimonials as $i => $t)
      <div class="card-blue rounded-2xl p-7 reveal" style="transition-delay:{{ $i * 120 }}ms">
        <div class="flex mb-5">
          @for($s=0;$s<5;$s++)<span class="material-symbols-outlined text-yellow-400 text-[18px]" style="font-variation-settings:'FILL' 1">star</span>@endfor
        </div>
        <p class="text-slate-300 text-sm leading-relaxed italic mb-7">"{{ $t['quote'] }}"</p>
        <div class="flex items-center gap-3 pt-5 border-t border-primary/10">
          <div class="w-10 h-10 rounded-full {{ $t['bg'] }} {{ $t['tc'] }} flex items-center justify-center text-xs font-black flex-shrink-0">{{ $t['init'] }}</div>
          <div>
            <div class="text-sm font-bold text-white">{{ $t['name'] }}</div>
            <div class="text-xs text-slate-500">{{ $t['role'] }}</div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<div class="blue-divider"></div>

{{-- ════════════════════════════════════════
     PRICING PREVIEW
════════════════════════════════════════ --}}
@if(!empty($plans))
<section class="py-28 bg-grid">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="text-center mb-16 reveal">
      <span class="block text-[10px] font-bold text-secondary/60 tracking-[.3em] uppercase mb-3">Transparent Pricing</span>
      <h2 class="text-4xl lg:text-5xl font-black tracking-tighter text-white">Simple Plans,<br />Extreme Velocity</h2>
      <span class="accent-bar accent-bar-c mt-4"></span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-10">
      @foreach($plans as $i => $plan)
      @php $hot = !empty($plan['badge']); @endphp
      <div class="rounded-2xl p-7 reveal relative"
           style="transition-delay:{{ $i * 130 }}ms; {{ $hot ? 'background:rgba(2,131,197,.1); border:1px solid rgba(2,131,197,.3); box-shadow:0 0 50px rgba(2,131,197,.12), 0 0 120px rgba(2,131,197,.05); animation:glow-border-anim 3s ease-in-out infinite' : 'background:rgba(2,131,197,.03); border:1px solid rgba(2,131,197,.1)' }}">
        @if($hot)
          <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-primary text-white text-[9px] font-black uppercase tracking-widest px-4 py-1 rounded-full whitespace-nowrap">{{ $plan['badge'] }}</div>
        @endif
        <h3 class="text-sm font-black text-white mb-1">{{ $plan['name'] }}</h3>
        <p class="text-[11px] text-slate-500 mb-5">{{ $plan['description'] }}</p>
        <div class="mb-6">
          @if(!empty($plan['monthly']))
            <span class="text-3xl font-black {{ $hot ? 'text-primary' : 'text-white' }}">${{ number_format($plan['monthly'],0) }}</span>
            <span class="text-slate-500 text-sm"> /project</span>
          @else
            <span class="text-3xl font-black text-white">Custom</span>
          @endif
        </div>
        <ul class="space-y-2 mb-7">
          @foreach(array_slice($plan['features'] ?? [], 0, 4) as $f)
          <li class="flex items-center gap-2.5 text-xs {{ $f['included'] ? 'text-slate-300' : 'text-slate-600 line-through' }}">
            <span class="material-symbols-outlined text-[14px] shrink-0 {{ $f['included'] ? 'text-secondary' : 'text-slate-600' }}" style="font-variation-settings:'FILL' 1">{{ $f['included'] ? 'check_circle' : 'cancel' }}</span>
            {{ $f['text'] }}
          </li>
          @endforeach
        </ul>
        <a href="{{ route('pricing.index') }}"
           class="block w-full text-center py-3 rounded-xl text-sm font-bold transition-all {{ $hot ? 'bg-primary text-white hover:brightness-110 shadow-lg shadow-primary/20 btn-glow' : 'border border-primary/15 text-white/50 hover:border-primary/40 hover:text-primary' }}">
          {{ $plan['cta'] ?? 'Get Started' }}
        </a>
      </div>
      @endforeach
    </div>

    <div class="text-center">
      <a href="{{ route('pricing.index') }}"
         class="inline-flex items-center gap-1.5 text-sm text-white/30 hover:text-primary font-bold transition-colors">
        Full pricing &amp; comparison <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
      </a>
    </div>
  </div>
</section>
@endif

{{-- ════════════════════════════════════════
     TEAM
════════════════════════════════════════ --}}
@if($employees->count())
<div class="blue-divider"></div>
<section class="py-28">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="text-center mb-16 reveal">
      <span class="block text-[10px] font-bold text-primary/60 tracking-[.3em] uppercase mb-3">The Team</span>
      <h2 class="text-4xl lg:text-5xl font-black tracking-tighter text-white">Elite Engineers</h2>
      <span class="accent-bar accent-bar-c mt-4"></span>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-4">
      @foreach($employees as $i => $emp)
      <a href="{{ route('employee.portfolio', $emp) }}"
         class="group card-blue rounded-2xl p-5 text-center reveal block"
         style="transition-delay:{{ $i * 70 }}ms">
        @if($emp->avatar)
          <img src="{{ asset('storage/'.$emp->avatar) }}" alt="{{ $emp->name }}"
               class="w-14 h-14 rounded-full object-cover mx-auto mb-3 ring-2 ring-primary/10 group-hover:ring-primary/50 transition-all">
        @else
          <div class="w-14 h-14 rounded-full bg-primary/15 flex items-center justify-center mx-auto mb-3 ring-2 ring-primary/10 group-hover:ring-primary/50 transition-all border border-primary/20">
            <span class="text-lg font-black text-primary">{{ substr($emp->name,0,1) }}</span>
          </div>
        @endif
        <div class="text-xs font-bold text-white group-hover:text-primary transition-colors leading-tight">{{ $emp->name }}</div>
        @if($emp->position)
          <div class="text-[9px] text-slate-500 mt-1 leading-tight">{{ $emp->position }}</div>
        @endif
      </a>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ════════════════════════════════════════
     CTA / CONTACT
════════════════════════════════════════ --}}
<div class="blue-divider"></div>
<section class="py-28 relative overflow-hidden" id="contact">
  <div class="pointer-events-none absolute inset-0">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-primary/5 to-transparent"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[900px] h-[500px] bg-primary/8 rounded-full blur-[140px]"></div>
  </div>

  <div class="max-w-2xl mx-auto px-6 lg:px-8 text-center relative z-10 reveal">
    <h2 class="text-5xl lg:text-6xl font-black tracking-tighter text-white mb-5 leading-tight">
      Ready to Ship<br /><span class="text-grd">Something Great?</span>
    </h2>
    <p class="text-lg text-slate-400 mb-12">Join 200+ companies that ship with Programmers.in.</p>

    @if(session('success'))
      <div class="mb-8 p-4 rounded-xl bg-secondary/10 border border-secondary/20 text-secondary text-sm font-bold">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('inquiries.store') }}" method="POST" class="space-y-3 text-left">
      @csrf
      <div class="grid grid-cols-2 gap-3">
        <input name="name" type="text" placeholder="Your Name" required
               class="card-glass rounded-xl px-5 py-4 text-white placeholder-slate-500 text-sm outline-none border border-transparent focus:border-primary/40 transition-colors w-full bg-transparent">
        <input name="email" type="email" placeholder="Work Email" required
               class="card-glass rounded-xl px-5 py-4 text-white placeholder-slate-500 text-sm outline-none border border-transparent focus:border-primary/40 transition-colors w-full bg-transparent">
      </div>
      <input name="subject" type="text" placeholder="What are you building?" required
             class="card-glass rounded-xl px-5 py-4 text-white placeholder-slate-500 text-sm outline-none border border-transparent focus:border-primary/40 transition-colors w-full bg-transparent">
      <textarea name="message" rows="3" placeholder="Tell us more about your project…" required
                class="card-glass rounded-xl px-5 py-4 text-white placeholder-slate-500 text-sm outline-none border border-transparent focus:border-primary/40 transition-colors w-full bg-transparent resize-none"></textarea>
      <button type="submit"
              class="btn-glow w-full bg-primary text-white py-4 rounded-xl font-black text-sm tracking-wider hover:brightness-110 active:scale-[.99] transition-all shadow-lg shadow-primary/30">
        Start the Conversation →
      </button>
    </form>
  </div>
</section>

@endsection

@push('scripts')
<script>
const ro = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('in'); });
}, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
document.querySelectorAll('.reveal').forEach(el => ro.observe(el));
</script>
@endpush
