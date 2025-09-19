<x-layouts.main :metadata="\App\DataTransferObjects\MetaData::from([
    'page_title' => trans('errors.404.heading'),
    'meta_robots' => 'noindex,nofollow'
])">
    <x-container>
        <x-heading
            element="h1"
            :heading="trans('errors.404.heading')"
        />

        <x-wysiwyg class="text-lg" :content="trans('errors.404.subtext')"/>

        @php
            $siteOptions = \Statamic\Facades\GlobalSet::findByHandle('site_options')?->inCurrentSite();
        @endphp

        @if($siteOptions && $siteOptions->page_for_contact)
            <p>
                <a href="{{ $siteOptions->page_for_contact->url }}" class="btn btn-primary">
                    {{ trans('errors.404.btn_contact_page_label') }}
                </a>
            </p>
        @endif
    </x-container>
</x-layouts.main>
