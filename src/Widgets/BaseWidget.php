<?php

namespace mindtwo\StatamicBase\Widgets;

use Statamic\Widgets\Widget;

class BaseWidget extends Widget
{
    /**
     * Get container handle.
     *
     * @return string
     */
    public static function handle()
    {
        return 'mindtwo::'.parent::handle();
    }
}
