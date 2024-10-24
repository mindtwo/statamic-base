<?php

namespace mindtwo\StatamicBase\Widgets;

use Illuminate\View\View;

class TechnicalSupport extends BaseWidget
{
    /**
     * The HTML that should be shown in the widget.
     */
    public function html(): string|View
    {
        return view('statamic-base::widgets.technical_support');
    }
}
