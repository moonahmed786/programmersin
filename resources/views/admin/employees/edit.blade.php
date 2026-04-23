@extends('layouts.backend')

@section('content')

<div class="mb-8">
    <x-admin.breadcrumbs :items="[
        ['label' => 'Team Members', 'url' => route('admin.employees.index')],
        ['label' => 'Edit Member']
    ]" />
    
    <h1 class="text-2xl font-bold text-slate-900 mt-4">Edit Team Member</h1>
    <p class="text-sm text-slate-500 mt-1">Update profile for <span class="font-medium text-slate-700">{{ $employee->name }}</span></p>
</div>

<div x-data="{ 
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
            if (!name) { alert('Name is required.'); return false; }
        }
        return true;
    }
}">
    <x-admin.form-stepper :steps="[
        ['label' => 'Profile'],
        ['label' => 'Education'],
        ['label' => 'Skills'],
        ['label' => 'Experience'],
        ['label' => 'Account']
    ]" ::current-step="currentStep" />

    <div class="bg-white rounded-2xl overflow-hidden border border-slate-100">
        <form action="{{ route('admin.employees.update', $employee) }}" method="POST" @submit="loading = true">
            @csrf
            @method('PUT')

            <div class="p-8 md:p-10">
                <!-- Step 1: Profile -->
                <div x-show="currentStep === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" class="space-y-8">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                        <div class="lg:col-span-1">
                            <p class="text-xs text-primary font-semibold uppercase tracking-wider mb-1">Step 1</p>
                            <h3 class="text-sm font-bold text-slate-900">Basic Info</h3>
                        </div>
                        <div class="lg:col-span-3 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5" for="name">Full Name *</label>
                                    <input id="name" type="text" name="name" value="{{ old('name', $employee->name) }}"
                                        class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all @error('name') border-red-300 @enderror"
                                        placeholder="John Doe">
                                    @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5" for="position">Position</label>
                                    <input id="position" type="text" name="position" value="{{ old('position', $employee->position) }}"
                                        class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                        placeholder="e.g. Senior Developer">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5" for="phone">Phone</label>
                                    <input id="phone" type="text" name="phone" value="{{ old('phone', $employee->phone) }}"
                                        class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                        placeholder="+1 234 567 8900">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5" for="location">Location</label>
                                    <input id="location" type="text" name="location" value="{{ old('location', $employee->location) }}"
                                        class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                        placeholder="City, Country">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="bio">Bio</label>
                                <textarea id="bio" name="bio" rows="4"
                                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"
                                    placeholder="A short bio...">{{ old('bio', $employee->bio) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Education -->
                <div x-show="currentStep === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" x-cloak class="space-y-8">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                        <div class="lg:col-span-1">
                            <p class="text-xs text-primary font-semibold uppercase tracking-wider mb-1">Step 2</p>
                            <h3 class="text-sm font-bold text-slate-900">Education</h3>
                        </div>
                        <div class="lg:col-span-3 space-y-4">
                            <template x-for="(item, index) in education" :key="index">
                                <div class="p-5 bg-slate-50 border border-slate-100 rounded-xl relative group">
                                    <button type="button" @click="removeEducation(index)" class="absolute top-3 right-3 w-7 h-7 flex items-center justify-center rounded-lg text-slate-300 hover:text-red-500 hover:bg-red-50 transition-all">
                                        <span class="material-symbols-outlined text-lg">close</span>
                                    </button>
                                    <div class="grid grid-cols-1 gap-4">
                                        <div>
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Institution</label>
                                            <input type="text" :name="'education['+index+'][university]'" x-model="item.university" 
                                                class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="University name">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Degree & Year</label>
                                            <input type="text" :name="'education['+index+'][info]'" x-model="item.info" 
                                                class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2.5 text-sm text-slate-600 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="e.g. BS Computer Science (2018-2022)">
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <button type="button" @click="addEducation()" class="inline-flex items-center gap-2 text-sm font-medium text-primary hover:bg-primary/5 px-4 py-2 rounded-lg transition-all">
                                <span class="material-symbols-outlined text-lg">add</span>
                                Add Education
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Skills -->
                <div x-show="currentStep === 3" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" x-cloak class="space-y-8">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                        <div class="lg:col-span-1">
                            <p class="text-xs text-primary font-semibold uppercase tracking-wider mb-1">Step 3</p>
                            <h3 class="text-sm font-bold text-slate-900">Skills</h3>
                        </div>
                        <div class="lg:col-span-3">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <template x-for="(value, key) in skills" :key="key">
                                    <div>
                                        <label class="block text-xs font-medium text-slate-500 mb-1.5" x-text="key"></label>
                                        <input type="text" :name="'skills['+key+']'" x-model="skills[key]" 
                                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary focus:bg-white transition-all" 
                                            placeholder="e.g. PHP, Laravel, PostgreSQL...">
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Experience -->
                <div x-show="currentStep === 4" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" x-cloak class="space-y-8">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                        <div class="lg:col-span-1">
                            <p class="text-xs text-primary font-semibold uppercase tracking-wider mb-1">Step 4</p>
                            <h3 class="text-sm font-bold text-slate-900">Experience</h3>
                        </div>
                        <div class="lg:col-span-3 space-y-6">
                            <template x-for="(exp, expIdx) in experience" :key="expIdx">
                                <div class="p-6 bg-slate-50 border border-slate-100 rounded-xl relative group">
                                    <button type="button" @click="removeExperience(expIdx)" class="absolute top-4 right-4 w-7 h-7 flex items-center justify-center rounded-lg text-slate-300 hover:text-red-500 hover:bg-red-50 transition-all">
                                        <span class="material-symbols-outlined text-lg">close</span>
                                    </button>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Company</label>
                                            <input type="text" :name="'experience['+expIdx+'][company]'" x-model="exp.company" 
                                                class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="Company name">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-slate-500 mb-1">Duration</label>
                                            <input type="text" :name="'experience['+expIdx+'][range]'" x-model="exp.range" 
                                                class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2.5 text-sm text-slate-600 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="e.g. Jan 2022 – Present">
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-xs font-medium text-slate-500 mb-1">Job Title</label>
                                        <input type="text" :name="'experience['+expIdx+'][role]'" x-model="exp.role" 
                                            class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="e.g. Senior Software Engineer">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="block text-xs font-medium text-slate-500">Key Achievements</label>
                                        <template x-for="(bullet, bIdx) in exp.bullets" :key="bIdx">
                                            <div class="flex items-center gap-2">
                                                <span class="text-slate-300">•</span>
                                                <input type="text" :name="'experience['+expIdx+'][bullets]['+bIdx+']'" x-model="exp.bullets[bIdx]" 
                                                    class="flex-1 bg-white border border-slate-100 rounded-lg px-4 py-2 text-sm text-slate-700 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="Describe an achievement...">
                                                <button type="button" @click="removeBullet(expIdx, bIdx)" class="text-slate-300 hover:text-red-500 transition-colors">
                                                    <span class="material-symbols-outlined text-lg">close</span>
                                                </button>
                                            </div>
                                        </template>
                                        <button type="button" @click="addBullet(expIdx)" class="inline-flex items-center gap-1 text-xs font-medium text-primary mt-1">
                                            <span class="material-symbols-outlined text-sm">add</span>
                                            Add point
                                        </button>
                                    </div>
                                </div>
                            </template>

                            <button type="button" @click="addExperience()" class="w-full py-6 border-2 border-dashed border-slate-200 rounded-xl flex items-center justify-center gap-2 text-slate-400 hover:text-primary hover:border-primary/30 transition-all">
                                <span class="material-symbols-outlined text-xl">add</span>
                                <span class="text-sm font-medium">Add Work Experience</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 5: Account -->
                <div x-show="currentStep === 5" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" x-cloak class="space-y-8">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                        <div class="lg:col-span-1">
                            <p class="text-xs text-primary font-semibold uppercase tracking-wider mb-1">Step 5</p>
                            <h3 class="text-sm font-bold text-slate-900">Account</h3>
                        </div>
                        <div class="lg:col-span-3 space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="email">Email Address *</label>
                                <input id="email" type="email" name="email" value="{{ old('email', $employee->email) }}"
                                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all @error('email') border-red-300 @enderror"
                                    placeholder="name@company.com">
                                @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5" for="password">New Password</label>
                                    <input id="password" type="password" name="password"
                                        class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all @error('password') border-red-300 @enderror"
                                        placeholder="Leave blank to keep current">
                                    @error('password') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1.5" for="password_confirmation">Confirm Password</label>
                                    <input id="password_confirmation" type="password" name="password_confirmation"
                                        class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-900 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                        placeholder="Confirm new password">
                                </div>
                            </div>
                            <div class="pt-2">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <div class="relative">
                                        <input type="hidden" name="is_active" value="0">
                                        <input id="is_active" type="checkbox" name="is_active" value="1" {{ old('is_active', $employee->is_active) ? 'checked' : '' }}
                                            class="sr-only peer">
                                        <div class="w-11 h-6 bg-slate-200 rounded-full peer-checked:bg-primary transition-all"></div>
                                        <div class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow-sm transition-all peer-checked:translate-x-5"></div>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-slate-900">Active Account</span>
                                        <p class="text-xs text-slate-400">This member can log in and access the system</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="px-8 md:px-10 py-5 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="text-sm text-slate-400" x-text="'Step ' + currentStep + ' of 5'"></span>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" x-show="currentStep > 1" @click="currentStep--" 
                            class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors px-4 py-2 rounded-lg hover:bg-slate-100">
                        <span class="material-symbols-outlined text-lg">arrow_back</span>
                        Back
                    </button>
                    
                    <button type="button" x-show="currentStep < 5" @click="if(validateStep(currentStep)) currentStep++" 
                            class="inline-flex items-center gap-1.5 bg-primary text-white text-sm font-semibold px-5 py-2.5 rounded-xl hover:bg-primary-dark transition-colors">
                        Continue
                        <span class="material-symbols-outlined text-lg">arrow_forward</span>
                    </button>

                    <button type="submit" x-show="currentStep === 5" 
                            :disabled="loading"
                            class="inline-flex items-center gap-2 bg-emerald-600 text-white text-sm font-semibold px-6 py-2.5 rounded-xl hover:bg-emerald-700 transition-colors disabled:opacity-50 relative">
                        <span :class="{ 'opacity-0': loading }" class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-lg">save</span>
                            Save Changes
                        </span>
                        <div x-show="loading" class="absolute inset-0 flex items-center justify-center">
                            <div class="w-4 h-4 border-2 border-white/30 border-t-white rounded-full animate-spin"></div>
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
