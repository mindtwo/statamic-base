<div @class([
    'py-20' => $block->background_color ?? false,
    'bg-black text-white' => $block->background_color === '#000',
    'bg-primary-dark text-white' => $block->background_color === '#de0639',
])>
    <x-container>
        <x-heading
            :element="$block->element->value()"
            :heading="$block->heading"
            :overline="$block->overline"
        />

        <x-wysiwyg :content="$block->wysiwyg"/>
    </x-container>
</div>
