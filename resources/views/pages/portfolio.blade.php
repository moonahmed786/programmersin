@extends('layouts.frontend')

@section('content')
<main class="pt-32 pb-24 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <header class="max-w-3xl mb-16">
            <span class="text-xs font-bold tracking-[0.3em] uppercase text-primary mb-4 block">Our Work</span>
            <h1 class="text-6xl font-extrabold tracking-tighter mb-6 leading-none text-on-surface">Engineering <br><span class="text-primary">Success Stories</span></h1>
            <p class="text-xl text-on-surface-variant font-medium opacity-70 leading-relaxed">
                From revolutionary AI startups to established enterprise giants, we help our partners ship high-impact products in record time.
            </p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $project)
            <div class="group relative bg-white rounded overflow-hidden border border-outline-variant hover:shadow-xl transition-all duration-500 hover:-translate-y-1">
                <div class="aspect-[4/3] bg-surface-container-low overflow-hidden">
                    @if($project->featured_image)
                        <img src="{{ asset('storage/' . $project->featured_image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-primary/10">
                            <span class="material-symbols-outlined text-6xl">gallery_thumbnail</span>
                        </div>
                    @endif
                </div>
                <div class="p-8">
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 bg-primary/10 text-primary text-[10px] font-bold uppercase tracking-widest rounded border border-primary/20">
                            {{ $project->service->title ?? 'Engineering' }}
                        </span>
                    </div>
                    <h3 class="text-2xl font-bold tracking-tight text-on-surface mb-3 group-hover:text-primary transition-colors leading-tight">{{ $project->title }}</h3>
                    <p class="text-sm text-on-surface-variant line-clamp-2 opacity-70 mb-6 leading-relaxed">
                        {{ Str::limit($project->showcase_description ?: $project->description, 120) }}
                    </p>
                    <a href="{{ route('portfolio.show', $project->slug) }}" class="flex items-center gap-2 text-sm font-bold uppercase tracking-widest text-primary hover:gap-4 transition-all">
                        View Case Study
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 text-center opacity-40">
                <p class="text-xl font-bold italic">Engineering case studies are incoming...</p>
            </div>
            @endforelse
        </div>

        <div class="mt-16">
            {{ $projects->links() }}
        </div>
    </div>
</main>
@endsection
