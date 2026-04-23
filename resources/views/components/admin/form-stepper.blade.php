@props(['steps', 'currentStep'])

<div {{ $attributes->merge(['class' => 'mb-10']) }}>
    <div class="flex items-center justify-between relative">
        {{-- Background line --}}
        <div class="absolute top-5 left-0 w-full h-0.5 bg-slate-100 z-0"></div>
        
        {{-- Active line --}}
        <div class="absolute top-5 left-0 h-0.5 bg-primary z-0 transition-all duration-500"
             :style="'width: ' + ((currentStep - 1) / ({{ count($steps) }} - 1) * 100) + '%'"></div>

        @foreach($steps as $index => $step)
            <div class="relative z-10 flex flex-col items-center gap-2">
                <button type="button" 
                        @click="if({{ $index + 1 }} < currentStep || validateStep(currentStep)) currentStep = {{ $index + 1 }}"
                        class="w-10 h-10 rounded-full flex items-center justify-center border-2 transition-all duration-300 text-sm font-semibold"
                        :class="currentStep == {{ $index + 1 }} 
                            ? 'bg-primary border-primary text-white shadow-md shadow-primary/20' 
                            : (currentStep > {{ $index + 1 }} 
                                ? 'bg-emerald-500 border-emerald-500 text-white' 
                                : 'bg-white border-slate-200 text-slate-400')">
                    <template x-if="currentStep > {{ $index + 1 }}">
                        <span class="material-symbols-outlined text-base">check</span>
                    </template>
                    <template x-if="currentStep <= {{ $index + 1 }}">
                        <span>{{ $index + 1 }}</span>
                    </template>
                </button>
                <span class="text-[11px] font-medium transition-colors duration-300"
                      :class="currentStep >= {{ $index + 1 }} ? 'text-slate-900' : 'text-slate-400'">
                    {{ $step['label'] }}
                </span>
            </div>
        @endforeach
    </div>
</div>
