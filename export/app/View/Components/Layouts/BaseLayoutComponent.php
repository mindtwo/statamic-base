<?php

namespace App\View\Components\Layouts;

use App\DataTransferObjects\MetaData;
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
    public SiteModel $site;

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
     * The handle of the target site for language switching.
     */
    public string $targetSite = '';

    /**
     * The URL to the translated version of the current page.
     */
    public string $translatedPage = '';

    /**
     * Available sites for language switching.
     */
    public array $availableSites = [];

    /**
     * The main navigation items.
     */
    public mixed $primaryNav = null;

    /**
     * The footer navigation items.
     */
    public mixed $footerNav = null;

    /**
     * The meta navigation items.
     */
    public mixed $metaNav = null;

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
    ) {
        $this->initializeSiteData();
        $this->loadNavigationData();
        $this->setupLanguageToggle();
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
        $this->metaNav = Statamic::tag('nav:meta_navigation')->fetch();
    }

    /**
     * Setup language toggle functionality.
     */
    protected function setupLanguageToggle(): void
    {
        $this->homepageUrl = $this->site->url();
        $this->targetSite = $this->site->handle() === 'de' ? 'en' : 'de';
        $targetHomepageUrl = Site::get($this->targetSite)->url();

        // Set default translated page URL to target site homepage
        $this->translatedPage = $targetHomepageUrl;

        // Get current page from request
        $this->page = request()->get('page');

        // Update translated page URL if page exists in target site
        if ($this->hasTranslation()) {
            $this->translatedPage = $this->page->in($this->targetSite)->absoluteUrl();
        }

        // Setup available sites for language menu
        $this->setupAvailableSites();
    }

    /**
     * Setup available sites data for language switching.
     */
    protected function setupAvailableSites(): void
    {
        $this->availableSites = [];
        
        foreach (Site::all() as $site) {
            $translatedUrl = $site->url();
            
            // If current page exists, try to get translated URL
            if ($this->page && method_exists($this->page, 'existsIn') && $this->page->existsIn($site->handle())) {
                $translatedUrl = $this->page->in($site->handle())->absoluteUrl();
            }
            
            $this->availableSites[$site->handle()] = [
                'name' => $site->name(),
                'handle' => $site->handle(),
                'locale' => $site->locale(),
                'url' => $translatedUrl,
            ];
        }
    }

    /**
     * Check if the current page has a translation in the target site.
     */
    protected function hasTranslation(): bool
    {
        return $this->page
            && is_object($this->page)
            && method_exists($this->page, 'existsIn')
            && $this->page->existsIn($this->targetSite);
    }
}
