<div class="bg-primary text-white py-16">
    <x-container>
        <div class="text-center">
            <x-heading
                :element="$block->element->value()"
                :heading="$block->heading"
                :overline="$block->overline"
                class="text-white"
            />

            <div class="text-white prose prose-invert max-w-none">
                <x-wysiwyg :content="$block->wysiwyg"/>
            </div>

            @if($block->button_link && $block->button_label)
                @php
                    $buttonLink = $block->button_link instanceof \Statamic\Entries\Entry
                        ? $block->button_link->url()
                        : $block->button_link;
                @endphp

                <div class="mt-8">
                    <x-button :button-label="$block->button_label" :button-link="$buttonLink" :style="$block->button_style" />
                </div>
            @endif
        </div>
    </x-container>
</div>
