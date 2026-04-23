@props(['steps', 'currentStep'])

<div {{ $attributes->merge(['class' => 'mb-12']) }}>
    <div class="flex items-center justify-between relative">
        {{-- Progress Line Background --}}
        <div class="absolute top-1/2 left-0 w-full h-0.5 bg-slate-100 -translate-y-1/2 z-0"></div>
        
        {{-- Active Progress Line --}}
        <div class="absolute top-1/2 left-0 h-0.5 bg-primary -translate-y-1/2 z-0 transition-all duration-500"
             :style="'width: ' + ((currentStep - 1) / ({{ count($steps) }} - 1) * 100) + '%'"></div>

        @foreach($steps as $index => $step)
            <div class="relative z-10 flex flex-col items-center gap-3">
                <button type="button" 
                        @click="if({{ $index + 1 }} < currentStep || validateStep(currentStep)) currentStep = {{ $index + 1 }}"
                        class="w-10 h-10 rounded-full flex items-center justify-center border-4 transition-all duration-500 shadow-sm
                               :class="currentStep == {{ $index + 1 }} ? 'bg-primary border-primary/20 text-white scale-110 shadow-primary/20' : 
                                       (currentStep > {{ $index + 1 }} ? 'bg-emerald-500 border-emerald-100 text-white' : 'bg-white border-slate-50 text-slate-300')">
                    <span class="text-xs font-black">
                        <template x-if="currentStep > {{ $index + 1 }}">
                            <span class="material-symbols-outlined text-base">check</span>
                        </template>
                        <template x-if="currentStep <= {{ $index + 1 }}">
                            <span>{{ $index + 1 }}</span>
                        </template>
                    </span>
                </button>
                <span class="text-[9px] font-black uppercase tracking-widest transition-colors duration-500"
                      :class="currentStep >= {{ $index + 1 }} ? 'text-on-surface' : 'text-slate-300'">
                    {{ $step['label'] }}
                </span>
            </div>
        @endforeach
    </div>
</div>
