@extends('layouts.backend')

@section('content')

<!-- Architect Unit Initialization Header -->
<div class="mb-12">
    <div class="flex items-center gap-4 mb-4">
        <a href="{{ route('admin.employees.index') }}" class="p-2 rounded-full hover:bg-surface-container-low transition-colors text-on-surface-variant opacity-40">
            <span class="material-symbols-outlined text-xl">arrow_back</span>
        </a>
        <div class="h-4 w-px bg-outline-variant/20 mx-2"></div>
        <div>
            <h1 class="text-2xl font-black tracking-tighter text-on-surface uppercase italic">Architect Unit Initialization</h1>
            <p class="text-[10px] text-on-surface-variant font-mono opacity-60 uppercase tracking-widest mt-1">Deploying new personnel node to agency grid</p>
        </div>
    </div>
</div>

<div class="max-w-4xl">
    <div class="bg-white rounded overflow-hidden border border-outline-variant/10 shadow-sm">
        <form action="{{ route('admin.employees.store') }}" method="POST">
            @csrf

            <div class="p-10 space-y-12">
                <!-- Group 01: Identity Metadata -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div>
                        <span class="label-mono text-[9px] opacity-40 uppercase tracking-widest block mb-1">Section 01</span>
                        <h3 class="font-black text-on-surface tracking-tight uppercase text-xs">Identity Metadata</h3>
                    </div>
                    <div class="md:col-span-2 space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="name">Legal Identifier (Name)</label>
                                <input id="name" type="text" name="name" required value="{{ old('name') }}"
                                    class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-sm font-bold text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all @error('name') border-error @enderror"
                                    placeholder="SURNAME_GIVEN">
                                @error('name') <p class="text-[9px] text-error font-bold uppercase tracking-widest mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="position">Assigned Designation</label>
                                <input id="position" type="text" name="position" value="{{ old('position') }}"
                                    class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-sm font-bold text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all"
                                    placeholder="e.g. SR_DEVELOPER">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="phone">Signal Port (Phone)</label>
                            <input id="phone" type="text" name="phone" value="{{ old('phone') }}"
                                class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-xs font-mono font-bold text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all"
                                placeholder="+XX XXX XXXXXXX">
                        </div>

                        <div class="space-y-2">
                            <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="bio">Personnel Brief (Bio)</label>
                            <textarea id="bio" name="bio" rows="3"
                                class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-4 focus:ring-4 focus:ring-primary/10 focus:border-primary/40 text-sm font-medium text-on-surface-variant transition-all resize-none italic"
                                placeholder="Awaiting manual narrative input...">{{ old('bio') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="h-px bg-outline-variant/10"></div>

                <!-- Group 02: Access Credentials -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div>
                        <span class="label-mono text-[9px] opacity-40 uppercase tracking-widest block mb-1">Section 02</span>
                        <h3 class="font-black text-on-surface tracking-tight uppercase text-xs">Access Credentials</h3>
                    </div>
                    <div class="md:col-span-2 space-y-8">
                        <div class="space-y-2">
                            <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="email">Auth Node (Email)</label>
                            <input id="email" type="email" name="email" required value="{{ old('email') }}"
                                class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-sm font-mono font-bold text-primary focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all @error('email') border-error @enderror"
                                placeholder="user@agency.com">
                            @error('email') <p class="text-[9px] text-error font-bold uppercase tracking-widest mt-2">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="password">Security Hash (Password)</label>
                                <input id="password" type="password" name="password" required
                                    class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-sm font-mono font-bold text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all @error('password') border-error @enderror"
                                    placeholder="********">
                                @error('password') <p class="text-[9px] text-error font-bold uppercase tracking-widest mt-2">{{ $message }}</p> @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="label-mono text-[10px] text-on-surface opacity-60 uppercase tracking-widest" for="password_confirmation">Confirm Hash</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required
                                    class="w-full bg-surface-container-low border border-outline-variant/20 rounded px-5 py-3.5 text-sm font-mono font-bold text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all"
                                    placeholder="********">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="px-10 py-8 bg-surface-container-low border-t border-outline-variant/10 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-2 h-2 rounded-full bg-secondary animate-pulse"></div>
                    <span class="label-mono text-[9px] opacity-40 uppercase tracking-widest">Node Activation Ready</span>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.employees.index') }}" class="label-mono text-[10px] font-black uppercase tracking-widest opacity-40 hover:opacity-100 transition-opacity">Abort Deploy</a>
                    <button type="submit" class="bg-primary text-white px-8 py-3 rounded font-black text-xs tracking-tight hover:brightness-110 shadow-lg shadow-primary/20 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">person_add</span>
                        Compute Initialization
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@endsection
