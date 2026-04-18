<!-- Footer -->
<footer class="bg-node-dark border-t border-white/5">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-12 px-8 py-20 max-w-7xl mx-auto">
        <div class="md:col-span-1">
            <div class="flex items-center mb-8">
                <a href="/" class="transition-transform duration-300 hover:scale-105 block">
                    <img alt="ProgrammersIn Logo" class="h-12 w-auto object-contain brightness-110" src="{{ asset('uploads/assets/logo.svg') }}" />
                </a>
            </div>
            <p class="text-slate-500 text-sm leading-relaxed max-w-xs font-medium">
                Architecting high-precision Intelligence at Scale. From concept to global deployment with mathematical precision.
            </p>
        </div>
        @foreach($footerMenus as $menu)
            <div>
                <h4 class="text-xs tracking-[0.2em] uppercase font-bold text-primary mb-8">{{ $menu->title }}</h4>
                <ul class="space-y-4">
                    @foreach($menu->children as $child)
                        <li><a class="text-slate-400 hover:text-white transition-all text-sm font-bold" href="{{ $child->url ?: '#' }}">{{ $child->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endforeach
        <div>
            <h4 class="text-xs tracking-[0.2em] uppercase font-bold text-primary mb-8">Newsletter</h4>
            <div class="flex gap-2">
                <input class="bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 w-full focus:ring-4 focus:ring-primary/10 transition-all text-sm outline-none text-white"
                       placeholder="Email address" type="email" />
                <button class="bg-primary text-white p-2.5 rounded-xl hover:brightness-110 transition-all shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-sm">send</span>
                </button>
            </div>
            <p class="text-[10px] text-slate-600 mt-3 italic font-medium">Weekly velocity reports & tech updates.</p>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-8 py-10 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
        <p class="text-slate-600 text-[11px] font-black uppercase tracking-widest">{{ \App\Models\Setting::get('footer_copyright', '© 2024 ProgrammersIn. Velocity First.') }}</p>
        <div class="flex gap-8 text-slate-500">
            @if($fb = \App\Models\Setting::get('facebook_url'))
                <a class="hover:text-white transition-all p-1" href="{{ $fb }}"><span class="material-symbols-outlined text-xl">public</span></a>
            @endif
            @if($tw = \App\Models\Setting::get('twitter_url'))
                <a class="hover:text-white transition-all p-1" href="{{ $tw }}"><span class="material-symbols-outlined text-xl">code</span></a>
            @endif
            @if($li = \App\Models\Setting::get('linkedin_url'))
                <a class="hover:text-white transition-all p-1" href="{{ $li }}"><span class="material-symbols-outlined text-xl">share</span></a>
            @endif
        </div>
    </div>
</footer>
