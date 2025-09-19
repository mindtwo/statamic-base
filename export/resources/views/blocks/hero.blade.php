<div class="grid">
    <div class="[grid-column:1] [grid-row:1] grid grid-cols-12 px-8 relative z-20">
        <div class="col-span-12 lg:col-span-8 lg:col-start-3 flex items-center justify-center">
            <div class="text-center text-white py-16">
                <x-heading
                    :element="$block->element->value()"
                    :heading="$block->heading"
                    :overline="$block->overline"
                    class="text-white drop-shadow-lg"
                />

                <div class="text-white prose prose-invert max-w-none prose-lg drop-shadow-md">
                    <x-wysiwyg :content="$block->wysiwyg"/>
                </div>
            </div>
        </div>
    </div>

    <div class="[grid-column:1] [grid-row:1] relative z-10 h-full">
        @if($block->image)
            <x-image
                :assets="[$block->image]"
                :simple-markup="true"
                class="w-full h-full object-cover"
            />
        @endif

        <div class="absolute inset-0 bg-gradient-to-br from-primary/30 via-primary/50 to-primary/70"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-primary/20 to-primary/40"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-primary/30 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-radial from-primary/20 via-transparent to-primary/60"></div>
    </div>
</div>
