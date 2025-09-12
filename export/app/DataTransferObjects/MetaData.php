<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use Statamic\Contracts\Entries\Entry;
use Statamic\Contracts\Taxonomies\Taxonomy;
use Statamic\Facades\GlobalSet;
use Statamic\Facades\Site;
use Statamic\Structures\Page;
use Statamic\Taxonomies\LocalizedTerm;

class MetaData extends Data
{
    public function __construct(
        public ?string $page_title = '',
        public ?string $meta_description = '',
        public ?string $meta_keywords = '',
        public ?string $meta_robots = 'index, follow',
        public ?string $meta_canonical = '',
        public ?string $og_title = '',
        public ?string $og_description = '',
        public ?string $og_url = '',
        public ?string $og_image = '',
        public ?string $og_site_name = '',
        public ?string $og_type = 'website',
    ) {}

    public static function fromPage(Page|Entry|Taxonomy|LocalizedTerm $page): self
    {
        $data = collect([
            'og_title',
            'og_description',
            'og_url',
            'og_image',
            'og_type',
            'page_title',
            'meta_description',
            'meta_keywords',
            'meta_robots',
            'meta_canonical',
        ])->mapWithKeys(function ($key) use ($page) {
            return [$key => $page->get($key)];
        })->toArray();

        if (empty($data['page_title']) && ! empty($page->get('title'))) {
            $data['page_title'] = $page->get('title');
        }

        if (empty($data['og_site_name'])) {
            $data['og_site_name'] = Site::current()->name();
        }

        if (empty($data['meta_canonical'])) {
            $data['meta_canonical'] = url()->current();
        }

        if (empty($data['og_title']) && ! empty($data['page_title'])) {
            $data['og_title'] = $data['page_title'];
        }

        if (empty($data['og_description']) && ! empty($data['meta_description'])) {
            $data['og_description'] = $data['meta_description'];
        }

        if (empty($data['og_url'])) {
            $data['og_url'] = url()->current();
        }

        if (! empty($data['og_image']) && ! empty($page->og_image)) {
            $data['og_image'] = $page->og_image->url() ?? '';
        }

        if (empty($data['og_image'])) {
            $siteMeta = GlobalSet::findByHandle('site_meta')?->inCurrentSite() ?? null;

            if ($siteMeta && $siteMeta->has('og_fallback_image')) {
                $data['og_image'] = $siteMeta->og_fallback_image->url();
            }
        }

        return new self(...$data);
    }
}
