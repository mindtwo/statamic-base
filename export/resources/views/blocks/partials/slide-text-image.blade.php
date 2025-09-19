<div class="flex flex-col gap-y-16">
    <div>
        <x-heading
            :element="$slide['element']->value() ?? 'h3'"
            :heading="$slide['heading'] ?? null"
            :overline="$slide['overline'] ?? null"
        />

        <x-wysiwyg :content="$slide['wysiwyg'] ?? null"/>

        @if(isset($slide['link']) && $slide['link'])
            @php
                $linkUrl = $slide['link'] instanceof \Statamic\Entries\Entry
                    ? $slide['link']->url()
                    : $slide['link'];
            @endphp
            <a href="{{ $linkUrl }}" class="btn btn-primary">
                {{ __('Read more') }}
            </a>
        @endif

    </div>

    <div>
        @if($slide['image'])
            <x-image
                :assets="[$slide['image']]"
                :loading="true"
                :simple-markup="false"
                class="w-full h-auto"
            />
        @endif
    </div>
</div>
