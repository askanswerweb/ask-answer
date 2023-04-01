<?php

namespace App\View\Components\Breadcrumb;

use Illuminate\View\Component;

class Link extends Component
{
    public $href;

    public function __construct($href)
    {
        $this->href = $href;
    }

    public function render()
    {
        return view('components.breadcrumb.link');
    }
}
