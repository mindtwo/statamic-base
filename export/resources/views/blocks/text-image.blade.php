<x-container>
    <div @class([
        'grid grid-cols-1 md:grid-cols-2 gap-12',
        'items-center' => $block->center_content_vertically ?? false,
    ])>
        <div @class([
            'md:order-2' => $block->reverse_order ?? false,
        ])>
            <x-heading
                :element="$block->element->value()"
                :heading="$block->heading"
                :overline="$block->overline"
            />

            <x-wysiwyg :content="$block->wysiwyg"/>
        </div>

        <div @class([
            'md:order-1' => $block->reverse_order ?? false,
        ])>
            @if($block->image)
                <x-image
                    :assets="[$block->image]"
                    :loading="$block->lazy_loading ?? true"
                    :simple-markup="false"
                    class="w-full h-auto"
                />
            @endif
        </div>
    </div>
</x-container>
