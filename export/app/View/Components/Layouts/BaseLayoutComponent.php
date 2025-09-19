<?php

namespace App\View\Components\Layouts;

use App\DataTransferObjects\MetaData;
use App\Services\MultilingualService;
use Illuminate\View\Component;
use Statamic\Facades\GlobalSet;
use Statamic\Facades\Site;
use Statamic\Globals\Variables;
use Statamic\Sites\Site as SiteModel;
use Statamic\Statamic;

abstract class BaseLayoutComponent extends Component
{
    /**
     * The current site.
     */
    public ?SiteModel $site;

    /**
     * The site metadata global variables.
     */
    public ?Variables $siteMeta = null;

    /**
     * The current language code.
     */
    public string $language;

    /**
     * Whether the current page is the homepage.
     */
    public bool $isHomepage = false;

    /**
     * The URL to the homepage.
     */
    public string $homepageUrl = '';

    /**
     * Available sites for language switching.
     */
    public mixed $availableSites = null;

    /**
     * Hreflang links for SEO.
     */
    public array $hreflangLinks = [];

    /**
     * The multilingual service instance.
     */
    protected MultilingualService $multilingualService;

    /**
     * The main navigation items.
     */
    public mixed $primaryNav = null;

    /**
     * The footer navigation items.
     */
    public mixed $footerNav = null;

    /**
     * The current page object.
     */
    public mixed $page = null;

    /**
     * The site options global variables.
     */
    public ?Variables $siteOptions = null;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = '',
        public string $description = '',
        public string $canonical = '',
        public string $robots = 'index, follow',
        public ?MetaData $metadata = null,
        mixed $page = null,
    ) {
        $this->page = $page;
        $this->multilingualService = app(MultilingualService::class);
        $this->initializeSiteData();
        $this->loadNavigationData();
        $this->setupLanguageData();
    }

    /**
     * Initialize site related data.
     */
    protected function initializeSiteData(): void
    {
        $this->site = Site::current();
        $this->language = str_replace('_', '-', app()->getLocale());
        $this->isHomepage = $this->detectIfHomepage();
        $this->siteMeta = GlobalSet::findByHandle('master_data')?->inCurrentSite();
        $this->siteOptions = GlobalSet::findByHandle('site_options')?->inCurrentSite();
    }

    /**
     * Detect if the current page is the homepage.
     */
    protected function detectIfHomepage(): bool
    {
        if (! $this->site) {
            return false;
        }

        $handle = $this->site->handle();

        return ($handle === 'default' || $handle === 'de') && request()->is('/');
    }

    /**
     * Load navigation data.
     */
    protected function loadNavigationData(): void
    {
        $this->primaryNav = Statamic::tag('nav:primary_navigation')->fetch();
        $this->footerNav = Statamic::tag('nav:footer_navigation')->fetch();
    }

    protected function setupLanguageData(): void
    {
        // Get current page from Statamic's view context if not passed
        if (! $this->page) {
            $uri = request()->path() ?: '/';
            $slug = $uri === '/' ? 'home' : basename($uri);

            $collection = \Statamic\Facades\Collection::findByHandle('pages');
            if ($collection) {
                $this->page = $collection->queryEntries()
                    ->where('site', $this->site->handle())
                    ->where('slug', $slug)
                    ->first();
            }
        }

        // Use page from metadata if available, otherwise use passed page
        $currentPage = $this->metadata?->originalPage ?? $this->page;

        $this->availableSites = $this->multilingualService->getAvailableSites($currentPage);
        $this->hreflangLinks = $this->multilingualService->getHreflangLinks($currentPage);
    }
}
