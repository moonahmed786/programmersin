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

                        <div class="space-y-2">
                            <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="phone">Communication Node (Phone)</label>
                            <input id="phone" type="text" name="phone" value="{{ old('phone', $employee->phone) }}"
                                class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-xs font-mono font-bold text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all"
                                placeholder="+XX XXX XXXXXXX">
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

                <!-- Group 02: Credentials -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div>
                        <span class="label-mono text-[9px] opacity-40 uppercase tracking-widest block mb-1">Section 02</span>
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
@endsection
