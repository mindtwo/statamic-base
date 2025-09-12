<x-container>
    <x-heading
        :element="$block->element->value()"
        :heading="$block->heading"
        :overline="$block->overline"
    />

    @if($block->form)
        <div class="col-span-12 md:col-span-5">
            <x-form handle="{{ $block->form->handle }}"></x-form>
        </div>
    @endif
</x-container>
