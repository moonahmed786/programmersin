<section class="relative overflow-hidden bg-transparent pt-24 pb-32">
  <div class="max-w-7xl mx-auto px-8 grid lg:grid-cols-2 gap-20 items-center">
    <div class="z-10">
      <div class="flex items-center gap-3 mb-8">
        <div class="w-10 h-px bg-primary opacity-30"></div>
        <span class="label-mono text-primary opacity-80 uppercase tracking-widest text-[9px]">{{ $data['label'] ?? 'Velocity Engineering' }}</span>
      </div>
      <h1 class="text-[72px] font-extrabold tracking-tighter leading-[0.9] text-on-surface mb-8">
        {{ $data['title'] ?? 'Architecting Intelligence' }}
      </h1>
      <p class="text-lg text-on-surface-variant max-w-xl leading-relaxed mb-12 opacity-80 font-medium">
        {{ $data['subtitle'] ?? '' }}
      </p>
      @if(!empty($data['cta_text']))
      <div class="flex flex-wrap gap-4">
        <a href="{{ $data['cta_url'] ?? '#' }}" class="bg-primary text-white px-10 py-4 rounded font-bold transition-all hover:brightness-110 shadow-lg shadow-primary/20">
          {{ $data['cta_text'] }}
        </a>
      </div>
      @endif
    </div>
    <div class="relative group">
      <div class="aspect-square bg-slate-900 rounded-node overflow-hidden shadow-2xl relative border-node border-white/5">
        <img class="w-full h-full object-cover opacity-60 group-hover:scale-105 transition-all duration-1000"
          src="{{ $data['image'] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuB8fl98XnYzAO8MIxMbdOq2sHWJWW39dWTi1lfRBQonvGVOjdqjS9_FOMSm2yyN0Egfu5wR6LV-iG0hGS2rDjhTw9q7xdEkDk_ZvOk07Rjp8AvHVh12l3VKdYV7DOu9Lg8_oCkpewGPNQ1mtUnGlO7SDfC9Qgigyq8SUX2dxmUOm6c4bd6fTbAahdK3fYPF47Y1j_j2k_pLRXCrOi3wuPEWHXFfKXKZCyENFUFn07GXZHA31DlB_EavbL5OVFUAgxj2T36v6OFNGv1s' }}" />
        
        <div class="absolute inset-0 bg-gradient-to-tr from-primary/20 to-transparent"></div>
        
        <!-- Floating Badge: Delivery Window -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 w-fit bg-transparent p-5 rounded shadow-2xl border-node flex items-center gap-4 animate-in-fade" style="animation-delay: 0.5s">
            <div class="w-10 h-10 rounded bg-secondary/10 flex items-center justify-center text-secondary">
                <span class="material-symbols-outlined text-xl">timer</span>
            </div>
            <div class="flex flex-col">
                <span class="text-[9px] uppercase tracking-[0.2em] font-bold text-on-surface-variant leading-none">Delivery window</span>
                <span class="text-xl font-bold tracking-tighter text-on-surface mt-1">{{ $data['badge_text'] ?? '14 Days Flat' }}</span>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
