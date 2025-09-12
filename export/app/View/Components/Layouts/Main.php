<?php

namespace App\View\Components\Layouts;

use Illuminate\View\View;

class Main extends BaseLayoutComponent
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.layouts.main');
    }
}
