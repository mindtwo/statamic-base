<x-layouts.main :metadata="\App\DataTransferObjects\MetaData::from([
    'page_title' => trans('errors.404.heading'),
    'meta_robots' => 'noindex,nofollow'
])">
    <x-container>
        <x-heading></x-heading>
        <div class="flex justify-center flex-col h-full wysiwyg">
            <h1 class="display text-white">
                {{ trans('errors.404.heading') }}
            </h1>
            <p class="text-xl text-white">
                {{ trans('errors.404.subtext') }}
            </p>

            @php
                $siteOptions = \Statamic\Facades\GlobalSet::findByHandle('site_options')?->inCurrentSite();
            @endphp

            @if($siteOptions && $siteOptions->page_for_contact)
                <p>
                    <a href="{{ $siteOptions->page_for_contact->url }}" class="btn btn-primary">
                    <span>
                        <span>
                            {{ trans('errors.404.btn_label') }}
                        </span>
                    </span>
                    </a>
                </p>
            @endif
        </div>
    </x-container>
</x-layouts.main>
