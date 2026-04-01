@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-surface relative overflow-hidden">
    <!-- Abstract background elements -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-primary/5 rounded-full blur-[100px]"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-tertiary/5 rounded-full blur-[100px]"></div>

    <div class="max-w-md w-full px-8 animate-in-fade relative z-10">
        <div class="bg-surface-container-lowest p-10 rounded-[2.5rem] shadow-2xl border border-outline-variant/10">
            <div class="mb-10 flex flex-col items-center text-center">
                <div class="w-16 h-16 rounded-2xl bg-primary flex items-center justify-center text-on-primary shadow-2xl shadow-primary/30 mb-8 transform hover:rotate-12 transition-transform">
                    <span class="material-symbols-outlined text-3xl">terminal</span>
                </div>
                <h1 class="text-4xl font-black tracking-tighter text-on-surface leading-none mb-3">Programmers.in</h1>
                <p class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    Secure Access Node
                </p>
            </div>
            
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="space-y-5">
                    <div class="space-y-2">
                        <label for="email" class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant ml-2">Access Email</label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-primary transition-colors text-xl">alternate_email</span>
                            <input id="email" name="email" type="email" required 
                                class="w-full pl-12 pr-6 py-4 bg-surface-container-low border-2 border-transparent focus:border-primary/20 focus:ring-4 focus:ring-primary/5 rounded-2xl text-on-surface font-bold tracking-tight transition-all placeholder:text-slate-300" 
                                placeholder="john@company.com">
                        </div>
                        @error('email')
                            <p class="mt-2 text-[10px] font-black text-rose-500 uppercase tracking-widest ml-2 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant ml-2">Security Key</label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-primary transition-colors text-xl">lock</span>
                            <input id="password" name="password" type="password" required 
                                class="w-full pl-12 pr-6 py-4 bg-surface-container-low border-2 border-transparent focus:border-primary/20 focus:ring-4 focus:ring-primary/5 rounded-2xl text-on-surface font-bold tracking-tight transition-all placeholder:text-slate-300" 
                                placeholder="••••••••">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between px-2">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-outline-variant/30 text-primary focus:ring-primary/20 bg-surface-container-low">
                        <span class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant group-hover:text-primary transition-colors">Keep Session</span>
                    </label>
                    <a href="#" class="text-[10px] font-black uppercase tracking-widest text-primary hover:underline italic">Key Recovery</a>
                </div>

                <button type="submit" 
                    class="w-full py-5 bg-on-surface text-surface rounded-2xl font-black uppercase tracking-widest text-xs shadow-2xl shadow-on-surface/30 hover:-translate-y-1 hover:bg-primary hover:text-on-primary transition-all group flex items-center justify-center gap-3">
                    Initialize Protocol
                    <span class="material-symbols-outlined text-base group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </button>
            </form>

            <div class="mt-12 text-center">
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-300 italic mb-4">— Internal Operations Only —</p>
                <a href="{{ url('/') }}" class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant hover:text-primary transition-colors flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-sm">home</span>
                    Return to Foundation
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
