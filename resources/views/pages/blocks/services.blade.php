<section class="py-32 bg-transparent">
  <div class="max-w-7xl mx-auto px-8">
    <div class="text-center mb-24">
      <h3 class="text-4xl font-extrabold tracking-tighter text-on-surface">{{ $data['title'] ?? 'Capability Ledger' }}</h3>
      <div class="w-12 h-1 bg-primary mx-auto mt-6 opacity-80"></div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-0 border border-outline-variant/30 rounded overflow-hidden shadow-sm">
      @foreach($data['items'] ?? [] as $item)
        <div class="p-10 border border-outline-variant/20 hover:bg-surface-container-low transition-all group flex flex-col justify-between">
          <div>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-2 h-2 rounded-full bg-primary"></div>
                <span class="label-mono opacity-80 uppercase tracking-widest text-[9px]">{{ $item['title'] ?? 'Technical Node' }}</span>
            </div>
            <p class="text-on-surface-variant text-sm leading-relaxed mb-12 opacity-80 italic font-medium">
              {{ $item['description'] ?? 'High-precision engineering unit.' }}
            </p>
          </div>
          <div class="flex flex-col gap-6">
              <div class="flex justify-between items-end border-t border-outline-variant/10 pt-6">
                  <div class="flex flex-col">
                      <span class="text-3xl font-black text-primary tracking-tighter">{{ $item['stat_1_value'] ?? '99.9%' }}</span>
                      <span class="label-mono text-[8px] opacity-40 mt-1 uppercase">{{ $item['stat_1_label'] ?? 'PRECISION' }}</span>
                  </div>
                  <div class="flex flex-col items-end">
                    <span class="text-xl font-bold text-on-surface tracking-tighter">{{ $item['stat_2_value'] ?? 'NEURAL' }}</span>
                    <span class="label-mono text-[8px] opacity-40 mt-1 uppercase">{{ $item['stat_2_label'] ?? 'ENGINE' }}</span>
                </div>
              </div>
          </div>
        </div>
      @endforeach
    </div>

    @if(!empty($data['ledger_id']))
    <div class="mt-8 flex justify-between items-center px-6">
        <div class="flex items-center gap-4 opacity-30">
            <span class="label-mono text-[8px]">LEDGER_ID: {{ $data['ledger_id'] }}</span>
            <span class="label-mono text-[8px]">ARCHITECT_TOKEN: SYNC_CONFIRMED</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-2 h-2 rounded-full bg-secondary animate-pulse"></div>
            <span class="label-mono text-[8px] opacity-50 uppercase font-black">Architecture_Stabilized</span>
        </div>
    </div>
    @endif
  </div>
</section>
