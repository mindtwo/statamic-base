@if($block->image)
    <x-image
        :assets="[$block->image]"
        :simple-markup="false"
        class="w-full h-auto"
    />
@endif
