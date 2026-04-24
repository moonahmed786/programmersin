<!-- TopNavBar -->
<header x-data="{ mobileMenuOpen: false }" class="sticky top-0 w-full z-50 bg-node-dark/80 backdrop-blur-md border-b border-white/5 shadow-2xl">
    <nav class="flex justify-between items-center px-8 py-3 max-w-7xl mx-auto">
        <!-- Logo Section -->
        <div class="flex items-center">
            <a href="/" class="transition-transform duration-300 hover:scale-105 active:scale-95 block">
                <img alt="Logo" class="h-14 w-auto object-contain brightness-110"
                     src="{{ \App\Models\Setting::logoUrl() }}" />
            </a>
        </div>

        <div class="hidden lg:flex items-center gap-10">
            @foreach($headerMenus as $menu)
                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <a class="font-inter text-[13px] font-bold tracking-tight text-white/70 hover:text-white transition-all flex items-center gap-1.5"
                       href="{{ $menu->url ?: '#' }}">
                        {{ $menu->title }}
                        @if($menu->children->count())
                            <span class="material-symbols-outlined text-[14px] opacity-40 group-hover:rotate-180 transition-transform duration-300">expand_more</span>
                        @endif
                    </a>
                    
                    @if($menu->children->count())
                        <div class="absolute left-0 mt-4 w-56 bg-node-dark rounded-xl shadow-2xl border border-white/5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 overflow-hidden">
                            <div class="py-2 px-1">
                                @foreach($menu->children as $child)
                                    <a href="{{ $child->url ?: '#' }}" class="block px-5 py-3 text-[12px] font-bold text-white/50 hover:bg-white/5 hover:text-white rounded-lg transition-all mx-1">
                                        {{ $child->title }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Right Side Actions -->
        <div class="flex items-center gap-4">
            <a href="{{ \App\Models\Setting::get('cta_url', '#contact') }}"
               class="hidden md:flex bg-primary text-white px-8 py-2.5 rounded-xl font-bold tracking-tight text-xs shadow-lg shadow-primary/20 hover:brightness-110 active:scale-95 transition-all">
                Get Started
            </a>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden w-10 h-10 flex items-center justify-center text-white/70 hover:text-white transition-colors relative z-[60]">
                <span class="material-symbols-outlined" x-show="!mobileMenuOpen" x-cloak>menu</span>
                <span class="material-symbols-outlined" x-show="mobileMenuOpen" x-cloak>close</span>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="lg:hidden absolute top-full left-0 w-full bg-node-dark border-b border-white/5 shadow-2xl">
        <div class="px-8 py-8 space-y-6">
            @foreach($headerMenus as $menu)
                <div class="space-y-4">
                    <a @click="mobileMenuOpen = false" class="block text-lg font-black tracking-tighter {{ $menu->url && request()->is(ltrim($menu->url, '/')) ? 'text-primary' : 'text-white' }}"
                       href="{{ $menu->url ?: '#' }}">
                        {{ $menu->title }}
                    </a>
                    
                    @if($menu->children->count())
                        <div class="grid grid-cols-1 gap-3 pl-4 border-l border-white/5">
                            @foreach($menu->children as $child)
                                <a @click="mobileMenuOpen = false" href="{{ $child->url ?: '#' }}" class="text-sm font-bold text-white/40 hover:text-white transition-colors">
                                    {{ $child->title }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
            
            <div class="pt-6 border-t border-white/5">
                <a href="{{ \App\Models\Setting::get('cta_url', '#contact') }}"
                   class="w-full bg-primary text-white px-8 py-4 rounded-xl font-black tracking-tight text-sm shadow-lg shadow-primary/20 hover:brightness-110 active:scale-95 transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-sm">rocket_launch</span>
                    Initiate Project
                </a>
            </div>
        </div>
    </div>
</header>
