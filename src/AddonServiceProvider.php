<?php

namespace mindtwo\StatamicBase;

use mindtwo\StatamicBase\Widgets\Dashboard;
use mindtwo\StatamicBase\Widgets\TechnicalSupport;
use Statamic\Providers\AddonServiceProvider as BaseAddonServiceProvider;

class AddonServiceProvider extends BaseAddonServiceProvider
{
    protected $viewNamespace = 'mindtwo';

    protected $widgets = [
        Dashboard::class,
        TechnicalSupport::class,
    ];
}
