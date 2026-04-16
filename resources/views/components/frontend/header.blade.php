<!-- TopNavBar -->
<header class="sticky top-0 w-full z-50 bg-white/70 backdrop-blur-md shadow-sm border-b border-primary/5">
    <nav class="flex justify-between items-center px-8 py-3 max-w-7xl mx-auto">
        <div class="flex items-center">
            <a href="/" class="transition-transform duration-300 hover:scale-110 active:scale-95 block">
                <img alt="ProgrammersIn Logo" class="h-10 w-auto object-contain"
                     src="{{ \App\Models\Setting::get('site_logo', asset('uploads/assets/logo.svg')) }}" />
            </a>
        </div>
        <div class="hidden md:flex items-center gap-8">
            @foreach($headerMenus as $menu)
                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <a class="font-inter text-sm font-bold tracking-tight text-on-surface hover:text-primary transition-colors flex items-center gap-1"
                       href="{{ $menu->url ?: '#' }}">
                        {{ $menu->title }}
                        @if($menu->children->count())
                            <span class="material-symbols-outlined text-xs">expand_more</span>
                        @endif
                    </a>
                    
                    @if($menu->children->count())
                        <div class="absolute left-0 mt-4 w-48 bg-white rounded shadow-xl border border-outline-variant/10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 overflow-hidden">
                            <div class="py-2">
                                @foreach($menu->children as $child)
                                    <a href="{{ $child->url ?: '#' }}" class="block px-4 py-2 text-sm text-on-surface-variant hover:bg-primary/5 hover:text-primary transition-colors">
                                        {{ $child->title }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ \App\Models\Setting::get('cta_url', '#contact') }}"
               class="bg-primary text-on-primary px-5 py-2 rounded font-bold tracking-tight inline-block text-center text-sm shadow-sm hover:brightness-110 transition-all">
                Get Started
            </a>
        </div>
    </nav>
</header>
