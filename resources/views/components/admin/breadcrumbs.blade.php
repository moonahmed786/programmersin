@props(['items' => []])

<nav class="flex mb-6" aria-label="Breadcrumb">
    <ol class="flex items-center space-x-3">
        <li>
            <div class="flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-primary transition-colors">
                    Command Node
                </a>
            </div>
        </li>
        @foreach($items as $item)
            <li>
                <div class="flex items-center">
                    <span class="material-symbols-outlined text-slate-300 text-sm opacity-50">chevron_right</span>
                    <a href="{{ $item['url'] ?? '#' }}" class="ml-3 text-[10px] font-black uppercase tracking-widest {{ $loop->last ? 'text-primary' : 'text-slate-400 hover:text-primary' }} transition-colors">
                        {{ $item['label'] }}
                    </a>
                </div>
            </li>
        @endforeach
    </ol>
</nav>
