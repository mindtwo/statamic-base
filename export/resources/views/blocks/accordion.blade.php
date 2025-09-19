<x-container>
    <x-heading
        :element="$block->element->value()"
        :heading="$block->heading"
        :overline="$block->overline"
    />

    <x-wysiwyg :content="$block->wysiwyg"/>

    @if($block->accordion && count($block->accordion) > 0)
        <div x-data="{ active: 1 }" class="mt-8 space-y-4">
            @foreach($block->accordion as $index => $item)
                <div x-data="{
                    id: {{ $index + 1 }},
                    get expanded() {
                        return this.active === this.id
                    },
                    set expanded(value) {
                        this.active = value ? this.id : null
                    },
                }" class="border border-gray-200 rounded-lg overflow-hidden">
                    <button
                        type="button"
                        x-on:click="expanded = !expanded"
                        :aria-expanded="expanded"
                        class="flex w-full items-center justify-between p-4 text-left font-medium hover:bg-gray-50 transition-colors"
                    >
                        <span>{{ $item['heading'] }}</span>
                        <svg x-show="expanded" class="w-5 h-5 transform transition-transform" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"/>
                        </svg>
                        <svg x-show="!expanded" class="w-5 h-5 transform transition-transform" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="expanded" x-collapse class="border-t border-gray-200">
                        <div class="p-4 prose prose-sm max-w-none">
                            <x-wysiwyg :content="$item->wysiwyg"/>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-container>