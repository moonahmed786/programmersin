@props(['id'])

<div class="relative" x-data="{ open: false }">
    <button @click.stop="open = !open" @keydown.escape.window="open = false"
        class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-all">
        <span class="material-symbols-outlined text-xl">more_vert</span>
    </button>

    <div x-show="open" @click.outside="open = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        class="absolute right-0 top-full mt-1 w-44 bg-white rounded-xl border border-slate-100 shadow-lg shadow-slate-200/50 z-50 py-1.5 overflow-hidden"
        style="display: none;">
        {{ $slot }}
    </div>
</div>
