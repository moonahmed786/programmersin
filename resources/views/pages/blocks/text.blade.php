<section class="py-24 bg-transparent">
    <div class="max-w-4xl mx-auto px-8 relative">
        @if(!empty($data['title']))
        <div class="mb-12">
            <h2 class="text-4xl font-extrabold tracking-tighter text-on-surface mb-4">{{ $data['title'] }}</h2>
            <div class="w-12 h-1 bg-primary opacity-30"></div>
        </div>
        @endif
        <div class="prose prose-slate prose-lg max-w-none text-on-surface-variant font-medium leading-[1.8] text-justify opacity-80">
            {!! nl2br(e($data['body'] ?? '')) !!}
        </div>
    </div>
</section>
