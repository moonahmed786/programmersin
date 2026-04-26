@extends('layouts.frontend')

@push('styles')
<style>
@keyframes count-in { from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:translateY(0)} }
@keyframes spin-slow { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }

.img-overlay { transition:opacity .5s ease; }
.project-card:hover .img-overlay { opacity:.7; }
</style>
@endpush

@section('title', 'Portfolio — ' . \App\Models\Setting::get('site_name', 'ProgrammersIn'))

@section('content')

{{-- ══════════ HERO ══════════ --}}
<section class="relative overflow-hidden bg-dots pt-32 pb-24">
  <div class="pointer-events-none absolute inset-0">
    <div class="absolute top-0 right-1/3 w-[700px] h-[700px] bg-secondary/6 rounded-full blur-[140px]"></div>
    <div class="absolute bottom-0 left-1/4  w-[500px] h-[500px] bg-primary/7 rounded-full blur-[110px]"></div>
  </div>

  <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
    <div class="max-w-3xl" style="animation: slide-left .8s ease both">
      <span class="inline-block text-[10px] font-bold text-secondary/70 tracking-[.3em] uppercase mb-5">Delivered Products</span>
      <h1 class="text-6xl lg:text-8xl font-black tracking-tighter text-white leading-[.9] mb-4">
        Engineering<br /><span class="text-grd">Success Stories.</span>
      </h1>
      <span class="accent-bar mb-6 block"></span>
      <p class="text-xl text-slate-400 leading-relaxed max-w-xl mb-10">
        From AI-powered CRMs to enterprise data platforms — each product shipped in 14 days or less.
      </p>

      <div class="flex flex-wrap gap-4" style="animation: count-in .7s .4s ease both; opacity:0">
        @foreach([['{{ $projects->total() ?? $projects->count() }}','Projects Shipped','primary'],['14','Day Avg. Delivery','secondary'],['99.9%','SLA Uptime','violet-400']] as [$n,$l,$c])
        <div class="card-blue rounded-xl px-5 py-3">
          <span class="text-xl font-black text-{{ $c }}">{{ $n }}</span>
          <span class="text-[10px] text-slate-500 font-bold uppercase tracking-wider ml-2">{{ $l }}</span>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<div class="blue-divider"></div>

{{-- ══════════ FILTER TABS ══════════ --}}
<section class="py-5 sticky top-16 z-30 backdrop-blur-md border-b border-primary/10"
         style="background:rgba(3,12,26,.92)">
  <div class="max-w-7xl mx-auto px-6 lg:px-8"
       x-data="{ active: 'all' }">
    <div class="flex flex-wrap gap-2">
      @php $filters = ['all'=>'All Projects','AI Engineering'=>'AI Engineering','SaaS Product Studio'=>'SaaS Studio','Cloud & DevOps'=>'Cloud & DevOps','Data Engineering'=>'Data Engineering','Mobile Development'=>'Mobile']; @endphp
      @foreach($filters as $val => $label)
      <button @click="active='{{ $val }}'; filterProjects('{{ $val }}')"
              :class="active==='{{ $val }}' ? 'bg-primary text-white shadow-lg shadow-primary/25' : 'card-blue text-white/50 hover:text-white hover:border-primary/30'"
              class="px-4 py-2 rounded-lg text-xs font-bold transition-all border border-transparent">
        {{ $label }}
      </button>
      @endforeach
    </div>
  </div>
</section>

{{-- ══════════ PROJECTS GRID ══════════ --}}
<section class="py-20 bg-grid">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">

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

    <div id="projects-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse($projects as $i => $project)
      @php [$c1,$c2] = $gradients[$i % count($gradients)]; @endphp
      <article class="project-card card-blue rounded-2xl overflow-hidden reveal block"
               data-service="{{ $project->service?->title }}"
               style="transition-delay:{{ $i*80 }}ms"
               x-data="{ rx:0, ry:0, on:false }"
               @mouseenter="on=true"
               @mousemove="if(on){ const r=$el.getBoundingClientRect(); ry=(($event.clientX-r.left)/r.width-.5)*14; rx=-(($event.clientY-r.top)/r.height-.5)*14 }"
               @mouseleave="on=false; rx=0; ry=0"
               :style="on ? `transform:perspective(900px) rotateX(${rx}deg) rotateY(${ry}deg) translateZ(8px);transition:transform .05s ease` : `transform:perspective(900px) rotateX(0deg) rotateY(0deg);transition:transform .5s ease`">

        <div class="relative h-52 overflow-hidden" style="background:linear-gradient(135deg,{{ $c1 }},{{ $c2 }})">
          @if($project->featured_image)
            <img src="{{ asset('storage/'.$project->featured_image) }}"
                 class="w-full h-full object-cover opacity-40 group-hover:scale-110 transition-transform duration-700" alt="">
          @else
            <div class="absolute inset-0 flex items-center justify-center">
              <span class="material-symbols-outlined text-white/5" style="font-size:120px">deployed_code</span>
            </div>
          @endif

          <div class="img-overlay absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

          <div class="absolute top-4 right-4 flex gap-2">
            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider backdrop-blur-sm
              {{ $project->status === 'completed' ? 'bg-secondary/25 text-secondary' : 'bg-primary/25 text-primary' }}">
              {{ ucfirst($project->status) }}
            </span>
          </div>

          @if($project->budget)
          <div class="absolute bottom-4 left-4">
            <span class="text-[10px] font-bold text-white/60 bg-primary/25 backdrop-blur-sm px-2 py-1 rounded-lg border border-primary/20">
              ${{ number_format($project->budget/1000,0) }}k
            </span>
          </div>
          @endif
        </div>

        <div class="p-7">
          @if($project->service)
          <div class="mb-3">
            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold text-primary bg-primary/10 border border-primary/15">
              {{ $project->service->title }}
            </span>
          </div>
          @endif
          <h3 class="text-xl font-bold text-white mb-2 leading-tight">{{ $project->title }}</h3>
          <p class="text-sm text-slate-400 line-clamp-2 leading-relaxed mb-6">
            {{ Str::limit($project->showcase_description ?: $project->description, 120) }}
          </p>
          <a href="{{ route('portfolio.show', $project->slug) }}"
             class="inline-flex items-center gap-2 text-sm font-bold text-primary hover:gap-3 transition-all group">
            View Case Study
            <span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
          </a>
        </div>
      </article>

      @empty
      <div class="col-span-full py-24 text-center">
        <span class="material-symbols-outlined text-6xl text-primary/10 mb-4 block">folder_open</span>
        <p class="text-lg text-slate-500 font-bold">Case studies coming soon…</p>
      </div>
      @endforelse
    </div>

    @if($projects instanceof \Illuminate\Pagination\LengthAwarePaginator && $projects->hasPages())
    <div class="mt-14">{{ $projects->links() }}</div>
    @endif
  </div>
</section>

{{-- ══════════ PROCESS BANNER ══════════ --}}
<div class="blue-divider"></div>
<section class="py-20">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="card-blue-hot rounded-3xl p-10 lg:p-14 grid lg:grid-cols-2 gap-12 items-center reveal">
      <div>
        <h2 class="text-4xl font-black tracking-tighter text-white mb-4 leading-tight">
          Want to be in our<br /><span class="text-grd">next success story?</span>
        </h2>
        <span class="accent-bar mb-5 block"></span>
        <p class="text-slate-400 text-sm leading-relaxed">
          We turn ambitious ideas into production products in 14 days. Tell us what you're building.
        </p>
      </div>
      <div class="flex flex-col sm:flex-row gap-4">
        <a href="/#contact"
           class="btn-glow flex-1 text-center bg-primary text-white px-7 py-4 rounded-xl font-bold hover:brightness-110 transition-all shadow-lg shadow-primary/25">
          Start a Project
        </a>
        <a href="{{ route('services.catalog') }}"
           class="flex-1 text-center card-glass text-white/60 hover:text-white px-7 py-4 rounded-xl font-bold transition-all border border-primary/15 hover:border-primary/35">
          Our Services
        </a>
      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
const ro = new IntersectionObserver(e => e.forEach(x => { if(x.isIntersecting) x.target.classList.add('in'); }), { threshold:0.1, rootMargin:'0px 0px -40px 0px' });
document.querySelectorAll('.reveal').forEach(el => ro.observe(el));

function filterProjects(val) {
  document.querySelectorAll('#projects-grid article').forEach(card => {
    const svc = card.dataset.service || '';
    card.style.display = (val === 'all' || svc.toLowerCase().includes(val.toLowerCase())) ? '' : 'none';
  });
}
</script>
@endpush
