@if($slide['image'])
    @php
        $linkUrl = null;
        if (isset($slide['link']) && $slide['link']) {
            $linkUrl = $slide['link'] instanceof \Statamic\Entries\Entry
                ? $slide['link']->url()
                : $slide['link'];
        }
    @endphp

    @if($linkUrl)
        <a href="{{ $linkUrl }}">
    @endif

    <x-image
        :assets="[$slide['image']]"
        :loading="true"
        :simple-markup="false"
        class="w-full h-auto"
    />

    @if($linkUrl)
        </a>
    @endif
@endif