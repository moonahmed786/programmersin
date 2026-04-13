@extends('layouts.backend')

@section('content')
<div class="max-w-2xl space-y-6">

    {{-- Page Header --}}
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.employees.index') }}"
            class="p-2 rounded-xl text-slate-500 hover:bg-surface-container-low transition-colors">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <div>
            <h1 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Edit Employee</h1>
            <p class="text-sm text-slate-400 mt-1">Update profile for {{ $employee->name }}</p>
        </div>
    </div>

    {{-- Form Card --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-outline-variant/20 shadow-sm overflow-hidden">
        <form action="{{ route('admin.employees.update', $employee) }}" method="POST" class="divide-y divide-outline-variant/10">
            @csrf
            @method('PUT')

            {{-- Personal Info --}}
            <div class="p-6 space-y-5">
                <p class="text-xs uppercase font-black tracking-widest text-slate-400">Personal Information</p>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-widest" for="name">Full Name <span class="text-red-400">*</span></label>
                        <input id="name" type="text" name="name" value="{{ old('name', $employee->name) }}"
                            class="w-full bg-surface-container-low dark:bg-slate-800 border border-outline-variant/30 rounded-xl px-4 py-3 text-sm text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all @error('name') border-red-400 @enderror"
                            placeholder="John Doe">
                        @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-widest" for="position">Position / Role</label>
                        <input id="position" type="text" name="position" value="{{ old('position', $employee->position) }}"
                            class="w-full bg-surface-container-low dark:bg-slate-800 border border-outline-variant/30 rounded-xl px-4 py-3 text-sm text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all"
                            placeholder="e.g. Full Stack Developer">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-widest" for="phone">Phone Number</label>
                    <input id="phone" type="text" name="phone" value="{{ old('phone', $employee->phone) }}"
                        class="w-full bg-surface-container-low dark:bg-slate-800 border border-outline-variant/30 rounded-xl px-4 py-3 text-sm text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all"
                        placeholder="+92 300 0000000">
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-widest" for="bio">Bio / About</label>
                    <textarea id="bio" name="bio" rows="3"
                        class="w-full bg-surface-container-low dark:bg-slate-800 border border-outline-variant/30 rounded-xl px-4 py-3 text-sm text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all resize-none"
                        placeholder="Short bio about this team member...">{{ old('bio', $employee->bio) }}</textarea>
                </div>
            </div>

            {{-- Account Info --}}
            <div class="p-6 space-y-5">
                <p class="text-xs uppercase font-black tracking-widest text-slate-400">Account Credentials</p>

                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-widest" for="email">Email Address <span class="text-red-400">*</span></label>
                    <input id="email" type="email" name="email" value="{{ old('email', $employee->email) }}"
                        class="w-full bg-surface-container-low dark:bg-slate-800 border border-outline-variant/30 rounded-xl px-4 py-3 text-sm text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all @error('email') border-red-400 @enderror"
                        placeholder="john@programmersin.com">
                    @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-widest" for="password">Password</label>
                        <input id="password" type="password" name="password"
                            class="w-full bg-surface-container-low dark:bg-slate-800 border border-outline-variant/30 rounded-xl px-4 py-3 text-sm text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all @error('password') border-red-400 @enderror"
                            placeholder="Leave blank to keep current">
                        @error('password') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-600 dark:text-slate-300 uppercase tracking-widest" for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            class="w-full bg-surface-container-low dark:bg-slate-800 border border-outline-variant/30 rounded-xl px-4 py-3 text-sm text-on-surface focus:ring-4 focus:ring-primary/10 focus:border-primary/40 transition-all"
                            placeholder="Repeat password">
                    </div>
                </div>
            </div>

            {{-- Status & Submit --}}
            <div class="p-6 flex items-center justify-between gap-4">
                <label class="flex items-center gap-3 cursor-pointer">
                    <div class="relative">
                        <input type="hidden" name="is_active" value="0">
                        <input id="is_active" type="checkbox" name="is_active" value="1" {{ old('is_active', $employee->is_active) ? 'checked' : '' }}
                            class="sr-only peer">
                        <div class="w-10 h-6 bg-slate-200 dark:bg-slate-700 rounded-full peer-checked:bg-primary transition-colors"></div>
                        <div class="absolute top-1 left-1 w-4 h-4 bg-white rounded-full shadow transition-all peer-checked:translate-x-4"></div>
                    </div>
                    <span class="text-sm font-semibold text-slate-700 dark:text-slate-300">Active account</span>
                </label>

                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.employees.index') }}"
                        class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-500 hover:bg-surface-container-low transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex items-center gap-2 bg-primary text-on-primary px-6 py-2.5 rounded-xl font-semibold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all">
                        <span class="material-symbols-outlined text-base">save</span>
                        Update Employee
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
