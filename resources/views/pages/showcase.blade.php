@extends('layouts.frontend')

@section('title', $project->title . ' | Case Study')

@section('content')
<main class="pt-20 bg-surface">
    <!-- Hero Section -->
    <section class="py-24 bg-surface-container-low border-b border-outline-variant/30">
        <div class="max-w-5xl mx-auto px-8 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-primary/10 text-primary text-xs font-bold uppercase tracking-widest rounded border border-primary/20 mb-8">
                Case Study: {{ $project->service->title ?? 'Engineering' }}
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tighter text-on-surface mb-10 leading-[1.05]">
                {{ $project->title }}
            </h1>
            <div class="flex items-center justify-center gap-12 text-on-surface-variant">
                <div class="text-center">
                    <span class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-1">Impact</span>
                    <span class="font-bold text-lg text-on-surface">Digital Excellence</span>
                </div>
                <div class="w-px h-8 bg-outline-variant/30"></div>
                <div class="text-center">
                    <span class="block text-[10px] font-bold uppercase tracking-widest opacity-50 mb-1">Status</span>
                    <span class="font-bold text-lg text-secondary uppercase tracking-tight">Active Node</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Image -->
    @if($project->featured_image)
    <section class="max-w-6xl mx-auto px-8 -mt-16">
        <div class="aspect-video rounded overflow-hidden shadow-2xl border border-outline-variant">
            <img src="{{ asset('storage/' . $project->featured_image) }}" class="w-full h-full object-cover">
        </div>
    </section>
    @endif

    <!-- Case Study Content -->
    <section class="py-24">
        <div class="max-w-3xl mx-auto px-8">
            <div class="prose prose-slate prose-xl max-w-none text-on-surface-variant font-medium leading-relaxed italic border-l-4 border-primary pl-10 mb-20 bg-primary/5 py-8 pr-8 rounded-r">
                {{ $project->description }}
            </div>

            <div class="space-y-12">
                <h2 class="text-3xl font-bold tracking-tight text-on-surface">The Challenge & Solution</h2>
                <div class="prose prose-slate prose-lg max-w-none text-on-surface-variant leading-loose">
                    {!! nl2br(e($project->showcase_description)) !!}
                </div>
            </div>

            <div class="mt-20 pt-12 border-t border-outline-variant/30 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">Share Case Study</p>
                    <div class="flex gap-4">
                        <span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">share</span>
                        <span class="material-symbols-outlined text-on-surface-variant hover:text-primary cursor-pointer transition-colors">link</span>
                    </div>
                </div>
                <a href="{{ route('portfolio.index') }}" class="px-8 py-3 bg-primary text-on-primary rounded font-bold text-sm hover:brightness-110 transition-all shadow-sm shadow-primary/20">
                    Back to Portfolio
                </a>
            </div>
        </div>
    </section>
</main>
@endsection
