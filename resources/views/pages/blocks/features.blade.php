<section class="py-32 bg-node-dark text-white overflow-hidden relative border-y border-white/5">
  <div class="max-w-7xl mx-auto px-8 relative z-10">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-20 gap-8">
        <div class="max-w-xl">
            <h2 class="text-4xl font-extrabold tracking-tighter mb-6">{{ $data['title'] ?? 'Architectural Integrity' }}</h2>
            <p class="text-surface-container-high opacity-70 leading-relaxed font-medium italic">
                {{ $data['subtitle'] ?? 'Unwavering commitment to structural excellence and mathematical precision.' }}
            </p>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-secondary text-5xl font-black italic opacity-50">{{ $data['index'] ?? '01' }}</span>
            <div class="w-20 h-px bg-secondary opacity-30 mt-4"></div>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
      @foreach($data['items'] ?? [] as $item)
        <div class="p-10 rounded border-node bg-transparent/5 hover:bg-transparent/[0.07] transition-all group">
          <div class="text-primary mb-8">
            <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">{{ $item['icon'] ?? 'token' }}</span>
          </div>
          <h4 class="text-xl font-bold mb-4 tracking-tight uppercase tracking-widest">{{ $item['title'] ?? 'UNIT_NAME' }}</h4>
          <p class="text-surface-container-high/60 text-sm leading-relaxed mb-10 font-medium">
            {{ $item['description'] ?? 'Systemic module description.' }}
          </p>
          <div class="flex justify-between items-center pt-6 border-t border-white/5">
              <span class="label-mono opacity-40 text-[8px] tracking-[0.2em] font-black uppercase">{{ $item['meta_1'] ?? 'ID: NODE_77' }}</span>
              <span class="label-mono opacity-40 text-[8px] tracking-[0.2em] font-black uppercase">{{ $item['meta_2'] ?? 'TYP: STABLE' }}</span>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
