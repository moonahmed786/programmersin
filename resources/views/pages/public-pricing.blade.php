@extends('layouts.frontend')

@push('styles')
<style>
@keyframes badge-pop  { 0%{transform:translateX(-50%) scale(.6);opacity:0} 100%{transform:translateX(-50%) scale(1);opacity:1} }
@keyframes check-in   { from{opacity:0;transform:translateX(-8px)} to{opacity:1;transform:translateX(0)} }
@keyframes pulse-glow { 0%,100%{box-shadow:0 0 20px rgba(2,131,197,.2)} 50%{box-shadow:0 0 60px rgba(2,131,197,.5),0 0 90px rgba(2,131,197,.15)} }

/* ── 3D pricing card lift ── */
.plan-card { transition:transform .4s cubic-bezier(.4,0,.2,1),box-shadow .4s ease; will-change:transform; }
.plan-card:hover {
  transform:perspective(1000px) translateY(-12px) translateZ(20px) !important;
  box-shadow:0 40px 100px rgba(0,0,0,.6),0 0 50px rgba(2,131,197,.15);
}
.plan-card.featured {
  transform:perspective(1000px) translateY(-6px) translateZ(10px);
  box-shadow:0 20px 60px rgba(0,0,0,.5),0 0 80px rgba(2,131,197,.25);
  animation:glow-border-anim 3s ease-in-out infinite;
}
.plan-card.featured:hover {
  transform:perspective(1000px) translateY(-18px) translateZ(30px) !important;
  box-shadow:0 50px 120px rgba(0,0,0,.7),0 0 100px rgba(2,131,197,.3);
}

/* ── Toggle switch ── */
.toggle-track { width:48px; height:26px; border-radius:99px; transition:background .3s; }
.toggle-thumb { width:20px; height:20px; border-radius:50%; top:3px; left:3px; position:absolute; transition:transform .3s; }
.toggle-thumb.on { transform:translateX(22px); }
</style>
@endpush

@section('title', 'Pricing — ' . \App\Models\Setting::get('site_name', 'ProgrammersIn'))

@section('content')

{{-- ══════════ HERO ══════════ --}}
<section class="relative overflow-hidden bg-dots pt-32 pb-20"
         x-data="pricingPage()"
         id="pricing-root">

  <div class="pointer-events-none absolute inset-0">
    <div class="absolute top-1/3 left-1/4  w-[700px] h-[700px] bg-primary/7  rounded-full blur-[140px]"></div>
    <div class="absolute bottom-0 right-1/3 w-[500px] h-[500px] bg-secondary/5 rounded-full blur-[110px]"></div>
  </div>

  <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

    <div class="text-center mb-16" style="animation:slide-up .8s ease both">
      <span class="inline-flex items-center gap-2 text-[10px] font-bold text-primary/70 tracking-[.3em] uppercase mb-5">
        <span class="dot-blue" style="width:6px;height:6px;flex-shrink:0"></span>
        Simple Pricing
        <span class="dot-blue" style="width:6px;height:6px;flex-shrink:0"></span>
      </span>
      <h1 class="text-6xl lg:text-7xl font-black tracking-tighter text-white leading-[.9] mb-4">
        Transparent Plans,<br /><span class="text-grd">Extreme Velocity.</span>
      </h1>
      <span class="accent-bar accent-bar-c mb-8 block"></span>
      <p class="text-lg text-slate-400 max-w-xl mx-auto leading-relaxed mb-10">
        No hidden fees. No lock-in. Every plan includes our 14-day delivery guarantee and production-grade quality.
      </p>

      {{-- Monthly / Annual toggle --}}
      <div class="inline-flex items-center gap-4 card-blue rounded-xl px-6 py-3">
        <span class="text-sm font-bold" :class="!annual ? 'text-white' : 'text-slate-500'">Monthly</span>

        <button @click="annual = !annual" class="relative shrink-0">
          <div class="toggle-track" :class="annual ? 'bg-secondary' : 'bg-primary/30'"></div>
          <div class="toggle-thumb bg-white" :class="annual ? 'on' : ''"></div>
        </button>

        <span class="text-sm font-bold flex items-center gap-2" :class="annual ? 'text-white' : 'text-slate-500'">
          Annual
          <span class="text-[9px] font-black bg-secondary/20 text-secondary px-2 py-0.5 rounded-full uppercase tracking-wider">-20%</span>
        </span>
      </div>
    </div>

    {{-- ══════════ PLAN CARDS ══════════ --}}
    @if(!empty($plans))
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6 items-end">
      @foreach($plans as $i => $plan)
      @php $hot = !empty($plan['badge']); @endphp

      <div class="plan-card rounded-2xl p-8 relative {{ $hot ? 'featured' : '' }} reveal"
           style="transition-delay:{{ $i*120 }}ms;
                  {{ $hot
                    ? 'background:rgba(2,131,197,.12); border:1px solid rgba(2,131,197,.35);'
                    : 'background:rgba(2,131,197,.03); border:1px solid rgba(2,131,197,.12);' }}">

        @if($hot)
          <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-primary text-white text-[9px] font-black uppercase tracking-widest px-5 py-1.5 rounded-full whitespace-nowrap"
               style="animation:badge-pop .5s .3s ease both; opacity:0">
            {{ $plan['badge'] }}
          </div>
        @endif

        <h3 class="text-base font-black {{ $hot ? 'text-primary' : 'text-white' }} mb-1">{{ $plan['name'] }}</h3>
        <p class="text-[11px] text-slate-500 mb-6 leading-relaxed">{{ $plan['description'] }}</p>

        <div class="mb-7 h-16 flex items-end">
          @if(!empty($plan['monthly']))
            <div>
              <div class="flex items-baseline gap-1.5">
                <span class="text-4xl font-black text-white transition-all"
                      x-text="annual ? '${{ !empty($plan['annual']) ? number_format($plan['annual'],0) : '?' }}' : '${{ number_format($plan['monthly'],0) }}'"></span>
                <span class="text-slate-500 text-sm">/project</span>
              </div>
              <div class="text-[10px] text-secondary mt-1 font-bold" x-show="annual">Save ${{ !empty($plan['monthly']) && !empty($plan['annual']) ? number_format($plan['monthly'] - $plan['annual'], 0) : '?' }} per project</div>
            </div>
          @else
            <span class="text-4xl font-black text-white">Custom</span>
          @endif
        </div>

        <ul class="space-y-3 mb-8">
          @foreach($plan['features'] ?? [] as $j => $f)
          <li class="flex items-start gap-2.5 text-xs {{ $f['included'] ? 'text-slate-300' : 'text-slate-600' }}"
              style="animation:check-in .4s {{ $j*60 }}ms ease both">
            <span class="material-symbols-outlined text-[15px] shrink-0 mt-0.5 {{ $f['included'] ? 'text-secondary' : 'text-slate-600' }}"
                  style="font-variation-settings:'FILL' 1">
              {{ $f['included'] ? 'check_circle' : 'cancel' }}
            </span>
            <span class="{{ $f['included'] ? '' : 'line-through opacity-50' }}">{{ $f['text'] }}</span>
          </li>
          @endforeach
        </ul>

        @if(($plan['id'] ?? '') === 'enterprise')
          <a href="/#contact"
             class="block w-full text-center py-3.5 rounded-xl text-sm font-bold border border-primary/20 text-white/60 hover:border-primary/40 hover:text-white transition-all">
            {{ $plan['cta'] ?? 'Contact Sales' }}
          </a>
        @elseif($hot)
          <a href="/#contact"
             class="btn-glow block w-full text-center py-3.5 rounded-xl text-sm font-bold bg-primary text-white hover:brightness-110 transition-all shadow-lg shadow-primary/30">
            {{ $plan['cta'] ?? 'Get Started' }}
          </a>
        @else
          <a href="/#contact"
             class="block w-full text-center py-3.5 rounded-xl text-sm font-bold border border-primary/15 text-white/55 hover:border-primary/35 hover:text-primary transition-all">
            {{ $plan['cta'] ?? 'Get Started' }}
          </a>
        @endif
      </div>
      @endforeach
    </div>

    <div class="flex justify-center reveal">
      <div class="card-blue rounded-xl px-6 py-3 flex items-center gap-3">
        <span class="material-symbols-outlined text-secondary text-[18px]" style="font-variation-settings:'FILL' 1">verified</span>
        <span class="text-xs font-bold text-slate-400">14-Day Delivery Guarantee · Money-back if we miss the deadline</span>
      </div>
    </div>
    @else
    <p class="text-center text-slate-500">Pricing plans are being configured. Check back soon.</p>
    @endif

  </div>
</section>

<div class="blue-divider"></div>

{{-- ══════════ COMPARISON TABLE ══════════ --}}
<section class="py-24 bg-grid">
  <div class="max-w-5xl mx-auto px-6 lg:px-8">
    <div class="text-center mb-14 reveal">
      <h2 class="text-4xl font-black tracking-tighter text-white">Compare All Features</h2>
      <span class="accent-bar accent-bar-c mt-4"></span>
    </div>

    <div class="card-blue rounded-2xl overflow-hidden reveal">
      <div class="overflow-x-auto">
        <table class="w-full text-left">
          <thead>
            <tr style="border-bottom:1px solid rgba(2,131,197,.15)">
              <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Feature</th>
              @foreach(['Starter Sprint','Growth Engine','Enterprise'] as $col)
              <th class="px-6 py-4 text-[10px] font-bold text-primary/70 uppercase tracking-widest text-center">{{ $col }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody style="divide-color:rgba(2,131,197,.08)">
            @php
              $rows = [
                ['Concurrent Projects',         '1',         '3',         'Unlimited'],
                ['Sprint Duration',             '14 Days',   '14 Days',   'Custom'],
                ['Senior Developers',           '2',         '5',         '10+'],
                ['CI/CD Pipeline',              'Basic',     'Advanced',  'Enterprise'],
                ['Revisions',                   '3 rounds',  'Unlimited', 'Unlimited'],
                ['Support Response',            '48h',       '4h',        'Dedicated'],
                ['AI Feature Integration',      '—',         '✓',         '✓'],
                ['Dedicated Architect',         '—',         '—',         '✓'],
                ['Security Audit',              '—',         '—',         '✓'],
                ['SLA Guarantee',               '—',         '99.9%',     '99.99%'],
                ['Source Code Ownership',       '✓',         '✓',         '✓'],
                ['White-Label Options',         '—',         '✓',         '✓'],
              ];
            @endphp
            @foreach($rows as $row)
            <tr style="border-top:1px solid rgba(2,131,197,.06)" class="hover:bg-primary/2 transition-colors">
              <td class="px-6 py-4 text-sm text-slate-300 font-medium">{{ $row[0] }}</td>
              @foreach([$row[1], $row[2], $row[3]] as $j => $val)
              <td class="px-6 py-4 text-center">
                @if($val === '✓')
                  <span class="material-symbols-outlined text-secondary text-[18px]" style="font-variation-settings:'FILL' 1">check_circle</span>
                @elseif($val === '—')
                  <span class="text-slate-700 text-sm">—</span>
                @else
                  <span class="text-sm font-bold {{ $j===1 ? 'text-primary' : 'text-white/60' }}">{{ $val }}</span>
                @endif
              </td>
              @endforeach
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<div class="blue-divider"></div>

{{-- ══════════ FAQ ══════════ --}}
<section class="py-24">
  <div class="max-w-3xl mx-auto px-6 lg:px-8">
    <div class="text-center mb-14 reveal">
      <span class="block text-[10px] font-bold text-primary/60 tracking-[.3em] uppercase mb-3">FAQ</span>
      <h2 class="text-4xl font-black tracking-tighter text-white">Common Questions</h2>
      <span class="accent-bar accent-bar-c mt-4"></span>
    </div>

    @php
      $faqs = [
        ['How strict is the 14-day delivery?', 'Very. We have a money-back guarantee if we miss the deadline. Our process is engineered for speed — discovery on day 1, architecture by day 3, first working build by day 7, and production deploy on day 14.'],
        ['Can I upgrade or switch plans?', 'Yes, at any time. We pro-rate any mid-project upgrades. Downgrades take effect on the next project engagement.'],
        ['Do you offer ongoing maintenance after launch?', 'All plans include 30 days of post-launch support at no charge. After that, we offer retainer agreements starting from $499/month.'],
        ['What if my project is larger than one sprint?', 'Complex products are broken into 14-day vertical slices. Each sprint delivers a fully working increment. Growth and Enterprise plans support multiple concurrent sprints.'],
        ['Is the source code mine?', 'Absolutely. You receive full ownership of all source code, documentation, and deployment pipelines from day one.'],
        ['Do you sign NDAs?', 'Yes, we sign mutual NDAs before any discovery call. Your IP and business information are completely confidential.'],
      ];
    @endphp

    <div class="space-y-3 reveal" x-data="{ open: null }">
      @foreach($faqs as $i => [$q,$a])
      <div class="card-blue rounded-xl overflow-hidden">
        <button @click="open = open === {{ $i }} ? null : {{ $i }}"
                class="w-full flex items-center justify-between px-6 py-5 text-left">
          <span class="text-sm font-bold text-white pr-4">{{ $q }}</span>
          <span class="material-symbols-outlined text-primary text-[20px] shrink-0 transition-transform duration-300"
                :class="open === {{ $i }} ? 'rotate-180' : ''">expand_more</span>
        </button>
        <div x-show="open === {{ $i }}"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2">
          <div class="px-6 pb-5 pt-0 text-sm text-slate-400 leading-relaxed border-t border-primary/10">{{ $a }}</div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ══════════ FINAL CTA ══════════ --}}
<div class="blue-divider"></div>
<section class="py-24 relative overflow-hidden">
  <div class="pointer-events-none absolute inset-0">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-primary/5 to-transparent"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[900px] h-[400px] bg-primary/8 rounded-full blur-[140px]"></div>
  </div>

  <div class="max-w-3xl mx-auto px-6 lg:px-8 text-center relative z-10 reveal">
    <h2 class="text-5xl font-black tracking-tighter text-white mb-5 leading-tight">
      Still Have Questions?<br /><span class="text-grd">Let's Talk.</span>
    </h2>
    <span class="accent-bar accent-bar-c mb-8 block"></span>
    <p class="text-slate-400 mb-10">Our architects respond within 4 hours on business days.</p>
    <div class="flex flex-col sm:flex-row justify-center gap-4">
      <a href="/#contact"
         class="btn-glow inline-flex items-center justify-center gap-2 bg-primary text-white px-10 py-4 rounded-xl font-bold hover:brightness-110 transition-all shadow-lg shadow-primary/25">
        <span class="material-symbols-outlined text-[18px]">chat</span> Book a Discovery Call
      </a>
      <a href="{{ route('services.catalog') }}"
         class="inline-flex items-center justify-center gap-2 card-glass text-white/60 hover:text-white px-10 py-4 rounded-xl font-bold transition-all border border-primary/15 hover:border-primary/35">
        View Services
      </a>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
const ro = new IntersectionObserver(e => e.forEach(x => { if(x.isIntersecting) x.target.classList.add('in'); }), { threshold:0.1, rootMargin:'0px 0px -40px 0px' });
document.querySelectorAll('.reveal').forEach(el => ro.observe(el));

function pricingPage() {
  return { annual: false };
}
</script>
@endpush
