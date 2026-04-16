@extends('layouts.frontend')

@section('no-nav', true)

@section('content')
<div class="min-h-screen flex items-center justify-center bg-slate-50 relative overflow-hidden font-inter">
    <!-- Abstract background elements -->
    <div class="absolute -top-24 -left-24 w-[500px] h-[500px] bg-primary/10 rounded-full blur-[120px]"></div>
    <div class="absolute -bottom-24 -right-24 w-[500px] h-[500px] bg-tertiary/10 rounded-full blur-[120px]"></div>

    <div class="max-w-md w-full px-8 relative z-10 py-12 animate-in-fade">
        <div class="glass-surface p-12 rounded-stellar shadow-2xl border border-white/80">
            <div class="mb-12 flex flex-col items-center text-center">
                <div class="w-16 h-16 rounded-2xl gradient-primary flex items-center justify-center text-white shadow-xl shadow-primary/30 mb-8 transform hover:scale-110 transition-transform duration-500">
                    <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">security</span>
                </div>
                <h1 class="text-4xl font-black tracking-tighter text-slate-900 leading-none mb-3 italic">
                    <span class="text-gradient">Protocol</span> Access
                </h1>
                <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    Central Command Node
                </p>
            </div>
            
            <form class="space-y-8" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <div class="space-y-2.5">
                        <label for="email" class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Personnel Email</label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-primary transition-colors text-xl">alternate_email</span>
                            <input id="email" name="email" type="email" required 
                                class="w-full pl-14 pr-6 py-4.5 bg-white/50 border border-white rounded-2xl text-slate-900 font-bold tracking-tight transition-all placeholder:text-slate-200 focus:ring-8 focus:ring-primary/5 focus:border-primary outline-none shadow-sm" 
                                placeholder="name@programmers.in">
                        </div>
                        @error('email')
                            <p class="mt-2 text-[10px] font-bold text-rose-500 uppercase tracking-widest ml-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2.5">
                        <label for="password" class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Access Key</label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-primary transition-colors text-xl">terminal</span>
                            <input id="password" name="password" type="password" required 
                                class="w-full pl-14 pr-6 py-4.5 bg-white/50 border border-white rounded-2xl text-slate-900 font-bold tracking-tight transition-all placeholder:text-slate-200 focus:ring-8 focus:ring-primary/5 focus:border-primary outline-none shadow-sm" 
                                placeholder="••••••••">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between px-1">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="remember" class="w-5 h-5 rounded-lg border-white bg-white/50 text-primary focus:ring-primary/20 shadow-inner">
                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-400 group-hover:text-primary transition-colors">Persistent Node</span>
                    </label>
                    <a href="#" class="text-[10px] font-black uppercase tracking-widest text-primary hover:underline italic">Recovery Path</a>
                </div>

                <button type="submit" 
                    class="btn-stellar w-full py-5 text-sm flex items-center justify-center gap-4">
                    Initialize Uplink
                    <span class="material-symbols-outlined text-base group-hover:translate-x-1.5 transition-transform">bolt</span>
                </button>
            </form>

            <div class="mt-14 text-center">
                <p class="text-[9px] font-black uppercase tracking-[0.4em] text-slate-300 italic mb-6 opacity-40">— SECURE_ROOT_ENCRYPTION_ACTIVE —</p>
                <a href="{{ url('/') }}" class="inline-flex items-center gap-3 text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-primary transition-all p-2 rounded-xl hover:bg-white/50">
                    <span class="material-symbols-outlined text-sm">west</span>
                    Return to Foundation
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

