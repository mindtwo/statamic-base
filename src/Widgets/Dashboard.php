<?php

namespace mindtwo\StatamicBase\Widgets;

use Illuminate\View\View;

class Dashboard extends BaseWidget
{
    /**
     * The HTML that should be shown in the widget.
     */
    public function html(): string|View
    {
        return view('statamic-base::widgets.dashboard');
    }
}
