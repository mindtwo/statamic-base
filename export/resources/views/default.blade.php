@php
    $getBlockType = fn($type) => str_replace('_', '-', $type);
@endphp

<x-layouts.main :metadata="\App\DataTransferObjects\MetaData::fromPage($page)">
    @foreach($blocks as $block)
        <section class="block-{{ $getBlockType($block->type) }} relative">
            @includeIf('blocks.' . $getBlockType($block->type), $block)
        </section>
    @endforeach
</x-layouts.main>
