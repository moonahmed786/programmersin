@props(['items' => []])

<nav class="flex mb-4" aria-label="Breadcrumb">
    <ol class="flex items-center space-x-2 text-sm">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="text-slate-400 hover:text-primary transition-colors">
                Dashboard
            </a>
        </li>
        @foreach($items as $item)
            <li>
                <div class="flex items-center">
                    <span class="material-symbols-outlined text-slate-300 text-sm">chevron_right</span>
                    <a href="{{ $item['url'] ?? '#' }}" class="ml-2 text-sm font-medium {{ $loop->last ? 'text-slate-900' : 'text-slate-400 hover:text-primary' }} transition-colors">
                        {{ $item['label'] }}
                    </a>
                </div>
            </li>
        @endforeach
    </ol>
</nav>
