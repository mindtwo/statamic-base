<x-container>
    <x-heading
        :element="$block->element->value()"
        :heading="$block->heading"
        :overline="$block->overline"
    />

    @if($block->form)
        <div class="grid grid-cols-12">
            <x-form handle="{{ $block->form->handle }}" class="col-span-12 xl:col-span-8"></x-form>
        </div>
    @endif
</x-container>
