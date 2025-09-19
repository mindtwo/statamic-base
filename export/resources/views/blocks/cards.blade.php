<x-container>
    <x-heading
        :element="$block->element->value()"
        :heading="$block->heading"
        :overline="$block->overline"
    />

    <x-wysiwyg :content="$block->wysiwyg"/>

    @if($block->cards && count($block->cards) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-16">
            @foreach($block->cards as $card)
                <div class="overflow-hidden rounded-lg bg-white shadow-sm">
                    <div class="px-4 py-5 sm:p-6">
                        @if($card['heading'])
                            <x-heading
                                :element="$card->element->value()"
                                :heading="$card->heading"
                            />
                        @endif

                        <x-wysiwyg :content="$card->wysiwyg"/>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-container>
