<div>
    <x-container>
        <x-heading
            :element="$block->element->value()"
            :heading="$block->heading"
            :overline="$block->overline"
        />

        <x-wysiwyg :content="$block->wysiwyg"/>
    </x-container>

    @if($block->slides && count($block->slides) > 0)
        <div x-data x-slider-carousel x-cloak class="swiper mt-16" data-equalize-heights="true">
            <div class="swiper-wrapper">
                @foreach($block->slides as $slide)
                    <div class="swiper-slide group !h-auto">
                        @includeIf('blocks.partials.slide-' . Str::slug($slide->type ?? 'image', '-'), ['slide' => $slide])
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-12 mt-16">
                <div class="col-start-1 lg:col-span-10 lg:col-start-2 col-span-12">
                    <div class="offset-helper"></div>

                    @if(count($block->slides) > 1)
                        <div class="relative [&>div]:!relative [&>div]:!top-0 [&>div]:!left-0 [&>div]:bg-transparent [&>div]:!h-3 [&>div]:!rounded-none [&>div]:content-none [&>div]:before:bg-secondary-light [&>div]:before:w-full [&>div]:before:h-px [&>div]:before:absolute [&>div]:before:top-1/2 [&>div]:before:left-0 [&>div]:before:-translate-y-1/2 [&>div>div]:h-3 [&>div>div]:bg-secondary [&>div>div]:hover:bg-secondary-dark [&>div>div]:cursor-ew-resize [&>div>div]:!rounded-none transition-colors">
                            <div class="swiper-scrollbar !bg-transparent [&_>.swiper-scrollbar-drag]:!bg-secondary !w-full"></div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
