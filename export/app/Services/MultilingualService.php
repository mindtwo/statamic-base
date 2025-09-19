<?php

namespace App\Services;

use App\DataTransferObjects\LanguageSite;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Statamic\Contracts\Entries\Entry;
use Statamic\Facades\Config;
use Statamic\Facades\Site;
use Statamic\Sites\Site as SiteModel;

class MultilingualService
{
    public function isMultisiteEnabled(): bool
    {
        return Config::get('statamic.system.multisite', false);
    }

    public function getCurrentLanguage(): string
    {
        return str_replace('_', '-', app()->getLocale());
    }

    public function getCurrentSite(): ?SiteModel
    {
        return Site::current();
    }

    public function getAllSites(): Collection
    {
        if (! $this->isMultisiteEnabled()) {
            $currentSite = Site::current();

            return $currentSite ? collect([$currentSite]) : collect();
        }

        return Site::all();
    }

    public function getAvailableSites(?Entry $currentPage = null): Collection
    {
        $sites = $this->getAllSites();

        if ($sites->count() <= 1) {
            return collect();
        }

        if (! $currentPage) {
            return $sites->map(fn (SiteModel $site) => $this->createLanguageSiteData($site, null));
        }

        $cacheKey = 'available_sites_'.$currentPage->id().'_'.$currentPage->lastModified()->timestamp;

        return Cache::remember($cacheKey, 1800, function () use ($sites, $currentPage) {
            return $sites->map(function (SiteModel $site) use ($currentPage) {
                return $this->createLanguageSiteData($site, $currentPage);
            });
        });
    }

    public function getTargetSite(SiteModel $currentSite): ?SiteModel
    {
        if (! $this->isMultisiteEnabled()) {
            return null;
        }

        return $this->getAllSites()
            ->reject(fn ($site) => $site->handle() === $currentSite->handle())
            ->first();
    }

    public function getTranslatedUrl(?Entry $page, SiteModel $targetSite): string
    {
        if (! $page) {
            return $targetSite->url();
        }

        if ($this->hasTranslation($page, $targetSite->handle())) {
            try {
                return $page->in($targetSite->handle())->absoluteUrl();
            } catch (\Exception $e) {
                return $targetSite->url();
            }
        }

        return $this->getFallbackUrl($page, $targetSite);
    }

    public function hasTranslation(?Entry $page, string $siteHandle): bool
    {
        return $page
            && is_object($page)
            && method_exists($page, 'existsIn')
            && $page->existsIn($siteHandle);
    }

    public function getFallbackUrl(?Entry $page, SiteModel $targetSite): string
    {
        if (! $page) {
            return $targetSite->url();
        }

        // Try equivalent page first (same slug, different language)
        if ($equivalentUrl = $this->findEquivalentPage($page, $targetSite)) {
            return $equivalentUrl;
        }

        // Try parent translation as fallback
        if ($parentUrl = $this->findParentTranslation($page, $targetSite)) {
            return $parentUrl;
        }

        // Final fallback to site home
        return $targetSite->url();
    }

    public function getHreflangLinks(?Entry $currentPage = null): array
    {
        if (! $currentPage || ! $this->isMultisiteEnabled()) {
            return [];
        }

        $cacheKey = 'hreflang_links_'.$currentPage->id().'_'.$currentPage->lastModified()->timestamp;

        return Cache::remember($cacheKey, 3600, function () use ($currentPage) {
            $links = [];

            foreach ($this->getAllSites() as $site) {
                if ($currentPage->existsIn($site->handle())) {
                    try {
                        $translatedEntry = $currentPage->in($site->handle());
                        $links[] = [
                            'lang' => $site->lang(),
                            'url' => $translatedEntry->absoluteUrl(),
                        ];
                    } catch (\Throwable $e) {
                        continue;
                    }
                }
            }

            return $links;
        });
    }

    protected function createLanguageSiteData(SiteModel $site, ?Entry $currentPage): LanguageSite
    {
        return new LanguageSite(
            handle: $site->handle(),
            name: $site->name(),
            locale: $site->locale(),
            lang: $site->lang(),
            url: $this->getTranslatedUrl($currentPage, $site),
            hasTranslation: $this->hasTranslation($currentPage, $site->handle())
        );
    }

    protected function findEquivalentPage(Entry $page, SiteModel $targetSite): ?string
    {
        try {
            // Check if it's a structure page (like homepage)
            if (method_exists($page, 'structure') && $page->structure()) {
                $structure = $page->structure();
                $equivalentEntry = $structure->in($targetSite->handle())
                    ?->flattenedPages()
                    ->where('slug', $page->slug())
                    ->first();

                return $equivalentEntry?->absoluteUrl();
            }

            // Handle collection entries
            $collection = $page->collection();
            if (! $collection) {
                \Log::debug('MultilingualService: Page has no collection', [
                    'page_id' => $page->id(),
                    'page_type' => get_class($page),
                ]);

                return null;
            }

            $slug = $page->slug();
            if (! $slug) {
                \Log::warning('MultilingualService: Page has no slug', ['page_id' => $page->id()]);

                return null;
            }

            $equivalentEntry = $collection->entries()
                ->where('site', $targetSite->handle())
                ->where('slug', $slug)
                ->first();

            return $equivalentEntry?->absoluteUrl();
        } catch (\Throwable $e) {
            \Log::error('MultilingualService: Error finding equivalent page', [
                'page_id' => $page->id(),
                'target_site' => $targetSite->handle(),
                'error' => $e->getMessage(),
            ]);

            return null;
        }
    }

    protected function findParentTranslation(Entry $page, SiteModel $targetSite): ?string
    {
        try {
            $parent = $page->parent();
            if ($parent && $this->hasTranslation($parent, $targetSite->handle())) {
                return $parent->in($targetSite->handle())->absoluteUrl();
            }
        } catch (\Exception $e) {
            return null;
        }

        return null;
    }

    public function isHomepage(?Entry $page = null): bool
    {
        if ($page) {
            return $page->slug() === 'home';
        }

        $currentSite = Site::current();
        $requestPath = trim(request()->path(), '/');
        $siteUrl = trim(parse_url($currentSite->url(), PHP_URL_PATH) ?? '', '/');

        // Compare the request path with the site's base path
        return $requestPath === $siteUrl;
    }
}
