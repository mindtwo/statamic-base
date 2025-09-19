@php
    $kebabCaseBlockName = fn($type) => str_replace('_', '-', $type);
@endphp

<x-layouts.main :metadata="\App\DataTransferObjects\MetaData::fromPage($page)">
    @foreach($blocks as $block)
        <section
            @class([
                'block-' . $kebabCaseBlockName($block->type),
                'mt-24' => ($block->spacing_top ?? null)?->value() === 'default',
                'mb-24' => ($block->spacing_bottom ?? null)?->value() === 'default',
            ])
        >
            @includeIf('blocks.' . $kebabCaseBlockName($block->type), $block)
        </section>
    @endforeach
</x-layouts.main>
