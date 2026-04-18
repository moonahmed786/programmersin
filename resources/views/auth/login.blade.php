<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personnel Access — ProgrammersIn</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('uploads/assets/logo.svg') }}">
    
    <!-- Google Fonts: Inter & Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    
    @vite(['resources/css/app.css'])
    
    <style>
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fadeIn 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        
        .material-shadow {
            box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 10px 15px -3px rgba(0,0,0,0.05), 0 4px 6px -2px rgba(0,0,0,0.02);
        }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6 relative overflow-x-hidden font-inter">

    <!-- Ambient Design Elements -->
    <div class="absolute -top-40 -right-40 w-[800px] h-[800px] bg-primary/5 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute -bottom-40 -left-40 w-[600px] h-[600px] bg-secondary/5 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="w-full max-w-[460px] relative z-10 animate-fade-in">
        <!-- Logo Header -->
        <div class="flex flex-col items-center mb-10 text-center">
            <div class="w-20 h-20 rounded-3xl bg-white border border-slate-100 p-3 shadow-md mb-6 transition-transform hover:scale-105 duration-500">
                <img src="{{ asset('uploads/assets/logo.svg') }}" alt="ProgrammersIn" class="w-full h-full object-contain">
            </div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tighter uppercase italic">
                Personnel <span class="text-primary italic opacity-90">Access</span>
            </h1>
            <p class="text-[10px] text-slate-400 font-black uppercase tracking-[0.4em] mt-3 flex items-center gap-3">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse shadow-[0_0_8px_rgba(16,185,129,0.3)]"></span>
                Secure Command Node Registry
            </p>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-stellar border border-slate-100 material-shadow overflow-hidden">
            <div class="h-1.5 bg-gradient-to-r from-primary to-secondary"></div>
            
            <div class="p-10 md:p-14">
                @if ($errors->any())
                    <div class="mb-10 bg-rose-50 border border-rose-100 rounded-2xl p-5 flex items-start gap-4 animate-in-fade">
                        <span class="material-symbols-outlined text-rose-500 text-xl font-bold">error</span>
                        <div class="flex flex-col gap-1">
                            <span class="text-[10px] font-black text-rose-600 uppercase tracking-widest leading-none">Access Denied</span>
                            <p class="text-xs font-bold text-rose-500/80 mt-1">{{ $errors->first() }}</p>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-8">
                    @csrf

                    <!-- Identity Path -->
                    <div class="space-y-3">
                        <label for="email" class="label-material">Credential Identifier (Email)</label>
                        <div class="relative group">
                            <span class="absolute left-6 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-300 group-focus-within:text-primary transition-colors text-xl">alternate_email</span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@programmersin.com"
                                class="input-material !pl-16">
                        </div>
                    </div>

                    <!-- Access Key -->
                    <div class="space-y-3" x-data="{ show: false }">
                        <div class="flex items-center justify-between px-1">
                            <label for="password" class="label-material !mb-0">Access Key Sequence</label>
                            <a href="#" class="text-[9px] font-black text-primary uppercase tracking-widest hover:text-slate-900 transition-colors">Forgot Key?</a>
                        </div>
                        <div class="relative group">
                            <span class="absolute left-6 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-300 group-focus-within:text-primary transition-colors text-xl">lock</span>
                            <input id="password" :type="show ? 'text' : 'password'" name="password" required placeholder="••••••••••••"
                                class="input-material !pl-16 !pr-16">
                            <button type="button" @click="show = !show" class="absolute right-6 top-1/2 -translate-y-1/2 text-slate-300 hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl" x-text="show ? 'visibility_off' : 'visibility'">visibility</span>
                            </button>
                        </div>
                    </div>

                    <!-- Authorization Controls -->
                    <div class="flex items-center justify-between pt-2">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <div class="relative w-10 h-6">
                                <input type="checkbox" name="remember" class="sr-only peer">
                                <div class="w-full h-full bg-slate-100 rounded-full peer-checked:bg-primary transition-all shadow-inner border border-slate-200"></div>
                                <div class="absolute top-1 left-1 w-4 h-4 bg-white rounded-full shadow-md transition-all border border-slate-100 peer-checked:translate-x-4"></div>
                            </div>
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest group-hover:text-on-surface transition-colors">Persist Session</span>
                        </label>
                    </div>

                    <!-- Execution Trigger -->
                    <button type="submit" class="btn-stellar w-full py-5 justify-center mt-4">
                        <span class="material-symbols-outlined text-lg">verified_user</span>
                        Initialize Access Protocol
                    </button>
                </form>

                <div class="mt-12 pt-10 border-t border-slate-50 flex items-center justify-between">
                    <p class="text-[9px] font-black text-slate-300 uppercase tracking-[0.3em] italic">Encrypted Secure Line</p>
                    <a href="{{ url('/') }}" class="flex items-center gap-3 text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-primary transition-all group">
                        <span class="material-symbols-outlined text-lg group-hover:-translate-x-1 transition-transform">west</span>
                        Exit Console
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer Meta -->
        <div class="mt-10 flex items-center justify-center gap-8 text-center">
            <div class="h-px bg-slate-200 w-12 opacity-50"></div>
            <span class="text-[9px] font-black text-slate-300 uppercase tracking-[0.5em]">programmersin.com</span>
            <div class="h-px bg-slate-200 w-12 opacity-50"></div>
        </div>
    </div>
</body>
</html>
