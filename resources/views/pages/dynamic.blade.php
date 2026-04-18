@extends('layouts.frontend')

@section('title', $page->meta_title ?: $page->title . ' | ' . \App\Models\Setting::get('site_name', 'ProgrammersIn'))
@section('meta_description', $page->meta_description)

@section('content')
<main class="pt-20">
    @isset($page->content)
        @foreach($page->content as $block)
            @php $type = $block['type']; @endphp
            @includeIf("pages.blocks.{$type}", ['data' => $block['data'] ?? []])
        @endforeach
    @endisset
</main>
@endsection
