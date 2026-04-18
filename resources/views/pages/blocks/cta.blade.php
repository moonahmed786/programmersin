<section class="py-32 bg-node-dark text-white text-center relative overflow-hidden">
  <!-- Background mesh/grid effect -->
  <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 30px 30px;"></div>
  
  <div class="max-w-4xl mx-auto px-8 relative z-10">
    <h2 class="text-[56px] font-extrabold tracking-tighter leading-tight mb-8">
      {{ $data['title'] ?? 'Ready to Build Your Digital Monarchy?' }}
    </h2>
    <p class="text-xl text-surface-container-high opacity-70 mb-12 max-w-2xl mx-auto leading-relaxed">
      {{ $data['subtitle'] ?? 'Join the elite enterprises leveraging 14-day velocity delivery for mission-critical systems.' }}
    </p>
    <div class="flex flex-col sm:flex-row justify-center gap-4">
      <a href="{{ $data['url'] ?? '#' }}" class="bg-primary text-white px-10 py-5 rounded font-bold text-lg hover:brightness-110 transition-all shadow-2xl shadow-primary/20">
        {{ $data['button_text'] ?? 'Start 14-Day Sprint' }}
      </a>
      @if(!empty($data['secondary_url']))
      <a href="{{ $data['secondary_url'] }}" class="border border-white/20 text-white px-10 py-5 rounded font-bold text-lg hover:bg-transparent/5 transition-all">
        {{ $data['secondary_text'] ?? 'Speak with an Architect' }}
      </a>
      @endif
    </div>
  </div>
</section>
