@extends('layouts.backend')

@section('content')

<!-- Personnel Configuration Header -->
<div class="mb-14 px-2">
    <x-admin.breadcrumbs :items="[
        ['label' => 'Personnel Registry', 'url' => route('admin.employees.index')],
        ['label' => 'Unit Configuration Override']
    ]" />

    <div class="flex items-center gap-6 mt-8">
        <div class="flex flex-col gap-2">
            <h1 class="text-3xl font-black tracking-tighter text-on-surface uppercase italic">
                Unit <span class="text-primary opacity-90">Configuration</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-black uppercase tracking-[0.4em] flex items-center gap-3">
                <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse shadow-[0_0_8px_rgba(0,118,255,0.3)]"></span>
                Refining personnel node: <span class="text-on-surface font-mono">{{ $employee->email }}</span>
            </p>
        </div>
    </div>
</div>

<div class="max-w-5xl" x-data="{ 
    currentStep: 1,
    loading: false,
    education: {{ json_encode($employee->education ?? []) }},
    skills: {{ json_encode($employee->skills ?? ['Architecture' => '', 'Backend' => '', 'Frontend' => '', 'Databases' => '', 'AI' => '', 'Cloud' => '', 'DevOps' => '']) }},
    experience: {{ json_encode($employee->experience ?? []) }},
    
    addEducation() { this.education.push({ university: '', info: '' }) },
    removeEducation(index) { this.education.splice(index, 1) },
    
    addExperience() { this.experience.push({ company: '', range: '', role: '', bullets: [''] }) },
    removeExperience(index) { this.experience.splice(index, 1) },
    addBullet(expIndex) { this.experience[expIndex].bullets.push('') },
    removeBullet(expIndex, bulletIndex) { this.experience[expIndex].bullets.splice(bulletIndex, 1) },

    validateStep(step) {
        if (step === 1) {
            const name = document.getElementById('name').value;
            if (!name) { alert('Legal Identifier is required to proceed.'); return false; }
        }
        return true;
    }
}">
    {{-- Form Stepper --}}
    <x-admin.form-stepper :steps="[
        ['label' => 'Identity'],
        ['label' => 'Academic'],
        ['label' => 'Capability'],
        ['label' => 'Operations'],
        ['label' => 'Authority']
    ]" ::current-step="currentStep" />

    <div class="bg-white rounded-stellar overflow-hidden border border-slate-100 shadow-sm animate-in-fade">
        <form action="{{ route('admin.employees.update', $employee) }}" method="POST" @submit="loading = true">
            @csrf
            @method('PUT')

            <div class="p-12">
                <!-- Step 01: Core Profile -->
                <div x-show="currentStep === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" class="space-y-16">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start">
                        <div class="lg:col-span-1">
                            <span class="text-[9px] font-black text-primary uppercase tracking-[0.3em] block mb-3 opacity-60 italic">Section 01</span>
                            <h3 class="font-black text-on-surface tracking-tighter uppercase text-sm leading-tight">Identity & Authority</h3>
                        </div>
                        <div class="lg:col-span-3 space-y-10">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                                <div class="space-y-1">
                                    <label class="label-material" for="name">Legal Identifier</label>
                                    <input id="name" type="text" name="name" value="{{ old('name', $employee->name) }}"
                                        class="input-material @error('name') border-rose-300 ring-rose-50 ring-4 @enderror"
                                        placeholder="Input full name...">
                                    @error('name') <p class="text-[10px] text-rose-600 font-black uppercase tracking-widest mt-3 flex items-center gap-2">
                                        <span class="material-symbols-outlined text-xs">error</span>
                                        {{ $message }}
                                    </p> @enderror
                                </div>

                                <div class="space-y-1">
                                    <label class="label-material" for="position">Technical Specialization</label>
                                    <input id="position" type="text" name="position" value="{{ old('position', $employee->position) }}"
                                        class="input-material"
                                        placeholder="e.g. Lead Solutions Architect">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                                <div class="space-y-1">
                                    <label class="label-material" for="phone">Comm Link (Phone)</label>
                                    <input id="phone" type="text" name="phone" value="{{ old('phone', $employee->phone) }}"
                                        class="input-material font-mono"
                                        placeholder="+XX XXX XXXXXXX">
                                </div>

                                <div class="space-y-1">
                                    <label class="label-material" for="location">Deployment Zone (Location)</label>
                                    <input id="location" type="text" name="location" value="{{ old('location', $employee->location) }}"
                                        class="input-material"
                                        placeholder="City, Region, Node">
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label class="label-material" for="bio">Architectural Dossier (Bio)</label>
                                <textarea id="bio" name="bio" rows="6"
                                    class="input-material h-44 resize-none italic leading-relaxed">{{ old('bio', $employee->bio) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 02: Knowledge Matrix -->
                <div x-show="currentStep === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" x-cloak class="space-y-16">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start">
                        <div class="lg:col-span-1">
                            <span class="text-[9px] font-black text-primary uppercase tracking-[0.3em] block mb-3 opacity-60 italic">Section 02</span>
                            <h3 class="font-black text-on-surface tracking-tighter uppercase text-sm leading-tight">Academic Integrity</h3>
                        </div>
                        <div class="lg:col-span-3 space-y-6">
                            <template x-for="(item, index) in education" :key="index">
                                <div class="p-8 bg-slate-50 border border-slate-100 rounded-2xl relative group transition-all hover:bg-white hover:shadow-sm">
                                    <button type="button" @click="removeEducation(index)" class="absolute top-6 right-6 w-8 h-8 flex items-center justify-center rounded-lg text-slate-300 hover:text-rose-500 hover:bg-rose-50 transition-all">
                                        <span class="material-symbols-outlined text-lg">delete</span>
                                    </button>
                                    <div class="grid grid-cols-1 gap-6">
                                        <div class="space-y-1">
                                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest pl-1">Institution</label>
                                            <input type="text" :name="'education['+index+'][university]'" x-model="item.university" 
                                                class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs font-black text-on-surface focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all" placeholder="Enter University/Institution Name">
                                        </div>
                                        <div class="space-y-1">
                                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest pl-1">Credentials | Tenure</label>
                                            <input type="text" :name="'education['+index+'][info]'" x-model="item.info" 
                                                class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs font-bold text-on-surface-variant italic" placeholder="e.g. MS in Advanced Architecture (2018-2022)">
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <button type="button" @click="addEducation()" class="flex items-center gap-3 text-[10px] font-black uppercase tracking-widest text-primary hover:text-on-surface transition-all bg-primary/5 px-6 py-3 rounded-xl border border-primary/10">
                                <span class="material-symbols-outlined text-lg">add_circle</span>
                                Append Education Record
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 03: Capability Mapping -->
                <div x-show="currentStep === 3" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" x-cloak class="space-y-16">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start">
                        <div class="lg:col-span-1">
                            <span class="text-[9px] font-black text-primary uppercase tracking-[0.3em] block mb-3 opacity-60 italic">Section 03</span>
                            <h3 class="font-black text-on-surface tracking-tighter uppercase text-sm leading-tight">Capability Node Mapping</h3>
                        </div>
                        <div class="lg:col-span-3">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">
                                <template x-for="(value, key) in skills" :key="key">
                                    <div class="space-y-3">
                                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1" x-text="key"></label>
                                        <div class="group relative">
                                            <input type="text" :name="'skills['+key+']'" x-model="skills[key]" 
                                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-xs font-black text-on-surface focus:ring-4 focus:ring-primary/5 focus:border-primary focus:bg-white transition-all shadow-sm" 
                                                placeholder="e.g. PHP, Laravel, PostgreSQL...">
                                            <span class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-200 group-focus-within:text-primary opacity-40 transition-all text-lg">bolt</span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 04: Operational Chronicles -->
                <div x-show="currentStep === 4" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" x-cloak class="space-y-16">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start">
                        <div class="lg:col-span-1">
                            <span class="text-[9px] font-black text-primary uppercase tracking-[0.3em] block mb-3 opacity-60 italic">Section 04</span>
                            <h3 class="font-black text-on-surface tracking-tighter uppercase text-sm leading-tight">Operational Chronicles</h3>
                        </div>
                        <div class="lg:col-span-3 space-y-10">
                            <template x-for="(exp, expIdx) in experience" :key="expIdx">
                                <div class="p-10 bg-slate-50 border border-slate-100 rounded-3xl relative group transition-all hover:bg-white hover:shadow-md">
                                    <button type="button" @click="removeExperience(expIdx)" class="absolute top-8 right-8 w-10 h-10 flex items-center justify-center rounded-xl text-slate-300 hover:text-rose-600 hover:bg-rose-50 transition-all">
                                        <span class="material-symbols-outlined text-xl">delete</span>
                                    </button>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                                        <div class="space-y-1">
                                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest pl-1">Node Entity (Company)</label>
                                            <input type="text" :name="'experience['+expIdx+'][company]'" x-model="exp.company" 
                                                class="w-full bg-white border border-slate-200 rounded-xl px-5 py-3.5 text-sm font-black text-on-surface focus:ring-4 focus:ring-primary/5 focus:border-primary transition-all shadow-sm" placeholder="e.g. Global Tech Hub">
                                        </div>
                                        <div class="space-y-1">
                                            <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest pl-1">Chronicle Span (Range)</label>
                                            <input type="text" :name="'experience['+expIdx+'][range]'" x-model="exp.range" 
                                                class="w-full bg-white border border-slate-200 rounded-xl px-5 py-3.5 text-xs font-mono font-bold text-primary italic" placeholder="e.g. JAN 2022 - PRESENT">
                                        </div>
                                    </div>

                                    <div class="space-y-1 mb-10">
                                        <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest pl-1">Authority Profile (Role)</label>
                                        <input type="text" :name="'experience['+expIdx+'][role]'" x-model="exp.role" 
                                            class="w-full bg-white border border-slate-200 rounded-xl px-6 py-4 text-base font-black text-on-surface tracking-tight" placeholder="e.g. Senior Architectural Analyst">
                                    </div>

                                    <div class="space-y-4">
                                        <label class="text-[10px] font-black text-slate-600 uppercase tracking-widest pl-1 border-b border-slate-100 pb-2 flex items-center gap-2">
                                            <span class="material-symbols-outlined text-sm text-primary">analytics</span>
                                            Mission Bulletins
                                        </label>
                                        <template x-for="(bullet, bIdx) in exp.bullets" :key="bIdx">
                                            <div class="flex items-center gap-4 group/bullet">
                                                <div class="w-2 h-2 rounded-full bg-primary/20 flex-shrink-0 group-focus-within/bullet:bg-primary transition-colors"></div>
                                                <input type="text" :name="'experience['+expIdx+'][bullets]['+bIdx+']'" x-model="exp.bullets[bIdx]" 
                                                    class="flex-1 bg-white border border-slate-100 rounded-2xl px-5 py-3.5 text-xs font-bold text-on-surface-variant focus:ring-2 focus:ring-primary/5 focus:border-primary/40 focus:bg-white transition-all" placeholder="Describe operational success node...">
                                                <button type="button" @click="removeBullet(expIdx, bIdx)" class="text-slate-200 hover:text-rose-500 transition-colors">
                                                    <span class="material-symbols-outlined text-lg">close</span>
                                                </button>
                                            </div>
                                        </template>
                                        <button type="button" @click="addBullet(expIdx)" class="text-[9px] font-black uppercase tracking-widest text-primary flex items-center gap-2 mt-4 hover:translate-x-1 transition-transform bg-primary/5 px-4 py-2 rounded-lg border border-primary/10">
                                            <span class="material-symbols-outlined text-base">add</span>
                                            Append Bulletin
                                        </button>
                                    </div>
                                </div>
                            </template>

                            <button type="button" @click="addExperience()" class="w-full py-8 border-2 border-dashed border-slate-100 rounded-3xl flex flex-col items-center justify-center gap-3 text-slate-300 hover:text-primary hover:border-primary/30 transition-all group bg-slate-50/50">
                                <span class="material-symbols-outlined text-4xl opacity-40 group-hover:scale-110 transition-transform">add_circle</span>
                                <span class="font-black text-[11px] uppercase tracking-[0.3em]">Initialize Operational Chronic Node</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 05: System Authority Access -->
                <div x-show="currentStep === 5" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" x-cloak class="space-y-16">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start">
                        <div class="lg:col-span-1">
                            <span class="text-[9px] font-black text-primary uppercase tracking-[0.3em] block mb-3 opacity-60 italic">Section 05</span>
                            <h3 class="font-black text-on-surface tracking-tighter uppercase text-sm leading-tight">Authority & Credentials</h3>
                        </div>
                        <div class="lg:col-span-3 space-y-10">
                            <div class="space-y-1">
                                <label class="label-material" for="email">Primary Auth Node (Email)</label>
                                <input id="email" type="email" name="email" value="{{ old('email', $employee->email) }}"
                                    class="input-material font-mono @error('email') border-rose-300 ring-rose-50 ring-4 @enderror"
                                    placeholder="access@vector.hub">
                                @error('email') <p class="text-[10px] text-rose-600 font-black uppercase tracking-widest mt-3 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-xs">error</span>
                                    {{ $message }}
                                </p> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                                <div class="space-y-1">
                                    <label class="label-material" for="password">System Hash Override (Password)</label>
                                    <input id="password" type="password" name="password"
                                        class="input-material font-mono @error('password') border-rose-300 @enderror"
                                        placeholder="[ENCRYPTED]">
                                    @error('password') <p class="text-[10px] text-rose-600 font-black uppercase tracking-widest mt-3 flex items-center gap-2">
                                        <span class="material-symbols-outlined text-xs">lock</span>
                                        {{ $message }}
                                    </p> @enderror
                                </div>

                                <div class="space-y-1">
                                    <label class="label-material" for="password_confirmation">Hash Validation</label>
                                    <input id="password_confirmation" type="password" name="password_confirmation"
                                        class="input-material font-mono"
                                        placeholder="Confirm Hash Sequence">
                                </div>
                            </div>

                            <div class="pt-6">
                                <label class="flex items-center gap-5 cursor-pointer group">
                                    <div class="relative">
                                        <input type="hidden" name="is_active" value="0">
                                        <input id="is_active" type="checkbox" name="is_active" value="1" {{ old('is_active', $employee->is_active) ? 'checked' : '' }}
                                            class="sr-only peer">
                                        <div class="w-16 h-8 bg-slate-100 rounded-full peer-checked:bg-primary transition-all shadow-inner border border-slate-200"></div>
                                        <div class="absolute top-1 left-1 w-6 h-6 bg-white rounded-full shadow-md transition-all border border-slate-100 peer-checked:translate-x-8"></div>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-xs font-black uppercase tracking-widest text-on-surface group-hover:text-primary transition-colors leading-none">Authority Protocol Active</span>
                                        <span class="text-[9px] text-slate-400 font-bold uppercase tracking-tighter mt-1">Personnel unit has global read/write access to system nodes</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Runtime Controls -->
            <div class="px-12 py-12 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-6">
                    {{-- Status Indicator --}}
                    <div class="flex items-center gap-4">
                        <div class="w-3 h-3 rounded-full animate-pulse shadow-sm"
                             :class="currentStep === 5 ? 'bg-emerald-500 shadow-emerald-200' : 'bg-primary shadow-primary-200'"></div>
                        <div class="flex flex-col leading-none">
                            <span class="text-[9px] font-black text-on-surface uppercase tracking-widest" 
                                  x-text="currentStep === 5 ? 'Final Runtime Sync' : 'Configuration Phase ' + currentStep + '/5'"></span>
                            <span class="text-[8px] text-slate-400 font-bold uppercase tracking-widest mt-1">Integrity: VERIFIED</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-6">
                    <button type="button" x-show="currentStep > 1" @click="currentStep--" 
                            class="text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-on-surface transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">arrow_back</span>
                        Previous Phase
                    </button>
                    
                    <button type="button" x-show="currentStep < 5" @click="if(validateStep(currentStep)) currentStep++" 
                            class="btn-stellar px-10 py-4">
                        Next Synchronization
                        <span class="material-symbols-outlined text-base">arrow_forward</span>
                    </button>

                    <button type="submit" x-show="currentStep === 5" 
                            :disabled="loading"
                            class="btn-stellar px-12 py-5 bg-emerald-600 hover:bg-emerald-700 shadow-emerald-100 disabled:opacity-50 disabled:cursor-wait relative overflow-hidden">
                        <span :class="{ 'opacity-0': loading }" class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-lg">terminal</span>
                            Commit Protocol
                        </span>
                        <div x-show="loading" class="absolute inset-0 flex items-center justify-center">
                            <div class="w-5 h-5 border-2 border-white/30 border-t-white rounded-full animate-spin"></div>
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
