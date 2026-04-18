@extends('layouts.backend')

@section('content')

<!-- Architect Unit Configuration Header -->
<div class="mb-12">
    <div class="flex items-center gap-4 mb-4">
        <a href="{{ route('admin.employees.index') }}" class="p-2 rounded-full hover:bg-surface-container-low transition-colors text-on-surface-variant opacity-40">
            <span class="material-symbols-outlined text-xl">arrow_back</span>
        </a>
        <div class="h-4 w-px bg-outline-variant/20 mx-2"></div>
        <div>
            <h1 class="text-2xl font-black tracking-tighter text-on-surface">Architect Unit Configuration</h1>
            <p class="text-[10px] text-on-surface-variant font-mono opacity-60 uppercase tracking-widest mt-1">Refining personnel node: {{ $employee->email }}</p>
        </div>
    </div>
</div>

<div class="max-w-4xl">
    <div class="bg-white rounded overflow-hidden border border-outline-variant/10 shadow-sm">
        <form action="{{ route('admin.employees.update', $employee) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="p-10 space-y-12">
                <!-- Group 01: Profile -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div>
                        <span class="label-mono text-[9px] opacity-40 uppercase tracking-widest block mb-1">Section 01</span>
                        <h3 class="font-black text-on-surface tracking-tight uppercase text-xs">Personnel Profile</h3>
                    </div>
                    <div class="md:col-span-2 space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="name">Legal Identifier (Name)</label>
                                <input id="name" type="text" name="name" value="{{ old('name', $employee->name) }}"
                                    class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-sm font-bold text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all @error('name') border-error @enderror"
                                    placeholder="Input name...">
                                @error('name') <p class="text-[9px] text-error font-bold uppercase tracking-widest mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="position">Technical Specialization</label>
                                <input id="position" type="text" name="position" value="{{ old('position', $employee->position) }}"
                                    class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-sm font-medium text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all"
                                    placeholder="e.g. Full Stack Architect">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="phone">Communication Node (Phone)</label>
                                <input id="phone" type="text" name="phone" value="{{ old('phone', $employee->phone) }}"
                                    class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-xs font-mono font-bold text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all"
                                    placeholder="+XX XXX XXXXXXX">
                            </div>

                            <div class="space-y-2">
                                <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="location">Geographic Node (Location)</label>
                                <input id="location" type="text" name="location" value="{{ old('location', $employee->location) }}"
                                    class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-xs font-mono font-bold text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all"
                                    placeholder="City, Province, Country">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="bio">Architectural Biography</label>
                            <textarea id="bio" name="bio" rows="4"
                                class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-sm font-medium text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all resize-none"
                                placeholder="Historical operational data...">{{ old('bio', $employee->bio) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="h-px bg-outline-variant/10"></div>

                <!-- Section 02: Education (Repeater) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10" x-data="{ 
                    education: {{ json_encode($employee->education ?? []) }},
                    addEducation() { this.education.push({ university: '', info: '' }) },
                    removeEducation(index) { this.education.splice(index, 1) }
                }">
                    <div>
                        <span class="label-mono text-[9px] opacity-40 uppercase tracking-widest block mb-1">Section 02</span>
                        <h3 class="font-black text-on-surface tracking-tight uppercase text-xs">Knowledge Matrix (Education)</h3>
                    </div>
                    <div class="md:col-span-2 space-y-6">
                        <template x-for="(item, index) in education" :key="index">
                            <div class="p-6 bg-slate-50 border border-slate-100 rounded-xl relative group">
                                <button type="button" @click="removeEducation(index)" class="absolute top-4 right-4 text-slate-300 hover:text-red-500 transition-colors">
                                    <span class="material-symbols-outlined text-sm">delete</span>
                                </button>
                                <div class="grid grid-cols-1 gap-4">
                                    <input type="text" :name="'education['+index+'][university]'" x-model="item.university" 
                                        class="w-full bg-white border border-slate-200 rounded px-4 py-2 text-xs font-bold" placeholder="University / Institution">
                                    <input type="text" :name="'education['+index+'][info]'" x-model="item.info" 
                                        class="w-full bg-white border border-slate-200 rounded px-4 py-2 text-xs" placeholder="Degree / Year Range (e.g. 2020-2022 Master of Science)">
                                </div>
                            </div>
                        </template>
                        <button type="button" @click="addEducation()" class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-primary hover:opacity-70 transition-opacity">
                            <span class="material-symbols-outlined text-sm">add_circle</span>
                            Append Education Entry
                        </button>
                    </div>
                </div>

                <div class="h-px bg-outline-variant/10"></div>

                <!-- Section 03: Skills Matrix -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10" x-data="{ 
                    skills: {{ json_encode($employee->skills ?? ['Architecture' => '', 'Backend' => '', 'Frontend' => '', 'Databases' => '', 'AI' => '', 'Cloud' => '', 'DevOps' => '']) }},
                }">
                    <div>
                        <span class="label-mono text-[9px] opacity-40 uppercase tracking-widest block mb-1">Section 03</span>
                        <h3 class="font-black text-on-surface tracking-tight uppercase text-xs">Capability Mapping (Skills)</h3>
                    </div>
                    <div class="md:col-span-2 space-y-4">
                        <template x-for="(value, key) in skills" :key="key">
                            <div class="space-y-1">
                                <label class="label-mono text-[9px] text-slate-400 uppercase tracking-widest" x-text="key"></label>
                                <input type="text" :name="'skills['+key+']'" x-model="skills[key]" 
                                    class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-2 text-xs font-medium" 
                                    placeholder="e.g. PHP, Laravel, Node.js">
                            </div>
                        </template>
                    </div>
                </div>

                <div class="h-px bg-outline-variant/10"></div>

                <!-- Section 04: Experience (Repeater) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10" x-data="{ 
                    experience: {{ json_encode($employee->experience ?? []) }},
                    addExperience() { this.experience.push({ company: '', range: '', role: '', bullets: [''] }) },
                    removeExperience(index) { this.experience.splice(index, 1) },
                    addBullet(expIndex) { this.experience[expIndex].bullets.push('') },
                    removeBullet(expIndex, bulletIndex) { this.experience[expIndex].bullets.splice(bulletIndex, 1) }
                }">
                    <div>
                        <span class="label-mono text-[9px] opacity-40 uppercase tracking-widest block mb-1">Section 04</span>
                        <h3 class="font-black text-on-surface tracking-tight uppercase text-xs">Operation History (Experience)</h3>
                    </div>
                    <div class="md:col-span-2 space-y-8">
                        <template x-for="(exp, expIdx) in experience" :key="expIdx">
                            <div class="p-8 bg-slate-50 border border-slate-100 rounded-2xl relative group">
                                <button type="button" @click="removeExperience(expIdx)" class="absolute top-6 right-6 text-slate-300 hover:text-red-500 transition-colors">
                                    <span class="material-symbols-outlined text-sm">delete</span>
                                </button>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                    <div class="space-y-1">
                                        <label class="label-mono text-[9px] text-slate-400 uppercase opacity-60">Node (Company)</label>
                                        <input type="text" :name="'experience['+expIdx+'][company]'" x-model="exp.company" 
                                            class="w-full bg-white border border-slate-200 rounded px-4 py-2 text-xs font-bold" placeholder="Company Name">
                                    </div>
                                    <div class="space-y-1">
                                        <label class="label-mono text-[9px] text-slate-400 uppercase opacity-60">Timeline</label>
                                        <input type="text" :name="'experience['+expIdx+'][range]'" x-model="exp.range" 
                                            class="w-full bg-white border border-slate-200 rounded px-4 py-2 text-xs font-mono" placeholder="Jul 2017 - PRESENT">
                                    </div>
                                </div>

                                <div class="space-y-1 mb-6">
                                    <label class="label-mono text-[9px] text-slate-400 uppercase opacity-60">Designation (Role)</label>
                                    <input type="text" :name="'experience['+expIdx+'][role]'" x-model="exp.role" 
                                        class="w-full bg-white border border-slate-200 rounded px-4 py-2 text-sm font-black" placeholder="Lead Architect & Solutions Lead">
                                </div>

                                <div class="space-y-3">
                                    <label class="label-mono text-[9px] text-slate-400 uppercase opacity-60">Operational Bulletins</label>
                                    <template x-for="(bullet, bIdx) in exp.bullets" :key="bIdx">
                                        <div class="flex items-center gap-3">
                                            <span class="w-1 h-1 rounded-full bg-slate-300 flex-shrink-0"></span>
                                            <input type="text" :name="'experience['+expIdx+'][bullets]['+bIdx+']'" x-model="exp.bullets[bIdx]" 
                                                class="flex-1 bg-white border border-slate-200 rounded px-3 py-1.5 text-[11px] font-medium" placeholder="Describe accomplishment...">
                                            <button type="button" @click="removeBullet(expIdx, bIdx)" class="text-slate-300 hover:text-red-500">
                                                <span class="material-symbols-outlined text-[10px]">close</span>
                                            </button>
                                        </div>
                                    </template>
                                    <button type="button" @click="addBullet(expIdx)" class="text-[9px] font-bold text-primary flex items-center gap-1 mt-2">
                                        <span class="material-symbols-outlined text-xs">add</span>
                                        Add Bulletin
                                    </button>
                                </div>
                            </div>
                        </template>

                        <button type="button" @click="addExperience()" class="w-full py-4 border-2 border-dashed border-slate-100 rounded-2xl flex items-center justify-center gap-2 text-slate-400 hover:text-primary hover:border-primary/20 transition-all font-bold text-[10px] uppercase tracking-widest">
                            <span class="material-symbols-outlined text-sm">add_circle</span>
                            Initialize New Experience Node
                        </button>
                    </div>
                </div>

                <div class="h-px bg-outline-variant/10"></div>

                <!-- Group 02: Credentials -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div>
                        <span class="label-mono text-[9px] opacity-40 uppercase tracking-widest block mb-1">Section 05</span>
                        <h3 class="font-black text-on-surface tracking-tight uppercase text-xs">System Access</h3>
                    </div>
                    <div class="md:col-span-2 space-y-8">
                        <div class="space-y-2">
                            <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="email">Primary Auth Node (Email)</label>
                            <input id="email" type="email" name="email" value="{{ old('email', $employee->email) }}"
                                class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-sm font-mono font-bold text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all @error('email') border-error @enderror"
                                placeholder="access@vector.ai">
                            @error('email') <p class="text-[9px] text-error font-bold uppercase tracking-widest mt-2">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="password">Security Hash (Password)</label>
                                <input id="password" type="password" name="password"
                                    class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-sm font-mono text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all @error('password') border-error @enderror"
                                    placeholder="[REDACTED]">
                                @error('password') <p class="text-[9px] text-error font-bold uppercase tracking-widest mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="password_confirmation">Confirm Hash</label>
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                    class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-sm font-mono text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all"
                                    placeholder="Repeat Hash">
                            </div>
                        </div>

                        <div class="pt-4 flex flex-col justify-end">
                            <label class="flex items-center gap-4 cursor-pointer group">
                                <div class="relative">
                                    <input type="hidden" name="is_active" value="0">
                                    <input id="is_active" type="checkbox" name="is_active" value="1" {{ old('is_active', $employee->is_active) ? 'checked' : '' }}
                                        class="sr-only peer">
                                    <div class="w-12 h-6 bg-outline-variant/20 rounded-full peer-checked:bg-secondary transition-all"></div>
                                    <div class="absolute top-1 left-1 w-4 h-4 bg-white rounded-full shadow-sm transition-all peer-checked:translate-x-6"></div>
                                </div>
                                <span class="label-mono text-[10px] font-black uppercase tracking-widest opacity-60 group-hover:opacity-100 transition-opacity">Node is Active and Authenticated</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="px-10 py-8 bg-surface-container-low border-t border-outline-variant/10 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-2 h-2 rounded-full bg-secondary animate-pulse"></div>
                    <span class="label-mono text-[9px] opacity-40 uppercase tracking-widest">Awaiting Runtime Commit</span>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.employees.index') }}" class="label-mono text-[10px] font-black uppercase tracking-widest opacity-40 hover:opacity-100 transition-opacity">Abort Configuration</a>
                    <button type="submit" class="bg-primary text-white px-8 py-3 rounded font-black text-xs tracking-tight hover:brightness-110 shadow-lg shadow-primary/20 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">terminal</span>
                        Commit Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
